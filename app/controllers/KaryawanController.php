<?php
use \Carbon\Carbon;

class KaryawanController extends \BaseController {

	/*Rules for validation*/
	private $rules = array(
				'nik' => 'required',
				'nama' => 'required',
				'alamat' => 'required',
				'tanggal_masuk_kerja' => 'required',
				'id_bagian' => 'required|numeric'
			);

	/*Validator object*/
	private $validator;

	public function validate($data)
	{
		$this->validator = Validator::make($data, $this->rules);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$karyawan = Karyawan::all();
		return View::make('kelola.karyawan.daftar', compact('karyawan'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$bagian = Bagian::lists('nama', 'id');
		return View::make('kelola.karyawan.baru')->with(compact('bagian'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$this->validate(Input::all());

		if ($this->validator->fails()) {
			return Redirect::route('karyawan.create')
						->withInput()
						->withErrors($this->validator);
		}

		$karyawan = new Karyawan;
		$karyawan->nik = Input::get('nik');
		$karyawan->nama = Input::get('nama');
		$karyawan->alamat = Input::get('alamat');
		$karyawan->tanggal_masuk_kerja = Input::get('tanggal_masuk_kerja');
		$karyawan->id_bagian = Input::get('id_bagian');
		$karyawan->jabatan = "karyawan";
		$karyawan->username = Input::get('nik');
		$karyawan->password = Hash::make('12345678');
		$karyawan->save();

		$this->saldoAwal();

		return Redirect::route('karyawan.create');
	}

	public function saldoAwal()
	{
		$tanggal_masuk_kerja = Carbon::createFromFormat('Y-m-d', Input::get('tanggal_masuk_kerja'));
		$saldo = Saldo::create(array('nik' => Input::get('nik'), 'id_cuti' => 1, 'saldo' => 21, 'expired' => $tanggal_masuk_kerja->copy()->addYears(1)->addDays(1825)));
		$saldo = Saldo::create(array('nik' => Input::get('nik'), 'id_cuti' => 2, 'saldo' => 12, 'expired' => $tanggal_masuk_kerja->copy()->addYears(1)->addDays(365)));
		$saldo = Saldo::create(array('nik' => Input::get('nik'), 'id_cuti' => 3, 'saldo' => 6, 'expired' => $tanggal_masuk_kerja->copy()->addYears(1)->addDays(365)));
		$saldo->save();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$karyawan = Karyawan::find($id);
		$bagian = Bagian::lists('nama', 'id');
		return View::make('kelola.karyawan.edit')
							->with(compact('karyawan'))
							->with(compact('bagian'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->validate(Input::all());

		if ($this->validator->fails()) {
			return Redirect::route('karyawan.edit', $id)
							->withInput()
							->withErrors($this->validator);
		}

		$karyawan = Karyawan::find($id);
		$karyawan->nik = Input::get('nik');
		$karyawan->nama = Input::get('nama');
		$karyawan->alamat = Input::get('alamat');
		$karyawan->tanggal_masuk_kerja = Input::get('tanggal_masuk_kerja');
		$karyawan->id_bagian = Input::get('id_bagian');
		$karyawan->save();

		return Redirect::route('karyawan.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$karyawan = Karyawan::find($id);
		$karyawan->delete();
		return Redirect::route('karyawan.index');
	}

	public function showUsernameAndPassword($id)
	{	
		$karyawan = Karyawan::find($id);
		return View::make('kelola.karyawan.username-password', compact('karyawan'));
	}

	public function getAutocompleteSuggestion($id)
	{
		$karyawan = Karyawan::where('nik' ,'like', '%' . $id . '%' )->get();
		return View::make('suggestion', compact('karyawan'));
	}
}

<?php

class PimpinanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pimpinan = Karyawan::where('jabatan', '=', 'pimpinan')->get();
		return View::make('kelola.pimpinan.daftar', compact('pimpinan'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$bagian = Bagian::lists('nama', 'id');
		return View::make('kelola.pimpinan.baru', compact('bagian'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($karyawan = Karyawan::find(Input::get('nik'))) {
			$karyawan->jabatan = "pimpinan";
			$karyawan->save();
			return Redirect::route('pimpinan.index');
		} 

		return Redirect::route('pimpinan.create')
						->withInput();
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
		
		return View::make('kelola.pimpinan.edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		$karyawan->jabatan = 'karyawan';
		$karyawan->save();

		return Redirect::route('pimpinan.index');
	}


}

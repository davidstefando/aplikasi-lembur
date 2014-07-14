<?php

class HrController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hr = Karyawan::where('jabatan', '=', 'hr')->get();
		return View::make('kelola.hr.daftar', compact('hr'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return View::make('kelola.hr.baru');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($karyawan = Karyawan::find(Input::get('nik'))) {
			$karyawan->jabatan = "hr";
			$karyawan->save();
			return Redirect::route('hr.index');
		} 

		return Redirect::route('hr.create')
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
		
		return View::make('kelola.hr.edit');
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

		return Redirect::route('hr.index');
	}


}

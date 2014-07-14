<?php

class BagianController extends \BaseController {

	private $rules = array(
			'nama' => 'required'
		);

	private $validator;

	private function validate($data)
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
		$bagian = Bagian::all();
		return View::make('kelola.bagian.daftar', compact('bagian'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('kelola.bagian.baru');
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
			return Redirect::route('bagian.create')
								->withInput()
								->withErrors($this->validator);
		}

		$bagian = new Bagian;
		$bagian->nama = Input::get('nama');
		$bagian->save();

		return Redirect::route('bagian.index');	
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
		$bagian = Bagian::find($id);
		return View::make('kelola.bagian.edit', compact('bagian'));
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
			return Redirect::route('bagian.edit', $id)
								->withInput()
								->withErrors($this->validator);
		}

		$bagian = Bagian::find($id);
		$bagian->nama = Input::get('nama');
		$bagian->save();

		return Redirect::route('bagian.index');	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$bagian = Bagian::find($id);
		$bagian->delete();
	}


}

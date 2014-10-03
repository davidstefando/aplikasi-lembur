<?php
class PengajuanController extends BaseController
{
	public function showPengajuanForm()
	{
		return View::make('pengajuan.form');
	}

	public function showVerifikasi()
	{
		$this->saveDataToSession();
		$dataKaryawan = $this->fetchDataKaryawan();

		$start = \Carbon\Carbon::createFromFormat('Y-m-d', Input::get('tanggal'));
		if ($start->lt(\Carbon\Carbon::now())) {
			return Redirect::to('pengajuan')
						->withErrors('Tanggal Tidak Valid');	
		}
		return View::make('pengajuan.verifikasi', compact('dataKaryawan'));
	}

	private function saveDataToSession()
	{
		Session::put('tanggal', Input::get('tanggal'));
		Session::put('mulai', Input::get('mulai'));
		Session::put('selesai', Input::get('selesai'));
		Session::put('keperluan', Input::get('keperluan'));
		Session::put('data_karyawan', Input::get('nik'));
	}

	private function fetchDataKaryawan()
	{
		$dataKaryawan = array();
		foreach (Session::get('data_karyawan') as $nik) {
			array_push($dataKaryawan, Karyawan::find($nik));
		}
		return $dataKaryawan;
	}

	public function ajukanLembur(){
		$this->insertDataPengajuan();
		return View::make('pengajuan.approval');
	}

	private function insertDataPengajuan()
	{
		$pengajuan = new Pengajuan;

		$pengajuan->tanggal = Session::get('tanggal');
		$pengajuan->mulai = Session::get('mulai');
		$pengajuan->selesai = Session::get('selesai');
		$pengajuan->keperluan = Session::get('keperluan');
		$pengajuan->nik = Auth::user()->nik;
		$pengajuan->id_bagian = Auth::user()->id_bagian;
		$pengajuan->status = "<label class='danger'>Belum Disetujui</label>";

		$pengajuan->save();

		foreach (Session::get('data_karyawan') as $nik) {
			$dataPengajuan = new DataPengajuan(array('nik' => $nik));
			$pengajuan->dataPengajuan()->save($dataPengajuan);	
		}
		
	}

	public function getStatusPengajuan(){
		$pengajuan = Pengajuan::where('nik', Auth::user()->nik)->get();

		return View::make('pengajuan.status', compact('pengajuan'));
	}

	public function showSuratLembur(){

	}

	public function batalkanPengajuan()
	{

	}

	public function showFormKriteriaLaporan()
	{
		$bagian = Bagian::lists('nama', 'id');
		return View::make('kelola.laporan.form', compact('bagian'));
	}

	public function showLaporan($jenis)
	{
		if ("perkaryawan" == $jenis) {
			$laporan = DB::table('data_lembur')
							->join('karyawan', 'data_lembur.nik', '=', 'karyawan.nik')
							->join('bagian', 'karyawan.id_bagian', '=', 'bagian.id')
							->select('karyawan.nik', 'karyawan.nama', DB::raw('SUM(lama) as lama_lembur'))
							->where(function($q){
								if (Input::get('id_bagian')) {
									$q->where('id_bagian', Input::get('id_bagian'));
								} else if (Input::get('nik')) {
									$q->where('karyawan.nik', Input::get('nik'));
								}
								if (Input::get('mulai') && Input::get('selesai')) {
									$q->whereBetween('tanggal', array(Input::get('mulai'), Input::get('selesai')));
								}
							})
							->groupBy('karyawan.nik');

			return View::make('kelola.laporan.karyawan', compact('laporan'))
									->with(array('mulai' => Input::get('mulai')))
									->with(array('selesai' => Input::get('selesai')));
		} else {
			$laporan = DB::table('data_lembur')
							->join('karyawan', 'data_lembur.nik', '=', 'karyawan.nik')
							->join('bagian', 'karyawan.id_bagian', '=', 'bagian.id')
							->select('bagian.nama', DB::raw('SUM(lama) as lama_lembur'))
							->where(function($q){
								if (Input::get('id_bagian')) {
									$q->where('id_bagian', Input::get('id_bagian'));
								}
								if (Input::get('mulai') && Input::get('selesai')) {
									$q->whereBetween('tanggal', array(Input::get('mulai'), Input::get('selesai')));
								}
							})
							->groupBy('karyawan.id_bagian');

			return View::make('kelola.laporan.bagian', compact('laporan'))
									->with(array('bagian' => 'IT'))
									->with(array('mulai' => Input::get('mulai')))
									->with(array('selesai' => Input::get('selesai')));
		}
	}
}
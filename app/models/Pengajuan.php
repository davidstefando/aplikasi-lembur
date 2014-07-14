<?php
class Pengajuan extends Eloquent
{
	protected $table = 'pengajuan_lembur';

	public $primaryKey = 'no_spl';

	public $timestamps = false;

	public static function boot()
    {
        parent::boot();

        Pengajuan::updating(function($pengajuan){
        	// cek bila pengajuan telah disetujui hr
        	if (0 == $pengajuan->original['disetujui_hr']
        		&& 1 == $pengajuan->disetujui_hr) {
        		
        		// hitung lama lembur
        		$lama = ((strtotime($pengajuan->selesai) - strtotime($pengajuan->mulai)) / 3600) * 2 - 0.5;

        		$data = Pengajuan::find($pengajuan->no_spl);
        			// insert data lembur karyawan
        			foreach ($data->dataPengajuan as $karyawan) {
        				DataLembur::create(array(
        					'nik' => $karyawan->nik,
        					'tanggal' => $data->tanggal,
        					'lama' => $lama
        				));
        			}
        		}
        });
    }

	public function dataPengajuan(){
		return $this->hasMany('DataPengajuan', 'no_spl', 'no_spl');
	}

	public function bagian()
	{
		return $this->hasOne('Bagian', 'id', 'id_bagian');
	}

	public function scopeBelumDisetujuiPimpinan($q){
		return $q->where('disetujui_pimpinan', '=', 0);
	}
}
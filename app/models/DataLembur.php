<?php
class DataLembur extends Eloquent{
	protected $table = 'data_lembur';

	protected $guarded = array();

	public $timestamps = false;

    public function getLaporan()
    {
      
    }
}
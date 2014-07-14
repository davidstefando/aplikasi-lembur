@extends('layout')
@section('content')	     
	<ul class="step">
		<li><span>1</span>Pengisian Form</li>
		<li><span>2</span>Verifikasi Data</li>
		<li class="current"><span>3</span>Tunggu Approval</li>
		<li><span>4</span>Cetak Laporan</li>
	</ul>
	<div class="row">
		<div class="grid-12 offset-2">
			<h2>Pengajuan lembur anda telah terkirim. Silakan tunggu persetujuan Pimpinan Bagian dan HR</h2>
			<ul>
				<li>Setelah disetujui anda akan mendapat notifikasi dan dapat mencetak surat lembur</li>
				<li>Jika hingga tanggal lembur dan belum disetujui maka dianggap tidak disetujui</li>
			</ul>

			{{ link_to('status', 'OK', array('class' => 'btn primary big right')) }}
		</div>
	</div>
@stop
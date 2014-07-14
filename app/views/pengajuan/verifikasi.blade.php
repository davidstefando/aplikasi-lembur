@extends('layout')
@section('content')
	<ul class="step">
		<li><span>1</span>Pengisian Form</li>
		<li class="current"><span>2</span>Verifikasi Data</li>
		<li><span>3</span>Tunggu Approval</li>
		<li><span>4</span>Cetak Laporan</li>
	</ul>
	<div class="row">
		<div class="grid-9 offset-4">
			<h2><i class="fa fa-check"></i>Verifikasi Data</h2>
			<p>Anda baru saja mengajukan cuti dengan data sebagai berikut</p>

			<h3>Data Lembur</h3>
			<table>
				<tr>
					<tr> 
						<td>Tanggal</td>
						<td>:</td>
						<td> {{ Session::get('tanggal') }} </td>
					</tr>
					<tr> 
						<td>Mulai</td>
						<td>:</td>
						<td> {{ Session::get('mulai') }} </td>
					</tr>
					<tr> 
						<td>Selesai</td>
						<td>:</td>
						<td> {{ Session::get('selesai') }} </td>
					</tr>
					<tr> 
						<td>Keperluan</td>
						<td>:</td>
						<td> {{ Session::get('keperluan') }} </td>
				</tr>
			</table>
			<h3>Data Karyawan</h3>
			<table class="full">
			<thead>
				<th>Nama</th>
				<th>NIK</th>
				<th>Bagian</th>
			</thead>
			@foreach ($dataKaryawan as $karyawan)
				<tr>
					<td> {{ $karyawan['nama'] }} </td>
					<td> {{ $karyawan['nik'] }} </td>
					<td> {{ $karyawan['bagian']['nama'] }} </td>
				</tr>
			@endforeach
			</table>

			{{ link_to('pengajuan/ajukan', 'Verifikasi', array('class' => 'btn primary right')) }}
			<a href="/pengajuan" class="btn danger right">Batalkan</a>
		</div>
	</div>
@stop
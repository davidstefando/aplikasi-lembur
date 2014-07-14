@extends('layout')
@section('content')
	<div class="row">
		<div class="grid-6 offset-5">
			<h2>Kriteria Laporan Bagian</h2>
			{{ Form::open(array('url' => 'laporan/perbagian')) }}
				<div class="form-control">
					<label>Bagian</label>
					{{ Form::select('id_bagian', array('0' => 'Semua') + $bagian, 0) }}
				</div>
				<div class="form-control">
					<label>Dari Tanggal</label>
					{{ Form::text('mulai') }}
				</div>
				<div class="form-control">
					<label>Sampai Tanggal</label>
					{{ Form::text('selesai') }}
				</div>
				<input type="submit" value="Lihat" class="btn primary right">
			{{ Form::close() }}
		</div>
	</div>

	<div class="row">
		<div class="grid-6 offset-5">
			<h2>Kriteria Laporan Karyawan</h2>
			{{ Form::open(array('url' => 'laporan/perkaryawan')) }}
				<div class="form-control">
					<label>NIK</label>
					{{ Form::text('nik', Input::old('nik')) }}
				</div>
				<div class="form-control">
					<label>Bagian</label>
					{{ Form::select('id_bagian', array_merge(array('0' => 'Semua'), $bagian), 0) }}
				</div>
				<div class="form-control">
					<label>Dari Tanggal</label>
					{{ Form::text('mulai') }}
				</div>
				<div class="form-control">
					<label>Sampai Tanggal</label>
					{{ Form::text('selesai') }}
				</div>
				<input type="submit" value="Lihat" class="btn primary right">
			{{ Form::close() }}
		</div>
	</div>
@stop
@extends('layout')
@section('content')
	
	@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
	@endif

	<div class="row">
		<div class="grid-6 offset-5">
			<h2>Data Karyawan Baru</h2>
			{{ Form::open(array('route' => 'karyawan.store')) }}
				<div class="form-control">
					<label>NIK</label>
					{{ Form::text('nik', Input::old('nik')) }}
				</div>
				<div class="form-control">
					<label>Nama</label>
					{{ Form::text('nama', Input::old('nama')) }}
				</div>
				<div class="form-control">
					<label>Alamat</label>
					{{ Form::textarea('alamat', Input::old('alamat')) }}
				</div>
				<div class="form-control">
					<label>Tanggal Masuk Kerja</label>
					{{ Form::text('tanggal_masuk_kerja', Input::old('tanggal_masuk_kerja')) }}
				</div>
				<div class="form-control">
					<label>Bagian</label>
					{{ Form::select('id_bagian', $bagian, Input::old('id_bagian')) }}
				</div>
				<input type="submit" value="Simpan" class="btn primary right">
				<input type="reset" value="Reset" class="btn danger right">
			{{ Form::close() }}
		</div>
	</div>
@stop
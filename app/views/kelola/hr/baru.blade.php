@extends('layout')
@section('content')
	<div class="row">
		<div class="grid-6 offset-5">
			<h2>Data Pimpinan Bagian Baru</h2>
			{{ Form::open(array('route' => 'hr.store')) }}
				<div class="form-control">
					<label>NIK</label>
					{{ Form::text('nik', Input::old('nik')) }}
				</div>
				<input type="submit" value="Simpan" class="btn primary right">
				<input type="reset" value="Reset" class="btn danger right">
			{{ Form::close() }}
		</div>
	</div>
@stop
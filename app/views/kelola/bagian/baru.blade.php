@extends('layout')
@section('content')
	<div class="row">
		<div class="grid-6 offset-5">
			<div class="centered">
				<h2>Data Bagian Baru</h2>
				{{ Form::open(array('route' => 'bagian.store')) }}
					<div class="form-control">
						<label>Nama</label>
						{{ Form::text('nama', Input::old('nama')) }}
					</div>
					<input type="submit" value="Simpan" class="btn primary right">
					<input type="reset" value="Reset" class="btn danger right">
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop
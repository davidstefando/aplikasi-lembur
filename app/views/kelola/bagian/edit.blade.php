@extends('layout')
@section('content')
	<div class="row">
		<div class="grid-6 offset-5">
			<div class="centered">
				<h2>Edit Data Bagian</h2>
				{{ Form::model($bagian, array('method' => 'PATCH', 'route' => array('bagian.update', $bagian->id))) }}
					<div class="form-control">
						<label>Nama</label>
						{{ Form::text('nama') }}
					</div>
					<input type="submit" value="Simpan" class="btn primary right">
					<input type="reset" value="Reset" class="btn danger right">
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop
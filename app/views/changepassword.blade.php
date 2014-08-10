@extends('layout')
@section('content')	  
	<div class="row">
		<div class="grid-6 offset-5">
			<h2>Ganti Password</h2>
			{{ Form::open() }}
				<div class="form-control">
					<label>Password Lama</label>
					{{ Form::password('oldpassword', Input::old('oldpassword')) }}
				</div>
				<div class="form-control">
					<label>Password Baru</label>
					{{ Form::password('newpassword', Input::old('newpassword')) }}
				</div>
				<input type="submit" value="Simpan" class="btn primary right">
				<input type="reset" value="Reset" class="btn danger right">
			{{ Form::close() }}
		</div>
	</div>
@stop
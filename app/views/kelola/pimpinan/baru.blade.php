@extends('layout')
@section('content')   
	<div class="row">
		<div class="grid-6 offset-5">
			<div class="centered">
				<h2>Data Pimpinan Bagian Baru</h2>
				{{ Form::open(array('route' => 'pimpinan.store')) }}
					<div class="form-control">
						<label>NIK</label>
						{{ Form::text('nik', Input::old('nik')) }}
					</div>
					<input type="submit" value="Simpan" class="btn primary right">
					<input type="reset" value="Reset" class="btn danger right">
				</form>
			</div>
		</div>
	</div>
@stop
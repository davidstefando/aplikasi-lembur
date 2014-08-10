@extends('layout')
@section('content')
	@if ($errors->any())
			<ul>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</ul>
		@endif
		<ul class="step">
			<li class="current"><span>1</span>Pengisian Form</li>
			<li><span>2</span>Verifikasi Data</li>
			<li><span>3</span>Tunggu Approval</li>
			<li><span>4</span>Cetak Laporan</li>
		</ul>
		<div class="row">
			<div class="content grid-10 offset-3">
				<h2><i class="fa fa-chevron-circle-right fa-fw"></i>Form Pengajuan Lembur</h2>
				{{ Form::open() }}
				<div class="form-control">
					<label>Tanggal</label>
					{{ Form::text('tanggal') }}
				</div>
				<div class="form-control">
					<label>Mulai</label>
					{{ Form::text('mulai') }}
				</div>
				<div class="form-control">
					<label>Selesai</label>
					{{ Form::text('selesai') }}
				</div>
				<div class="form-control">
					Keperluan <br>
					{{ Form::textarea('keperluan') }}
				</div>

				<div class="form-control">
					<h3>Data Karyawan<a class="btn primary" onclick="addForm()" href="#form">Tambah <i class="fa fa-plus"></i></a></h3>
					<table class="full" id="form">
						<thead>
							<th>NIK</th>
						</thead>
						<tbody id="form-karyawan">
							<tr>
								<td>{{ Form::text('nik[]') }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<input type="submit" value="Konfirmasi" class="btn primary right">
				<input type="reset" value="Reset" class="btn danger right">
				{{ Form::close() }}
			</div>
		</div>
@stop

@section('script')
	function addForm(){
		var nikForm = document.createElement('tr');
		nikForm.innerHTML = "<td> <input type='text' name='nik[]'/> </td>";
		document.querySelector("#form-karyawan").appendChild(nikForm);
		return false;
	}
@stop
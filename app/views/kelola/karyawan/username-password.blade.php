@extends('layout')
@section('content')
	<div class="row">
		<div class="grid-4 offset-6">
			<h2>Username dan Password</h2>
			<table class="full">
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td>{{ $karyawan->nik }}</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>{{ $karyawan->nama }}</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td>{{ $karyawan->username }}</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td>{{ $karyawan->password }}</td>
				</tr>
			</table>
			<p>Harap simpan data tersebut di tempat yang aman, karena ini privasi karyawan</p>
			{{ link_to('karyawan', 'Back', array('class' => 'btn small primary')) }}
		</div>
	</div>
@stop
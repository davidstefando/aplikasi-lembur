@extends('layout')
@section('content')
	{{ link_to('karyawan/create', 'Karyawan Baru', array('class' => 'btn success big')) }}
	<table class="full">
		<thead>
			<th>NIK</th>
			<th>NAMA</th>
			<th>ALAMAT</th>
			<th>TANGGAL MASUK KERJA</th>
			<th>BAGIAN</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($karyawan as $data)
			<tr>
				<td>{{ $data->nik }}</td>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->alamat }}</td>
				<td>{{ $data->tanggal_masuk_kerja }}</td>
				<td>{{ $data->bagian->nama }}</td>
				<td>
					{{ link_to_route('karyawan.edit', 'Edit', array($data->nik), array('class' => 'btn primary small')) }}
					{{ Form::open(array('method' => 'DELETE', 'route' => array('karyawan.destroy', $data->nik))) }}
						{{ Form::submit('Hapus', array('class' => 'btn danger small')) }}
					{{ Form::close() }}
					@if ($data->tanggal_masuk_kerja->diffInYears())
						{{ link_to_route('detail', 'Lihat Username/Password', array($data->nik), array('class' => 'btn danger small')) }}
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
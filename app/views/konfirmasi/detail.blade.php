@extends('layout')
@section('content')
	<h1>Detail Data Karyawan Lembur</h1>
	<table class="full">
		<thead>
			<th>NIK</th>
			<th>NAMA</th>
			<th>BAGIAN</th>
		</thead>
		<tbody>
			@foreach ($pengajuan as $data)
				<tr>
					<td>{{ $data->nik }}</td>
					<td>{{ $data->karyawan['nama'] }}</td>
					<td>{{ $data->karyawan['bagian']['nama'] }}</td>
					<!-- <td>10%</td> -->
				
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	{{ link_to('konfirmasi', 'Kembali', array('class' => 'btn primary right')) }}
@stop
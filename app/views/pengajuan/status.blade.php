@extends('layout')
@section('content')
	<table class="full">
		<thead>
			<th>NO SPL</th>
			<th>Tanggal</th>
			<th>Jam Mulai</th>
			<th>Jam Selesai</th>
			<th>Bagian</th>
			<th>Keperluan</th>
			<th>Status</th>
			<!-- <th>Action</th> -->
		</thead>
		<tbody>
			@foreach ($pengajuan as $data)
				<tr>
					<td> {{ $data->no_spl }} </td>
					<td> {{ $data->tanggal }} </td>
					<td> {{ $data->mulai }} </td>
					<td> {{ $data->selesai }} </td>
					<td> {{ $data->bagian->nama }} </td>	
					<td> {{ $data->keperluan }} </td>
					<td> {{ $data->status }} </td>
					<!-- <div class="modal" id="{{ $data->no_spl }}">
						@foreach ($data->dataPengajuan()->get() as $karyawan)
							{{ $karyawan->nik }}
						@endforeach
					<div> -->
					<!-- <td>link_to_route()</td> -->
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

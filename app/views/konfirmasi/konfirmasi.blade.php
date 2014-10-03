@extends('layout')
@section('content')
	<table class="full">
		<thead>
			<th>TANGGAL</th>
			<th>WAKTU</th>
			<th>KEPERLUAN</th>
			<th>BAGIAN</th>
			<!-- <th>KARYAWAN SEDANG CUTI</th> -->
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($pengajuan as $data)
				<tr>
					<td>{{ $data->tanggal }}</td>
					<td>{{ $data->mulai }} Sampai {{ $data->selesai }}</td>
					<td>{{ nl2br($data->keperluan) }}</td>
					<td>{{ $data->bagian->nama }}</td>
					<!-- <td>10%</td> -->
					<td>
						{{ link_to_route('setuju', 'Setuju', $data->no_spl, array('class' => 'btn primary small')) }}
						{{ link_to_route('tolak', 'Tolak', $data->no_spl, array('class' => 'btn danger small')) }}
						{{ link_to_route('detail-lembur', 'Detail', $data->no_spl, array('class' => 'btn alert small')) }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
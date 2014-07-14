@extends('layout')
@section('content')
	<h2>Rekap Data Lembur</h2>
	<div class="row">
		@if ($mulai && $selesai)
			<div class="grid-4">Tanggal : <strong>{{ $mulai }}</strong> Sampai <strong>{{ $selesai }}</strong></div>
		@endif
	</div>
	<table width="100%" cellpadding="10px" border="1px">
		<thead>
			<tr>
				<th>Nama Bagian</th>
				<th>Lama Lembur</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($laporan->get() as $data) 
			<tr>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->lama_lembur }} Jam</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
@extends('layout')
@section('content')
	<h2>Laporan Lembur</h2>
	<div class="row">
		<div class="grid-4">Tahun : {{ date('Y') }}</div>
		<div class="grid-4 offset-1">Bulan : {{ date('F') }}</div>
		<div class="grid-4 offset-1">Bagian : {{ $bagian }}</div>
	</div>
	<table class="full">
		<thead>
			<th>NIK</th>
			<th>NAMA</th>
			<th>LAMA LEMBUR</th>
		</thead>
		@foreach ($dataLembur as $data)
			<tr>
				<td>{{ $data->nik }}</td>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->lama_lembur }} Jam</td>
			</tr>
		@endforeach
	</table>
@stop
@extends('layout')
@section('content')  
	{{ link_to('pimpinan/create', 'Pimpinan Baru', array('class' => 'btn success big')) }}

	<table class="full">
		<thead>
			<th>NAMA BAGIAN</th>
			<th>PIMPINAN BAGIAN</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($pimpinan as $data)
			<tr>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->bagian->nama }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('pimpinan.destroy', $data->nik))) }}
						{{ Form::submit('Hapus', array('class' => 'btn danger small')) }}
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
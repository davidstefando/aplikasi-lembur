@extends('layout')
@section('content')
	{{ link_to('hr/create', 'HR Baru', array('class' => 'btn success big')) }}

	<table class="full">
		<thead>
			<th>NAMA</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($hr as $data)
			<tr>
				<td>{{ $data->nama }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('hr.destroy', $data->nik))) }}
						{{ Form::submit('Hapus', array('class' => 'btn danger small')) }}
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
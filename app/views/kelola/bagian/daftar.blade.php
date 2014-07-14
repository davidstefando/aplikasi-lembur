@extends('layout')
@section('content')	     
	{{ link_to('bagian/create', 'Bagian Baru', array('class' => 'btn success big')) }}

	<table class="full">
		<thead>
			<th>NAMA BAGIAN</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($bagian as $data)
			<tr>
				<td>{{ $data->nama }}</td>
				<td>
					{{ link_to_route('bagian.edit', 'Edit', $data->id, array('class' => 'btn primary small')) }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
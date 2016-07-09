@extends('layouts.master')

@section('content')
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Address</th>
				<th>Profession</th>
			</tr>
		</thead>
		<tbody>
			@foreach($teachers as $teacher)
			<tr>
				<td>{{$teacher->id}}</td>
				<td>{{$teacher->name}}</td>
				<td>{{$teacher->address}}</td>
				<td>{{$teacher->profession}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
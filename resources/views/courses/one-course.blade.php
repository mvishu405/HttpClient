@extends('layouts.master')

@section('content')
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$course->id}}</td>
				<td>{{$course->title}}</td>
				<td>{{$course->description}}</td>
				<td>{{$course->value}}</td>
			</tr>
		</tbody>
	</table>
@endsection
@extends('layouts.master')

@section('content')
	<form action="{{url('/teachers/courses/create')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Create a Course</legend>
	
		<div class="form-group">
			<label for="">Title</label>
			<input type="text" class="form-control" name="title" required>
		</div>

		<div class="form-group">
			<label for="">Description</label>
			<input type="text" class="form-control" name="description" required>
		</div>

		<div class="form-group">
			<label for="">Value</label>
			<input type="number" class="form-control" name="value" required>
		</div>

		<div class="form-group">
			<label for="">Teacher</label>
			<select name="teacherId" class="form-control" required>
				<option>Select a Teacher</option>
				@foreach($teachers as $teacher)
				<option value="{{$teacher->id}}">{{$teacher->name}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Create Course</button>
	</form>
@endsection
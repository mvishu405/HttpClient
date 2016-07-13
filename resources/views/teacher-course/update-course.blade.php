@extends('layouts.master')

@section('content')
	<form action="{{url('/teachers/courses/update')}}" method="POST" role="form">
		{{csrf_field()}}
		{{method_field('PUT')}}
		<legend>Update a Course</legend>

		<input type="hidden" name="courseId" class="form-control" value="{{$course->id}}">
	
		<div class="form-group">
			<label for="">Title</label>
			<input type="text" class="form-control" name="title" required value="{{$course->title}}">
		</div>

		<div class="form-group">
			<label for="">Description</label>
			<input type="text" class="form-control" name="description" required value="{{$course->description}}">
		</div>

		<div class="form-group">
			<label for="">Value</label>
			<input type="number" class="form-control" name="value" required value="{{$course->value}}">
		</div>

		<div class="form-group">
			<label for="">Teacher</label>
			<select name="teacherId" class="form-control" required>
				<option>Select a Teacher</option>
				@foreach($teachers as $teacher)
				<option value="{{$teacher->id}}" {{$course->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Update Course</button>
	</form>
@endsection
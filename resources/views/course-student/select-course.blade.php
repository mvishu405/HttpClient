@extends('layouts.master')

@section('content')
	<form action="{{url('/courses/students')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Select the Course</legend>
	
		<div class="form-group">
			<label for="">Course Id</label>
			<select name="courseId" class="form-control" required="required">
				<option>Select a Course</option>
				@foreach($courses as $course)
				<option value="{{$course->id}}">{{$course->title}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Show Course Students</button>
	</form>
@endsection
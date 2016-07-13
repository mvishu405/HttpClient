@extends('layouts.master')

@section('content')
	<form action="{{url('/courses/students/add')}}" method="POST" role="form">
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

		<legend>Select the Student</legend>
	
		<div class="form-group">
			<label for="">Student Id</label>
			<select name="studentId" class="form-control" required="required">
				<option>Select a Student</option>
				@foreach($students as $student)
				<option value="{{$student->id}}">{{$student->name}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Add Student to Course</button>
	</form>
@endsection
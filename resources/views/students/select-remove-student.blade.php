@extends('layouts.master')

@section('content')
	<form action="{{url('/student/remove')}}" method="POST" role="form">
		{{csrf_field()}}
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
	
		
	
		<button type="submit" class="btn btn-primary">Remove Student</button>
	</form>
@endsection
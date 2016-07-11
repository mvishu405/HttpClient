@extends('layouts.master')

@section('content')
	<form action="{{url('/teacher/remove')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Select the Teacher</legend>
	
		<div class="form-group">
			<label for="">Teacher Id</label>
			<select name="teacherId" class="form-control" required="required">
				<option>Select a Teacher</option>
				@foreach($teachers as $teacher)
				<option value="{{$teacher->id}}">{{$teacher->name}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Remove Teacher</button>
	</form>
@endsection
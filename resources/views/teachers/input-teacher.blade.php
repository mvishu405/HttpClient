@extends('layouts.master')

@section('content')
	<form action="{{url('/teacher')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Input the Teacher Id</legend>
	
		<div class="form-group">
			<label for="">Teacher Id</label>
			<input type="number" class="form-control" placeholder="The teacher Id" name="teacherId" required value="{{old('teacherId')}}">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Show Teacher</button>
	</form>
@endsection
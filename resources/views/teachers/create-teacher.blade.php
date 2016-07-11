@extends('layouts.master')

@section('content')
	<form action="{{url('/teacher/create')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Create a Teacher</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" required>
		</div>

		<div class="form-group">
			<label for="">Address</label>
			<input type="text" class="form-control" name="address" required>
		</div>

		<div class="form-group">
			<label for="">Phone</label>
			<input type="text" class="form-control" name="phone" required>
		</div>

		<div class="form-group">
			<label for="">Profession</label>
			<select name="profession" class="form-control" required>
				<option>Select a Profession</option>
				<option value="math">Math</option>
				<option value="physics">Physics</option>
				<option value="engineering">Engineering</option>
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Create Teacher</button>
	</form>
@endsection
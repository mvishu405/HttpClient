@extends('layouts.master')

@section('content')
	<form action="{{url('/teacher/remove')}}" method="POST" role="form">
		{{csrf_field()}}

		{{method_field('DELETE')}}

		<legend>Delete a Teacher</legend>

		<p>You are about to remove this teacher, please confirm</p>

		<input type="hidden" name="id" class="form-control" value="{{$teacher->id}}">
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" value="{{$teacher->name}}" required disabled>
		</div>

		<div class="form-group">
			<label for="">Address</label>
			<input type="text" class="form-control" name="address" value="{{$teacher->address}}" required disabled>
		</div>

		<div class="form-group">
			<label for="">Phone</label>
			<input type="text" class="form-control" name="phone" value="{{$teacher->phone}}" required disabled>
		</div>

		<div class="form-group">
			<label for="">Profession</label>
			<select name="profession" class="form-control" required disabled>
				<option>Select a Profession</option>
				<option value="math" {{$teacher->profession == 'math' ? 'selected' : ''}}>Math</option>
				<option value="physics" {{$teacher->profession == 'physics' ? 'selected' : ''}}>Physics</option>
				<option value="engineering" {{$teacher->profession == 'engineering' ? 'selected' : ''}}>Engineering</option>
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Remove Teacher</button>
	</form>
@endsection
@extends('layouts.app')
@section('content')
		<form action="/add_admin" method="post">
	
			<div class="con_left">
				{{ csrf_field() }}

				<label for="usr" id="text1">Admin_id:</label>

				<input type="text" class="form-control" name="Admin_id">

				<label for="adn" id="text1">Admin_name:</label>

		      	<input type="text" class="form-control" name="Admin_name">

			    <label for="pwd" id="text1">Admin_Password:</label>

		      	<input type="password" class="form-control" name="Admin_password">

		      	<button class="btn success">Add</button>
			</div>	
		</form>
@endsection

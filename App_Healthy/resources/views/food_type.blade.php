@extends('layouts.app')
@section('content')
	@if(Session::has('message'))
			<div id="alert_i">
				{{ Session::get('message') }}
			</div>
	@endif
	<div class="con_food_type">
			
		<div id="create_food_type">
			<a href="{{ url('/cfood_type') }}" class="btn_add">Add Food Type</a>
		</div>
			<table>
				<tr>
					<td>No.</td>
					<td>รหัสประเภทอาหาร</td>
					<td>ประเภทอาหาร</td>
					<td>Action</td>
				</tr>
			<!-- 	{{$i = 1}} -->
				@foreach($data as $value)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$value->Food_type_id}}</td>
						<td>{{$value->Food_type}}</td>
						<td>
							<a href="/efood_type&{{ $value->Food_type_id }}" id="btn_foodtype"><button id="edit_cfoodtype">Edit</button></a> 
							
							<a href="/delete_food_type/{{ $value->Food_type_id }}">
							<button id="delete_cfoodtype">delete</button>
							</a>
						</td>
					</tr>
				@endforeach
			</table>
	
	</div>
	
@endsection
@extends('layouts.app')
@section('content')

	@if(Session::has('message'))
			<div id="alert_i">
				{{ Session::get('message') }}
			</div>
	@endif

	<div class="con_food_type">
			
		<div id="create_food_type">
			<a href="{{ url('/cfood') }}" class="btn_add">Add Food</a>
		</div>
		<table>
				<tr>
					<td>No.</td>
					<td>ชื่อรายการอาหาร</td>
					<td>จำนวนแคลอรี่</td>
					<td>ประเภทอาหาร</td>
					<td>Action</td>
				</tr>
				<!-- {{$i = 1}} -->
				@foreach($data as $value)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$value->Food_name}}</td>
						<td>{{$value->Food_cal}}</td>

						@foreach($data2 as $values)
							@if($value->Food_type_id == $values->Food_type_id)
								<td >{{$values->Food_type}}</td>
							@endif
						@endforeach
						<td>
							<a href="/efood&{{ $value->Food_id }}" id="btn_foodtype"><button id="edit_cfoodtype">Edit</button></a>

							<a href="/delete_food/{{ $value->Food_id }}">
							<button id="delete_cfoodtype">delete</button></a>

						</td>
					</tr>
				@endforeach
			</table>
		
	</div>
@endsection
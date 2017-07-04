@extends('layouts.app')
@section('content')
<div class="con_food_type">
			
		<div id="create_food_type">
			<a href="{{ url('/cexercise') }}" class="btn_add">Add Exercise</a>
			
		</div>
		<table>
				<tr>
					<td>No.</td>
					<td>รูปแบบการออกกำลังกาย</td>
					<td>อัตราการเผาผลาญ ต่อนาที</td>
					<td>ไอคอน</td>
					<td>Action</td>
				</tr>
				<!-- {{$i = 1}} -->
				@foreach($data as $value)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$value->Et_name}}</td>
						<td>{{$value->Et_cal}}</td>
						<td><img src="/image/icon_exercise/{{$value->Et_pic}}" width="50px;" height="50px;"></td>
						<td>
							<a href="/e_exercise&{{ $value->Et_id }}" id="btn_foodtype"><button id="edit_cfoodtype">Edit</button></a> 
							<a href="/delete_exercise/{{ $value->Et_id }}">
							<button id="delete_cfoodtype">delete</button></a>
						</td>
					</tr>
				@endforeach
			</table>
	</div>
@endsection
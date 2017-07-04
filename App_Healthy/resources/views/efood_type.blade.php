@extends('layouts.app')
@section('content')
	<form method="post" action="/update_foodtype&{Food_type_id}">
			<div class="con_left_cfood_type">
			@foreach($data as $value)
				<div id="box">แก้ไขรายการอาหาร</div>
				
					<label for="fi" id="text" ">รหัสประเภทอาหาร</label>
			      	<input type="text" class="form-control_cfood" name="Food_type_id" value="{{$value->Food_type_id}}"> 
				    <label for="fn" id="text">ประเภทอาหาร</label>
			      	<input type="text" class="form-control_cfood" name="Food_type"
			      	value="{{$value->Food_type}}">

				<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
		      	<button class="btn_cadd">ยืนยัน</button>
		      	<a href="{{ url('/food_type') }}" class="btn_next">กลับหน้าแรก</a>  	
		      @endforeach
			</div>	

	</form>
@endsection
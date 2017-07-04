@extends('layouts.app')
@section('content')
	<form  method="post" id="food" action="/update_food&{Food_id}">
			<div class="con_left_cfood_add">
				<div id="box">เพิ่มรายการอาหาร</div>
				@foreach($data_food as $value)
				
				<label for="fi" id="text">รหัสรายการอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_id" value="{{$value->Food_id}}">
			    <label for="fn" id="text">ชื่อรายการอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_name" value="{{$value->Food_name}}">
		      	<label for="fc" id="text">จำนวนแคอลรี่</label>
		      	<input type="text" class="form-control_cfood" name="Food_cal" value="{{$value->Food_cal}}">
		      	<label for="fti" id="text">รหัสประเภทอาหาร</label>
		      
				  <select id="select_food" name="Food_type_id" form="food" > 
			      	
			      		 @foreach($data_type as $values)

			      		 	<option value="{{$values->Food_type_id}}" selected="{{$value->Food_type_id}}" >{{$values->Food_type}}
			      		 	</option>
			      		@endforeach 
			      	
			      </select>
				
			      
			    
		      	<!-- <input type="text" class="form-control_cfood" name="Food_type_id"> -->
		      	<label for="fti" id="text">รหัสผู้ดูแลระบบ</label>
		      	<input type="text" class="form-control_cfood" name="Admin_id" value="{{$value->Admin_id}}">
		      	@endforeach
		      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		      	<button class="btn_cadd">ยืนยัน</button>
		      	<a href="{{ url('/food') }}" class="btn_next">กลับหน้าแรก</a>  	
			</div>	
		</form>
@endsection
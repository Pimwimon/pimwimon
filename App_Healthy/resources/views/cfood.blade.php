@extends('layouts.app')
@section('content')
	<form action="/insert_food" method="post" id="food">
			<div class="con_left_cfood_add">
				<div id="box">เพิ่มรายการอาหาร</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="fi" id="text">รหัสรายการอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_id">
			    <label for="fn" id="text">ชื่อรายการอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_name">
		      	<label for="fc" id="text">จำนวนแคอลรี่</label>
		      	<input type="text" class="form-control_cfood" name="Food_cal">
		      	<label for="fti" id="text">รหัสประเภทอาหาร</label>
		      
				  <select id="select_food" name="Food_type_id" form="food">
			      		@foreach($data as $value)
			      		 	<option value="{{$value->Food_type_id}}">{{$value->Food_type}}
			      		 	</option>
			      		@endforeach 
			      </select>
				
		      	<!-- <input type="text" class="form-control_cfood" name="Food_type_id"> -->
		      	<label for="fti" id="text">รหัสผู้ดูแลระบบ</label>
		      	<input type="text" class="form-control_cfood" name="Admin_id" value="{{session()->get('Admin_id')}}" disabled="true">
		      	<button class="btn_cadd">ยืนยัน</button>
		      	<a href="{{ url('/food') }}" class="btn_next">กลับหน้าแรก</a>  	
			</div>	
		</form>
@endsection
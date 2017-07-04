@extends('layouts.app')
@section('content')
	<form action="/insert_food_type" method="post">
			<div class="con_left_cfood_type">
				<div id="box">เพิ่มประเภทอาหาร</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="adn" id="text">รหัสประเภทอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_type_id">
			    <label for="pwd" id="text">ประเภทอาหาร</label>
		      	<input type="text" class="form-control_cfood" name="Food_type">
		      	<button class="btn_cadd">ยืนยัน</button>
		      	<a href="{{ url('/food_type') }}" class="btn_next">กลับหน้าแรก</a>  	
			</div>	
		</form>
@endsection
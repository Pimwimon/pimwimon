@extends('layouts.app')
@section('content')
	<form  method="post" enctype="multipart/form-data" action="/update_exercise&{Et_id}">
			<div class="con_left_cexercie_add">
				<div id="box">เพิ่มรายการอาหาร</div>
				@foreach($data_exercise as $value)
					
					<label for="fi" id="text">รหัสรูปแบบการออกกำัลงกาย</label>
			      	<input type="text" class="form-control_cfood" name="Exercise_id" value="{{$value->Et_id}}">

				    <label for="fn" id="text">ชื่อรูปแบบการออกกำัลงกาย</label>
			      	<input type="text" class="form-control_cfood" name="Exercise_name" value="{{$value->Et_name}}">

			      	<label for="fc" id="text">อัตราการเผาผลาญแคลอรี่ (ต่อนาที)</label>
			      	<input type="text" class="form-control_cfood" name="Exercise_cal" value="{{$value->Et_cal}}">

			      	<label for="fc" id="text">ไอคอนการออกกำลังกาย</label>
			      	<input type="file" name="File_exercise" class="file_exercise" value="{{$value->Et_pic}}">

			      	<label for="fc" id="text">Admin_id</label>
					<input type="text" class="form-control_cfood" name="Admin_id" value="{{$value->Admin_id}}">

			      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			      	<button class="btn_cadd">ยืนยัน</button>
			      	<a href="{{ url('/exercise') }}" class="btn_next">กลับหน้าแรก</a>  	
			     @endforeach
			</div>	
		</form>
@endsection
@extends('layouts.app')
@section('content')
	<form action="/insert_exercise" method="post" enctype="multipart/form-data">
			<div class="con_left_cexercie_add">
				<div id="box">เพิ่มรายการอาหาร</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="fi" id="text">รหัสรูปแบบการออกกำัลงกาย</label>
		      	<input type="text" class="form-control_cfood" name="Exercise_id">
			    <label for="fn" id="text">ชื่อรูปแบบการออกกำัลงกาย</label>
		      	<input type="text" class="form-control_cfood" name="Exercise_name">
		      	<label for="fc" id="text">อัตราการเผาผลาญแคลอรี่ (ต่อนาที)</label>
		      	<input type="text" class="form-control_cfood" name="Exercise_cal">
		      	<label for="fc" id="text">ไอคอนการออกกำลังกาย</label>
		      	<input type="file" name="File_exercise" class="file_exercise">
		      	<label for="fc" id="text">Admin</label>
		      	<input type="text" class="form-control_cfood" name="Admin_id" value="{{session()->get('Admin_id')}}" disabled="true">
		      	<button class="btn_cadd">ยืนยัน</button>
		      	<a href="{{ url('/exercise') }}" class="btn_next">กลับหน้าแรก</a>  	
			</div>	
		</form>
@endsection
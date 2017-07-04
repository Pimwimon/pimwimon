<!DOCTYPE html>
<html>
<head>
	<title>Healthy Systems</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index_add.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/cfood.css">
	<link rel="stylesheet" href="css/efood_type.css">
	<link rel="stylesheet" href="css/Nowexercise.css">
	<link rel="stylesheet" href="css/Addfood_type.css">
	<link rel="stylesheet" href="css/cfood_type.css">
	<link rel="shortcut icon" href="/image/logo3.png" type="image/x-icon">
</head>

<body>
	<div class="container">
		<div id="header">
			<div class="topnav" id="myTopnav">
			  <div id="logo"></div>
			  <a href="{{ url('/index') }}">หน้าแรก</a>
			  <a href="{{ url('/add_admin') }}">เพิ่มผู้ดูแลระบบ</a>
			  <a href="{{ url('/food_type') }}">ประเภทอาหาร</a>
			  <a href="{{ url('/food') }}">รายการอาหาร</a>
			  <a href="{{ url('/exercise') }}">ข้อมูลการออกกำลังกาย</a>
			  <a href="{{ url('/logout') }}">ออกจากระบบ</a>
			</div>
		</div>
	@yield('content')
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Healthy Systems</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="/image/logo3.png" type="image/x-icon">
</head>

	<div class="container">
		<div id="header">
			<div id="logo"></div>
			<div id="app_f"> Application For Healthy System</div>
		</div>
		
		<form action="/loginprocess" method="post">
			<div class="con_left">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="adn">Admin_id:</label>
		      	<input type="text" class="form-control" name="Admin_id">
			    <label for="pwd">Admin_Password:</label>
		      	<input type="password" class="form-control" name="Admin_password">
		      	<button class="btn success">login</button>
		    	
			</div>	
		</form>
		
	</div>
</body>
</html>
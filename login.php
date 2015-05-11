<!DOCTYPE html>
<html>
<head>
	<title>Time Boss</title>
	<link rel="stylesheet" href="stylesheets/bootstrap/css/bootstrap.min.css" type="text/css" >
	<script src="stylesheets/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheets/main.css" type="text/css" >
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans|Audiowide|Play">

</head>
<body>
	<?php include 'header-template.php' ?>

	<div id="main-welcome" class="row margin-0">
		<div id="welcome-text">
			<h1>Let Us Manage Your Time</h1>
			<h3>Time Boss is an innovative app that allows you to schedule your daily activities more efficiently. Using well renowned scheduling algorithms Time Boss organises your day in the best way possible giving you the most optimised schedule.</h3>
		</div>
	</div>

	
	<div id="c_main_container" class="row margin-0">
		<div id='form-box'>
			<h2>Login</h2>
			<form action="">
				<div class="form-group">
					<label for="email-field">Email</label>
					<input type="email" id="email-field" class="form-control" placeholder="Enter Your Email Address" >
				</div>
				<div class="form-group">
					<label for="password-field">Password</label>
					<input type="password" id="password-field" class="form-control" placeholder="Enter Your Password" >
				</div>
				<input type="submit" class="btn btn-primary btn-lg" name="login_mode" value="Login">
				<input type="submit" class="btn btn-defualt btn-lg" name="login_mode" value="Forgot Password">
			</form>
		</div>
	</div>
</body>


</html>
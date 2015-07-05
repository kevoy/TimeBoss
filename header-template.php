<?php
require_once('User.php');
$current_url = $_SERVER['REQUEST_URI'];
$current_page = "";
if(strpos($current_url, "index.php") != false){
	$current_page = "home";
}else if(strpos($current_url, "login.php") != false){
	$current_page = "login";
}else if(strpos($current_url, "signup.php") != false){
	$current_page = "signup";
}else if(strpos($current_url, "download.php") != false){
	$current_page = "download";
}else if(strpos($current_url, "account.php") != false){
	$current_page = "account";
}else if(strpos($current_url, "logout.php") != false){
	$current_page = "logout";
}

?>
<div id="top-nav" class="row margin-0 ">
		<div id='top-nav-title-holder' class="col-md-6">
			<h1>Time <span class="c_blue">Boss</span></h1>
		</div>
		<div id='top-nav-links-holder' class="col-md-6">
			<a href="index.php" class="<?php if($current_page=="home"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-home"></span>HOME</a>
			<a href="download.php" class="<?php if($current_page=="download"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-download-alt"></span>APP</a>
			<?php if(User::isLoggedIn()): ?>
				<a href="account.php" class="<?php if($current_page=="account"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-cog"></span>MY ACCOUNT</a>
				<a href="main.php?class=user&method=logout" class="<?php if($current_page=="logout"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-log-out"></span>LOGOUT</a>
			<?php else: ?>
				<a href="signup.php" class="<?php if($current_page=="signup"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-user"></span>SIGN UP</a>
				<a href="login.php" class="<?php if($current_page=="login"){ echo "c_selected";} ?>"><span class="margin-10 glyphicon glyphicon-log-in"></span>LOGIN</a>
			<?php endif ?>
		</div>
	</div>
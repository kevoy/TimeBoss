<?php
session_start();
require_once('DBConnector.php');
//require_once('schedule.php');
class User{
	public $schedule;
	public $user_id;
	public function __construct($user_id='123'){
		$this->user_id = $user_id;
	}
	public function getID(){
		return $this->user_id;
	}
	//for all methods below just echo the results
	//get current user id from the session variable $_SESSION['user_id'] NB:complete login method first
	// return id eg: 12a45
	public static function getUserId(){
		//replace with actual
		return $_SESSION['user_id'];
	}

	//using the session variable $_SESSION['user_id'] query the database table 'user' for the corresponding email address for the user
	//return email eg:at@yahoo.com
	public function getUserEmail(){
		//follow this example, add session variable to the sql select statement using a where clause
		$result = queryDB("Select email from user where user_id = '$this->user_id';");
		$row = mysql_fetch_array($result);
		return $row['email'];
	}

	public Static function getMyEmail(){
		$user_id = User::getUserId();
		$result = queryDB("Select email from user where user_id = '$user_id'");
		$row = mysql_fetch_array($result);
		return $row['email'];
	}
	//return current user password, similarly to above method
	public function getPassword(){

	}

	//leave for now, this should set the 'app_connected' field in the user database to true as soon as it detects the app
	public function isVerified(){

	}
	//insert new user in user table, return false if email is already in table otherwise return "success"
	public static function signup($email, $password){
		$user_id = User::getRandNum();
		$schedule_id = User::getRandNum();
		$result = queryDB("INSERT INTO user VALUES ('$user_id','$email', '$password', 'true');");
		$result2 = queryDB("INSERT INTO schedule VALUES ('$schedule_id', 'schedule', '2015-05-08 00:00:00','0', '0', '0', 'private')");
		$result3 = queryDB("INSERT INTO creates VALUES ('$user_id','$schedule_id');");
		$_SESSION['user_id'] = $user_id;

		return "success";
	}
	public static function getRandNum(){
		return rand(1, 10000);
	}
	//return boolean value true or false by querying the database table 'user' for the corresponding  'app_conected' field for 
	//the current user using the session variable $_SESSION['user_id']
	public function appConnected(){

	}

	//set the session variable $_SESSION['user_id'] to the user_id corresponding to the email and password from the user table, ignore the $landing _page vaiable for now
	//return string: logged_in or login_auth_fail
	public static function login($email, $password, $landing_page = "index.php"){
		$result = queryDB("SELECT user_id FROM user WHERE email ='".esc($email)."' and password = '" .esc($password). "';");
		$row = mysql_fetch_array($result);
		if(mysql_num_rows($result)<1){
			return "fail";
		}else{
			$_SESSION['user_id'] = $row['user_id'];
			return "success";
		}
	}

	//check if the session variable $_SESSION['user_id'] is set, if it is set return true if not return false
	public static function isLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return true;
		}else{
			return false;
		}
	}

	//ignore for now, this should automatically redirect the user to the login page if he/she tries to access a page that requires login but the user is not logged in
	public static function loginRequired(){
		if(!User::isLoggedIn()){
			header("Location: login.php");
		}
	}
	//kill session varable $_SESSION['user_id']
	public static function logout(){
		session_destroy();
		header("Location: index.php");
	}
	public static function validateUsername($username){
		$result = queryDB("Select * from user Where email='$username'");
		if(mysql_num_rows($result)<1){
			return "no_user";
		}
		return "success";
	}
	public static function getIdFromName($username){
		$result = queryDB("Select * from user Where email='$username'");
		if(mysql_num_rows($result)<1){
			return "no_user";
		}else{
			$row= mysql_fetch_array($result);
			return $row['user_id'];
		}
	}
	public static function getNumUsers(){
		$result = queryDB("Select * from user");
		return mysql_num_rows($result);
	}
}

?>
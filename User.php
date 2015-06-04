<?php
require_once('DBConnector.php');
session_start();
// example url http://localhost/TimeBoss/User.php?class=user&method=get_user_id
if(isset($_REQUEST['class'])){
	if($_REQUEST['class']=="user"){
		//follow the trend, create parameters for 'method' that should call on the functions you completed below and test eachby visiting example url above replacing 'get_user_id' with the appropiate method parameter
		if($_REQUEST['method']=="get_user_id"){
			return getUserId();
		}
		else if($_REQUEST['method']=="get_user_email"){
			return getUserId();
		}
		else if($_REQUEST['method']=="login"){
			$email = $_REQUEST['email']; //note these parameters must be in url as well when testing
			$password = $_REQUEST['password'];
			return login($email, $password);
		}
		//etc..
	}
}


//for all methods below just echo the results
//get current user id from the session variable $_SESSION['user_id'] NB:complete login method first
// return id eg: 12a45
function getUserId(){
	//replace with actual
	return '1234';
}

//using the session variable $_SESSION['user_id'] query the database table 'user' for the corresponding email address for the user
//return email eg:at@yahoo.com
function getUserEmail(){
	//follow this example, add session variable to the sql select statement using a where clause
	$result = queryDB("Select * from user limit 1");
	$row = mysql_fetch_array($result);
	echo $row['email'];
	return $row['email'];
}

//return current user password, similarly to above method
function getPassword(){

}

//leave for now, this should set the 'app_connected' field in the user database to true as soon as it detects the app
function isVerified(){

}
//insert new user in user table, return false if email is already in table otherwise return "success"
function newUser($email, $password){

}

//return boolean value true or false by querying the database table 'user' for the corresponding  'app_conected' field for 
//the current user using the session variable $_SESSION['user_id']
function appConnected(){

}

//set the session variable $_SESSION['user_id'] to the user_id corresponding to the email and password from the user table, ignore the $landing _page vaiable for now
//return string: logged_in or login_auth_fail
function login($email, $password, $landing_page = "index.php"){

}

//check if the session variable $_SESSION['user_id'] is set, if it is set return true if not return false
function isLoggedIn(){
return false;
}

//ignore for now, this should automatically redirect the user to the login page if he/she tries to access a page that requires login but the user is not logged in
function logginRequired(){

}
//kill session varable $_SESSION['user_id']
function logout(){

}
?>
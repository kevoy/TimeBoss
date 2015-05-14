<?php
require 'User.php';
if(isset($_REQUEST['class'])){
	if($_REQUEST['class']=="meeting"){
		//follow the trend, create parameters for 'method' that should call on the functions you completed below and test eachby visiting example url above replacing 'get_user_id' with the appropiate method parameter
		if($_REQUEST['method']=="get_num_users"){
			$meeting_id = $_REQUEST['meeting_id'];
			return getMeetingInvites();
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

function getNumUsers($meeting_id){
	$result = queryDB("Select num_users from group_meeting where meeting_id = '$meeting_id'");
	$row = mysql_fetch_array($result);
	echo $row['num_users'];
	return $row['num_users'];
}
function getRequestsAccepted($meeting_id){
	$result = queryDB("Select requests_accepted from group_meeting where meeting_id = '$meeting_id'");
	$row = mysql_fetch_array($result);
	echo $row['requests_accepted'];
	return $row['requests_accepted'];
}
function setNumUsers($meeting_id, $num){
	$result = queryDB("Update group_meeting set num_users = '$num' where meeting_id = '$meeting_id'");
	return $row['num_users'];
}
function setRequestsAccepted($meeting_id,$num){
	$result = queryDB("Update group_meeting set requests_accepted = '$num' where meeting_id = '$meeting_id'");
	return $row['requests_accepted'];
}
function getUsersInMeeting($meeting_id){
	$result = queryDB("Select user_id from groups where meeting_id = '$meeting_id'");
	$users = array();
	while($row = mysql_fetch_array($result)){
		$user[] = $row['user_id'];
	}
	echo $user[0];
	return $users;
}
function getMyMeetings(){
	$cur_user = getUserId();
	$result = queryDB("Select meeting_id from group_meeting where meeting_leader = '$cur_user'");
	$meetings = array();
	while($row = mysql_fetch_array($result)){
		$meetings[] = $row['meeting_id'];
	}
	echo $meetings[0];
	return $meetings;

}
function getMeetingOwner($meeting_id){
	$result = queryDB("Select meeting_leader from group_meeting where meeting_id = '$meeting_id'");
	$row = mysql_fetch_array($result);
	echo $row['meeting_leader'];
	return $row['meeting_leader'];
}
function getMeetingInvites(){
	$cur_user = getUserId();
	$result = queryDB("Select meeting_id from groups where user_id = '$cur_user'");
	$meetings = array();
	while($row = mysql_fetch_array($result)){
		$meetings[] = $row['meeting_id'];
	}
	echo $meetings[0];
	return $meetings;
}
function getRequestStatus($meeting_id, $user){

}
function getMyMissedInvites(){

}
function getUsersDeclined($meeting_id){

}
function getSuggestedTime($meeting_id){

}
function setSuggestedTime($meeting_id, $time){
	$result = queryDB("Update group_meeting set suggested_time = '$time' where meeting_id = '$meeting_id'");
	return $row['suggested_time'];
}
function createNewMeetingTask($name, $location, $start, $end, $description, $access, $users, $suggested_time){

}
function getAvailableTimes($users){
	
}

?>
<?php
require_once('User.php');
if(isset($_REQUEST['class'])){
	//example url:http://localhost/TimeBoss/schedule.php?class=schedule&method=get_modified
	if($_REQUEST['class']=="schedule"){
		//follow the trend, create parameters for 'method' that should call on the functions you completed below and test each by visiting example url above replacing 'get_modified' with the appropiate method parameter
		if($_REQUEST['method']=="get_modified"){
			return getScheduleId();
		}
		else if($_REQUEST['method']=="num_tasks"){
			return getNumTasks();
		}
		//etc..
	}
}

//for all methods below just echo the results
//for methods below the correspond to the schedule for the current user, call getUserId() method from the user class to get the current user id
//using the user_id you can get the schedule id from the 'creates' table, so query the creates table to get this id you'll need it for all methods below


//return last_modified date value from the 'schedule' table, look at example in user class how to query table, do the same for all methods below
function getLastModified(){

}
function getScheduleId(){
	$user_id = getUserId();
	$result = queryDB("SELECT schedule_id from creates where user_id = '$user_id'");
	$row = mysql_fetch_array($result);
	return $row['schedule_id'];
}
function getNumTasks(){

}
function getNumActivities(){

}
function getNumGroupMeetings(){

}
function setLastModified($date){

}
function setNumTasks($num){

}
function setNumActivities($num){

}
function setNumGroupMeetings($num){
	
}
function setAccess($access){
	
}
function isUptoDate(){

}

function getAvailableTimesForUser($user_id){

}
?>
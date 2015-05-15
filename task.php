<?php
require_once('schedule.php');
if(isset($_REQUEST['class'])){
	if($_REQUEST['class']=="task"){
		if($_REQUEST['method']=="get_task_id"){
			getMyTaskIds();
		}
		else if($_REQUEST['method']=="get_task_name"){
			$task_id = $_REQUEST['task_id'];
			getTaskName($task_id);
		}else if($_REQUEST['method']=="add_task"){
			$name = $_REQUEST['name'];
			$location = $_REQUEST['location'];
			$sDate = $_REQUEST['sDate'];
			$eDate = $_REQUEST['eDate'];
			$mandatory= $_REQUEST['mandatory'];
			$sTime = $_REQUEST['sTime'];
			$eTime = $_REQUEST['eTime'];
			$priority = $_REQUEST['priority'];
			$name = $_REQUEST['name'];
			$repTrue = $_REQUEST['repTrue'];
			$desc = $_REQUEST['desc'];
			$access = $_REQUEST['access'];

			addNewTask($name, $location, $sDate, $eDate, $repTrue, $mandatory, $sTime, $eTime, $priority, $desc, $access);
		}
		//etc..
	}
}


//get task ids
// return id eg: [12a, 14w, 78h]
function getMyTaskIds(){
	$user_id = getUserId();
	$result = queryDB("select task_id from adds where user_id ='$user_id'");
	$task_ids=array();
	while ($row=mysql_fetch_array($result)) {
		$task_ids[]= $row['task_id'];
	}
	return $task_ids;
}

function getTaskName($task_id){
	$result = queryDB("select name from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['name'];
}

function getTaskStartDate($task_id){
	$result = queryDB("select startDate from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['startDate'];
}
function getTaskEndDate($task_id){
	$result = queryDB("select endDate from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['endDate'];
}
function getTaskStartTime($task_id){
	$result = queryDB("select startTime from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['startTime'];
}
function getTaskEndTime($task_id){
	$result = queryDB("select endTime from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['endTime'];
}
function getTaskLocation($task_id){
	$result = queryDB("select location from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['location'];
}
function isTaskMandatory($task_id){
	$result = queryDB("select mandatory from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	if( $row['mandatory']=="true"){
		return true;
	}else{
		return false;
	}
}
function getTaskPriority($task_id){
	$result = queryDB("select priority from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	return $row['priority'];
}
function isTaskRepetitive($task_id){
	$result = queryDB("select repetitive from task where task_id = '$task_id'");
	$row = mysql_fetch_array($result);
	if( $row['repetitive']=="true"){
		return true;
	}else{
		return false;
	}}
//etc..
function addNewTask($name, $location, $start, $end, $repeat, $mandatory,$sTime,$eTime, $priority, $description, $access){
	$task_id = getRandNum();
	$task_app_id = getRandNum();
	$user_id = getUserId();
	$schedule_id = getScheduleId();
	$result = queryDB("INSERT INTO task VALUES ('$task_id', '$task_app_id', '$name', '$location', '$start', '$end', '$repeat', '$mandatory','$sTime','$eTime', '$priority', '$description', '$access');");
	$result2 = queryDB("INSERT INTO adds VALUES ('$user_id', '$task_id')");
	$result3 = queryDB("INSERT INTO contains VALUES ('$schedule_id', '$task_id')");
}
function getRandNum(){
	return rand(1, 10000);
}
function editTask($task_id, $task_app_id, $name, $location, $start, $end, $repeat, $mandatory, $priority, $description, $access){

}
function setTaskCompleted($task_id){

}
function setAccessForSchedule($access){

}
function setAccessForTask($task_id){

}
?>
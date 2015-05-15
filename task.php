<?php
require 'DBConnector.php';
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
$results = queryDB("");
}

function getTaskName($task_id){

}

function getTaskDate($task_id){

}
//etc..
function addNewTask($name, $location, $start, $end, $repeat, $mandatory,$sTime,$eTime, $priority, $description, $access){
	$task_id = getRandNum();
	$task_app_id = getRandNum();
	$result = queryDB("INSERT INTO task VALUES ('$task_id', '$task_app_id', '$name', '$location', '$start', '$end', '$repeat', '$mandatory','$sTime','$eTime', '$priority', '$description', '$access');");
	
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
<?php
if(isset($_REQUEST['class'])){
	if($_REQUEST['class']=="task"){
		if($_REQUEST['method']=="get_task_id"){
			getMyTaskIds();
		}
		else if($_REQUEST['method']=="get_task_name"){
			$task_id = $_REQUEST['task_id'];
			getTaskName($task_id);
		}
		//etc..
	}
}


//get task ids
// return id eg: [12a, 14w, 78h]
function getMyTaskIds(){

}

function getTaskName($task_id){

}

function getTaskDate($task_id){

}
//etc..
function addNewTask($name, $location, $start, $end, $repeat, $mandatory, $priority, $description, $access){

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
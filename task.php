<?php
require_once('User.php');
require_once('schedule.php');
class Task{

	public $task_id;
	
	public function __construct($task_id){
		$this->task_id = $task_id;
	}
	public static function getMyTasks(){
		$user_id = User::getUserId();
		$my_tasks = Task::getTasks($user_id);
		return $my_tasks;
	}
	public static function getTasks($user_id){
		$result = queryDB("select task_id from adds where user_id ='$user_id'");
		$tasks=array();
		while ($row=mysql_fetch_array($result)) {
			$task_id= $row['task_id'];
			$current_task = new Task($task_id);
			$tasks[] = $current_task;
		}
		return $tasks;
	}
	public function getTaskId(){
		return $this->task_id;
	}

	public function getTaskName(){
		$result = queryDB("select name from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['name'];
	}
	public function getTaskDescription(){
		$result = queryDB("select description from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['description'];
	}
	public function getTaskAccess(){
		$result = queryDB("select access from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['access'];
	}

	public function getTaskStartDate(){
		$result = queryDB("select startDate from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['startDate'];
	}
	public function getTaskEndDate(){
		$result = queryDB("select endDate from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['endDate'];
	}
	public function getTaskStartTime(){
		$result = queryDB("select startTime from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['startTime'];
	}
	public function getTaskEndTime(){
		$result = queryDB("select endTime from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['endTime'];
	}
	public function getTaskLocation(){
		$result = queryDB("select location from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['location'];
	}
	public function isTaskMandatory(){
		$result = queryDB("select mandatory from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		if( $row['mandatory']=="true"){
			return true;
		}else{
			return false;
		}
	}
	public function getTaskPriority(){
		$result = queryDB("select priority from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		return $row['priority'];
	}
	public function isTaskRepetitive(){
		$result = queryDB("select repetitive from task where task_id = '$this->task_id'");
		$row = mysql_fetch_array($result);
		if( $row['repetitive']=="true"){
			return true;
		}else{
			return false;
		}}
	//etc..
	public static function addNewTask($name, $location, $start, $end, $repeat, $mandatory,$sTime,$eTime, $priority, $description, $access){
		$task_id = Task::getRandNum();
		$task_app_id = Task::getRandNum();
		$user_id = User::getUserId();
		$schedule_id = getScheduleId();
		$result = queryDB("INSERT INTO task VALUES ('$task_id', '$task_app_id', '$name', '$location', '$start', '$end', '$repeat', '$mandatory','$sTime','$eTime', '$priority', '$description', '$access');");
		$result2 = queryDB("INSERT INTO adds VALUES ('$user_id', '$task_id')");
		$result3 = queryDB("INSERT INTO contains VALUES ('$schedule_id', '$task_id')");
		return $task_id;
	}
	public static function getRandNum(){
		return rand(1, 10000);
	}
	public function editTask($task_app_id, $name, $location, $start, $end, $repeat, $mandatory, $priority, $description, $access){

	}
	public static function getNumTasks(){
		$result = queryDB("select * from task");
		return mysql_num_rows($result);
	}
	public function setTaskCompleted(){

	}
	public function setAccessForSchedule($access){

	}
	public function setAccessForTask($access){

	}
}
?>
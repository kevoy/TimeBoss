<?php
require_once('User.php');
require_once('optimised_tasks.php');
//OptimisedSchedule::addNewEntity('4432', '2015-07-10', '08:00:00', '09:00:00', 'false');
// $opt = new OptimisedSchedule(User::getUserId());
// $opt->generate();
// $opt->getLatestTime();

class OptimisedSchedule{
	public $monday_tasks = array();
	public $tuesday_tasks = array();
	public $wednesday_tasks = array();
	public $thursday_tasks = array();
	public $friday_tasks = array();
	public $saturday_tasks = array();
	public $sunday_tasks = array();
	public $user_id;
	public $entities=array();
	public function __construct($user_id){
		$this->user_id = $user_id;
		$this->getEntity_ids();
	}
	public function getEntity_ids(){
		$result = queryDB("select entity_id from generates where user_id ='$this->user_id'");
		while ($row=mysql_fetch_array($result)) {
			$entity_id= $row['entity_id'];
			$this->entities[] = $entity_id;
		}
		
	}
	public function generate(){
		foreach ($this->entities as $entity_id) {
			$task = new OptimisedTask($entity_id);
			$day = $task->getDay();
			if($day == "Mon"){
				$this->monday_tasks[]=$task;
			}else if($day == "Tue"){
				$this->tuesday_tasks[]=$task;
			}else if($day == "Wed"){
				$this->wednesday_tasks[]=$task;
			}else if($day == "Thu"){
				$this->thursday_tasks[]=$task;
			}else if($day == "Fri"){
				$this->friday_tasks[]=$task;
			}else if($day == "Sat"){
				$this->saturday_tasks[]=$task;
			}else if($day == "Sun"){
				$this->sunday_tasks[]=$task;
			}
		}
	}
	function getEarliestTime(){
		$earliest = strtotime('08:00:00');
		foreach ($this->monday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->tuesday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->wednesday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->thursday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->friday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->saturday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		foreach ($this->sunday_tasks as $task) {
			if($earliest > strtotime($task->getStartTime())){
				$earliest = strtotime($task->getStartTime());
			}
		}
		//echo date('H:i', $earliest);
		return date('H', $earliest);

	}
	function getLatestTime(){
		$latest = strtotime('13:00:00');
		foreach ($this->monday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->tuesday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->wednesday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->thursday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->friday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->saturday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		foreach ($this->sunday_tasks as $task) {
			if($latest < strtotime($task->getEndTime())){
				$latest = strtotime($task->getEndTime());
			}
		}
		//echo date('H:i', $latest);
		return date('H', $latest);

	}
	public static function addNewEntity($task_id, $date, $sTime, $eTime, $completed){
		$entity_id = OptimisedSchedule::getRandNum();
		$user_id = User::getUserId();
		$result = queryDB("INSERT INTO generated_schedule VALUES ('$entity_id', '$task_id', '$date', '$sTime', '$eTime', '$completed')");
		$result = queryDB("INSERT INTO generates VALUES ('$user_id', '$entity_id')");
		return "success";
	}
	public static function getRandNum(){
		return rand(1, 10000);
	}

}


?>
<?php

class OptimisedTask{
		public $entity_id;
		public $start_time;
		public $end_time;

		public function __construct($entity_id){
			$this->entity_id = $entity_id;
			$this->setTime();
		}

		public function getDay(){
			$result = queryDB("SELECT task_date FROM generated_schedule WHERE entity_id = '$this->entity_id'");
			$row = mysql_fetch_array($result);
			$date = $row['task_date'];
			$mDate = strtotime($date);
			$day = date('D', $mDate);
			return $day;
		}
		public function setTime(){
			$result = queryDB("SELECT * FROM generated_schedule WHERE entity_id = '$this->entity_id'");
			$row = mysql_fetch_array($result);
			$this->start_time = $row['task_start_time'];
			$this->end_time = $row['task_end_time'];
		}
		public function getTaskId(){
			$result = queryDB("SELECT task_id FROM generated_schedule WHERE entity_id = '$this->entity_id'");
			$row = mysql_fetch_array($result);
			return $row['task_id'];
		}
		public function getStartTime(){
			return $this->start_time;
		}
		public function getEndTime(){
			return $this->end_time;
		}
		public function setCompleted(){
			$result = queryDB("UPDATE generated_schedule SET task_completed ='true' WHERE entity_id = '$this->entity_id'");
			return "success";
		}
		public function isInCurrentWeek($week){
			return true;
		}
	}

?>
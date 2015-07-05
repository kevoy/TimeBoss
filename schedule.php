<?php
require_once('User.php');

//for all methods below just echo the results
//for methods below the correspond to the schedule for the current user, call getUserId() method from the user class to get the current user id
//using the user_id you can get the schedule id from the 'creates' table, so query the creates table to get this id you'll need it for all methods below
class Schedule{
	public $tasks;
	public $schedule_id;

	public function __construct($schedule_id){
		$this->schedule_id = $schedule_id;
	}
	//return last_modified date value from the 'schedule' table, look at example in user class how to query table, do the same for all methods below
	public static function getMyScheduleId(){
		$user_id = User::getUserId();
		$result = queryDB("SELECT schedule_id from creates where user_id = '$user_id'");
		$row = mysql_fetch_array($result);
		return $row['schedule_id'];
	}
	public function getScheduleId(){
		return $schedule_id;
	}
	public function getLastModified(){
	    $sched_id= $this->getScheduleId();
	    $result = queryDB("Select last_modified from shedule where schedule_id = '$sched_id' ");
		$row = mysql_fetch_array($result);
		return $row['last_modified'];

	}
	public function getNumTasks(){
	    $sched_id= $this->getScheduleId();
	    $result = queryDB("select num_tasks from schedule where schedule_id = '$sched_id' ");
		$row = mysql_fetch_array($result);
		echo $row['num_tasks'];
		return $row['num_tasks'];
	   
	}
	public function getNumActivities(){
	    $sched_id= $this->getScheduleId();
	    $result = queryDB("Select num_activites from schedule  where schedule_id = '$sched_id' ");
		$row = mysql_fetch_array($result);
		echo $row['num_activities'];
		return $row['num_activities'];
	}
	public function getNumGroupMeetings(){
	   $sched_id= $this->getScheduleId();
	   $result = queryDB("Select num_group_meetings from schedule  where schedule_id = '$sched_id' ");
		$row = mysql_fetch_array($result);
		echo $row['num_group_meetings'];
		return $row['num_group_meetings']; 
	}
	public function setLastModified($date){
	    $sched_id= $this->getScheduleId();
	   $result = queryDB("Select last_modified from schedule where schedule_id = '$sched_id' ");
		$row = mysql_fetch_array($result);
	    
	    
	}
	public function setNumTasks($num){
	    $sched_id= $this->getScheduleId();
	    $result = queryDB("Update schedule set num_task = '$num' where schedule_id = '$sched_id'");
	    
	}
	public function setNumActivities($num){
	   $sched_id= $this->getScheduleId();
	  
	   $result = queryDB("Update schedule set num_activities = '$num' where schedule_id = '$sched_id'");
	}
	public function setNumGroupMeetings($num){
	   $sched_id= $this->getScheduleId();
	    $result = queryDB("Update schedule set num_group_meetings = '$num' where schedule_id = '$sched_id'");
	 
	}
	public function setAccess($access){
	    $sched_id= $this->getScheduleId();
	     $result = queryDB("Update schedule set access = '$access' where schedule_id = '$sched_id'");

	}
	public function isUptoDate(){
	    $sched_id= $this->getScheduleId();
	    $modDate=getLastModified();
	    $result = queryDB("Select last_modified from schedule where schedule_id = '$sched_id' ");
	    $row = mysql_fetch_array($result);
	    if ($row['last_modified']==$modDate){
	        return true;
	    }
	    else{
	        return false;
	    }
	    
	}

	public function getAvailableTimesForUser($user_id){
	    $sched_id= $this->getScheduleId();
	    $Times = array();
	    $result = queryDB("select num_tasks from schedule where schedule_id = '$sched_id' ");
	    $row = mysql_fetch_array($result);
	    $result1 = queryDB("select num_activities from schedule where schedule_id = '$sched_id' ");
	    $row1 = mysql_fetch_array($result1);
	    $result2 =queryDB("select num_group_meetings from schedule where schedule_id = '$sched_id' ");
	    $row2 = mysql_fetch_array($result2);
	    while  ($row['num_task']==0&& $row1['num_activities'] == 0 && $row2['num_group_meetings']==0)
	    {
	        $result3 = queryDB("select last_modified from schedule where schedule_id = '$sched_id' ");
	        $row3 = mysql_fetch_array($result3);
	        $Times[]= $row['last_modified'];
	    }
	    return $STimes;
	    
	    
	}
}


?>
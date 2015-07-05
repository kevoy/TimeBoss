<?php
require_once('User.php');
require_once('task.php');
class Meeting extends Task{

	public $meeting_id;
	public function __construct($meeting_id){
		$this->meeting_id = $meeting_id;
		$task_id = $this->getMeetingTaskId();
		parent::__construct($task_id);
	}
	public function acceptMeeting(){
		$cur_user = User::getUserId();
		$result = queryDB("Update group_meeting set requests_accepted= requests_accepted + 1 where meeting_id = '$this->meeting_id'");
		$result1 = queryDB("Update groups set request_status= 'accepted' where meeting_id = '$this->meeting_id' and user_id = '$cur_user'");
		
		$new_task_id = Task::addNewTask($this->getTaskName(), $this->getTaskLocation(), $this->getTaskStartDate(), $this->getTaskEndDate(), $this->isTaskRepetitive(), 
			'true', $this->getTaskStartTime(), $this->getTaskEndTime(), 'H', $this->getTaskDescription(), $this->getTaskAccess());
		$result2 = queryDB("Update groups set task_id= '$new_task_id' where meeting_id = '$this->meeting_id' and user_id = '$cur_user'");
		return "success";
	}
	public function getMeetingTaskId(){
		$result = queryDB("Select task_id from group_meeting where meeting_id = '$this->meeting_id'");
		$row = mysql_fetch_array($result);
		return $row['task_id'];
	}
	public function getNumUsers(){
		$result = queryDB("Select num_users from group_meeting where meeting_id = '$this->meeting_id'");
		$row = mysql_fetch_array($result);
		return $row['num_users'];
	}
	public function getRequestsAccepted(){
		$result = queryDB("Select requests_accepted from group_meeting where meeting_id = '$this->meeting_id'");
		$row = mysql_fetch_array($result);
		return $row['requests_accepted'];
	}
	public function setNumUsers($num){
		$result = queryDB("Update group_meeting set num_users = '$num' where meeting_id = '$this->meeting_id'");
		return $row['num_users'];
	}
	public function setRequestsAccepted($num){
		$result = queryDB("Update group_meeting set requests_accepted = '$num' where meeting_id = '$this->meeting_id'");
		return $row['requests_accepted'];
	}
	public function getUsersInMeeting(){
		$result = queryDB("Select user_id from groups where meeting_id = '$this->meeting_id'");
		$users = array();
		while($row = mysql_fetch_array($result)){
			$user = new User($row['user_id']);
			$users[] = $user;
		}
		return $users;
	}
	public static function getMyMeetings(){
		$cur_user = User::getUserId();
		$result = queryDB("Select meeting_id from group_meeting where meeting_leader = '$cur_user'");
		$meetings = array();
		while($row = mysql_fetch_array($result)){
			$meeting = new Meeting($row['meeting_id']);
			$meetings[] = $meeting;
		}
		return $meetings;

	}
	public function getMeetingOwner(){
		$result = queryDB("Select meeting_leader from group_meeting where meeting_id = '$this->meeting_id'");
		$row = mysql_fetch_array($result);
		return $row['meeting_leader'];
	}
	public static function getMeetingInvites(){
		$cur_user = User::getUserId();
		$result = queryDB("Select meeting_id from groups where user_id = '$cur_user'");
		$meetings = array();
		while($row = mysql_fetch_array($result)){
			$meeting = new Meeting($row['meeting_id']);
			$meetings[] = $meeting;
		}
		return $meetings;
	}
	public function getRequestStatus($user){
		$cur_user = User::getUserId();
		$result = queryDB("Select request_status from groups where meeting_id = '$this->meeting_id' and user_id = '$cur_user'");
		$row = mysql_fetch_array($result);
		return $row['request_status'];
	}
	public function getMyMissedInvites(){

	}
	public function getUsersDeclined(){

	}
	public function getSuggestedTime(){

	}
	public function setSuggestedTime($time){
		$result = queryDB("Update group_meeting set suggested_time = '$time' where meeting_id = '$this->meeting_id'");
		return $row['suggested_time'];
	}
	public static function createNewMeetingTask($name, $location, $date, $description, $repeat, $access, $users, $start_time, $end_time){

		$new_task_id = Task::addNewTask($name, $location, $date, $date, $repeat, 'true', $start_time, $end_time, 'H', $description, $access);
		$cur_user = User::getUserId();
		$invited_users = json_decode($users, true);
		$num_users = count($invited_users)+1;
		$result = queryDB("INSERT INTO group_meeting VALUES ('$new_task_id', '$new_task_id', '$num_users', 1, '$cur_user');");
		$result1 = queryDB("INSERT INTO groups VALUES ('$cur_user', '$new_task_id', '$new_task_id', 'accepted');");
		for($i=0; $i<$num_users-1; $i++){
			$user_id = User::getIdFromName($invited_users['user'.$i]);
			if($user_id!=="no_user"){
				$result2 = queryDB("INSERT INTO groups VALUES ('$user_id', '$new_task_id', '', 'unanswered');");
			}
			
		}
		return $new_task_id;
	}
	public function getAvailableTimes($users){
		
	}

}



?>
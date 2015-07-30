<?php
require_once('User.php');
require_once('task.php');
require_once('meeting.php');
require_once('access_group.php');
if(isset($_REQUEST['class'])){

	if($_REQUEST['class']=="task"){
		processTaskRequests();
	}

	if($_REQUEST['class']=="user"){
		processUserRequests();
	}

	if($_REQUEST['class']=="meeting"){
		processMeetingRequests();
	}

	if($_REQUEST['class']=="group"){
		processGroupRequests();
	}
}
function processGroupRequests(){
	if($_REQUEST['method']=="add_group"){
		$name = $_REQUEST['name'];
		$users = $_REQUEST['users'];
		$access = $_REQUEST['access'];
		$tasks = $_REQUEST['tasks'];
		echo AccessGroup::addGroup($name, $access, $users, $tasks);
	}
}
function processMeetingRequests(){
	if($_REQUEST['method']=="add_meeting"){
		$name = $_REQUEST['name'];
		$location = $_REQUEST['location'];
		$date = $_REQUEST['date'];
		$start_time = $_REQUEST['start_time'];
		$end_time = $_REQUEST['end_time'];
		$repeat = $_REQUEST['repeat'];
		$description = $_REQUEST['description'];
		$access = $_REQUEST['access'];
		$users = $_REQUEST['users'];
		echo Meeting::createNewMeetingTask($name, $location, $date, $description, $repeat, $access, $users, $start_time, $end_time);
	}
	else if($_REQUEST['method']=="get_user_email"){
		return User::getUserId();
	}else if($_REQUEST['method']=="accept_meeting"){
		$meeting_id = $_REQUEST['meeting_id'];
		$meeting = new Meeting($meeting_id);
		echo $meeting->acceptMeeting();
	}
}

function processUserRequests(){
	if($_REQUEST['method']=="get_user_id"){
		return User::getUserId();
	}
	else if($_REQUEST['method']=="get_user_email"){
		return User::getUserId();
	}
	else if($_REQUEST['method']=="login"){
		$email = $_REQUEST['email']; //note these parameters must be in url as well when testing
		$password = $_REQUEST['password'];
		echo User::login($email, $password);
	}else if($_REQUEST['method']=="logout"){
		return User::logout();
	}
	else if($_REQUEST['method']=="validateUserName"){
		$name = $_REQUEST['name']; //note these parameters must be in url as well when testing
		echo User::validateUsername($name);
	}else if($_REQUEST['method']=="signup"){
		$email = $_REQUEST['email']; //note these parameters must be in url as well when testing
		$password = $_REQUEST['password'];
		if(User::validateUsername($email)=="success"){
			echo "duplicate_user_error";
		}else{
			echo User::signup($email, $password);
		}
		
	}
}

function processTaskRequests(){

	if($_REQUEST['method']=="get_task_id"){
		return Task::getMyTasks();
	}
	else if($_REQUEST['method']=="get_task_name"){
		$task_id = $_REQUEST['task_id'];
		$task = new Task($task_id);
		return $task->getTaskName();
	}
	else if($_REQUEST['method']=="add_task"){
		$name = $_REQUEST['name'];
		$location = $_REQUEST['location'];
		$sDate = $_REQUEST['sDate'];
		$eDate = $_REQUEST['eDate'];
		$mandatory= $_REQUEST['mandatory'];
		$sTime = $_REQUEST['sTime'];
		$eTime = $_REQUEST['eTime'];
		$priority = $_REQUEST['priority'];
		$repTrue = $_REQUEST['repTrue'];
		$desc = $_REQUEST['desc'];
		$access = $_REQUEST['access'];

		echo Task::addNewTask($name, $location, $sDate, $eDate, $repTrue, $mandatory, $sTime, $eTime, $priority, $desc, $access);
	}
	//etc..
}

?>
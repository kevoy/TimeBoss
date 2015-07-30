<?php
require_once('User.php');
require_once('task.php');
class AccessGroup{
	public $group_id;

	public function __construct($group_id){
		$this->group_id = $group_id;
	}
	public static function addGroup($name, $access_type, $jusers, $jtasks){
		$user_id = User::getUserId();
		$group_id = AccessGroup::getRandNum();
		$result = queryDB("Insert into access_groups VALUES ('$group_id', '$name', '$access_type');");
		$result1 = queryDB("Insert into forms VALUES ('$user_id', '$group_id');");
		$members = json_decode($jusers, true);
		if($access_type=="selective"){
			$tasks = json_decode($jtasks, true);
			for($i=0; $i<count($tasks); $i++){
				$task = $tasks['task'.$i];
				$result2 = queryDB("INSERT INTO accesses VALUES ('$group_id', '$task');");
			}
		}

		for($i=0; $i<count($members); $i++){
			$user = User::getIdFromName($members['user'.$i]);
			$result3 = queryDB("INSERT INTO permits VALUES ('$group_id', '$user');");
			
		}
		return $group_id;
	}
	public function deleteGroup(){

	}
	public function addTask($task_id){

	}
	public function addUser($user_id){

	}
	public function removeUser($user_id){

	}
	public function setName($name){

	}
	public function setAccess($access_type){

	}
	public function getId(){
		return $this->group_id;
	}
	public function getName(){
		$result = queryDB("SELECT name FROM access_groups WHERE group_id = '$this->group_id';");
		$row = mysql_fetch_array($result);
		return $row['name'];
	}
	public function getAccess(){
		$result = queryDB("SELECT access_type FROM access_groups WHERE group_id = '$this->group_id';");
		$row = mysql_fetch_array($result);
		return $row['access_type'];
	}
	public function getTasks(){
		$result = queryDB("SELECT task_id FROM accesses WHERE group_id = '$this->group_id';");
		$tasks = array();
		while($row = mysql_fetch_array($result)){
			$tasks[] = new Task($row['task_id']);
		}
		return $tasks;
		
	}
	public function getUsers(){
		$result = queryDB("SELECT user_id FROM permits WHERE group_id = '$this->group_id';");
		$users = array();
		while($row = mysql_fetch_array($result)){
			$users[] = new User($row['user_id']);
		}
		return $users;
		
	}
	public function getOwner(){
		$result = queryDB("SELECT user_id FROM forms WHERE group_id = '$this->group_id';");
		$row = mysql_fetch_array($result);
		$user = new User($row['user_id']);
		return $user;
	}
	public static function getGroupsCreated(){
		$user_id = User::getUserId();
		$result = queryDB("SELECT group_id FROM forms WHERE user_id = '$user_id';");
		$groups = array();
		while($row = mysql_fetch_array($result)){
			$groups[] = new AccessGroup($row['group_id']);
		}
		return $groups;
	}
	public static function getGroupsIn(){
		$user_id = User::getUserId();
		$result = queryDB("SELECT group_id FROM permits WHERE user_id = '$user_id';");
		$groups = array();
		while($row = mysql_fetch_array($result)){
			$groups[] = new AccessGroup($row['group_id']);
		}
		return $groups;
	}
	public static function getRandNum(){
		return rand(1, 10000);
	}

}

?>
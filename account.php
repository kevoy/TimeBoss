<?php
require_once('task.php');
require_once('meeting.php');
require_once('User.php');
User::loginRequired();
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account - Time Boss</title>
	<link rel="stylesheet" href="stylesheets/bootstrap/css/bootstrap.min.css" type="text/css" >
	<script src="stylesheets/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheets/main.css" type="text/css" >
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans|Audiowide|Play">
	<script type="text/javascript" src="scripts/account.js"></script>
	<script type="text/javascript" src="scripts/prototype.js"></script>


</head>
<body>
	<?php include 'header-template.php' ?>
	
	<div id="profile_main_container" class="row margin-0">
		<div class='col-md-2' id="left-bar">
			<div class="col-md-12  dash" id="actions-nav">
				<h3><span class="margin-10 glyphicon glyphicon-user"></span></h3>
			</div>
			<div class="col-md-12 c_tab" id="overview-tab">
				<h3><span class="margin-10 glyphicon glyphicon-tasks"></span> Overview</h3>
			</div>
			<div class="col-md-12 c_tab" id="tasks-tab">
				<h3><span class="margin-10 glyphicon glyphicon-th-list"></span> Tasks</h3>
			</div>
			<div class="col-md-12 c_tab" id="groups-tab">
				<h3><span class="margin-10 glyphicon glyphicon-headphones"></span> Groups</h3>
			</div>
			<div class="col-md-12 c_tab" id="meetings-tab">
				<h3><span class="margin-10 glyphicon glyphicon-comment"></span> Meetings</h3>
			</div>
			<div class="col-md-12 c_tab" id="settings-tab">
				<h3><span class="margin-10 glyphicon glyphicon-cog"></span> Settings</h3>
			</div>
		</div>
		<div class='col-md-10' id="right-bar">
			<div class='col-md-12' id="second-nav">
				<div class="col-md-6" id="pane-nav-title-holder">
					<h3 id="panel-title">DASHBOARD <span class="glyphicon glyphicon-hand-right margin-10-10"></span> <span id="panel-selected">OVERVIEW</span></h3>
				</div>
				<div class="col-md-6" id="pane-nav-buttons-holder">
					<button type="button" class="btn btn-primary" id="new-task-btn"><span class="margin-10 glyphicon glyphicon-ok-circle"></span>Add New Task</button>
					<button type="button" class="btn btn-info" id="new-group-btn"><span class="margin-10 glyphicon glyphicon-ok-sign"></span>Create New Group</button>
					<button type="button" class="btn btn-warning"  id="new-meeting-btn"><span class="margin-10 glyphicon glyphicon-check"></span>Add New Meeting</button>
				</div>
			</div>
			<div id="welcome-user" class="col-md-offset-8 col-md-4">
				<h3><span class="margin-10 glyphicon glyphicon-user"></span>Welcome <b><?php echo User::getMyEmail(); ?></b></h3>
			</div>
			<div id="main-panel" class="col-md-12">
				<div id="new-task-panel" class="col-md-12">
					<h3 class="c_subtitle">Add New Task</h3>
					<div>
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label for="t-name-field" class="col-sm-2">Task Name</label>
								<div class="col-sm-7">
									<input type="text" id="t-name-field" class="form-control" placeholder="Enter Task Name" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-location-field" class="col-sm-2">Task Location</label>
								<div class="col-sm-7">
									<input type="text" id="t-location-field" class="form-control" placeholder="Enter Location" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-s-date-field" class="col-sm-2">Start Date</label>
								<div class="col-sm-7">
									<input type="date" id="t-s-date-field" class="form-control" placeholder="Enter Task Start Date eg: yyyy/mm/dd" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-e-date-field" class="col-sm-2">End Date</label>
								<div class="col-sm-7">
									<input type="date" id="t-e-date-field" class="form-control" placeholder="Enter Task End Date eg: yyyy/mm/dd" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Does this task have a fixed time slot?</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="mandatory-true-field" name="mandatory" placeholder="Enter Location">Yes
										</label>
										<label>
											<input type="radio" id="mandatory-false-field" name="mandatory" placeholder="Enter Location" checked>No
										</label>
									</div>
									
								</div>
							</div>
							<div class="form-group">
								<label for="s-time-field" class="col-sm-2">Start Time</label>
								<div class="col-sm-7">
									<input type="time" id="s-time-field" class="form-control" placeholder="Enter Start Time eg: hh:mm" >
								</div>
							</div>
							<div class="form-group">
								<label for="e-time-field" class="col-sm-2">End Time</label>
								<div class="col-sm-7">
									<input type="time" id="e-time-field" class="form-control" placeholder="Enter End Time eg: hh:mm" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Priority</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="p-h-field" name="priority" placeholder="Enter Location">High
										</label>
										<label>
											<input type="radio" id="p-m-field" name="priority" placeholder="Enter Location" checked>Medium
										</label>
										<label>
											<input type="radio" id="p-l-field" name="priority" placeholder="Enter Location">Low
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Is this a repetitive task?</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="repetitive-true-field" name="repetitive" placeholder="Enter Location">Yes
										</label>
										<label>
											<input type="radio" id="repetitive-false-field" name="repetitive" placeholder="Enter Location" checked>No
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="desc-field" class="col-sm-2">Description</label>
								<div class="col-sm-7">
									<input type="text" id="desc-field" class="form-control" placeholder="Enter Description" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Access</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="access-priv-field" name="access" placeholder="Enter Location" checked>Private
										</label>
										<label>
											<input type="radio" id="access-pub-field" name="access" placeholder="Enter Location" checked>Public
										</label>
									</div>
								</div>
							</div>
							<input type="button" class="btn btn-primary btn-lg  col-sm-offset-2" id= "add-task-btn" value="Add Task">
						</form>
					</div>
				</div>
				<div id="new-meeting-panel" class="col-md-12">
					<h3 class="c_subtitle">Add New Meeting</h3>
					<div>
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label for="t-m_name-field" class="col-sm-2">Meeting Name</label>
								<div class="col-sm-7">
									<input type="text" id="t-m_name-field" class="form-control" placeholder="Enter Task Name" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-m_location-field" class="col-sm-2">Meeting Location</label>
								<div class="col-sm-7">
									<input type="text" id="t-m_location-field" class="form-control" placeholder="Enter Location" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-m_date-field" class="col-sm-2">Date</label>
								<div class="col-sm-7">
									<input type="date" id="t-m_date-field" class="form-control" placeholder="Enter Task Start Date eg: yyyy/mm/dd" >
								</div>
							</div>
							<div class="form-group">
								<label for="m_members-field" class="col-sm-2">Invite Members</label>
								<div class="col-sm-7">
									<input type="text" id="m_members-field" class="form-control" placeholder="Enter Username(s) of members to invite ">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Current Members</label>
								<div class=" col-sm-7" id="members-holder">
									<h5>You have not yet invited any members</h5>
								</div>
							</div>
							<div class="form-group">
								<label for="s-m_time-field" class="col-sm-2">Start Time</label>
								<div class="col-sm-7">
									<input type="time" id="s-m_time-field" class="form-control" placeholder="Enter Start Time eg: hh:mm" >
								</div>
							</div>
							<div class="form-group">
								<label for="e-m_time-field" class="col-sm-2">End Time</label>
								<div class="col-sm-7">
									<input type="time" id="e-m_time-field" class="form-control" placeholder="Enter End Time eg: hh:mm" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Is this a repetitive meeting?</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="m_repetitive-true-field" name="repetitive" placeholder="Enter Location">Yes
										</label>
										<label>
											<input type="radio" id="m_repetitive-false-field" name="repetitive" placeholder="Enter Location" checked>No
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="m_desc-field" class="col-sm-2">Description</label>
								<div class="col-sm-7">
									<input type="text" id="m_desc-field" class="form-control" placeholder="Enter Description" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Access</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="m_access-priv-field" name="access" placeholder="Enter Location" checked>Private
										</label>
										<label>
											<input type="radio" id="m_access-pub-field" name="access" placeholder="Enter Location" checked>Public
										</label>
									</div>
								</div>
							</div>
							<input type="button" class="btn btn-primary btn-lg  col-sm-offset-2" id= "add-meeting-btn" value="Add Meeting">
						</form>
					</div>
				</div>
				<div id="new-group-panel" class="col-md-12">
					<h3 class="c_subtitle">Create New Group</h3>
					<div>
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label for="g-name-field" class="col-sm-2">Group Name</label>
								<div class="col-sm-7">
									<input type="text" id="g-name-field" class="form-control" placeholder="Enter Group Name" >
								</div>
							</div>
							<div class="form-group">
								<label for="g_members-field" class="col-sm-2">Members</label>
								<div class="col-sm-7">
									<input type="text" id="g_members-field" class="form-control" placeholder="Enter Username(s) of members to add ">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Current Members</label>
								<div class=" col-sm-7" id="g-members-holder">
									<h5>You have not yet invited any members</h5>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Access Type</label>
								<div class="col-sm-7">
									<div class="radio">
										<label>
											<input type="radio" id="all-field" name="g-access">All
										</label>
										<label>
											<input type="radio" id="selective-field" name="g-access" checked>Selective
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="g-tasks-field" class="col-sm-2">Select Tasks</label>
								<div class="col-sm-7">
									<select id="g-tasks-field" class="form-control" placeholder="Select Tasks" onchange="groupAddTask(this)" >
										<option disabled selected>-- Select A Task --</option>
										<?php foreach (Task::getMyTasks() as $task): ?>
										<option value="<?php echo $task->getTaskId(); ?>" ><?php echo $task->getTaskName(); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Tasks Added</label>
								<div class=" col-sm-7" id="g-tasks-holder">
									<h5>You have not yet added any tasks</h5>
								</div>
							</div>
							<input type="button" class="btn btn-primary btn-lg  col-sm-offset-2" id= "add-group-btn" value="Add Group">
						</form>
					</div>
				</div>
				<div id="overview-panel" class="col-md-12">
					<h3 class="c_subtitle">My Calendar</h3>
					<div>
						<?php include 'calendar-template.php'; ?>
						
					</div>
				</div>
				<div id="meetings-panel" class="col-md-12">
					<h3 class="c_subtitle">My Meetings</h3>
					<div id="meetings-holder">
						<?php include 'meetings-template.php'; ?>
					</div>
				</div>
				<div id="tasks-panel" class="col-md-12">
					<h3 class="c_subtitle">My Tasks</h3>
					<div id = "tasks-holder">
						<?php include 'tasks-template.php'; ?>
					</div>
				</div>
				<div id="groups-panel" class="col-md-12">
					<h3 class="c_subtitle">Groups</h3>
					<div>
						<?php include 'groups-template.php'; ?>
						
					</div>
					<h3 class="c_subtitle">My Groups</h3>
					<div>
						<?php include 'my-groups-template.php'; ?>
						
					</div>
				</div>
		</div>

	</div>
	<div id="popup-back">
		<div id="popup-box">
			<h4 id="popup-title">Processing Information</h4>
			<div id="popup-body">
				<div id="processing-img"></div>
			</div>
		</div>
	</div>
</body>


</html>
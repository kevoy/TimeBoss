<!DOCTYPE html>
<html>
<head>
	<title>Time Boss</title>
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
			<div class="col-md-12" id="actions-nav"></div>
			<div class="col-md-12 c_tab" id="overview-tab">
				<h3><span class="margin-10 glyphicon glyphicon-tasks"></span> Overview</h3>
			</div>
			<div class="col-md-12 c_tab" id="tasks-tab">
				<h3><span class="margin-10 glyphicon glyphicon-th-list"></span> Tasks</h3>
			</div>
			<div class="col-md-12 c_tab" id="activities-tab">
				<h3><span class="margin-10 glyphicon glyphicon-headphones"></span> Activities</h3>
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
					<h3 id="panel-title">HOME <span class="glyphicon glyphicon-hand-right margin-10-10"></span> <span id="panel-selected">OVERVIEW</span></h3>
				</div>
				<div class="col-md-6" id="pane-nav-buttons-holder">
					<button type="button" class="btn btn-primary" id="new-task-btn"><span class="margin-10 glyphicon glyphicon-ok-circle"></span>Add New Task</button>
					<button type="button" class="btn btn-info"><span class="margin-10 glyphicon glyphicon-ok-sign"></span>Add New Activity</button>
					<button type="button" class="btn btn-warning"><span class="margin-10 glyphicon glyphicon-check"></span>Add New Meeting</button>
				</div>
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
									<input type="date" id="t-s-date-field" class="form-control" placeholder="Enter Task Start Date eg: mm/dd/yyyy" >
								</div>
							</div>
							<div class="form-group">
								<label for="t-e-date-field" class="col-sm-2">End Date</label>
								<div class="col-sm-7">
									<input type="date" id="t-e-date-field" class="form-control" placeholder="Enter Task End Date eg: mm/dd/yyyy" >
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
				<div id="overview-panel" class="col-md-12">
					<h3 class="c_subtitle">My Calendar</h3>
					<div>
						<div id="cal-holder">
							<div class="col-md-offset-1 col-md-11 pad-0" id="days-holder">
								<div class="col-md-2 day-box">
									<h4>Mon</h4>
								</div>
								<div class="col-md-2 day-box">
									<h4>Tue</h4>
								</div>
								<div class="col-md-2 day-box">
									<h4>Wed</h4>
								</div>
								<div class="col-md-2 day-box">
									<h4>Thur</h4>
								</div>
								<div class="col-md-2 day-box">
									<h4>Fri</h4>
								</div>
								
							</div>
							<div id="cal-holder-body" class="col-md-12 pad-0">
								<div class="time-box col-md-1">
									<h4>8 A.M</h4>
								</div>
								<div class="col-md-11 pad-0 tasks-cal">
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
								</div>

								<div class="time-box col-md-1">
									<h4>8 A.M</h4>
								</div>
								<div class="col-md-11 pad-0 tasks-cal">
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
								</div>

								<div class="time-box col-md-1">
									<h4>8 A.M</h4>
								</div>
								<div class="col-md-11 pad-0 tasks-cal">
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
								</div>

								<div class="time-box col-md-1">
									<h4>8 A.M</h4>
								</div>
								<div class="col-md-11 pad-0 tasks-cal">
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0 c_1">
										<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
									</div>
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
									<div class="task-box col-md-2 pad-0">
										<h4>Task Name</h4>
										<h4>Task Time </h4>
										<h4>Task Location</h4>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div id="tasks-panel" class="col-md-12">
					<h3 class="c_subtitle">My Tasks</h3>
					<div>
						<table class="table table-bordered table-hover c_table">
							<thead>
								<tr>
									<th>Task Name</th>
									<th>Date</th>
									<th>Time</th>
									<th>Location</th>
									<th>Priority</th>
									<th>Mandatory</th>
									<th>Repetitive</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Education Technology</td>
									<td>01/12/2015 - 02/01/2016</td>
									<td> 9.a.m - 12.p.m</td>
									<td>Faculty of education building 2</td>
									<td>Medium</td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td>
										<button type="button" class="btn btn-info">
											<span class="glyphicon glyphicon-edit"></span>
										</button> 
										<button type="button" class="btn btn-warning">
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
										<button type="button" class="btn btn-danger">
											<span class="glyphicon glyphicon-remove-circle"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td>Education Technology</td>
									<td>01/12/2015 - 02/01/2016</td>
									<td> 9.a.m - 12.p.m</td>
									<td>Faculty of education building 2</td>
									<td>Medium</td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td>
										<button type="button" class="btn btn-info">
											<span class="glyphicon glyphicon-edit"></span>
										</button> 
										<button type="button" class="btn btn-warning">
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
										<button type="button" class="btn btn-danger">
											<span class="glyphicon glyphicon-remove-circle"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td>Education Technology</td>
									<td>01/12/2015 - 02/01/2016</td>
									<td> 9.a.m - 12.p.m</td>
									<td>Faculty of education building 2</td>
									<td>Medium</td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td><span class="glyphicon glyphicon-ok-circle"></span></td>
									<td>
										<button type="button" class="btn btn-info">
											<span class="glyphicon glyphicon-edit"></span>
										</button> 
										<button type="button" class="btn btn-warning">
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
										<button type="button" class="btn btn-danger">
											<span class="glyphicon glyphicon-remove-circle"></span>
										</button>
									</td>
								</tr>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>


</html>
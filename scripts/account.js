window.onload = function(){
	var overviewTab = document.getElementById("overview-tab");
	overviewTab.onclick = showOverviewPanel;

	var tasksTab = document.getElementById("tasks-tab");
	tasksTab.onclick = showTasksPanel;

	var newTaskBtn = document.getElementById("new-task-btn");
	newTaskBtn.onclick = showAddTaskPanel;

	var addTaskBtn = document.getElementById("add-task-btn");
	addTaskBtn.onclick = addNewTask;
}
function addNewTask(){
	var taskName = document.getElementById("t-name-field").value;
	var taskLocation = document.getElementById("t-location-field").value;
	var taskStartDate = document.getElementById("t-s-date-field").value;
	var taskEndDate = document.getElementById("t-e-date-field").value;
	var mandatoryTrue = document.getElementById("mandatory-true-field").checked;
	var taskStartTime = document.getElementById("s-time-field").value;
	var taskEndTime = document.getElementById("e-time-field").value;
	var priorityHigh = document.getElementById("p-h-field").checked;
	var priorityMedium = document.getElementById("p-m-field").checked;
	var priorityLow = document.getElementById("p-l-field").checked;
	var repTrue = document.getElementById("repetitive-true-field").checked;
	var description = document.getElementById("desc-field").value;
	var accessPrivate = document.getElementById("access-priv-field").checked;

	var priority = "H";
	if(priorityMedium){
		priority = "M"
	}else if(priorityLow){
		priority = "L"
	}
	new Ajax.Request("task.php",
		{
			parameters: {
				'class':'task',
				'method':'add_task',
				name: taskName,
				location: taskLocation,
				sDate: taskStartDate,
				eDate: taskEndDate,
				mandatory: mandatoryTrue,
				sTime: taskStartTime,
				eTime:taskEndTime,
				priority:priority,
				repTrue: repTrue,
				desc: description,
				access: accessPrivate

			},
			method: 'post',
			onSuccess: sendNewTask
		});
	alert(taskStartTime);
}
function sendNewTask(data){

}
function showOverviewPanel(){
	loadPanel("overview-panel", "OVERVIEW");
}
function showTasksPanel(){
	loadPanel("tasks-panel", "TASKS");
}
function showAddTaskPanel(){
	loadPanel("new-task-panel", "NEW TASK");
}
function loadPanel(id, title){
	document.getElementById("new-task-panel").style.display = "none";
	document.getElementById("overview-panel").style.display = "none";
	document.getElementById("tasks-panel").style.display = "none";

	document.getElementById(id).style.display = "block";
	document.getElementById("panel-selected").innerHTML = title;
}
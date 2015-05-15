window.onload = function(){
	var overviewTab = document.getElementById("overview-tab");
	overviewTab.onclick = showOverviewPanel;

	var tasksTab = document.getElementById("tasks-tab");
	tasksTab.onclick = showTasksPanel;

	var newTaskBtn = document.getElementById("new-task-btn");
	newTaskBtn.onclick = showAddTaskPanel;
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
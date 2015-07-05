var meetingMembers = null;
window.onload = function(){
	image = new Image(300, 67);
	image.src = "images/processing.gif";
	var overviewTab = document.getElementById("overview-tab");
	overviewTab.onclick = showOverviewPanel;

	var tasksTab = document.getElementById("tasks-tab");
	tasksTab.onclick = showTasksPanel;

	var meetingsTab = document.getElementById("meetings-tab");
	meetingsTab.onclick = showMeetingsPanel;

	var newTaskBtn = document.getElementById("new-task-btn");
	newTaskBtn.onclick = showAddTaskPanel;

	var newMeetingBtn = document.getElementById("new-meeting-btn");
	newMeetingBtn.onclick = showAddMeetingPanel;

	var addTaskBtn = document.getElementById("add-task-btn");
	addTaskBtn.onclick = addNewTask;

	var addMeetingBtn = document.getElementById("add-meeting-btn");
	addMeetingBtn.onclick = addNewMeeting;

	var membersBtn = document.getElementById("m_members-field");
	membersBtn.onkeyup = verifyMember;
}
function verifyMember(evt){
	var keyVal = evt.keyCode || evt.which;
	//alert(keyVal);
	if(keyVal == 188 || keyVal== 13){
		var membersField = document.getElementById("m_members-field");
		var membersDiv = document.getElementById("members-holder");
		var fieldVal = membersField.value;
		var username;
		if(fieldVal.indexOf(',')==-1){
			username = fieldVal;
		}else{
			username = fieldVal.substr(0, fieldVal.length-1);
		}
		var userBadge = createBadge(username);
		membersField.value = "";
		if(meetingMembers!=null){
			if(meetingMembers.indexOf(username)>=0){
				return;
			}
		}
		if(meetingMembers==null || meetingMembers.length==0){
			meetingMembers = [];
			membersDiv.innerHTML="";

		}
		meetingMembers.push(username);
		membersDiv.innerHTML+= userBadge;
		validateUserName(username, 'bg-'+username);
	}
	

}
function createBadge(txt){
	return "<button id='bg-"+txt+"' type='button' class='margin-5 btn btn-default'> " + txt +" <span class='badge' onclick='removeMember(this,\""+txt+"\")'>X</span></button>";
}
function removeMember(el, txt){
	meetingMembers.splice(meetingMembers.indexOf(txt), 1);
	var membersDiv = document.getElementById("members-holder");
	membersDiv.removeChild(el.parentNode);
	if(meetingMembers.length<=0){
		membersDiv.innerHTML = "<h5>You have not yet invited any members</h5>";
	}
}
function validateUserName(name, el){
	var memberBtn = document.getElementById(el);
	new Ajax.Request("main.php",
		{
			parameters: {
				'class':'user',
				'method':'validateUserName',
				name: name
			},
			method: 'post',
			onSuccess: function(data){
				if(data.responseText == "no_user"){
					memberBtn.className ="margin-5 btn btn-danger";
				}else{
					memberBtn.className ="margin-5 btn btn-info";
				}
				
			}
		});
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
	showPopup();
	new Ajax.Request("main.php",
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
}

function addNewMeeting(){
	var taskName = document.getElementById("t-m_name-field").value;
	var taskLocation = document.getElementById("t-m_location-field").value;
	var taskStartDate = document.getElementById("t-m_date-field").value;
	var taskStartTime = document.getElementById("s-m_time-field").value;
	var taskEndTime = document.getElementById("e-m_time-field").value;
	var repTrue = document.getElementById("m_repetitive-true-field").checked;
	var description = document.getElementById("m_desc-field").value;
	var accessPrivate = document.getElementById("m_access-priv-field").checked;

	var users = {};
	for(i=0; i<meetingMembers.length; i++){
		users['user'+i] = meetingMembers[i]; 
	}
	users = JSON.stringify(users);
	showPopup();
	new Ajax.Request("main.php",
		{
			parameters: {
				'class':'meeting',
				'method':'add_meeting',
				name: taskName,
				location: taskLocation,
				date: taskStartDate,
				start_time: taskStartTime,
				end_time:taskEndTime,
				repeat: repTrue,
				description: description,
				access: accessPrivate,
				users: users

			},
			method: 'post',
			onSuccess: sendNewMeeting
		});
}

function sendNewMeeting(data){
	hidePopup();
	if(isNaN(data.responseText)){
		alert("Error: "+ data.responseText);
	}else{
		reloadMeetings();
	}
}
function reloadTasks(){
	var tasks_holder = document.getElementById('tasks-holder');
	new Ajax.Request("tasks-template.php",
		{
			method: 'get',
			onSuccess: function(data){
				tasks_holder.innerHTML = data.responseText;
				showTasksPanel();
			}
		});
}
function reloadMeetings(){
	var meetings_holder = document.getElementById('meetings-holder');
	new Ajax.Request("meetings-template.php",
		{
			method: 'get',
			onSuccess: function(data){
				meetings_holder.innerHTML = data.responseText;
				showMeetingsPanel();
			}
		});
}
function sendNewTask(data){
	hidePopup();
	if(isNaN(data.responseText)){
		alert("Error: "+ data.responseText);
	}else{
		reloadTasks();
	}
}
function acceptMeeting(meeting_id){
	showPopup();
	new Ajax.Request("main.php",
		{
			parameters: {
				'class':'meeting',
				'method':'accept_meeting',
				meeting_id: meeting_id
			},
			method: 'post',
			onSuccess:acceptMeetingResponse
		});
}
function acceptMeetingResponse(data){
	hidePopup();
	if(data.responseText == "success"){
		reloadTasks();
		reloadMeetings();
	}else{
		alert("Oops something went wrong");
	}
}
function showOverviewPanel(){
	loadPanel("overview-panel", "OVERVIEW");
}
function showTasksPanel(){
	loadPanel("tasks-panel", "TASKS");
}
function showMeetingsPanel(){
	loadPanel("meetings-panel", "MEETINGS");
}
function showAddTaskPanel(){
	loadPanel("new-task-panel", "NEW TASK");
}
function showAddMeetingPanel(){
	loadPanel("new-meeting-panel", "NEW MEETING");
}
function loadPanel(id, title){
	document.getElementById("new-task-panel").style.display = "none";
	document.getElementById("new-meeting-panel").style.display = "none";
	document.getElementById("overview-panel").style.display = "none";
	document.getElementById("tasks-panel").style.display = "none";
	document.getElementById("meetings-panel").style.display = "none";

	document.getElementById(id).style.display = "block";
	document.getElementById("panel-selected").innerHTML = title;
	resetLeftBar();
}
function showPopup(){
	document.getElementById("popup-back").style.display = "block";
}
function hidePopup(){
	document.getElementById("popup-back").style.display = "none";
}
function resetLeftBar(){
	var b1 = document.body;
	var b2 = document.documentElement;
	document.getElementById("left-bar").style.height = document.getElementById("right-bar").offsetHeight+"px";
	console.log(document.getElementById("right-bar").offsetHeight);
}
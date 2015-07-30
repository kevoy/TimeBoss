<?php
	require_once('optimised_schedule.php');
	require_once('access_group.php');
	$calendar = null;
	$group = null;
	$group_access = "selective";
	if(isset($_REQUEST['group_id'])){
		$group_id = $_REQUEST['group_id'];
		$group = new AccessGroup($group_id);
		$group_owner = $group->getOwner();
		$calendar = new OptimisedSchedule($group_owner->getID());
		$group_access = $group->getAccess();
	}else{
		$calendar = new OptimisedSchedule(User::getUserId());
	}
	$calendar->generate();
	$earliest_time = (int)$calendar->getEarliestTime();
	$latest_time = (int)$calendar->getLatestTime();
	$week_days = array($calendar->monday_tasks, $calendar->tuesday_tasks, $calendar->wednesday_tasks, $calendar->thursday_tasks, $calendar->friday_tasks );

	

?>
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
		<?php for($i=$earliest_time; $i<=$latest_time; $i++): ?>
		<div class="time-box col-md-1">
			<h4>
				<?php 
					if($i<12){
						echo $i." A.M";
					}else if($i==12){
						echo $i." P.M";
					}else{
						$z=$i-12;
						echo $z." P.M.";
					}
				?>
			</h4>
		</div>
		<div class="col-md-11 pad-0 tasks-cal">
			<?php foreach ($week_days as $days_tasks):?>
				<?php if(count($days_tasks)<=0): ?>
					<div class="task-box col-md-2 pad-0 c_1">
						<?php if($group== null): ?>
						<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
						<?php endif; ?>
					</div>
				<?php else: ?>
				<?php 
					$found=false;
					foreach ($days_tasks as $task):
						$sTime = strtotime($task->getStartTime());
						$sTime = (int)date('h', $sTime);
						if($group!=null && $group_access == "selective"){
							$is_in_group = false;
							$group_tasks = $group->getTasks();
							foreach ($group_tasks as $group_task) {
								if($group_task->getTaskId() != $task->getTaskId()){
									$sTime = -1;
								}
							}
						}
						
						if($sTime==$i): 
							$found=true; 
							$task_details = new Task($task->getTaskId());?>
							<div class="task-box col-md-2 pad-0">
								<h4><?php echo $task_details->getTaskName(); ?></h4>
								<h4><?php echo $task->getStartTime() . "-". $task->getEndTime();?> </h4>
								<h4><?php echo $task_details->getTaskLocation(); ?></h4>
							</div>
						<?php endif; ?>
					<?php endforeach; 
						if($found==false):
					?>
						<div class="task-box col-md-2 pad-0 c_1">
							<?php if($group== null): ?>
							<h4><span class="glyphicon glyphicon-plus-sign"></span></h4>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endfor; ?>
	</div>
</div>
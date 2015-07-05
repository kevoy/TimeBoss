<?php require_once('task.php'); ?>
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
		<?php 
		$tasks = Task::getMyTasks();
		foreach($tasks as $task):
		?>
		<tr>
			<td><?php echo $task->getTaskName(); ?></td>
			<td><?php echo $task->getTaskStartDate(); ?><br><?php echo $task->getTaskEndDate(); ?></td>
			<td><?php echo $task->getTaskStartTime(); ?><br><?php echo $task->getTaskEndTime(); ?></td>
			<td><?php echo $task->getTaskLocation(); ?></td>
			<td><?php echo $task->getTaskPriority(); ?></td>
			<?php if($task->isTaskMandatory()): ?>
				<td><span class="glyphicon glyphicon-ok-circle"></span></td>
			<?php else: ?>
				<td><span class="glyphicon glyphicon-minus-sign"></span></td>
			<?php endif; ?>
			<?php if($task->isTaskRepetitive()): ?>
				<td><span class="glyphicon glyphicon-ok-circle"></span></td>
			<?php else: ?>
				<td><span class="glyphicon glyphicon-minus-sign"></span></td>
			<?php endif; ?>
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
		<?php
		endforeach;
		?>

	</tbody>
</table>
					
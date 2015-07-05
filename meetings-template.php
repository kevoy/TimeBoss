<?php require_once('meeting.php'); ?>
<table class="table table-bordered table-hover c_table">
	<thead>
		<tr>
			<th>Meeting Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Location</th>
			<th>Your Status</th>
			<th>Users</th>
			<th>Requests Accepted</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$meetings = Meeting::getMeetingInvites();
		foreach($meetings as $meeting):
		?>
		<tr>
			<td><?php echo $meeting->getTaskName(); ?></td>
			<td><?php echo $meeting->getTaskStartDate(); ?><br><?php echo $meeting->getTaskEndDate(); ?></td>
			<td><?php echo $meeting->getTaskStartTime(); ?><br><?php echo $meeting->getTaskEndTime(); ?></td>
			<td><?php echo $meeting->getTaskLocation(); ?></td>
			<?php
				if($meeting->getRequestStatus(User::getUserId())=="unanswered"):
			?>
				<td><button type='button' class="btn btn-info" 
					onclick="acceptMeeting('<?php echo $meeting->meeting_id ?>')">Accept</button>
					<button type='button' class="btn btn-danger">Reject</button>
				</td>
			<?php else: ?>
				<td><?php echo $meeting->getRequestStatus(User::getUserId()); ?></td>
			<?php endif; ?>
			<td><?php echo $meeting->getNumUsers(); ?></td>
			<td><?php echo $meeting->getRequestsAccepted(); ?></td>
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
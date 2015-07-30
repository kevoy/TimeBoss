
<?php require_once('access_group.php'); 
	$groups = AccessGroup::getGroupsIn();
?>
<table class="table table-bordered table-hover c_table">
	<thead>
		<tr>
			<th>User Name</th>
			<th>Group Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($groups as $group): ?>
		<tr>
			<td><?php echo $group->getOwner()->getUserEmail();?></td>
			<td><?php echo $group->getName(); ?></td>
			<td><button type='button' class='btn btn-primary' onclick="window.location = 'public_schedule.php?group_id='+<?php echo $group->getId();?>;">View Schedule</button></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
					
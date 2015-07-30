<?php require_once('access_group.php'); 
	$groups = AccessGroup::getGroupsCreated();
?>
<table class="table table-bordered table-hover c_table">
	<thead>
		<tr>
			<th>Group Name</th>
			<th>Users</th>
			<th>Access Type</th>
			<th>Tasks</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($groups as $group): ?>
		<tr>
			<td><?php echo $group->getName(); ?></td>
			<td>
			<?php foreach ($group->getUsers() as $user):?>
				<span class="margin-10 glyphicon glyphicon-user group-ico" cust-title = "<?php echo $user->getUserEmail(); ?>"></span>
			<?php endforeach; ?>
			</td>
			<td><?php echo $group->getAccess(); ?></td>
			<td>
				<?php foreach ($group->getTasks() as $task):?>
					<span class="margin-10 glyphicon glyphicon-file group-ico" cust-title = "<?php echo $task->getTaskName(); ?>"></span>
				<?php endforeach; 
					if($group->getAccess() == "all"){
						echo "---";
					}
				?>

			</td>
			<td><button type="button" class="btn btn-info">
					<span class="glyphicon glyphicon-edit"></span>
				</button> 
				<button type="button" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove-circle"></span>
				</button>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
					
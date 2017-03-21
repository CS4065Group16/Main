<?php

include '../../../xampp/htdocs/cmsV3/partials/db.php';
include '../../../xampp/htdocs/cmsV3/partials/header.php';

?>
<div class =  "">

<h1><?php echo $title; ?><a class="" href="../../../xampp/htdocs/cmsV3/create.php">Create</a></h1>

</div>

<table class="">
	<thead>
		<tr>
			<th>Username</th> 
			<th>Title</th>
			<th>First Name</th>
            <th>Last Name </th>
			<th>Claimant Email</th>
			<th>Published</th>
			<th>Status</th>
			<th>Claim Deadline</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
    
<?php
		$task = new Task();
		$records = $task->my_tasks();
		if ($records) {
			foreach ($records as $record) {
				dump($record);
				?>
                
                
				<tr id="row_<?php echo $record->id; ?>">
					<th scope="row"><?php echo $record->id; ?></th>
					<td><?php echo $record->title; ?></td>
					<td><?php echo $record->claimed_user; ?></td>
					<td><?php echo $record->email; ?></td>
		
					<td><?php
						if ($record->expired) {
							echo 'Expired, ';
						} else {
							if ($record->claimed) {
								echo 'Claimed, ';
							} else {
								echo 'Pending claim (Unclaimed), ';
							}
							if ($record->completed) {
								echo 'Completed, ';
							}
						}
						?></td>
					<td><?php echo date("F jS, Y @ h:i A", strtotime($record->deadline_for_claiming)); ?></td>
					<td>
						<a class="" href="../../../xampp/htdocs/cmsV3/edit.php?id=<?php echo $record->id; ?>">Edit</a>
						<a class="" href="../../../xampp/htdocs/cmsV3/view.php?id=<?php echo $record->id; ?>">View</a>
						<a class="" onclick="return confirm('Are you sure to delete this task?')" href="../../../xampp/htdocs/cmsV3/delete_task.php?id=<?php echo $record->id; ?>">Delete</a>
					</td>
				</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
<?php




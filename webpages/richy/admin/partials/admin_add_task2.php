<?php

if(isset($_POST['create_task'])) {    # This Condition checks if  user submitted form or not if submitted then run following code
    
		//$_POST varibale contains the form data after submission
		$task_title             =       $_POST['task_title'];
        $task_id                =       $_POST ['task_id']
	

		//these are our database column name from tasks table to which we want to insert data
		$query = "INSERT INTO tasks( task_title, task_id) ";
		//these are values against these columns
		$query .= "VALUES(1, '$task_title', '$task_id') ";
		/*pssing our database conncetion (1st para) and our sql query (2nd)*/
		$creat_tag_query = mysqli_query($conn, $query);
        if(!$creat_tag_query)  //if above query have any error then show that errors 
		{
        
        die("Failed ." . mysqli_error($conn));
		
		}
		//if now error show success mesg
		echo "<script>alert('task has been added successfully')</script>";
} # Closing main if ?>

<form action="" method = "post" enctype="multipart/form-data">
   <div class="form-group">
      <label for="title">Task title</label>
      <input type="text" class="form-control" name="title" required>
   </div>
   
  
   <div class="form-group">
      <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
   </div>
</form>
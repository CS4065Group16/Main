<?php
require_once 'config.php'; # databaseConfiguration file
if(isset($_POST['create_task'])) {    # This Condition checks if  user submitted form or not if submitted then run following code
    
		//$_POST varibale contains the form data after submission
		$task_title             =       $_POST['title'];
		$task_type              =       $_POST['task_type'];
		$task_desc              =       $_POST['task_desc'];
		$task_subject           =       $_POST['task_subject'];
		$page_count             =       $_POST['page_count'];
		$word_count             =       $_POST['word_count'];
		$file_format            =       $_POST['file_format'];
		$sample                 =       $_FILES['sample']['name'];
		$post_sample_temp       =       $_FILES['sample']['tmp_name'];
		$claim_deadline         =       $_POST['claim_deadline'];
		$submission_deadline    =       $_POST['submission_deadline'];
		$drop_down_one          =       $_POST['drop_down_one'];
		$task_status            =       1;
		/*Moving file from temp location(1st para) to loactaion we want (2nd)*/
		move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );

		//these are our database column name from tasks table to which we want to insert data
		$query = "INSERT INTO tasks(creator_id, task_title,  task_description 	,  page_count, word_count) ";
		//these are values against these columns
		$query .= "VALUES(1, '$task_title','$task_desc','$page_count','$word_count') ";
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
      <label for="title">Task type</label>
      <input type="text" class="form-control" name="task_type" required>
   </div>
   <div class="form-group">
      <label for="title">Task Description</label>
      <input type="text" class="form-control" name="task_desc" required>
   </div>
   <div class="form-group">
      <label for="title">Task Subject</label>
      <input type="text" class="form-control" name="task_subject" required>
   </div>
   <div class="form-group">
      <label for="title">Page Count</label>
      <input type="text" class="form-control" name="page_count" required>
   </div>
   <div class="form-group">
      <label for="title">Word Count</label>
      <input type="text" class="form-control" name="word_count" required>
   </div>
   <div class="form-group">
      <label for="title">File Format</label>
      <input type="text" class="form-control" name="file_format" required>
   </div>
   <div class="form-group">
      <label for="post_doc">Sample</label>
      <input type ="file" class ="form-control" name ="sample" >
   </div>
   <div class="form-group">
      <label for="title">Claim Deadline</label>
      <input type="text" class="form-control" name="claim_deadline" required>
   </div>
   <div class="form-group">
      <label for="title">Submission Deadline</label>
      <input type="text" class="form-control" name="submission_deadline" required>
   </div>
   <div class="form-group">
      <label for="title">Tags</label>
      <select class="form-control" name="drop_down_one">
         <option value ="Marketing">Marketing</option>
         <option value ="Finance">Finance</option>
         <option value ="Poetry">Poetry</option>
         <option value ="Irish">Irish</option>
         <option value ="Programing">Programing</option>
      </select>
   </div>
   <div class="form-group">
      <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
   </div>
</form>
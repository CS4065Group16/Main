<?php


if(isset($_POST['create_task'])) {
    
                                        $task_title             =       $_POST['title'];
                                        $task_type              =       $_POST['task_type'];
                                        $task_desc              =       $_POST['task_desc'];
                                        $task_subject           =       $_POST['task_subject'];
                                        $page_count             =       $_POST['page_count'];
                                        $word_count             =       $_POST['word_count'];
                                        $file_format            =       $_POST['file_format'];
                                        $claim_deadline         =       date('y-m-d');
                                        $submission_deadline    =       date('y-m-d');
                                        $task_tags              =       $_POST['tags'];
    
    


    $query = "INSERT INTO task(task_id, creator_id, task_title, task_type, task desc, task_subject, page_count, word_count, file_format, claim_deadline, submission_deadline, flagged statue, task_tags) ";
    
    $query .= "VALUES('{$task_title}','{$task_type}','{$task_desc}','{$task_subject}', {$page_count}, {$word_count},'{$file_format}',now(), now(),'','{$task_tags}') ";

      $creat_tag_query = mysqli_query($connection, $query);
    
    if(!$creat_tag_query) {
        
        die("Failed ." . mysqli_error($connection));
        
    }
        

} 


?>







<form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">Task title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="title">Task type</label>
        <input type="text" class="form-control" name="task_type">
    </div>

    <div class="form-group">
        <label for="title">Task desc</label>
        <input type="text" class="form-control" name="task_desc">
    </div>
    
     <div class="form-group">
        <label for="title">Task Subject</label>
        <input type="text" class="form-control" name="task_subject">
    </div>

     <div class="form-group">
        <label for="title">Page Count</label>
        <input type="text" class="form-control" name="page_count">
    </div>

     <div class="form-group">
        <label for="title">Word Count</label>
        <input type="text" class="form-control" name="word_count">
    </div>

     <div class="form-group">
        <label for="title">File Format</label>
        <input type="text" class="form-control" name="file_format">
    </div>
    
     <div class="form-group">
        <label for="title">Claim Deadline</label>
        <input type="text" class="form-control" name="y-m-d">
    </div>
    
     <div class="form-group">
        <label for="title">Submission Deadline</label>
        <input type="text" class="form-control" name="submission_deadline">
    </div>
     
     
     
     
     
   <div class="form-group">  
  <label for="title">Tags</label>
  <select class="form-control" id="sel1">
    <option>Marketing</option>
    <option>Finance</option>
    <option>Programing</option>
    <option>Poetry</option>
    <option>Irish</option>
    <option>Programing</option>
    <option>Programing</option>
  </select>
    </div>
     
     
     
     
     
     
     
       

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
    </div>

  
  
</form>
   
  
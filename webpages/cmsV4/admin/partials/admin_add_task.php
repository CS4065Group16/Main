














<?php


if(isset($_POST['create_task'])) {
    
    
   
                                        $db_id                 =       $_SESSION['userID'];
                                        $task_title             =       $_POST['title'];
                                        $task_type              =       $_POST['task_type'];
                                        $task_desc              =       $_POST['task_desc'];
                                        $task_subject           =       $_POST['task_subject'];
                                        $page_count             =       $_POST['page_count'];
                                        $word_count             =       $_POST['word_count'];
                                        $file_format            =       $_POST['file_format'];
                                        $sample                 =       $_FILES['sample']['name'];
                                        $post_sample_temp       =       $_FILES['sample']['tmp_name'];
                                        $claim_deadline         =       date('y-m-d');
                                        $submission_deadline    =       date('y-m-d');
                                        $drop_down_one          =       $_POST['drop_down_one'];
                                        /*$drop_down_two          =       $_POST['drop_down_two'];
                                        $drop_down_three        =       $_POST['drop_down_three'];
                                        $drop_down_four         =       $_POST['drop_down_four'];*/
                                        $task_status            =       1;
                                        
    
                                        /*Moving file from temp location(1st para) to loactaion we want (2nd)*/
                                        move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );
                                
                                        



    $query = "INSERT INTO task(creator_id, task_title, task_type, task_desc, task_subject, page_count, word_count, file_format, sample, claim_deadline, submission_deadline, task_tags, task_statues) ";
    
    $query .= "VALUES('{$db_id}','{$task_title}','{$task_type}','{$task_desc}','{$task_subject}','{$page_count}','{$word_count}','{$file_format}','{$sample}','{$claim_deadline}','{$submission_deadline}','{$drop_down_one}','{$task_status}' ) ";

      $creat_tag_query = mysqli_query($connection, $query);
    header("location: tasks.php");
    
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
        <label for="title">Task Description</label>
        <textarea class="form-control" name="task_desc" id="" cols="30" rows="10">
        </textarea>
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
        <label for="post_doc">Sample</label>
        <input type ="file" class ="form-control" name ="sample">
        
        
        
    </div>
    
     <div class="form-group">
        <label for="title">Claim Deadline</label>
        <input type="text" class="form-control" name="y-m-d">
    </div>
    
     <div class="form-group">
        <label for="title">Submission Deadline</label>
        <input type="text" class="form-control" name="submission_deadline">
    </div>
    <!--<label class="btn btn-default btn-file">
    <input type="file" hidden>
    </label>
     -->
     
     
     
     
   <div class="form-group">  
  <label for="title">Tags</label>
  <select class="form-control" name="drop_down_one">
    <option>Marketing</option>
    <option>Finance</option>
    <option>Programing</option>
    <option>Poetry</option>
    <option>Irish</option>
    <option>Programing</option>
    <option>Programing</option>
  </select>
    </div>
    
<!--    <div class="form-group">  
  <label for="title">Tags</label>
  <select class="form-control" name="drop_down_two">
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
  <label for="title">Tags</label>
  <select class="form-control" name="drop_down_three">
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
  <label for="title">Tags</label>
  <select class="form-control" name="drop_down_four">
    <option>Marketing</option>
    <option>Finance</option>
    <option>Programing</option>
    <option>Poetry</option>
    <option>Irish</option>
    <option>Programing</option>
    <option>Programing</option>
  </select>
    </div>-->
     
     
     
     
     
     
       

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
    </div>

  
  
</form>
   
  
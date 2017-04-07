<?php
                                /*Catching edit get we are sending*/
                                if(isset($_GET['p_id'])){
                                    
                                    $the_task_id = $_GET['p_id'];
                                    
                                    
                                    
                                    
                                }

                    
                                $query = "SELECT FROM task" ;
                                $select_task_by_id= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task_by_id)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                        $claim_id               =       $row['claim_id'];
                                        $task_title             =       $row['task_title'];
                                        $task_type              =       $row['task_type'];
                                        $task_desc              =       $row['task_desc'];
                                        $task_subject           =       $row['task_subject'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $file_format            =       $row['file_format'];
                                        $claim_deadline         =       $row['claim_deadline'];
                                        $submission_deadline    =       $row['submission_deadline'];
                                        $flagged_status         =       $row['flagged_status'];
                                        $task_tags              =       $row['task_tags'];

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
   
  
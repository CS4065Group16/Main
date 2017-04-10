<?php
                           


                                /*Catching edit get we are sending*/
                                if(isset($_GET['p_id'])){ 
                                    
                                    $the_task_id = $_GET['p_id'];
                                    
                                }
                                    
                

                               /* $query = "SELECT FROM task WHERE task_id = '{$the_task_id}' ";*/
                                  
                                  
                                $query = "SELECT * FROM task WHERE task_id = $the_task_id " ;
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



if(isset($_POST['submit_post'])) {
   
    $post_title         = $_POST['post_title'];
    $post_task_type     = $_POST['post_task_type'];
    $post_task_desc     = $_POST['post_task_desc'];
    $post_task_subject  = $_POST['post_task_subject'];
    $post_page_count    = $_POST['post_page_count'];
    $post_word_count    = $_POST['post_word_count'];
    $post_file_format   = $_POST['post_file_format'];
    $post_sample            =  $_FILES['sample']['name'];
    $post_sample_temp       =  $_FILES ['sample']['tmp_name'];
    $post_claim_deadline = $_POST['post_claim_deadline'];
    $post_submission_deadline   = $_POST['post_submission_deadline'];
    $post_tag                   = $_POST['post_tag'];
  
        /*Moving file from temp location(1st para) to loactaion we want (2nd)*/
      /*  move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );*/

    
    
    
    
        $query     = "UPDATE task SET ";
        $query      .= "task_title = '{$post_title}', ";
        $query      .= "task_type = '{$post_task_type}', "; 
        $query      .= "task_desc = '{$post_task_desc}', "; 
        $query      .= "task_subject = '{$post_task_subject}', "; 
        $query      .= "page_count = '{$post_page_count}', "; 
        $query      .= "word_count = '{$post_word_count}', "; 
        $query      .= "file_format = '{$post_file_format}', "; 
        $query      .= "sample = '{$post_sample}', "; 
        $query      .= "claim_deadline = '{$post_claim_deadline}', "; 
        $query      .= "submission_deadline = '{$post_submission_deadline}', "; 
        $query      .= "task_tags = '{$post_tag}' "; 
        $query      .= "WHERE task_id = {$the_task_id} ";
    
    
        $update_task = mysqli_query($connection, $query);
        header("location: tasks.php");
    
        if(!$update_task) {
        
        die("Failed ." . mysqli_error($connection));
        
    }
    
    
    

    
    
    
    
    
    
    
    
    
}




 ?>




















   
   
   
   
   <form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">Task title</label>
        <input value ="<?php echo $task_title; ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="title">Task type</label>
        <input value ="<?php echo $task_type; ?>" type="text" class="form-control" name="post_task_type">
    </div>

     <div class="form-group">
        <label for="title">Task Description</label>
        <textarea class="form-control" name="post_task_desc" id="" cols="30" rows="10"><?php echo $task_desc; ?>
        
        </textarea>
    </div>
    
     <div class="form-group">
        <label for="title">Task Subject</label>
        <input value ="<?php echo $task_subject; ?>" type="text" class="form-control" name="post_task_subject">
    </div>

     <div class="form-group">
        <label for="title">Page Count</label>
        <input value ="<?php echo $page_count; ?>" type="text" class="form-control" name="post_page_count">
    </div>

     <div class="form-group">
        <label for="title">Word Count</label>
        <input value ="<?php echo $word_count; ?>" type="text" class="form-control" name="post_word_count">
    </div>

     <div class="form-group">
        <label for="title">File Format</label>
        <input value ="<?php echo $file_format; ?>" type="text" class="form-control" name="post_file_format">
    </div>
    <div class="form-group">
        <label for="post_doc">Sample</label>
        <input  type ="file" class ="form-control" name ="sample">
        
        
        
    </div>
    
     <div class="form-group">
        <label for="title">Claim Deadline</label>
        <input value ="<?php echo $claim_deadline; ?>" type="text" class="form-control" name="post_claim_deadline">
    </div>
    
     <div class="form-group">
        <label for="title">Submission Deadline</label>
        <input value ="<?php echo $submission_deadline; ?>" type="text" class="form-control" name="post_submission_deadline">
    </div>
    <!--<label class="btn btn-default btn-file">
    <input type="file" hidden>
    </label>
     -->
     
     
     
     
   <div class="form-group">  
      <label for="title">Tags</label>
      <select class="form-control" name = "post_tag">
    <!--
                            /*    $query = "SELECT * FROM tags";
                                $select_tags= mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                        
                                        echo "<option value=''>{$tag_title}</option>";
                                 
                                        }*/
      -->
    
   
    
    
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
        <input class = "btn btn-primary" type="submit" name="submit_post" value="Update Task">
    </div>

  
  
</form>
   
  
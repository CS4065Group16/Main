<?php 

if(!isset($_SESSION['username'])) {
    
    
    header("Location: ../index.php");
    
}


?>
                          

                          
                          <?php
                           


                                /*Catching edit get we are sending*/
                                if(isset($_GET['p_id'])){ 
                                    
                                    $the_task_id = $_GET['p_id'];
                                    
                                }
                                    
                

                               /* $query = "SELECT FROM task WHERE task_id = '{$the_task_id}' ";*/
                                  
                                  
                                $query = "SELECT * FROM
                                            tasks
                                            INNER JOIN document 
                                            ON tasks.file_id =  document.document_id
                                            INNER JOIN categories
                                            ON categories.category_id = tasks.creator_id
                                            WHERE task_id = $the_task_id " ;
                                
                                $select_task_by_id= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task_by_id)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                        
                                        $task_title             =       $row['task_title'];
                                        $category            =       $row['category'];
                                        $document_id            =       $row['document_id'];
                                     $document_loc           =       $row['document_loc'];
                                        $task_desc              =       $row['task_description'];
                                        $word_count             =       $row['word_count'];
                                        $page_count             =       $row['page_count'];
                                        $file_format            =       $row['file_format'];
                                        $created_date           =       $row['created_date'];
                                        $expiration_date        =       $row['expiration_date'];
                                       
                                        
                                 


                                if(isset($_POST['create_task'])) {
    
                                        
    
                                        $user_id                =       $_SESSION['user_id'];
                                        $task_title             =       $_POST['title'];
                                        $task_category          =       $_POST['task_category'];
                                        $task_desc              =       $_POST['task_desc'];
                                        $tag_one                =       $_POST['tag_one'];
                                        $tag_two                =       $_POST['tag_two'];
                                        $tag_three              =       $_POST['tag_three'];
                                        $tag_four               =       $_POST['tag_four'];
                                        $page_count             =       $_POST['page_count'];
                                        $word_count             =       $_POST['word_count'];
                                        $file_format            =       $_POST['file_format'];
                                        $sample                 =       $_FILES['sample']['name'];
                                        $post_sample_temp       =       $_FILES['sample']['tmp_name'];
                                        $created_date           =       date("Y-m-d H:i:s", time());
                                        $expiration_date        =       date("Y-m-d H:i:s", time() + (7 * 24 * 60 * 60));
                                        $task_status            =       '1';
                                        
                                        
                                    
                                        /*Moving file from temp location(1st para) to loactaion we want (2nd)*/
                                        move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );
                                        
                                        /*Inserting name in documnet table*/
                                        
                                    
                                       if(!empty($sample)) {
                                           
                                             $query = "UPDATE document set document_loc = '{$sample}' WHERE document_id = {$document_id} ";
                                        $insert_doc_query = mysqli_query($connection, $query);
    
                                        if(!$insert_doc_query) {
                                         die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                            }
                                           
                                           
                                           
                                       }
                                          
                                        
                                      
                                        
                                        
    
    
                                        $file_id = mysqli_insert_id($connection);

                                        
                                        
    
    
                                        /*GETTING CATEGORY ID*/
    
                                        
                                        $query  =   "SELECT category_id
                                                    FROM categories
                                                    WHERE category = '{$task_category}' ";
                                                    $getting_category_id = mysqli_query($connection, $query);
                                                    if(!$getting_category_id) {  
                                                    die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                                        }
    
                                                    $category_id = 0;
                                                    while($row = mysqli_fetch_assoc($getting_category_id)) {
                                                            $category_id       =       $row['category_id'];
                                        
                                                    }
                                        
                                                    $category_id;

                                             /*ADDING NEW TASK*/
    
                                    
                               /*     
                                    $query = "UPDATE users SET ";
                            
                            $query .= "first_name  = '{$new_first_name}', ";
                            $query .= "last_name  = '{$new_last_name}', ";
                            $query .= "email  = '{$new_db_user_email}',  ";
                            $query .= "password = '{$new_db_user_password}' ";
                            $query .= "WHERE user_id = '{$db_id}' ";
                                    */
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                        $query = "UPDATE tasks SET ";
                            
                                       
                                        $query .= "task_title  = '{$task_title}', ";
                                        $query .= "category_id  = '{$category_id}',  ";
                                        $query .= "task_description  = '{$task_desc}',  ";
                                        $query .= "word_count  = '{$word_count}',  ";
                                        $query .= "page_count  = '{$page_count}',  ";
                                        $query .= "file_format = '{$file_format}' ";
                                        $query .= "WHERE task_id = '{$the_task_id}' ";

                                    
                                   
    
                                        $update_task = mysqli_query($connection, $query);
                                        /*header("location: tasks.php");*/

                                        if(!$update_task) {

                                        die("Failed ." . mysqli_error($connection));

                                    }



    
                                        $create_task_query = mysqli_query($connection, $query);
                                        /*header("location: tasks.php");*/
    
                                        if(!$create_task_query) {

                                        die("Failed ." . mysqli_error($connection));
                                        }
    
                                        $task_id = mysqli_insert_id($connection);
                                        
                                        /*GETTING TAG ID SENT FROM FORM*/
                                        $tag_one_id = geetingTagId($tag_one);
                                        $tag_two_id = geetingTagId($tag_two);
                                        $tag_three_id = geetingTagId($tag_three);
                                        $tag_four_id = geetingTagId($tag_four);
                                                            
                                                            
                                           
                    
    
    
    
                                        if ($tag_one_id == $tag_two_id || $tag_one_id == $tag_two_id || $tag_one_id == $tag_three_id || $tag_one_id == $tag_four_id ||
                                            $tag_two_id == $tag_three_id || $tag_two_id == $tag_four_id || $tag_three_id == $tag_four_id) {
                        
                                        echo "To help other users find yours task please choose at least 4 DIFFERENT tags to accompany your tasks - Thank You :-).";
                                         
                        
                                            }
                       
                        else{
                            
                                    /*INSERT TAG ID AND TASK ID IN FUNCTION TABLE*/  
                                insertingIntoTaskItermediateTable($tag_one_id,$task_id);
                            
                            
                                insertingIntoTaskItermediateTable($tag_two_id,$task_id);
                            
                                insertingIntoTaskItermediateTable($tag_three_id,$task_id);
                          
                                insertingIntoTaskItermediateTable($tag_four_id,$task_id);
                            }            
                                        
                                        
                                       
                            
                       
                       
                       
                       
                       

                                        }

    
    

    
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    





 ?>






<div class="container">



<form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">Task title</label>
        <input value ="<?php echo $task_title; ?>" class="form-control" name="title">
    </div>

    
     <div class="form-group">
                              <label for="sel1">Task Type</label>
                              <select class="form-control" name="task_category" placeholder="Major Subject">
                                <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                                $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                        
                        <?php }?>
                              </select>
                   </div>

    <div class="form-group">
        <label for="title">Task Description</label><textarea class="form-control" name="task_desc" id="" cols="30" rows="10"><?php echo $task_desc?></textarea>
    </div>
    
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_one" placeholder="Major Subject">
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_two" placeholder="Major Subject">
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_three" placeholder="Major Subject">
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_four" placeholder="Major Subject">
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
    </div>
    
   

      <div class="form-group">
        <label for="title">Word Count</label>
        <input value ="<?php echo $word_count ?>" class="form-control" name="word_count">
    </div>
       
       <div class="form-group">
        <label for="title">Page Count</label>
        <input value ="<?php echo $page_count ?>" class="form-control" name="page_count">
    </div>

    

     <div class="form-group">
        <label for="title">File Format</label>
        <input value ="<?php echo $file_format ?>" class="form-control" name="file_format">
    </div>
    <div class="form-group">
        <label for="post_doc">Sample</label>
        <input type ="file" <?php echo $document_loc ?> class ="form-control" name ="sample">
        
        
        
        
    </div>
    
     <!--<div class="form-group">
        <label for="title">Claim Deadline</label>
        <input type="text" placeholder = " MM/DD/YYYY" class="form-control" name="y-m-d">
    </div>
    
     <div class="form-group">
        <label for="title">Completion Deadline</label>
        <input type="text" placeholder = " MM/DD/YYYY" class="form-control" name="submission_deadline">
    </div>
    -->
     
     
       

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="create_task" value="Update Task">
    </div>

  
  
</form>
</div>
























































   
   
   
   
   <!--<form action="" method = "post" enctype="multipart/form-data">
    
    



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
    </div>-->
    <!--<label class="btn btn-default btn-file">
    <input type="file" hidden>
    </label>
     -->
     
     
     
     
  <!-- <div class="form-group">  
      <label for="title">Tags</label>
      <select class="form-control" name = "post_tag">
    
                            /*    $query = "SELECT * FROM tags";
                                $select_tags= mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                        
                                        echo "<option value=''>{$tag_title}</option>";
                                 
                                        }*/
      
    
   
    
    
    <option>Finance</option>
    <option>Programing</option>
    <option>Poetry</option>
    <option>Irish</option>
    <option>Programing</option>
    <option>Programing</option>
      </select>
       </div>-->
 
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
     
     
     
     
     
     
       

   <!-- <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="submit_post" value="Update Task">
    </div>

  
  
</form>
   -->
  

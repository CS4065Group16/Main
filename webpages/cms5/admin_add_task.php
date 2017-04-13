<!--
//source: http://php.net/manual/en/function.move-uploaded-file.php


//source: labs & tutorials
-->


<?php

/*$_SESSION['user_id']     = $db_id;*/


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
                                        
                                        $query = "INSERT INTO document (document_loc) VALUES  ('{$sample}' ) ";
                                        $insert_doc_query = mysqli_query($connection, $query);
    
                                        if(!$insert_doc_query) {
                                         die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
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
    

                                        $query = "INSERT INTO tasks (creator_id, task_title, category_id, file_id, task_description, word_count, page_count, file_format, created_date, expiration_date, status_id) ";
    
                                        $query .= "VALUES('{$user_id}','{$task_title}','{$category_id}','{$file_id}','{$task_desc}','{$word_count}','{$page_count}','{$file_format}','{$created_date}','{$expiration_date}','{$task_status}' ) ";

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












                                                        
                                                        
    
    
    
    


                                       
         





                                    









                                            
    








    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

                                                            
                                       
                                                             
               
                                        
                
                              
    

    


/*

                                        $tag_one_id = tagId($tag_one);
                                        $idInsertLast = mysql_insert_id();
                                        
                
                                        $query  = "INSERT INTO task_intermediate_tag (tag_id, task_id) "; 
                                        $query .= "VALUES('{$tag_one_id}','{$idInsertLast}') ";
    
                                        $creat_tag_task_link = mysqli_query($connection, $query);
                                        header("location: tasks.php");

                                        if(!$creat_tag_task_link) {

                                                die("Failed ." . mysqli_error($connection));
                                        }
*/









                    
                    
                    
                    
                    
                    

   
      

    
    
    
    
    
    
    
    
    
                           
              
    
    
    
    
    








    
    
    
    
   














?>





<div class="container">



<form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">Task title</label>
        <input type="text" class="form-control" name="title">
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
        <label for="title">Task Description</label>
        <textarea class="form-control" name="task_desc" id="" cols="30" rows="10">
        </textarea>
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
        <input type="text" class="form-control" name="word_count">
    </div>
       
       <div class="form-group">
        <label for="title">Page Count</label>
        <input type="text" class="form-control" name="page_count">
    </div>

    

     <div class="form-group">
        <label for="title">File Format</label>
        <input type="text" class="form-control" name="file_format">
    </div>
    <div class="form-group">
        <label for="post_doc">Sample</label>
        <input type ="file" class ="form-control" name ="sample">
        
        
        
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
        <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
    </div>

  
  
</form>
</div>
  
<!--
<?php 

if(!isset($_SESSION['username'])) {
    
    
    header("Location: ../index.php");
    
}


?>


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
                                        
                                        
                                        
                                        
                                        $tag_one_id = geetingTagId($tag_one);
                                        $tag_two_id = geetingTagId($tag_two);
                                        $tag_three_id = geetingTagId($tag_three);
                                        $tag_four_id = geetingTagId($tag_four);
    
    
                                        
    /*VALIDATION*/
    
    
    /*Creating an array containing errors*/
    $error = [
        
        'title_error'=>'',
        'task_category_error'=>'',
        'task_desc_error'=>'',
        'tag_one_error'=>'',
        'tag_two_error'=>'',
        'tag_three_error'=>'', 
        'tag_four_error'=>'',
        'word_count_error'=>'',
        'page_count_error'=>'',
        'file_format_error'=>'',
        'sample_error'=>''
        
        
        
        
    ];
    
        
        
    /*User Name Validation*/    
        
        
   
        
    
    
    /*Checking usernaem has a field*/    
    if($task_title =='') {
        $error['title_error'] = 'Please provide a tittle'; 
        
    } 
     if(strlen($task_title) > 19) {
        $error['title_error'] = 'tittle to large'; 
        
    } 
        
    
    if($task_category =='') {
        $error['task_category_error'] = 'Please choose a category for your task'; 
    }
    
    if($task_desc =='') {
        $error['task_desc_error'] = 'Please give a brief description of your task'; 
    }
    
    if($tag_one =='') {
        $error['tag_one_error'] = 'Please choose at least one tag assocaited with your task'; 
    }
    
        if($tag_two > 0) { 
       if ($tag_two_id == $tag_one_id) {
        $error['tag_two_error'] =  'You have two tags the same '; 
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    if($tag_three == $tag_one || $tag_three == $tag_two ) {
        $error['tag_three_error'] = 'You have two tags the same '; 
    }
    
     if($tag_four == $tag_one || $tag_four == $tag_three || $tag_four == $tag_two) {
        $error['tag_four_error'] = 'You have two tags the same '; 
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    if($word_count =='') {
        $error['word_count_error'] = 'Please give as an accurate word count of your task'; 
    }
    
    if($page_count =='') {
        $error['page_count_error'] = 'Please give as an accurate page count of your task'; 
    }
    
    
    if($file_format =='') {
        $error['file_format_error'] = 'Please give the file format you are uploading'; 
    }

    if($file_format =='') {
        $error['sample_error'] = 'Please upload a sample (no bigger then 3 pages)'; 
    }

/*If everything above  is fine then reg user*/
/*foreach($error as $key=> $value) {
    
    if(empty($value)) {
        So if above errors arre empty we are going to unset key
        unset($error[$key]);
    }
    
    if(empty($error)) {
        
        register_user($username, $firstname, $lastname, $email,$password,$studentId,$major);
        login_user($username, $password);
        
         header("Location:index.php");
    }
   
    
    
    
}

 */   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                                        //source: http://php.net/manual/en/function.move-uploaded-file.php
                                        
                                            if(isset($_FILES["sample"]["error"])){
                                                if($_FILES["sample"]["error"] > 0){
                                                    echo "Error: " . $_FILES["sample"]["error"] . "<br>";
                                                } else{
                                                    $allowed = array("application/pdf");
                                                    $filename = $_FILES["sample"]["name"];
                                                    $filetype = $_FILES["sample"]["type"];
                                                    $filesize = $_FILES["sample"]["size"];

                                                    /*Asankas code*/
                                                    
                                                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                                                    $mime = finfo_file($finfo, $_FILES['sample']['tmp_name']);
                                                    
                                                    
                                                    // Verify file extension
                                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                    if(!in_array($filetype, $allowed)) die("Error: Please select a valid file format.");

                                                    // Verify file size - 5MB maximum
                                                    $maxsize = 5 * 1024 * 1024;
                                                    if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                                                    // Verify MYME type of the file
                                                    if(in_array($filetype, $allowed)){
                                                        // Check whether file exists before uploading it
                                                        if(file_exists("../samples_docs/" . $_FILES["sample"]["name"])){
                                                            echo $_FILES["sample"]["name"] . " is already exists.";
                                                        } else{
                                                            
                                                            
                                                            
                                                          /*  if (!empty($tag_one_id) && $tag_one_id == $tag_two_id || $tag_one_id == $tag_two_id || $tag_one_id == $tag_three_id || $tag_one_id == $tag_four_id ){
                                                                    echo "Please select differt tags";
                                        
                                                                }
                                                            
                                                            if (!empty($tag_two_id) && $tag_two_id == $tag_three_id || $tag_two_id == $tag_four_id){
                                                                    echo "Please select differt tags";
                                        
                                                                }
                                                            
                                                            if (!empty($tag_three_id) && $tag_three_id == $tag_four_id){
                                                                    echo "Please select differt tags";
                                                                
                                                            }
                                                            
                                                            if (!empty($tag_four_id)){
                                                                    echo "Please select differt tags";
                                                                
                                                            }*/
                                                            
                                                            

                                                                       /* if (!empty($tag_one)) {
                                                                            $tag_one_id = geetingTagId($tag_one);

                                                                        }

                                                                        if (!empty($tag_two)) {
                                                                            $tag_two_id = geetingTagId($tag_two);

                                                                        }



                                                                        if  (!empty($tag_two)) {
                                                                            $tag_three_id = geetingTagId($tag_three_id);
                                                                        }



                                                                        if  (!empty($tag_four_id)) {
                                                                            $tag_three_id = geetingTagId($tag_four_id);
                                                                        }

                                                            
                                                            
                                                            
                                                            if ($tag_one_id == $tag_two_id || $tag_one_id == $tag_two_id || $tag_one_id == $tag_three_id || $tag_one_id == $tag_four_id ||
                                                                $tag_two_id == $tag_three_id || $tag_two_id == $tag_four_id || $tag_three_id == $tag_four_id) {

                                                            echo "To help other users find yours task please choose at least 4 DIFFERENT tags to accompany your tasks - Thank You :-).";}

                        
                                                                else{*/
                            
                                                        
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            /*Moving file from temp location(1st para) to loactaion we want (2nd)*/
                                                           /* move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );*/
                                                            /*NOW SAFE TO MOVE IT*/
                                                            move_uploaded_file($_FILES["sample"]["tmp_name"], "../samples_docs/" . $_FILES["sample"]["name"]);
                                                            echo "Your file was uploaded successfully.";
                                                        
                                                        
                                                        
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
                                        
                                       
                                                            
                                                            
                                                 /*INSERT TAG ID AND TASK ID IN FUNCTION TABLE*/  


                                    if (!empty($tag_one_id)){

                                        insertingIntoTaskItermediateTable($tag_one_id,$task_id);
                                    }

                                     if (!empty($tag_two_id)){
                                    insertingIntoTaskItermediateTable($tag_two_id,$task_id);
                                    }
                                    if (!empty($tag_three_id)){
                                    insertingIntoTaskItermediateTable($tag_three_id,$task_id);
                                    }
                                    if (!empty($tag_four_id)) {       
                                    insertingIntoTaskItermediateTable($tag_four_id,$task_id);
                                    }
                                      
                    
    
    
    
                       
                        
                            /*}   */         
                                        
                                   
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        } 
                                                    } else{
                                                        echo "Error: There was a problem uploading your file - please try again."; 
                                                    }
                                                }
                                            } else{
                                                echo "Error: Invalid parameters - please contact your server administrator.";
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



<?php
function load_tags() {

                        $query = "SELECT tag FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                        
                        $list = $select_all_tags_sidebar->fetchALL(PDO::FETCH_ASSOC);
    
    
                        
}
?>
                                









































<div class="container">



<form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">Task title</label>
        <input type="text" class="form-control" name="title" autocomplete="on" 
                            
                            value="<?php echo isset($task_title) ? $task_title : '' ?>"
                               >
                               
                                <p><?php echo isset($error['title_error']) ?  $error['title_error'] : '' ?></p>
    </div>

    
     <div class="form-group">
                              <label for="sel1">Task Type</label>
                              <select class="form-control" name="task_category" placeholder="Major Subject">
                                <option value="">Select</option>
                                   
                                   <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                                $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                        
                        <?php }?>
                              </select>
                              <p><?php echo isset($error['task_category_error']) ?  $error['task_category_error'] : '' ?></p>
                              
                   </div>

    <div class="form-group">
        <label for="title">Task Description</label>
        <textarea class="form-control" name="task_desc" id="" cols="30" rows="10"
        autocomplete="on"><?php if (isset($task_desc)) {echo $task_desc;} ?></textarea>
        <p><?php echo isset($error['task_desc_error']) ?  $error['task_desc_error'] : '' ?></p>
    
    </div>
    
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_one" placeholder="Major Subject">
          
          
          
          <option value="">Select</option>
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
        <p><?php echo isset($error['tag_one_error']) ?  $error['tag_one_error'] : '' ?></p>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_two" placeholder="Major Subject" disabled = "disabled">
          <option value="">Select</option>
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
         <p><?php echo isset($error['tag_two_error']) ?  $error['tag_two_error'] : '' ?></p>
        
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_three" placeholder="Major Subject" disabled = "disabled">
          <option value="">Select</option>
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
         
        </select>
         <p><?php echo isset($error['tag_three_error']) ?  $error['tag_three_error'] : '' ?></p>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_four" placeholder="Major Subject" disabled = "disabled">
          <option value="">Select</option>
           <?php
                        $query = "SELECT * FROM tags";
                        $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                        
                        while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                                    $tag_title = $row['tag'];
                                                    
                            ?>
                            <option> <?php echo $tag_title ?> </option>                          
                        
                        <?php }?>
                                
    
          
        </select>
        <p><?php echo isset($error['tag_four_error']) ?  $error['tag_four_error'] : '' ?></p>
    </div>
    
  

      <div class="form-group">
        <label for="title">Word Count</label>
        <input type="text" class="form-control" name="word_count" autocomplete="on" 
                            
                            value="<?php echo isset($word_count) ? $word_count : '' ?>">
    
      
      
       <p><?php echo isset($error['word_count_error']) ?  $error['word_count_error'] : '' ?></p>
                              
      </div>
       
       <div class="form-group">
        <label for="title">Page Count</label>
        <input type="text" class="form-control" name="page_count" autocomplete="on" 
                            
                            value="<?php echo isset($page_count) ? $page_count : '' ?>">
         <p><?php echo isset($error['page_count_error']) ?  $error['page_count_error'] : '' ?></p>
                              
    </div>

    

     <div class="form-group">
        <label for="title">File Format</label>
        <input type="text" class="form-control" name="file_format" value="<?php echo isset($file_format) ? $file_format : '' ?>">
        <p><?php echo isset($error['file_format_error']) ?  $error['file_format_error'] : '' ?></p>
    
    
    
    </div>
    <div class="form-group">
        <label for="post_doc">Sample</label>
        <input type ="file" class ="form-control" name ="sample">
        <p><?php echo isset($error['sample_error']) ?  $error['sample_error'] : '' ?></p>
        
        
        
        
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
  
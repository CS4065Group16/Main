


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
                                        $claim_deadline         =       date('m-d-y');
                                        $expiration_deadline    =       date('m-d-y');
                                        $task_status            =       '1';
                                        $file_id                =       '1';
                                        
                                        
    
                                        /*Moving file from temp location(1st para) to loactaion we want (2nd)*/
                                        move_uploaded_file($post_sample_temp, "../samples_docs/$sample" );
                                        
                                        /*$query = "INSERT INTO document (document_loc) VALUES  ('{$sample}' ) ";
                                        $insert_doc_query = mysqli_query($connection, $query);
    
                                        if(!$insert_doc_query) {

                                         die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                    }
                                        } 
                                            */
                                                            
                                        /*GETTING CATEGORY ID*/
    
                                        
                                        $query  =   "SELECT category_id
                                                    FROM categories
                                                    WHERE category = '{$task_category}' ";

                                                    $getting_category_id = mysqli_query($connection, $query);

                                                    if(!$getting_category_id) {  
                                                    die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                                        }

                                                    while($row = mysqli_fetch_assoc($getting_category_id)) {
                                                            $category_id       =       $row['category_id'];
                                                             
               
                                        /*ADDING NEW TASK*/
    
                                        $query = "INSERT INTO tasks (creator_id, task_title, category_id, file_id, task_description, word_count, page_count, file_format, document, created_date, expiration_date, status_id) ";
    
                                        $query .= "VALUES('{$user_id}','{$task_title}','{$category_id}','{$file_id}','{$task_desc}','{$word_count}','{$page_count}','{$file_format}','{$sample}','{$claim_deadline}','{$expiration_deadline}','{$task_status}' ) ";

                                        $create_task_query = mysqli_query($connection, $query);
                                      /*  header("location: tasks.php");*/
    
                                        if(!$create_task_query) {

                                        die("Failed ." . mysqli_error($connection));
                                        }
                
                                         } 
                                        /*ADDING TASK*/
    
                                        $tag_one_id = tagId($tag_one);
                                       
                                        $a = 16;
                
                                        $query  = "INSERT INTO task_intermediate_tag (tag_id, task_id) "; 
                                        $query .= "VALUES('{$tag_one_id}','{$idInsertLast}') ";
    
                                        $creat_tag_task_link = mysqli_query($connection, $query);
                                     /*   header("location: tasks.php");
*/
                                        if(!$creat_tag_task_link) {

                                                die("Failed ." . mysqli_error($connection));
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
        <label for="title">Task type</label>
        <input type="text" class="form-control" name="task_type">
    </div>
     <div class="form-group">
                              <label for="sel1"> Subject</label>
                              <select class="form-control" name="task_category" placeholder="Major Subject">
                                <option></option>
                                <option>Maths</option>
                                <option>computer</option>
                                <option>Irish</option>
                                <option>History</option>
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
            <option></option>
            <option>Maths</option>
            <option>computer</option>
            <option>Irish</option>
            <option>History</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_two" placeholder="Major Subject">
            <option></option>
            <option>Maths</option>
            <option>Irish</option>
            <option>History</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_three" placeholder="Major Subject">
            <option></option>
            <option>Maths</option>
            <option>Irish</option>
            <option>History</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sel1"> Tags</label>
        <select class="form-control" name="tag_four" placeholder="Major Subject">
            <option></option>
            <option>Maths</option>
            <option>Irish</option>
            <option>History</option>
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
    
     <div class="form-group">
        <label for="title">Claim Deadline</label>
        <input type="text" placeholder = " MM/DD/YYYY" class="form-control" name="y-m-d">
    </div>
    
     <div class="form-group">
        <label for="title">Completion Deadline</label>
        <input type="text" placeholder = " MM/DD/YYYY" class="form-control" name="submission_deadline">
    </div>
    
     
     
       

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="create_task" value="Publish Task">
    </div>

  
  
</form>
</div>
  
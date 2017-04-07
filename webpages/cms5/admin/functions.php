<?php session_start();?>
<?php /*$reputation = $_SESSION['reputation'];*/ ?>
<?php /*$db_id = $_SESSION['user_id'];*/ ?>
    



<?php

function insert_tags(){
    
    //Remember GLOBAL CONNECTION
    global $connection;
    
    if (isset($_POST['submit'])) {
                            
                         /* getting tittle out of super gloabl*/
                        $tag_title = $_POST['tag_title'];
                        
                        
                        if($tag_title == "" || empty($tag_title)) {
                            
                            echo "Field can not be empty";
                            
                        } else {
                            
                           /*do query*/
                            
                            $query  = "INSERT INTO TAGS (tag) ";
                            $query .= "VALUE ('{$tag_title}') ";
                            
                            //send query to database
                            $create_tag_query = mysqli_query($connection, $query);
                            
                            if(!$create_tag_query) {
                                
                                die ('Query failed' . mysqli_error($connection));
                                
                            }
                            
                        }
                            
                        }
                            
    
    
}



function findAllTags(){
    
   global $connection;
    
                                $query = "SELECT * FROM tags ";
                                $select_tags= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                        
                                        echo"<tr>";
                                        echo "<td> {$tag_id} </td>";
                                        echo "<td> {$tag_title} </td>";
                                        //When clicked on we want to pass in params that creates a key in array, get req (delete is the key stag id the value)
                                        echo "<td><a href ='tags.php?delete={$tag_id}'>Delete</a></td>";
                                        echo "<td><a href ='tags.php?edit={$tag_id}'>Edit</a></td>";
                                        echo"<tr>";

                                }
    
    
    
    
}





function deleteTag() {
     global $connection;
    
     //seeing if get request has delete from above
                                    if(isset($_GET['delete'])) {
                                    
                                    //saving value passed in URL  to different Var      
                                    $the_tag_id =  $_GET['delete'];
                                    $query = "DELETE FROM tags WHERE tag_id = {$the_tag_id} ";
                                    $delete_query = mysqli_query($connection, $query);
                                    
                                    
                                    
                                      if(!$delete_query) {
                                
                                die ('Query failed' . mysqli_error($connection));
                                    
                                    
                                    
                                    
                                }
                                //once done refersh page
                                header("Location:tags.php");
                                }
                                
    
    
    
    
    
}



function dropDownTags() {
    global $connection;
    
    $query = "SELECT * FROM tags";
                                $select_tags = mysqli_query($connection, $query);
                                
      
                                if(!$select_tags) {
        
                                            die("Failed ." . mysqli_error($connection));

                                }
                                
                                /*Looping through tags and deisplaying them in drop down*/
                                
                                 while  ($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];  
                                     
                                     echo "<option value=''>{$tag_title}</option>";
                                     
                                     
                                
                                 }
    
    
    
    
}




function claimTask($the_task_id){
    global $connection;
    
     if(isset($_POST['claim_task'])) {
      
    $userID = $_SESSION['userID'];
                   
   /* $the_task_id = $_GET['t_id'];*/

     
    $query = "UPDATE tasks SET status_id = '2' WHERE task_id ={$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
      //Refresh after action
                            
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));}
                        
                 
                        
   $query = "INSERT INTO claimed_tasks (task_id, student_id, claimed_date) VALUES ({$the_task_id}, {$userID}, now())";
    
   $update_claimed_tasks_query = mysqli_query($connection, $query);
      //Refresh after action
                            
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));
                        
                               
    
} 
 header('Location:./admin/tasks.php?source=view');      
  }
    
}



function deleteTask($the_task_id){
    global $connection;
    
    
    if(isset($_POST['delete_task'])) {
                            
                           $the_new_task_id    =   $_GET['p_id'];
                            
                            $query = "DELETE FROM tasks WHERE task_id = {$the_task_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            
                            if(!$delete_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                            
                       
                           
                          
                        }
    
    
    
    
    
}


function flagtask($the_task_id, $db_id){
    global $connection;
       
                    if(isset($_POST['flagg_task'])) {
                        
                        /*//Coming from URL
                        $new_the_task_id    =   $_GET['p_id'];
                        $db_id = $_SESSION['user_id'];*/
                        
                        $username           =   $_SESSION['username'];
                        /*Fisrt we are getting the post data out*/
                        $flag_comment       =   $_POST['comment_content'];
                       
                        $query = "INSERT INTO flagged_task (task_id, user_id, flag_comment, flag_date, flag_status)";
                        $query.= "VALUES ({$the_task_id} ,'{$db_id}', '{$flag_comment}', now(), 'unapproved') ";
                        
                        $create_comment_query = mysqli_query($connection,$query);
                        
                        if(!$create_comment_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                        
                        
                        
                        
                        
                    }
    
    
    
    
}

function withdrawOffer(){
    global $connection;
    
    if(isset($_GET['withdraw'])) {
                            
                            $the_task_id_for_withdraw = $_GET['withdraw'];
                            
                            $query = "UPDATE tasks SET status_id = '1' WHERE task_id = {$the_task_id_for_withdraw} ";
                            $decline_query = mysqli_query($connection, $query);
                            
                               header("location:./tasks.php?source=view");

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
        
                            $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_withdraw} ";
                            $delete_query = mysqli_query($connection, $query);
                            
                            if(!$delete_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                                         
}
       

}
}

function updateReputation($value) {
    global $connection;
    $db_id = $_SESSION['user_id'];
      
                            $query = "UPDATE users SET reputation = reputation + {$value} WHERE user_id   = {$db_id} ";

                            $create_comment_query = mysqli_query($connection,$query);

                            if(!$create_comment_query) {

                                die('QUERY FAILED' . mysqli_error($connection));
                            }
                        
    
    
    
}

function tagId($tag){
    global $connection;
    
                $query  =           "SELECT tag_id
                                    FROM tags
                                    WHERE tag = '{$tag}' ";
                    
                $getting_category_id = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($getting_category_id)) {
                        $tag_id       =       $row['tag_id'];
                        return $tag_id;
                }
                   if(!$getting_category_id) {  
                die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                    }     

}












?>
<?php session_start();?>
<?php /*$reputation = $_SESSION['reputation'];*/ ?>
<?php /*$db_id = $_SESSION['user_id'];*/ ?>
 


<?php

function insert_tags(){
//GLOBAL CONNECTION
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
    
    $task_id = $the_task_id;
    $userID = $_SESSION['user_id'];
                   
   /* $the_task_id = $_GET['t_id'];*/

     
    $query = "UPDATE tasks SET status_id = '2' WHERE task_id ={$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
   
                        
   $query = "INSERT INTO claimed_tasks (task_id, student_id, claimed_date) VALUES ({$task_id}, {$userID}, now())";
    
   $update_claimed_tasks_query = mysqli_query($connection, $query);
      //Refresh after action
                            
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));
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




function insertingIntoTaskItermediateTable($tag_id,$task_id) {
    
    global $connection;
     $query = "INSERT INTO task_intermediate_tag (tag_id, task_id) VALUES  ('{$tag_id}','{$task_id}') ";
                                        $insert_doc_query = mysqli_query($connection, $query);
    
                                        if(!$insert_doc_query) {
                                         die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                            }       
    
    
} 

function geetingTagId($word) {
    
    global $connection;
    
     $query  =   "SELECT tag_id
                                                    FROM tags
                                                    WHERE tag = '{$word}' ";

                                                    $getting_tag_id = mysqli_query($connection, $query);
                                                    
                                                    
                                                        $tag_id  = 0;
                                                       
                                                        while($row = mysqli_fetch_assoc($getting_tag_id)) {
                                                            
                                                        $tag_id       =       $row['tag_id'];
                                                        }
                                                        
                                                        return $tag_id;
                                                        
                                                            if(!$getting_tag_id) {  
                                                        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                                        }
    
    
}
    

/*Tells register user if user naem already taken*/
function username_exists($username) {
    
    global $connection;
    
    $query = "SELECT user_name FROM users WHERE user_name = '{$username}' ";
    $result = mysqli_query ($connection, $query);
    if(!$result) {  die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                                        }
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
    }
    
    
}



function email_exists($email) {
    
    global $connection;
    
    $query = "SELECT email FROM users WHERE email = '{$email}' ";
    $result = mysqli_query ($connection, $query);
    if(!$result) {  die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                                                        }
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
    }
    
    
}


function register_user($username, $firstname, $lastname, $email,$password,$studentId,$major) {


 global $connection;

   

    
               /* Getting Majour ID */

                $query =    "SELECT tag_id
                            FROM tags
                            WHERE tag = '{$major}' ";

                $getting_category_id = mysqli_query($connection, $query);

                if(!$getting_category_id) {  
                    die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                }

                while($row = mysqli_fetch_assoc($getting_category_id)) {
                  echo $category_id       =       $row['tag_id'];
                    
                    


                    /*clean it before going into DB*/
                    /*1st par connection, 2nd data you want to clean*/

                    $username          = mysqli_real_escape_string($connection, $username);
                    $firstname         = mysqli_real_escape_string($connection, $firstname);
                    $lastname          = mysqli_real_escape_string($connection, $lastname);
                    $email             = mysqli_real_escape_string($connection, $email);
                    $password          = mysqli_real_escape_string($connection, $password);
                    $studentId         = mysqli_real_escape_string($connection, $studentId);
                    $major             = mysqli_real_escape_string($connection, $category_id);
                    
                    /*Hasformat (bloowfish)*/
                    /*$hashFormat = "$2y$10$";
                    $salt       = "iusesomecrazystrings22";
                    
                    $hash_and_salt =  $hashFormat . $salt;*/
                    
                    /*Encryption password*/
                    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
                    
                    
                        
                    $query = "INSERT INTO users (user_name, first_name, last_name, student_id, email, reputation, password) VALUES ('{$username}','{$firstname}','{$lastname}','{$studentId}','{$email}','0','{$password}' ) ";
                    $register_user_query = mysqli_query($connection, $query);
                    
                    if(!$register_user_query) {  
                        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                    }

                        /*$message = "Your Registration worked";*/
                    
                    $student_id = mysqli_insert_id($connection);
                    $query = "INSERT INTO click_history (tag_id, user_id, total) VALUES ('{$category_id}','{$student_id}','1' ) ";
                    $register_user_query = mysqli_query($connection, $query);
                    
                    if(!$register_user_query) {  
                        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                    }
                
                
                
                
                
                
                }
                
            
                


}



function login_user($username, $password) {
    
     global $connection;
    
        
   $username = trim($username);
   $password = trim($password);

       
    //Stoping SQL injection (connection, what it is cleaing)
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
           
    //Now can put into database
    
    $query = "SELECT * FROM users WHERE user_name ='{$username}' ";
    $select_user_querry = mysqli_query($connection, $query);
    if(!$select_user_querry) {
        
        die("Query Failed". mysqli_error($connection));
        
    }
    
    //Looping through result
    while($row = mysqli_fetch_array($select_user_querry)) {
        
        /*Need this info for validation and sessions elsewhere */
        $db_id              = $row['user_id'];
        $db_user_name       = $row['user_name'];
        $db_first_name      = $row['first_name'];
        $db_last_name       = $row['last_name'];
        $db_user_email      = $row['email'];
        $db_user_password   = $row['password'];
        $reputation         = $row['reputation'];
        
        
   
    }
    
    /*Taking password coming in and comparing it with DB password*/
    if(password_verify($password, $db_user_password)) {
        
         /*If can log in set sessions and redirtect them to adm pages*/
        
        /*We assign username from DB with a session called username*/
        /*Can get value from anywhere*/
        /*So once we get to admin we have all this information (as long as its turned on)*/
        $_SESSION['user_id']     = $db_id;
        $_SESSION['username']   = $db_user_name;
        $_SESSION['firstname']  = $db_first_name;
        $_SESSION['lastname']   = $db_last_name;
        $_SESSION['password']   = $db_user_password;
        $_SESSION['email']      = $db_user_email;
        $_SESSION['reputation'] =  $reputation;
       
           /*If password and emailmatch redirect user*/
        header("Location: ../index.php");
        
      
        
       
    } 
    
    else {
        
       /* So if anything happen beside the above we bring them back to index*/
        
        header("Location: ../index.php");
        
    }
        
    
    
    
}



?>
<?php session_start();?>
<?php /*$reputation = $_SESSION['reputation'];*/ ?>
<?php /*$db_id = $_SESSION['user_id'];*/ ?>
 


<!--Sows personliased stream to user-->
<?php
function user_posts() {
global $connection;    
    
            $username = $_SESSION['username'];
            $db_id  = $_SESSION['user_id'];

            $query = "SELECT DISTINCT* 
                    FROM tasks 
                    JOIN task_intermediate_tag 
                    ON tasks.task_id = task_intermediate_tag.task_id 
                    JOIN tags ON task_intermediate_tag.tag_id = tags.tag_id 
                    JOIN click_history 
                    ON tags.tag_id = click_history.tag_id 
                    JOIN users 
                    ON click_history.user_id = users.user_id 
                    WHERE tasks.creator_id <> '{$db_id}' 
                    AND tasks.status_id = '1'
                    AND tasks.expiration_date > now()
                    and click_history.user_id = '{$db_id}'
                    GROUP BY tasks.task_id 
                    ORDER BY tasks.expiration_date DESC, total desc LIMIT 4 ";

            $personalised_displayed_tasks = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($personalised_displayed_tasks)) {
                    $task_id                =       $row['task_id']; 
                    $task_title             =       $row['task_title'];
                    $creator_id             =       $row['creator_id'];
                    $category_id            =       $row['category_id'];
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $expiration_date        =       $row['expiration_date'];
                    ?>
            <h2> 
                <a  href="post.php?p_id=<?php echo $task_id; ?>"><?php echo $task_title; ?> </a>
            </h2>
            <p class="lead">
            <!--Getting user who created the task-->
            <?php
            $query = "SELECT users.user_name
                    FROM tasks 
                    INNER JOIN users
                    ON tasks.creator_id = users.user_id
                    WHERE tasks.task_id = {$task_id} ";
            $select_all_task = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_task)) {
                    $creator                =       $row['user_name'];
                    ?>
            by <?php echo htmlspecialchars($creator); ?>
            <?php } ?>
            <hr>
            <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
            <hr>
            <p><span class="glyphicon glyphicon-time"></span> Created: <?php echo htmlspecialchars($created_date); ?></p>
            <p><span class="glyphicon glyphicon-time"></span> Claim deadline:<?php echo htmlspecialchars($expiration_date); ?> </p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo htmlspecialchars($task_id); ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
<!--turning on PHP again for closing loop -->
    <?php }
}
?>



<!--Displays task relevent to id passed into it on Post page-->
<?Php
function view_a_task($the_task_id) {
    global $connection;       
    if(isset($_SESSION['user_id'])) {

                



    $query =   "SELECT * 
            FROM tasks 
            INNER JOIN users
            ON tasks.creator_id = users.user_id
            WHERE tasks.task_id = {$the_task_id} ";
            $select_all_task = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_task)) {
                    $task_id                =       $row['task_id'];    
                    $task_title             =       $row['task_title'];
                    $file_id                =       $row['file_id'];
                    $task_desc              =       $row['task_description'];
                    $creator                =       $row['user_name'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $claim_deadline         =       $row['created_date'];
                    $submission_deadline    =       $row['expiration_date'];
                    ?>
                    <!--If user clicks claim button--> 
                    <?php 
                    if(isset($_POST['claim_task'])) { 
                        /*Users score is Updated +10*/
                        updateReputation(10);    
                        /*Task is upadted to claimed and populates claimed table*/
                        claimTask($task_id);
                        /*User directed to there claimed task page*/
                        header('Location:./admin/tasks.php?source=view');
                    }
                    ?>
                    <?php
                    /*If moderator deletes task delete task function is called with user directed back to home page and task deleted */
                    if(isset($_POST['delete_task'])) {
                        deleteTask($the_task_id);
                        header('Location:index.php');     
                    }
                    ?>
            <h1><?php echo $task_title ?></h1>
            <p class = "lead">by <?php echo $creator ?>
            <p></p>
            <hr>
            <div class="container">
                <span><span class="glyphicon glyphicon-time"></span> claim by <?php echo htmlspecialchars($claim_deadline); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo htmlspecialchars($word_count); ?> words</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo htmlspecialchars($page_count); ?> pages</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <hr>
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
            <hr>
            <p class="lead">Description</p>
            <p><?php echo $task_desc ?></p>
            <!--Getting teh sample of document-->
            <?php 
            $query =   "SELECT *
                        FROM document
                        WHERE document_id = {$file_id} ";
                        $doc_loc = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($doc_loc)) { 
                                $docu_loc     =       $row['document_loc'];
                        }
                        ?>
            <a href="./samples_docs/<?php echo htmlspecialchars($docu_loc); ?>" download="sample">Download pdf Sample</a>
            <hr>
            <form action="" method="post" role="form">
                <div class="clearfix">
                    <button type="submit" name="claim_task" class ="btn btn-primary">Claim Task </button>
                </div>
            </form>   
            <hr>
            <!--turning on PHP again for closing loop -->
        <?php }

    }
    }

?>

<!--Shows all open task the logged in user created -->
<?php
function openTasks(){
    global $connection; 
    $userID = $_SESSION['user_id'];
                $query = "SELECT * FROM tasks WHERE creator_id = '{$userID}' and status_id = '1' ";
                $select_task= mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_task)) {
                    $the_task_id            =       $row['task_id'];
                    $creator_id             =       $row['creator_id'];
                    $task_title             =       $row['task_title'];
                    $category_id            =       $row['category_id'];
                    $file_id                =       $row['file_id']; 
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $expiration_date        =       $row['expiration_date'];
                    $status_id              =       $row['status_id'];

                    ?>
                    
              
                         <div class="col-md-3 text-center">
                            <div class="panel panel-primary panel-pricing">
                                <div class="panel-heading">
                                    <i class="fa fa-desktop"></i>
                                    <h3>Open Tasks</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong><?php echo $task_title ?></strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item">Created On : <?php echo $created_date ?></li>
                                    <li class="list-group-item">Expires On : <?php echo $expiration_date ?></li>
                                    <li class="list-group-item">Word Count <?php echo $word_count ?></li>
                                </ul>
                             
                                    <div class="panel-footer">
                                        <a class="btn btn-lg btn-block btn-primary" a href="tasks.php?source=edit_task&p_id=<?php echo $the_task_id ?>">Edit Task</a>
                                        <a class="btn btn-lg btn-block btn-primary" a href="tasks.php?delete=<?php echo $the_task_id ?>">Delete Task</a>
                                    </div>
                           
                            </div>
                </div>
                <!-- /item -->

                  
                        
                   <!--      echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";-->
                        
                    
              
                    
        <?php } 
    
    
}
?>




<!--Shows all task created bu user that have been claimed and are waiting approval-->
<?php

function awaiting_approval (){
    global $connection; 
    if(isset($_SESSION['user_id'])) {

                $userID = $_SESSION['user_id'];
                $query =    "SELECT * FROM tasks
                            RIGHT JOIN claimed_tasks
                            ON tasks.task_id = claimed_tasks.task_id
                            INNER JOIN users
                            ON claimed_tasks.student_id = users.user_id
                            WHERE tasks.creator_id = '{$userID}' and tasks.status_id = '2';
                            ";
                
                $select_task= mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_task)) {
                    $the_task_id            =       $row['task_id'];
                    $student_id             =       $row['student_id'];
                    $task_title             =       $row['task_title'];
                    $category_id            =       $row['category_id'];
                    $file_id                =       $row['file_id']; 
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $reputation             =       $row['reputation'];
                    $claimed_date            =          $row['claimed_date'];
                    $claimed_expiration     =        $row['claimed_expiration'];
                    $status_id              =       $row['status_id'];
                    $user_name              =       $row['user_name'];
                    $first_name              =       $row['first_name'];
                    $last_name              =       $row['last_name'];
                    
                    $email              =       $row['email'];
                    ?>
                    
              
                         <div class="col-md-3 text-center">
                            <div class="panel panel-warning panel-pricing">
                                <div class="panel-heading">
                                    <i class="fa fa-desktop"></i>
                                    <h3> Tasks Awaiting Approval </h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong><?php echo $task_title ?></strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"> Claimed Date : <?php echo $claimed_date ?></li>
                                    <li class="list-group-item"> Claimers Name : <?php echo $user_name ?></li>
                                    <li class="list-group-item">Claimers Reputation: <?php echo $reputation ?></li>
                                </ul>
                             
                                    <div class="panel-footer">
                                        
                                        
                                       
                                        
                                        
                                            <a class="btn btn-lg btn-block btn-warning" a href="tasks.php?accept=<?php echo $the_task_id ?>">ACCEPT OFFER</a>
                                           <a class="btn btn-lg btn-block btn-warning" a href="tasks.php?decline=<?php echo $the_task_id ?>">DECLINE OFFER</a>
                                    </div>
                           
                            </div>
                </div>
                <!-- /item -->

                  
                        
                   <!--      echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";-->
                        
                    
              
                    
        <?php } 


}
    
    
    
    
    
    

    
    
    
}
?>




<!--Shows all task created bu user that are being worked on -->
<?php

function inProgress(){
  global $connection; 
     if(isset($_SESSION['user_id'])) {

                $userID = $_SESSION['user_id'];
                $query =    "SELECT * FROM tasks
                            RIGHT JOIN claimed_tasks
                            ON tasks.task_id = claimed_tasks.task_id
                            INNER JOIN users
                            ON claimed_tasks.student_id = users.user_id
                            WHERE tasks.creator_id = '{$userID}' and tasks.status_id = '3';
                            ";
                
                $select_task= mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_task)) {
                    $the_task_id            =       $row['task_id'];
                    $student_id             =       $row['student_id'];
                    $task_title             =       $row['task_title'];
                    $category_id            =       $row['category_id'];
                    $file_id                =       $row['file_id']; 
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $full_file_request      =       $row['full_file_request'];    
                    $claimed_date            =          $row['claimed_date'];
                    $claimed_expiration     =        $row['claimed_expiration'];
                    $status_id              =       $row['status_id'];
                    $user_name              =       $row['user_name'];
                    $first_name              =       $row['first_name'];
                    $last_name              =       $row['last_name'];
                    
                    $email              =       $row['email'];
                    
                    ?>
                    
              
                         <div class="col-md-3 text-center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <i class="fa fa-desktop"></i>
                                    <h3>Tasks In Progesses </h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong><?php echo $task_title ?></strong></p>
                                </div>
                                <ul class="list-group text-center">
                                   
                                    <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> Finished By: <?php echo $claimed_expiration ?></li>
                                    <li class="list-group-item"> Claimers Name : <?php echo $user_name ?></li>
                                    <li class="list-group-item">Claimers Email : <?php echo $email ?></li>
                                    
                                    <?php if (!empty($full_file_request)) { ?>
                        
                                    <li class="list-group-item">Message : <?php echo $full_file_request ?></li>
                        
                        
                    <?php } ?>
                                    
                                    
                                    
                                </ul>
                             
                                    <div class="panel-footer">
                                       
                                       
                                       
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>"><span>glyphicon glyphicon-heart-empty</span>Happy With Work</a>
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?not_happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>">Not Happy With Work</a>
                                    </div>
                           
                            </div>
                </div>
                <!-- /item -->

                  
                        
                   <!--      echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";-->
                        
                    
              
                    
        <?php } 


}



}


?>





<?php



function expired_tasks(){
  global $connection; 

if(isset($_SESSION['user_id'])) {

                $userID = $_SESSION['user_id'];
                $query = "SELECT * FROM tasks WHERE creator_id = '{$userID}' and status_id = '4' ";
                $select_task= mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_task)) {
                    $the_task_id            =       $row['task_id'];
                    $creator_id             =       $row['creator_id'];
                    $task_title             =       $row['task_title'];
                    $category_id            =       $row['category_id'];
                    $file_id                =       $row['file_id']; 
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $expiration_date        =       $row['expiration_date'];
                    $status_id              =       $row['status_id'];

                    ?>
                    
              
                         <div class="col-md-3 text-center">
                            <div class="panel panel-danger panel-pricing">
                                <div class="panel-heading">
                                    <i class="fa fa-desktop"></i>
                                    <h3>Expired Tasks </h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong><?php echo $task_title ?></strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item">Created On <?php echo $created_date ?></li>
                                    <li class="list-group-item">Expired On : <?php echo $expiration_date ?></li>
                                    <li class="list-group-item">Word Count <?php echo $word_count ?></li>
                                </ul>
                             
                                    <div class="panel-footer">
                                       
                                        
                                        
                                        <a class="btn btn-lg btn-block btn-danger" a href="tasks.php?relist=<?php echo $the_task_id ?>">RELIST TASK</a>
                                        <a class="btn btn-lg btn-block btn-danger" a href="tasks.php?delete=<?php echo $the_task_id ?>">DELET TASK</a>
                                    </div>
                           
                            </div>
                </div>
                <!-- /item -->

                  
                        
                   <!--      echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";-->
                        
                    
              
                    
        <?php } 

}












}




?>



































<?php
/*Accepts offer ie it changed the task statue from 2 to 3 (pending to in progress*/
function accept_offer(){
     global $connection;
    $the_task_id_for_accept = $_GET['accept'];
                        $query = "UPDATE tasks SET status_id = '3' WHERE task_id = {$the_task_id_for_accept} ";
                        $decline_query = mysqli_query($connection, $query);
                        header("location: tasks.php"); 
                            if(!$decline_query){
                               die ('Query failed' . mysqli_error($connection));
                             }

}








/*Displays all Categories From Database and displaying them as links*/
function list_all_categories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_tags_sidebar = mysqli_query($connection, $query); 
    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
        $category_id = $row['category_id'];
        $category = $row['category'];

        echo "<li><a href='task_tags.php?tag=$category'>{$category}</a></li>";
        }  

    
}


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



/*Makes a task "claimed" by changing the task status to 2 and inserting the task calimers details in the claimed tabele */
function claimTask($the_task_id){
    global $connection;
    $task_id      =   $the_task_id;
    $userID       =   $_SESSION['user_id'];
    $query        =   "UPDATE tasks SET status_id = '2' WHERE task_id ={$the_task_id} ";
    $update_query =   mysqli_query($connection, $query);
    $query        =   "INSERT INTO claimed_tasks (task_id, student_id, claimed_date) VALUES ({$task_id}, {$userID}, now())";
    $update_claimed_tasks_query = mysqli_query($connection, $query);
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));
    } 
 
    
}


/*Delets the task that has the task id passed in associated with it*/
function deleteTask($the_task_id){
    global $connection;
    if(isset($_POST['delete_task'])) {
        $the_new_task_id    =   $_GET['p_id'];
        $query              =   "DELETE FROM tasks WHERE task_id = {$the_task_id} ";
        $delete_query       =   mysqli_query($connection, $query);
        if(!$delete_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }
}


/*If a users Flags a task the task will poplulate the flagged task table with task details and users who flagged the task (if Post_ flagged_task variable set*/
function flagtask($the_task_id, $db_id){
    global $connection;
    if(isset($_POST['flagg_task'])) {
        $username           =   $_SESSION['username'];
        $flag_comment       =   strip_tags(trim($_POST['comment_content']));
        $flag_comment       =   mysqli_real_escape_string($connection, $flag_comment);
        
        $query = "INSERT INTO flagged_task (task_id, user_id, flag_comment, flag_date, flag_status)";
        $query.= "VALUES ({$the_task_id} ,'{$db_id}', '{$flag_comment}', now(), 'unapproved') ";
        $create_comment_query = mysqli_query($connection,$query);
        if(!$create_comment_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    } 
}


/*Allows a users to withddraw a claimed offer. Function changes task status to 1 ie open and delets it from the claimed task table if withdraw GET variable is set*/
function withdrawOffer(){
    global $connection;
    if(isset($_GET['withdraw'])) {
        $the_task_id_for_withdraw = $_GET['withdraw'];
        $query              = "UPDATE tasks SET status_id = '1' WHERE task_id = {$the_task_id_for_withdraw} ";
        $decline_query      = mysqli_query($connection, $query);
        header("location:./tasks.php?source=view");
        if(!$decline_query){
            die ('Query failed' . mysqli_error($connection));
            $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_withdraw} ";
            $delete_query = mysqli_query($connection, $query);
            if(!$delete_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
       }
    }
}


/*Updates users reputation by the amount passed in */
function updateReputation($value) {
    global $connection;
    $db_id = $_SESSION['user_id'];
    $query = "UPDATE users SET reputation = reputation + {$value} WHERE user_id   = {$db_id} ";
    $create_comment_query = mysqli_query($connection,$query);
    if(!$create_comment_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
}

/*Gets TagId of string passed in */
function tagId($tag){
    global $connection;
    $query  =   "SELECT tag_id
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

/*Inserts tag id and task id of tags that belong to a tasks*/
function insertingIntoTaskItermediateTable($tag_id,$task_id) {
    global $connection;
    $query = "INSERT INTO task_intermediate_tag (tag_id, task_id) VALUES  ('{$tag_id}','{$task_id}') ";
    $insert_doc_query = mysqli_query($connection, $query);
    if(!$insert_doc_query) {
        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }       
} 

/*Gets the tag_id asscocited with a string within the Tags tables*/
function geetingTagId($word) {
    global $connection;
    $query  =  "SELECT tag_id
                FROM tags
                WHERE tag = '{$word}' ";

    $getting_tag_id =   mysqli_query($connection, $query);
    $tag_id         =   0;
    while($row = mysqli_fetch_assoc($getting_tag_id)) {
        $tag_id       =       $row['tag_id'];
    }
    return $tag_id;
    if(!$getting_tag_id) {  
        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
}
 
/*Checks if user trying to register username is already registered within the DB*/
function username_exists($username) {
    global $connection;
    $query  = "SELECT user_name FROM users WHERE user_name = '{$username}' ";
    $result = mysqli_query ($connection, $query);
    if(!$result) {
        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}


/*Checks if users email trying to register is already registered within the DB*/
function email_exists($email) {
    global $connection;
    $query  = "SELECT email FROM users WHERE email = '{$email}' ";
    $result = mysqli_query ($connection, $query);
    if(!$result) {
        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

/*Registers a users and cleans all the data coming in from registration form */
function register_user($username, $firstname, $lastname, $email,$password,$studentId,$major) {
    global $connection;
    /* Getting Majour ID */
    $query =    "SELECT tag_id
                FROM tags
                WHERE tag = '{$major}' ";
    $getting_category_id    = mysqli_query($connection, $query);
    if(!$getting_category_id) {  
        die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
    while($row              = mysqli_fetch_assoc($getting_category_id)) {
        echo $category_id       =       $row['tag_id'];
        /*clean it before going into DB*/
        /*1st par connection, 2nd data you want to clean*/

        $username          =    mysqli_real_escape_string($connection, $username);
        $firstname         =    mysqli_real_escape_string($connection, $firstname);
        $lastname          =    mysqli_real_escape_string($connection, $lastname);
        $email             =    mysqli_real_escape_string($connection, $email);
        $password          =    mysqli_real_escape_string($connection, $password);
        $studentId         =    mysqli_real_escape_string($connection, $studentId);
        $major             =    mysqli_real_escape_string($connection, $category_id);
        /*Encryption password to power of 12*/

        $password   = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
        $query      = "INSERT INTO users (user_name, first_name, last_name, student_id, email, reputation, password) VALUES ('{$username}','{$firstname}','{$lastname}','{$studentId}','{$email}','0','{$password}' ) ";

        $register_user_query = mysqli_query($connection, $query);
            if(!$register_user_query) {  
                die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
            }
            $student_id          = mysqli_insert_id($connection);
            $query               = "INSERT INTO click_history (tag_id, user_id, total) VALUES ('{$category_id}','{$student_id}','1' ) ";
            $register_user_query = mysqli_query($connection, $query);

            if(!$register_user_query) {  
            die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }
    }
}


/*Logs in user and validates all data coming in*/
function login_user($username, $password) {
    global $connection;
    $username = trim($username);
    $password = trim($password);
    //Stoping SQL injection (connection, what it is cleaing)
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    //Now can put into database
    $query    = "SELECT * FROM users WHERE user_name ='{$username}' ";
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
        $_SESSION['user_id']    = $db_id;
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
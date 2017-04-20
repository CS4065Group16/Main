<?php 
if(!isset($_SESSION['username'])) {
    
    
    header("Location: ../index.php");
}
?>
<br/><br/><br/>
<!-- OPEN TASKS -->
<!--Shows all open task the logged in user created -->
<?php
openTasks();
/*AWAITING APPROVAL
Shows all task created bu user that have been claimed and are waiting approval*/
awaiting_approval();
/*IN PROGRESS 
Shows all task created bu user that are being worked on*/
inProgress();
/*EXPIRED TASKS*/
expired_tasks();
?>         

   <!--Finished task (left in too show how all teh methdos worrk above)-->   
<?php

   if(isset($_SESSION['user_id'])) {

                $userID = $_SESSION['user_id'];
                $query =    "SELECT * FROM tasks
                            RIGHT JOIN claimed_tasks
                            ON tasks.task_id = claimed_tasks.task_id
                            INNER JOIN users
                            ON claimed_tasks.student_id = users.user_id
                            WHERE tasks.creator_id = '{$userID}' and tasks.status_id = '5';
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
                    $message            =       $row['completion_review'];
                    $email              =       $row['email'];
                    
                    ?>
                    <div class="col-md-3 text-center">
                        <div class="panel panel-default panel-pricing">
                            <div class="panel-heading">
                                <i class="fa fa-desktop"></i>
                                <h3>Finished Tasks </h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong><?php echo $task_title ?></strong></p>
                            </div>
                            <ul class="list-group text-center">
                                <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> Finished By: <?php echo htmlspecialchars($claimed_expiration) ?></li>
                                <li class="list-group-item"> Claimers Name : <?php echo htmlspecialchars($user_name) ?></li>
                                <li class="list-group-item">Claimers Email : <?php echo htmlspecialchars($email) ?></li>
                                 <?php if (!empty($message)) { ?>
                                <li class="list-group-item">Message : <?php echo htmlspecialchars($message) ?></li>
                                <?php } ?>
                            </ul>
                                <div class="panel-footer">
                                    <a class="btn btn-lg btn-block btn-default" a href="tasks.php?happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>">Happy With Work&nbsp;<span class ="glyphicon glyphicon-heart-empty"></span></a>
                                    <a class="btn btn-lg btn-block btn-default" a href="tasks.php?not_happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>">Not Happy With Work</a>
                                </div>
                        </div>
                    </div>
    <?php } 
}

?>
<!--Accepts offer ie it changed the task statue from 2 to 3 (pending to in progress)-->
<?php  
if(isset($_GET['accept'])) {
    accept_offer();
}
?>   
<!--Delete a Tasks of a user-->
<?php
if(isset ($_GET['delete'])) {
    delete_task();
}
?>
<!--Declines an offer from a claimer. Updates task status to open agian ie "1" and removes task from claimed table-->
   <?php           
if(isset($_GET['decline'])) {
        decline_task();
}
?>   
<!--  Positive Feedback. Give the claimer a 5+ in repuattion score and upgrades tehtask from in progress to closed ie 4 to 5 status-->
<?php  
if(isset($_GET['happy'])) {
    $the_task_id_for_happy = mysqli_real_escape_string($connection, $_GET['happy']);
    $value = 5;
    plus_claimers_rep($value, $the_task_id_for_happy);
    happy_with_work();
}
?>                        
<!--NOT HAPPY WITH WORK!-->                     
<!--negative Feedback. Give the claimer a _5 in repuattion score for there work and upgrades the task from in progress to closed ie 4 to 5 status-->
<?php  
if(isset($_GET['not_happy'])) {
    $the_task_id_for_not_happy = mysqli_real_escape_string($connection, $_GET['not_happy']);
    $value = 5;
    minus_claimers_rep($value, $the_task_id_for_not_happy);
    not_happy_with_work();
    }
?>                        
<?php           
if(isset($_GET['relist'])) {
    relist_task ();
    }
?> 
                                   
                                              
                                                                     
                                                                                            
                                                                                                                                          


 


                        
                        
                        
             
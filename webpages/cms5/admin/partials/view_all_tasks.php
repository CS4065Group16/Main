
   
   
   
   
       
    <link rel="stylesheet" href="table.css">
    
    <br/><br/><br/>
    
    <!-- Plans -->
    


                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
              
    
     
      
       
   <!-- OPEN TASKS -->
   

 
  
   
                                       <?php                               
                if(isset($_SESSION['user_id'])) {

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


     
   <!-- AWAITING APP -->
   

 
  
   
                                       <?php                               
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
?>
 
     
<!-- In progess -->
   

 
  
   
                                       <?php                               
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
                                </ul>
                             
                                    <div class="panel-footer">
                                       
                                       
                                       
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>">Happy With Work</a>
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?not_happy=<?php echo $the_task_id ?>&id=<?php echo $student_id ?>">Not Happy With Work</a>
                                    </div>
                           
                            </div>
                </div>
                <!-- /item -->

                  
                        
                   <!--      echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";-->
                        
                    
              
                    
        <?php } 


}
?>
             
      
         
   
   <!-- Expired Tasks -->
   

 
  
   
                                       <?php                               
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
?>         
           
            
             
                            
   
      </div>
        </div>
               
 
   
   
   
   
   
   
   
   
   
   
   
   
   
                        
                        
                        
                        
                        
                        
                        
                      <?php  
                        

                        if(isset($_GET['accept'])) {

                        $the_task_id_for_accept = $_GET['accept'];
                        $query = "UPDATE tasks SET status_id = '3' WHERE task_id = {$the_task_id_for_accept} ";
                        $decline_query = mysqli_query($connection, $query);
                        header("location: tasks.php"); 
                            if(!$decline_query){
                               die ('Query failed' . mysqli_error($connection));
                             }

}

?>   
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php
                        if(isset($_GET['delete'])) {
                            
                           $the_post_id = $_GET['delete'];
                            
                            $query = "DELETE FROM tasks WHERE task_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            //Refresh after action
                           
                            header("location: tasks.php");    
                            /*header("Refresh:0");*/
                        
                        }
                            ?>
                            
                                     <?php           
                                         
                                         
                                  if(isset($_GET['decline'])) {
                            
                            $the_task_id_for_decline = $_GET['decline'];
                            
                            $query = "UPDATE tasks SET status_id = '1' WHERE task_id = {$the_task_id_for_decline} ";
                            
                                      
                                      
                                      $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                      
                                      
                                $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_decline} ";
                                $delte_claimed_task= mysqli_query($connection, $query);
                                header("location: tasks.php");  
                                      
                                  }
?>   

                                              
                       
                       <?php  
                        if(isset($_GET['happy'])) {
                            
                        $the_task_id_for_accept = $_GET['happy'];
                        $student_id = $_GET['id'];
                            
                            
                        $query = "UPDATE tasks SET status_id = '5' WHERE task_id = {$the_task_id_for_accept} ";
                        $update_statues_finished = mysqli_query($connection, $query);
                          
                            if(! $update_statues_finished ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                        $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_accept} ";
                        $delte_claimed_task= mysqli_query($connection, $query);
                        
                        /*header("location: tasks.php"); */
                            if(! $delte_claimed_task ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                        $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_accept} ";
                        $delte_claimed_task= mysqli_query($connection, $query);
                        
                        /*header("location: tasks.php"); */
                            if(! $delte_claimed_task ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                         
                            $value = 5;
                            $query = "UPDATE users SET reputation = reputation + {$value} WHERE user_id   = {$student_id} ";

                            $create_comment_query = mysqli_query($connection,$query);

                            if(!$create_comment_query) {

                                die('QUERY FAILED' . mysqli_error($connection));
                            }
                        
                        
                         header("location: tasks.php");  
                        
                        
                        }

?>                        
                                              
                         <!--NOT HAPPY WITH WORK!-->                     

                       <?php  
                        if(isset($_GET['not_happy'])) {
                            
                        $the_task_id_for_accept = $_GET['not_happy'];
                        $student_id = $_GET['id'];
                            
                            
                        $query = "UPDATE tasks SET status_id = '5' WHERE task_id = {$the_task_id_for_accept} ";
                        $update_statues_finished = mysqli_query($connection, $query);
                          
                            if(! $update_statues_finished ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                        $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_accept} ";
                        $delte_claimed_task= mysqli_query($connection, $query);
                        
                        /*header("location: tasks.php"); */
                            if(! $delte_claimed_task ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                        $query = "DELETE FROM claimed_tasks WHERE task_id = {$the_task_id_for_accept} ";
                        $delte_claimed_task= mysqli_query($connection, $query);
                        
                        /*header("location: tasks.php"); */
                            if(! $delte_claimed_task ){
                               die ('Query failed' . mysqli_error($connection));
                             }

                         
                            $value = -5;
                            $query = "UPDATE users SET reputation = reputation + {$value} WHERE user_id   = {$student_id} ";

                            $create_comment_query = mysqli_query($connection,$query);

                            if(!$create_comment_query) {

                                die('QUERY FAILED' . mysqli_error($connection));
                            }
                        
                         header("location: tasks.php");  
                        
                        
                        
                        }

?>                        
                           
                                              
                                              <?php           
                                         if(isset($_GET['relist'])) {
                            
                            $the_task_id_for_decline = $_GET['relist'];
                            
                            $query = "UPDATE tasks SET status_id = '1' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            header("location: tasks.php"); 

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }




                               ?> 
                                   
                                              
                                                                     
                                                                                            
                                                                                                                                          


 
<

                        
                        
                        
             
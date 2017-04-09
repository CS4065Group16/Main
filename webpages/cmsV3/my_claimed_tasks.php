 <link rel="stylesheet" href="table.css">
    
    <br/><br/><br/>



<html>

   

                               
                               <?php
                                
                                if(isset($_SESSION['user_id'])) {
        
                                $userID = $_SESSION['user_id'];

                               $query ="SELECT * FROM tasks 
                                        INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                                        WHERE student_id = '{$userID}' and status_id ='2'
                                        ORDER BY claimed_tasks.claimed_expiration DESC; ";

                                  
                                   
                                    
                                /*$query = "SELECT * FROM tasks WHERE claim_id = '{$userID}' and status_id = '2' ";
                                  
    
                                $query = "SELECT * FROM tasks WHERE claim_id = '{$userID}' and status_id = '2' ";*/
                                $select_task = mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                       
                                        $task_title             =       $row['task_title'];
                                        $category_id             =       $row['category_id'];
                                        $file_id                =       $row['file_id'];
                                        $task_description       =       $row['task_description'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $created_date           =  $row['created_date'];
                                        $expiration_date        =  $row['expiration_date'];
                                        $claimed_date         =       $row['claimed_date'];
                                        $claimed_expiration   =       $row['claimed_expiration'];
                                        
                                        
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
                                    <li class="list-group-item"> Submission Deadline : <?php echo $claimed_expiration ?></li>
                                    <li class="list-group-item">Word Count: <?php echo $word_count ?></li>
                                </ul>
                             
                                    <div class="panel-footer">
                                        
                                        <!--   echo "<td><a href ='tasks.php?source=view&withdraw={$task_id}'>Withdraw offer</a></td>";
                                             echo "<td><a href ='tasks.php?source=request&p_id={$task_id}'>Full File Request</a></td>";
                                            echo "<td><a href ='tasks.php?source=feedback&p_id={$task_id}'>Finished/Leave review</a></td>";
                                       -->
                                     
                                        
                                            <a class="btn btn-lg btn-block btn-warning" a href="tasks.php?source=view&withdraw=<?php echo $task_id ?>">WITHDRAW OFFER</a>
                                          
                                    </div>
                           
                            </div>
                        </div>
                                     
                                     
                                     
         <?php }
                                    
   }
 ?>                            
                                     
                                     
                                     
                                     
                                     
                                     



 <?php
                        if(isset($_GET['withdraw'])){ 
                                withdrawOffer();
                                header("location:./tasks.php?source=view");
                        }

                    
                            
                            ?>
                            
                            

                            
                                                        
                                                                                    
                                                                                                                
  <?php
                                
                                if(isset($_SESSION['user_id'])) {
        
                                
                                $userID = $_SESSION['user_id'];

                               $query ="SELECT * FROM tasks 
                                        INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                                        WHERE student_id = '{$userID}' and status_id ='3'
                                         ORDER BY claimed_tasks.claimed_expiration DESC; ";

                                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                /*$query = "SELECT * FROM tasks WHERE claim_id = '{$userID}' and status_id = '2' ";
                                  
    
                                $query = "SELECT * FROM tasks WHERE claim_id = '{$userID}' and status_id = '2' ";*/
                                $select_task = mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                       
                                        $task_title             =       $row['task_title'];
                                        $category_id             =       $row['category_id'];
                                        $file_id                =       $row['file_id'];
                                        $task_description       =       $row['task_description'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $created_date           =  $row['created_date'];
                                        $expiration_date        =  $row['expiration_date'];
                                        $claimed_date         =       $row['claimed_date'];
                                        $claimed_expiration   =       $row['claimed_expiration'];
                                        
                                        ?>
                                        
                                        <div class="col-md-3 text-center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <i class="fa fa-desktop"></i>
                                    <h3> Tasks you are working on </h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong><?php echo $task_title ?></strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"> Submission Deadline : <?php echo $claimed_expiration ?></li>
                                    
                                    
                                    
                                </ul>
                             
                                    <div class="panel-footer">
                                        
                                        
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?source=view&withdraw=<?php echo $task_id ?>">Withdraw offer</a>
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?source=request&p_id=<?php echo $task_id ?>">Full File Request</a>
                                        <a class="btn btn-lg btn-block btn-success" a href="tasks.php?source=feedback&p_id=<?php echo $task_id ?>">Finished leave Feedback</a>
                                          
                                    </div>
                           
                            </div>
                        </div>
                                     
                                     
                                     
         <?php }
                                    
   }
 ?>                                                                                                                                                                       
                                                                                                                                                                        
     

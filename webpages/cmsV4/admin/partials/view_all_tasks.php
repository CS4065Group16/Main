 
<h4>Open Tasks</h4>            
                           
                           
                           
                           
                          
                           
                           <table class = " table table-hover table-hover ">
                            <thead>
                                <tr>
                                    
                                    <th>Task Title</th>
                                    <th>Task Type</th>
                                    <!--<th>Task Desc</th>-->
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <th>Word Count</th>
                                    <th>File Format</th>
                                    <th>Claim Dadline</th>
                                    <th>Submission Deadline</th>
                                    
                                    <th>Task Tags</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                
                                  if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                              

                                  
                                  
                                  
    
                                $query = "SELECT * FROM task WHERE creator_id = '{$userID}' and task_statues = 1 ";
                                  
                                  
                               /* $query = "SELECT * FROM task" ;*/
                                $select_task= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                        $claim_id               =       $row['claim_id'];
                                        $task_title             =       $row['task_title'];
                                        $task_type              =       $row['task_type'];
                                        $task_desc              =       $row['task_desc'];
                                        $task_subject           =       $row['task_subject'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $file_format            =       $row['file_format'];
                                        $claim_deadline         =       $row['claim_deadline'];
                                        $submission_deadline    =       $row['submission_deadline'];
                                        $flagged_status         =       $row['flagged_status'];
                                        $task_tags              =       $row['task_tags'];
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                            
                                            
                                            echo "<td>{$task_title}</td>";
                                            echo "<td>{$task_type}</td>"; 
                                            /*echo "<td>{$task_desc}</td>";*/
                                            echo "<td>{$task_subject}</td>"; 
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            echo "<td>{$file_format}</td>";
                                            echo "<td>{$claim_deadline}</td>"; 
                                            echo "<td>{$submission_deadline}</td>";
                                            
                                            echo "<td>{$task_tags}</td>";
                                            /*Dividing parameters with p_id*/    
                                            echo "<td><a href ='tasks.php?source=edit_task&p_id={$task_id}'>Edit</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?delete={$task_id}'>Delete Task</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                  }
                                ?>
                                   
                        
                        </tbody>
                        </table>
                        
                        
                        <?php

                        if(isset($_GET['delete'])) {
                            
                           $the_post_id = $_GET['delete'];
                            
                            $query = "DELETE FROM task WHERE task_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            //Refresh after action
                            header("location: tasks.php");
                            
                            /*header("Refresh:0");*/
                        }
                            
                            ?>


 
<h4>Tasks waiting approval by you</h4>

<table class = "table table-hover table-hover">
                            <thead>
                                 <tr>
                                    
                                    <th>Task Title</th>
                                    <th>Task Type</th>
                                    <!--<th>Task Desc</th>-->
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <th>Word Count</th>
                                    <th>File Format</th>
                                    <th>Claim Dadline</th>
                                    <th>Submission Deadline</th>
                                    
                                    <th>Task Tags</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                
                                  if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                              

                                  
                                  
                                  
    
                                $query = "SELECT * FROM task WHERE creator_id = '{$userID}' AND task_statues ='2' ";
                                  
                                  
                               /* $query = "SELECT * FROM task" ;*/
                                $select_task= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                        $claim_id               =       $row['claim_id'];
                                        $task_title             =       $row['task_title'];
                                        $task_type              =       $row['task_type'];
                                        $task_desc              =       $row['task_desc'];
                                        $task_subject           =       $row['task_subject'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $file_format            =       $row['file_format'];
                                        $claim_deadline         =       $row['claim_deadline'];
                                        $submission_deadline    =       $row['submission_deadline'];
                                        $flagged_status         =       $row['flagged_status'];
                                        $task_tags              =       $row['task_tags'];
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                               
                                               echo "<td>{$task_title}</td>";
                                            echo "<td>{$task_type}</td>"; 
                                            /*echo "<td>{$task_desc}</td>";*/
                                            echo "<td>{$task_subject}</td>"; 
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            echo "<td>{$file_format}</td>";
                                            echo "<td>{$claim_deadline}</td>"; 
                                            echo "<td>{$submission_deadline}</td>";
                                            
                                            echo "<td>{$task_tags}</td>";
                                            /*Dividing parameters with p_id*/    
                                            echo "<td><a href ='tasks.php?accept={$task_id}'>Accept</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?decline={$task_id}'>Decline</a></td>";
                                           
                                            
                

                           
                                     
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                  }
                                ?>
                                   
                        
                        </tbody>
                        </table>
                        
                                         
                                         
                                         
                              <?php           
                                         
                                         
                                  if(isset($_GET['decline'])) {
                            
                            $the_task_id_for_decline = $_GET['decline'];
                            
                            $query = "UPDATE task SET task_statues = '1' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }


                               if(isset($_GET['accept'])) {
                            
                            echo $the_task_id_for_decline = $_GET['accept'];
                            
                            $query = "UPDATE task SET task_statues = '3' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }






                               ?>      
                              
                                                           
                                                                       
                                                                                   
                                                                                                           
                                                            



<h4>Approved tasks waiting completion</h4>


<table class = "table table-hover table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Task Title</th>
                                    <th>Task Type</th>
                                    <!--<th>Task Desc</th>-->
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <th>Word Count</th>
                                    <th>File Format</th>
                                    <th>Claim Dadline</th>
                                    <th>Submission Deadline</th>
                                    
                                    <th>Task Tags</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                
                                  if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                              
                                      
                                      
                                  $query = "SELECT * FROM task WHERE creator_id = '{$userID}' AND task_statues ='3' ";
                                      
                                        
                                      
                                  
                                  
                                  
    
                              /*  $query = "SELECT * FROM user WHERE creator_id = '{$userID}' AND task_statues ='3' ";*/
                                  
                                  
                               /* $query = "SELECT * FROM task" ;*/
                                    $select_task= mysqli_query($connection, $query);
                        
                                
                                        while($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id                =       $row['task_id'];
                                        $creator_id             =       $row['creator_id'];
                                        $claim_id               =       $row['claim_id'];
                                        $task_title             =       $row['task_title'];
                                        $task_type              =       $row['task_type'];
                                        $task_desc              =       $row['task_desc'];
                                        $task_subject           =       $row['task_subject'];
                                        $page_count             =       $row['page_count'];
                                        $word_count             =       $row['word_count'];
                                        $file_format            =       $row['file_format'];
                                        $claim_deadline         =       $row['claim_deadline'];
                                        $submission_deadline    =       $row['submission_deadline'];
                                        $flagged_status         =       $row['flagged_status'];
                                        $task_tags              =       $row['task_tags'];
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                            
                                              echo "<td>{$task_title}</td>";
                                            echo "<td>{$task_type}</td>"; 
                                            /*echo "<td>{$task_desc}</td>";*/
                                            echo "<td>{$task_subject}</td>"; 
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            echo "<td>{$file_format}</td>";
                                            echo "<td>{$claim_deadline}</td>"; 
                                            echo "<td>{$submission_deadline}</td>";
                                            
                                            echo "<td>{$task_tags}</td>";
                                            /*Dividing parameters with p_id*/    
                                            echo "<td><a href ='tasks.php?delete={$task_id}'>Positive Feedback</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?delete={$task_id}'>Poor Feedback</a></td>";
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                  }
                                ?>
                                   
                                   
                                    <?php           
                                         
                                         
                                  if(isset($_GET['positive'])) {
                            
                            $the_task_id_for_decline = $_GET['positive'];
                            
                            $query = "UPDATE task SET task_statues = '4' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }


                               if(isset($_GET['negative'])) {
                            
                            $the_task_id_for_decline = $_GET['negative'];
                            
                            $query = "UPDATE task SET task_statues = '3' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }






                               ?> 
                                   
                                   
                        
                        </tbody>
                        </table>                                    
                       
                       
                        
                        
                        
                      
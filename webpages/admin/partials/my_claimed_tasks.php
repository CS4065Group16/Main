
   
   <html>
<h4>Tasks you accepted that are waiting approval by author</h4>    
<table class = "table table-hover table-hover">
                            <thead>
                                <tr>
                                    <th>Task Title</th>
                                    <!--<th>Task Type</th>-->
                                    <!--<th>Task Desc</th>-->
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <!--<th>Word Count</th>
                                    <th>File Format</th>-->
                                    <th>Claimed Dadline</th>
                                    <th>Submission Deadline</th>
                                   <!-- <th>Task Tags</th>-->
                                    <th>Change Mind</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                               $query ="SELECT * FROM tasks 
                                        INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                                        WHERE student_id = '{$userID}' and status_id ='2'; ";

                                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
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
                                        
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                               
                                            echo "<td>{$task_title}</td>";
                                            /*echo "<td>{$task_type}</td>";*/ 
                                            /*echo "<td>{$task_desc}</td>";*/
                                            /*echo "<td>{$category_id}</td>"; */
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            /*echo "<td>{$file_format}</td>";*/
                                            echo "<td>{$claimed_date}</td>"; 
                                            echo "<td>{$claimed_expiration}</td>";
                                            
                                            /*echo "<td>{$task_tags}</td>";*/
                                            /*Dividing parameters with p_id*/        
                                           
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?source=view&withdraw={$task_id}'>Withdraw offer</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                      
                       


                        
</html>


 <?php
                        if(isset($_GET['withdraw'])){ 
                                withdrawOffer();
                                header("location:./tasks.php?source=view");
                        }

                    
                            
                            ?>

<html>
<h4>Task you claimed (in progress) </h4>    
<table class = "table table-hover table-hover">
                            <thead>
                                <tr>
                                    <th>Task Title</th>
                                    <!--<th>Task Type</th>-->
                                    <!--<th>Task Desc</th>-->
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <!--<th>Word Count</th>
                                    <th>File Format</th>-->
                                    <th>Claimed Dadline</th>
                                    <th>Submission Deadline</th>
                                   <!-- <th>Task Tags</th>-->
                                    <th>Change Mind</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                               $query ="SELECT * FROM tasks 
                                        INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                                        WHERE student_id = '{$userID}' and status_id ='3'; ";

                                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
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
                                        
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                               
                                            echo "<td>{$task_title}</td>";
                                            /*echo "<td>{$task_type}</td>";*/ 
                                            /*echo "<td>{$task_desc}</td>";*/
                                            /*echo "<td>{$category_id}</td>"; */
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            /*echo "<td>{$file_format}</td>";*/
                                            echo "<td>{$claimed_date}</td>"; 
                                            echo "<td>{$claimed_expiration}</td>";
                                            
                                            /*echo "<td>{$task_tags}</td>";*/
                                            /*Dividing parameters with p_id*/        
                                           
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?source=view&withdraw={$task_id}'>Withdraw offer</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                         
                        
                        
                        


                        
</html>
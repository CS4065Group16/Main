  <?php
                                
                          
  if(isset($_GET['t_id'])) {
      
    $userID = $_SESSION['userID'];
                   
    $the_task_id = $_GET['t_id'];

      
      
    $query = "UPDATE task SET task_statues = '2' WHERE task_id ={$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
      //Refresh after action
                            
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));

                                                      //once done refersh page
      
      
      
  }
  }
  
      if(isset($_GET['t_id'])) {
      
    $userID = $_SESSION['userID'];
                   
    $the_task_id = $_GET['t_id'];

      
      
    $query = "UPDATE task SET claim_id = '{$userID}' WHERE task_id = {$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
          //Refresh after action
                            
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));

                                                      //once done refersh page
      
      
      
  }
    
      
      
      
      
      
      
      
      
  }
      
      

?>








   
   
   <html>
<h4>Tasks you accepted that are waiting approval by author</h4>    
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
                                    <th>Change Mind</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                               /* $query ="SELECT * FROM user WHERE user_name = '{$username}' ";*/

                                  
                                  
                                  
    
                                $query = "SELECT * FROM task WHERE claim_id = '{$userID}' and task_statues = '2' ";
                                $select_task = mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_task)) {
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
                                           
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?source=view&withdraw={$task_id}'>Withdraw offer</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                      
                       


                        
</html>




<html>
<h4>Task you claimed (in progress) </h4>    
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
                                    <th>Change Mind</th>
                                </tr>
                            </thead>
                              <tbody>
                              <tbody>
                               <?php
                                
                                if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                               /* $query ="SELECT * FROM user WHERE user_name = '{$username}' ";*/

                                  
                                  
                                  
    
                                $query = "SELECT * FROM task WHERE claim_id = '{$userID}' and task_statues = '3' ";
                                $select_task = mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_task)) {
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
                                           
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?source=view&withdraw={$task_id}'>Withdraw offer</a></td>";
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                          <?php

                           if(isset($_GET['withdraw'])) {
                            
                            $the_task_id_for_decline = $_GET['withdraw'];
                            
                            $query = "UPDATE task SET task_statues = '1' WHERE task_id = {$the_task_id_for_decline} ";
                            $decline_query = mysqli_query($connection, $query);
                            
                               header("location:./tasks.php?source=view");

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }


                    
                            
                            ?>
                        
                        
                        


                        
</html>
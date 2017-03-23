  <?php
                                
                          
  if(isset($_GET['t_id'])) {
      
    $userID = $_SESSION['userID'];
                   
    $the_task_id = $_GET['t_id'];

      
      
    $query = "UPDATE task SET task_statues = '1' WHERE task_id ={$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));

                                                      //once done refersh page
      
      
      
  }
  }
  
      if(isset($_GET['t_id'])) {
      
    $userID = $_SESSION['userID'];
                   
    $the_task_id = $_GET['t_id'];

      
      
    $query = "UPDATE task SET claim_id = '{$userID}' WHERE task_id = {$the_task_id} ";
                                    
      
    $update_query = mysqli_query($connection, $query);
                                      
    if(!$update_query) {die ('Query failed' . mysqli_error($connection));

                                                      //once done refersh page
      
      
      
  }
    
      
      
      
      
      
      
      
      
  }
      
      

?>








   
   
   <html>
    
<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Task Id</th>
                                    <th>Creator Id</th>
                                    <th>Claim Id</th>
                                    <th>Task Title</th>
                                    <th>Task Type</th>
                                    <th>Task Desc</th>
                                    <th>Task Subject</th>
                                    <th>Page Count</th>
                                    <th>Word Count</th>
                                    <th>File Format</th>
                                    <th>Claim Dadline</th>
                                    <th>Submission Deadline</th>
                                    <th>Flagged Status</th>
                                    <th>Task Tags</th>
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                               /* $query ="SELECT * FROM user WHERE user_name = '{$username}' ";*/

                                  
                                  
                                  
    
                                $query = "SELECT * FROM task WHERE claim_id = '{$userID}' ";
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
                                            echo "<td>{$task_id}</td>";
                                            echo "<td>{$creator_id}</td>";
                                            echo "<td>{$claim_id}</td>";    
                                            echo "<td>{$task_title}</td>";
                                            echo "<td>{$task_type}</td>"; 
                                            echo "<td>{$task_desc}</td>";
                                            echo "<td>{$task_subject}</td>"; 
                                            echo "<td>{$page_count}</td>";
                                            echo "<td>{$word_count}</td>";     
                                            echo "<td>{$file_format}</td>";
                                            echo "<td>{$claim_deadline}</td>"; 
                                            echo "<td>{$submission_deadline}</td>";
                                            echo "<td>{$flagged_status}</td>";
                                            echo "<td>{$task_tags}</td>";
                                            /*Dividing parameters with p_id*/        
                                             echo "<td><a href ='tasks.php?source=edit_task&p_id={$task_id}'>Edit</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?delete={$task_id}'>Delete</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                        
                        
                        <?php

                        /*if(isset($_GET['delete']))
                            
                           $the_post_id = $_GET['delete'];
                            
                            $query = "DELETE FROM task WHERE task_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            */
                                
                            
                            ?>


                        
</html>
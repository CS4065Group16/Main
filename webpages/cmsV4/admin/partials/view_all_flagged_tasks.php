 
<h4>Flagged Tasks</h4>            
                           
                           
                           
                           
                           
                           
                           <table class = "table table-hover table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Task Flagged</th>
                                    <th>By User</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                  
                                    
                                   
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                
                                  if(isset($_SESSION['userID'])) {
        
                                $userID = $_SESSION['userID'];

                              

                                  
                                  
                                  
    
                                $query = "SELECT * FROM flagged_comments ";
                                  
                                  
                               /* $query = "SELECT * FROM task" ;*/
                                $select_task= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task)) {
                                        $comment_id              =       $row['comment_id'];
                                        $comment_task_id         =       $row['comment_task_id'];
                                        $comment_user_name       =       $row['comment_user_name'];
                                        $comment_content         =       $row['comment_content'];
                                        $comment_status          =       $row['comment_status'];
                                        $comment_date            =       $row['comment_date'];
                                        
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                            
                                            echo "<tr>";
                                     
                                            
                                            $query = "SELECT * FROM task WHERE task_id = $comment_task_id ";
                                            $select_task_id_query = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($select_task_id_query)){
                                                $task_id = $row['task_id'];
                                                $task_tittle = $row['task_title'];
                                                echo"<td><a href='../post.php?p_id=$task_id'>$task_tittle</a></td>";
                                                
                                            }     
                                     

                                            echo "<td>{$comment_user_name}</td>"; 
                                            echo "<td>{$comment_content}</td>";
                                            echo "<td>{$comment_date}</td>"; 
                                     
                                            echo "<td><a href ='tasks.php?source=edit_task&p_id={$comment_id}'>Approve</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?delete={$comment_id}'>Unapprove</a></td>";
                                            
                                            
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
                           
                            
                           
                        }
                            
                            ?>


 

                      
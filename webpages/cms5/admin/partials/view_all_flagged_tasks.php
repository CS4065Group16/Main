 

                          
                          
                          
                          
                          
                          
                          
                          
                          <h4>Flagged Tasks</h4>            
                           
                           
                           
                           
                           
                           
                           <table class = "table table-hover table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Task Flagged</th>
                                    <th>Flagged By User</th>
                                    <th>Flag Date</th>
                                    <th>Reason</th>
                                    <th>User who created task</th>
                                    <th>Relist Task</th>
                                    <th>Delete Task</th>
                                    <th>Ban User and Delete Task</th>
                                  
                                    
                                   
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
                                
                                  if(isset($_SESSION['user_id'])) {
        
                                $userID = $_SESSION['user_id'];

    
                                $query =    "SELECT *
                                            FROM tasks
                                            JOIN flagged_task
                                            ON tasks.task_id = flagged_task.task_id
                                            JOIN users
                                            ON flagged_task.user_id = users.user_id ";

                                  
                               /* $query = "SELECT * FROM task" ;*/
                                $select_task= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_task)) {
                                        $task_id         =       $row['task_id'];
                                        
                                        $flag_user       =       $row['user_name'];
                                        $flag_date       =       $row['flag_date'];
                                        $flag_comment    =       $row['flag_comment'];  
                                        $task_title      =       $row['task_title'];
                                
                                     
                                     
                                     
                                     
                                     
                                     $query = "SELECT users.user_name, users.user_id
                                                FROM tasks
                                                INNER JOIN users
                                                on tasks.creator_id = users.user_id
                                                WHERE task_id = '{$task_id}' " ;
                                
                                $getting_user_name = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($getting_user_name)){
                                                $user_name = $row['user_name'];
                                                $user_id = $row['user_id'];
                                               
                                                
                                            echo"<td><a href='../post.php?p_id=$task_id'>$task_title</a></td>";
                                            echo "<td>{$flag_user}</td>"; 
                                            echo "<td>{$flag_date}</td>";
                                            echo "<td>{$flag_comment}</td>";
                                            echo "<td>{$user_name}</td>";
                                     
                                            echo "<td><a href ='flagged_tasks.php?relist={$task_id}'>Relist Task</a></td>";
                                            echo "<td><a href ='flagged_tasks.php?delete={$task_id}'>Delete Task</a></td>";
                                            echo "<td><a href ='flagged_tasks.php?ban={$task_id}&user={$user_id}'>Ban User and Delete Task</a></td>";
                                            
                                           echo "</tr>";
                                            
                                       
    
                                 }
                                    
                                  }
                                  }
                                ?>
                                   
                        
                        </tbody>
                        </table>
                        
                        <?php 
                        if(isset($_GET['delete'])) {
                            $delete_task_id = $_GET['delete'];
                        
   
    
    
                            
                            $query = "DELETE FROM tasks WHERE task_id = {$delete_task_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            
                            if(!$delete_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                   
                        }
    ?>
                        
                        
                        
                        
                        <?php 
                            if(isset($_GET['relist'])) {
                            
                            $the_post_id = $_GET['relist'];
                            
                            $query = "DELETE FROM flagged_task WHERE task_id = {$the_post_id} ";
                            $remove_from_flagged_table = mysqli_query($connection, $query);
                       
                        }
                            
                            ?>

 
                      <?php 
                        if(isset($_GET['ban'])){
                            $delete_task_id = $_GET['ban'];
                            $user_id = $_GET['user'];
                      
                            
                            $query = "INSERT into banned_users (user_id) VALUES ('{$user_id}') ";
                            $delete_query = mysqli_query($connection, $query);
                            
                            $query = "DELETE FROM tasks WHERE task_id = {$delete_task_id} ";
                            $delete_query = mysqli_query($connection, $query);
                           
                            
                            
                        }



                        ?>
                      
                      

                      
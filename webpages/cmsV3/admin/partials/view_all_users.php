 <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User email</th>
                                    <th>User Subject</th>
                                    <th>User Rep</th>
                                    <th>Mod Promotion</th>
                                    <th>User Tags</th>
                                    <th>Password</th>
                                    
                                </tr>
                            </thead>
                              <tbody>
                               <?php
                                
    
                                $query = "SELECT * FROM user" ;
                                $select_users = mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_users)) {
                                        $user_id                =       $row['user_id'];
                                        $first_name             =       $row['first_name'];
                                        $last_name              =       $row['last_name'];
                                        $user_email             =       $row['user_email'];
                                        $user_subject           =       $row['user_subject'];
                                        $user_rep               =       $row['user_rep'];
                                        $promote_to_mod          =       $row['promote_to_mod'];
                                        $user_tags              =       $row['user_tags'];
                                        $password               =       $row['password'];
                                       
                                        
                                        //Need to echo all above in a one row each time we have a task
                                     
                                        echo "<tr>";
                                            echo "<td>{$user_id}</td>";
                                            echo "<td>{$first_name}</td>";
                                            echo "<td>{$last_name}</td>";    
                                            echo "<td>{$user_email}</td>";
                                            echo "<td>{$user_subject}</td>"; 
                                            echo "<td>{$user_rep}</td>";
                                            echo "<td>{$promote_to_mod}</td>"; 
                                            echo "<td>{$user_tags}</td>";
                                            echo "<td>{$password}</td>";     
                                            
                                            /*Dividing parameters with p_id*/        
                                             echo "<td><a href ='tasks.php?source=edit_task&p_id={$user_id}'>Edit</a></td>";
                                            /*Delete has to send the task id with it*/     
                                            echo "<td><a href ='tasks.php?delete={$user_id}'>Delete</a></td>";
                                           
                                            
                                        echo "</tr>";
    
                                 }
                                    
    
                                ?>
                                   
                        
                        </tbody>
                        </table>
                        
                        
                        <?php

                        if(isset($_GET['delete']))
                            
                           $the_post_id = $_GET['delete'];
                            
                            $query = "DELETE FROM task WHERE task_id = {$the_post_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            
                                
                            
                            ?>


                        
                        
                        
                        
                      

   
   
   <h4>Tasks Created By You</h4>
    <table class = " table table-hover table-hover ">
        <thead>
            <tr>
            <th>Task Title</th>
            <th>Task Desc</th>
            <th>Page Count</th>
            <th>Word Count</th>
            <th>Creatd Date</th>
            <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>                            
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

              
                        
                    echo "<tr>";
                    echo "<td>{$task_title}</td>";
                    echo "<td>{$task_desc}</td>";
                    echo "<td>{$page_count}</td>";
                    echo "<td>{$word_count}</td>";     
                    echo "<td>{$created_date}</td>"; 
                    echo "<td>{$expiration_date}</td>";
                    echo "<td><a href ='tasks.php?source=edit_task&p_id={$the_task_id}'>Edit</a></td>";
                    echo "<td><a href ='tasks.php?delete={$the_task_id}'>Delete Task</a></td>";
                    echo "</tr>";

               
                    }

            }
        ?>
        </tbody>
    </table>
                        
                        
                        
                        
                                            
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
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
                                   
                                              
                                                                     
                                                                                            
                                                                                                                                          


 
<h4>Tasks waiting approval by you</h4>

<table class = " table table-hover table-hover ">
        <thead>
            <tr>
            <th>Task Title</th>
            <th>Task Desc</th>
            <th>Page Count</th>
            <th>Word Count</th>
            <th>Creatd Date</th>
            <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>                            
        <?php                               
            if(isset($_SESSION['user_id'])) {

                $userID = $_SESSION['user_id'];
                $query = "SELECT * FROM tasks WHERE creator_id = '{$userID}' and status_id = '2' ";
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

                    echo "<tr>";
                    echo "<td>{$task_title}</td>";
                    echo "<td>{$task_desc}</td>";
                    echo "<td>{$page_count}</td>";
                    echo "<td>{$word_count}</td>";     
                    echo "<td>{$created_date}</td>"; 
                    echo "<td>{$expiration_date}</td>";
                    echo "<td><a href ='tasks.php?accept={$the_task_id}'>Accept Offer</a></td>";
                    echo "<td><a href ='tasks.php?decline={$the_task_id}'>Decline Offer</a></td>";
                    echo "</tr>";
                    }

            }
        ?>
        </tbody>
    </table>
     
                                        



<h4>Approved tasks waiting completion</h4>


<table class = " table table-hover table-hover ">
        <thead>
            <tr>
            <th>Task Title</th>
            
            <th>Claimants User Name</th>
            <th>Claimants First Name</th>
            <th>Claimants Last Name</th>
            <th>Claimants Email</th>
            <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>                            
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
                    
                    echo "<tr>";
                    echo "<td>{$task_title}</td>";
                   
                    echo "<td>{$user_name}</td>";
                    
                    echo "<td>{$first_name}</td>";     
                    echo "<td>{$last_name}</td>"; 
                    echo "<td>{$email}</td>";
                    echo "<td>{$claimed_expiration}</td>";
                    /*echo "<td><a href ='tasks.php?happy={$the_task_id}&id={$student_id}'>Happy with work</a></td>";
                    echo "<td><a href ='tasks.php?not_happy={$the_task_id}&id={$student_id}'>Not happy</a></td>";*/
                    echo "</tr>";
                    }

            }
        ?>
        </tbody>
    </table>

   
<h4>Expired Tasks</h4>
    <table class = " table table-hover table-hover ">
        <thead>
            <tr>
            <th>Task Title</th>
            <th>Task Desc</th>
            <th>Page Count</th>
            <th>Word Count</th>
            <th>Creatd Date</th>
            <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>                            
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

                    echo "<tr>";
                    echo "<td>{$task_title}</td>";
                    echo "<td>{$task_desc}</td>";
                    echo "<td>{$page_count}</td>";
                    echo "<td>{$word_count}</td>";     
                    echo "<td>{$created_date}</td>"; 
                    echo "<td>{$expiration_date}</td>";
                    echo "<td><a href ='tasks.php?relist={$the_task_id}'>Relist Task</a></td>";
                    echo "<td><a href ='tasks.php?delete={$the_task_id}'>Delete Task</a></td>";
                    echo "</tr>";
                    }

            }
        ?>
        </tbody>
    </table>
    
   
  
 

























<!--

from my claimed tasks and view all tasks
-->



























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
                                    <th>Full File Request</th>
                                    <th>Change Mind</th>
                                    <th>Finished</th>
                                </tr>
                            </thead>
                              <tbody>
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
                                             echo "<td><a href ='tasks.php?source=request&p_id={$task_id}'>Full File Request</a></td>";
                                            echo "<td><a href ='tasks.php?source=feedback&p_id={$task_id}'>Finished/Leave review</a></td>";
                                            
                                        echo "</tr>";
    
                                 }
                                    
                                }
                                  
                                ?>
                                  
                                   
                        
                        </tbody>
                        </table>
                         
                        
                        
                        


                        
</html>
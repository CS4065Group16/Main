  <?php 

if(!isset($_SESSION['username'])) {
    
    
    header("Location: ../index.php");
    
}


?>
  
  
  
  
  <?php 




    if(isset($_POST['feedback_sent'])) {
                        
                        /*//Coming from URL
                        $new_the_task_id    =   $_GET['p_id'];
                        $db_id = $_SESSION['user_id'];*/
                        $the_task_id        = $_GET['p_id'];
                        $username           =   $_SESSION['username'];
                        $feedback           =   $_POST['feedback'];
                       
                        $query = "UPDATE claimed_tasks SET completion_review = '{$feedback}' WHERE task_id = '{$the_task_id}' ";
                        
                        $feedback_query = mysqli_query($connection,$query);
                        
        
       
                        if(!$feedback_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                        
                        $query = "UPDATE tasks SET status_id = '5' WHERE task_id = {$the_task_id} ";
                         
                        $update_query = mysqli_query($connection,$query);
        
                        header("location:./tasks.php?source=view");
                        
                        
                    }

           ?> 
            
            
            <div class="col-md-8">

            
           
                
                
              
                
                
                
                

                <!-- Flag Task Form -->
                <div class="well">
                    <h4>Give feedback</h4>
                    <form action="" method="post" role="form">
                      <div class="form-group">
                            <textarea name = "feedback"class="form-control" rows="3" placeholder ="briefly describe what you did or any issues you had  "></textarea>
                      </div>
                        <button type="submit" name="feedback_sent" class ="btn btn-primary">Send</button>
                    </form>
                </div>
                <hr>
         </div>
  <?php 




    if(isset($_POST['send'])) {
                        
                        /*//Coming from URL
                        $new_the_task_id    =   $_GET['p_id'];
                        $db_id = $_SESSION['user_id'];*/
                        $the_task_id        = $_GET['p_id'];
                        $username           =   $_SESSION['username'];
                        $request_comment    =   $_POST['comment'];
                       
                        $query = "UPDATE claimed_tasks SET full_file_request = '{$request_comment}' WHERE task_id = '{$the_task_id}' ";
                        
                        $file_request = mysqli_query($connection,$query);
                        header("location:./tasks.php?source=view");
                        if(!$file_request) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                        
                        
                        
                        
                        
                    }

           ?> 
            
            
            <div class="col-md-8">

            
           
                
                
              
                
                
                
                

                <!-- Flag Task Form -->
                <div class="well">
                    <h4>Request full file</h4>
                    <form action="" method="post" role="form">
                      <div class="form-group">
                            <textarea name = "comment"class="form-control" rows="3" placeholder ="Send a message and chat with your new friend "></textarea>
                      </div>
                        <button type="submit" name="send" class ="btn btn-primary">Send</button>
                    </form>
                </div>
                <hr>
         </div>
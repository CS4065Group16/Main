<?php 
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?> 
<?php 
if(isset($_POST['send'])) {
/*//Coming from URL task_id;*/
                        $the_task_id        = mysqli_real_escape_string($connection, $_GET['p_id']);
                        $username           =  $_SESSION['username'];
                        $request_comment    =  mysqli_real_escape_string($connection, $_POST['comment']);
                       
                        $query = "UPDATE claimed_tasks SET full_file_request = '{$request_comment}' WHERE task_id = '{$the_task_id}' ";
                        
                        $file_request = mysqli_query($connection,$query);
                        header("location:./tasks.php?source=view");
                        if(!$file_request) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
}
?> 
<div class="col-md-8">
    <!-- Fequest full file Form -->
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
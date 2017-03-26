
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php session_start();?>



    <!-- Navigation -->
    <?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
                
                
                <div class="col-md-8">
                
                
             
                
                <?php
                    
                    
                     /*<!--Catching the id being sent so we can identify the post in question-->*/
                
                if(isset($_GET['p_id'])) {
                   
                   $the_task_id = $_GET['p_id'];
                    
                  
               
            
                    
                $query = "SELECT * from task WHERE task_id = {$the_task_id} ";
                    
                $select_all_task = mysqli_query($connection, $query);
                        
                while ($row = mysqli_fetch_assoc($select_all_task)) {
                        $task_id                =       $row['task_id'];    
                        $task_title             =       $row['task_title'];
                        $task_type              =       $row['task_type'];
                        $task_desc              =       $row['task_desc'];
                        $task_subject           =       $row['task_subject'];
                        $page_count             =       $row['page_count'];
                        $word_count             =       $row['word_count'];
                        $claim_deadline         =       $row['claim_deadline'];
                        $submission_deadline    =       $row['submission_deadline'];
                   
                    ?>
                    
                     
                       

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $task_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $task_type ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> created on <?php echo $submission_deadline ?></p>
                <p><span class="glyphicon glyphicon-time"></span> claim by <?php echo $claim_deadline ?></p>
                <hr>
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
                <hr>
                
              
                  <h2>Description</h2>
                 
                  <blockquote>
                  <p class="lead"><?php echo $task_desc ?></p>
                  
                    </blockquote>
                <hr>
               <form action="" method="post" role="form">
             
                    
                     <div class="clearfix">
                      <a class="btn btn-primary" href="admin/tasks.php?source=view&t_id=<?php echo $task_id; ?>" name="claim"> Claim Task <span class="glyphicon glyphicon-chevron-right"></span></a>
                     
                     <button type="submit" name="delete_task" class ="btn btn-danger pull-right" href="index.php">Delete task </button>
                      
                       
             <!--          <a class="btn btn-danger pull-right" name="delete_task" href="index.php?p_id=<?php echo $task_id; ?>"> Delete task</a>-->
                        </div>
                    </form>   
                    <hr>
                    
                    
                    
                    
                    
                    
                    <!--<form action="" method="post" role="form">
                       
                       
                       
                        <div class="form-group">
                            <textarea name = "comment_content"class="form-control" rows="3" placeholder ="Reason for flagging task"></textarea>
                        </div>
                     
                       
                     
                     <a class= href="index.php?t_id=>  <span class="glyphicon glyphicon-chevron-right"></span></a>

                    </form>-->
                    
                     
                    
                        
                    <!--turning on PHP again for closing loop -->
                   <?php }?>
                    
                <?php }?>
                    
                    
                     <!-- Blog Comments -->
                     
                     
                     <?php
                    
                    if(isset($_POST['flagg_task'])) {
                        
                        //Coming from URL
                        $new_the_task_id    =   $_GET['p_id'];
                        $username           =   $_SESSION['username'];
                        /*Fisrt we are getting the post data out*/
                        $flag_comment       =   $_POST['comment_content'];
                       
                        $query = "INSERT INTO flagged_comments (comment_task_id, comment_user_name, comment_content, comment_status, comment_date)";
                        $query.= "VALUES ({$new_the_task_id} ,'{$username}', '{$flag_comment}', 'unviewed', now())";
                        
                        $create_comment_query = mysqli_query($connection,$query);
                        
                        if(!$create_comment_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                        
                        
                    }
                    
                    ?>
                     
                     <!--Delete Task-->
                     <?php

                        if(isset($_POST['delete_task'])) {
                            
                           $new_the_task_id    =   $_GET['p_id'];
                            
                            $query = "DELETE FROM task WHERE task_id = {$new_the_task_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            
                            if(!$delete_query) {
                            
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                            
                            
                           
                          
                        }
                            
                            ?>
                     

                <!-- Comments Form -->
                <div class="well">
                     
                    
                    <h4>Flag Task</h4>
                    <form action="" method="post" role="form">
                       
                       
                       
                        <div class="form-group">
                            <textarea name = "comment_content"class="form-control" rows="3" placeholder ="Reason for flagging task"></textarea>
                        </div>
                     
                       <button type="submit" name="flagg_task" class ="btn btn-warning">Submit </button>
                     
                    <!-- <a class= href="index.php?t_id=>  <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                    </form>
                </div>
                
              
                   
                
                
                
                
                
                
                
                <hr>

                <!-- Posted Comments -->
                
                

               
                

              
                
                


            </div>

           
           
           
            <!-- Sidebar Widgets Column -->
            
            <?php include "partials/sideBar.php"; ?>   
                
              

        </div>
        <!-- /.row -->

       <?php include "partials/footer.php"; ?>

        
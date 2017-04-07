
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php include "./admin/functions.php"; ?>


<?php $reputation = $_SESSION['reputation']; ?>
<?php $db_id = $_SESSION['user_id']; ?>
    

   
   
                            
  
   
   
   
   
    <!-- Navigation -->

    <!-- Page Content -->
<div class="container">
    <div class="row">
       <!-- Task Details -->
        <div class="col-md-8">
                
                
             
                
                <?php
                    
                    
                     /*<!--Catching the id being sent so we can identify the post in question-->*/
                
                if(isset($_GET['p_id'])) {
                   
                   $the_task_id = $_GET['p_id'];
                    
                  
         /*      INNER JOIN task_intermediate_tag
                                ON tasks.task_id = task_intermediate_tag.task_id
                                INNER JOIN tags
                                ON task_intermediate_tag.tag_id = tags.tag_id*/
                    
                    
                     $query =   "SELECT * 
                                FROM tasks 
                                INNER JOIN users
                                ON tasks.creator_id = users.user_id
                                WHERE tasks.task_id = {$the_task_id} ";
                    
            
                    
            /*    $query = "SELECT * 
                        FROM tasks 
                        INNER JOIN users
                        ON tasks.creator_id = users.user_id 
                        WHERE task_id = {$the_task_id} ";*/
                    
                $select_all_task = mysqli_query($connection, $query);
                        
                while ($row = mysqli_fetch_assoc($select_all_task)) {
                        $task_id                =       $row['task_id'];    
                        $task_title             =       $row['task_title'];
                        $task_desc              =       $row['task_description'];
                        $creator                =       $row['user_name'];
                        $page_count             =       $row['page_count'];
                        $word_count             =       $row['word_count'];
                        $claim_deadline         =       $row['created_date'];
                        $submission_deadline    =       $row['expiration_date'];
                            
                     
                        
            
            ?>
                    
                     
                     
                     
                     
                     
                     
                     
                      
                    <?php 
                    if(isset($_POST['claim_task'])) { 
                        updateReputation(10);    
                        claimTask($the_task_id);
                            
                            header('Location:./admin/tasks.php?source=view');
                        
                        
                          
                            
                    }
                    ?>
                         
                     <?php
                    if(isset($_POST['delete_task'])) { 
                         deleteTask($the_task_id);
                      header('Location:index.php');     
                    }

                     ?>
                     
                      <?php
                    if(isset($_POST['flagg_task'])) { 
                        updateReputation(2); 
                        flagtask($the_task_id, $db_id);
                        
                       
                        
                         header('Location:index.php'); 
                        
                        
                        
                    }
    
                       
                   

                     ?>
           

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $task_title ?></a>
                <!---->
                </h2>
                <p class="lead">
                    <!--by <a href="index.php"><?php echo $task_type ?></a>-->
                </p>
                <p> created by <?php echo $creator ?></p>
                <p></p>
                <p><span class="glyphicon glyphicon-time"></span> created on <?php echo $submission_deadline ?></p>
                <p><span class="glyphicon glyphicon-time"></span> claim by <?php echo $claim_deadline ?></p>
                 <p><span class="glyphicon glyphicon-time"></span> word count <?php echo $word_count ?></p>
                <p><span class="glyphicon glyphicon-time"></span> page coount <?php echo $page_count ?></p>
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
                     
                     <button type="submit" name="claim_task" class ="btn btn-warning">Claim Task </button>
                     
                        <?php if($reputation >= 40):?>
                            <button type="submit" name="delete_task" class ="btn btn-danger pull-right" href="index.php">Delete task </button>
                        <?php endif; ?>
                     
                     
                        </div>
                    </form>   
                    <hr>
             
                    <!--turning on PHP again for closing loop -->
                   <?php }?>
                    
                <?php }?>
                    
    
                <h4>Task Tags</h4>
                
           <?php
   if(isset($_GET['p_id'])) {
                   
                   $the_task_id = $_GET['p_id'];
   
                            $query =   "SELECT *
                                        FROM tags
                                        INNER JOIN task_intermediate_tag 
                                        ON tags.tag_id = task_intermediate_tag.tag_id
                                        WHERE task_intermediate_tag.task_id = {$the_task_id} ";
            
            
                            $tags = mysqli_query($connection, $query);
                            
       
                                            while ($row = mysqli_fetch_assoc($tags)) { 
                                                 $tag     =       $row['tag'];  
                                                 ?>
                                                 
                                                 
                                                <p class="lead"><?php echo $tag ?></p>
                                                
                                                              
                            
                            
                            <!--turning on PHP again for closing loop -->
                   <?php }?>
                    
                <?php }?>     
                
                
                
                
                
                
                
                
                

                <!-- Flag Task Form -->
                <div class="well">
                    <h4>Flag Task</h4>
                    <form action="" method="post" role="form">
                      <div class="form-group">
                            <textarea name = "comment_content"class="form-control" rows="3" placeholder ="Reason for flagging task"></textarea>
                      </div>
                        <button type="submit" name="flagg_task" class ="btn btn-warning">Submit </button>
                    </form>
                </div>
                <hr>
         </div>

 <!-- Sidebar Widgets Column -->
            
<?php include "partials/sideBar.php"; ?>   
                
              

    </div>
        
</div>
       

       <?php include "partials/footer.php"; ?>

        

<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php include "./admin/functions.php"; ?>
<!--<?php header(); ?>-->
<?php 
if(!isset($_SESSION['username'])) {
    header("Location:registration.php");
}
?>


<?php $reputation = $_SESSION['reputation']; ?>
<?php $db_id = $_SESSION['user_id']; ?>
<!-- Post Content -->
<div class="container">
    <div class="row">
         <div class="col-md-8">
          <!--Catching the id being sent so we can identify the post in question-->
                <?php
                if(isset($_GET['p_id'])) {
                    $the_task_id = $_GET['p_id'];
                    $query =   "SELECT * 
                                FROM tasks 
                                INNER JOIN users
                                ON tasks.creator_id = users.user_id
                                WHERE tasks.task_id = {$the_task_id} ";
                    $select_all_task = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_task)) {
                            $task_id                =       $row['task_id'];    
                            $task_title             =       $row['task_title'];
                            $file_id                =       $row['file_id'];
                            $task_desc              =       $row['task_description'];
                            $creator                =       $row['user_name'];
                            $page_count             =       $row['page_count'];
                            $word_count             =       $row['word_count'];
                            $claim_deadline         =       $row['created_date'];
                            $submission_deadline    =       $row['expiration_date'];
                    ?>
                            <!--If user clicks claim button--> 
                            <?php 
                            if(isset($_POST['claim_task'])) { 
                                /*Users score is Updated +10*/
                                updateReputation(10);    
                                /*Task is upadted to claimed and populates claimed table*/
                                claimTask($task_id);
                                /*User directed to there claimed task page*/
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
           

           
                <h1><?php echo $task_title ?></h1>
                <p class="lead">
                    <!--by <a href="index.php"><?php echo $task_type ?></a>-->
                </p>
                <p class = "lead">by <?php echo $creator ?>
                <p></p>
                <hr>
                
                           
 
                   
                    <div class="container">
                   <span><span class="glyphicon glyphicon-time"></span> claim by <?php echo $claim_deadline ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <span><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $word_count ?> words</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $page_count ?> pages</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
                
                
                 
                <hr>
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
                <hr>
              
                  <p class="lead">Description</p>
                 
                  <!--<blockquote>-->
                  <p><?php echo $task_desc ?></p>
                  
                     <?php 
                         $query =   "SELECT *
                                        FROM document
                                        
                                        WHERE document_id = {$file_id} ";
            
            
                            $doc_loc = mysqli_query($connection, $query);
                            
                                            $docu_loc = '';
                                            while ($row = mysqli_fetch_assoc($doc_loc)) { 
                                                $docu_loc     =       $row['document_loc'];
                                                
                         
                                            }
                         
                         ?>
                   
                   
                   
                   <a href="./samples_docs/<?php echo $docu_loc ?>" download="sample">Download pdf Sample</a>
                    <!--</blockquote>-->
                <hr>
                   <form action="" method="post" role="form">
             
                    
                     <div class="clearfix">
                        
                       
                        
                        
                        
                                         
                        
                     <button type="submit" name="claim_task" class ="btn btn-primary">Claim Task </button>
                      
                     
                        
                     
                     
                        </div>
                    </form>   
                    <hr>
             
                    <!--turning on PHP again for closing loop -->
                   <?php }?>
                    
                <?php }?>
                    
    
                
               
                
                 
                  
                   
                    
           
                
                
                
                
                
                
                
                
                

                <!-- Flag Task Form -->
                <div class="well">
                    <h4>Flag Task:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <textarea name = "comment_content"class="form-control" rows="3" placeholder ="Reason for flagging task"></textarea>
                        </div>
                        <button type="submit" name="flagg_task" class ="btn btn-default">Submit </button>
                    <?php if($reputation >= 40):?>
                        <button type="submit" name="delete_task" class ="btn btn-danger pull-right" href="index.php">Delete task&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
                        <?php endif; ?>
                    
                    </form>
                </div>
                <hr>
         
         
         
         
         
         
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
                                                $tag_id    =       $row['tag_id'];
                                                 
                                  
                                                
                                                echo "<a href='task_tags.php?tag=$tag'>{$tag}</a>";
                                                
                                 $query =   "SELECT *  
                                            FROM click_history";
                                            $clicks = mysqli_query($connection, $query);
                                                
                                                while ($row = mysqli_fetch_assoc($clicks)) { 
                                                $click_user_id     =       $row['user_id'];
                                                $click_tag_id      =       $row['tag_id'];  
                                            
                                                    
                                            if($click_user_id == $db_id) {
                                           
                                            $query = "UPDATE click_history SET total = total + 1 WHERE user_id   = {$db_id} and tag_id = {$click_tag_id} ";

                                            $udpate_click_history = mysqli_query($connection,$query);        
                                                }
                                        
                                            else {
                                                
                                                $query = "INSERT INTO click_history (tag_id, user_id, total) VALUES ({$db_id},$tag_id, '1')";
                                                $upadte_clicks = mysqli_query($connection, $query);
                                             }                
                                                    
                                             }
                                                
                                                
                 
            ?>
                                                 
                                            
                                                
                                              
                                        <span class="glyphicon glyphicon-tag">  <?php echo $tag ?> </span>
                                                
                                                              
                                                                                                                      
                            
                            
                
                            
                            
                            
                            
                            
                            
                            <!--turning on PHP again for closing loop -->
 <?php }?>
                    
            <?php }?> 
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         </div>

 <!-- Sidebar Widgets Column -->
            
<?php include "partials/sideBar.php"; ?>   
                
              

    </div>
        
</div>
       

       <?php include "partials/footer.php"; ?>

        
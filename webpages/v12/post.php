
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php include "./dashboard/functions.php"; ?>
<!--<?php header(); ?>-->
<?php 
if(!isset($_SESSION['username'])) {
    header("Location:registration.php");
}
?>
<?php $reputation = $_SESSION['reputation']; ?>
<?php $db_id = $_SESSION['user_id']; ?>

<?php
if(isset($_POST['flagg_task'])) { 

}

?>




<!-- Post Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!--Catching the id being sent so we can identify the post in question-->
            <?php
            if(isset($_GET['p_id'])) {
                $the_task_id = $_GET['p_id'];
                
                /*Shows task with id associated with it*/
                view_a_task($the_task_id);
            }?>
            <!--If user flags task flag task and update reputation functions are called-->
            <?php
            if(isset($_POST['flagg_task'])) { 
                updateReputation(2); 
                flagtask($the_task_id, $db_id);
                header('Location:index.php'); 
            }
            ?>
            <!-- Flag Task Form -->
            <div class="well">
                <h4>Flag Task:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <textarea name = "comment_content"class="form-control" rows="3" placeholder ="Reason for flagging task"></textarea>
                    </div>
                    <button type="submit" name="flagg_task" class ="btn btn-default">Submit </button>
                    <!--Showing Delete button if users is a mod (has rep score >40)-->
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
                                                 
                                                echo "<span class= 'glyphicon glyphicon-tag'></span>&nbsp;<a href='task_tags.php?tag=$tag'>{$tag}</a>";
                                                
                                            
                                                
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
                                                 
                                            
                                                
                                        
                                                
                                                              
                                                                                                                      
                            
                            
                
                            
                            
                            
                            
                            
                            
                            <!--turning on PHP again for closing loop -->
 <?php }?>
                    
            <?php }?> 
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         </div>

 <!-- Sidebar Widgets Column -->
            
<?php include "partials/sideBar.php"; ?>   
                
              

    </div>
        
</div>
       

       <?php include "partials/footer.php"; ?>

        
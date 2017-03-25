
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>



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
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $claim_deadline ?> </p>
               
             
                     <a class="btn btn-primary" href="admin/tasks.php?source=view&t_id=<?php echo $task_id; ?>" name="claim"> Claim Task <span class="glyphicon glyphicon-chevron-right"></span></a>
                     
                      
                    <hr>
                    
                    
                    
                     
                    
                        
                    <!--turning on PHP again for closing loop -->
                   <?php }?>
                    
                <?php }?>
                    
                    
                     <!-- Blog Comments -->
                     
                     
                     <?php
                    
                    if(isset($_POST['flagg_task'])) {
                        
                        //Coming from URL
                        $the_task_id = $_GET['p_id'];
                        
                        
                        /*Fisrt we are getting the post data out*/
                        $POST['comment_content']
                        
                        
                        
                    }
                    
                    ?>
                     
                     
                     
                     

                <!-- Comments Form -->
                <div class="well">
                    <h4>Reason for Flagging Task</h4>
                    <form action="" method="post" role="form">
                       
                       
                       
                        <div class="form-group">
                            <textarea name = "comment_content"class="form-control" rows="3"></textarea>
                        </div>
                     
                        <button type="submit" name="flagg_task" class ="btn btn-warning"> Flag Task </button>
                     
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

        
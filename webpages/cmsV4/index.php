
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
  <!-- Navigation -->
    <?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
<?php ob_start(); ?>
<?php session_start();?>

<?php 

if(!isset($_SESSION['username'])) {
    
    
    header("Location:registration.php");
    
}

?>

<?php
 if(isset($_GET['t_id'])){
                                    
    $the_task_id = $_GET['t_id'];
     
   
      
                            $query = "UPDATE task SET flagged_status = '1' WHERE task_id = {$the_task_id} ";
                            $decline_query = mysqli_query($connection, $query);
                            

                            if(!$decline_query){
                                die ('Query failed' . mysqli_error($connection));
                                                }
                                      
                                  }
        
        
        
    
    ?>
    
    
    
    
    

  
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
                
                
                <div class="col-md-8">
                <h1 class="page-header">
                    Open Tasks
                    <small>that might interest you <?php echo $_SESSION['username']?></small>
                </h1>
                
              <?php
                    
                    $username = $_SESSION['username'];
                    
                $query = "SELECT * FROM user join task on user_tags = task_tags WHERE user_name = '{$username}' ";
                 
                    $select_all_ptags = mysqli_query($connection, $query);
                        
                while($row = mysqli_fetch_assoc($select_all_ptags)) {
                        $task_id             =          $row['task_id'];
                        
                        
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
                    <!--When comone click link we eare sending a paramter that matches teh id-->
                   <!-- <a href="post.php?p_id=<?php echo $task_title; ?>">-->  <?php echo $task_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $task_title ?></a>
                </p>
                
                <hr>
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Created: <?php echo $submission_deadline ?></p>
                <p><span class="glyphicon glyphicon-time"></span> Claim deadline:<?php echo $claim_deadline ?> </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $task_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                     
                     
                     
                        
                    <!--turning on PHP again for closing loop -->
                   <?php }?>
                     

                    
                
                

              
                
                


            </div>

           
           
           
            <!-- Sidebar Widgets Column -->
            
            <?php include "partials/sideBar.php"; ?>   
                
              

        </div>
        <!-- /.row -->

       <?php include "partials/footer.php"; ?>

        
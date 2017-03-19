
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>

<?php ob_start(); ?>
<?php session_start();?>

<?php 

if(!isset($_SESSION['username'])) {
    
    
    header("Location:registration.php");
    
}

?>
    
    
    
    
    
    
    
    
    
    
    

    <!-- Navigation -->
    <?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
                
                
                <div class="col-md-8">
                
                <?php
                $query = "SELECT * from task";
                $select_all_task = mysqli_query($connection, $query);
                        
                while($row = mysqli_fetch_assoc($select_all_task)) {
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
                    
                     
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <!--When comone click link we eare sending a paramter that matches teh id-->
                    <a href="post.php?p_id=<?php echo $task_id; ?>">  <?php echo $task_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $task_type ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> created on <?php echo $submission_deadline ?></p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $claim_deadline ?> </p>
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

        
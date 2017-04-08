
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
  <!-- Navigation -->
    <?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
<?php ob_start(); ?>
<?php session_start();?>
<?php $_SESSION['refresh_count'] = 0;?>
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
                    $db_id = $_SESSION['user_id'];
                    
                            $query =    "SELECT DISTINCT* 
                                    FROM tasks 
                                    JOIN task_intermediate_tag 
                                    ON tasks.task_id = task_intermediate_tag.task_id 
                                    JOIN tags ON task_intermediate_tag.tag_id = tags.tag_id 
                                    JOIN click_history 
                                    ON tags.tag_id = click_history.tag_id 
                                    JOIN users 
                                    ON click_history.user_id = users.user_id 
                                    WHERE tasks.creator_id <> '{$db_id}' 
                                    AND tasks.status_id = '1'
                                    AND tasks.expiration_date > now()
                                    and click_history.user_id = '{$db_id}'
                                    GROUP BY tasks.task_id 
                                    ORDER BY tasks.expiration_date DESC, total desc LIMIT 4 ";

                        
                        
                
          
                
                    
                        
                 
                 $personalised_displayed_tasks = mysqli_query($connection, $query);
                        
                while($row = mysqli_fetch_assoc($personalised_displayed_tasks)) {
                        $task_id                =       $row['task_id']; 
                        $task_title             =       $row['task_title'];
                        $creator_id             =       $row['creator_id'];
                        $category_id            =       $row['category_id'];
                        $task_desc              =       $row['task_description'];
                        $page_count             =       $row['page_count'];
                        $word_count             =       $row['word_count'];
                        $created_date           =       $row['created_date'];
                        $expiration_date        =       $row['expiration_date'];
                   
                    ?>
                    
                     
                

                <!-- First Blog Post -->
                <h2>
                    <!--When comone click link we eare sending a paramter that matches teh id-->
                   <!-- <a href="post.php?p_id=<?php echo $task_title; ?>">-->  <?php echo $task_title; ?> </a>
                </h2>
                <p class="lead">
                    <?php
                    $query =   "SELECT * 
                                FROM tasks 
                                INNER JOIN users
                                ON tasks.creator_id = users.user_id
                                WHERE tasks.task_id = {$task_id} ";
                    
            
                    

                    
                $select_all_task = mysqli_query($connection, $query);
                        
                while ($row = mysqli_fetch_assoc($select_all_task)) {
                        $task_id                =       $row['task_id'];    
                        $task_title             =       $row['task_title'];
                        $task_desc              =       $row['task_description'];
                        $creator                =       $row['user_name'];
                    
                    
                    
                    ?>
                    
                    
                    by <a href="index.php"><?php echo $creator ?></a>
                </p>
                
                <?php } ?>
                
                <hr>
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Created: <?php echo $created_date ?></p>
                <p><span class="glyphicon glyphicon-time"></span> Claim deadline:<?php echo $expiration_date ?> </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $task_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                     
                     
                     
                        
                    <!--turning on PHP again for closing loop -->
                   <?php } ?>
                     

                    
                
                

              
                
                


            </div>

           
           
           
            <!-- Sidebar Widgets Column -->
            
            <?php include "partials/sideBar.php"; ?>   
                
              

        </div>
        <!-- /.row -->

       <?php include "partials/footer.php"; ?>

        
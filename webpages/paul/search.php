<?php include "partials/header.php"; ?>
  <!-- Navigation -->
    <?php include "partials/navigation.php"; ?>
    <!-- Page Content -->
<?php ob_start(); ?>
<?php session_start();?>
<?php include "partials/db.php"; ?>

<html>
<head>
<title>Search</title>
<body>
  




	
	<div class="container">

				<div class="row">

            <!-- Blog Entries Column -->
            
                 <div class="col-md-8">
                <h1 class="page-header">
                    Open Tasks
                    <small>that might interest you <?php echo $_SESSION['username']?></small>
                </h1>
	
<?php
$connection=mysqli_connect("localhost","root","") or die("could not connect");
mysqli_select_db($connection,"group16") or die("could not DB");
$output ='';


if(isset($_POST['search'])){

	$searchq = ($_POST['search']); 
	
     //$query = ("SELECT * FROM user WHERE first_name LIKE '%$searchq%'") ;
	// $query = "SELECT * FROM user join task on user_tags = task_tags WHERE user_name = '{$username}' ";
			

	
	$query = mysqli_query($connection, "SELECT * FROM tasks WHERE task_title  LIKE'%$searchq%' OR task_description LIKE'%$searchq%'	");
										
									
		
	
	
	if (!$query) {
	echo"error"; 		
die(mysqli_error($connection));

	}


		$count=mysqli_num_rows($query);
		
		?><h2>Search Results for <?php echo $searchq?> : <?php echo $count;?></br> </h2> 
		<?php

		while($row = mysqli_fetch_array($query)){

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
						 </p>   
				
				
                
               
				
				<!-- First Blog Post -->
                <h2>
                    <!--When comone click link we eare sending a paramter that matches teh id-->
                   <!-- <a href="post.php?p_id=<?php echo $task_title; ?>">-->  <?php echo $task_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $task_title ?></a>
                </p>
                
             
                <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
               
                <p><span class="glyphicon glyphicon-time"></span> Created: <?php echo $created_date ?></p>
                <p><span class="glyphicon glyphicon-time"></span> Claim deadline:<?php echo $expiration_date ?> </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $task_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                
                     
                     
                     
                        </br>
						</br>
			<?php
}}					?>                     
                        </br>
						</br>



				
	
</body> 

  </div>

           
           
           
            <!-- Sidebar Widgets Column -->
            
            <?php include "partials/sideBar.php"; ?>   
                
              

        </div>
        <!-- /.row -->

       <?php include "partials/footer.php"; ?>
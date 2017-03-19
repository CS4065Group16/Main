<?php include "partials/admin_header.php" ?>
    
    <?php
    if(isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];
        
        $query ="SELECT * FROM user WHERE user_name = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysql_fetch_array($select_user_profile_query)) {
            
                    $user_id                =       $row['user_id'];
                    $first_name             =       $row['first_name'];
                    $last_name              =       $row['last_name'];
                    $user_email             =       $row['user_email'];
                    $user_subject           =       $row['user_subject'];
                    $user_rep               =       $row['user_rep'];
                    $promote_to_mod         =       $row['promote_to_mod'];
                    $user_tags              =       $row['user_tags'];
                    $password               =       $row['password'];
            
            
        }
       
        
        
        
    }
    
    
    ?>
    

    <div id="wrapper">

       
       
       
       
       <?php include "partials/admin_navigation.php" ?>
       
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                      <h1 class="page-header">
                           Welcome to admin
                            <small>Author</small>
                        </h1>
                       
                       
                    <form action="" method = "post" enctype="multipart/form-data">
    
    



    <div class="form-group">
        <label for="title">User Name</label>
        <input value = "" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="title">Fisrt Name</label>
        <input value ="<?php echo $first_name; ?>" type="text" class="form-control" name="task_type">
    </div>

    <div class="form-group">
        <label for="title">Last Name</label>
        <input value = "<?php echo $last_name; ?>"type="text" class="form-control" name="task_desc">
    </div>
    
     <div class="form-group">
        <label for="title">Email</label>
        <input value = "<?php echo $user_email; ?>"type="text" class="form-control" name="task_subject">
    </div>

     <div class="form-group">
        <label for="title">Password</label>
        <input value = "<?php echo $password; ?>"type="text" class="form-control" name="page_count">
    </div>

     

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="create_task" value="Update Profile">
    </div>

  
  
</form>   
                       
                       
                       
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        
        
        <!-- /#page-wrapper -->
        
<?php include "partials/admin_footer.php" ?>

   


?>
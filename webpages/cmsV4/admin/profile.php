<?php include "partials/admin_header.php" ?>
<?php include "partials/admin_navigation.php" ?>
       
        
        
        <?php
    if(isset($_SESSION['username'])) {
        
        $username           =   $_SESSION['username'];
        $first_name         =   $_SESSION['firstname'];
        $last_name          =   $_SESSION['lastname'];
        $db_user_password   =   $_SESSION['password'];
        $db_user_email      =   $_SESSION['user_email'];
    
        
    }
    
    
    ?>

       
<?php
             
                        
                        if(isset($_POST['upate_profile'])) {
                            
                            echo $new_username = $_POST['username'];
                            $new_first_name = $_POST['fisrt_name'];
                            $new_last_name = $_POST['last_name'];
                            $new_db_user_email= $_POST['user_email'];
                            $new_db_user_password = $_POST['password'];
                            
                            
                            $query = "UPDATE user SET ";
                            $query .= "user_name  = '{$new_username}', ";
                            $query .= "first_name  = '{$new_first_name}', ";
                            $query .= "last_name  = '{$new_last_name}', ";
                            $query .= "user_email  = '{$new_db_user_email}',  ";
                            $query .= "password = '{$new_db_user_password}' ";
                            $query .= "WHERE user_name = '{$username}' ";
                            
                            $update_user_profile = mysqli_query($connection, $query);
                              
                            if(!$update_user_profile) {
        
                                            die("Failed ." . mysqli_error($connection));

                                }
        
                        }
                        
       
                        
                        ?>       
        
  <div id="wrapper">
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
        <input value ="<?php echo $username ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" value ="<?php echo $first_name ?>"  class="form-control" name="fisrt_name">
    </div>

    <div class="form-group">
        <label for="title">Last Name</label>
        <input value = "<?php echo $last_name; ?>"type="text" class="form-control" name="last_name">
    </div>
    
     <div class="form-group">
        <label for="title">Email</label>
        <input value = "<?php echo $db_user_email; ?>"type="text" class="form-control" name="user_email">
    </div>

     <div class="form-group">
        <label for="title">Password</label>
        <input value = "<?php echo $db_user_password; ?>"type="password" class="form-control" name="password">
    </div>

     

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="upate_profile" value="Update Profile">
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
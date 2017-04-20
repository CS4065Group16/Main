<?php include "partials/dashboard_header.php" ?>
<?php include "partials/dashboard_navigation.php" ?>

   
<!--Getting Session data -->
<?php
if(isset($_SESSION['username'])) {
    $username           =   $_SESSION['username'];
    $first_name         =   $_SESSION['firstname'];
    $last_name          =   $_SESSION['lastname'];
    $db_user_password   =   $_SESSION['password'];
    $db_user_email      =   $_SESSION['email'];
    $db_id              =   $_SESSION['user_id'];
}
?>     
<?php
if(isset($_POST['upate_profile'])) {
    $new_first_name = strip_tags($_POST['fisrt_name']);
    $new_last_name = strip_tags($_POST['last_name']);
    $new_db_user_email= strip_tags($_POST['user_email']);
    $new_db_user_password = strip_tags($_POST['password']);
    /*Cleaning data before going in*/
    $new_first_name          = mysqli_real_escape_string($connection, $new_first_name);
    $new_last_name         = mysqli_real_escape_string($connection, $new_last_name);
    $new_last_name          = mysqli_real_escape_string($connection, $new_last_name);
    $new_db_user_email             = mysqli_real_escape_string($connection, $new_db_user_email);
    $new_db_user_password          = mysqli_real_escape_string($connection, $new_db_user_password);
    $comment = strip_tags($_POST["comment"]);

    $query = "UPDATE users SET ";
    $query .= "first_name  = '{$new_first_name}', ";
    $query .= "last_name  = '{$new_last_name}', ";
    $query .= "email  = '{$new_db_user_email}',  ";
    $query .= "password = '{$new_db_user_password}' ";
    $query .= "WHERE user_id = '{$db_id}' ";

    $update_user_profile = mysqli_query($connection, $query);

    if(!$update_user_profile) {
        die("Failed ." . mysqli_error($connection));
    }
    
    $query = "SELECT * FROM users WHERE user_id = '{$db_id}' ";
    $select_user_querry = mysqli_query($connection, $query);
    if(!$select_user_querry) {
        die("Query Failed". mysqli_error($connection));
    }
    
    
        while($row = mysqli_fetch_array($select_user_querry)) {

            /*Need this info for validation and sessions elsewhere */
            $db_id              = $row['user_id'];
            $db_first_name      = $row['first_name'];
            $db_last_name       = $row['last_name'];
            $db_user_email      = $row['email'];
            $db_user_password   = $row['password'];
            $reputation         = $row['reputation'];

            /*Updating Sessions when page refreshed*/
            $_SESSION['username']   = $db_user_name;
            $_SESSION['firstname']  = $db_first_name;
            $_SESSION['lastname']   = $db_last_name;
            $_SESSION['password']   = $db_user_password;
            $_SESSION['email']      = $db_user_email;
            $_SESSION['reputation'] =  $reputation;
        }
    header("location: profile.php");
}
?>       
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Hi <small> <?php echo $username ?></small>
                    </h1>
                       
                    <form action="" method = "post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" value ="<?php echo htmlspecialchars($first_name) ?>"  class="form-control" name="fisrt_name">
                        </div>
                        <div class="form-group">
                            <label for="title">Last Name</label>
                            <input value = "<?php echo htmlspecialchars($last_name) ?>"type="text" class="form-control" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input value = "<?php echo htmlspecialchars($db_user_email) ?>"type="text" class="form-control" name="user_email">
                        </div>
                        
                        <div class="form-group">
                            <input class = "btn btn-primary" type="submit" name="upate_profile" value="Update Profile">
                        </div>
                    </form>   
                </div>
            </div>
        <!--row -->
        </div>
<!--container--->
    </div>
</div>            
<?php include "partials/dashboard_footer.php" ?>

   



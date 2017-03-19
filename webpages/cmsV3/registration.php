<?php  include "partials/db.php"; ?>
<?php  include "partials/header.php"; ?>
 
<?php

//check if form is working 


if(isset($_POST['submit'])) {
    

        /*Entract data fisrt*/


        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        
        
        /*Checking fields to make sure they not empty on form*/
        if(!empty($username) && !empty($email) && !empty($password)) {
            
              
        /*clean it before going into DB*/
        /*1st par connection, 2nd data you want to clean*/
    
        $username   = mysqli_real_escape_string($connection, $username);
        $email      = mysqli_real_escape_string($connection, $email);
        $password   = mysqli_real_escape_string($connection, $password);
    
        
        
        
    
    
        /*Used crytp blowfish function to encrypt password*/
        /* ($2y$10$iusesomecrazystring22) in randSalt value in DB we use to encryt password*/
        
        $query = "SELECT rand_salt FROM user";
        $select_randsalt_query = mysqli_query($connection, $query);
        
        if(!$select_randsalt_query) {
            
            die("Query Failed" . mysqli_error($connection));
        }
        
        
        while ($row = mysqli_fetch_array($select_randsalt_query)){
            
            echo $salt = $row['rand_salt'];
        }
      
          $message_to_user = "Your Registration has been submitted";
            
        } else {
            
            $message_to_user = "Fields cannot be empty";
            
        }
    
    
    
  
    

    
    
    
    
} else {
    
    $message_to_user ="";
    
}


?>
 
 


    <!-- Navigation -->
    
    <?php  include "partials/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       <h6 class="text-center"><?php echo $message_to_user; ?> </h6>
                       
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

         <!-- Log in -->
                           <div class="col-xs-6 col-xs-offset-3">

                <div class="well">
                    <h4>Log In</h4>
                    <form action="partials/login.php" method="post">
                           <div class="form-group">
                                <input name ="username" type="username" type = "text" class="form-control" placeholder="Enter Username">
                          </div>
                          <div class="input-group">
                                <input name ="password" type="password" type = "text" class="form-control" placeholder="Enter Password">
                                <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit </button>
                                
                                </span>
                          </div>
                    </form>
                       
                    <!-- /.input-group -->
                </div>

        </div>
        <hr>



<?php include "partials/footer.php";?>

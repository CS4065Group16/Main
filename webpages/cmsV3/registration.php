<?php  include "partials/db.php"; ?>
<?php  include "partials/header.php"; ?>
<?php  include "admin/functions.php"; ?>
 
<?php

//check if form is working 


if(isset($_POST['submit'])) {
    

    /*Entract data fisrt*/


        $username         = $_POST['user_name'];
		$firstname        = $_POST['first_name'];
        $lastname         = $_POST['last_name'];
        $usersubject      = $_POST['user_subject'];
        $usertags         = $_POST['user_tags'];
        $email            = $_POST['user_email'];
        $password         = $_POST['password'];
        
        /*From functions 
        if (usernameExists($username)) {
            
            $message = "user exsistes";
            
        }*/
        
        $query = "SELECT user_name FROM user WHERE user_name = '$username'";
                        $result = mysqli_query($connection, $query);
                        if(!$result) {
                                
                                die ('Query failed' . mysqli_error($connection));
                                    
                            }
                        $row = mysqli_fetch_array($result);
                        /*Checking if row biggher than 0 then we found username*/
                        if($row['user_name'] == '$username') {
                            return true;
                        }

                        else {
                            return false;
                        }

    
    

    
    
    
    
            
        
        /*Checking fields to make sure they not empty on form*/
        if(!empty($username) && !empty($email) && !empty($password)) {
            
              
        /*clean it before going into DB*/
        /*1st par connection, 2nd data you want to clean*/
    
        $username          = mysqli_real_escape_string($connection, $username);
        $firstname         = mysqli_real_escape_string($connection, $firstname);
		$lastname          = mysqli_real_escape_string($connection, $lastname);
        $usersubject       = mysqli_real_escape_string($connection, $usersubject);
		$usertags          = mysqli_real_escape_string($connection, $usertags);
        $email             = mysqli_real_escape_string($connection, $email);
        $password          = mysqli_real_escape_string($connection, $password);
        
        
        /*Used crytp blowfish function to encrypt password*/
        /* ($2y$10$iusesomecrazystring22) in randSalt value in DB we use to encryt password*/
       
        $query = "SELECT rand_salt FROM user";
        $select_randsalt_query = mysqli_query($connection, $query);
        
        
         if(!$select_randsalt_query) {
            
            die("Query Failed" . mysqli_error($connection));
        }
            
            
            $row = mysqli_fetch_array($select_randsalt_query);
            
            $salt = $row['rand_salt'];
            
           $query = "INSERT INTO user (user_name, first_name, last_name, user_email, user_subject, user_tags, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$usersubject', '$usertags', '$password' )";
            
            $register_user_query = mysqli_query($connection, $query);
             header("Location:index.php");
            if(!$register_user_query) {  
                die("QUERY Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                    }
                
            
            
            
        
            
            

        }
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

</section>                 
                        
       <section id="login">                             
                
        <div class="col-xs-6 col-xs-offset-3">

                <div class="well">                                    
                      
               <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       <h6 class="text-center"><?php ?> </h6>
                       
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" placeholder="User Name" name="user_name" required class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">First Name</label>
                              <input type="text" placeholder="First Name" name="first_name" required class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Last Name</label>  
                            <input type="text" placeholder="Last Name" name="last_name" required  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Email</label>  
                            <input type="text" placeholder="Email Name" name="user_email" required  class="form-control">
                        </div>
                        <!--<div class="form-group">
                            <label for="password" class="sr-only">Email</label>  
                            <input type="text" placeholder="Email Name" name="user_email" required  class="form-control">
                        </div>-->
                        <div class="form-group">
                            <label for="password" class="sr-only">Subject</label>  
                            <input type="text" placeholder="Subject" name="user_subject" required  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Tags</label>  
                            <input type="text" placeholder="Tags" name="user_tags" required  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>  
                            <input type="text" placeholder="Password" name="password" autocomplete="new-password" required  class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Confirm Paaword</label>  
                            <input type="text" placeholder="Confirm Password" name="confirmpassword"  autocomplete="new-password" required  class="form-control">
                        </div>
   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
             
             </section>      
                   
                    <div class="col-xs-6 col-xs-offset-3">
                <h1>Log In</h1>
                <div class="well">
                    
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
                      </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    </div>

    



<?php include "partials/footer.php";?>



























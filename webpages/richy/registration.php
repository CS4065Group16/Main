<?php  include "partials/db.php"; ?>
<?php  include "partials/header.php"; ?>
<?php  include "dashboard/functions.php"; ?>
<?php  include "partials/navigation.php"; ?> 
<?php
/*Check sever var rquest method bec of inetrent exploer issues*/


/*ALL VALIDATION*/
if(isset($_POST['register'])) {
    /*Entract data from form and trim whitespace and clean it (will also be claimed in registration with escaping string*/
    $username         = strip_tags(trim($_POST['user_name']));
    $firstname        = strip_tags(trim($_POST['first_name']));
    $lastname         = strip_tags(trim($_POST['last_name']));
    $email            = strip_tags(trim($_POST['email']));
    $password         = strip_tags(trim($_POST['password']));
    $confirmpassword  = strip_tags(trim($_POST['confirmpassword']));    
    $studentId        = strip_tags(trim($_POST['student_id']));
    $major            = strip_tags(trim($_POST['major_tag']));
    /*Creating an array containing errors below*/
    $error = [
        'user_name'=>'',
        'first_name'=>'',
        'last_name'=>'',
        'email'=>'',
        'password'=>'',
        'confirmpassword'=>'',
        'student_id'=>'',
        'username'=>'',
        'major_tag'=>''
    ];
    /* 1st User Name Validation*/    
    /*Checking length of field*/    
    if (strlen($username) > 9) {
        $error['user_name'] = 'Username to large'; 
    } 
    /*Checking username is not empty*/    
    if($username =='') {
        $error['user_name'] = 'Please crreate a Username'; 
    } 
    if(username_exists($username)) {
        $error['user_name'] = 'Username already exists, pick anouthe one'; 
    }
    /*Email Validation*/    
    /*Checking length of field*/    
    if(strlen($email) > 19) {
        $error['email'] = 'email to large'; 
    } 
    if($email =='') {
        $error['email'] = 'Please enter an email'; 
    } 
    
    if(email_exists($email)) {
        $error['email'] = 'An account with that email already exists'; 
    }
    if (stristr($email, '@UL.ie') == false) {
        $error['email'] = 'You must have a UL email address'; 
    }
    /*Checking username has a field*/    
    if(empty($major)) {
        $error['major_tag'] = 'Please select a major'; 
    }
    /*Checking majour tag not empty has a field*/    
    if($password !== $confirmpassword) {
        $error['confirmpassword'] = 'Passwords do not match'; 
    }
    
    
    
    
    /*If everything above  is fine then reg user*/
    foreach($error as $key=> $value) {
        if(empty($value)) {
            /*So if above errors arre empty we are going to unset key*/
            unset($error[$key]);
        }
        if(empty($error)) {
            register_user($username, $firstname, $lastname, $email,$password,$studentId,$major);
            login_user($username, $password);
            header("Location:index.php");
        }

    }
}

?>
<!-- Registration Form -->
<div class="container">
    <section id="login">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
    </section>                
    <section id="login">                             
        <div class="col-xs-6 col-xs-offset-3">
            <div class="well">                                    
                <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="username" class="sr-only">username</label>
                        <!--Storing data so users does not have to input it twice-->
                        <input type="text" placeholder="User Name" id="user_name" name="user_name" required class="form-control" title="Username should be less than 8 Digits" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                        <!--Showing any errors from above validation-->
                        <p><?php echo htmlspecialchars(isset($error['user_name']) ?  $error['user_name'] : '')?></p>
                    </div>
                    <div class="form-group">
                        <label for="fisrt_name" class="sr-only">First Name</label>
                        <input type="text" placeholder="First Name" name="first_name" required class="form-control" autocomplete="on" value="<?php echo htmlspecialchars(isset($firstname) ? $firstname : '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="sr-only">Last Name</label>  
                        <input type="text" placeholder="Last Name" name="last_name" required  class="form-control" autocomplete="on" value="<?php echo htmlspecialchars(isset($lastname) ? $lastname : '')?>">
                        </div>
                    <div class="form-group">
                        <label for="student_id" class="sr-only">Student ID</label>  
                        <input type="text" placeholder="Student ID" name="student_id" required  class="form-control" autocomplete="on" value="<?php echo htmlspecialchars(isset($studentId) ? $studentId : '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>  
                        <input type="text" placeholder="Email" name="email" id="email" required  class="form-control" autocomplete="on" value="<?php echo htmlspecialchars(isset($email) ? $email : '') ?>">
                        <p><?php echo htmlspecialchars(isset($error['email'])) ?  $error['email'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Majoring In</label>
                            <select class="form-control" name="major_tag" placeholder="Major Subject" autocomplete="on"value="<?php echo isset($major) ? $major : '' ?>">
                                <option value="">Select</option>
                               <!--Populating drop down with dynamic data from DB-->
                               <?php
                                $query = "SELECT * FROM categories";
                                $select_all_tags_sidebar = mysqli_query($connection, $query); 
                                while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                    $category = $row['category'];
                                ?>
                                <option><?php echo $category ?></option>                          
                                <?php }?>
                            </select>
                            <p><?php echo isset($error['major_tag']) ?  $error['major_tag'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>  
                        <input type="password" type = "password"  placeholder="Password" name="password" autocomplete="new-password" required  class="form-control">
                        <p><?php echo isset($error['password']) ?  $error['password'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Confirm Paaword</label>  
                        <input type="password" type = "password"  placeholder="Confirm Password" name="confirmpassword"  autocomplete="new-password" required  class="form-control">
                        <p><?php echo htmlspecialchars(isset($error['confirmpassword']) ?  $error['confirmpassword'] : '') ?></p>
                    </div>
                    <input type="submit" name="register"  onclick="return validate();" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                </form>
            </div>
        </div>
    </section>      
                   
    
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       <div class="col-xs-6 col-xs-offset-3">
        <h1>Log In</h1>
        <div class="well">
            <form action="partials/login.php" method="post">
                <div class="form-group">
                    <input name ="username" type="username" type = "password" class="form-control" placeholder="Enter Username">
                    <p><?php echo htmlspecialchars(isset($error['username']) ?  $error['username'] : '') ?></p>
                </div>
                <div class="input-group">
                    <input name ="password" type="password" type = "password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn"><button class="btn btn-primary" name="login" type="submit">Submit </button></span>
                </div>
            </form>
        </div>
    </div>
    <hr>   
</div>
<?php include "partials/footer.php";?>


<script>
function validate()
{
	var user_named_value = document.getElementById('user_name').value;
	var email_value = document.getElementById('email').value;
    var email_value_result = email_value.endsWith("@ul.ie");
	if (user_named_value.length > 8)
	{
		alert('Username Should be less than 8 Characters ..... !!');
		return false;
	}
	else if(email_value_result == false)
	{
		alert('Email Should end with @ul.ie ..... !!');
		return false;
	}
	else
	{
		return true;
	}
}
</script>
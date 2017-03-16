<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] == $_POST['confirmpassword']) {

   
       /*
	   $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);

   
        $password = md5($_POST['password']);
		*/

       echo "Neil is a cunt";
	} else {
		echo "passwords do not match";
	}
		        
    }

?>
<!--<h1> validate</h1>!-->


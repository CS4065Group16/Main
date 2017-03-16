<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

   
       if ($_POST['password'] == $_POST['confirmpassword']) {
/*
        $user_id = $mysqli->real_escape_string('6');
        $first_name = $mysqli->real_escape_string($_POST['first_name']);
		$last_name = $mysqli->real_escape_string($_POST['last_name']);
		$user_email = $mysqli->real_escape_string($_POST['user_email']);
		$user_subject = $mysqli->real_escape_string($_POST['user_subject']);
		$user_tags = $mysqli->real_escape_string($_POST['user_tags']);
        $password = md5($_POST['password']);
		
		
		
		$sql = "INSERT INTO test_users (user_id, first_name, last_name, user_email, user_subject, user_tags, password) VALUES ('6','$first_name','$last_name','$user_email','$user_subject','$user_tags','$password')";
      
*/
$sql = 'INSERT INTO test_users'.
'(user_id, first_name, last_name, user_email, user_subject, user_tags, password) '.
'VALUES
(1, "Rachel", "Sullivan", "rsullivan0@about.com", "English", "Literature", "w2cQMjUv")';


	  
	  
	  
    }
	
	
	/*if ($mysqli->query($sql) === true)
{
    $_SESSION[ 'message' ] = "Registration succesful! Added $first_name to the database!";
    
    header( "location: welcome.php" );
}
*/	


}

  
	
	 


?>
<!--<h1> validate</h1>!-->


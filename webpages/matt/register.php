<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$dbname='playitbypeerthree';

session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli($host,$user,$password, $dbname);
	
	
	if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

	
	


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
   
       if ($_POST['password'] == $_POST['confirmpassword']) {
		  		   
		$result = $mysqli->query("SELECT user_id FROM test_users");
 
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_subject = $_POST['user_subject'];
		$user_tags = $_POST['user_tags'];
        $password = md5($_POST['password']);
						
		$sql= "INSERT INTO user (user_name, first_name, last_name, user_email, user_subject, user_tags, password) VALUES ('$user_name', '$first_name', '$last_name', '$user_email', '$user_subject', '$user_tags', '$password');";
      
	  if ($mysqli->query($sql) === TRUE) {
		  header( "location: homepage.php" );
	  } else {
		  echo "ERROR. Data not added!" . $sql . "<br>" . $mysqli->error;
	  }
	  
	  

	  
	  
	  
    }
	
	
	/*
	
	$user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_subject = $_POST['user_subject'];
		$user_tags = $_POST['user_tags'];
        $password = md5($_POST['password']);
						
		$sql= "INSERT INTO user (user_name, first_name, last_name, user_email, user_subject, user_tags, password) VALUES ('$user_name', '$first_name', '$last_name', '$user_email', '$user_subject', '$user_tags', '$password');";
      
	  if ($mysqli->query($sql) === TRUE) {
		  header( "location: homepage.php" );
	  } else {
		  echo "ERROR. Data not added!" . $sql . "<br>" . $mysqli->error;
	  }
	  
	  
	  
	  
	  
    }
	
	
	if ($mysqli->query($sql) === true)
{
    $_SESSION[ 'message' ] = "Registration succesful! Added $first_name to the database!";
    
    header( "location: welcome.php" );
}
*/	


}

  
	
	 


?>



<?php 

$host = 'localhost';
$user = '';
$password = '';
$dbname='test';

session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli($host,$user,$password,$dbname);
	
	
	if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
	
	
if ($mysqli->connect_errno) {
    printf("No connection to mySQL: %s\n", $mysqli->connect_error);
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

   
       if ($_POST['password'] == $_POST['confirmpassword']) {
		   print_r($_POST);
		   
		   $result = $mysqli->query("SELECT user_id FROM test_users");

    /* determine number of rows to be the next user ID */
    $row_count = $result->num_rows;
	echo $row_count;
	$row_count++;
	echo $row_count;

		   

        $user_id = $row_count+1000000;
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_subject = $_POST['user_subject'];
		$user_tags = $_POST['user_tags'];
        $password = md5($_POST['password']);
					
				
		$sql= "INSERT INTO test.test_users (user_id, first_name, last_name, user_email, user_subject, user_tags, password) VALUES ('$user_id', '$first_name', '$last_name', '$user_email', '$user_subject', '$user_tags', '$password');";
      
	  if ($mysqli->query($sql) === TRUE) {
		  echo "Added to DB.";
	  } else {
		  echo "ERROR. Data not added!" . $sql . "<br>" . $mysqli->error;
	  }
	  
	  
/*
$sql = 'INSERT INTO test_users'.
'(user_id, first_name, last_name, user_email, user_subject, user_tags, password) '.
'VALUES
(1, "Rachel", "Sullivan", "rsullivan0@about.com", "English", "Literature", "w2cQMjUv")';

*/
	  
	  
	  
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


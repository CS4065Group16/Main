<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$dbname='playitbypeerthree';

session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli($host,$user,$password,$dbname);
	/*    $mysqli = new mysqli($host,$user,$password, $dbname);
*/
	
	if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

	
	


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
   
       /*if ($_POST['password'] == $_POST['confirmpassword']) {*/
		  		   
		$result = $mysqli->query("SELECT task_id FROM playitbypeerthree");
 
        $task_title = $_POST['task_title'];
        $task_type = $_POST['task_type'];
		$task_desc = $_POST['task_desc'];
		$task_subject = $_POST['task_subject'];
		$page_count = $_POST['page_count'];
		$word_count = $_POST['word_count'];
        $file_format = ($_POST['file_format']);
		$claim_deadline = ($_POST['claim_deadline']);
		$submission_deadline = ($_POST['submission_deadline']);
		$task_tags = ($_POST['task_tags']);
		
						
		$sql= "INSERT INTO task (task_title, task_type, task_desc, task_subject, page_count, word_count, file_format, claim_deadline, submission_deadline, task_tags  ) VALUES (' $task_title', '$task_type', '$task_desc', '$task_subject', '$page_count', '$word_count', '$file_format' ,'$claim_deadline', '$submission_deadline', '$task_tags');";
      
	  if ($mysqli->query($sql) === TRUE) {
		  header( "location: homepage.php" );
	  } else {
		  echo "ERROR. Data not added!" . $sql . "<br>" . $mysqli->error;
	  }
	  
	  

	  
	  
	  
    }
	
	
	/*if ($mysqli->query($sql) === true)
{
    $_SESSION[ 'message' ] = "Registration succesful! Added $first_name to the database!";
    
    header( "location: welcome.php" );
}
*/	




  
	
	 


?>



<?php


$host = 'localhost';
$user = '';
$password = '';


/*
$host = 'localhost';
$user = 'group16';
$password = 'REACH-state-worn-gone';
*/




// dir where uploads will be stored on server
$target_dir = "uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	



// file to be uploaded as a global variable with name
$target_file = $target_dir . basename($_FILES["sampleDoc"]["name"]);

$uploadOk = 1;

//accepted file types
$accepted = array('doc', 'pdf', 'docx');

//see the file type of upload eg .doc
$docType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $docType;
//Check if image file is a valid document type
$allowedExts = array(
  "pdf", 
  "doc", 
  "docx"
); 


//create an array of valid mimes
$allowedMimeTypes = array( 
  'application/msword',
  'application/pdf',
  'text/pdf'
  );
$test=explode(".", $_FILES["sampleDoc"]["name"]);
$extension = end($test);

echo $extension;
//if statement to check if the file extn type is (not) in allowedExts list
if ( ! ( in_array($extension, $allowedExts ) ) ) {
  die('Error (1):Incorrect file type.');
}

//if statement to check if the file extn type is an allowed mime
if ( in_array( $_FILES["sampleDoc"]["type"], $allowedMimeTypes ) ) 
{     

//uploads to server
 move_uploaded_file($_FILES["sampleDoc"]["tmp_name"], "uploads/" . $_FILES['sampleDoc']['name']); 
 echo $_FILES["sampleDoc"]["tmp_name"];
}
else
{
die('Please provide another file type.');
}



session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("No connection to mySQL: %s\n", $mysqli->connect_error);
    die();
}
}
?>

<html>
<body>
<link rel="stylesheet" href="matt.css" type="text/css">


<div class="body-content">
  <div class="module">
    <h1>Play It By Peer.</h1>
	<h2>Task submission</h2>
		

		
    <form class="form" action="task_posted.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
	  
	  <input type="text" placeholder="Task Title" name="task_title" required />
      <input type="text" placeholder="Task Type" name="task_type" required />
	  <input type="text" placeholder="Task Description" name="task_desc" required />
     <input type="text" placeholder="Task Subject" name="task_subject"  />
	 <input type="text" placeholder="Page Count" name="page_count"  />
	 <input type="text" placeholder="Word Count" name="word_count"  />
	 <input type="text" placeholder="File Format" name="file_format"  />
	 	 </br>

	 Claim deadline date:
	 <input type="date" placeholder="Claim Date" name="claim_deadline"  />
	 	 </br>

	 Submission deadline date:
	 <input type="date" placeholder="Submission Deadline" name="submission_deadline"/>
		<input type="text" placeholder="Tags" name="task_tags" />
	
	<!--	 Select sample document to upload:
    <input type="file" name="sampleDoc" id="sampleDoc"> -->
		 

    Select sample document to upload:
    <input type="file" name="sampleDoc" id="sampleDoc">
    <input type="submit" value="Upload Document" name="submit">

-->


	
			</br>
		 </br> 

      <input type="submit" value="Submit task" name="Submit task"  />
    </form>
  </div>
  </div>
</html>
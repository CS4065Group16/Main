<?php
$test_docid = 2;
include('inc/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// dir where uploads will be stored on server
$target_dir = "documents/";

// file to be uploaded as a global variable with name
$target_file = $target_dir . basename($_FILES["sampleDoc"]["name"]);

$uploadOk = 1;

//accepted file types
$accepted = array('doc', 'pdf', 'docx');

//see the file type of upload eg .doc
$docType = pathinfo($target_file,PATHINFO_EXTENSION);

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
	'text/pdf',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.template'
  );

$extension = end(explode(".", $_FILES["sampleDoc"]["name"]));

//if statement to check if the file extn type is (not) in allowedExts list
if ( ! ( in_array($extension, $allowedExts ) ) ) {
  die('Error (1):Incorrect file type.');
}

//if statement to check if the file extn type is an allowed mime
//upload's to server
if ( in_array( $_FILES["sampleDoc"]["type"], $allowedMimeTypes ) ) {     
 move_uploaded_file($_FILES["sampleDoc"]["tmp_name"], $target_dir . "test.".$extension);  // test will be get task_ID sql query??
 $location = $target_dir . "test.".$extension;
 $query = "INSERT INTO play_it_by_peer_db.document (document_id, document_path) VALUES ('$test_docid','$location');";
echo $location;	

if ($mysqli->query($query) === TRUE) {
		  echo "Sample Uploaded";
	  }	
		
}		
else
{
die('Please provide another file type.');

}
}
?>

<html>
<body>
<h1>This is a test page to simulate uploading a file</h1>

<form action="upload1.php" method="post" enctype="multipart/form-data">
    Select sample document to upload:
    <input type="file" name="sampleDoc" id="sampleDoc">
    <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>


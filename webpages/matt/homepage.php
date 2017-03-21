<?php
// dir where uploads will be stored on server
$target_dir = "uploads/";

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

$extension = end(explode(".", $_FILES["sampleDoc"]["name"]));
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
?>

<html>
<body>
<h1>This is a page to simulate a homepage and to test uploading a file</h1>

<form action="homepage.php" method="post" enctype="multipart/form-data">
    Select sample document to upload:
    <input type="file" name="sampleDoc" id="sampleDoc">
    <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>


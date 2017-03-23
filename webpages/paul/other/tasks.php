<?php

/*
Matt's database details
user=1611892amber
password=Qwerty12
*/

$host = 'localhost';
$user = '';
$password = '';

/*
Group database details
*/

/*
$host = 'localhost';
$user = 'group16';
$password = 'REACH-state-worn-gone';
*/

/* the code below is handy for displaying if you are not connected to a DB
*/
/*
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}
*/

session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("No connection to mySQL: %s\n", $mysqli->connect_error);
    die();
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
	 <input type="date" placeholder="Claim Date" name="claim_deadline"  />
	 <input type="date" placeholder="Submission Deadline" name="submission_deadline"/>
		<input type="text" placeholder="Tags" name="task_tags" />

		
		
		
      <input type="submit" value="Submit tags" name="Submit tags"  />
    </form>
  </div>
  </div>
</html>
</body>
<link rel="stylesheet" href="matt.css" type="text/css">
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



/*
the sql below is just testing creating a table on my personal phpBD. this will have already have been created on the server and just INSERT required which is on the validation page. If you try to run this page again before deleting the table there will be an sql error Matt.
*/

/*$mysqli->query('CREATE TABLE `test`.`test_users` 
(
   `user_id` int(11) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `user_email` varchar(32) DEFAULT NULL,
  `user_subject` varchar(32) DEFAULT NULL,
  `user_tags` varchar(32) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  
  

    
PRIMARY KEY (`user_id`) 
);') or die($mysqli->error);

*/





?>
<div class="body-content">
  <div class="module">
    <h1>Play It By Peer.</h1>
	<h2>Peer review for students by students Blah blah blah.</h2>
		
	<h2>Please <button type="button" onclick="alert('Directs to sign in page!')"> sign in</button>, or register below </h2>
	
		
    <form class="form" action="validate.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="First Name" name="first_name" required />
	  <input type="text" placeholder="Last Name" name="last_name" required />
     <input type="email" placeholder="Email" name="user_email" required />
	 <input type="text" placeholder="user_subject" name="user_subject" required />
	 <input type="text" placeholder="user_tags" name="user_tags" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
	  
      <input type="submit" value="Register" name="register"  />
    </form>
  </div>
  </div>
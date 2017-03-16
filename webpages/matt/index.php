<link rel="stylesheet" href="matt.css" type="text/css">
<?php

/*
Matt's database
*/

$host = 'localhost';
$user = '1611892amber';
$password = 'Qwerty12';



/*
Group database
*/

/*
$host = 'localhost';
$user = 'group16';
$password = 'REACH-state-worn-gone';
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
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}
require 'validate.php';



?>
<div class="body-content">
  <div class="module">
    <h1>Play It By Peer.</h1>
	<h2>Peer review for students by students Blah blah blah.</h2>
		
	<h2>Please <button type="button" onclick="alert('Directs to sign in page!')"> sign in</button>, or register below </h2>
	
		
    <form class="form" action="validate.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="First Name" name="firstname" required />
	  <input type="text" placeholder="Last Name" name="lastname" required />
	  <input type="text" placeholder="Student Number" name="studentnumber" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register"  />
    </form>
  </div>
  </div>
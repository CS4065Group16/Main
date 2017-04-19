
<?php session_start();?>
<?php
/*Everytime a user signs out we sign all there session vaules with NULL*/
$_SESSION['username']   =   null;
$_SESSION['firstname']  =   null;
$_SESSION['lastname']   =   null;
$_SESSION['password']   =   null;
/*Redirect them registration page onec signed out*/
header("Location: ../registration.php");
?>





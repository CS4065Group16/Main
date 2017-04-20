<?php include "db.php";?>
<!--Turning on sessions-->
<?php include"../dashboard/functions.php"; ?>
<?php session_start();?>
<!--If Login Posted attemept to log in user with details -->
<?php
if(isset($_POST['login'])) {
    login_user($username = $_POST['username'],$password = $_POST['password']);
    }
?>





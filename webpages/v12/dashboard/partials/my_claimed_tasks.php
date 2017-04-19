<?php 
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?> 
<!--Allows logged in user to withdraw offer  -->
<?php
if(isset($_GET['withdraw'])){ 
withdrawOffer();
header("location:./tasks.php?source=view");
}
?>
<br/><br/><br/>
<html>
<!--Getting claimed tasks of log in user that still have to be approved by orignial author-->
<?php
if(isset($_SESSION['user_id'])) {
    awaiting_appoval_by_author();
    /*All task the logged in users is working on ie have had there original offer accpeted*/
    task_user_working_on();
} 
?>                            
 
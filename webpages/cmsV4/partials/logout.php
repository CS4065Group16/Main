
<?php session_start();?>
<?php
        /*Everytime a user signs out we sign all there session vaules with NULL*/

        $_SESSION['username']       =       null;
        $_SESSION['firstname']      =       null;
        $_SESSION['lastname']       =       null;
        $_SESSION['password']       =       null;
        
header("Location: ../index.php");

?>





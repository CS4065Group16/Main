<?php include "db.php";?>
<!--Turning on sessions-->
<?php session_start();?>
<?php


if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Stoping SQL injection (connection, what it is cleaing)
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
           
    //Now can put into database
    
    $query = "SELECT * FROM user WHERE user_name ='{$username}' ";
    $select_user_querry = mysqli_query($connection, $query);
    if(!$select_user_querry) {
        
        die("Query Failed". mysqli_error($connection));
        
    }
    
    //Looping through result
    while($row = mysqli_fetch_array($select_user_querry)) {
        
        /*Need this info for validation and sessions elsewhere */
        $db_id              = $row['user_id'];
        $db_user_name       = $row['user_name'];
        $db_first_name      = $row['first_name'];
        $db_last_name       = $row['last_name'];
        $db_user_email      = $row['user_email'];
        $db_user_password   = $row['password'];
        
   
    }
    
    /*Rem not username from databse (its username for stoping injection)*/
    if($username === $db_user_name && $password === $db_user_password) {
        
         /*If can log in set sessions and redirtect them to adm pages*/
        
        /*We assign username from DB with a session called username*/
        /*Can get value from anywhere*/
        /*So once we get to admin we have all this information (as long as its turned on)*/
        
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_first_name;
        $_SESSION['lastname'] = $db_last_name;
        $_SESSION['password'] = $db_user_password;
        
           /*If password and emailmatch redirect user*/
        header("Location: ../index.php");
        
      
        
       
    } 
    
    else {
        
       /* So if anything happen beside the above we bring them back to index*/
        
        header("Location: ../index.php");
        
    }
        
    
    
    
}


?>





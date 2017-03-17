<?php 

if(isset($_POST['submit'])) {
    $username =     $_POST['username'];
    $password =     $_POST['password'];
    
    

/*create viariable and assign it a function, first parameter is the server, username default root, third password, 4th database we are checking*/
$connection = mysqli_connect('localhost', 'root', '', 'playitbypeer');
    if ($connection) {
         echo "We are connected";
    }
    
    else {
        die("Datatbase connection failed");
        }

    //Save Query in variable then use it to submit it
    //We are inserting the data into the username/password columns
    $query  = "INSERT INTO user(first_name, password) ";
    //We are inserting the variables passed from the post global varr into the value to populate the columns
    $query .= "VALUES ('$username', '$password')"; 
    
    //takes two var 1st connection var 2nd query var
    $result =  mysqli_query($connection, $query);
    
    //just a test to make sure of connections
    if(!$result) {
        die("Query Failed". mysqli_error($connection));
        
    }
    
}


?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   
<div class = "container">
    
    <div class ="col-sm-6">
        <form action = "login_create.php" method ='post'>
           <div class = "form-group">
                <label for="username">Username</label>
                <input type="text" name = "username" class="form control">
            </div>
        
        
            <div class = "form-group">
              <label for="password">Password</label>
              <input type="password" name = "password" class="form control">
            </div>
        <input class = " btn btn-primary" type="submit" name = "submit" value = "Submit" >
        
        
        
        </form>
        
    </div>
    
    
    
</div>
    
</body>
</html>
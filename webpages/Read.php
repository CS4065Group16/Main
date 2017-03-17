<?php 

//read

/*create viariable and assign it a function, first parameter is the server, username default root, third password, 4th database we are checking*/
$connection = mysqli_connect('localhost', 'root', '', 'playitbypeertwo');
    if ($connection) {
         echo "We are connected";
    }
    
    else {
        die("Datatbase connection failed");
        }

    //Save Query in variable then use it to submit it
    //We are inserting the data into the username/password columns
    $query  = " SELECT *
                FROM user ";
    //We are inserting the variables passed from the post global varr into the value to populate the columns
    
    //takes two var 1st connection var 2nd query var
    $result =  mysqli_query($connection, $query);
    
    //just a test to make sure of connections
    if(!$result) {
        die("Query Failed". mysqli_error($connection));
        
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
       
    <?php
    
    //use reult from query above
    //While row is true assign in to Var
    //mysqli_fetch_row give normallty array with idexes
    //asoc gives associate array back with colums  
    while ($row = mysqli_fetch_assoc($result)) {
        
         ?>
        
        <pre>
        <?php
         print_r($row);
        ?>
        
        </pre>
        
        <?php
        
      
        
       
        
        
    }
        
        ?>
        
       
        
        
    
    </div>
    
</div>
    
</body>
</html>
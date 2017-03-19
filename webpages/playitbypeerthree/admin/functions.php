<?php

function insert_tags(){
    
    //Remember GLOBAL CONNECTION
    global $connection;
    
    if (isset($_POST['submit'])) {
                            
                         /* getting tittle out of super gloabl*/
                        $tag_title = $_POST['tag_title'];
                        
                        
                        if($tag_title == "" || empty($tag_title)) {
                            
                            echo "Field can not be empty";
                            
                        } else {
                            
                           /*do query*/
                            
                            $query  = "INSERT INTO TAGS (tag) ";
                            $query .= "VALUE ('{$tag_title}') ";
                            
                            //send query to database
                            $create_tag_query = mysqli_query($connection, $query);
                            
                            if(!$create_tag_query) {
                                
                                die ('Query failed' . mysqli_error($connection));
                                
                            }
                            
                        }
                            
                        }
                            
    
    
}



function findAllTags(){
    
   global $connection;
    
                                $query = "SELECT * FROM tags ";
                                $select_tags= mysqli_query($connection, $query);
                        
                                
                                 while($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                        
                                        echo"<tr>";
                                        echo "<td> {$tag_id} </td>";
                                        echo "<td> {$tag_title} </td>";
                                        //When clicked on we want to pass in params that creates a key in array, get req (delete is the key stag id the value)
                                        echo "<td><a href ='tags.php?delete={$tag_id}'>Delete</a></td>";
                                        echo "<td><a href ='tags.php?edit={$tag_id}'>Edit</a></td>";
                                        echo"<tr>";

                                }
    
    
    
    
}





function deleteTag() {
     global $connection;
    
     //seeing if get request has delete from above
                                    if(isset($_GET['delete'])) {
                                    
                                    //saving value passed in URL  to different Var      
                                    $the_tag_id =  $_GET['delete'];
                                    $query = "DELETE FROM tags WHERE tag_id = {$the_tag_id} ";
                                    $delete_query = mysqli_query($connection, $query);
                                    
                                    
                                    
                                      if(!$delete_query) {
                                
                                die ('Query failed' . mysqli_error($connection));
                                    
                                    
                                    
                                    
                                }
                                //once done refersh page
                                header("Location:tags.php");
                                }
                                
    
    
    
    
    
}



function dropDownTags() {
    global $connection;
    
    $query = "SELECT * FROM tags";
                                $select_tags = mysqli_query($connection, $query);
                                
      
                                if(!$select_tags) {
        
                                            die("Failed ." . mysqli_error($connection));

                                        }
                                
                                /*Looping through tags and deisplaying them in drop down*/
                                
                                 while  ($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];  
                                     
                                     echo "<option value=''>{$tag_title}</option>";
                                     
                                     
                                
                                 }
    
    
    
    
}



?>
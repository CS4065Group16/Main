<?php include "partials/admin_header.php" ?>

    <div id="wrapper">

       
       
       
       
       <?php include "partials/admin_navigation.php" ?>
       
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                          
                          <h1 class="page-header">
                           Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        
                        
                        <div class="co-xs-6">
                           
                        <?php
                        
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
                            
    
    
                        ?>
                           
                           
                           
                           
                           
                            <form action = "" method = "post"> 
                            <div class="form-group">
                               <label for = "tag-tittle">Add Tag</label>
                                <input type="text" class = "form-control" name ="tag_title">

                            </div>
                             <div class="form-group">
                                <input class = "btn btn-primary" type="submit" name ="submit" value = "Add Tag">

                            </div>


                            </form>
                        </div>
                        
                        <div class="col-xs-6">
                        <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tag Tittle</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                              <?php
                       
                    $query = "SELECT * FROM tags ";
                    $select_tags= mysqli_query($connection, $query);
                        
                   
                    
                       ?>
                 
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                               
                               
                               <?php
                                
                                 while($row = mysqli_fetch_assoc($select_tags)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                        
                                        echo"<tr>";
                                        echo "<td> {$tag_id} </td>";
                                        echo "<td> {$tag_title} </td>";
                                        echo"<tr>";

                                }
                       
                                
                                ?>
                              
            
                            </tbody>
                            
                        </table>
                        
                        
                        
                        
                        
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        
        
        <!-- /#page-wrapper -->
        
<?php include "partials/admin_footer.php" ?>

   


?>
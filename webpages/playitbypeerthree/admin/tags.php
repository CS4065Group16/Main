<?php include "partials/admin_header.php" ?>
<?php include "functions.php" ?>    

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
                          
                            
                        <?php insert_tags(); ?>
                           
                           
         
                           
                        <form action = "" method = "post"> 
                            <div class="form-group">
                                <label for = "tag-tittle">Add Tag</label>
                                <input type="text" class = "form-control" name ="tag_title">

                            </div>
                             <div class="form-group">
                                <input class = "btn btn-primary" type="submit" name ="submit" value = "Add Tag">

                            </div>


                        </form>
                        
                        
                        <?php //UPATE AND INCLUDE QUERY
                            
                            if (isset($_GET['edit'])) {
                                
                                $tag_id = $_GET['edit'];
                                include "partials/admin_update_tags.php";
                                
                                
                                
                                
                            }
        ?>
                        
                        
                        
                        
                        </div>
                        
                        
                        <!--Add Tags form-->
                        
                        <div class="col-xs-6">
                        <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tag Tittle</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                        
                 
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                               
                               <!--FIND ALL TAGS-->
                               <?php findAllTags(); ?>
                              
                                
                                <!--//DELETE QUERY-->
                                <?php deleteTag(); ?>
                                    
                                                    
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
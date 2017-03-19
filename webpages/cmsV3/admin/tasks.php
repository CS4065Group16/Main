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
                       
                        <!--Checking GET req if source set is availaible -->
                        
                        <?php
    
                            if(isset($_GET['source'])) {
                                
                                $source = $_GET['source'];
                                
                            }

                            else {
                                
                                $source = '';
                                
                            }
                                
                            
    
                            
                            switch($source){
                                    
                            
                                    case'add_task';
                                    
                                        include "partials/admin_add_task.php";
                                    
                                    break;
                                    
                                    case'edit_task';
                                          
                                        include "partials/edit_task.php";
                                    
                                    break;
                                    
                                    
                                    case'34';
                                    echo "Nice";
                                    break;
                                    
                                    default:
                                    
                                    include "partials/view_all_tasks.php";
                                    
                                    break;
                                    
                                    
                                    
                                    
                            }







    
                            ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        
        
        <!-- /#page-wrapper -->
        
<?php include "partials/admin_footer.php" ?>

   


?>
<?php include "partials/admin_header.php" ?>
<?php $reputation = $_SESSION['reputation']; ?>

    <div id="wrapper">
    
      
      <?php if ($connection)echo "connected"?>
    
  
       <?php include "partials/admin_navigation.php" ?>
       
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                          
                          <h1 class="page-header">
                           
                           
                              <small>  Welcome <?php echo $_SESSION['username']?> </small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        
        
        <!-- /#page-wrapper -->
        
<?php include "partials/admin_footer.php" ?>

   
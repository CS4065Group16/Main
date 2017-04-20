<?php include "partials/dashboard_header.php" ?>
<?php include "partials/dashboard_navigation.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>
                    <!--Source var decided on view all task page or navigation page with "?"-->
                    <?php
                    if(isset($_GET['source'])) {
                        $source = mysqli_real_escape_string($connection, $_GET['source']);
                    }
                    else {
                        $source = '';
                    }
                    switch($source){
                    
                        /*Brings users to add task page*/ 
                        case'add_task';
                        include "partials/dashboard_add_task.php";
                        break;
                        
                        /*Brings users to edit task page*/   
                        case'edit_task';
                        include "partials/edit_task.php";
                        break;
                        
                        /*Brings users to claimed tasks*/    
                        case'view';
                        include "partials/my_claimed_tasks.php";
                        break;
                        
                        //Blow is defualt to flagged tasks 
                        default:
                        include "partials/view_all_flagged_tasks.php";
                        break;
                    }
                    ?>
               </div>
            </div>
        </div>
    </div>
</div>   
<?php include "partials/dashboard_footer.php" ?>

   



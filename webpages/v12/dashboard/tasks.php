<?php include "partials/dashboard_header.php" ?>
<?php include "partials/dashboard_navigation.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       <small>Task Section</small>
                    </h1>
                    <!--Checking GET req if source set is availaible-->
                    <!--The "Source" variable decides what page will be displayed-->
                    <?php
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];   
                    }
                    else {
                        $source = '';
                    }
                    switch($source){

                        case'add_task';
                        include "partials/dashboard_add_task.php";
                        break;

                        case'edit_task';
                        include "partials/edit_task.php";
                        break;


                        case'view';
                        include "partials/my_claimed_tasks.php";
                        break;

                        case'request';
                        include "partials/full_file_request.php";
                        break;

                        case'feedback';
                        include "partials/feedback.php";
                        break;

                        default:
                        include "partials/view_all_tasks.php";
                        break;
                    }
                    ?>
                </div>
            <!--row -->
            </div>
        <!--container-fluid -->
        </div>
    </div>
</div>
     
<?php include "partials/dashboard_footer.php" ?>

   


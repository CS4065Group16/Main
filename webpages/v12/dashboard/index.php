<?php include "partials/dashboard_header.php" ?>
<?php include "partials/dashboard_navigation.php" ?>
<!--Storing Reputation score of user-->   
<?php $reputation = $_SESSION['reputation']; ?>
<?php $db_id= $_SESSION['user_id']; ?>
<div id="wrapper">
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
       <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <!--Counting Task created by logged in user-->
                                <?php
                                $query = "SELECT * FROM tasks WHERE creator_id = '{$db_id}'";
                                $total_tasks_query = mysqli_query($connection, $query);  
                                /*Count of rows with task belonging to users*/
                                $task_counts = mysqli_num_rows($total_tasks_query);  
                                echo "<div class='huge'>{$task_counts}</div>"
                                ?>
                                <div>Total Tasks Created</div>
                            </div>
                        </div>
                    </div>
                    <a href="./tasks.php">
                        <div class="panel-footer">
                            <span class="pull-left">Most Recent</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <!--Counting Task that are being worked on for Userr-->
                                <?php
                                $userID = $_SESSION['user_id'];
                                $query ="SELECT * FROM tasks 
                                INNER JOIN claimed_tasks on  tasks.task_id = claimed_tasks.task_id
                                WHERE student_id = '{$userID}' and status_id ='3'";
                                $total_tasks_claimed = mysqli_query($connection, $query);  
                                $claimed_count = mysqli_num_rows($total_tasks_claimed);  
                                echo "<div class='huge'>{$claimed_count}</div>"
                                ?>
                            <div>Tasks You Are Working On</div>
                            </div>
                        </div>
                    </div>
                    <a href="./tasks.php?source=view">
                        <div class="panel-footer">
                            <span class="pull-left">Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <!--Getting users who is logged in reputation-->
                                <?php
                                $query = "SELECT reputation
                                        FROM users 
                                        WHERE user_id = {$db_id} ";
                                $reputation_query = mysqli_query($connection, $query);        
                                while($row = mysqli_fetch_assoc($reputation_query)) {
                                    $user_reputaion            =       $row['reputation'];
                                ?>
                                <div class='huge'><?php echo $user_reputaion ?></div>
                                <?php }?>
                                <div> Reputation Score</div>
                            </div>
                        </div>
                    </div>
                    <a href="profile.php">
                        <div class="panel-footer">
                            <span class="pull-left">Profile Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        <!--Row-->
        </div>
        <?php include "partials/dashboard_chart.php" ?>

    <!--page-wrapper -->
    </div>   
</div>
<?php include "partials/dashboard_footer.php" ?>

   
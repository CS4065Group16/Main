<?php 
$users_rep = $_SESSION['reputation'];
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    }

/*Stops user accessing pag via URL*/
if($users_rep < 40) { 
    header("Location: ../index.php");
    }
?> 
<h4>Flagged Tasks</h4>            
<table class = "table table-hover table-hover">
    <thead>
        <tr>
            <th>Task Flagged</th>
            <th>Flagged By User</th>
            <th>Flag Date</th>
            <th>Reason</th>
            <th>User who created task</th>
            <th>Relist Task</th>
            <th>Delete Task</th>
            <th>Ban User and Delete Task</th>
        </tr>
    </thead>
    <tbody>
    <!--Shows all flagged task to admin-->
    <?php flagged_tasks_details(); ?>
    </tbody>
</table>
<!-- Delete task that has been flagged-->
<?php 
if(isset($_GET['delete'])) {
    
        
    
    
    $delete_task_id = mysqli_real_escape_string($connection, $_GET['delete']);
    delete_flagged_task($delete_task_id);
    header("location:flagged_tasks.php");
}
?>
<!--Relist task that has been flagged ie deletes it from flagged_task_table-->  
<?php 
if(isset($_GET['relist'])) {
    $the_post_id = mysqli_real_escape_string($connection, $_GET['relist']);
    relist_flagged_task($the_post_id);
    header("location:flagged_tasks.php");
}
?>
<!--Bans users and deletes task-->
<?php 
if(isset($_GET['ban'])){
    $delete_task_id = mysqli_real_escape_string($connection, $_GET['ban']);
    $user_id = $_GET['user'];
    ban_user($user_id);
    delete_flagged_task($delete_task_id);
    header("location:flagged_tasks.php");
}
?>
                      
                      

                      
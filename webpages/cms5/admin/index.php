
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php ob_start(); ?>
<?php session_start();?>
<!--Checking if Logged in User-->
<?php 
if(!isset($_SESSION['username'])) {
    header("Location:registration.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">
                Open Tasks
                <small>that might interest you <?php echo $_SESSION['username']?></small>
            </h1>
            <!--Getting personalised tasks that might interest users-->
            <?php
            $username = $_SESSION['username'];
            $db_id  = $_SESSION['user_id'];

            $query = "SELECT DISTINCT* 
                    FROM tasks 
                    JOIN task_intermediate_tag 
                    ON tasks.task_id = task_intermediate_tag.task_id 
                    JOIN tags ON task_intermediate_tag.tag_id = tags.tag_id 
                    JOIN click_history 
                    ON tags.tag_id = click_history.tag_id 
                    JOIN users 
                    ON click_history.user_id = users.user_id 
                    WHERE tasks.creator_id <> '{$db_id}' 
                    AND tasks.status_id = '1'
                    AND tasks.expiration_date > now()
                    and click_history.user_id = '{$db_id}'
                    GROUP BY tasks.task_id 
                    ORDER BY tasks.expiration_date DESC, total desc LIMIT 4 ";

            $personalised_displayed_tasks = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($personalised_displayed_tasks)) {
                    $task_id                =       $row['task_id']; 
                    $task_title             =       $row['task_title'];
                    $creator_id             =       $row['creator_id'];
                    $category_id            =       $row['category_id'];
                    $task_desc              =       $row['task_description'];
                    $page_count             =       $row['page_count'];
                    $word_count             =       $row['word_count'];
                    $created_date           =       $row['created_date'];
                    $expiration_date        =       $row['expiration_date'];
                    ?>
            <h2> 
                <a  href="post.php?p_id=<?php echo $task_id; ?>"><?php echo $task_title; ?> </a>
            </h2>
            <p class="lead">
            <!--Getting user who created the task-->
            <?php
            $query = "SELECT users.user_name
                    FROM tasks 
                    INNER JOIN users
                    ON tasks.creator_id = users.user_id
                    WHERE tasks.task_id = {$task_id} ";
            $select_all_task = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_task)) {
                    $creator                =       $row['user_name'];
                    ?>
            by <?php echo $creator ?>
            <?php } ?>
            <hr>
            <img class="img-responsive" src="https://livelearn.ca/wp-content/uploads/2016/10/proofreading-900x300.jpg" alt="">
            <hr>
            <p><span class="glyphicon glyphicon-time"></span> Created: <?php echo $created_date ?></p>
            <p><span class="glyphicon glyphicon-time"></span> Claim deadline:<?php echo $expiration_date ?> </p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $task_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
<!--turning on PHP again for closing loop -->
    <?php } ?>

        </div>
        <!-- Sidebar Widgets Column -->
        <?php include "partials/sideBar.php"; ?>   
    </div>
</div>
<?php include "partials/footer.php"; ?>

        
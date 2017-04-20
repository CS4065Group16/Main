<?php $reputation = $_SESSION['reputation']; ?>
<?php $db_user_name = $_SESSION['username']; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Dashboard</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href = "../index.php">Home Page</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo htmlspecialchars($db_user_name) ?>  <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                 <li>
                    <a href="../partials/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu left hand side - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
             <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#task_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Tasks <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="task_dropdown" class="collapse">
                    <li>
                        <a href="./tasks.php">View all tasks</a>
                    </li>
                    <li>
                        <a href="./tasks.php?source=add_task">Add task</a>
                    </li>
                    <li>
                        <a href="./tasks.php?source=view">My Claimed Tasks</a>
                    </li>
                </ul>
            </li>
            
            <!--Flagged task menu only available if user a mod (ie >40 reputation score-->
            <?php if($reputation >= 40):?>   
            <li>
                <a href="./tags.php"><i class="fa fa-fw fa-wrench"></i>Tags</a>
            </li>
            <?php endif; ?>
            <!--Flagged task menu only available if user a mod (ie >40 reputation score-->
            <?php if($reputation >= 40):?>
            <li>
                <a href="./flagged_tasks.php"><i class="fa fa-fw fa-file"></i>Flagged Tasks</a>
            </li>
            <?php endif; ?>
            <li class="active">
                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
            </li>
        </ul>
    </div>
<!--navbar-bar -->
</nav>
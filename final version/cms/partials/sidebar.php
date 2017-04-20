<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </div>
    <div class="well">
    <!--Checking if user logged in-->
    <?php 
    if (isset($_SESSION['username'])) { ?>
        <div class = "center-align">
            <h4> Logged in as <?php echo htmlspecialchars($_SESSION['username']) ?></h4>
        </div>
        <a href="./dashboard/tasks.php?source=add_task" class="btn btn-default " role="button">Create Task</a>
        <a href="partials/logout.php" class="btn btn-default" role="button">Log Out</a>
        <?php } ?>
    </div>
    <!-- All Categories List -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                    $query = "SELECT * FROM categories";
                    $select_all_tags_sidebar = mysqli_query($connection, $query); 
                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                        $category_id = $row['category_id'];
                        $category = $row['category'];
                        echo "<li><a href='task_tags.php?category=$category'>{$category}</a></li>";
                    }  
                    ?>
                </ul>
            </div>
        </div>
    </div>
 </div>
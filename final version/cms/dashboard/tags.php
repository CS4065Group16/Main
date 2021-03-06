<?php include "partials/dashboard_header.php" ?>
<?php include "partials/dashboard_navigation.php" ?>
<?php $users_rep = $_SESSION['reputation'];
/*Stops user accessing pag via URL*/
if($users_rep < 40) { 
    header("Location: ../index.php");
    }
?>    
<div id="wrapper">       
    <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  <small>Tag Section</small>
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
                    $tag_id = mysqli_real_escape_string($connection, $_GET['edit']);
                    include "partials/dashboard_update_tags.php";
                }
                ?>
            </div>
            <!--Add Tags form-->
            <div class="col-xs-6">
                <table class = "table table-hover table-hover">
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
            </div>
    <!--row -->
    </div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "partials/dashboard_footer.php" ?>

   



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- toggle-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Play it by Peer</a>
            </div>
            <!--  nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                      <?php
                    
                       /* $query = "SELECT * FROM tags ";
                        $select_all_tags = mysqli_query($connection, $query);
                        
                    while($row = mysqli_fetch_assoc($select_all_tags)) {
                        $tag_title = $row['tag'];
                        echo "<li><a href = '#'>{$tag_title}</a></li>";
                        
                    }*/
                    
                        ?>
                       
                       
                       
                       <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

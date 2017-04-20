  <div class="col-md-4">

                <!-- Blog Search Well -->
                
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <form action ="search.php" method = "post" />
						<input type="text" name="search" required/>
						<input type= "submit" value = "Search" />		
						
                           
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                
                
                     <!-- Log in -->
                <div class="well">
                       <!--Checking if user logged in-->
                       <?php 
                        if (isset($_SESSION['username'])) { ?>
                            <div class = "center-align">
                            <h4> Logged in as <?php echo $_SESSION['username'] ?></h4>
                            </div>
                             
                             <a href="./admin/tasks.php?source=add_task" class="btn btn-default " role="button">Create Task</a>
                             <a href="partials/logout.php" class="btn btn-default" role="button">Log Out</a>
                             
                             
    
                                 
                                                              
                        
                    <?php } ?>
    
    
    

                    
                   
                   <!--
                    <h4>Log In</h4>
                    <form action="partials/login.php" method="post">
                           <div class="form-group">
                                <input name ="username" type="username" type = "text" class="form-control" placeholder="Enter Username">
                          </div>
                          <div class="input-group">
                                <input name ="password" type="password" type = "text" class="form-control" placeholder="Enter Password">
                                <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit </button>
                                
                                </span>
                          </div>
                    </form>
                       
                     /.input-group -->
                </div>
                
                
                
                
                
                
                
                
                
                
                <!-- Blog Categories Well -->
                
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
                                                    
                                                    echo "<li><a href='task_tags.php?tag=$category'>{$category}</a></li>";
                                                    }
                                
                                
                                
                                
                                ?>
                                
                            </ul>
                        </div>
                       
                    </div>
                    <!-- /.row -->
                </div>
                
                
                                 
                
                
                

                <!-- Side Widget Well 
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>-->

            </div>
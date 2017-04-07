 
                        <form action = "" method = "post"> 
                            <div class="form-group">
                                <label for = "tag-tittle">Edit Tag</label>
                                
                                
                                <?php
                                
                                if(isset($_GET['edit'])) {
                                    $tag_edit_id = $_GET['edit'];
                                    
                                $query = "SELECT * FROM tags WHERE tag_id = $tag_edit_id ";
                                $select_tags_id = mysqli_query($connection, $query);
                        
                                
                                 while  ($row = mysqli_fetch_assoc($select_tags_id)) {
                                        $tag_id = $row['tag_id'];
                                        $tag_title = $row['tag'];
                                    
                                     ?>
                                        <!--value attribute is what we echo in table-->
                                      <input value ="<?php if (isset($tag_title)) {echo $tag_title;} ?> "  type="text" class = "form-control" name ="tag_title">
                                    
                                <?php }} ?>
                                
                                
                                <?php
                                
                                  
                                //UPDATE QUERY (SO POST)
                                
                                if(isset($_POST['update_tag'])) {
                                    
                                    //saving value passed in URL  to different Var      
                                    $the_tag_tittle = $_POST['tag_title'];
                                    $query = "UPDATE tags SET tag = '{$the_tag_tittle}' WHERE tag_id ={$tag_id} ";
                                    $update_query = mysqli_query($connection, $query);
                                      
                                    if(!$update_query) {
                                          die ('Query failed' . mysqli_error($connection));

                                                      //once done refersh page
                      
                                      }
                                }
                                
                                ?>
                                
                            
                                
                                
                            
                                
                                
        
                                
                                
                               

                            </div>
                             <div class="form-group">
                                <input class = "btn btn-primary" type="submit" name ="update_tag" value = "Update Tag">

                            </div>


                         </form>
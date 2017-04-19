
<?php include "partials/db.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/navigation.php"; ?>
<?php include "./dashboard/functions.php"; ?>
<!--<?php header(); ?>-->




<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>




<select class="form-control" name="task_category" placeholder="Major Subject" id="select1">
                                <option value="">Select</option>
                                   
                                   <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                    $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                            <option value="">Foods</option>
                        <?php }?>
                              </select>

<select class="form-control" name="task_category_two" placeholder="Major Subject" id="select2">
                                <option value="">Select</option>
                                   
                                   <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                    $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                        
                        <?php }?>
                              </select>




<select class="form-control" name="task_category" placeholder="Major Subject" id="select3">
                                <option value="">Select</option>
                                   
                                   <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                    $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                        
                        <?php }?>
                              </select>
                              
                              <select class="form-control" name="task_category" placeholder="Major Subject" id="select4">
                                <option value="">Select</option>
                                   
                                   <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_tags_sidebar = mysqli_query($connection, $query); 

                                    while($row = mysqli_fetch_assoc($select_all_tags_sidebar)) {
                                    $category_title = $row['category'];
                                                    
                            ?>
                            <option> <?php echo $category_title ?> </option>                          
                        
                        <?php }?>
                              </select>



<select id="seect1" name="indication_subject[]">
  <option value="" selected="selected">a </option>
  <option> Accounting</option>
  <option> Afrikaans</option>
  <option> Applied Information and Communication Technology</option>
  <option> Arabic</option>
  <option> Art and Design</option>
  <option> Biology</option>
  <option> Business Studies</option>
</select>

<select id="slect2" name="indication_subject[]">
  <option value="" selected="selected">a </option>
  <option> Accounting</option>
  <option> Afrikaans</option>
  <option> Applied Information and Communication Technology</option>
  <option> Arabic</option>
  <option> Art and Design</option>
  <option> Biology</option>
  <option> Business Studies</option>
</select>







<!--Code from http://jsfiddle.net/x4E5Q/1/-->

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  
     <script>


            
   
});
            
</script>
     
     
     <script>
     
    $("select.form-control").change(function () {
    $("select.form-control option[value='" + $(this).data('index') + "']").prop('disabled', false);
    $(this).data('index', this.value);
    $("select.form-control option[value='" + this.value + "']:not([value=''])").prop('disabled', true);
    });     
         
         
         
         
         
         
         
         
         
         
         
         
    
      

      
     $("select[name='select1']").change( function() {
    $("select[name='select2']").removeAttr("disabled");
    $("select[name='year']").removeAttr("disabled");
    $("select[name='price']").removeAttr("disabled");
});
      
      
      
      
      
    /*  
    function preventDupes( select, index ) {
    
    
        
    var options = select.options,
        len = options.length;
    while( len-- ) {
        options[ len ].disabled = false;
    }
    select.options[ index ].disabled = true;
    if( index === select.selectedIndex ) {
        alert('You\'ve already selected the item "' + select.options[index].text + '".\n\nPlease choose another.');
        this.selectedIndex = 0;
    }
}*/

var select1 = select = document.getElementById('select1' );
var select2 = select = document.getElementById('select2' );

   
         
         $('select[name="task_category_two"]').change(function(){
  
    if ($(this).val() == "select1")
        alert("call the do something function on option 2");
    
});      
       
  
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
        /* 
         var select3 = select = document.getElementById( 'select3' );


         
select1.onchange = function() {
    preventDupes.call(this, select2, this.selectedIndex );
};

select2.onchange = function() {
    preventDupes.call(this, select1, this.selectedIndex );
};

select3.onchange = function() {
    preventDupes.call(this, select3, this.selectedIndex );
};

select3.onchange = function() {
    preventDupes.call(this, select3, this.selectedIndex );
};
     
select4.onchange = function() {
    preventDupes.call(this, select4, this.selectedIndex );
};

select4.onchange = function() {
    preventDupes.call(this, select4, this.selectedIndex );
};

select4.onchange = function() {
    preventDupes.call(this, select4, this.selectedIndex );
};
         */
         

</script>








</body>
</html





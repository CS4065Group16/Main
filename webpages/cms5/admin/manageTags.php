<?php 
 include "../partials/db.php";
if($_POST)
{
		$tagsArray = array(1 => '',2 => '',3 => '',4 => '');
		$disableArray =array();
		$tagsArray[$_POST['tags_attr']]=$_POST['selectedTag'];
		$query = "SELECT * FROM tags";
		$str   ='<option value="">Select</option>'; 
        $select_all_tags_sidebar = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_tags_sidebar))
        {
               	$tag_title = $row['tag'];
				if(!in_array($tag_title, $_POST['selectedTag']))
				{
					$str .= "<option value= '".$tag_title."'>".$tag_title."</option>";
			    } 
		}
		
		foreach($tagsArray AS $key=> $value)
		{
			if($_POST['tags_attr'] != $key){
				$disableArray[] = $key;
			}
			
		}
		$enable = 0;
		if($_POST['tags_attr']+1>4){
		$enable = 0;	
		}else{
		$enable	= $_POST['tags_attr']+1;
		}
			echo json_encode(array('tr'=>$str, 'disableArray'=>$disableArray,'enable'=>$enable));
			exit();
	
}?>
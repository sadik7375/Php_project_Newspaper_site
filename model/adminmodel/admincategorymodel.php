<?php
include "config.php";


function addcategory($category)
{

	include "config.php";
   $sql = "INSERT INTO category (category_name) VALUES ('{$category}')";
   $result=mysqli_query($conn, $sql);
if($result)
{
	return true;
}
else{
	return false;
}

}

function updatecategory($category_id,$category_name)
{ 
		include "config.php";
		 $cat_id = $_GET["id"];
	
	$sql = "UPDATE category SET category_name='{$_POST['cat_name']}'  WHERE  category_id={$_POST['cat_id']}";
	$result=mysqli_query($conn, $sql);

  if($result)
  {
  	 return true;
  }
 else{

 	return false;
 }



}


function deletecategory($cat_id)

{
	include "config.php";


$cat_id = $_GET["id"];

   
    $sql = "DELETE FROM category WHERE category_id ='{$cat_id}'";
     $result=mysqli_query($conn, $sql);
    if ($result) 
    	{ 
    		return true;
    	}
    else{
    	return false;
       }

}






?>
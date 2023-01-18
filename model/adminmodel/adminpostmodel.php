<?php
include "config.php";
 
 function post($title,$description,$category,$date,$author)
 {
    include "config.php";
   $sql="INSERT INTO post(title,description,category,post_date,author) VALUES('{$title}','{$description}','{$category}','{$date}','{$author}')";
      $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";


   $result=mysqli_multi_query($conn,$sql);
   if($result)
   {

       return true;
   }
   else{

       return false;
   }


 }

function postupdate()
{

   $sql = "UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category={$_POST["category"]},post_img='{$image_name}'
        WHERE post_id={$_POST["post_id"]};";
if($_POST['old_category'] != $_POST["category"] ){
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$_POST['old_category']};";
  $sql .= "UPDATE category SET post= post + 1 WHERE category_id = {$_POST["category"]};";
}

$result = mysqli_multi_query($conn,$sql);
if($result)
{
    return true;
}else{
    return false;
}



}

function deletepost($_post)
{
    include "config.php";

      $post_id = $_GET['id'];
  $sql = "DELETE FROM post WHERE post_id = {$post_id};";
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$cat_id}";
  $result=mysqli_multi_query($conn, $sql);

  if($result){
    return true;
    }
else{
      return false;
    }

}






?>
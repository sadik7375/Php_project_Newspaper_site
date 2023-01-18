<?php
 include "config.php";

require_once ('../../model/adminmodel/adminpostmodel.php');
 
$cat_id = $_GET['catid'];
  $post_id = $_GET['id'];
  

 
 $status= deletepost($_post,$cat_id);

  if($status){
    header("location: ../../view/adminview/post.php");
  }else{
    echo "Query Failed";
  }
?>

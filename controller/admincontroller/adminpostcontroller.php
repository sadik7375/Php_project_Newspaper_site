<?php
  include "config.php";

require_once ('../../model/adminmodel/adminpostmodel.php');
  session_start();
  $title = $_POST['post_title'];
  $description = $_POST['postdesc'];
  $category =$_POST['category'];
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

 $status=post($title,$description,$category,$date,$author,$new_name); //call function from moedel

  if($status){
    header("location:../../view/adminview/post.php");
  }else{
    echo "<div >Query Failed.</div>";
  }

  
 if(isset($_FILES['fileToUpload1'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "../../view/adminview/upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

 

?>















<?php
  include "config.php";

if(isset($_POST['submit'])){




  
  include "config.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['post_title']);
  $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

  $sql = "INSERT INTO post(title, description,category,post_date,author,post_img)
          VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$new_name}');";
  $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location:../../view/adminview/post.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }






 }

?>

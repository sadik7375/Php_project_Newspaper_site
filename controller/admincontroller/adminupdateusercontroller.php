
<?php
require_once ('../../model/adminmodel/adminprofilemodel.php');
if(isset($_POST['submit'])){
  include "config.php";

  $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $role = mysqli_real_escape_string($conn,$_POST['role']);

$status=update($userid,  $fname, $lname, $user,$role);

    if($status){
      header("Location: ../../view/adminview/users.php");
    }
    else {

       echo "something wrong";
    }
}
?>
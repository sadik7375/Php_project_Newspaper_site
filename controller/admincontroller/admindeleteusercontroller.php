//session
<?php
include "config.php";
require_once ('../../model/adminmodel/adminprofilemodel.php');
$userid = $_GET['id'];

$status= delete($userid);
if($status){
  header("Location:../../view/adminview/users.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
}

mysqli_close($conn);

?>



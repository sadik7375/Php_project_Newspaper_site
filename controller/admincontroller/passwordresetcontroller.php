

<?php 
include "config.php";
$old_password=$_POST['oldpassword'];
$new_password = $_POST['newpassword'];
$repassword = $_POST['repassword'];
$username=$_POST['username'];

$sql1 = "SELECT password FROM user WHERE password = '{$old_password}'";

  $result = mysqli_query($conn, $sql1) or die("Query Failed.");

if (mysqli_num_rows($result) > 0) {

    if ($new_password == $repassword) {
        $sql = "UPDATE user SET password = '{$new_password}'  WHERE username = '{$username}'";

        if (mysqli_query($conn, $sql)) {
            header('location:../../view/adminview/add-post.php');
        } else {

            echo "false";
        }
    } else {

        echo "something wrong";
    }
}
  ?>   



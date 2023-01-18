<?php

session_start();
include "config.php";
include "../../model/adminmodel/adminprofilemodel.php";
                          
if(isset($_POST['login1']))
{
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  if($username != null && $password != null)
  {
    $status = login ($username,$password);
    if($status)
    {       
           $_SESSION['user_role']=$row['role'];
           $_SESSION['user_id']=$row['user_id'];
           $_SESSION['status']="true";
           $_SESSION['username']=$username;
         


         if(isset($_POST['reminderme']))
         {
               setcookie('usernamecookie',$username,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);


                 


         }
  
      header('location: ../../view/adminview/add-user.php');
    }
    else
    {
      header('location: ../../view/adminview/index.php?msg=error');

    }

  }
  else
  {
    echo "null submission ....";
  }
}
else{
  echo "Enter username name and password 1st";
}

?>






















 <?php
                          if(isset($_POST['login'])){
                            include "config.php";
                            if(empty($_POST['username']) || empty($_POST['password'])){
                              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                              $password = ($_POST['password']);

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];

                                                   if(isset($_POST['reminderme']))
                                          {
                                          setcookie('usernamecookie',$username,time()+86400);
                                            setcookie('passwordcookie',$password,time()+86400);


                                              


                                              }
                                                  


                                              header("Location:../../view/adminview/add-user.php");

                                             
                                }

                              }else{
                              echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                            }
                          }
                          }
                        ?>
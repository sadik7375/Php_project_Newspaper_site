<?php

include "config.php";
 // require_once "../../model/adminmodel/adminprofilepmodel.php";
require_once ('../../model/adminmodel/adminprofilemodel.php');








if(isset($_POST['submit'])){
 // include ("../model/adminmodel/r") 


  $fname =$_POST['fname'];
  $lname = $_POST['lname'];
  $user = $_POST['user'];
  $email=$_POST['email'];
  $password =$_POST['password'];
  $role = $_POST['role'];

  

  if($user==" " || $password==" " || $email== " " || $role==" "  )
  {
     header("location:../../view/adminview/add-user.php");
  }


   if(strlen($password)<6 )
{

    die("must not be less than fivr (6) characters
    ");
}



if(!strrchr($email,'@'))
{
   die("Invalid email");
}

if(!strrchr($email,'.'))
{
   die("Invalid email");
}

 

if ($_POST["password"] !== $_POST["conpassword"]) {
    die("Passwords must be matched");
}











   $status1=usercheck($user);
   if($status1)
   {
 
     echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";

 } else {
     $status=create($fname,$lname,$user,$email,$password,$role);
            if($status)
            {
                
               header("Location: ../../view/adminview/add-user.php");
               
               echo '<script> alert(Information submited succesfully) </script';
               
           }
     else{
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  
}
}
if (isset($_POST['username']) && $_POST['username'] !=null) {
   $username = $_POST['username'];
   $chk = checkusername($username);
   if ($chk) {
      echo "Username Not Available";
   }
   else{

   }
}

if (isset($_POST['email']) && $_POST['email'] !=null) {
   $email = $_POST['email'];
   $check = checkvalidemail($email);
   if ($check) {
      echo "Email Not Available";
   }
   else{

   }
}

?>
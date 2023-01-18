<?php

include  "config.php";
function create($fname,$lname,$user,$email,$password,$role)
{  
	$conn = mysqli_connect("localhost","root","","new-project") or die("Connection failed : " . mysqli_connect_error());

	$sql1 =  "INSERT INTO user (first_name,last_name, username,email, password, role)
              VALUES ('{$fname}','{$lname}','{$user}','{$email}','{$password}','{$role}')";
      // echo "<pre>";
      // print_r($sql1);
      // exit;

	$result = mysqli_query($conn,$sql1);
	//$user= mysqli_fetch_assoc($result);
	if($result)
	{
		return true;
	}
	else
	{
		return false;
	}

}





function login($username,$password)

{	


	$conn = mysqli_connect("localhost","root","","new-project") or die("Connection failed : " . mysqli_connect_error());
    $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'";

     $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if($result)
    {
		return true;
	}
	else
	{
		return false;
	}
}

function update()

{   
	include "config.php";
   $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $role = mysqli_real_escape_string($conn,$_POST['role']);


  $conn = mysqli_connect("localhost","root","","new-project") or die("Connection failed : " . mysqli_connect_error());
$sql = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = {$userid}";

    if(mysqli_query($conn,$sql)){
              return true;
     }
     
     else{

     	 return false;
     }

	
}

function usercheck($user)
{
    include "config.php";
	  $sql = "SELECT username FROM user WHERE username = '{$user}'";

  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
  	  return true;
     }
     else{

     	  return false;
     }
   }


function checkoldpassword($old_password)
{
         include "config.php";

	 $sql1 = "SELECT password FROM user WHERE password = '{$old_password}'";

  $result = mysqli_query($conn, $sql1) or die("Query Failed.");

if (mysqli_num_rows($result) > 0)
   { 
     return true;
   }
   else{

   	   return false;
   }
    

}


function delete($userid)
{
   include "config.php";
  
$userid = $_GET['id'];
  $sql = "DELETE FROM user WHERE user_id = {$userid}";

	if(mysqli_query($conn ,$sql))
	{
		return true;
	}
	else
	{
		return false;
	}
}


function checkusername($username)
{
	include "config.php";
	$sql = "select *from user where username = '{$username}'";
	$result = mysqli_query($conn ,$sql);
	if($row = mysqli_fetch_assoc($result)){


		return true;
	}
	else
	{
		false;
	}
	
}








function checkvalidemail($email)
{
	include "config.php";
	$sql = "select *from user where email = '{$email}'";
	$result = mysqli_query($conn ,$sql);
	if($row = mysqli_fetch_assoc($result)){


		return true;
	}
	else
	{
		 return false;
	}
	
}


?>
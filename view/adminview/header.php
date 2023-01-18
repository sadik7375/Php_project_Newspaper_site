<?php
  include "config.php";
  session_start();

  if(!isset($_SESSION["username"])){
    header("Location: ../../view/adminview");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../css/style.css">
<style>



* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
background-color: hsla(14, 100%, 53%, 0.6);
}

.header {
  overflow: hidden;
  background-color:Gray;
  padding: 20px 10px;
   position: relative;
}

.header a {
  float: center;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 15px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;

}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

table {
  border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 600px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);


}
#center {
    margin-left:auto; 
    margin-right:auto;
  }
th{
     background-color: #009879;
    color: #ffffff;
    text-align: left;
}
td{
       border-bottom: 1px solid #dddddd;
    background-color: #F0FFF0;

}

</style>
</head>
<body>

<div class="header">
  <a href="admindashbroad.php" class="logo">Admin Dashbroad</a>
  <div class="header-right">
     
                           
                                <a href="post.php">Post</a>
                                
                                <a href="setting.php">Settings</a>
                         
                            <?php
                              if($_SESSION["user_role"] == '1'){
                            ?>
                                  
                                <a href="category.php">Category</a>
                          
                        
                                <a href="users.php">Users</a>
                          
                          
                          
                            <?php
                              }
                            ?>
                       
      <a href="logout.php">Hello <?php echo $_SESSION['username']; ?> logout</a>
  </div>
</div>

<div style="padding-left:20px">

</div>

</body>
</html>


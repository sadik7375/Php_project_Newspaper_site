<?php
  //echo "<h1>" .  . "</h1>";
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['title'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "category.php":
      if(isset($_GET['cid'])){
        $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['category_name'] . " News";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "author.php":
      if(isset($_GET['aid'])){
        $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = "News By " .$row_title['first_name'] . " " . $row_title['last_name'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "search.php":
      if(isset($_GET['search'])){

        $page_title = $_GET['search'];
      }else{
        $page_title = "No Search Result Found";
      }
      break;
    
     
  }

?>

<!DOCTYPE html>
<html lang="en">
<head class="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $page_title; ?></title>
    
 
  
  
    <link rel="stylesheet" href="css/style22.css">
    <script src="js2/script3.js" defer></script>

</head>
<body>
<!-- HEADER -->
<div id="header"style="position: fixed;
  top: 0;
  width: 100%;padding-top: 10px;overflow: hidden;
" >
    <!-- container -->
    <div class="container" >
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
              <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }//else{
                      //echo '<a href="index.php" id="logo"><img src="admin/images/'. $row['logo'] .'"></a>';
                    //}

                  }
                }
                ?>

                      <div class="container1">
  <h2 class="title">
    <span class="title-word title-word-1">Let's</span>
    <span class="title-word title-word-2">Become</span>
    <span class="title-word title-word-3">A Big</span>
    <span class="title-word title-word-4">Thinker</span>
  </h2>
</div>

        <div class="row">
            <div class="col-md-12">
              <?php
                include "config.php";

                if(isset($_GET['cid'])){
                  $cat_id = $_GET['cid'];
                }

                $sql = "SELECT * FROM category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
                if(mysqli_num_rows($result) > 0){
                  $active = "";
              ?>
              
               <div class="navbar">
     
          
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
                 <div class="navbar-links">

                <ul class='menu'>
                  <li><a href='index.php'>Home</a></li>
                  <?php while($row = mysqli_fetch_assoc($result)) {
                    if(isset($_GET['cid'])){
                      if($row['category_id'] == $cat_id){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                    }
                    echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                  } ?>
                </ul>
              </div>
              </div>
                <?php } ?>
            </div>
        </div>
  


            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->

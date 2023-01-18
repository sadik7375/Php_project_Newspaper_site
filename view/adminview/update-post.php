<?php include "header.php";

if($_SESSION["user_role"] == 0){
  include "config.php";
  $post_id = $_GET['id'];
  $sql2 = "SELECT author FROM post WHERE post_id = {$post_id}";
  $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");

  $row2 = mysqli_fetch_assoc($result2);

  if($row2['author'] != $_SESSION["user_id"]){
    header("../../view/admin/post.php");
  }

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
        <title>ADMIN Panel</title>
<link rel="stylesheet" href="css/style2.css">


<script type="text/javascript" src="js/admin.js"></script>  
    </head>
    <body>

  <div class="container">
  <div class="">
    
        <h1 class="admin-heading">Update Post</h1>
    </div>
 
      <?php
        include "config.php";

        $post_id = $_GET['id'];
        $sql = "SELECT post.post_id, post.title, post.description,post.post_img,
        category.category_name, post.category FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        WHERE post.post_id = {$post_id}";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>
       
        <form id="form" style="background-color: tomato;" action="../../controller/admincontroller/adminupdatepost.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="">
                <input type="hidden" name="post_id"  class="input" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div >
                <label >Title</label>
                <input type="text" name="post_title"  class="input" value="<?php echo $row['title']; ?>">
            </div>
            <div >
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="input"  required rows="5">
                    <?php echo $row['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="" name="category">
                  <option disabled id="input"  > Select Category</option>
                  <?php
                    include "config.php";
                    $sql1 = "SELECT * FROM category";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                      while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['category'] == $row1['category_id']){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }
                        echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                      }
                    }
                  ?>
                </select>
                <input class="input"  name="old_category" value="<?php echo $row['category']; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" class="input" name="new-image">
                <img  src="../../controller/admincontroller/upload/<?php echo $row['post_img']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['post_img']; ?>">
            </div>
            <input type="submit" name="submit"  value="Update" />
        </form>
        <!-- Form End -->
        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>

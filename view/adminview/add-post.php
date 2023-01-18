<?php include "header.php"; ?>

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
  <div id="admin-content">
      <div class="container">
         <di.8
             <div >
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="">
                  <!-- Form -->
                  <form id="form" action="../../controller/admincontroller/adminpostcontroller.php" method="POST" enctype="multipart/form-data" style=" background-color: green;  opacity: .8;  "      >
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="input" autocomplete="off" required>
                      </div>
                      <div class>
                          <label > Description</label>
                          <textarea name="postdesc" class="input" rows="5"  required></textarea>
                      </div>
                      <div class="">
                          <label >Category</label>
                          <select name="category" id="input">
                              <option disabled selected> Select Category</option>
                              <?php
                                include "config.php";
                                $sql = "SELECT * FROM category";

                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                  while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                  }
                                }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label >Post image</label>
                          <input type="file" name="fileToUpload" class="input" >
                      </div>
                      <input type="submit" id="button" name="submit"  value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
</body>
</html>
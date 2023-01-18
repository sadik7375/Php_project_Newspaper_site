 <?php
                  include "config.php";
                  if(isset($_GET['search'])){
                    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
                  ?>
                  <h2 class="page-heading">Search : <?php echo $search_term; ?></h2>
                  <?php

                    /* Calculate Offset Code */
                    $limit = 3;
                    if(isset($_GET['page'])){
                      $page = $_GET['page'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    category.category_name,user.username,post.category,post.post_img FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0)





 ?>                     
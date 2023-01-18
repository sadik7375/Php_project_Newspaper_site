<?php include 'header.php'; ?>
    <div id="main-content check ">
        <div class="container single">
          
              
               
                    <div class="post-container  single">
                      <?php
                        include "config.php";

                        $post_id = $_GET['id'];

                        $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                        category.category_name,user.username,post.category,post.post_img FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$post_id}";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information"><!--title author date design-->
                                <span>
                                    
                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    
                                    <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['username']; ?></a>
                                </span>
                                <span>
                                    <i ></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <div class="img">
                            <img class="single-feature-image" src="../../controller/admincontroller/upload/<?php echo $row['post_img']; ?>" alt=""/>
                        </div>
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                        </div>
                        <?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }

                        ?>
                    </div>
                   
                    <!-- /post-container -->
                </div>
                <div class="side">
                <?php include 'sidebar.php'; ?>
            </div>
            </div>
       
<?php include 'footer.php'; ?>

<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location:post.php");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="">
              <div class="">
                  <h1 class="admin">Modify User Details</h1>
              </div>
              <div >
                <?php
                include "config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <!-- Form Start -->
                  <form  action="../../controller/admincontroller/adminupdateusercontroller.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  value="<?php echo $row['user_id'];  ?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name"  value="<?php echo $row['first_name'];  ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];  ?>" required>
                      </div>
                      <div >
                          <label>User Name</label>
                          <input type="text" name="username"  value="<?php echo $row['username'];  ?>" placeholder="" required>
                      </div>
                      <div >
                          <label>User Role</label>
                          <select  name="role" value="<?php echo $row['role']; ?>">
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='0'>normal User</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>normal User</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit"  value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php
                }
              }
                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

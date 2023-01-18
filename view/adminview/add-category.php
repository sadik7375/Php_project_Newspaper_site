<?php include "header.php"; ?>
  <div id="admin-content">
      
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="">
                  <!-- Form Start -->
                  <form action="../../controller/admincontroller/adminaddcategory.php" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
               
              </div>
          </div>
 
  
<?php
   
  ?>

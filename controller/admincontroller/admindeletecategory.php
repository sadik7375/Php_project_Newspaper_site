<?php
include'config.php';
require_once ('../../model/adminmodel/admincategorymodel.php');
              $cat_id = $_GET["id"];
            $category_name =$_POST['cat_name'];
          $category_id =$_POST['cat_id'];
          
          $status= deletecategory($category_id,$category_name);

              if ($status){
                
                header("location: ../../view/adminview/category.php");
              }
              else{

                  echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
              }
          
          ?>
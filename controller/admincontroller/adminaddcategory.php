<?php
require_once ('../../model/adminmodel/admincategorymodel.php');
 include 'config.php';

 $category =$_POST['cat'];
$status=addcategory($category);
                       
       if ($status){
        header("location:../../view/adminview/category.php");
        }
        else{
                 echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
            }
        
                    
                    mysqli_close($conn);                 
                           

                           
?>
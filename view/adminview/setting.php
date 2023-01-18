<?php include "header.php"; ?>
  <form class="login-form"  method="POST" action="../../controller/admincontroller/passwordresetcontroller.php"     >
        <h3>update passowrd</h3>
         <input type="text" placeholder="check username" name="username" />
        <input type="password" placeholder="old password" name="oldpassword" />
      <input type="password" placeholder="new password"  name="newpassword">
      <input type="password" placeholder="RE-password" name="repassword" />
       <input type="submit" placeholder="submit" value="submit" name="submit" id="button" />
 
    </form>

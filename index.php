<?php
session_start();
  include_once 'header.php';
 ?>
 <?php
 if(isset($_SESSION['u_id'])){
   if($_SESSION['u_type']=='admin'){
     echo '<script> location.replace("admincal.php"); </script>';
     exit();
   }else {
     echo '<script> location.replace("calendar.php"); </script>';
     exit();
   }
 }else {
   echo '<form id="form1" action="container/login.cont.php" method="post">
         <input class="fields" type="text" name="uid" placeholder="Username/e-mail">
         <input class="fields" type="password" name="pwd" placeholder="password">
         <input class="LoginSu_button" type="submit" value="Login" name="submit">
       </form>
       <a href="signup.php">Sign up</a>';
 }

include_once 'footer.php';
?>

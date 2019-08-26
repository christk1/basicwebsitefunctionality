<?php
  include_once 'header.php';
 ?>
<form id="form2" action="container/signup.cont.php" method="post">
  <input class="fields" type="text" name="fname" placeholder="Firstname">
  <input class="fields" type="text" name="lname" placeholder="Lastname">
  <input class="fields" type="text" name="email" placeholder="E-mail">
  <input class="fields" type="text" name="uname" placeholder="Username">
  <input class="fields" type="password" name="pwd" placeholder="Password">
  <input class="LoginSu_button" type="submit" value="Sign up" name="submit">
</form>
<?php
include_once 'footer.php';
?>

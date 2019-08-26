<?php
if(isset($_POST['submit'])){
  session_start();
  session_unset();
  session_destroy();
  echo '<script> location.replace("../index.php"); </script>';
  exit();
}
 ?>

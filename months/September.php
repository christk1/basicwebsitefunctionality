<?php
include_once 'includes/dbh.inc.php';
session_start();
if (isset($_SESSION['u_id'])) {
?>

<div class="Header_title"><h1>Calendar 2019</h1></div>
<div class="Header_title"><h1>September</h1></div>

<div class="days">

<?php include 'listItemsFunc.php' ?>


</div>
<?php
}else {
  echo 'not logged in';
  session_destroy();
	unset($_SESSION['u_id']);
  echo '<script> location.replace("../index.php"); </script>';
  exit();
}
?>

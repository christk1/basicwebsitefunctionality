<?php
session_start();
include_once 'months/includes/dbh.inc.php';
    if (isset($_SESSION['u_id'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Language" content="el">
  <title>Callendar Admin</title>
  <link rel="stylesheet" type="text/css" href="calcss.css">
</head>
<body class="inside">
  <div id="profile_b" onclick="openprof()"></div>
  <div id="profile" class="sideprof">
    <a href="javascript:void(0)" class="closebtn" onclick="closeprof()">&times;</a>
    <?php
    echo "<div class='listitems1'>User id:#".$_SESSION['u_id']."</div>";
    echo "<div class='listitems1'>Username:<br>#".$_SESSION['u_uname']."</div>";
    echo "<div class='listitems1'>Email:<br>#".$_SESSION['u_email']."</div>";
    echo "<div class='listitems1'>Type:<br>#".$_SESSION['u_type']."</div>";
     ?>

  </div>
  <p id="admin_logo"><strong>Admin</strong></p>
<form action="container/logout.cont.php" method="post">
<input class="LoginSu_button" type="submit" value="Logout" name="submit">
</form>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php $sql="SELECT * FROM comments";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    if ($row['status']==1) {
    ?>
    <form action="months/includes/edit_comm.php" method="post">
    <?php echo "<div class='listitems'>Cid:#".$row['cid']."</div>"; ?>
    <?php echo "<div class='listitems'>User:<br>".$row['uid']."</div>"; ?>
    <?php echo "<div class='listitems'>Message:<br>".$row['message']."</div>"; ?>
    <input type="hidden" name="m_number" value="<?php echo $row['m_number'];?>">
    <input type="hidden" name="uid" value="<?php echo $row['uid'];?>">
    <input type="hidden" name="message" value="<?php echo $row['message'];?>">
    <input type="hidden" name="cid" value="<?php echo $row['cid'];?>">
    <input class="LoginSu_button" id="list_button" type="submit" name="submittext1" value="Delete">
    <input class="LoginSu_button" type="submit" name="submittext" value="Pass">
   </form>
    <br>
    <?php
  }} ?>
</div>
<button id="myBtn1" onclick="openNav()"></button>
<?php
$mon=date('m');
if ($mon==1) {
  include_once 'months/January.php';
}elseif ($mon==2) {
  include_once 'months/February.php';
}elseif ($mon==3) {
  include_once 'months/March.php';
}elseif ($mon==4) {
  include_once 'months/April.php';
}elseif ($mon==5) {
  include_once 'months/May.php';
}elseif ($mon==6) {
  include_once 'months/June.php';
}elseif ($mon==7) {
  include_once 'months/July.php';
}elseif ($mon==8) {
  include_once 'months/August.php';
}elseif ($mon==9) {
  include_once 'months/September.php';
}elseif ($mon==10) {
  include_once 'months/October.php';
}elseif ($mon==11) {
  include_once 'months/November.php';
}elseif ($mon==12) {
  include_once 'months/December.php';
}else {
  echo 'error';
}
?>
<div id="admin_tools">
<form id="admake" action="makeadmin.php" method="post">
  <p style="color:red;text-align:center;">admin maker</p>
<input id="admint" type="number" name="input" placeholder="id">
<input class="LoginSu_button" type="submit" value="Convert" name="submit">
</form>
<form id="delete_com" action="delete_com.php" method="post">
  <p style="color:red;text-align:center;">delete comment</p>
<input id="comint" type="number" name="input1" placeholder="Cid">
<input class="LoginSu_button" type="submit" value="Delete" name="submit">
</form>
</div>
<canvas id="canvas"></canvas>
<script type="text/javascript" src="caljs.js"></script>
</body>
<?php
}else {
  echo 'not logged in';
  session_destroy();
	unset($_SESSION['u_id']);
  echo '<script> location.replace("../index.php"); </script>';
  exit();
}
?>

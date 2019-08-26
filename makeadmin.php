<?php
session_start();
if (isset($_SESSION['u_id'])) {
    include_once 'container/dph.cont.php';
    $submit = mysqli_real_escape_string($conn, $_POST["input"]);
    $sql = "UPDATE users SET user_type='admin' WHERE user_id='$submit';";
    mysqli_query($conn,$sql);
    echo '<script> location.replace("admincal.php?write=success"); </script>';
    exit();
  }else {
    echo 'not logged in';
    session_destroy();
  	unset($_SESSION['u_id']);
    echo '<script> location.replace("../index.php"); </script>';
    exit();
  }

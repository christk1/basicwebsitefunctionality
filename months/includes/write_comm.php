<?php
    session_start();
    date_default_timezone_set('Europe/Athens');
    include_once 'dbh.inc.php';
    if(isset($_POST['submit1'])){
    $message = $_POST['message'];
    $uid=$_POST['uid'];
    $date = date('Y-m-d H:i:s');
    $status=$_POST['status'];
    $mnum=$_POST['m_number'];
    $sql = "INSERT INTO comments (uid,message,date,status,m_number) VALUES ('$uid','$message','$date','$status','$mnum');";
    mysqli_query($conn,$sql);
    if ($_SESSION['u_type']=='user') {
      echo '<script> location.replace("../../calendar.php?write=success"); </script>';
      exit();
    }else {
      echo '<script> location.replace("../../admincal.php?write=success"); </script>';
      exit();
    }
  }elseif (isset($_POST['submit2'])) {
    $message = $_POST['message'];
    $uid=$_POST['uid'];
    $date = date('Y-m-d H:i:s');
    $status=$_POST['status'];
    $mnum=$_POST['cid'];
    $sql = "INSERT INTO comments (uid,message,date,status,m_number) VALUES ('$uid','$message','$date','$status','$mnum');";
    mysqli_query($conn,$sql);
    if ($_SESSION['u_type']=='user') {
      echo '<script> location.replace("../../calendar.php?write=success"); </script>';
      exit();
    }else {
      echo '<script> location.replace("../../admincal.php?write=success"); </script>';
      exit();
    }
  }else {
    echo 'not logged in';
    session_destroy();
  	unset($_SESSION['u_id']);
    echo '<script> location.replace("../index.php"); </script>';
    exit();
  }

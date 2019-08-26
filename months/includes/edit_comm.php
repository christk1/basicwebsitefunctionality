<?php
    session_start();
    date_default_timezone_set('Europe/Athens');
    include_once 'dbh.inc.php';
    if(isset($_POST['submittext'])){
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');
    $uid=$_POST['uid'];
    $m_num=$_POST['m_number'];
    $cid=$_POST['cid'];

    $sql = "UPDATE comments SET message='$message', date='$date',uid='$uid' WHERE cid='$m_num';";
    mysqli_query($conn,$sql);
    $sql="DELETE FROM comments WHERE cid='$cid';";
    mysqli_query($conn,$sql);

    //Email!!!!!!!!!!!!!!!!!!!
    $sql = "SELECT user_email FROM users";
    $result=mysqli_query($conn,$sql);
    $addresses=array();
    while($row=mysqli_fetch_assoc($result)){
    $addresses[] = $row['user_email'];
    }
    $to = implode(", ", $addresses);
    $subject = 'Mail testing';
    $message12 = 'One comment has been edited.';
    $header='Calendar by Christos';
    mail($to, $subject, $message12, $header);
    //Email!!!!!!!!!!!!!!!!!!!
    echo '<script> location.replace("../../admincal.php?write=success"); </script>';
    exit();
  }elseif (isset($_POST['submittext1'])) {
    //Delete
    $cid=$_POST['cid'];
    $sql="DELETE FROM comments WHERE cid='$cid';";
    mysqli_query($conn,$sql);
    echo '<script> location.replace("../../admincal.php?delete=success"); </script>';
    exit();
  }else {
    echo 'not logged in';
    session_destroy();
  	unset($_SESSION['u_id']);
    echo '<script> location.replace("../index.php"); </script>';
    exit();
  }

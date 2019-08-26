<?php
session_start();
if (isset($_SESSION['u_id'])) {
    include_once 'container/dph.cont.php';
    $submit = mysqli_real_escape_string($conn, $_POST["input1"]);
    $sql = "DELETE FROM comments WHERE cid='$submit';";
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
    $message12 = 'One comment has been deleted';
    $header='Calendar by Christos';
    mail($to, $subject, $message12, $header);
    //Email!!!!!!!!!!!!!!!!!!!
    echo '<script> location.replace("admincal.php?delete=success"); </script>';
    exit();
  }else {
    echo 'not logged in';
    session_destroy();
  	unset($_SESSION['u_id']);
    echo '<script> location.replace("../index.php"); </script>';
    exit();
  }

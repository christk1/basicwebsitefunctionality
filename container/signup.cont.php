<?php
if (isset($_POST["submit"])){
    include_once 'dph.cont.php';
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $type='user';

    //error handlers
    //check empty fields
    if (empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($pwd)){
      echo '<script> location.replace("../signup.php?signup=empty"); </script>';
      exit();
    }else {
      //check if chars are valid
      if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname)){
        echo '<script> location.replace("../signup.php?signup=invalid"); </script>';
        exit();
      }else {
        //checking for email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo '<script> location.replace("../signup.php?signup=invemail"); </script>';
          exit();
        }else {
          $sql = "SELECT * FROM users WHERE user_uid='$uname'";
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0){
            echo '<script> location.replace("../signup.php?signup=usertaken"); </script>';
            exit();

          }else {
            //hash password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //insert user in database
            $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd,user_type) VALUES ('$fname','$lname','$email','$uname','$hashedPwd','$type');";
            mysqli_query($conn,$sql);
            echo '<script> location.replace("../index.php?signup=success"); </script>';
            exit();
          }
        }
      }
    }
}else {
  echo '<script> location.replace("../signup.php"); </script>';
  exit();
}
 ?>

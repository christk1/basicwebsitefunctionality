<?php
session_start();
if (isset($_POST['submit'])){
    include_once 'dph.cont.php';
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

    //error handle
    if(empty($uid) || empty($pwd)){
        echo '<script> location.replace("../index.php?login=empty"); </script>';
        exit();
    } else {
        $sql="SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            echo '<script> location.replace("../index.php?login=error"); </script>';
            exit();
        } else {
            if($row=mysqli_fetch_assoc($result)){
                //de-hashing pass
                $hashedPwdCheck=password_verify($pwd,$row['user_pwd']);
                if($hashedPwdCheck==false){
                    echo '<script> location.replace("../index.php?login=error"); </script>';
                    exit();
                } elseif ($hashedPwdCheck==true) {
                    //login the user
                    $_SESSION['u_id']=$row['user_id'];
                    $_SESSION['u_name']=$row['user_first'];
                    $_SESSION['u_last']=$row['user_last'];
                    $_SESSION['u_email']=$row['user_email'];
                    $_SESSION['u_uname']=$row['user_uid'];
                    $_SESSION['u_type']=$row['user_type'];
                    echo '<script> location.replace("../index.php?login=success"); </script>';
                    exit();

                }
            }

        }
    }


} else {
    echo '<script> location.replace("../index.php?login=error"); </script>';
    exit();
}
?>

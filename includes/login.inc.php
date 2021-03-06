<?php

if (isset($_POST['login-submit'])) {
    
    require 'password_compat-master\lib\password.php';
    require '../connect.php';
      
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    
    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
            exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username=? OR emailaddress=?;";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['User_ID'];
                    $_SESSION['userUid'] = $row['username'];

                    if ($row['username'] == 'Graeme') {
                        header("Location: ../account.php?login=success");
                        exit();
                    }else {
                        header("Location: ../index.php?login=success");
                        exit();
                    }
    
                    
                }
                else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
    
        }
    }
    
}
else {
    header("Location: ../index.php");
    exit();
}
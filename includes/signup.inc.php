<?php 
if (isset($_POST['signup-submit'])) {

  require 'password_compat-master\lib\password.php';
  require '../connect.php';
  
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
          header("Location: ../index.php?error=invalidmailuid");
          exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../index.php?error=invalidmail&uid=".$username);
          exit();   
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
          header("Location: ../index.php?error=invaliduid&mail=".$email);
          exit();   
  }
  else if ($password !== $passwordRepeat) {
          header("Location: ../index.php?error=passwordcheck&uid=".$username."&mail=".$email);
          exit();
  }
  else {
          
            $sql = "SELECT username FROM users WHERE username=?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
            }
            else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                            header("Location: ../index.php?error=usertaken&mail=".$email);
                            exit(); 
                    }
                    else {
                    
                            $sql = "INSERT INTO users (username, emailaddress, password) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($con);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../index.php?error=sqlerror");
                                    exit();
                            }
                            else {
                                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                    
                                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../index.php?signup=success");
                                    exit();
                            }
                    
                    }
            }
          
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);

} elseif (isset($_POST['update-submit'])) {

        require 'password_compat-master\lib\password.php';
        require '../connect.php';
  

        $userID = $_POST['userID'];
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];

       /* if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../account.php?error=invalidmailuid");
                exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../account.php?error=invalidmail&uid=".$username);
                exit();   
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../account.php?error=invaliduid&mail=".$email);
                exit();   
        }
        else if ($password !== $passwordRepeat) {
                header("Location: ../account.php?error=passwordcheck&uid=".$username."&mail=".$email);
                exit();
        }*/

        if (empty($username) && empty($email) && empty($password)) {
                header("Location: ../account.php?error=emptyfields");
                exit();
        } else if (empty($username) && empty($email)) {

                $sql = "UPDATE `users` SET `password`=? WHERE `User_ID` = $userID";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                
                        mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../account.php?update=success");
                        exit();
                }
        }

        else if (empty($username)) {

                $sql = "UPDATE `users` SET `emailaddress`=?, `password`=? WHERE `User_ID` = $userID";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                
                        mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../account.php?update=success");
                        exit();
                }


                    
        } else if (empty($email)) {

                $sql = "SELECT username FROM users WHERE username=?";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                                header("Location: ../account.php?errors=usertaken&mail=");
                                exit(); 
                        }
                        else {

                                $sql = "UPDATE `users` SET `username`=?, `password`=? WHERE `User_ID` = $userID ";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../account.php?errors=sqlerror");
                                                exit();
                                }
                                else {
                                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                
                                        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../account.php?update=success");
                                        exit();
                                }
                        }
                }
                    
        } else if (empty($password)) {

                $sql = "SELECT username FROM users WHERE username=?";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                                header("Location: ../account.php?errors=usertaken&mail=");
                                exit(); 
                        }
                        else {

                                $sql = "UPDATE `users` SET `emailaddress`=?, `username`=? WHERE `User_ID` = $userID ";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../account.php?errors=sqlerror");
                                                exit();
                                }
                                else {          
                                        mysqli_stmt_bind_param($stmt, "ss", $email, $username);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../account.php?update=success");
                                        exit();
                                }

                        }
                }

                    
        } else if (empty($username) && empty($password)) {

                $sql = "UPDATE `users` SET `emailaddress`=? WHERE `User_ID` = $userID";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                                                
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../account.php?update=success");
                        exit();
                }
        
        } else if (empty($email) && empty($password)) {

                $sql = "SELECT username FROM users WHERE username=?";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                                header("Location: ../account.php?errors=usertaken&mail=");
                                exit(); 
                        }
                        else {

                                $sql = "UPDATE `users` SET `username`=? WHERE `User_ID` = $userID";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../account.php?errors=sqlerror");
                                        exit();
                                }
                                else {
                                        
                                        mysqli_stmt_bind_param($stmt, "s", $username);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../account.php?update=success");
                                        exit();
                                }
                        }
                }
        
        } else if (empty($username) && empty($email)) {

                
                $sql = "UPDATE `users` SET `password`=? WHERE `User_ID` = $userID";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                
                        mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../account.php?update=success");
                        exit();
                }

                
        
        } else {
                $sql = "SELECT username FROM users WHERE username=?";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../account.php?errors=sqlerror");
                        exit();
                }
                else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                                header("Location: ../account.php?errors=usertaken&mail=");
                                exit(); 
                        }
                        else {

                                $sql = "UPDATE `users` SET `username`=?, `emailaddress`=?, `password`=? WHERE `User_ID` = $userID";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../account.php?errors=sqlerror");
                                        exit();
                                }
                                else {
                                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../account.php?update=success");
                                        exit();
                                }
                        }
                }

        }
} else if (isset($_POST['add-submit'])) {

        require 'password_compat-master\lib\password.php';
        require '../connect.php';
        
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];

                
                  $sql = "SELECT username FROM users WHERE username=?";
                  $stmt = mysqli_stmt_init($con);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                          header("Location: ../account.php?error=sqlerror");
                          exit();
                  }
                  else {
                          mysqli_stmt_bind_param($stmt, "s", $username);
                          mysqli_stmt_execute($stmt);
                          mysqli_stmt_store_result($stmt);
                          $resultCheck = mysqli_stmt_num_rows($stmt);
                          if ($resultCheck > 0) {
                                  header("Location: ../account.php?error=usertaken&mail=".$email);
                                  exit(); 
                          }
                          else {
                          
                                  $sql = "INSERT INTO users (username, emailaddress, password) VALUES (?, ?, ?)";
                                  $stmt = mysqli_stmt_init($con);
                                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                                          header("Location: ../account.php?error=sqlerror");
                                          exit();
                                  }
                                  else {
                                          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                          
                                          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                                          mysqli_stmt_execute($stmt);
                                          header("Location: ../account.php?add=success");
                                          exit();
                                  }
                          
                          }
                  }
                
} 
else if (isset($_POST['delete-submit'])) {

        require '../connect.php';

        $userID = $_POST['userID'];

        $sql = "DELETE FROM `users` WHERE `users`.`User_ID` = $userID";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account.php?error=sqlerror");
                exit();
        }
        else {
                mysqli_stmt_execute($stmt);
                header("Location: ../account.php?delete=success");
                exit();
        }

}
      




else {
        header("Location: ../index.php");
        exit();
} 
        
        
        
        
        
        

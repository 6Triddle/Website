<?php 
  session_start();
?>
<header>
  <div class="navbar">
    <ul class="left-side-nav">
      <li>
        <a href="index.php">Home</a>
      </li>
      <!-- Dropdown 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Links
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>-->
      <?php 
        if (isset($_SESSION['userId'])) {
          echo '<li>
                  <a href="music.php">Music</a>
                </li>';
        }
      ?>
      <li>
        <a href="contact.html">Contact</a>
      </li>
      </ul>
      <ul class="right-side-nav">
        <li>
        <p><?php echo $output[$_SESSION['userUid']]; ?></p>
          <?php
            if (isset($_SESSION['userId'])) {
              echo '<div class="dropdown">
              <img class="circle-img" src="images/account-icon.png">
              <button onclick="myFunction()" class="dropbtn"><?php echo $output["userUid"]; ?></button>
              <div id="myDropdown" class="dropdown-content">
                <a href="#home">Account</a>
                <form action="includes/logout.inc.php" method="post">
                  <button style="cursor: pointer;" type="submit" name="logout-submit">LOGOUT</button>
                </form>
              </div>
            </div>';
            }
            else {
              echo '<li>
              <!-- Button to Open the Modal -->
              <button class="login-button" style="cursor: pointer;" data-toggle="modal" data-target="#signIn">
                LOG IN
              </button>
            </li>
            <li>
              <!-- Button to Open the Modal -->
              <button class="register-button" style="cursor: pointer;" data-toggle="modal" data-target="#register">
                SIGN UP
              </button>
            </li>';
            }
          ?>
        </li>
        <script type="text/javascript" src="dropdown.js"></script>
      <?php
        if (isset($_GET['signup'])) {
          if ($_GET['signup'] == "success") {
            echo '<p class="signup-success">Signup successful.</p>';
          }
        }
        else if (isset($_GET['login'])) {
          if ($_GET['login'] == "success") {
            echo '<p class="signup-success">Login successful.</p>';
          }
        }
      ?>
    </ul>
  </div>  
</header>
      <!-- The Modal -->
      <div class="modal fade" id="signIn">
        <div class="modal-dialog">
          <div class="modal-content">



     

            <!-- Modal body -->
            <div class="modal-body">
              <h4 class="modal-title">Log In</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form action="includes/login.inc.php" method="post">

                <!-- Email Field -->

                <div class="row">
                    <input type="text" id="mailuid" name="mailuid" placeholder="Username or Email address" required>
                </div>
                
                <br>

                <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "nouser") {
                      echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#signIn').modal('show');
                        });
                      </script>
                      <style>
                        #mailuid {
                        border:red solid 1px;
                        }
                        #mailuid:required:focus {
                          border: 1px solid rgba(0, 0, 0, 0.3);
                          outline: none;
                        }
                      </style>";

                      echo "<p class='signup-error'>Invalid username or email address. Please try again.</p>";
                    }
                  }
                ?>

                <!-- Password Field -->

                <div class="row">
                    <input type="password" id="login-password" name="pwd" placeholder="Password" required>
                </div>
                
                <br> 
                
                <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongpwd") {
                      echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#signIn').modal('show');
                        });
                      </script>
                      <style>
                        #login-password {
                        border:red solid 1px;
                        }
                        #login-password:required:focus {
                          border: 1px solid rgba(0, 0, 0, 0.3);
                          outline: none;
                        }
                      </style>";

                      echo "<p class='signup-error'>Incorrect password. Please try again. <!--<br> If you forgot your password click here--></p>";
                    }
                  }
                ?>
                
                <div class="row">
                  <input type="checkbox" id="defaultCheck" name="example2">
                  <label for="defaultCheck">Keep me signed in</label>     
                </div>
              </div>  
              

              <!-- Submit Button -->
                
              <div class="modal-footer">
                <!-- Button to Open the Modal -->
                <p>Not a member?</p><button type="button" style="text-decoration: underline;color: #111"class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#register">
                  Join us
                  </button>
                <button type="submit" class="btn btn-success" name="login-submit">Log In</button>
              </form>
              </div>

          </div>
        </div>
      </div>
      
      <!-- The Modal -->
      <div class="modal fade" id="register">
        <div class="modal-dialog">
          <div class="modal-content">





      <!-- Modal body -->
      <div class="modal-body">
          <h4 class="modal-title">Register</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form action="includes/signup.inc.php" method="post">

                
                <!-- Username Field -->

                <div class="row">
                    <input type="text" id="username" name="uid" placeholder="Username" required>
                </div>
                
                <br>

                <?php
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "invaliduid") {
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#register').modal('show');
                    });
                    </script>
                    <style>
                    #username {
                      border:red solid 1px;
                    }
                    #username:required:focus {
                      border: 1px solid rgba(0, 0, 0, 0.3);
                      outline: none;
                    }
                    </style>";

                    echo '<p class="signup-error">Please enter a valid username.</p>';
                  }
                  else if ($_GET['error'] == "invalidmailuid") {
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#register').modal('show');
                    });
                    </script>
                    <style>
                    #username {
                      border:red solid 1px;
                    }
                    #username:required:focus {
                      border: 1px solid rgba(0, 0, 0, 0.3);
                      outline: none;
                    }
                    </style>";

                    echo '<p class="signup-error">Please enter a valid username.</p>';
                  }
                  else if ($_GET['error'] == "usertaken") {
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#register').modal('show');
                    });
                    </script>
                    <style>
                    #username {
                      border:red solid 1px;
                    }
                    #username:required:focus {
                      border: 1px solid rgba(0, 0, 0, 0.3);
                      outline: none;
                    }
                    </style>";

                    echo '<p class="signup-error">Username is already taken.</p>';
                  }
                }
              ?>

                <!-- Email Field -->

                <div class="row">
                    <input type="text" id="email" name="mail" placeholder="Email address"required>
                </div>

                <br>

                <?php
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "invalidmail") {
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#register').modal('show');
                    });
                    </script>
                    <style>
                    #email {
                      border:red solid 1px;
                    }
                    #email:required:focus {
                      border: 1px solid rgba(0, 0, 0, 0.3);
                      outline: none;
                    }
                    </style>";

                    echo '<p class="signup-error">Please enter a valid email address.</p>';
                  }
                  else if ($_GET['error'] == "invalidmailuid") {
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#register').modal('show');
                    });
                    </script>
                    <style>
                    #email {
                      border:red solid 1px;
                    }
                    #email:required:focus {
                      border: 1px solid rgba(0, 0, 0, 0.3);
                      outline: none;
                    }
                    </style>";

                    echo '<p class="signup-error">Please enter a valid email address.</p>';
                  }
                }
              ?>

                <!-- Password Field -->

                <div class="row">
                    <input type="password" id="password" name="pwd" placeholder="Password"required>
                </div>
                
                <br>

                <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "passwordcheck") {
                      echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#register').modal('show');
                        });
                      </script>
                      <style>
                        #password {
                        border:red solid 1px;
                        }
                        #password:required:focus {
                          border: 1px solid rgba(0, 0, 0, 0.3);
                          outline: none;
                        }
                      </style>";
                    }
                  }
                ?>
                
                <!-- Confirm Password Field -->

                <div class="row">
                    <input type="password" id="confirmpassword" name="pwd-repeat" placeholder="Confirm Password"required>
                </div>

                <br>

                <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "passwordcheck") {
                      echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#register').modal('show');
                        });
                      </script>
                      <style>
                        #confirmpassword {
                        border:red solid 1px;
                        }
                        #confirmpassword:required:focus {
                          border: 1px solid rgba(0, 0, 0, 0.3);
                          outline: none;
                        }
                      </style>";

                      echo "<p class='signup-error'>Those passwords didn't match. Please try again.</p>";
                    }
                  }
                ?>

            
              </div>  
              

              <!-- Submit Button -->
                
              <div class="modal-footer">
                <!-- Button to Open the Modal -->  
                <p>Already a member?</p><button type="button" style="text-decoration: underline;color: #111" class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#signIn">
                  Log in
                </button>
                <button type="submit" class="btn btn-success" name="signup-submit">Register</button>
              </form>
              </div>

          </div>
        </div>
      </div>
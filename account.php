<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Website</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
        <!-- import the webpage's stylesheet -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="darktheme.css"/>
        
        <!-- import the webpage's javascript file -->
        <script src="/script.js" defer></script>
    
    </head>  
    <body>
        <script src="theme.js"></script>
        <?php
            if (isset($_GET['add'])) {
            if ($_GET['add'] == "success") {
                echo '<div class="signup-success"><p>User added successfully</p></div>';
            }
            }
            else if (isset($_GET['update'])) {
            if ($_GET['update'] == "success") {
                echo '<div class="signup-success"><p>User updated successfully</p></div>';
            }
            } else if (isset($_GET['delete'])) {
                if ($_GET['delete'] == "success") {
                    echo '<div class="signup-success"><p>User deleted successfully</p></div>';
                }
                }
            else if (isset($_GET['login'])) {
                if ($_GET['login'] == "success") {
                    echo '<div class="signup-success"><p>Login successful</p></div>';
                }
            }
        ?>

        <?php 
        require("header.php");
        require("connect.php");
        ?>

        <main>

            <div class="account-wrapper">

                <button class="add-button" data-toggle="modal" data-target="#addUser">Add</button>

                 <!-- The Modal -->
      <div style="color: #111"class="modal fade" id="addUser">
        <div class="modal-dialog">
          <div class="modal-content">





      <!-- Modal body -->
      <div class="modal-body">
          <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form action="includes/signup.inc.php" method="post">

                
                <!-- Username Field -->

                <div class="row">
                    <input type="text" id="username" name="uid" placeholder="Username" required>
                </div>
                
                <br>


                <!-- Email Field -->

                <div class="row">
                    <input type="text" id="email" name="mail" placeholder="Email address"required>
                </div>

                <br>

                
                <!-- Password Field -->

                <div class="row">
                    <input type="password" id="password" name="pwd" placeholder="Password"required>
                </div>
                
                <br>
            
              </div>  
              

              <!-- Submit Button -->
                
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="add-submit">Add</button>
              </form>
              </div>

          </div>
        </div>
      </div>

                <section class="grid-container-users">
                    <div class="item1">
                        User ID
                    </div>
                    <div class="item2">
                        Username
                    </div>
                    <div class="item3">
                        Email Address
                    </div>
                </section>

                <?php        
                $query = ("SELECT u.User_ID, u.username, u.emailaddress
                FROM users as u
                WHERE u.username != 'Graeme'
                ORDER BY u.User_ID");
                $result = mysqli_query($con,$query);
                    
                while($output = mysqli_fetch_array($result))
                {
                ?>
                
                <section class="grid-container-users">
                <div class="item1">
                    <?php echo $output['User_ID']; ?>
                </div>
                <div class="item2">
                    <?php echo $output['username']; ?>
                </div>
                <div class="item3">
                    <?php echo $output['emailaddress']; ?>
                </div>
                <div class="item4">
                    <button class="register-button" data-toggle="modal" data-target="#editUser<?php echo $output['User_ID'];?>">Edit</button>            
                    <!-- The Modal -->
                    <div class="modal fade" id="editUser<?php echo $output['User_ID'];?>">
                        <div class="modal-dialog">
                        <div class="modal-content">



                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4 style="color: #111;" class="modal-title">Edit User #<?php echo $output['User_ID'];?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <form action="includes/signup.inc.php" method="post">

                                <input type="hidden" name="userID" id ="userID" value="<?php echo $output['User_ID']; ?>">
                                
                                <!-- Username Field -->

                                <div class="row">
                                    <input type="text" id="username" name="uid" placeholder="Username">
                                </div>

                                <br>

                                <!-- Email Field -->

                                <div class="row">
                                    <input type="text" id="email" name="mail" placeholder="Email address">
                                </div>

                                <br>

                                <!-- Password Field -->

                                <div class="row">
                                    <input type="password" id="password" name="pwd" placeholder="Password">
                                </div>
                                
                                <br>


                            
                            </div>  
                            

                            <!-- Submit Button -->
                                
                            <div class="modal-footer">
                                <!-- Button to Open the Modal -->  
                                <button type="submit" class="btn btn-success" name="update-submit">Update</button>
                            </form>
                            </div>

                        </div>
                            </div>
                            </div>
                </div>
                <div class="item5">
                    <form action="includes/signup.inc.php" method="post">
                    <input type="hidden" name="userID" id ="userID" value="<?php echo $output['User_ID']; ?>">
                    <button type="submit" class="register-button" style="cursor: pointer;" name="delete-submit">
                    Delete
                    </button>
                    </form>
                </div>
                </section>

                <?php
                }
                ?>
                
            </div>
            













            <!--
                <div class="account-links">

                    <ul>
                        <li>
                            <a onclick="toggle_visibility('Add_User');">Add Users</a>
                        </li>
                        <li>
                            <a onclick="toggle_visibility('Update_User');">Update Users</a>
                        </li>
                        <li>
                            <a onclick="toggle_visibility('Delete_User');">Delete Users</a>
                        </li>
                    </ul>

                </div>
                <div class="account-content">
                    <div class="adduser" id="Add_User" style="display:none;">
                    Add
                    
                    </div>
                    <div class="updateuser" id="Update_User" style="display:none;">
                    Update
                    </div>
                    <div class="deleteuser" id="Delete_User" style="display:none;">
                    Delete
                    </div>
                </div>
            -->


            </div>
<!--
            <script type="text/javascript">

                function toggle_visibility(id) {
                var e = document.getElementById(id);
                if(e.style.display == 'block')
                    e.style.display = 'none';
                else
                    e.style.display = 'block';
                }
            //
            </script>
            -->
        </main>
    </body> 
</html>

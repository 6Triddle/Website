<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Graeme's Music</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Importing Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

        <!-- Importing Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <!-- Importing Javascript files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        
        <!-- Importing stylesheets -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/darktheme.css"/>
    
    
    
    </head>    
    <body>
        <script src="js/theme.js"></script>
        <?php
            // Add User Success Message
            if (isset($_GET['add'])) {
            if ($_GET['add'] == "success") {
                echo '<div class="signup-success"><p>User added successfully</p></div>';
            }
            }
            // Update User Success Message
            else if (isset($_GET['update'])) {
            if ($_GET['update'] == "success") {
                echo '<div class="signup-success"><p>User updated successfully</p></div>';
            }
            }
            // Delete User Success Message
            else if (isset($_GET['delete'])) {
                if ($_GET['delete'] == "success") {
                    echo '<div class="signup-success"><p>User deleted successfully</p></div>';
                }
                }
            // Message for when Admin Login Successful
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
                <!-- Add User Button -->
                <button class="add-button" data-toggle="modal" data-target="#addUser">Add</button>

                <!-- Add User Modal -->
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
                <!-- Titles for each of the User Info Grid -->
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
                // User Info Query       
                $query = ("SELECT u.User_ID, u.username, u.emailaddress
                FROM users as u
                WHERE u.username != 'Graeme'
                ORDER BY u.User_ID");
                $result = mysqli_query($con,$query);
                    
                while($output = mysqli_fetch_array($result))
                {
                ?>
                <!-- Grid system for each user -->
                <section class="grid-container-users">
                <div class="item1">
                    <!-- User ID -->
                    <?php echo $output['User_ID']; ?>
                </div>
                <div class="item2">
                    <!-- User's Username -->
                    <?php echo $output['username']; ?>
                </div>
                <div class="item3">
                    <!-- User's Email-Address -->
                    <?php echo $output['emailaddress']; ?>
                </div>
                <div class="item4">
                    <!-- Edit User Button -->
                    <button class="register-button" data-toggle="modal" data-target="#editUser<?php echo $output['User_ID'];?>">Edit</button>            
                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUser<?php echo $output['User_ID'];?>">
                        <div class="modal-dialog">
                        <div class="modal-content">



                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4 class="modal-title">Edit User #<?php echo $output['User_ID'];?></h4>
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
                    <!-- Delete User Button -->
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
            

            </div>

        </main>
    </body> 
</html>

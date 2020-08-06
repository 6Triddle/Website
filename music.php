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
    
    <!-- import the webpage's javascript file -->
    <script src="/script.js" defer></script>
  </head>  
  <body>
    <?php 
    require("header.php");
    ?>
    <main>
      <!-- The Modal -->
      <div class="modal fade" id="signIn">
        <div class="modal-dialog">
          <div class="modal-content">



     

            <!-- Modal body -->
            <div class="modal-body">
              <h4 class="modal-title">Log In</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form action="" method="post">

                <!-- Email Field -->

                <div class="row">
                    <input type="text" id="email" name="emailaddress" placeholder="Email address">
                </div>
                
                <br>

                <!-- Password Field -->

                <div class="row">
                    <input type="password" id="password" name="passcode" placeholder="Password">
                </div>
                
                <br>                
                
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
              <form action="" method="post">
                
                <!-- Username Field -->

                <div class="row">
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
                
                <br>

                <!-- Email Field -->

                <div class="row">
                    <input type="text" id="email" name="emailaddress" placeholder="Email address">
                </div>
                
                <br>

                <!-- Password Field -->

                <div class="row">
                    <input type="password" id="password" name="passcode" placeholder="Password">
                </div>
                
                <br>
                
                <!-- Confirm Password Field -->

                <div class="row">
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                </div>

              </form>
              </div>  
              

              <!-- Submit Button -->
                
              <div class="modal-footer">
                <!-- Button to Open the Modal -->  
                <p>Already a member?</p><button type="button" style="text-decoration: underline;color: #111" class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#signIn">
                  Log in
                </button>
                <button type="button" class="btn btn-success" name="signup-submit">Register</button>
              </div>

          </div>
        </div>
      </div>
      
      
      <?php
        require_once("connect.php"); 
      ?>

      <div class="wrapper">

        <h1>Music Library</h1>

        <img src="images/Music.png" width="150px" height="150px">

      <?php        
        $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist ORDER BY am.ID DESC separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Size, p.Path, m.Filename
        FROM main as m
        JOIN artist_to_main as am ON m.ID = am.ID
        JOIN artist as ar on ar.Artist_PK = am.Artist_PK
        JOIN genre_to_main as gm ON m.ID = gm.ID
        JOIN genre as g on g.Genre_PK = gm.Genre_PK
        LEFT JOIN album as al ON m.FK_Album = al.Album_PK
        LEFT JOIN path as p on m.FK_Path = p.Path_PK
        GROUP BY m.ID");
        $query2 = ("SELECT SEC_TO_TIME( SUM( m.Duration ) ) AS `Total Duration`
        FROM main AS m");
        $result = mysqli_query($con,$query);
            
        while($output = mysqli_fetch_array($result))
        {
        ?>
        
        
        <section class="grid-container">
          <div class="item1">
          <!--
          <script type="text/javascript" src="jquery-1.7.1.js"></script>
          <script type="text/javascript">
            $(document).ready( function() {
            $('#<?php echo $output['Filename']; ?>').click(function(){
              $('#wrap').append('<embed id="embed_player" src="<?php echo $output['Path']; ?><?php echo $output['Filename']; ?>" autostart="true" hidden="true"></embed>');
            });
            });
          </script>
          <img name="<?php echo $output['Filename']; ?>" src="images/Play Button.png" width="50" height="50" border="0" id="<?php echo $output['Filename']; ?>" alt="" />
          <div id="wrap">&nbsp;</div>
          -->
          <audio id="<?php echo $output['Filename']; ?>" src="<?php echo $output['Path']; ?><?php echo $output['Filename']; ?>" preload="auto"></audio>
          <button onclick="document.getElementById('<?php echo $output['Filename']; ?>').play();"><img src="images/Play.jpg" height=40></button>
          </div>
          <div class="item2">
            <p><?php echo $output['Title']; ?></p>
          </div>
          <div class="item3">
            <p><?php echo $output['Album']; ?></p>
          </div>
          <div class="item4">
            <a href="#"><?php echo $output['Artist']; ?></a>
          </div>
          <div class="item5">
            <p><?php echo $output['Genre']; ?></p>
          </div>
          <div class="item6">
            <p><?php echo $output['Duration']; ?></p>
          </div>
        </section>

        <?php
        }
        $query = ("SELECT SEC_TO_TIME( SUM( m.Duration ) ) AS `Total Duration`
        FROM main AS m");
        $result = mysqli_query($con,$query);
            
        while($output = mysqli_fetch_array($result))
        {
      ?>
        <h1><?php echo $output['Total Duration']; ?></h1>
      <?php
        }
      ?>
        
      </div>
  
    </main>
    <?php 
    require("footer.php");
    ?>

  
  </body>
</html>

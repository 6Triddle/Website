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
  <body id="main-page">
    <?php
      // Message for when user Sign Up Successful
      if (isset($_GET['signup'])) {
        if ($_GET['signup'] == "success") {
          echo '<div class="signup-success"><p>Signup successful</p></div>';
        }
      }
      // Message for when user Login Successful
      else if (isset($_GET['login'])) {
        if ($_GET['login'] == "success") {
          echo '<div class="signup-success"><p>Login successful</p></div>';
        }
      }
    ?>
    <?php 
      require("header.php");
    ?>
    <main>
      
      <!-- Banner -->
      <div class="banner">

        <img src="images/Banner.jpg" alt="Graeme's Music">
        <div class="carousel-caption">
          <h1>GRAEME'S MUSIC</h1>
        </div>

      </div>

      <?php
        require_once("connect.php"); 
      ?>

      <div class="wrapper-main">

        <section class="grid-container-main">

        <?php
          // Album Cover Image Query         
          $query = ("SELECT als.Image
          FROM main as m
          LEFT JOIN album_showcase as als on m.FK_Image = als.Image_PK
          WHERE als.Image != 'NULL'");

          $result = mysqli_query($con,$query);
              
          while($output = mysqli_fetch_array($result))
          {
        ?>
          <!-- Album Cover Div for each Image -->
          <div class="album">
            <img src="<?php echo $output['Image']; ?>" alt="<?php echo $output['Title']; ?>">
          </div>

        <?php 
          }
        ?>
        </section>
        <footer>
        <?php 
        require("footer.php");
        ?>
      </div>

  
    </main>


  </body>
</html>

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
      
      <div id="demo" class="carousel slide" data-ride="carousel">


        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first" src="https://cdn.glitch.com/b605d689-d5fa-4070-b2f8-e6f277d6eeb5%2Fturntable-1109588.jpg?v=1590540745660" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
              <h1></h1>
              <p></p>
            </div>
          </div>
        </div>

      </div>
      <!--
      <div class="slider">
        <div class="slide slide1"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
        <div class="slide slide2"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
        <div class="slide slide3"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
      </div><a class="arrow-left" href="javascript:void(0);"></a><a class="arrow-right" href="javascript:void(0);"></a>
	    <div class="dots-wrapper"></div>
      -->
      <?php
        require_once("connect.php"); 
      ?>
      <div class="wrapper-main">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<p class="login-status">You are logged in!</p>';
          }
          else {
            echo '<p class="login-status">You are logged out!</p>';
          }
        ?>
        <section class="grid-container-main">

        <?php        
          $query = ("SELECT als.Image
          FROM main as m
          LEFT JOIN album_showcase as als on m.FK_Image = als.Image_PK
          WHERE als.Image != 'NULL'");

          $result = mysqli_query($con,$query);
              
          while($output = mysqli_fetch_array($result))
          {
        ?>

          <div class="album">
            <img src="<?php echo $output['Image']; ?>"/>
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

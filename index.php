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
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- import the webpage's javascript file -->
    <script src="js/script.js" defer></script>
  </head>  
  <body id="main-page">
    <?php
        if (isset($_GET['signup'])) {
          if ($_GET['signup'] == "success") {
            echo '<div class="signup-success"><p>Signup successful</p></div>';
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
    ?>
    <main>
      
      <div id="demo" class="carousel slide" data-ride="carousel">


        <!-- Banner Image Bootstrap Scales for different screen sizes -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first" src="images/Banner.jpg" alt="Graeme's Music">
            <div class="carousel-caption">
              <h1>GRAEME'S MUSIC</h1>
            </div>
          </div>
        </div>

      </div>

      <?php
        require_once("connect.php"); 
      ?>
      <div class="wrapper-main">
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
            <img src="<?php echo $output['Image']; ?>" alt="<?php echo $output['Image']; ?>">
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

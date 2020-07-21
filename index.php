<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Website</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
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
      
      
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://cdn.glitch.com/b605d689-d5fa-4070-b2f8-e6f277d6eeb5%2Fturntable-1109588.jpg?v=1590540745660" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Website</h1>
              <p>This is a website</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://cdn.glitch.com/b605d689-d5fa-4070-b2f8-e6f277d6eeb5%2Faudience-1850119.jpg?v=1590452069810" alt="Chicago" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Website</h1>
              <p>This is a website</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://cdn.glitch.com/b605d689-d5fa-4070-b2f8-e6f277d6eeb5%2Faudience-1835431.jpg?v=1590542217107" alt="New York" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Website</h1>
              <p>This is a website</p>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
      <!--
      <div class="slider">
        <div class="slide slide1"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
        <div class="slide slide2"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
        <div class="slide slide3"><section class="index-banner"><div class="vertical-center"><h2>Website</h2><h1>This is my website</h1></div></section></div>
      </div><a class="arrow-left" href="javascript:void(0);"></a><a class="arrow-right" href="javascript:void(0);"></a>
	    <div class="dots-wrapper"></div>
      -->
      <div class="wrapper">
        
        <section class="index-first-text">
          <h1>This website is about...</h1>
        </section>
        
        <section class="index-links">
          <a href="photos.html">
            <div class="index-boxlink-rectangle">
              <h3>Images</h3>
            </div>
          </a>
        </section>
      </div>
    </main>
    <?php 
    require("footer.php");
    ?>
  
  </body>
</html>

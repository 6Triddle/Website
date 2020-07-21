<header>
      <nav class="navbar navbar-expand-md navbar-dark">
        <a href="index.php" class="header-brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
             <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Links
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item">
              <!-- Button to Open the Modal -->
              <button style="color: white" type="button" class="btn btn" data-toggle="modal" data-target="#signIn">
                Log In
              </button>
            </li>
            <li class="nav-item">
              <!-- Button to Open the Modal -->
              <button style="color: white" type="button" class="btn btn" data-toggle="modal" data-target="#register">
                Register
              </button>
            </li>
            <li class="nav-item">
              <form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
              </form>
            </li>
          </ul>
        </div>  
      </nav>

</header>
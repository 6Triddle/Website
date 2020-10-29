  <ul class="footer-links-main">
    <li><a href="index.php">Home</a></li>
    <li>
    <?php 
        if (isset($_SESSION['userId'])) {
          echo '
                  <a href="music.php">Music</a>
                ';
        }
    ?>
    </li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
  <ul class="footer-links-cases">

  </ul>
  <p>All images sourced from Wikipedia & Genius</p>
</footer>
</div>
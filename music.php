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
  <body class="music-page">

    <script src="js/theme.js"></script>

    <?php 
    require("header.php");
    ?>
    <main>
       
      <?php
        require("connect.php"); 
      ?>



      <div class="wrapper">

        <h1 class="header-music">Music Library</h1>


        <?php 
          // Total Duration Query
          $query = ("SELECT DISTINCT CONCAT(
                     MOD(TIME_FORMAT(SEC_TO_TIME(9832), '%H'), 24), 'h ',
                     TIME_FORMAT(SEC_TO_TIME(9832), '%imin')
                     )
                    
                    AS 'Total Duration'
                    from main as m");
          $result = mysqli_query($con,$query);
              
          while($output = mysqli_fetch_array($result))
          {
        ?>
        <p class="total-duration"><b>Total Duration: </b><?php echo $output['Total Duration']; ?></p>
        <?php
          }
        ?>

        <br>
        <br>
        <br>
        <br>
        <br>

        





      <?php

        if (isset($_GET['order'])) {
          if ($_GET['order']=="genre") {
            
            // Order by Genre Ascending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY g.Genre, ar.Artist ASC"); 
          }

          else if ($_GET['order']=="genredesc") {
          
            // Order by Genre Descending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID 
            ORDER BY g.Genre DESC, ar.Artist DESC");
          } 

          else if ($_GET['order']=="artist") {
            
            // Order by Artist Ascending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY ar.Artist ASC");
          } 

          else if ($_GET['order']=="artistdesc") {
            
            // Order by Artist Descending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY ar.Artist DESC, m.Title DESC");
          } 
            

          else if ($_GET['order']=="title") {
        
            // Order by Title Ascending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY m.Title ASC");
          }

          else if ($_GET['order']=="titledesc") {
      
            // Order by Title Descending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY m.Title DESC, ar.Artist DESC");
          }

          else if ($_GET['order']=="album") {
      
            // Order by Album Ascending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY al.Album ASC");
          }

          else if ($_GET['order']=="albumdesc") {
      
            // Order by Album Descending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY al.Album DESC, m.Title DESC");
          }

          else if ($_GET['order']=="duration") {
      
            // Order by Duration Ascending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY m.Duration ASC");
          }

          else if ($_GET['order']=="durationdesc") {
      
            // Order by Duration Descending Query
            $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
            FROM main as m
            JOIN artist_to_main as am ON m.ID = am.ID
            JOIN artist as ar on ar.Artist_PK = am.Artist_PK
            JOIN genre_to_main as gm ON m.ID = gm.ID
            JOIN genre as g on g.Genre_PK = gm.Genre_PK
            LEFT JOIN album as al ON m.FK_Album = al.Album_PK
            GROUP BY m.ID
            ORDER BY m.Duration DESC, ar.Artist DESC");
          }
        }
        else {
        // Default query
          $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Spotifytrackid
          FROM main as m
          JOIN artist_to_main as am ON m.ID = am.ID
          JOIN artist as ar on ar.Artist_PK = am.Artist_PK
          JOIN genre_to_main as gm ON m.ID = gm.ID
          JOIN genre as g on g.Genre_PK = gm.Genre_PK
          LEFT JOIN album as al ON m.FK_Album = al.Album_PK
          GROUP BY m.ID");
        }
        // Sets Default Spotify song to Blueberry Faygo, which is first song on the database
        $trackid = '6wJYhPfqk3KGhHRG76WzOh';

        $result = mysqli_query($con,$query);
        ?>


        <table id="music-page">
        <tr>
          <th></th>
          <th>
            <?php 
            if (isset($_GET['order'])) { 
              // Changes title to order by descending when clicked
              if ($_GET['order']=="title") { 
                echo "<a href = 'music.php?order=titledesc'>Title ▼</a>"; 
              } 
              // Changes title to order by ascending when clicked
              else if ($_GET['order']=="titledesc"){ 
                echo "<a href = 'music.php?order=title'>Title ▲</a>"; 
              } 
              // Changes title to order by ascending when clicked
              else {
                echo "<a href = 'music.php?order=title'>Title</a>";
                } 
              }
              // Changes title to order by ascending when clicked 
            else { 
              echo "<a href = 'music.php?order=title'>Title</a>"; 
            } ?>
          </th>
          <th>
            <?php 
            if (isset($_GET['order'])) { 
              // Changes album to order by descending when clicked
              if ($_GET['order']=="album") { 
                echo "<a href = 'music.php?order=albumdesc'>Album ▼</a>"; 
              } 
              // Changes album to order by ascending when clicked
              else if ($_GET['order']=="albumdesc"){ 
                echo "<a href = 'music.php?order=album'>Album ▲</a>"; 
              } 
              // Changes album to order by ascending when clicked
              else {
                echo "<a href = 'music.php?order=album'>Album</a>";
                } 
              } 
            // Changes album to order by ascending when clicked
            else { 
              echo "<a href = 'music.php?order=album'>Album</a>"; 
            } ?>
          </th>
          <th>
            <?php 
            if (isset($_GET['order'])) { 
              // Changes artist to order by descending when clicked
              if ($_GET['order']=="artist") { 
                echo "<a href = 'music.php?order=artistdesc'>Artist ▼</a>"; 
              } 
              // Changes artist to order by ascending when clicked
              else if ($_GET['order']=="artistdesc"){ 
                echo "<a href = 'music.php?order=artist'>Artist ▲</a>"; 
              } 
              // Changes artist to order by ascending when clicked
              else {
                echo "<a href = 'music.php?order=artist'>Artist</a>";
                } 
              } 
            // Changes artist to order by ascending when clicked
            else { 
              echo "<a href = 'music.php?order=artist'>Artist</a>"; 
            } ?>
          </th>
          <th>
          <?php
            if (isset($_GET['order'])) {
              // Changes genre to order by descending when clicked
              if ($_GET['order']=="genre") { 
                echo "<a href = 'music.php?order=genredesc'><h4>Genre ▼</a>"; 
              } 
              // Changes genre to order by ascending when clicked
              else if ($_GET['order']=="genredesc"){ 
                echo "<a href = 'music.php?order=genre'><h4>Genre ▲</a>"; 
              }
              // Changes genre to order by ascending when clicked 
              else { 
                echo "<a href = 'music.php?order=genre'><h4>Genre</a>"; 
              } 
            } 
            // Changes genre to order by ascending when clicked
            else { 
              echo "<a href = 'music.php?order=genre'><h4>Genre</a>"; 
            } 
          ?>
          </th>
          <th>
            <?php
            if (isset($_GET['order'])) { 
              // Changes duration to order by descending when clicked
              if ($_GET['order']=="duration") { 
                echo "<a href = 'music.php?order=durationdesc'>Duration ▼</a>"; 
              } 
              // Changes duration to order by ascending when clicked
              else if ($_GET['order']=="durationdesc"){ 
                echo "<a href = 'music.php?order=duration'>Duration ▲</a>"; 
              } 
              // Changes duration to order by ascending when clicked
              else {
                echo "<a href = 'music.php?order=duration'>Duration</a>";
                } 
              } 
            // Changes duration to order by ascending when clicked
            else { 
              echo "<a href = 'music.php?order=duration'>Duration</a>"; 
            } ?>
          </th>
        </tr>

        <?php while($output = mysqli_fetch_array($result))
          {
        ?>


        <tr>
          <td>
            <!-- Click to change selected song to embeded spotify player -->
          <button id="playerchange" onclick="reload('<?php echo $output['Spotifytrackid']; ?>')" data-id="<?php $output['Spotifytrackid']; ?>"><img id="songID" src="images/play.png" ></button>
          </td>
          

          <td>
            <p><?php echo $output['Title']; ?></p>
          </td>

          <td>
            <p><?php echo $output['Album']; ?></p>
          </td>

          <td>
            <p><?php echo $output['Artist']; ?></p>
          </td>
          <td>
            <p><?php echo $output['Genre']; ?></p>
          </td>
          <td>
            <p><?php echo $output['Duration']; ?></p>
          </td>
          </tr>
        

        <?php
        }
      ?>

      </table>  
      </div>

      
          <!-- Embedded Spotify Player -->
          <div id="test" class="spotify-player" align="center">
            <iframe id = "iframe" src="https://open.spotify.com/embed/track/<?php echo $trackid ?>" width="100%" height="75" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>  
          </div>
  
    </main>
    <script type="text/javascript" src="js/spotify.js"></script>
  </body>
</html>
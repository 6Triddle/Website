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
  <body class="music-page">
  <script src="theme.js"></script>
    <?php 
    require("header.php");
    ?>
    <main>
       
      <?php
        require("connect.php"); 
      ?>

      <div class="aside">

        <ul>
          <li>
          <a href='music.php?id=1'>Title, Artist DESC</a>
          </li>
          <br>
          <li>
            <a href='music.php?id=2'>Genre, Artist ASC</a>
          </li>
        </ul>

      </div>

      <div class="wrapper">

        <h1>Music Library</h1>

        <img src="images/Music.png" width="150px" height="150px">

        <?php 
          $query = ("SELECT SEC_TO_TIME( SUM( m.Duration ) ) AS `Total Duration`
          FROM main AS m");
          $result = mysqli_query($con,$query);
              
          while($output = mysqli_fetch_array($result))
          {
        ?>
          <p style="float:right; font-size: 20px; margin-top: 100px;"><b>Total Duration: </b><?php echo $output['Total Duration']; ?></p>
        <?php
          }
        ?>

        <div class="audio-player-cont">
          <div class="controllers">
            <img id="mainPlayOrPause" src="images/mainPlay.png" width="40px" onclick="playOrPauseSong();" style="margin-right:350px;" />
            <img src="images/volume-down.png" width="15px" style="margin-left:460px;"/>
            <input id="volumeSlider" class="volume-slider" type="range" min="0" max="1" value="0.15" step="0.01" onchange="adjustVolume()" />
            <img src="images/volume-up.png" width="15px" style="margin-left:2px;" />
          </div>
          <div class="player">
            <div id="songTitle" class="song-title">Song title goes here</div>
            <input id="songSlider" class="song-slider" type="range" min="0" step="1" onchange="seekSong()" />
            <div>
              <div id="currentTime" class="current-time">00:00</div>
                <div id="duration" class="duration">00:00</div>
              </div>
            <div id="nextSongTitle" class="song-title"><b</b></div>
          </div>
        </div>
        <script type="text/javascript" src="player.js"></script>

      <section class="grid-container">
        <div class="item1">
        </div>
        <div class="item2">
          <h1>Title</h1>
        </div>
        <div class="item3">
        </div>
        <div class="item4">
          <h1>Album</h1>
        </div>
        <div class="item5">
        </div>
          <div class="item6">
            <h1>Artist</h1>
          </div>
          <div class="item7">
          </div>
          <div class="item8">
            <h1>Genre</h1>
          </div>
          <div class="item9">
            <h1>Duration</h1>
          </div>
      </section>

      <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          switch ($id)
          {
              case '1':
                $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Size, p.Path, m.Filename
                FROM main as m
                JOIN artist_to_main as am ON m.ID = am.ID
                JOIN artist as ar on ar.Artist_PK = am.Artist_PK
                JOIN genre_to_main as gm ON m.ID = gm.ID
                JOIN genre as g on g.Genre_PK = gm.Genre_PK
                LEFT JOIN album as al ON m.FK_Album = al.Album_PK
                LEFT JOIN path as p on m.FK_Path = p.Path_PK
                GROUP BY m.ID
                ORDER BY m.Title DESC, ar.Artist DESC");
                $result = mysqli_query($con,$query);
                break;

              case '2':
                $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Size, p.Path, m.Filename
                FROM main as m
                JOIN artist_to_main as am ON m.ID = am.ID
                JOIN artist as ar on ar.Artist_PK = am.Artist_PK
                JOIN genre_to_main as gm ON m.ID = gm.ID
                JOIN genre as g on g.Genre_PK = gm.Genre_PK
                LEFT JOIN album as al ON m.FK_Album = al.Album_PK
                LEFT JOIN path as p on m.FK_Path = p.Path_PK
                GROUP BY m.ID 
                ORDER BY g.Genre ASC, ar.Artist ASC");
                $result = mysqli_query($con,$query);
                break;



          } 
        } else {
          $query = ("SELECT m.ID, m.Title, al.Album, GROUP_CONCAT(DISTINCT ar.Artist separator ', ') AS 'Artist', GROUP_CONCAT(DISTINCT g.Genre separator ', ') AS 'Genre', RIGHT(SEC_TO_TIME(m.Duration), 5) AS 'Duration', m.Size, p.Path, m.Filename
          FROM main as m
          JOIN artist_to_main as am ON m.ID = am.ID
          JOIN artist as ar on ar.Artist_PK = am.Artist_PK
          JOIN genre_to_main as gm ON m.ID = gm.ID
          JOIN genre as g on g.Genre_PK = gm.Genre_PK
          LEFT JOIN album as al ON m.FK_Album = al.Album_PK
          LEFT JOIN path as p on m.FK_Path = p.Path_PK
          GROUP BY m.ID");
          $result = mysqli_query($con,$query);
        }


        while($output = mysqli_fetch_array($result))
          {
            
      
        ?>
        
        <section class="grid-container">
          <div class="item1">
            <script type="text/javascript">
              songID+=1
              song_ID<?php echo str_replace(' ', '', preg_replace('/[^a-zA-Z]+/', '',  $output['Title']))?> = songID
            </script>
            <audio id="<?php echo $output['Filename']; ?>" src="<?php echo $output['Path']; ?><?php echo $output['Filename']; ?>" preload="auto"></audio>
            <img id="songID" src="images/play.png" width="40px" onclick="playSong(this, song_ID<?php echo str_replace(' ', '', preg_replace('/[^a-zA-Z]+/', '',  $output['Title']))?>);">
            <script type="text/javascript">
              songIDList.push(song_ID<?php echo str_replace(' ', '', preg_replace('/[^a-zA-Z]+/', '',  $output['Title']))?>);
              songs.push("<?php echo $output['Filename']; ?>");
              songTitleList.push("<?php echo $output['Title']; ?>");
            </script>
          </div>
          <div class="item2">
          <?php echo $output['Title']; ?>
          </div>
          <div class="item3">
          </div>
          <div class="item4">
            <p><?php echo $output['Album']; ?></p>
          </div>
          <div class="item5">
          </div>
          <div class="item6">
            <p><?php echo $output['Artist']; ?></p>
          </div>
          <div class="item7">
          </div>
          <div class="item8">
            <p><?php echo $output['Genre']; ?></p>
          </div>
          <div class="item9">
            <p><?php echo $output['Duration']; ?></p>
          </div>
        </section>

        <?php
        }
      ?>
        
      </div>
  
    </main>

  </body>
</html>

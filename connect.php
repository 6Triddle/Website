<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "music_database";

$con = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$con) {
    die("Connection failed: ".mysqli_connect_error());
  }
?>
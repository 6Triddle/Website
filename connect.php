<?php

$servername = "pdb50.awardspace.net";
$dBUsername = "3086032_triddle";
$dBPassword = "dojustly01";
$dBName = "3086032_triddle";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
?>
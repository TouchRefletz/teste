<?php
  $hostname = "localhost";
  $username = "id21038223_gamificacao";
  $password = "Eusouotouch123!";
  $dbname = "id21038223_gamificacao";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>

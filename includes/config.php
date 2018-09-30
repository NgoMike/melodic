<?php 
  ob_start(); // wait until you have all data before sending to server
  session_start(); // remembers if log in or not

  $timezone = date_default_timezone_set("America/Los_Angeles");

  $con = mysqli_connect("localhost", "root", "", "melodic"); // server name, user name, pw, database name

  if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno(); // . = append
  }
?>
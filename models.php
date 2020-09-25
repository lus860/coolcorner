<?php
    $servername = "localhost";
    $username = "root";               
    $password = "root";
    $db = "coolcorner";
    $conn = new mysqli($servername, $username, $password, $db);

    if(!$conn) {
      die("Connection failed:" . mysqli_connect_error());
}
?>
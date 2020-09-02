<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exemplo";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
      die("XXXXXXXXXXX: " . $conn->connect_error);
    }

    date_default_timezone_set("America/Sao_Paulo");
?>
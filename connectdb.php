<?php
    $host = "localhost";
    $db = "s6015261002";
    $usr = "s6015261002";
    $pwd = "ce601";
    $port = "3306";
    $conn = mysqli_connect($host,$usr,$pwd,$db,$port);
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    mysqli_query($conn, 'SET NAMES \'utf8\'');
?>

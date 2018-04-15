<?php
    $servername = "127.0.0.1";
    $username = "hydewww";
    $password = "hydewww";
    $dbname = "basic_xss";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die($conn->connect_error);
    }
?>

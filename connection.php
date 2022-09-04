<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "user_details";

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (mysqli_connect_errno()) {
        die ("Connection Error: " . mysqli_connect_error());
    }
?>
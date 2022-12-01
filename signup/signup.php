<?php

    include_once "../library.php";

    // Database Connection details
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "user_details";

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);


    if (mysqli_connect_errno()) {
        die ("Connect Error: " . mysqli_connect_error());
    }

    // User form details

    $Firstname = $_POST["Firstname"];
    $Lastname = $_POST["Lastname"];
    $Username = $_POST["Username"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["Confirm-password"];
    $Gender = filter_input(INPUT_POST, "Gender", FILTER_VALIDATE_INT);
    $Age = filter_input(INPUT_POST, "Age", FILTER_VALIDATE_INT);
    $AccountNumber = rand(9999999, 99999999);
    $Balance = 500;

    // $isAccountNumberExist = mysqli_query($conn, "SELECT id FROM user_info WHERE AccountNumber = $AccountNumber");
    // $isEmailExist = mysqli_query($conn, "SELECT id FROM user_info WHERE Email = '$Email'");
    // $isUsernameExist = mysqli_query($conn, "SELECT id FROM user_info WHERE Username = '$Username'");

    // if ($isEmailExist) {
    //     // show popup that email already exist and please login
    // }
    // else if ($isUsernameExist) {
    //     // show popup that username already exist please choose another
    // }

    $sql = "INSERT INTO user_info (Firstname, Lastname, Username, Email, Password, ConfirmPassword, Gender, Age, AccountNumber, Balance)
            VALUES ('$Firstname', '$Lastname', '$Username', '$Email', '$Password', '$ConfirmPassword', $Gender, $Age, $AccountNumber, $Balance)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: login/index.html");
    }

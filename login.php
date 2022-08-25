<?php

    include_once "connection.php";
    session_start();

    $emailId = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT Id, Firstname, Username, AccountNumber, Password, Email FROM user_info";

    $userId = NULL;

    $result = mysqli_query($conn, $sql);

    $existingPassword = NULL;
    
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row['Email'] == $emailId) {
                $userId = $row['Id'];

                // User details for dashboard
                $_SESSION['Id'] = $row['Id'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['firstname'] = $row['Firstname'];
                $_SESSION['accountNumber'] = $row['AccountNumber'];
            }
        }
        if ($userId != NULL) {
            $checkPassword = mysqli_query($conn, "SELECT Password FROM user_info WHERE Id = $userId");
            $existingPassword = mysqli_fetch_column($checkPassword);  // works in 8 and above versions
            
            // ------------------ For version below 8 ---------------
            
            // while ($fetechedPassword = mysqli_fetch_array($checkPassword)) {
            //     $existingPassword = $fetechedPassword[0];
            // }

            //-------------------  For version below 8 ---------------


            if ($existingPassword == $password) {
                $user_login_email = $emailId;   // Storing emailid into user_login_info.php file for dashboard uses
                header("Location: dashboard.php");
                $_SESSION['email'] = $emailId;
                $_SESSION['id'] = $userId;
            }
            else {
                echo '<!DOCTYPE html><html lang="en"><head><title>Error</title></head><body style="display: flex; justify-content: center; text-align: center;"><div><p style="font-family: Courier New, Courier,monospace; font-size: 20px; font-weight: bold;">Invalid Username and Password</p></div></body></html>';
            }
        }
        else {
            echo '<!DOCTYPE html><html lang="en"><head><title>Error</title></head><body style="display: flex; justify-content: center; text-align: center;"><div><p style="font-family: Courier New, Courier,monospace; font-size: 20px; font-weight: bold;">User Not Exist</p></div></body></html>';
        }
    }

?>
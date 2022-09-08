<?php

// fetching balance 
function fetchBalance($conn, $accountNumber) {
    $balance = null;
    $result = mysqli_query($conn, "SELECT Balance FROM user_info WHERE AccountNumber = $accountNumber");
    if ($result) {
        $balance = mysqli_fetch_column($result);
    }
    return $balance;
}

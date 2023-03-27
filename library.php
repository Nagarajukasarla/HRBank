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
// function createAccountNumber ($conn) {
//     $accountNumber = rand (9999999, 99999999);
//     $result = mysqli_query($conn, "SELECT id FROM user_info WHERE AccountNumber = $accountNumber");
//     if ($result) {
//         $accountNumber = ;
//         createAccountNumber($conn, $accountNumber);
//     }
//     else {
//         return $accountNumber;
//     }
// }
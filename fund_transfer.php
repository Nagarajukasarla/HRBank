<?php

include_once "connection.php";
include_once "library.php";

session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$firstName = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$accountNumber = isset($_SESSION['accountNumber']) ? $_SESSION['accountNumber'] : 0;
$lastName = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$balance = isset($_SESSION['balance']) ? $_SESSION['balance'] : 0;
$balanceStatus = 1;
$userStatus = 1;
$transactionStatus = 1;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Transfering</title>
    <link rel="stylesheet" href="assests/FundTransfer/style.css">
</head>

<body>
    <div class="header">
        <div class="bank-logo">
            <p>HRBank</p>
        </div>
        <div class="user-profile">
            <img src="Img/user1.png" alt="user" width="45px" height="45px">
            <?php echo "<p>$username</p>"; ?>
        </div>
    </div>
    <div class="floating-profile">
        <img id="close-profile" src="Img/close.png" alt="close" width="20px" height="20px">
        <p>100</p>
        <?php echo "<p>$firstName</p>"; ?>
        <?php echo "<p>$accountNumber</p>"; ?>
        <?php echo "<p>$email</p>"; ?>
        <button>Manage Profile</button>
    </div>
    <div class="main-area">
        <div class="side-menu">
            <a href="dashboard.php">
                <div class="overview" style="display: flex;">
                    <img src="Img/overview.png" alt="overview" width="25px" height="25px">
                    <p>Overview</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <a href="transactions.php">
                <div class="transactions" style="display: flex;">
                    <img src="Img/transfer.png" alt="transfer" width="25px" height="25px">
                    <p>Transactions</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <div class="fund-transfer" style="display: flex;">
                <img src="Img/fundTransfer.png" alt="fund" width="25px" height="25px">
                <p>Fund Transfer</p>
                <img src="Img/expand.png" alt="expand" width="18px" height="16px">
            </div>
            <a href="loans.php">
                <div class="loans" style="display: flex;">
                    <img src="Img/loan.png" alt="loan" width="25px" height="25px">
                    <p>Loans</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <a href='add_money.php'>
                <div class="add-money" style='display: flex;'>
                    <img src="Img/deposite.png" alt="deposite" width='25px' height='25px'>
                    <p>Add Money</p>
                    <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                </div>
            </a>
        </div>
        <div class="transfer-area">
            <div class="balance-hidden-popup balance-popup">
                <img src="Img/warning2.png">
                <p>You have Insufficient balance</p>
                <button id="ok-btn">OK</button>
            </div>
            <div class="user-not-exits-hidden-popup not-exist-popup">
                <img src="Img/cross.png">
                <p>User Not Exist</p>
                <button id="ok-btn-2">OK</button>
            </div>
            <div class="transaction-success-hidden-popup transaction-success-popup">
                <img src="Img/successOkay.png" width="65px" height="65px">
                <p>Successfully Transferd</p>
                <button id="ok-btn-3">OK</button>
            </div>
            <div class="send">
                <p>SEND</p>
                <form action="" method="POST">
                    <div class="acc-number">
                        <input type="text" name="accountNumber" id="account-number" placeholder="Enter Account Number" required>
                    </div>
                    <div class="full-name">
                        <input type="text" name="fullName" id="full-name" placeholder="Enter Full Name" required>
                    </div>
                    <div class="amount">
                        <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>
                    </div>
                    <div class="send-btn">
                        <button type="submit" id="transfer-btn" name="transfer-btn">Transfer</button>
                    </div>

                    <?php
                    if (isset($_POST['transfer-btn'])) {  // after user clicks on send button
                        $tragetAccount = filter_input(INPUT_POST, "accountNumber", FILTER_VALIDATE_INT);
                        $amount = filter_input(INPUT_POST, "amount", FILTER_VALIDATE_INT);
                        if ($balance >= $amount) {  // checking whether amount is lesser or not
                            $result = mysqli_query($conn, "SELECT id FROM user_info WHERE AccountNumber = $tragetAccount");
                            if ($tragetAccount != $accountNumber) {
                                if ($result) {
                                    // Updating balance of both sender and reciver
                                    $updatedReceiverBalanceStatus = mysqli_query($conn, "UPDATE user_info SET Balance = (Balance + $amount) WHERE AccountNumber = $tragetAccount");
                                    $updatedSenderBalanceStatus = mysqli_query($conn, "UPDATE user_info SET Balance = Balance - $amount WHERE AccountNumber = $accountNumber");

                                    $date = new DateTime();
                                    $timeZone = $date->getTimezone();
                                    $currentTimeZone = date_default_timezone_set($timeZone->getName());
                                    $currentDate = date("y-m-d");
                                    $currentTime = date("H:i:s");
                                    $updatedSenderBalance = fetchBalance($conn, $accountNumber);
                                    $updatedReceiverBalance = fetchBalance($conn, $tragetAccount);

                                    $setDetails = mysqli_query($conn, "INSERT INTO transactions (
                                        SenderAccountNumber, 
                                        ReceiverAccountNumber, 
                                        TransactionDate,
                                        TransactionTime, 
                                        Amount, 
                                        SenderBalance, 
                                        ReceiverBalance)
                                        VALUES (
                                            $accountNumber, 
                                            $tragetAccount, 
                                            '$currentDate', 
                                            '$currentTime', 
                                            $amount, 
                                            $updatedSenderBalance, 
                                            $updatedReceiverBalance
                                        )
                                    ");
                                    $transactionStatus = 2;
                                }
                            }
                            else {
                                $userStatus = 2; // AccountNumber not exits
                            }
                        }
                        else {
                            $balanceStatus = 2; // Insufficent balance
                        }
                    }
                    ?>
                    <input type="hidden" value="<?= htmlspecialchars($balanceStatus) ?>">
                    <div class="user-status"><input type="hidden" value="<?= htmlspecialchars($userStatus) ?>"></div>
                    <div class="transaction-status"><input type="hidden" value="<?= htmlspecialchars($transactionStatus) ?>"></div>
                </form>
            </div>
            <div class="receive">
                <p style="user-select: none;">RECEIVE</p>
                <p style="user-select: none;">You're Details</p>
                <div class="receive-details">
                    <div class="my-account-number" style="display: flex;">
                        <p>Account Number : </p>
                        <?php echo "<span id='my-acc'>$accountNumber</span>"; ?>
                    </div>
                    <div class="my-full-name" style="display: flex;">
                        <p>Full Name : </p>
                        <?php echo "<span id='my-name'>$firstName  $lastName</span>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assests/FundTransfer/main.js"></script>
</html>
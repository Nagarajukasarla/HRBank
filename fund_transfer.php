<?php

include_once "connection.php";

session_start();
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$firstName = $_SESSION['firstname'];
$accountNumber = $_SESSION['accountNumber'];
$lastName = $_SESSION['lastname'];

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
        <img id="close-profile" src=" Img/close.png" alt="close" width="20px" height="20px">
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
            <div class="send">
                <p>SEND</p>
                <form action="">
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
                        <button type="submit">Transfer</button>
                    </div>
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
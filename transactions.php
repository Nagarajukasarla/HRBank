<?php

include_once "connection.php";
include_once "library.php";
include_once "utilClasses/transactionClass.php";

session_start();
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$userName = $_SESSION['username'];
$firstName = $_SESSION['firstname'];
$accountNumber = $_SESSION['accountNumber'];
$senderAccountNumber = null;
$reciverAccountNumber = null;
$transactionDate = null;
$transactionTime = null;
$amount = null;
$updatedBalance = null;
$data = array();
$T = new Transaction();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="assests/Transactions/style.css">
</head>

<body>
    <div class="header">
        <div class="bank-logo">
            <p>HRBank</p>
        </div>
        <div class="user-profile">
            <img src="Img/user1.png" alt="user" width="45px" height="45px">
            <?php echo "<p>$userName</p>"; ?>
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
            <div class="transactions" style="display: flex;">
                <img src="Img/transfer.png" alt="transfer" width="25px" height="25px">
                <p>Transactions</p>
                <img src="Img/expand.png" alt="expand" width="18px" height="16px">
            </div>
            <a href="fund_transfer.php">
                <div class="fund-transfer" style="display: flex;">
                    <img src="Img/fundTransfer.png" alt="fund" width="25px" height="25px">
                    <p>Fund Transfer</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <a href="loans.php">
                <div class="loans" style="display: flex;">
                    <img src="Img/loan.png" alt="loan" width="25px" height="25px">
                    <p>Loans</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <a href="add_money.php">
                <div class="add-money" style='display: flex;'>
                    <img src="Img/deposite.png" alt="deposite" width='25px' height='25px'>
                    <p>Add Money</p>
                    <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                </div>
            </a>
        </div>
        <div class="transaction-list">
            <p>Transactions</p>
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $fetchUserTransactions = mysqli_query($conn, $T->fetchTransactions($accountNumber));
                            if ($fetchUserTransactions) {
                                while ($row = mysqli_fetch_array($fetchUserTransactions)) {
                                    $senderAccountNumber = $row['SenderAccountNumber'];
                                    $receiverAccountNumber = $row['ReceiverAccountNumber'];
                                    $transactionDate = $row['TransactionDate'];
                                    $transactionTime = $row['TransactionTime'];
                                    $amount = $row['Amount'];
                                    $senderBalance = $row['SenderBalance'];
                                    $ReceiverBalance = $row['ReceiverBalance'];
                                    $actionWithNumber = "";

                                    if ($senderAccountNumber == $accountNumber) {
                                        $actionWithNumber = "<b style='color:#FF0000'>Sent to&nbsp;&nbsp</b>" . $receiverAccountNumber;
                                        $currentBalance = $senderBalance;
                                    } else {
                                        $actionWithNumber = "<b style='color:#008000'>Received from&nbsp;&nbsp</b>" . $senderAccountNumber;
                                        $currentBalance = $ReceiverBalance;
                                    }
                                    echo "
                                        <tr>
                                            <td>$actionWithNumber <span class='more-info-div'><img src='Img/more-info.png' width=25 height=25px style='position:relative;top:5px;'></span></td>
                                            <td>$transactionDate</td>
                                            <td>$amount</td>
                                            <td>$currentBalance</td>
                                        </tr>
                                        ";
                                }
                            }
                            else {
                                // Handle Design for No records found 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="assests/Transactions/main.js"></script>

</html>

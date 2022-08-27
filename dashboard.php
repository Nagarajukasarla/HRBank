<?php
include_once "connection.php";

session_start();
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$firstName = $_SESSION['firstname'];
$lastName = $_SESSION['lastname'];
$accountNumber = $_SESSION['accountNumber'];
$balance = $_SESSION['balance'];

// fetching balance before creating session variable
// $balance = mysqli_fetch_column($balanceRes);    // Works on 8 and above versions of php
// ------------------ For version below 8 ---------------
// while ($row = mysqli_fetch_array($balanceRes)) {
//     $balance = $row[0];
// }
// ------------------ For version below 8 ---------------

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>HRBank</title>
    <!-- <link rel='stylesheet' href='style1.css'> -->
    <link rel='stylesheet' href='assests/Dashboard/style.css'>
</head>

<body>

    <!-- !!!!!!!!!!! Main dashboard starts here !!!!!!!!!!!!!-->

    <div class='dash-wrap' style='display: block' ;>
        <div class='dash-header'>
            <div class='bank-logo'>
                <p>HRBank</p>
            </div>
            <div class='user-profile'>
                <img src='Img/user1.png' alt='user' width='45px' height='45px'>
                <?php echo "<p>$username</p>"; ?>
            </div>
        </div>
        <div class='floating-profile'>
            <img id='close-profile' src='Img/close.png' alt='close' width='20px' height='20px'>
            <p>100</p>
            <?php echo "<p>$firstName</p>"; ?>
            <?php echo "<p>$accountNumber</p>"; ?>
            <?php echo "<p>$email</p>"; ?>
            <button>Manage Profile</button>
        </div>
        <div class='main-area'>
            <div class='side-menu'>
                <div class='overview' style='display: flex;'>
                    <img src='Img/overview.png' alt='overview' width='25px' height='25px'>
                    <p>Overview</p>
                    <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                </div>
                <a href='transactions.php'>
                    <div class='transactions' style='display: flex;'>
                        <img src='Img/transfer.png' alt='transfer' width='25px' height='25px'>
                        <p>Transactions</p>
                        <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                    </div>
                </a>
                <a href='fund_transfer.php'>
                    <div class='fund-transfer' style='display: flex;'>
                        <img src='Img/fundTransfer.png' alt='fund' width='25px' height='25px'>
                        <p>Fund Transfer</p>
                        <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                    </div>
                </a>
                <a href='loans.php'>
                    <div class='loans' style='display: flex;'>
                        <img src='Img/loan.png' alt='loan' width='25px' height='25px'>
                        <p>Loans</p>
                        <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
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
            <div class='overview-board'>
                <div class='balance'>
                    <p>Available Balance :</p>
                    <?php echo "<p>$balance INR</p>"; ?>
                    <?php echo "<p>Account: $accountNumber</p>"; ?>
                </div>
                <a href="fund_transfer.php">
                    <div class='send' style='display: flex;'>
                        <p>Send</p>
                        <img src='Img/send.png' alt='send' width='60px' height='60px'>
                    </div>
                </a>
                <a href="fund_transfer.php">
                    <div class='receive' style='display: flex;'>
                        <p>Receive</p>
                        <img src='Img/send.png' alt='send' width='60px' height='60px'>
                    </div>
                </a>
                <div class='transaction-list'>
                    <p>Latest Transactions</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Nominee</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Naga Raju</td>
                                <td>Credited</td>
                                <td>01/09/2025</td>
                                <td>90999</td>
                                <td>909999099.99</td>
                            </tr>
                            <tr>
                                <td>Naga Raju</td>
                                <td>Credited</td>
                                <td>01/09/2025</td>
                                <td>90999</td>
                                <td>909999099.99</td>
                            </tr>
                            <tr>
                                <td>Naga Raju</td>
                                <td>Credited</td>
                                <td>01/09/2025</td>
                                <td>90999</td>
                                <td>909999099.99</td>
                            </tr>
                            <tr>
                                <td>Rama Krishna</td>
                                <td>Credited</td>
                                <td>01/09/2025</td>
                                <td>90999</td>
                                <td>909999099.99</td>
                            </tr>
                            <tr>
                                <td>Naga Raju</td>
                                <td>Credited</td>
                                <td>01/09/2025</td>
                                <td>90999</td>
                                <td>909999099.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>
<script src='assests/Dashboard/main.js'></script>

</html>
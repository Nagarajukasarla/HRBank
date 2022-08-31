
<?php 

    include_once "connection.php";

    session_start();
    $id = $_SESSION['id'];
    $tempId = $id;
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstname'];
    $accountNumber = $_SESSION['accountNumber'];

    $sql = "SELECT Balance FROM user_info WHERE Id = $id";

    $balanceRes = mysqli_query($conn, $sql);
    $balance = NULL;

    while ($row = mysqli_fetch_array($balanceRes)) {
        $balance = $row[0];
    }

?>



<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>HRBank</title>
<link rel='stylesheet' href='assests/Add_money/style.css'>
</head>
<body>
    <div class='money-wrap' style='display: block';>
        <div class='money-header'>
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
            <?php echo "<p>$accountNumber</p>";?>
            <?php echo"<p>$email</p>"; ?>
            <button>Manage Profile</button>
        </div>
        <div class='main-area'>
            <div class='side-menu'>
                <a href="dashboard.php">
                    <div class='overview' style='display: flex;'>
                        <img src='Img/overview.png' alt='overview' width='25px' height='25px'>
                        <p>Overview</p>
                        <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                    </div>
                </a>
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
            <div class="add-money-form">
                <p>ADD MONEY TO YOURSELF</p>
                <div class="money-form">
                    <form action="" method="POST">
                        <div class="amount-input">
                            <input type="text" name="amount" placeholder="Enter amount">
                        </div>
                        <div class="done-btn">
                            <button name="button">Done</button>
                        </div>
                    </form>

                    <?php 
                        if (isset($_POST["button"])) {
                            $amount = filter_input(INPUT_POST, "amount", FILTER_VALIDATE_INT);
                            $_SESSION["amount"] = $amount;

                            $sqlAddQuery = "UPDATE user_info SET Balance = $amount WHERE Id = $tempId";
                            $insertResult = mysqli_query($conn, $sqlAddQuery);

                            if ($insertResult) {
                                echo "<div class='success-msg' style=' margin: 30px 0 0 65px; background: #A8F1C6; width: 280px; height: 30px; border: 1px solid lightgreen; border-radius: 5px;'> <p style=' margin-top: 3px; color: #252525; font-size: 17px'> Successfully Added</p> </div>";
                            }
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assests/Add_money/main.js"></script>
</html>
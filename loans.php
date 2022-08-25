<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans</title>
    <link rel="stylesheet" href="assests/Loans/style.css">
</head>
<body>
    <div class="header">
        <div class="bank-logo">
            <p>HRBank</p>
        </div>
        <div class="user-profile">
            <img src="Img/user1.png" alt="user" width="45px" height="45px">
            <p>Username</p>
        </div>
    </div>
    <div class="floating-profile">
        <img id="close-profile" src="Img/close.png" alt="close" width="20px" height="20px">
        <p>100</p>
        <p>Naga Raju</p>
        <p>90909909009</p>
        <p>truenagraj@gmail.com</p>
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
            <a href="fund_transfer.php">
                <div class="fund-transfer" style="display: flex;">
                    <img src="Img/fundTransfer.png" alt="fund" width="25px" height="25px">
                    <p>Fund Transfer</p>
                    <img src="Img/expand.png" alt="expand" width="18px" height="16px">
                </div>
            </a>
            <div class="loans" style="display: flex;">
                <img src="Img/loan.png" alt="loan" width="25px" height="25px">
                <p>Loans</p>
                <img src="Img/expand.png" alt="expand" width="18px" height="16px">
            </div>
            <a href="add_money.php">
                <div class="add-money" style='display: flex;'>
                    <img src="Img/deposite.png" alt="deposite" width='25px' height='25px'>
                    <p>Add Money</p>
                    <img src='Img/expand.png' alt='expand' width='18px' height='16px'>
                </div>
            </a>
        </div>
        <div class="loan-amount-bars">
            <div class="home-loan">
                <img src="Img/heart.png" alt="heart" width="25px" height="25px">
                <p>Home loan up to</p>
                <p>45 Lakhs</p>
            </div>
            <div class="bike-loan">
                <img src="Img/heart.png" alt="heart" width="25px" height="25px">
                <p>Bike loan up to</p>
                <p>3 Lakhs</p>
            </div>
            <div class="gold-loan">
                <img src="Img/heart.png" alt="heart" width="25px" height="25px">
                <p>Gold loan up to</p>
                <p>5 Lakhs</p>
            </div>
            <div class="education-loan">
                <img src="Img/heart.png" alt="heart" width="25px" height="25px">
                <p style="margin-left: 30px; ">Education loan up to</p>
                <p>15 Lakhs</p>
            </div>
        </div>
        <div class="loan-form">
            <form action="">
                <div>
                    <select name="selectLoan" id="select-loan">
                        <option value="default">Select Loan Type</option>
                        <option value="homeLoan">Home Loan</option>
                        <option value="bikeLoan">Bike Loan</option>
                        <option value="goldLoan">Gold Loan</option>
                        <option value="educationLoan">Education Loan</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="firstName" id="first-name" placeholder="Full Name">
                </div>
                <div>
                    <input type="text" name="lastName" id="last-name" placeholder="Email Id">
                </div>
                <div>
                    <select name="selectYear" id="select-years">
                        <option value="default">Select Years</option>
                        <option value="2">2 Years</option>
                        <option value="4">4 Years</option>
                        <option value="5">5 Years</option>
                        <option value="9">9 Years</option>
                        <option value="10">10 Years</option>
                        <option value="15">15 Years</option>
                        <option value="20">20 Years</option>
                    </select>
                </div>
                <div id="request-btn">
                    <button type="submit">Request Loan</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="assests/Loans/main.js"></script>
</html>
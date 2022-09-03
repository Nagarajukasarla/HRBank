CREATE DATABASE user_details;

CREATE TABLE user_info (
    Id INT AUTO_INCREMENT NOT NULL,
    Firstname VARCHAR(64) NOT NULL,
    Lastname VARCHAR(64) NOT NULL,
    Username VARCHAR(64) NOT NULL,
    Email VARCHAR(64) NOT NULL,
    Password VARCHAR(64) NOT NULL,
    ConfirmPassword VARCHAR(64) NOT NULL,
    Gender INT NOT NULL,
    Age INT NOT NULL,
    AccountNumber INT NOT NULL,
    Balance INT NOT NULL,
    PRIMARY KEY (Id)
);


CREATE TABLE transactions (
    SenderAccountNumber INT NOT NULL,
    ReceiverAccountNumber INT NOT NULL,
    TransactionDate DATE NOT NULL,
    TransactionTime TIME NOT NULL,
    Amount INT NOT NULL
);
<?php
    class Transaction {
        public $transactionsOfUser;
        function fetchTransactions ($accountNumber) {
            $this->transactionsOfUser = "SELECT * FROM transactions WHERE SenderAccountNumber = $accountNumber OR ReceiverAccountNumber = $accountNumber";
            return $this->transactionsOfUser;
        }
    }
?>
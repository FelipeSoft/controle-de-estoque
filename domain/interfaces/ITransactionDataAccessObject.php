<?php

interface ITransactionDataAccessObject {
    public function getProductIdByName(string $name);
    public function joinTransactions();
    public function assign(Transaction $transaction);
}
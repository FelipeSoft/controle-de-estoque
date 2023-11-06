<?php

interface ITransactionDataAccessObject {
    public function getProductIdByName(string $name);
    public function assign(Transaction $transaction);
}
<?php

interface ITransactionDataAccessObject {
    public function getProductIdByName(string $name);
    public function joinTransactions();
    public function assign(array $transaction);
    public function getAvailableCategories();
    public function remove(string $id);
}
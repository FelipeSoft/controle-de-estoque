<?php
require_once ("../domain/interfaces/ITransactionDataAccessObject.php");

class TransactionDataAccessObjectMySQL implements ITransactionDataAccessObject {
    public function __construct(
        private readonly PDO $connection
    ) {}

    // public function getProductIdByName(string $name) {
    //     try {
    //         $query = "SELECT id FROM tb_products WHERE name = :name";
    //         $statement = $this->connection->prepare($query);
    //         $statement->bindValue(":name", $name);
    //         $statement->execute();

    //         if ($statement->rowCount() > 0) {
    //             return $statement->fetch(PDO::FETCH_ASSOC);
    //         }

    //         return [];
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //         exit;
    //     }
    // }

    public function assign(Transaction $transaction) {
        try {
            $query = "INSERT INTO tb_transaction_buyers (product_id, quantity, created_at, updated_at) VALUES (:product_id, :quantity, NOW(), NOW())";
            $query->bindValue(":product_id", $transaction->product_id);
            $query->bindValue(":quantity", $transaction->quantity);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function joinTransactions() {
        try {
            $query = "SELECT ";
        } catch (PDOException $e) {

        }
    }
}
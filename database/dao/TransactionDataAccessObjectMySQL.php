<?php
require_once("domain/interfaces/ITransactionDataAccessObject.php");

class TransactionDataAccessObjectMySQL implements ITransactionDataAccessObject {
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function getProductIdByName(string $name) {
        try {
            $query = "SELECT product_id FROM tb_products WHERE name = :name";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":name", $name);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetch(PDO::FETCH_ASSOC);
            }

            return [];
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

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
            $query = "SELECT 
                        p.product_id,
                        p.name, 
                        p.cost, 
                        p.unit_price, 
                        p.min_stock, 
                        c.name AS category_name, 
                        s.name AS supplier_name,
                        (COALESCE(st.purchase_sum, 0) - COALESCE(bt.sale_sum, 0)) AS current_stock,
                        p.created_at,
                        p.updated_at
                    FROM 
                        db_controle_de_estoque.tb_products AS p
                    JOIN 
                        db_controle_de_estoque.tb_categories AS c ON p.category_id = c.category_id
                    JOIN 
                        db_controle_de_estoque.tb_suppliers AS s ON p.supplier_id = s.supplier_id
                    LEFT JOIN (
                        SELECT 
                            product_id,
                            SUM(quantity) AS purchase_sum
                        FROM 
                            db_controle_de_estoque.tb_suppliers_transactions
                        GROUP BY 
                            product_id
                    ) AS st ON p.product_id = st.product_id
                    
                    LEFT JOIN (
                        SELECT 
                            product_id,
                            SUM(quantity) AS sale_sum
                        FROM 
                            db_controle_de_estoque.tb_buyers_transactions
                        GROUP BY 
                            product_id
                    ) AS bt ON p.product_id = bt.product_id
                    
                    ORDER BY p.product_id ASC;";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }

            return[];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
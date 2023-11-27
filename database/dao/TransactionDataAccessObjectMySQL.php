<?php
require_once(dirname(__FILE__) . "../../../domain/interfaces/ITransactionDataAccessObject.php");

class TransactionDataAccessObjectMySQL implements ITransactionDataAccessObject
{
    public function __construct(
        private readonly PDO $connection
    ) {
    }

    public function getProductIdByName(string $name)
    {
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

    public function assign(array $transaction)
    {
        try {
            $query = "INSERT INTO tb_transaction_buyers (product_id, quantity, created_at, updated_at) VALUES (:product_id, :quantity, NOW(), NOW())";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":product_id", $transaction["product_id"]);
            $statement->bindValue(":quantity", $transaction["quantity"]);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function joinTransactions()
    {
        try {
            $query = "SELECT 
    p.product_id,
    p.name, 
    p.cost, 
    p.unit_price, 
    c.name AS category_name, 
    s.name AS supplier_name,
    (COALESCE(st.purchase_sum, 0) - COALESCE(bt.sale_sum, 0)) AS current_stock,
    p.created_at,
    p.updated_at,
    CASE 
        WHEN st.purchase_sum IS NOT NULL THEN 'Compra'
        WHEN bt.sale_sum IS NOT NULL THEN 'Venda'
    END AS type,
    COALESCE(st.purchase_sum, bt.sale_sum, 0) AS transaction_amount
FROM 
    db_controle_de_estoque.tb_products AS p
JOIN 
    db_controle_de_estoque.tb_categories AS c ON p.category_id = c.category_id
LEFT JOIN 
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

ORDER BY p.product_id ASC;
";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

    }
    public function getAvailableCategories()
    {
        try {
            $sql = "SELECT c.name FROM tb_products AS p JOIN tb_categories AS c ON c.category_id = p.category_id GROUP BY c.name;";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            if ($statement->rowCount()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        } catch (PDOException $error) {
            echo $error->getMessage();
            exit;
        }
    }

    public function calculateTotalGains()
    {
        try {
            $query = "SELECT (p.unit_price * st.quantity) AS st_total FROM tb_products AS p JOIN tb_suppliers_transactions AS st ON p.product_id = st.product_id";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}

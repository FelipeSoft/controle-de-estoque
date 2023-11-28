<?php
require_once(dirname(__FILE__) . "../../../domain/interfaces/IProductDataAccessObject.php");

class ProductDataAccessObjectMySQL implements IProductDataAccessObject
{
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function all()
    {
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

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function count()
    {
        try {
            $query = "SELECT COUNT(*) AS count FROM tb_products;";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function save(array $product)
    {
        try {
            $query = "INSERT INTO tb_products (name, unit_price, cost, min_stock, category_id, supplier_id, created_at, updated_at) VALUES ('Produto de Teste', :unit_price, :cost, :min_stock, 1, 1, NOW(), NOW())";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":unit_price", $product["unit_price"]);
            $stmt->bindValue(":cost", $product["cost"]);
            $stmt->bindValue(":min_stock", $product["min_stock"]);
            $stmt->execute($product);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function remove($id)
    {
        try {
            $query = "DELETE FROM tb_products WHERE product_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function get($id) {
        try {
            $query = "SELECT * FROM tb_products WHERE product_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function edit(array $info) {
        try {
            $query = "UPDATE tb_products SET category_id = 1, supplier_id = 1, cost = :cost, unit_price = :unit_price, min_stock = :min_stock, updated_at = NOW() WHERE product_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $info["id"]);
            $stmt->bindValue(":cost", $info["cost"]);
            $stmt->bindValue(":unit_price", $info["unit_price"]);
            $stmt->bindValue(":min_stock", $info["min_stock"]);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
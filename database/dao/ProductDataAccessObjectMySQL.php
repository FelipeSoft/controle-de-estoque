<?php
require_once ("../domain/interfaces/IProductDataAccessObject.php");

class ProductDataAccessObjectMySQL implements IProductDataAccessObject {
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function all() {
        try {
            $query = "SELECT 
                        p.product_id,
                        p.name, 
                        p.cost, 
                        p.unit_price, 
                        p.min_stock, 
                        c.name AS category_name, 
                        s.name AS supplier_name,
                        (COALESCE(st.purchase_sum, 0) - COALESCE(bt.sale_sum, 0)) AS current_stock
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
            $e->getMessage();
            exit;
        }
    }

    public function getProductIdByName(string $name) {}
}
<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");

class ProductFactory extends Factory{
    public function __construct(
        private readonly PDO $connection,
        private readonly array $associations 
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_products (name, unit_price, cost, min_stock, category_id, supplier_id, created_at, updated_at) VALUES ";
        
        for($i = 0; $i < $times; $i++){
            $random_name = $this->randomString();
            $random_price = $this->randomFloat(10, 3000, 2);
            $random_cost = $this->randomFloat(10, 3000, 2);
            $random_min_stock = $this->randomInt(5, 50); 
            $query .= "\n($random_name, $random_price, $random_cost, $random_min_stock, category_id, supplier_id, NOW(), NOW())";
        }

        echo $query;
        exit;

        // try {
        //     $query = "INSERT INTO tb_products (name, unit_price, cost, min_stock, category_id, supplier_id, created_at, updated_at) VALUES (:name, :unit_price, :cost, :min_stock, :category_id, :supplier_id, NOW(), NOW())";
        //     $statement = $this->connection->prepare($query);
        //     $statement->bindValue(":name", $this->args["name"]);
        //     $statement->bindValue(":unit_price", $this->args["unit_price"]);
        //     $statement->bindValue(":cost", $this->args["cost"]);
        //     $statement->bindValue(":min_stock", $this->args["min_stock"]);
        //     $statement->bindValue(":category_id", $this->args["category_id"]);
        //     $statement->bindValue(":supplier_id", $this->args["supplier_id"]);
        //     $statement->execute();
        // } catch (PDOException $e) {
        //     $e->getMessage();
        //     exit;
        // }
    }
}
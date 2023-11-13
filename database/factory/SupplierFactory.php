<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");

class SupplierFactory extends Factory {
    public function __construct (
        private readonly PDO $connection
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_suppliers (name, email, contact_number, created_at, updated_at) VALUES ";
        
        for($i = 1; $i <= $times; $i++){
            $random_name = "'" . "Fornecedor $i" . "'";
            $random_email = "'" . $this->randomEmail() . "'";
            $random_contact_number = "'" . $this->randomString() . "'";

            $query .= "\n($random_name, $random_email, $random_contact_number, NOW(), NOW()),";
        }

        $final_query = substr($query, 0 , -1) . ";";
        
        try {
            $statement = $this->connection->prepare($final_query);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function rollback() {
        try {
            $rows = "SELECT supplier_id FROM tb_suppliers;";
            $exists_rows = $this->connection->prepare($rows);
            $exists_rows->execute();

            if ($exists_rows->rowCount() > 0) {
                try {   
                    $query = "DELETE FROM tb_suppliers;
                    ALTER TABLE tb_suppliers AUTO_INCREMENT = 1;";
                    $statement = $this->connection->prepare($query);
                    $statement->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit;
                }
            }
            
            return;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
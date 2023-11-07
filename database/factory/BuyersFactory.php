<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");

class BuyersFactory extends Factory{
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_buyers (name, email, contact_number, created_at, updated_at) VALUES ";
        
        for($i = 1; $i <= $times; $i++){
            $random_name = "'" . $this->randomString() . "'";
            $random_contact = "'" . $this->randomString() . "'";
            $random_email = "'" . $this->randomEmail() . "'";
            $query .= "\n($random_name, $random_email, $random_contact, NOW(), NOW()),";
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
            $rows = "SELECT id FROM tb_buyers;";
            $exists_rows = $this->connection->prepare($rows);

            if ($exists_rows->rowCount() <= 0) {
                return;
            }
            
            $query = "DELETE FROM tb_buyers;
            ALTER TABLE tb_buyers AUTO_INCREMENT = 1;";

            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");

class CategoryFactory extends Factory {
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_categories (name) VALUES ";
        
        for($i = 1; $i <= $times; $i++){
            $random_name = "'" . "Categoria $i" . "'";
            $query .= "\n($random_name),";
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
            $rows = "SELECT category_id FROM tb_categories;";
            $exists_rows = $this->connection->prepare($rows);
            $exists_rows->execute();

            if ($exists_rows->rowCount() > 0) {
                try {
                    $query = "DELETE FROM tb_categories;
                    ALTER TABLE tb_categories AUTO_INCREMENT = 1;";

                    $statement = $this->connection->prepare($query);
                    $statement->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit;
                }
            }

            return;
        } catch (PDOException $e) {
            $e->getMessage();
            exit;
        }
    }
}
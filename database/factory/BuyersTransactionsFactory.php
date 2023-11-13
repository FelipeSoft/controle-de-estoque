<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");
require_once(dirname(__FILE__) . "../../../core/Associable.php");

class BuyersTransactionsFactory extends Factory implements Associable {
    public function __construct(
        private readonly PDO $connection,
        private readonly string $associated_tables,
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_buyers_transactions (product_id, buyer_id, quantity, created_at, updated_at) VALUES ";
        
        $this->associate();

        for($i = 1; $i <= $times; $i++){
            $quantity = $this->randomInt(1, 30);

            $random_product = random_int(0, sizeof($this->tables_pk_array["tb_products"]) - 1);
            $product_id = $this->tables_pk_array["tb_products"][$random_product]["product_id"];

            $random_buyer = random_int(0, sizeof($this->tables_pk_array["tb_buyers"]) - 1);
            $buyer_id = $this->tables_pk_array["tb_buyers"][$random_buyer]["buyer_id"];

            $query .= "\n($product_id, $buyer_id, $quantity, NOW(), NOW()),";
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

    public function rollback () {
        try {
            $rows = "SELECT product_id FROM tb_buyers_transactions;";
            $exists_rows = $this->connection->prepare($rows);
            $exists_rows->execute();

            if ($exists_rows->rowCount() > 0) {
                try {
                    $query = "DELETE FROM tb_buyers_transactions;
                    ALTER TABLE tb_buyers_transactions AUTO_INCREMENT = 1;";
    
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

    public function associate() {
        $tables = explode(",", $this->associated_tables);

        foreach($tables as $i) {
            $table = trim(explode("|", $i)[0]);
            $foreign_key = trim(explode("|", $i)[1]);
            $query = "SELECT " . $foreign_key . " FROM " . $table . ";\n";
            try {
                $statement = $this->connection->query($query);
                if($statement->rowCount() > 0) {
                    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                    $this->tables_pk_array[$table] = $data;
                }
            } catch (PDOException $e) {
                $e->getMessage();
                exit;
            }
        }
    } 
}
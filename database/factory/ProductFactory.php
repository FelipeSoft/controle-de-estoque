<?php
require_once(dirname(__FILE__) . "../../../core/Factory.php");
require_once(dirname(__FILE__) . "../../../core/Associable.php");

class ProductFactory extends Factory implements Associable{
    protected array $tables_pk_array;

    public function __construct(
        private readonly PDO $connection,
        private readonly string $associated_tables,
    ) {}

    public function run(int $times) {
        $query = "INSERT INTO tb_products (name, unit_price, cost, min_stock, category_id, supplier_id, created_at, updated_at) VALUES ";
        
        $this->associate();
        for($i = 1; $i <= $times; $i++){
            $random_name = "'" . "Produto $i" . "'";
            $random_price = $this->randomFloat(10, 3000, 2);
            $random_cost = $this->randomFloat(10, 3000, 2);
            $random_min_stock = $this->randomInt(5, 50); 

            $random_category = random_int(0, sizeof($this->tables_pk_array["tb_categories"]) - 1);
            $category_id = $this->tables_pk_array["tb_categories"][$random_category]["category_id"];

            $random_supplier = random_int(0, sizeof($this->tables_pk_array["tb_suppliers"]) - 1);
            $supplier_id = $this->tables_pk_array["tb_suppliers"][$random_supplier]["supplier_id"];

            $query .= "\n($random_name, $random_price, $random_cost, $random_min_stock, $category_id, $supplier_id, NOW(), NOW()),";
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
            $rows = "SELECT product_id FROM tb_products;";
            $exists_rows = $this->connection->prepare($rows);

            if ($exists_rows->rowCount() < 0) {
                return;
            }
            
            $query = "DELETE FROM tb_products;
            ALTER TABLE tb_products AUTO_INCREMENT = 1;";

            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            $e->getMessage();
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
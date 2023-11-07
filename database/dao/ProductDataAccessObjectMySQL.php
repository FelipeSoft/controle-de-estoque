<?php
require_once ("../domain/interfaces/IProductDataAccessObject.php");

class ProductDataAccessObjectMySQL implements IProductDataAccessObject {
    public function __construct(
        private readonly PDO $connection
    ) {}

    public function all() {
        try {
            $query = "SELECT * FROM tb_products";
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
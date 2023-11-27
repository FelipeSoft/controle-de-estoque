<?php
require_once (dirname(__FILE__) . "../../../domain/interfaces/ISupplierDataAccessObject.php");

class SupplierDataAccessObjectMySQL implements ISupplierDataAccessObject {
    public function __construct(
        private readonly PDO $connection
    ) {}
    
    public function all() {
        try {
            $query = "SELECT * FROM tb_suppliers";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetchAll();
            }

            return [];
        } catch (PDOException $e) {
            $e->getMessage();
            exit;
        }
    }

    public function getAvailableSuppliers() {
        try {
            $query = "SELECT name FROM tb_suppliers GROUP BY name;";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetchAll();
            }

            return [];
        } catch (PDOException $e) {
            $e->getMessage();
            exit;
        }
    }
}
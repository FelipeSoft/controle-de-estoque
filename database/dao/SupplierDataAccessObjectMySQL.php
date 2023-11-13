<?php
require_once ("../domain/interfaces/ISupplierDataAccessObject.php");

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
}
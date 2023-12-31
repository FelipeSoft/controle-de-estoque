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
    public function save(array $supplier) {
        try {
            $query = "INSERT INTO tb_suppliers (name, email, contact_number, created_at, updated_at) VALUES (:name, :email, :contact_number, NOW(), NOW())";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":name", $supplier["name"]);
            $stmt->bindValue(":email", $supplier["email"]);
            $stmt->bindValue(":contact_number", $supplier["contact_number"]);
            $stmt->execute($supplier);
        } catch (PDOException $e) { 
            echo $e->getMessage();
            exit;
        }
    }
    public function remove($id) {
        try {
            $query = "DELETE FROM tb_suppliers WHERE supplier_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) { 
            echo $e->getMessage();
            exit;
        }
    }
    public function get($id)
    {
        try {
            $query = "SELECT * FROM tb_suppliers WHERE supplier_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function edit(array $info) {
        try {
            $query = "UPDATE tb_suppliers SET name = :name, email = :email, contact_number = :contact_number, updated_at = NOW() WHERE supplier_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $info["id"]);
            $stmt->bindValue(":name", $info["name"]);
            $stmt->bindValue(":email", $info["email"]);
            $stmt->bindValue(":contact_number", $info["contact_number"]);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
<?php
require_once (dirname(__FILE__) . "../../../domain/interfaces/IBuyersDataAccessObject.php");

class BuyersDataAccessObjectMySQL implements IBuyersDataAccessObject {
    public function __construct (
        private PDO $connection
    ) {}

    public function all() {
        try {
            $query = "SELECT * FROM tb_buyers";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch (PDOException $e) {
            $e->getMessage();
            exit;
        }
    }
    public function save(array $buyer) {
        try {
            $query = "INSERT INTO tb_buyers (name, email, contact_number, created_at, updated_at) VALUES (:name, :email, :contact_number, NOW(), NOW())";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":name", $buyer["name"]);
            $stmt->bindValue(":email", $buyer["email"]);
            $stmt->bindValue(":contact_number", $buyer["contact_number"]);
            $stmt->execute($buyer);
        } catch (PDOException $e) { 
            echo $e->getMessage();
            exit;
        }
    }

    public function remove($id) {
        try {
            $query = "DELETE FROM tb_buyers WHERE buyer_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) { 
            echo $e->getMessage();
            exit;
        }
    }
}


<?php
require_once ("../domain/interfaces/IBuyersDataAccessObject.php");

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
}


<?php
require_once ("../../domain/interfaces/IUserDataAccessObject.php");

class UserDataAccessObjectMySQL implements IUserDataAccessObject {
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function insert(User $user): void {

    }
    public function all(): array {

    }
    public function getByEmail(string $email): array {
        try {
            $query = "SELECT id, email, password, name, role FROM users WHERE email = :email";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return [];
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function getById(int $id): array {

    }
    public function updateUser(User $user): void {

    }
    public function deleteUser(int $id): void {

    }
}
<?php
require_once ("../../domain/interfaces/IUserDataAccessObject.php");

class UserDataAccessObjectMySQL implements IUserDataAccessObject {
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function insert(User $user): void {
        try {
            $query = "INSERT INTO tb_users (email, password, name, role, access_level, created_at, updated_at) VALUES (:email, :password, :name, :role, :access_level, NOW(), NOW())";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":email", $user->recoverEmail(), PDO::PARAM_STR);
            $statement->bindValue(":password", password_hash($user->recoverPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
            $statement->bindValue(":name", $user->recoverName(), PDO::PARAM_STR);
            $statement->bindValue(":role", $user->recoverRole(), PDO::PARAM_STR);
            $statement->bindValue(":access_level", $user->recoverAccessLevel(), PDO::PARAM_INT);
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function all(): array {
        try {
            $query = "SELECT * FROM tb_users";
            $statement = $this->connection->prepare($query);
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
    public function getByEmail(string $email): array {
        try {
            $query = "SELECT * FROM tb_users WHERE email = :email";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                return $statement->fetch(PDO::FETCH_ASSOC);
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
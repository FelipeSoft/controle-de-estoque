<?php
require_once ("../../domain/interfaces/IUserRepository.php");
require_once ("../../domain/interfaces/IUserDataAccessObject.php");
require_once ("../../domain/entities/User.php");

final class UserRepository implements IUserRepository {
    public function __construct(
        private readonly IUserDataAccessObject $dao 
    ) {}
    public function createUser(User $user): User {
        $this->dao->insert($user);
        return $user;
    }
    public function findAll(): User {
        
    }
    public function getUserByEmail(string $email): User {
        $data = $this->dao->getByEmail($email);
        $created_user = new User($data["name"], $data["email"], $data["password"], $data["access_level"], $data["role"], $data["user_id"]);
        return $created_user;
    }
    public function findById(int $id): User {
        
    }
    public function editUser(array $data): void {
        
    } 
    public function removeUser(int $id): void {
        
    }   
}
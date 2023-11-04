<?php
require_once ("../../domain/interfaces/IUserRepository.php");
require_once ("../../domain/interfaces/IUserDataAccessObject.php");

class UserRepository implements IUserRepository {
    public function __construct(
        private readonly IUserDataAccessObject $dao 
    ) {}
    public function createUser(User $user): void {
        
    }
    public function findAll(): User {
        
    }
    public function getUserByEmail(string $email): array {
        
    }
    public function findById(int $id): User {
        
    }
    public function editUser(array $data): void {
        
    } 
    public function removeUser(int $id): void {
        
    }   
}
<?php

interface IUserRepository {
    public function createUser(User $user): User;
    public function findAll(): User;
    public function getUserByEmail(string $email): User;
    public function findById(int $id): User;
    public function editUser(array $data): void; 
    public function removeUser(int $id): void;   
}
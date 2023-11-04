<?php

interface IUserRepository {
    public function createUser(User $user): void;
    public function findAll(): User;
    public function getUserByEmail(string $email): array;
    public function findById(int $id): User;
    public function editUser(array $data): void; 
    public function removeUser(int $id): void;   
}
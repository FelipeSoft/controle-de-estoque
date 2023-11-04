<?php

interface IUserDataAccessObject {
    public function insert(User $user): void;
    public function all(): array;
    public function getByEmail(string $email): array;
    public function getById(int $id): array;
    public function updateUser(User $user): void;
    public function deleteUser(int $id): void;
}
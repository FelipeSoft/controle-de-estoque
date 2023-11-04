<?php
class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;    
    private int $access_level;
    private string $role;
    
    public function __construct(array $data) {
        $this->id = $data["id"] ?? null;
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->access_level = $data["access_level"];
        $this->role = $data["role"];
    }
    private function validateEmail(): void { 
        if (!filter_var($this->name, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Cannot use this format of e-mail.");
        }
    }
    public function changeName(string $name): void {
        $this->name = $name;
    }
    public function changeEmail(string $email): void {
        $this->email = $email;
    }

    public function changePassword(string $password): void {
        $this->password = $password;
    }

    public function changeAccessLevel(int $access_level): void {
        $this->access_level = $access_level;
    }

    public function changeRole(string $role): void {
        $this->role = $role;
    }
}
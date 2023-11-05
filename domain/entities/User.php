<?php
class User {
    private int | null $id;
    private string $name;
    private string $email;
    private string $password;    
    private int | string $access_level = 1;
    private string $role;
    
    public function __construct(string $name, string $email, string $password, $access_level = 1, string $role = "Operador", $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->access_level = $access_level;
        $this->role = $role;
        
        $this->validateEmail();
    }
    private function validateEmail(): void { 
        if (filter_var($this->name, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Cannot use this format of e-mail.");
        }
    }
    public function recoverID(): int | null {
        return $this->id;
    }
    public function recoverName(): string {
        return $this->name;
    }
    public function recoverEmail(): string {
        return $this->email;
    }

    public function recoverPassword(): string {
        return $this->password;
    }

    public function recoverAccessLevel(): string {
        return $this->access_level;
    }

    public function recoverRole(): string {
        return $this->role;
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
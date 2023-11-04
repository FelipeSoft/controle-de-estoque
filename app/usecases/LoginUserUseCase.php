<?php

require_once("../../domain/interfaces/IUseCase.php");

final class LoginUserUseCase implements IUseCase {
    public function __construct(
        private readonly IUserRepository $repository 
    ) {}
    public function execute(array $args): bool | null{
        $user = $this->repository->getUserByEmail($args["email"]);

        if ($user !== null) {
            $userFromDatabase = $user["password"];
            if (password_verify($userFromDatabase["password"], $args["password"])) return true;

            return false;
        }

        return null;
    }
}
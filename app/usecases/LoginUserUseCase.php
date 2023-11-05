<?php

require_once("../../domain/interfaces/IUseCase.php");

final class LoginUserUseCase implements IUseCase {
    public function __construct(
        private readonly IUserRepository $repository 
    ) {}
    public function execute(array $args): User | bool{
        $user = $this->repository->getUserByEmail($args["email"]);

        if ($user !== null) {
            $passwordFromDatabase = $user->recoverPassword();
            if (password_verify($args["password"], $passwordFromDatabase)) {
                return $user;
            };

            return false;
        }

        return false;
    }
}
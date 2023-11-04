<?php

require_once("../../domain/interfaces/IUseCase.php");

final class LoginUserUseCase implements IUseCase {
    public function __construct(
        private readonly IUserRepository $repository 
    ) {}
    public function execute(array $args): bool{
        $user = new User($args["name"], $args["email"], $args["password"]);
        $attempt = $this->repository->createUser($user);

        return $attempt ? true : false;
    }
}
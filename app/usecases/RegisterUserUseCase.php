<?php

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../domain/entities/User.php");

final class RegisterUserUseCase implements IUseCase {
    public function __construct(
        private readonly IUserRepository $repository 
    ) {}
    public function execute(array $args): User{
        $user = new User($args["name"], $args["email"], $args["password"]);
        $this->repository->createUser($user);
        $data = $this->repository->getUserByEmail($user->recoverEmail());
        return $data;
    }
}
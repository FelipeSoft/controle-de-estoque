<?php
require("../../config/config.php");
require_once("../controllers/User/RegisterUserController.php");
require_once("../usecases/RegisterUserUseCase.php");
require_once("../../database/repository/UserRepository.php");
require_once("../../database/dao/UserDataAccessObjectMySQL.php");

$dao = new UserDataAccessObjectMySQL($connection);
$repository = new UserRepository($dao);
$usecase = new RegisterUserUseCase($repository);
$controller = new RegisterUserController($usecase);

$controller->handle();
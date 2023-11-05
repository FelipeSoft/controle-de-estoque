<?php
require("../../config/config.php");
require_once("../controllers/User/LoginUserController.php");
require_once("../usecases/LoginUserUseCase.php");
require_once("../../database/repository/UserRepository.php");
require_once("../../database/dao/UserDataAccessObjectMySQL.php");

$dao = new UserDataAccessObjectMySQL($connection);
$repository = new UserRepository($dao);
$usecase = new LoginUserUseCase($repository);
$controller = new LoginUserController($usecase);

$controller->handle();
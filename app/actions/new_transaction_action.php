<?php
require("../../config/config.php");
require_once("../controllers/Transaction/TransactionController.php");
require_once("../usecases/NewTransactionUseCase.php");
require_once("../../database/repository/TransactionRepository.php");
require_once("../../database/dao/TransactionDataAccessObjectMySQL.php");

$dao = new TransactionDataAccessObjectMySQL($connection);
$repository = new TransactionRepository($dao);
$usecase = new NewTransactionUseCase($repository);
$controller = new TransactionController($usecase);

$controller->handle();

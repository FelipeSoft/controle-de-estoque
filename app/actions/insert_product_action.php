<?php
require("../../config/config.php");
require_once("../controllers/Product/ProductController.php");
require_once("../usecases/InsertProductUseCase.php");
require_once("../../database/repository/ProductRepository.php");
require_once("../../database/dao/ProductDataAccessObjectMySQL.php");

$dao = new ProductDataAccessObjectMySQL($connection);
$repository = new ProductRepository($dao);
$usecase = new InsertProductUseCase($repository);
$controller = new ProductController($usecase);

$controller->handle();

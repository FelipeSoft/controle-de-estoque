<?php
session_start();
require_once("../../database/dao/ProductDataAccessObjectMySQL.php");
require("../../config/config.php");

$cost = filter_input(INPUT_POST ,"product_cost", FILTER_SANITIZE_STRING);
$unit_price = filter_input(INPUT_POST ,"product_price", FILTER_SANITIZE_STRING);
$min_stock = filter_input(INPUT_POST ,"product_min_stock", FILTER_SANITIZE_STRING);

if($cost && $unit_price && $min_stock){
    $dao = new ProductDataAccessObjectMySQL($connection);
    $dao->save([
        "cost" => $cost,
        "unit_price" => $unit_price,
        "min_stock" => $min_stock
    ]);
    header("Location: ../../views/products.php");
    exit;
}

$_SESSION['flash_product'] = "Campos incorretos, informe corretamente o custo, preço e estoque mínimo!";
header("Location: ../../views/products.php");
exit;
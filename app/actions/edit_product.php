<?php
require_once("../../database/dao/ProductDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$product_cost = filter_input(INPUT_POST, "product_cost", FILTER_SANITIZE_STRING);
$product_price = filter_input(INPUT_POST, "product_price", FILTER_SANITIZE_STRING);
$product_min_stock = filter_input(INPUT_POST, "product_min_stock", FILTER_SANITIZE_STRING);

if ($id) {
    $dao = new ProductDataAccessObjectMySQL($connection);

    $product = $dao->get($id);
    $cost = $product["cost"];
    $unit_price = $product["unit_price"];
    $min_stock = $product["min_stock"];

    if ($product_cost || $product_price || $product_min_stock) {
        $dao->edit([
            "id" => $id,
            "cost" => $product_cost ?? $cost,
            "unit_price" => $product_price ?? $unit_price,
            "min_stock" => $product_min_stock ?? $min_stock
        ]);
    }
    header("Location: ../../views/products.php");
    exit;
}
header("Location: ../../views/products.php");
exit;
<?php
require_once("../../database/dao/ProductDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_GET,"product_id", FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $dao = new ProductDataAccessObjectMySQL($connection);
    $dao->remove($id);
}
header("Location: ../../views/products.php");
exit;
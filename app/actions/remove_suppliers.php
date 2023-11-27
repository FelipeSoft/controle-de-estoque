<?php
require_once("../../database/dao/SupplierDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_GET,"supplier_id", FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $dao = new SupplierDataAccessObjectMySQL($connection);
    $dao->remove($id);
}
header("Location: ../../views/suppliers.php");
exit;
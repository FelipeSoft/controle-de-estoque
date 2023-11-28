<?php
require_once("../../database/dao/SupplierDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_POST,"id", FILTER_SANITIZE_NUMBER_INT);
$supplier_name = filter_input(INPUT_POST, "supplier_name", FILTER_SANITIZE_STRING);
$supplier_email = filter_input(INPUT_POST, "supplier_email", FILTER_SANITIZE_STRING);
$supplier_telephone = filter_input(INPUT_POST, "supplier_telephone", FILTER_SANITIZE_STRING);

if ($id) {
    $dao = new SupplierDataAccessObjectMySQL($connection);
    
    $supplier = $dao->get($id);
    $name = $supplier["name"];
    $email = $supplier["email"];
    $telephone = $supplier["contact_number"];

    if ($supplier_name || $supplier_email || $supplier_telephone) {
        $dao->edit([
            "id" => $id,
            "name" => $supplier_name ?? $name,
            "email" => $supplier_email ?? $email,
            "contact_number" => $supplier_telephone ?? $telephone
        ]);
    }

    header("Location: ../../views/suppliers.php");
    exit;
}
header("Location: ../../views/suppliers.php");
exit;
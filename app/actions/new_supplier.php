<?php
session_start();
require_once("../../database/dao/SupplierDataAccessObjectMySQL.php");
require("../../config/config.php");

$name = filter_input(INPUT_POST ,"supplier_name", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST ,"supplier_email", FILTER_SANITIZE_STRING);
$telephone = filter_input(INPUT_POST ,"supplier_telephone", FILTER_SANITIZE_STRING);

if($name && $email && $telephone){
    $dao = new SupplierDataAccessObjectMySQL($connection);
    $dao->save([
        "name" => $name,
        "email" => $email,
        "contact_number" => $telephone
    ]);
    header("Location: ../../views/suppliers.php");
    exit;
}

$_SESSION['flash_supplier'] = "Campos incorretos, informe corretamente o nome, email e telefone!";
header("Location: ../../views/suppliers.php");
exit;
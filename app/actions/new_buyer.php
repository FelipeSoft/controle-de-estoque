<?php
session_start();
require_once("../../database/dao/BuyersDataAccessObjectMySQL.php");
require("../../config/config.php");

$name = filter_input(INPUT_POST ,"buyer_name", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST ,"buyer_email", FILTER_SANITIZE_STRING);
$telephone = filter_input(INPUT_POST ,"buyer_telephone", FILTER_SANITIZE_STRING);

if($name && $email && $telephone){
    $dao = new BuyersDataAccessObjectMySQL($connection);
    $dao->save([
        "name" => $name,
        "email" => $email,
        "contact_number" => $telephone
    ]);
    header("Location: ../../views/buyers.php");
    exit;
}

$_SESSION['flash_buyer'] = "Campos incorretos, informe corretamente o nome, email e telefone!";
header("Location: ../../views/buyers.php");
exit;
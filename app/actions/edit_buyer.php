<?php
require_once("../../database/dao/BuyersDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_POST,"id", FILTER_SANITIZE_NUMBER_INT);
$buyer_name = filter_input(INPUT_POST, "buyer_name", FILTER_SANITIZE_STRING);
$buyer_email = filter_input(INPUT_POST, "buyer_email", FILTER_SANITIZE_STRING);
$buyer_telephone = filter_input(INPUT_POST, "buyer_telephone", FILTER_SANITIZE_STRING);

if ($id) {
    $dao = new BuyersDataAccessObjectMySQL($connection);
    
    $buyer = $dao->get($id);
    $name = $buyer["name"];
    $email = $buyer["email"];
    $telephone = $buyer["contact_number"];

    if ($buyer_name || $buyer_email || $buyer_telephone) {
        $dao->edit([
            "id" => $id,
            "name" => $buyer_name ?? $name,
            "email" => $buyer_email ?? $email,
            "contact_number" => $buyer_telephone ?? $telephone
        ]);
    }
    header("Location: ../../views/buyers.php");
    exit;
}
header("Location: ../../views/buyers.php");
exit;
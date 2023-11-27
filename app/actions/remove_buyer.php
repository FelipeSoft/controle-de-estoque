<?php
require_once("../../database/dao/BuyersDataAccessObjectMySQL.php");
require("../../config/config.php");

$id = filter_input(INPUT_GET,"buyer_id", FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $dao = new BuyersDataAccessObjectMySQL($connection);
    $dao->remove($id);
}
header("Location: ../../views/buyers.php");
exit;
<?php
require("../../config/config.php");
require("../../database/dao/TransactionDataAccessObjectMySQL.php");

$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $transactions = new TransactionDataAccessObjectMySQL($connection);
    $transactions->remove($id);
    Controller::redirect("../../index.php");
}
<?php
require("../../config/config.php");
require("../../core/Controller.php");
require("../../database/dao/TransactionDataAccessObjectMySQL.php");

$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    $transactions = new TransactionDataAccessObjectMySQL($connection);
    $transactions->remove($id);
    header("Location: ../../../index.php");
    exit;
}
header("Location: ../../../index.php");
exit;
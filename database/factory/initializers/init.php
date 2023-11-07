<?php
require_once(dirname(__FILE__) . "../../ProductFactory.php");
require_once(dirname(__FILE__) . "../../CategoryFactory.php");
require_once(dirname(__FILE__) . "../../SupplierFactory.php");
require_once(dirname(__DIR__) . "../../../config/config.php");

// Rode os comandos para alimentar o banco de dados
$cf = new CategoryFactory($connection);
$cf->rollback();
$cf->run(5);

$sf = new SupplierFactory($connection);
$sf->rollback();
$sf->run(10);

$pf = new ProductFactory($connection, "tb_categories|category_id, tb_suppliers|supplier_id");
$pf->rollback();
$pf->run(20);


<?php
require_once(dirname(__FILE__) . "../../ProductFactory.php");
require_once(dirname(__FILE__) . "../../CategoryFactory.php");
require_once(dirname(__FILE__) . "../../SupplierFactory.php");
require_once(dirname(__FILE__) . "../../BuyersFactory.php");
require_once(dirname(__FILE__) . "../../BuyersTransactionsFactory.php");
require_once(dirname(__FILE__) . "../../SuppliersTransactionsFactory.php");
require_once(dirname(__DIR__) . "../../../config/config.php");

// Rode os comandos para alimentar o banco de dados.
// Atente-se na ordem de execução dos fatores, comece pelas tabelas/entidades que não possuem chaves estrangeiras e relacionamentos.
$cf = new CategoryFactory($connection);
$cf->rollback();
$cf->run(5);

$sf = new BuyersFactory($connection);
$sf->rollback();
$sf->run(10);

$sf = new SupplierFactory($connection);
$sf->rollback();
$sf->run(10);

$pf = new ProductFactory($connection, "tb_categories|category_id, tb_suppliers|supplier_id");
$pf->rollback();
$pf->run(20);

$pf = new BuyersTransactionsFactory($connection, "tb_products|product_id");
$pf->rollback();
$pf->run(20);

$pf = new SuppliersTransactionsFactory($connection, "tb_products|product_id");
$pf->rollback();
$pf->run(20);




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

// Limpeza de Registros
$cf->rollback();

// Seeding da Tabela
$cf->run(5);

$bf = new BuyersFactory($connection);
$bf->rollback();
$bf->run(10);

$sf = new SupplierFactory($connection);
$sf->rollback();
$sf->run(10);

$pf = new ProductFactory($connection, "tb_categories|category_id, tb_suppliers|supplier_id");
$pf->rollback();
$pf->run(20);

$btf = new BuyersTransactionsFactory($connection, "tb_products|product_id, tb_buyers|buyer_id");
$btf->rollback();
$btf->run(20);

$stf = new SuppliersTransactionsFactory($connection, "tb_products|product_id, tb_suppliers|supplier_id");
$stf->rollback();
$stf->run(20);




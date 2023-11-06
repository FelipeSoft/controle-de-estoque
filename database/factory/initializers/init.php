<?php
require_once(dirname(__FILE__) . "../../ProductFactory.php");
require_once(dirname(__DIR__) . "../../../config/config.php");

$product_factory = new ProductFactory($connection);
$product_factory->run(20);
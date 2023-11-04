<?php
require_once(dirname(__FILE__) ."/core/Connection.php");

define("DB_NAME", "db_controle_de_estoque");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_DRIVER", "mysql");

$BASE_URL = "http://localhost/controle-de-estoque";
global $BASE_URL;

$connection = new Connection(DB_DRIVER, DB_HOST, DB_PORT, DB_USERNAME, DB_PASSWORD);
$connection = $connection->connect();

<?php
class Connection {
    private PDO $connection;
    private string $host;
    private string $port;
    private string $username;
    private string $password;
    private string $database;
    private string $driver;

    public function __construct($driver, $host, $port, $username, $password = "", $database) {
        try {
            $pdo = new PDO("$driver:dbname=$database;host=$host:$port;", $username, $password);

            $this->pdo = $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    public function connect(): PDO {
        return $this->connection;
    }
}
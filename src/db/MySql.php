<?php

namespace App\Db;
class MySql
{
    private static ?self $_instance = null;
    private $dbName;
    private $dbHost;
    private $dbPort;
    private $dbUser;
    private $dbPassword;
    private ?\PDO $pdo = null;

    private function __construct()
    {
        $config = parse_ini_file(APP_ROOT . '/' . APP_ENV);
        $this->dbName = $config['DB_NAME'];
        $this->dbHost = $config['DB_HOST'];
        $this->dbPort = $config['DB_PORT'];
        $this->dbUser = $config['DB_USER'];
        $this->dbPassword = $config['DB_PASSWORD'];
    }

    public static function getInstance(): self
    {
        if (self::$_instance === null) {
            self::$_instance = new MySql();
        }
        return self::$_instance;
    }

    public function getPDO(): \PDO
    {
        if (is_null($this->pdo)) {
            $this->pdo = new \PDO("mysql:dbname={$this->dbName};charset=utf8;host={$this->dbHost}:{$this->dbPort}", $this->dbUser, $this->dbPassword);
        }
        return $this->pdo; // retourne l'instance de PDO déja créer
    }
}
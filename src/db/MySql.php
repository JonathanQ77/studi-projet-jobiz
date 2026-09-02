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
        $dbconfig = parse_ini_file(APP_ROOT . '/' . APP_ENV);
        $this->dbName = $dbconfig['DB_NAME'];
        $this->dbHost = $dbconfig['DB_HOST'];
        $this->dbPort = $dbconfig['DB_PORT'];
        $this->dbUser = $dbconfig['DB_USER'];
        $this->dbPassword = $dbconfig['DB_PASSWORD'];
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
            $this->pdo = new \PDO(` mysql:dbname=$this->dbName;charset=utf8;host=$this->dbHost;port=$this->dbPort`, $this->dbUser, $this->dbPassword);
        }
        return $this->pdo; // retourne l'instance de PDO déja créer
    }
}
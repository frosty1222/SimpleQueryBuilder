<?php
namespace queryBuilder\Config;
use PDO;
use Dotenv\Dotenv;
class Database
{
    public $db;
    public $user;
    public $pass;
    public $charset = 'utf8mb4';
    private static $bdd = null;
    public function __construct(){
      $this->db = $_ENV['DBNAME'];
      $this->user = $_ENV['USERNAME'];
      $this->pass = $_ENV['PASSWORD'];
    }
    public function getDB(){
        $dsn = "mysql:dbname=$this->db;charset=$this->charset";
        try {
            self::$bdd = new \PDO($dsn, $this->user, $this->pass);
       } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
       }
       return self::$bdd;
    }
}
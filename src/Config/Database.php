<?php
namespace queryBuilder\Config;
use PDO;
class Database
{
    public $db;
    public $user = 'root';
    public $pass = '12345';
    public $charset = 'utf8mb4';
    private static $bdd = null;
    public function __construct($db){
      $this->db = $db;
      $this->user;
      $this->pass;
      $this->charset;
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
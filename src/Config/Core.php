<?php 
namespace queryBuilder\Config;
use core\Model;
class Core{
    public function __construct()
    {
        $model = new Model();
        $database = new Database();
    }
}
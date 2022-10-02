<?php
namespace queryBuilder\SimpleModel;
use queryBuilder\Config\Database;
use PDO;
class ResourceModel implements ModelInterface{
     protected $connect;
     protected $table;
     protected $id;
     protected $model;
     public function __init($table,$id,$model)
     {
        $this->connect = new Database('exampleDB');
        $this->id = $id;
        $this->table = $table;
        $this->model = $model;
     }
     public function save($model){
      $arrayModel = $model->getProperties();
      $newConvert = array_reduce(array_keys($arrayModel),function ($carry,$item){
         return $carry.$item.'=:'.$item.',';
      });
            $arrayModeKey = rtrim($newConvert,",");
            $id =$arrayModel['id'];
         if(isset($arrayModel['id']) == null){
            $sql = "INSERT INTO $this->table SET $arrayModeKey";
            }else{
            $sql = "UPDATE $this->table SET $arrayModeKey where id = $id";
            }
         $req =$this->connect->getDB()->prepare($sql);
         return $req->execute($arrayModel);
   }
   public function delete($id){
      $sql = "DELETE FROM $this->table WHERE id = $id";
      $req = $this->connect->getDB()->prepare($sql);
      return $req->execute();
   } 
   public function getAll(){
      $sql = "SELECT * FROM $this->table";
      $req =$this->connect->getDB()->prepare($sql);
      $myClass = get_class($this->model);
      $req->execute();
      return $req->fetchAll(PDO::FETCH_CLASS,$myClass);
   }
      // get value by the id element
   public function getValueById($id){
         $myClass = get_class($this->model);
         $sql = "SELECT * FROM $this->table where id = $id";
         $req =$this->connect->getDB()->prepare($sql);
         $req->execute();
         return $req->fetchObject($myClass);
   }
}
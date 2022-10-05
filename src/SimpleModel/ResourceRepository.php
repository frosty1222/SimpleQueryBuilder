<?php
namespace queryBuilder\SimpleModel;
class ResourceRepository{
    public $myClass;
    public $table;
    public $model;
    public function __construct($table,$model){
      $this->table = $table;
      $this->model = $model;
      $this->myClass = new TableResourceModel($this->table,$this->model);
    }
    public function add($model){
        $this->myClass->save($model);
    }
    public function getById($id){
       return  $this->myClass->getValueById($id);
    }
    public function delete($id){
        return $this->myClass->delete($id);
    }
    public function getAll(){
      return $this->myClass->getAll();
    }
}
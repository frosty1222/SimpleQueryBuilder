<?php
namespace queryBuilder\Models\BookModel;
class BookRepository{
    public $myClass;
    public function __construct(){
      $this->myClass = new BookResourceModel();
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
    public function getAll($table){
      return $this->myClass->getAll($table);
    }
}
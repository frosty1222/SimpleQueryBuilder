<?php
namespace queryBuilder\SimpleModel;

class TableResourceModel extends ResourceModel{
    protected $table;
    protected $id;
    protected $model;
     public function __construct($table,$model){
      $this->table = $table;
      $this->model = $model;
        parent::__init($this->table,'id',$this->model);
     }
}
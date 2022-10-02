<?php
namespace queryBuilder\Models\BookModel;

use queryBuilder\SimpleModel\ResourceModel;
use queryBuilder\Models\BookModel\BookModel;

class BookResourceModel extends ResourceModel{
    protected $table;
    protected $id;
    protected $model;
     public function __construct(){
        parent::__init('books','id',new BookModel());
     }
}
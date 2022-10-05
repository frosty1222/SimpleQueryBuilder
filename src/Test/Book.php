<?php
namespace queryBuilder\Test;
use queryBuilder\SimpleModel\ResourceRepository;
use queryBuilder\Models\BookModel\BookModel;
class Book{
  public $respository; 
  public function __construct(){
     $this->respository = new ResourceRepository('books',new BookModel());
  }
  public function getAllData(){
      return $this->respository->getAll();
  }
}


<?php
namespace queryBuilder\Test;
use queryBuilder\Models\BookModel\BookRepository;
class Book{
     public function getAllData(){
        $bookRepository = new BookRepository();
        return $bookRepository->getAll('books');
     }
}

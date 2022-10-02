<?php 
namespace queryBulder\interfaces;

interface IteratorAggregate extends Traversable{
    public function getIterator();
}
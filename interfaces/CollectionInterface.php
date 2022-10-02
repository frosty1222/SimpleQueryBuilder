<?php 
namespace queryBulder\interfaces;
interface CollectionInterface extends IteratorAggregate, Arrayable,ArrayAccess,Countable{
    public  function  isEmpty();
    public  function filter($callBack);
    public  function  clear();
    public  function  add($element);
    public  function  first();
    public  function last();
    public  function  map($callBack);
    public function offsetExists($offset);
    public function offsetGet($offset);
    public function offsetSet($offset,$value);
    public function offsetUnset($offset);
}
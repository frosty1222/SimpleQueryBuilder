<?php 
namespace queryBulder\interfaces;
interface ArrayAccess{
    public function offsetExists($offset);
    public function offsetGet($offset);
    public function offsetSet($offset,$value);
    public function offsetUnset($offset);
}
<?php
namespace core;
class Model
{
        //get properties of the child models then return it into an array
         public function getProperties(){
            $reflection = new \ReflectionClass($this);
            $var = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE);
            $result = [];
            foreach ($var as $value){
                $result[$value->getName()] = $this->get($value->getName());
            }
            return $result;
         }
         //get the properties function
         public function get($properties){
             return call_user_func(array($this,"get".ucfirst($properties)));
         }
}
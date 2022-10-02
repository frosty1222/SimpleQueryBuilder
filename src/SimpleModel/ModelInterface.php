<?php
namespace queryBuilder\SimpleModel;
interface ModelInterface{
    public function __init($table,$id,$model);
    public function save($model);
    public function delete($model);
}
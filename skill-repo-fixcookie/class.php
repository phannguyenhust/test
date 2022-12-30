<?php
class Validate{
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function message(){
        return $this->name;
    }
}

<?php
class Item{
    public $id;
    public $name;
    public $price;
    //public $stock;

    public function __construct($id,$name,$price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

}


?>
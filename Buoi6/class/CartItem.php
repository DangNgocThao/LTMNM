<?php
class CartItem extends Product
{
    public $qty;

    public function __construct($id = 0, $name = '', $desc = '', $price = '', $qty = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
        $this->qty = $qty;
    }
}

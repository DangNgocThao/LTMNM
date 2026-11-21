<?php
class CartItem extends Product
{
    public $qty;

    public function __construct($id = 0, $name = '', $price = '', $image = '', $qty = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->qty = $qty;
    }
}

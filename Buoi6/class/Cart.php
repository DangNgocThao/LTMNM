<?php
class Cart
{
    public static function add($data, $id)
    {
        $product = Product::getOneByID($data, $id);
        if ($product) {
            $idCol = array_column($_SESSION['cart'], 'id');
            if (in_array($id, $idCol)) {
                $_SESSION['cart'][$id]->qty += 1;
            } else {
                $item = new CartItem($id, $product->name, $product->desc, $product->price, 1);
                $_SESSION['cart'][$id] = $item;
            }
            return true;
        }
        return false;
    }

    public static function remove($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    public static function update($id, $qty)
    {
        $_SESSION['cart'][$id]->qty = $qty;
    }

    public static function removeAll()
    {
        $_SESSION['cart'] = [];
    }
}

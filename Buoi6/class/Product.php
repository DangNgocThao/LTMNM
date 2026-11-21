<?php
class Product
{
    public $id;
    public $name;
    public $desc;
    public $price;

    public function __construct($id = 0, $name = '', $desc = '', $price = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    }

    public static function getAll($filename)
    {
        $lines = explode("\n", file_get_contents($filename));
        $str = trim(array_shift($lines), "﻿");
        $headers = str_getcsv($str);
        $data = array();
        foreach ($lines as $line) {
            $product = new Product();

            foreach (str_getcsv($line) as $key => $field)
                $product->{$headers[$key]} = $field;

            $data[] = $product;
        }
        return $data;
    }

    public static function getOneByID($data, $id)
    {
        foreach ($data as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
        return null;
    }

    public static function getLastID($data)
    {
        $last = end($data);
        return $last->id;
    }
}

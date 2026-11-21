<?php
class Category
{
    public $id;
    public $name;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM category";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'category');
            return $stmt->fetchAll();
        }
    }

    public static function getByProId($pdo, $pro_id)
    {
        $sql = "SELECT category.id, category.name FROM pro_cat, category, product WHERE product.id=pro_cat.pro_id AND pro_cat.cat_id=category.id AND product.id=:pro_id;";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":pro_id", $pro_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'category');
            return $stmt->fetchAll();
        }
    }
}

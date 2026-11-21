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

    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = "select * from product";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $data = array();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
                $data[] = new Product($product['id'], $product['name'], $product['description'], $product['price']);
            }
            return $data;
        } else {
            $error = $stmt->errorInfo();
            echo $error;
        }
    }

    public static function getOneById($id)
    {
        $pdo = Database::connect();
        $sql = "select * from product where id= :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $product = new Product($data[0]['id'], $data[0]['name'], $data[0]['description'], $data[0]['price']);
            return $product;
        } else {
            return null;
        }
    }

    public static function getLastId($data)
    {
        $last = end($data);
        return $last->id;
    }

    public static function add($name, $desc, $price)
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO product(name, description, price) VALUES (:name, :desc, :price)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $id = $pdo->lastInsertId();
            echo "Insert thành công, id mới là $id";
        } else {
            $error = $stmt->errorInfo();
            var_dump($error);
        }
    }

    public static function delete($id)
    {
        if (Product::getOneById($id) != null) {
            $pdo = Database::connect();
            $sql = "DELETE FROM product WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                var_dump($stmt->errorInfo());
                return false;
            }
        }
        return false;
    }

    public static function update($name, $desc, $price, $id)
    {
        $pdo = Database::connect();
        $sql = "UPDATE product SET name=:name, description=:desc, price=:price WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }
}

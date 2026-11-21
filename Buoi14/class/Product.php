<?php
class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image_file;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM product";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function getCount($pdo, $limit)
    {
        $sql = "SELECT COUNT(*) FROM product";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            return ceil($stmt->fetchColumn() / $limit);
        }
    }

    public static function getPage($pdo, $limit, $offset)
    {
        $sql = "SELECT * FROM product ORDER by id DESC LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function getOneByID($pdo, $id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetch();
        }
    }

    public function add($pdo)
    {
        $sql = "INSERT INTO product(name, description, price, image_file) VALUES (:name, :desc, :price, :image_file)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $this->description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_INT);
        $stmt->bindParam(':image_file', $this->image_file, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->id = $pdo->lastInsertId();
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }

    public function delete($pdo)
    {
        $sql = "DELETE FROM product WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }

    public function update($pdo)
    {
        $sql = "UPDATE product SET name=:name, description=:desc, price=:price, image_file=:image_file WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $this->description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_INT);
        $stmt->bindParam(':image_file', $this->image_file, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }
}

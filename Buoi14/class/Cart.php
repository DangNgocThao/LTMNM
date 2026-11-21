<?php
class Cart
{
    public $username;
    public $id;
    public $quantity;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM cart, product WHERE username = :username AND cart.id=product.id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $_SESSION['log_detail'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cart');
            return $stmt->fetchAll();
        }
    }

    public function add($pdo)
    {
        $sql = "SELECT * from cart where username= :username and id= :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            if (!$data = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                $sql = "INSERT INTO cart(username, id, quantity) VALUES (:username, :id, :quantity)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                $stmt->bindValue(':quantity', 1, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->quantity = $data[0]['quantity'] + 1;
                $this->update($pdo);
            }
        }
    }

    public function delete($pdo)
    {
        $sql = "DELETE FROM cart WHERE username= :username and id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function empty($pdo)
    {
        $sql = "DELETE FROM cart WHERE username= :username";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($pdo)
    {
        $sql = "UPDATE cart SET quantity=:quantity WHERE username= :username and id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $this->quantity, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

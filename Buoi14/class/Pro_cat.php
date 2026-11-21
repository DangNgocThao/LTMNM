<?php
class Pro_cat
{
    public $pro_id;
    public $cat_id;

    public static function getCatId($pdo, $pro_id)
    {
        $sql = "SELECT * FROM pro_cat WHERE pro_id = :pro_id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'pro_cat');
            return $stmt->fetchAll();
        }
    }

    public function add($pdo)
    {
        $sql = "INSERT INTO pro_cat VALUES (:pro_id, :cat_id)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':pro_id', $this->pro_id, PDO::PARAM_INT);
        $stmt->bindParam(':cat_id', $this->cat_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }

    public function delete($pdo)
    {
        $sql = "DELETE FROM pro_cat WHERE pro_id = :pro_id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":pro_id", $this->pro_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }
}

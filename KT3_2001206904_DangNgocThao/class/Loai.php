<?php
class Loai
{
    public $maloai;
    public $tenloai;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM loai";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Loai');
            return $stmt->fetchAll();
        }
    }
}

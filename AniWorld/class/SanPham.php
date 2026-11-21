<?php
class SanPham
{
    public $maSP;
    public $hinh;
    public $tenSP;
    public $tacGia;
    public $gia;
    public $namXB;
    public $moTa;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM sanpham";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'SanPham');
            return $stmt->fetchAll();
        }
    }

    public static function getOneByID($pdo, $maSP)
    {
        $sql = "SELECT * FROM sanpham WHERE maSP = :maSP";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':maSP', $maSP, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'SanPham');
            return $stmt->fetch();
        }
    }

    public function add($pdo)
    {
        $sql = "INSERT INTO sanpham(hinh, tenSP, tacGia, gia, namXB, moTa) VALUES (:hinh, :tenSP, :tacGia, :gia, :namXB, :moTa)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':hinh', $this->hinh, PDO::PARAM_INT);
        $stmt->bindParam(':tenSP', $this->tenSP, PDO::PARAM_STR);
        $stmt->bindParam(':tacGia', $this->tacGia, PDO::PARAM_STR);
        $stmt->bindParam(':gia', $this->gia, PDO::PARAM_INT);
        $stmt->bindParam(':namXB', $this->namXB, PDO::PARAM_INT);
        $stmt->bindParam(':moTa', $this->moTa, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->maSP = $pdo->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete($pdo)
    {
        $sql = "DELETE FROM sanpham WHERE maSP = :maSP";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':maSP', $this->maSP, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($pdo)
    {
        $sql = "UPDATE sanpham SET hinh=:hinh, tenSP=:tenSP, tacGia=:tacGia, gia=:gia, namXB=:namXB, moTa=:moTa WHERE maSP=:maSP";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':hinh', $this->hinh, PDO::PARAM_INT);
        $stmt->bindParam(':tenSP', $this->tenSP, PDO::PARAM_STR);
        $stmt->bindParam(':tacGia', $this->tacGia, PDO::PARAM_STR);
        $stmt->bindParam(':gia', $this->gia, PDO::PARAM_INT);
        $stmt->bindParam(':namXB', $this->namXB, PDO::PARAM_INT);
        $stmt->bindParam(':moTa', $this->moTa, PDO::PARAM_STR);
        $stmt->bindParam(':maSP', $this->maSP, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

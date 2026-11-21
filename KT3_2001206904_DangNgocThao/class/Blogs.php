<?php
class Blogs
{
    public $mablog;
    public $hinh;
    public $tieude;
    public $mota;
    public $ngaydang;
    public $maloai;
    public $trangthai;

    public static function getPage($pdo, $trangthai, $limit, $offset)
    {
        $sql = "SELECT * FROM blogs, loai WHERE blogs.maloai=loai.maloai AND trangthai=:trangthai ORDER by mablog DESC LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':trangthai', $trangthai, PDO::PARAM_BOOL);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Blogs');
            return $stmt->fetchAll();
        }
    }

    public static function getCount($pdo, $trangthai, $limit)
    {
        $sql = "SELECT COUNT(*) FROM blogs WHERE trangthai=:trangthai";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':trangthai', $trangthai, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            return ceil($stmt->fetchColumn() / $limit);
        }
    }

    public static function getOneByID($pdo, $id)
    {
        $sql = "SELECT * FROM blogs, loai WHERE blogs.maloai=loai.maloai AND mablog = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Blogs');
            return $stmt->fetch();
        }
    }

    public function add($pdo)
    {
        $sql = "INSERT INTO blogs(hinh, tieude, mota, ngaydang, maloai, trangthai) VALUES (:hinh, :tieude, :mota, :ngaydang, :maloai, :trangthai)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':hinh', $this->hinh, PDO::PARAM_STR);
        $stmt->bindParam(':tieude', $this->tieude, PDO::PARAM_STR);
        $stmt->bindParam(':mota', $this->mota, PDO::PARAM_STR);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $stmt->bindParam(':ngaydang', date("Y-m-d", time()), PDO::PARAM_STR);
        $stmt->bindParam(':maloai', $this->maloai, PDO::PARAM_INT);
        $stmt->bindParam(':trangthai', $this->trangthai, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            $this->mablog = $pdo->lastInsertId();
            return true;
        } else {
            var_dump($stmt->errorInfo());
            return false;
        }
    }

    public function delete($pdo)
    {
        $sql = "DELETE FROM blogs WHERE mablog = :mablog";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":mablog", $this->mablog, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($pdo)
    {
        $sql = "UPDATE blogs SET hinh=:hinh, tieude=:tieude, mota=:mota, maloai=:maloai WHERE mablog=:mablog";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':hinh', $this->hinh, PDO::PARAM_STR);
        $stmt->bindParam(':tieude', $this->tieude, PDO::PARAM_STR);
        $stmt->bindParam(':mota', $this->mota, PDO::PARAM_STR);
        $stmt->bindParam(':maloai', $this->maloai, PDO::PARAM_INT);
        $stmt->bindParam(':mablog', $this->mablog, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatetrangthai($pdo)
    {
        $sql = "UPDATE blogs SET trangthai=:trangthai WHERE mablog=:mablog";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':trangthai', $this->trangthai, PDO::PARAM_BOOL);
        $stmt->bindParam(':mablog', $this->mablog, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

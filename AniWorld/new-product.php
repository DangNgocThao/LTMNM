<?php
require 'inc/bootstrap.php';

$hinh = "";
$tenSP = "";
$tacGia = "";
$gia = "";
$namXB = "";
$moTa = "";
$giaErrors = "";
$Errors = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hinh = $_POST['hinh'];
    $tenSP = $_POST['tenSP'];
    $tacGia = $_POST['tacGia'];
    $gia = $_POST['gia'];
    $namXB = $_POST['namXB'];
    $moTa = $_POST['moTa'];

    if ($gia % 1000 != 0) {
        $giaErrors = "Giá phải chia hết cho 1000!";
    }

    if ($giaErrors == "") {
        $sp = new SanPham();
        $sp->hinh = $hinh;
        $sp->tenSP = $tenSP;
        $sp->tacGia = $tacGia;
        $sp->gia = $gia;
        $sp->namXB = $namXB;
        $sp->moTa = $moTa;

        if ($sp->add($pdo)) {
            header("Location: index.php");
            exit;
        } else {
            $Errors = "Thêm thất bại!";
        }
    }
}
?>

<?php include 'inc/header.php' ?>

<div class="col-12 border rounded-top mt-3 p-2 bg-light">
    <b class="h3">Thêm sản phẩm</b>
    <a href="index.php" class="btn btn-success float-end">Quay lại</a>
</div>
<div class="col-12 border rounded-bottom p-2">
    <form method="post">
        <div class="mb-3">
            <label for="hinh" class="form-label">ID hình</label>
            <input type="number" class="form-control" id="hinh" name="hinh" value="<?= $hinh ?>" required />
        </div>

        <div class="mb-3">
            <label for="tenSP" class="form-label">Tên sản phẩm</label>
            <input class="form-control" id="tenSP" name="tenSP" value="<?= $tenSP ?>" required />
        </div>

        <div class="mb-3">
            <label for="tacGia" class="form-label">Tác giả</label>
            <input class="form-control" id="tacGia" name="tacGia" value="<?= $tacGia ?>" required />
        </div>

        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" value="<?= $gia ?>" required />
            <span class="text-danger"><?= $giaErrors ?></span>
        </div>

        <div class="mb-3">
            <label for="namXB" class="form-label">Năm xuất bản</label>
            <input type="number" class="form-control" id="namXB" name="namXB" value="<?= $namXB ?>" required />
        </div>

        <div class="mb-3">
            <label for="moTa" class="form-label">Mô tả</label>
            <textarea class="form-control" id="moTa" name="moTa" rows="4" required><?= $moTa ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <span class="text-danger"><?= $Errors ?></span>
    </form>
</div>

<?php include 'inc/footer.php' ?>
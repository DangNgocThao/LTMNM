<?php
require 'inc/bootstrap.php';

if (!isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];

$sp = SanPham::getOneByID($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($sp->delete($pdo)) {
        header("Location: index.php");
        exit;
    }
}

if (!$sp) {
    die("id không hợp lệ");
}
?>

<?php include 'inc/header.php' ?>

<div class="col-12 border rounded-top mt-3 p-2 bg-light text-center">
    <b class="h3">Bạn có muốn xóa sản phẩm <?= $sp->tenSP ?> không?</b>
</div>
<div class="col-12 border rounded-bottom p-2 text-center">
    <form method="post">
        <button type="submit" class="btn btn-danger">Có</button>
        <a href="index.php" class="btn btn-success">Quay lại</a>
    </form>
</div>

<?php include 'inc/footer.php' ?>
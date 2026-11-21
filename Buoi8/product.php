<?php
if (!isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});

$product = Product::getOneByID($id);

if (!$product) {
    die("id không hợp lệ");
}
?>
<?php require 'inc/header.php'; ?>
<table class="table">
    <tr>
        <td class="table-dark" width="11%">Mã Sản Phẩm</td>
        <td><?= $product->id ?></td>
    </tr>
    <tr>
        <td class="table-dark">Tên Sản Phẩm</td>
        <td><?= $product->name ?></td>
    </tr>
    <tr>
        <td class="table-dark">Mô tả</td>
        <td><?= $product->desc ?></td>
    </tr>
    <tr>
        <td class="table-dark">Giá</td>
        <td><?= number_format($product->price, 0, ',', '.') ?> VNĐ</td>
    </tr>
</table>
<div class="text-center">
    <a href="edit-product.php?id=<?= $product->id ?>" class="btn btn-warning">Cập nhật</a>
    <a href="delete-product.php?id=<?= $product->id ?>" class="btn btn-danger">Xóa</a>
</div>
<?php require 'inc/footer.php'; ?>
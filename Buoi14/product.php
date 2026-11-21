<?php
if (!isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";
require 'inc/db.php';

$product = Product::getOneByID($pdo, $id);

if (!$product) {
    die("id không hợp lệ");
}
?>
<?php require 'inc/header.php'; ?>
<div class="row">
    <div class="col-5">
        <img class="w-100" src="uploads/<?= $product->image_file ?>">
    </div>
    <div class="col-7">
        <h1 class="text-center"><?= $product->name ?></h1>
        <p>Giá: <span class="text-danger"><?= number_format($product->price, 0, ',', '.') ?> đ</span></p>
        <p>Mô tả: <?= $product->description ?></p>
        <ul>
            <?php foreach (Category::getByProId($pdo, $id) as $cate) : ?>
                <li><?= $cate->name ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (isset($_SESSION['log_detail'])) : ?>
            <?php if ($_SESSION['log_detail'] != "admin") : ?>
                <div class="text-end"><a href="index.php?action=addcart&id=<?= $product->id ?>" class="btn btn-primary">Chọn mua</a></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php if (isset($_SESSION['log_detail'])) : ?>
    <?php if ($_SESSION['log_detail'] == "admin") : ?>
        <div class="text-center">
            <a href="edit-product.php?id=<?= $product->id ?>" class="btn btn-warning">Cập nhật</a>
            <a href="delete-product.php?id=<?= $product->id ?>" class="btn btn-danger">Xóa</a>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php require 'inc/footer.php'; ?>
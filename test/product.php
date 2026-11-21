<?php
if (!isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";

$data = $_SESSION['data'];
$product = Product::getOneByID($data, $id);

if (!$product) {
    die("id không hợp lệ");
}
?>
<?php require 'inc/header.php'; ?>
<div class="row">
    <div class="col-5">
        <img class="w-100" src="Hinh/<?= $product->image ?>">
    </div>
    <div class="col-7">
        <h1 class="text-center"><?= $product->name ?></h1>
        <p>Giá: <span class="text-danger"><?= number_format($product->price, 0, ',', '.') ?> đ</span></p>
        <div class="text-center"><a href="index.php?action=addcart&id=<?= $product->id ?>" class="btn btn-primary">Chọn mua</a></div>
    </div>
</div>
<?php require 'inc/footer.php'; ?>
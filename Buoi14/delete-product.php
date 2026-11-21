<?php
$id = $_GET["id"];

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require 'inc/init.php';
require 'inc/db.php';

$product = Product::getOneByID($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product->delete($pdo);
    header("Location:index.php");
}
?>
<?php require 'inc/header.php'; ?>
<form method="post" class="m-auto">
    <div class="text-center">
        <h3>Bạn có muốn xóa sản phẩm <?= $product->name ?>?</h3>
        <button type="submit" class="btn btn-danger">Có</button>
        <a href="product.php?id=<?= $product->id ?>" class="btn btn-primary">Không</a>
    </div>
</form>
<?php require 'inc/footer.php'; ?>
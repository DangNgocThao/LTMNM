<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";

$noti = "";
$data = $_SESSION['data'];

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $proid = $_GET['id'];
    if ($action == 'addcart') {
        if (!Cart::add($data, $proid))
            $noti = "Thêm sản phẩm vào giỏ hàng thất bại";
    }
}

?>
<?php include "inc/header.php" ?>
<h3>SẢN PHẨM TIÊU BIỂU</h3>
<div class="row mb-3">
    <?php foreach ($data as $row) : ?>
        <div class="col-3 mt-3">
            <div class="card">
                <a href="product.php?id=<?= $row->id ?>"><img class="card-img-top" src="Hinh/<?= $row->image ?>"></a>
                <div class="card-body">
                    <a href="product.php?id=<?= $row->id ?>" class="card-title h5 text-dark text-decoration-none"> <?= $row->name ?></a>
                    <p class="card-text">Giá: <span class="text-danger"><?= number_format($row->price, 0, ',', '.') ?> đ</span></p>
                    <a href="index.php?action=addcart&id=<?= $row->id ?>" class="btn btn-primary w-100">Chọn mua</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<span class="font-weight-bold text-danger"><?= $noti ?></span>
<?php include "inc/footer.php" ?>
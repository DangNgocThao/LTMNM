<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";
require 'inc/db.php';

$product_per_page = 4;
$limit = $product_per_page;

$page = $_GET['page'] ?? 1;
$page = $page < 1 ? 1 : $page;
$max = Product::getCount($pdo, $limit);
$page = $page > $max ? $max : $page;

$offset = ($page - 1) * $product_per_page;

$data = Product::getPage($pdo, $limit, $offset);

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if ($action == 'addcart') {
        $c = new Cart();
        $c->username = $_SESSION['log_detail'];
        $c->id = $id;
        if (!$c->add($pdo))
            $noti = "Thêm sản phẩm vào giỏ hàng thất bại";
    }
}
?>
<?php include "inc/header.php" ?>

<h3>SẢN PHẨM TIÊU BIỂU</h3>
<div class="row">
    <?php foreach ($data as $row) : ?>
        <div class="col-3 mt-3">
            <div class="card" style="height: 100%;">
                <a href="product.php?id=<?= $row->id ?>"><img class="card-img-top" src="uploads/<?= $row->image_file ?>"></a>
                <div class="card-body">
                    <a href="product.php?id=<?= $row->id ?>" class="card-title h5 text-dark text-decoration-none"> <?= $row->name ?></a>
                    <p class="card-text"><?= number_format($row->price, 0, ',', '.') ?> VNĐ</p>
                    <p>
                        <?php foreach (Category::getByProId($pdo, $row->id) as $cate) : ?>
                            <span class="bg-light rounded p-1"><?= $cate->name ?></span>
                        <?php endforeach; ?>
                    </p>
                    <?php if (isset($_SESSION['log_detail'])) : ?>
                        <?php if ($_SESSION['log_detail'] != "admin") : ?>
                            <a href="index.php?action=addcart&id=<?= $row->id ?>" class="btn btn-primary">Thêm giỏ hàng</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row mt-3">
    <div class="text-center col">
        <?php if ($page != 1) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $page - 1 ?>">‹</a>&nbsp;
        <?php endif; ?>
        <?php for ($i = 1; $i <= $max; $i++) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $i ?>"><?= $i ?></a>&nbsp;
        <?php endfor; ?>
        <?php if ($page != $max) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $page + 1 ?>">›</a>&nbsp;
        <?php endif; ?>
    </div>
</div>

<?php include "inc/footer.php" ?>
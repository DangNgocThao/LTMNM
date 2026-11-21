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

$blog = Blogs::getOneByID($pdo, $id);

if (!$blog) {
    die("id không hợp lệ");
}
?>
<?php include 'inc/header.php' ?>

<div class="col-6 mt-3">
    <img src="hinh/<?= $blog->hinh ?>" class="w-100">
</div>
<div class="col-6 mt-3">
    <h3><?= $blog->tieude ?></h3>
    <p><b>Ngày đăng:</b> <?= date_format(date_create($blog->ngaydang), "d-m-Y") ?></p>
    <p><b>Loại:</b> <?= $blog->tenloai ?></p>
</div>

<div class="col-12 mt-3">
    <h3>Mô tả</h3>
    <p><?= $blog->mota ?></p>
</div>

<?php include 'inc/footer.php' ?>
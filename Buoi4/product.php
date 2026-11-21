<?php
if(!isset($_GET["id"])){
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];
require 'inc/products.php';
$data = getAllProducts('data.csv');
$row = getOneProductByID($data, $id);

if(!$row){
    die("id không hợp lệ");
}
?>
<?php require 'inc/header.php'; ?>
<table class="table">
    <tr>
        <td class="table-dark" width="11%">Mã Sản Phẩm</td>
        <td><?= $row["id"] ?></td>
    </tr>
    <tr>
        <td class="table-dark">Tên Sản Phẩm</td>
        <td><?= $row["name"] ?></td>
    </tr>
    <tr>
        <td class="table-dark">Mô tả</td>
        <td><?= $row["desc"] ?></td>
    </tr>
    <tr>
        <td class="table-dark">Giá</td>
        <td><?= $row["price"] ?> VNĐ</td>
    </tr>
</table>
<?php require 'inc/footer.php'; ?>
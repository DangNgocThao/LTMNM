<?php
include "inc/products.php";
require "inc/init.php";
$data = $_SESSION['data'];

if (isset($_GET['action']) && isset($_GET['proid'])) {
    $action = $_GET['action'];
    $proid = $_GET['proid'];
    if ($action == 'addcart') {
        $product = getOneProductByID($data, $proid);
        if ($product) {
            $proidCol = array_column($_SESSION['cart'], 'proid');
            if (in_array($proid, $proidCol)) {
                $_SESSION['cart'][$proid]['qty'] += 1;
            } else {
                $item = [
                    'proid' => $proid,
                    'qty' => 1
                ];
                $_SESSION['cart'][$proid] = $item;
            }
        }
    }
}

?>
<?php include "inc/header.php" ?>
<h3>SẢN PHẨM TIÊU BIỂU</h3>
<table class="table">
    <tr class="table-dark">
        <?php foreach ($data[0] as $key => $value) : ?>
            <th><?= $key ?></th>
        <?php endforeach; ?>
        <th></th>
    </tr>
    <?php foreach ($data as $row) : ?>
        <tr>
            <?php foreach ($row as $key => $value) : ?>
                <?php if ($key == 'price') : ?>
                    <td><?= number_format($value, 0, ',', '.') ?> VNĐ</td>
                <?php elseif ($key == 'name') : ?>
                    <td><a href="product.php?id=<?= $row['id'] ?>"><?= $value ?></a></td>
                <?php else : ?>
                    <td><?= $value ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
            <td>
                <a href="index.php?action=addcart&proid=<?= $row['id'] ?>">Thêm giỏ hàng</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include "inc/footer.php" ?>
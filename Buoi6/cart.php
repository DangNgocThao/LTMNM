<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require 'inc/init.php';

$data = $_SESSION['data'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Cart::update($_POST['id'], $_POST['qty']);
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'empty') {
        Cart::removeAll();
    }

    if ($action == 'remove') {
        if (isset($_GET['id'])) {
            Cart::remove($_GET['id']);
        }
    }
}
?>

<?php require 'inc/header.php'; ?>

<div class="container">
    <table class="table my-3">
        <a href="cart.php?action=empty" class="btn btn-danger mt-2">Xóa Giỏ Hàng</a>
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Tên SP</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hàng động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['cart'])) :
                $i = 1;
                $total = 0;
                foreach ($_SESSION['cart'] as $cart) :
            ?>
                    <tr class="text-center">
                        <form method="post">
                            <td><?= $i ?></td>
                            <td><?= $cart->name ?></td>
                            <td><?= number_format($cart->price, 0, ',', '.') ?> VNĐ</td>
                            <td>
                                <input type="number" value="<?= $cart->qty ?>" name="qty" min="1" style="width: 50px" />
                                <input type="hidden" name="id" value="<?= $cart->id ?>" />
                            </td>
                            <td>
                                <input type="submit" name="update" value="Cập nhật" class="btn btn-primary" />
                                <a href="cart.php?action=remove&id=<?= $cart->id ?>" class="btn btn-warning">Xóa</a>
                            </td>
                        </form>
                    </tr>
                <?php
                    $i++;
                    $total += $cart->price * $cart->qty;
                endforeach; ?>
                <tr>
                    <td colspan="5" class="text-center">
                        <h4>Tổng: <?= number_format($total, 0, ',', '.') ?> VNĐ</h4>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require 'inc/footer.php'; ?>
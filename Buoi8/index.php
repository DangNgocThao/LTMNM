<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});

$data = Product::getAll();
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
    <?php foreach ($data as $product) : ?>
        <tr>
            <?php foreach (get_object_vars($product) as $key => $value) : ?>
                <?php if ($key == 'price') : ?>
                    <td><?= number_format($value, 0, ',', '.') ?> VNĐ</td>
                <?php elseif ($key == 'name') : ?>
                    <td><a href="product.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                <?php else : ?>
                    <td><?= $value ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "inc/footer.php" ?>
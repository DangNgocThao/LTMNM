<?php
$price = "";
$name = "";
$desc = "";
$nameErrors = "";
$priceErrors = "";
$descErrors = "";
$noti = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $price = $_POST['price'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    if (empty($name)) {
        $nameErrors = "Name is required";
    }
    if (empty($desc)) {
        $descErrors = "Description is required";
    }
    if (empty($price)) {
        $priceErrors = "Price is required";
    } elseif ($price % 1000 != 0) {
        $priceErrors = "Price invalid!";
    }
    if ($nameErrors == "" && $priceErrors == "" && $descErrors == "") {
        $noti = "Thêm thành công";
        $price = "";
        $name = "";
        $desc = "";
        header("Location:index.php");
    }
}
?>
<?php include 'inc/header.php' ?>
<h2>Thêm sản phẩm mới</h2>
<form method="post" class="w-50 m-auto">
    <div class="mb-3">
        <label for="name" class="form-label">Name (<span class="text-danger">*</span>)</label>
        <input class="form-control" id="name" name="name" value="<?= $name ?>" /><span class='text-danger'><?= $nameErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Description (<span class="text-danger">*</span>)</label>
        <textarea class="form-control" id="desc" name="desc" rows="4"><?= $desc ?></textarea><span class='text-danger'><?= $descErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price (<span class="text-danger">*</span>)</label>
        <input class="form-control" id="price" name="price" type="number" min="0" value="<?= $price ?>" /><span class='text-danger'><?= $priceErrors ?></span>
    </div>
    <button type="submit" class="btn btn-primary form-control">Thêm</button>
    <span class="text-success"><?= $noti ?></span>
</form>
<?php include 'inc/footer.php' ?>
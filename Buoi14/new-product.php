<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require 'inc/init.php';
require 'inc/db.php';

$dataCat = Category::getAll($pdo);

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

    try {
        if (empty($_FILES['file'])) {
            throw new Exception('Invalid upload');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded');
            default:
                throw new Exception('An error occured');
        }

        if ($_FILES['file']['size'] > 1000000) {
            throw new Exception('File too large');
        }

        $mime_types = ['image/png', 'image/jpeg', 'image/gif'];
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, $_FILES['file']['tmp_name']);
        if (!in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }

        $pathinfo = pathinfo($_FILES['file']['name']);
        $fname = 'image';
        $extension = $pathinfo['extension'];

        $file = $fname . '.' . $extension;
        $dest = 'uploads/' . $file;
        $i = 1;
        while (file_exists($dest)) {
            $file = $fname . "-$i." . $extension;
            $dest = 'uploads/' . $file;
            $i++;
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
            // header ... echo ....
        } else {
            throw new Exception('Unable to move file.');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    if ($nameErrors == "" && $priceErrors == "" && $descErrors == "") {
        $product = new Product();
        $product->name = $name;
        $product->description = $desc;
        $product->price = $price;
        $product->image_file = $file;

        if ($product->add($pdo)) {
            if ($cats = $_POST['cat']) {
                foreach ($cats as $cat) {
                    $pro_cat = new Pro_cat();
                    $pro_cat->pro_id = $product->id;
                    $pro_cat->cat_id = $cat;

                    $pro_cat->add($pdo);
                }
            }
            header("Location: product.php?id={$product->id}");
            exit;
        }
    }
}
?>
<?php include 'inc/header.php' ?>

<h2>Thêm sản phẩm mới</h2>
<form method="post" enctype='multipart/form-data' class="w-50 m-auto">
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
    <div class="mb-3">
        <label for="file" class="form-label">Image file (<span class="text-danger">*</span>)</label>
        <input class="form-control" type="file" name="file" id="file" />
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <?php foreach ($dataCat as $row) : ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cat[]" value="<?= $row->id ?>" id="<?= $row->id ?>">
                <label class="form-check-label" for="<?= $row->id ?>"><?= $row->name ?></label>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary form-control">Thêm</button>
    <span class="text-success"><?= $noti ?></span>
</form>

<?php include 'inc/footer.php' ?>
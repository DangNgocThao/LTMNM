<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require 'inc/init.php';
require 'inc/db.php';

$dataCat = Loai::getAll($pdo);

$name = "";
$desc = "";
$maloai = "";
$fileErrors = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $maloai = $_POST['maloai'];

    try {
        if (empty($_FILES['file'])) {
            throw new Exception('Tải lên không hợp lệ!');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('Không có tệp nào được tải lên!');
            default:
                throw new Exception('Đã xảy ra lỗi!');
        }

        if ($_FILES['file']['size'] > 200000) {
            throw new Exception('Tệp quá lớn!');
        }

        $mime_types = ['image/png', 'image/jpeg', 'image/gif'];
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, $_FILES['file']['tmp_name']);
        if (!in_array($mime_type, $mime_types)) {
            throw new Exception('Loại tệp không hợp lệ!');
        }

        $pathinfo = pathinfo($_FILES['file']['name']);
        $fname = 'hinh';
        $extension = $pathinfo['extension'];

        $file = $fname . '.' . $extension;
        $dest = 'hinh/' . $file;
        $i = 1;
        while (file_exists($dest)) {
            $file = $fname . $i . '.' . $extension;
            $dest = 'hinh/' . $file;
            $i++;
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
            $b = new Blogs();
            $b->hinh = $file;
            $b->tieude = $name;
            $b->mota = $desc;
            $b->maloai = $maloai;
            $b->trangthai = true;

            if ($b->add($pdo)) {
                header("Location: blog.php?id={$b->mablog}");
                exit;
            }
        } else {
            throw new Exception('Không thể di chuyển tệp!');
        }
    } catch (Exception $e) {
        $fileErrors = $e->getMessage();
    }
}
?>
<?php include 'inc/header.php' ?>
<div class="col-12 w-75 m-auto border rounded-top mt-3 p-2 bg-light">
    <b class="h3">Create new Post</b>
    <a href="index.php" class="btn btn-success float-end">Back</a>
</div>
<div class="col-12 w-75 m-auto border rounded-bottom p-2">
    <form method="post" enctype='multipart/form-data'>
        <div class="mb-3">
            <label for="file" class="form-label">Image</label>
            <input class="form-control" type="file" name="file" id="file" required />
            <span class='text-danger'><?= $fileErrors ?></span>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input class="form-control" id="name" name="name" value="<?= $name ?>" required />
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="maloai">
                <?php foreach ($dataCat as $row) : ?>
                    <option value="<?= $row->maloai ?>" <?php if ($maloai == $row->maloai) : ?> selected <?php endif; ?>><?= $row->tenloai ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="4" required><?= $desc ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'inc/footer.php' ?>
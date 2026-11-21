<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";
require 'inc/db.php';

$product_per_page = 5;
$limit = $product_per_page;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $b = new Blogs();
    $b->trangthai = false;
    $b->mablog = $_POST['mablog'];
    $b->updatetrangthai($pdo);
}

$page = $_GET['page'] ?? 1;
$page = $page < 1 ? 1 : $page;
$max = Blogs::getCount($pdo, true, $limit);
$page = $page > $max ? $max : $page;

$offset = ($page - 1) * $product_per_page;

$data = Blogs::getPage($pdo, true, $limit, $offset);
?>

<?php include 'inc/header.php' ?>

<div class="col-12 border rounded-top mt-3 p-2 bg-light">
    <b class="h3">All posts</b>
    <a href="trash.php" class="btn btn-dark float-end">Trashed</a>
    <a href="new-blog.php" class="btn btn-success float-end me-2">Create</a>
</div>
<div class="col-12 border rounded-bottom">
    <?php if ($data) { ?>
        <table class="table table-bordered mt-3">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Publish Date</th>
                <th>Action</th>
            </tr>
            <?php $i = 1;

            foreach ($data as $row) :
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td style="width: 15%;"><img src="hinh/<?= $row->hinh ?>" class="w-100"> </td>
                    <td style="width: 20%;"><?= $row->tieude ?></td>
                    <td class="w-25"><?= $row->mota ?></td>
                    <td><?= $row->tenloai ?></td>
                    <td><?= date_format(date_create($row->ngaydang), "d-m-Y") ?></td>
                    <td>
                        <form method="post">
                            <a href="blog.php?id=<?= $row->mablog ?>" class="btn btn-success">Show</a>
                            <a href="edit-blog.php?id=<?= $row->mablog ?>" class="btn btn-primary">Edit</a>
                            <input type="hidden" value="<?= $row->mablog ?>" name="mablog" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        <?php $i++;
            endforeach;
        } ?>
        </table>
</div>
<div class="row mt-3">
    <div class="text-center col">
        <?php if ($page != 1 && $max != 0) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $page - 1 ?>">‹</a>&nbsp;
        <?php endif; ?>
        <?php for ($i = 1; $i <= $max; $i++) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $i ?>"><?= $i ?></a>&nbsp;
        <?php endfor; ?>
        <?php if ($page != $max && $max != 0) : ?>
            <a class="btn btn-secondary" href="index.php?page=<?= $page + 1 ?>">›</a>&nbsp;
        <?php endif; ?>
    </div>
</div>

<?php include 'inc/footer.php' ?>
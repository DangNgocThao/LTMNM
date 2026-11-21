<?php
require "inc/bootstrap.php";

$data = SanPham::getAll($pdo);
?>

<?php include 'inc/header.php' ?>

<div class="col-12 border rounded-top mt-3 p-2 bg-light">
    <b class="h3">Tất cả sản phẩm</b>
    <a href="json.php/sanpham/list" class="btn btn-secondary float-end">Api</a>
    <a href="new-product.php" class="btn btn-success float-end me-2">Thêm</a>
</div>
<div class="col-12 border rounded-bottom">
    <?php if ($data) { ?>
        <table class="table table-bordered mt-3 text-center align-middle">
            <tr>
                <th>#</th>
                <th>ID hình</th>
                <th>Tên sản phẩm</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Năm xuất bản</th>
                <th>Mô tả</th>
                <th>Thao Tác</th>
            </tr>
            <?php $i = 1;

            foreach ($data as $row) :
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row->hinh ?></td>
                    <td><?= $row->tenSP ?></td>
                    <td><?= $row->tacGia ?></td>
                    <td><?= number_format($row->gia, 0, ',', '.') ?> <u>đ</u></td>
                    <td><?= $row->namXB ?></td>
                    <td style="width: 30%;text-align: justify;"><?= truncate($row->moTa) ?></td>
                    <td>
                        <a href="edit-product.php?id=<?= $row->maSP ?>" class="btn btn-primary">Sửa</a>
                        <a href="delete-product.php?id=<?= $row->maSP ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
        <?php $i++;
            endforeach;
        } ?>
        </table>
</div>

<?php include 'inc/footer.php' ?>
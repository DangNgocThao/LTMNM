<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        var_dump($_POST);
    endif;
?>
<?php include 'inc/header.php' ?>
<h2>Thêm sản phẩm mới</h2>
<form method="post" class="w-50 m-auto">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" id="name" name="name" />
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input class="form-control" id="price" name="price" type="number" min="0"/>
    </div>
    <button type="submit" class="btn btn-primary form-control">Thêm</button>
</form>
<?php include 'inc/footer.php' ?>
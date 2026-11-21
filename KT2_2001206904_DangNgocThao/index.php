<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";

$data = $_SESSION['data'];
?>
<?php include "inc/header.php" ?>

<?php foreach ($data as $row) : ?>
    <div class="col-4 mt-3">
        <div class="card" style="height: 475px;">
            <a href="article.php?id=<?= $row->id ?>"><img class="card-img-top" src="hinh/<?= $row->image ?>"></a>
            <div class="card-body">
                <a href="article.php?id=<?= $row->id ?>" class="card-title h5 text-dark text-decoration-none"> <?= $row->title ?></a>
                <p class="card-text"><?= $row->date ?></p>
                <a href="article.php?id=<?= $row->id ?>" class="text-decoration-none">VIEW</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php include "inc/footer.php" ?>
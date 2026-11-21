<?php
if (!isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm");
}

$id = $_GET["id"];

spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";

$data = $_SESSION['data'];
$article = Article::getOneByID($data, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Comment::addComment($id, $_POST['name'], $_POST['comment']);
}

if (!$article) {
    die("id không hợp lệ");
}
?>
<?php include 'inc/header.php'; ?>
<h2><?= $article->title ?></h2>
<p><?= $article->content ?></p>

<?php if (isset($_SESSION['log_detail'])) : ?>
    <h4>Leave a Comment</h4>
    <?php
    if (isset($_SESSION['comment'])) :
        foreach ($_SESSION['comment'] as $cmt) :
            if ($cmt->id == $id) :
    ?>
                <p><b><?= $cmt->name ?>: </b><?= $cmt->cm ?></p>
    <?php
            endif;
        endforeach;
    endif; ?>
    <form method="post" class="m-auto">
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment" style="height: 150px;"></textarea>
            <input type="hidden" name="name" value="<?= $_SESSION['log_detail'] ?>" />
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit Comment</button><br />
        </div>
    </form>
<?php endif; ?>
<?php include 'inc/footer.php'; ?>
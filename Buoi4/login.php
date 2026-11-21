<?php
$noti = "";
$class = "";
$name = "";
$pass = "";

$nameErrors = "";
$passErrors = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    if (empty($name)) {
        $nameErrors = "UserName không được để trống";
    }
    if (empty($pass)) {
        $passErrors = "Password không được để trống";
    }
    if ($passErrors == "" && $nameErrors == "") {
        if ($name == "admin" && $pass == "123") {
            $noti = "Đăng nhập thành công";
            $class = "text-success";
            $name = "";
            $pass = "";
        } else {
            $noti = "UserName hoặc Password không đúng";
            $class = "text-danger";
        }
    }
}
?>
<?php include "inc/header.php" ?>
<h3 class="text-center">ĐĂNG NHẬP</h3>
<form method="post" class="m-auto">
    <div class="mb-3">
        <label for="name" class="form-label">UserName</label>
        <input class="form-control" type="text" placeholder="Enter your UserName" name="name" id="name" value="<?= $name ?>" /><span class='text-danger'><?= $nameErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input class="form-control" type="password" placeholder="••••••••••••••••••••••••••••" name="pass" id="pass" value="<?= $pass ?>" /><span class='text-danger'><?= $passErrors ?></span>
    </div>

    <div class=" mb-3 form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="rp" id="rp" />
        <label class="form-check-label form-label" for="rp">Remember Password</label>
    </div>

    <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary text-center">ĐĂNG NHẬP</button><br />
        <span class="<?= $class ?>"><?= $noti ?></span>
    </div>
</form>
<?php include "inc/footer.php" ?>
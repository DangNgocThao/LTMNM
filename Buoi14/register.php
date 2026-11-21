<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";

$noti = "";
$ten = "";
$pass = "";
$enterThePass = "";
$email = "";

$tenErrors = "";
$passErrors = "";
$enterThePassErrors = "";
$emailErrors = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST["ten"];
    $email = $_POST['email'];
    $pass = $_POST["pass"];
    $enterThePass = $_POST["enterThePass"];
    if (empty($ten)) {
        $tenErrors = "Tên tài khoản là bắt buộc";
    }
    if (empty($email)) {
        $emailErrors = "email là bắt buộc";
    }
    if (empty($pass)) {
        $passErrors = "Mật khẩu là bắt buộc";
    }
    if (empty($enterThePass)) {
        $enterThePassErrors = "Nhập lại mật khẩu là bắt buộc";
    }
    if ($pass != $enterThePass) {
        $enterThePassErrors = "Nhập lại mật khẩu không đúng";
    }
    if ($tenErrors == "" && $emailErrors == "" && $passErrors == "" && $enterThePassErrors == "") {
        require 'inc/db.php';
        if (!Auth::getOneUserByEmail($pdo, $email)) {
            $tk = new Auth();
            $tk->username = $ten;
            $tk->password = $pass;
            $tk->email = $email;
            if (!$tk->add($pdo)) {
                $noti = "Tên tài khoản đã tồn tại";
            } else {
                header("Location:index.php");
            }
        } else {
            $noti = "Email này đã được đăng ký bởi tài khoản khác";
        }
    }
}
?>
<?php include "inc/header.php" ?>

<h3 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h3>
<form method="post" class="m-auto">
    <div class="mb-3">
        <label for="ten" class="form-label">UserName</label>
        <input type="text" class="form-control" id="ten" name="ten" placeholder="Enter your name" /><span class='text-danger'><?= $tenErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" /><span class='text-danger'><?= $emailErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="••••••••••••••••••••••••••••" /><span class='text-danger'><?= $passErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="enterThePass" class="form-label">Enter the password</label>
        <input type="password" class="form-control" id="enterThePass" name="enterThePass" placeholder="••••••••••••••••••••••••••••" /><span class='text-danger'><?= $enterThePassErrors ?></span>
    </div>

    <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </div>

    <div class="text-center p-2">
        <span class="text-danger"><?= $noti ?></span>
    </div>

</form>
<?php include "inc/footer.php" ?>
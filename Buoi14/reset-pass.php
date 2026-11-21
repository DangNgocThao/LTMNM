<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";
require 'inc/db.php';

$result = "";

//CHECK COI CÓ $GET EMAIL
if (!isset($_GET['email'])) {
    die('Email invalid');
}

if (!isset($_GET['token'])) {
    die('Token invalid');
} else {
    $user = Auth::getOneUserByEmail($pdo, $_GET['email']);
    //CHECK COI EMAIL CÓ TỒN TẠI
    if (empty($user)) {
        die("Email not exists");
    }
    //CHECK COI TOKEN CÓ QUÁ HẠN
    //LẤY GIỜ ĐÃ KHỞI TẠO TOKEN
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $user->dateresetpass);
    //LẤY GIỜ HIỆN TẠI
    $dateCurrent = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', time()));
    //LẤY KHOẢNG CÁCH 2 DATE TIME 
    $diff = $dateCurrent->diff($date);
    //CHECK COI HOUR CỦA GIỮA 2 DATE TIME CÓ LỚN HƠN 0
    if ($diff->format('%H') > 0) {
        die('Link out of time');
    }
    //CHECK TOKEN CÓ KHỚP VỚI TOKEN ĐÃ TẠO
    if ($_GET['token'] != $user->token) {
        die("Token not match");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST["pass"];
    $enterThePass = $_POST["enterThePass"];
    $email = $_POST["email"];

    //CHECK PASSWORD VÀ RE-PASSWORD CÓ KHỚP
    if ($pass != $enterThePass) {
        $result = "Password and re-password not match!!!";
    }

    //RESET PASSWORD
    if (empty($result)) {
        if (Auth::updatePasswordByEmail($pdo, $pass, $email)) {
            header("Location: login.php");
        } else {
            $result = "Reset password failed";
        }
    }
}
?>
<?php include "inc/header.php" ?>

<h3 class="text-center">Đặt lại mật khẩu</h3>
<form method="post" class="m-auto">
    <div class="mb-3">
        <label for="pass" class="form-label">Password (<span class="text-danger">*</span>)</label>
        <input type="password" class="form-control" id="pass" name="pass" required />
    </div>

    <div class="mb-3">
        <label for="enterThePass" class="form-label">Enter the password (<span class="text-danger">*</span>)</label>
        <input type="password" class="form-control" id="enterThePass" name="enterThePass" required />
    </div>

    <div class="text-center pt-2">
        <input type="hidden" name="email" value="<?= $_GET['email'] ?>" />
        <button type="submit" class="btn btn-primary">Đặt</button>
    </div>

    <div class="text-center p-2">
        <span class="text-danger"><?= $result ?></span>
    </div>

</form>

<?php include "inc/footer.php" ?>
<?php
$noti = "";
$ten = "";
$email = "";
$pass = "";

$tenErrors = "";
$emailErrors = "";
$passErrors = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if (empty($ten)) {
        $tenErrors = "Tên khách hàng là bắt buộc";
    }
    if (empty($email)) {
        $emailErrors = "Email là bắt buộc";
    }
    if (empty($pass)) {
        $passErrors = "Mật khẩu là bắt buộc";
    }
    if ($tenErrors == "" && $emailErrors == "" && $passErrors == "") {
        $noti = "Đăng ký thành công";
        $ten = "";
        $email = "";
        $pass = "";
        header("Location:index.php");
    }
}
?>
<?php include "inc/header.php" ?>

<h3 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h3>
<form method="post" class="m-auto">
    <div class="mb-3">
        <label for="ten" class="form-label">Tên khách hàng</label>
        <input type="text" class="form-control" id="ten" name="ten" placeholder="Enter your name" /><span class='text-danger'><?= $tenErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Địa chỉ Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email Address" /><span class='text-danger'><?= $emailErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" /><span class='text-danger'><?= $passErrors ?></span>
    </div>

    <div class="mb-3">
        <p for="gioi" class="form-label">Giới tính</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gioi" id="nam" value="Nam" checked>
            <label class="form-check-label" for="nam">Nam</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gioi" id="nu" value="Nữ">
            <label class="form-check-label" for="nu">Nữ</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gioi" id="khac" value="Khác">
            <label class="form-check-label" for="khac">Khác</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="nghe" class="form-label">Nghề nghiệp</label>
        <select class="form-control" id="nghe" name="nghe">
            <option selected>Giáo viên</option>
        </select>
    </div>

    <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </div>
    <span class="text-success"><?= $noti ?></span>
</form>
<?php include "inc/footer.php" ?>
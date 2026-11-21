<?php
spl_autoload_register(function ($class) {
    require "class/{$class}.php";
});
require "inc/init.php";
require 'inc/db.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$result = "";
$token = rand(1000, 9999);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match("/^\\S+@\\S+\\.\\S+$/", $_POST['email']))
        $result = "Email invalid";
    else {
        //CHECK COI EMAIL CÓ TỒN TẠI
        $user = Auth::getOneUserByEmail($pdo, $_POST['email']);
        if (!empty($user)) {
            //GỬI LINK RESET PASSWORD TỚI NGƯỜI DÙNG QUA EMAIL
            Email::sendEmail($_POST['email'], $token);
            //UPDATE THỜI GIAN GỬI LINK VÀ TOKEN CHO NGƯỜI DÙNG
            Auth::updateDateResetPasswordAndToken($pdo, $_POST['email'], $token);
            $result = "Please check your email for reset password";
        } else
            $result = "Email incorrect!!!";
    }
}
?>
<?php include "inc/header.php" ?>

<h3 class="text-center">Quên mật khẩu</h3>
<form method="post" class="m-auto">
    <div class="mb-3">
        <label for="email" class="form-label">Email (<span class="text-danger">*</span>)</label>
        <input class="form-control" type="email" name="email" id="email" required />
    </div>

    <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary text-center">OK</button><br />
        <span class="text-danger"><?= $result ?></span>
    </div>
</form>

<?php include "inc/footer.php" ?>
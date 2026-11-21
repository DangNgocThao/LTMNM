<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-4">
                <a href="index.php"><img src="Hinh/dienhoa-logo.png" class="w-100 mt-3"></a>
            </div>
            <div class="col-4">
                <b>Hà Nội:</b><br />
                Điện thoại: 024.73007.008 - 093.4647.172<br />
                Địa chỉ: Số 63/445 Lạc Long Quân, Tây Hồ, Hà Nội<br />
                Email: hn@dienhoa24gio.com<br />
            </div>
            <div class="col-4">
                <b>TP.Hồ Chí Minh:</b><br />
                Điện thoại: 028.73007.008 - 094.7723.444<br />
                Địa chỉ: Số 140 Phan Đình Phùng, P.2, Q.Phú Nhuận<br />
                Email: hcm@dienhoa24gio.com<br />
            </div>
        </div>
        <div class="row bg-success">
            <div class="col-8">
                <ul class="nav navbar navbar-expand-sm">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img class="w-75 rounded" src="Hinh/Home.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="register.php">Đăng ký</a>
                    </li>
                    <?php if (!isset($_SESSION['log_detail'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="login.php">Đăng nhập</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="logout.php">Đăng xuất</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="new-product.php">Thêm sản phẩm</a>
                    </li>
                    <li>
                        <a class="btn btn-outline-dark" href="cart.php">Giỏ hàng
                            <?php if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } ?>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col-4 mt-4">
                <div class="input-group">
                    <div class="form-outline">
                        <input placeholder="Search" type="search" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="col mt-3">
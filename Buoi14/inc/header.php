<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-success">
            <div class="col">
                <ul class="nav navbar navbar-expand-sm">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php">Trang chủ</a>
                    </li>
                    <?php if (!isset($_SESSION['log_detail'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="register.php">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="login.php">Đăng nhập</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="logout.php">Đăng xuất</a>
                        </li>
                        <?php if ($_SESSION['log_detail'] == "admin") : ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="new-product.php">Thêm sản phẩm</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a class="btn btn-outline-dark" href="cart.php">Giỏ hàng
                                    <?php if ($carts = Cart::getAll($pdo)) {
                                        echo count($carts);
                                    } ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
        <div class="row m-2">
            <div class="col">
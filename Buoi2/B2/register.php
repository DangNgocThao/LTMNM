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
                <img src="Hinh/dienhoa-logo.png" class="w-100 mt-3">
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
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="login.php">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Liên hệ</a>
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
            <div class="col-9 mt-3 bg-light">
                <div class="row text-center">
                    <div class="col-12 text-center">
                        <h3>ĐĂNG KÝ TÀI KHOẢN</h3><br />
                    </div>
                </div>
                <label>Tên khách hàng</label>
                <input type="text" class="form-control" placeholder="Enter your name" /><br />

                <label>Địa chỉ Email</label>
                <input type="email" class="form-control" placeholder="Enter your email Address" /><br />

                <label>Password</label>
                <input type="password" class="form-control" /><br />

                <label>Giới tính</label><br />
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioi" id="1">
                    <label class="form-check-label" for="1">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioi" id="2">
                    <label class="form-check-label" for="2">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioi" id="3">
                    <label class="form-check-label" for="3">Khác</label>
                </div><br /><br />

                <label>Nghề nghiệp</label>
                <select class="form-control">
                    <option selected>Giáo viên</option>
                </select>

                <div class="text-center pt-2">
                    <button class="btn btn-primary">Đăng ký</button>
                </div>
            </div>
            <div class="col-3 mt-3">
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom bg-success">
                        <a class="nav-link h3 text-light" href="#">HOA THEO CHỦ ĐỀ</a>
                    </li>
                    <li class="nav-ite border-bottom">
                        <a class="nav-link" href="#">HOA SINH NHẬT</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">HOA KHAI TRƯƠNG</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">LAN HỒ ĐIỆP</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">HOA CƯỚI</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">HOA LAN</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">HOA CHIA BUỒN</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">QUÀ TẶNG</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">TRÁI CÂY</a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom bg-success">
                        <a class="nav-link h3 text-light" href="#">CHỌN THEO GIÁ</a>
                    </li>
                    <li class="nav-ite border-bottom">
                        <a class="nav-link" href="#">250.000đ trở xuống</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">250.000đ - 400.000đ</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">400.000đ - 600.000đ</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">600.000đ - 900.000đ</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">Trên 1.000.000đ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row bg-success">
            <div class="col text-center p-3 text-light">
                Liên hệ: Khoa Công nghệ Thông tin - Trường Đại học Công nghiệp Thực phẩm Tp.HCM Link: fanpage và link: youtube <br />
                Địa chỉ: 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Tp.HCM. ĐT: (028).38161673 (ext 136) Mail: kcntt@hufi.edu.vn
            </div>
        </div>
    </div>
</body>

</html>
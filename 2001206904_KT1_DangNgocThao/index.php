<?php 
    $value = rand(1,3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">    
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-primary">
            <div class="col">
                <ul class="nav navbar">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php"><img width="45" src="Hinh/Home.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Lịch khai giảng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Tin tức - sự kiện</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Chuyên viên đồ họa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Khóa dài hạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Khóa Ngắn hạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Góc học viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Giới thiệu việc làm</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php if($value==1): ?>
            <div class="row p-2">
                <div class="col-12">
                    <h3 class="text-warning text-center">BẠN ĐANG GẶP NHỮNG VẤN ĐỀ SAU</h3>
                </div>
                <div class="col-6">
                    <img src="Hinh/1.png" class="w-100">
                </div>
                <div class="col-6">
                    <ul>
                        <li>Bạn muốn theo học lập trình web nhưng chưa biết bắt đầu từ đầu?</li>
                        <li>Bạn muốn tự thiết kế một website hiện đại đẹp mắt</li>
                        <li>Bạn muốn học nhanh và đi làm được ngay</li>
                    </ul>
                    <b>Nhưng bạn:</b>
                    <ul>
                        <li>Không có người hướng dẫn khi gặp khó</li>
                        <li>Tự học lan man, chán nản trong biến kiến thức</li>
                        <li>Không thực hành nhiều, không làm được sản phẩm</li>
                        <li>Chưa hiểu bản chất CSS nên khó thành thạo khi ứng dụng vào việc thiết kế web</li>
                        <li>Tự xây dựng một responsive web từ đầu (không áp dụng framework) gặp nhiều khó khăn</li>
                        <li>Không thu xếp được thời gian đi học trung tâm hay vì chưa có dù học phí cho các khóa học quá đắt</li>
                    </ul>
                </div>
            </div>
        <?php elseif($value==2):?>
            <div class="row p-2">
                <div class="col-12">
                    <h3 class="text-warning text-center">CHƯƠNG TRÌNH ĐÀO TẠO ONLINE CODING BOOTCAMP SỐ #1 VIỆT NAM</h3>
                </div>
                <div class="col-4">
                    <img src="Hinh/2.png" class="w-100">
                </div>
                <div class="col-8">
                    <p>Khác biệt với học Online thông thường, CodeCym Online sử dụng phương pháp Remote Learning (Học từ xa), người học và người dạy dù không cùng địa điểm, nhưng có thể tương tác với nhau cùng thời gian qua nền tảng trực tuyến. Nhờ đó, CodeGym Online phá bỏ hoàn toàn giới hạn về không gian và thời gian, giúp học viên có thể học bất cứ nơi đầu, tiết kiệm thời gian, chi phí đi lại mà vẫn nhận được sự hỗ trợ bất cứ lúc nào.</p>
                    <p class="text-center"><a class="btn btn-warning">ĐĂNG KÝ NGAY</a></p>
                </div>
            </div>
        <?php else:?>
            <div class="row p-2">
                <div class="col-4">
                    <h3 class="text-center">THỜI GIAN HỌC</h3>
                    <ul>
                        <li>Tổng: 2,5 tháng</li>
                        <li>3 buổi/tuần (Thứ 2, thứ 4, thứ 6 hoặc Thứ 3, thứ 5, thứ 7)</li>
                        <li>Mỗi buổi học 2 tiếng: 19:30 – 21:30</li>
                    </ul>
                </div>
                <div class="col-4 text-center">
                    <h3>HỌC PHÍ</h3>
                    <h2 class="text-warning">3.300.000₫</h2>
                </div>
                <div class="col-4 text-center">
                    <h3>TỔNG LỘ TRÌNH</h3>
                    <h2 class="text-warning">2,5 tháng</h2>
                </div>
                <div class="col-12 bg-light text-center p-3">
                    <h3 class="text-warning">LỊCH KHAI GIẢNG THÁNG 2/2023</h3><br/>
                    <div class="bg-white col pt-5 pb-5">
                        <table class="table table-bordered">
                            <tr>
                                <th>Khóa học</th>
                                <th>Lịch học</th>
                                <th>Giờ học</th>
                                <th>Khai giảng</th>
                                <th>Đăng ký</th>
                            </tr>
                            <tr>
                                <td>Xây dựng website với HTML/CSS</td>
                                <td>Thứ 2, 4, 6</td>
                                <td>19:30-21:30</td>
                                <td>27/2/2023</td>
                                <td>Đăng ký</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row bg-dark p-2">
            <div class="col-7 text-white">
                <table class="table">
                    <tr>
                        <td class="border-top-0"><img src="Hinh/Home.png" width="25"> Đơn vị</td>
                        <td class="border-top-0">| Khoa Công nghệ Thông tin</td>
                    </tr>
                    <tr>
                        <td><img src="Hinh/diachi.png" width="25"> Địa chỉ</td>
                        <td>| 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, TPHCM</td>
                    </tr>
                    <tr>
                        <td><img src="Hinh/dt.png" width="25"> Điện thoại</td>
                        <td>| 0283 8163 318</td>
                    </tr>
                    <tr class="border-bottom">
                        <td><img src="Hinh/mail.png" width="25"> Email</td>
                        <td>| infor@hufl.edu.vn</td>
                    </tr>
                </table>
            </div>
            <div class="col-5">
                <img src="Hinh/map.png" class="w-100">
            </div>
        </div>
    </div>
</body>
</html>
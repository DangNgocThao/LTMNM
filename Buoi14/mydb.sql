-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 11, 2023 lúc 10:58 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Fruit'),
(3, 'Books'),
(4, 'Stuff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image_file`) VALUES
(1, 'Pin sạc dự phòng Zoda 10.000mAh', 'Pin sạc dự phòng Zoda 10.000mAh có thiết kế nhỏ gọn, sở hữu dung lượng lớn cho phép sạc lại thiết bị nhiều lần trong ngày. Trang bị cổng ra USB-A và cổng vào USB-C thông dụng và màn hình điện tử thông báo dung lượng pin tiện lợi.', 250000, 'image.png'),
(2, 'Loa Bluetooth Havit SK838BT', 'Loa Bluetooth Havit SK838BT sở hữu thiết kế nhỏ gọn, nằm vừa trong lòng bàn tay, thêm dây móc treo tiện lợi. Loa kết nối 2 loa cùng một lúc, công nghệ âm thanh vòm 3D sống động, kháng nước chuẩn IPX7. Hỗ trợ kết nối ổn định với cổng 3.5mm và thẻ MicroSD.', 290000, 'image.jpg'),
(3, 'Tai nghe Gaming HAVIT H2232D', 'Tai nghe Gaming HAVIT H2232D hỗ trợ dải đèn LED RGB hai bên housing, thiết kế oversize cho cảm giác đeo êm ái trong nhiều giờ chơi game, Driver 50mm 2 bên tai nghe, mang tới âm trường rộng và thoáng hơn', 290000, 'image-1.jpg'),
(4, 'Kính cường lực camera iPhone 14/14 Plus Zeelot', 'Kính cường lực camera iPhone 14/14 Plus Zeelot được sở hữu độ trong suốt cao, giúp bảo vệ camera bạn không bị trầy xước, chống bụi bẩn từ đó mang đến những bức ảnh chất lượng cho bạn.', 315000, 'image-2.jpg'),
(5, 'Laptop Gigabyte G5 GE', 'Laptop Gaming', 21690000, 'image-3.jpg'),
(6, 'Laptop MSI Katana GF66 12UCK 815VN', 'Laptop Gaming', 20990000, 'image-4.jpg'),
(7, 'Laptop Acer Nitro Gaming AN515 56 51N4', 'Laptop Gaming', 14990000, 'image-5.jpg'),
(8, 'Laptop HP 348 G7', 'Laptop Enterprise', 11690000, 'image-3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_cat`
--

CREATE TABLE `pro_cat` (
  `pro_id` int NOT NULL,
  `cat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_cat`
--

INSERT INTO `pro_cat` (`pro_id`, `cat_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(4, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateresetpass` datetime DEFAULT NULL,
  `token` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `dateresetpass`, `token`) VALUES
('admin', '$2y$10$spIv5yhhRo1kKk3BABeD9egRR6O4izPXv5TcL6AZISFMy/QVkHksS', 'dangthao352002@gmail.com', NULL, NULL),
('tan', '$2y$10$EE1r0dgj2I3WS59MOfUsVeZE1oRkJVu7817hElmu/y7hLTq/Ow8im', 'nguyennhuttan12052002@gmail.com', NULL, NULL),
('vinh', '$2y$10$6TM1dKW3nRpv7xek.MJEI.0uilddOZXBMB5197tdR9yT438BZX/UK', 'ngquanvinh2906@gmail.com', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`username`,`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD PRIMARY KEY (`pro_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD CONSTRAINT `pro_cat_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pro_cat_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

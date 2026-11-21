-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 11, 2023 lúc 10:57 AM
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
-- Cơ sở dữ liệu: `phpexam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `mablog` int NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mota` varchar(4095) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `maloai` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`mablog`, `hinh`, `tieude`, `mota`, `ngaydang`, `maloai`, `trangthai`) VALUES
(1, 'hinh1.png', 'Anh ấy sẽ đạt được điều này với sự chăm chỉ theo thời gian', 'Điều quan trọng là phải chăm sóc bệnh nhân, được bệnh nhân theo dõi, nhưng nó sẽ xảy ra vào thời điểm đó rất nhiều công việc và đau đớn. Vì đến từng chi tiết nhỏ nhất, không ai nên thực hành bất kỳ loại công việc nào trừ khi anh ta thu được một số lợi ích từ nó.', '2023-05-30', 1, 1),
(2, 'hinh2.png', 'Anh ấy sẽ đạt được điều này với sự chăm chỉ theo thời gian 2', 'Điều quan trọng là phải chăm sóc bệnh nhân, được bệnh nhân theo dõi, nhưng nó sẽ xảy ra vào thời điểm đó rất nhiều công việc và đau đớn. Vì đến từng chi tiết nhỏ nhất, không ai nên thực hành bất kỳ loại công việc nào trừ khi anh ta thu được một số lợi ích từ nó.', '2023-05-30', 2, 1),
(3, 'hinh1.jpg', 'test', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test', '2023-05-30', 1, 1),
(7, 'hinh.jpg', 'Giới thiệu sinh viên', '2001206904 - Đặng Ngọc Thảo', '2023-05-30', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
(1, 'Tin tức'),
(2, 'Truyện');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`mablog`),
  ADD KEY `maloai` (`maloai`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `mablog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 11, 2023 lúc 10:56 AM
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
-- Cơ sở dữ liệu: `aniworld`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int NOT NULL,
  `hinh` int NOT NULL,
  `tenSP` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tacGia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gia` int NOT NULL,
  `namXB` int NOT NULL,
  `moTa` varchar(4095) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `hinh`, `tenSP`, `tacGia`, `gia`, `namXB`, `moTa`) VALUES
(1, 2131165323, 'Doraemon', 'Fujiko F. Fujio', 18000, 2022, 'Những câu chuyện về chú mèo máy thông minh Doraemon và nhóm bạn Nobita, Shizuka, Suneo, Jaian, Dekisugi sẽ đưa chúng ta bước vào thế giới hồn nhiên, trong sáng đầy ắp tiếng cười với một kho bảo bối kì diệu - những bảo bối biến ước mơ của chúng ta thành sự thật. Nhưng trên tất cả Doraemon là hiện thân của tình bạn cao đẹp, của niềm khát khao vươn tới những tầm cao.'),
(2, 2131165428, 'One Piece', 'Eiichiro Oda', 25000, 2022, 'One Piece (Vua Hải Tặc) bộ truyện thuộc thể loại truyện tranh hành động kể về một cậu bé tên Monkey D. Luffy, giong buồm ra khơi trên chuyến hành trình tìm kho báu huyền thoại One Piece và trở thành Vua hải tặc. Để làm được điều này, cậu phải đến được tận cùng của vùng biển nguy hiểm và chết chóc nhất thế giới: Grand Line (Đại Hải Trình). Luffy đội trên đầu chiếc mũ rơm như một nhân chứng lịch sử vì chiếc mũ rơm đó đã từng thuộc về hải tặc hùng mạnh: Hải tặc vương Gol. D. Roger và tứ hoàng Shank \"tóc đỏ\". Luffy lãnh đạo nhóm hải tặc Mũ Rơm qua East Blue (Biển Đông) và rồi tiến đến Grand Line. Cậu theo dấu chân của vị vua hải tặc quá cố Gol. D. Roger, chu du từ đảo này sang đảo khác để đến với kho báu vĩ đại.'),
(3, 2131165414, 'Naruto', 'Masashi Kishimoto', 26000, 2022, 'Mười hai năm trước khi bộ truyện này bắt đầu, con Hồ Ly Chín Đuôi đã tấn công ngôi làng ninja làng Lá (木ノ葉隠れ Konohagakure?). Đủ sức mạnh để khiến sóng thần nổi dậy và san bằng núi non chỉ với một trong số chín cái đuôi của nó, nó đã gây nên sự hỗn loạn tột cùng và giết chóc nhiều người, cho tới khi người lãnh đạo của làng Lá – ngài Hokage Đệ Tứ (Namikaze Minato)đã hi sinh để phong ấn con quái vật bằng thuật cấm: Kin Jutsu Ogi! \"Shiki Fuin\" (Một thuật cấm phải đánh đổi bằng tính mạng) vào người Naruto khi cậu ta mới sinh. Hokage Đệ Tứ, người được vinh danh vì đã phong ấn con yêu hồ li, mong muốn Naruto được người dân tôn trọng vì đã là thân xác chứa đựng con quái vật.'),
(4, 2131165435, 'Your Name', 'Makoto Shinkai', 65600, 2017, 'Mitsuha là nữ sinh trung học sống ở vùng quê hẻo lánh. Một ngày nọ, cô mơ thấy mình ở Tokyo trong một căn phòng xa lạ, biến thành con trai, gặp những người bạn chưa từng quen biết. Trong khi đó ở một nơi khác, Taki, một nam sinh trung học người Tokyo lại mơ thấy mình biến thành con gái, sống ở vùng quê hẻo lánh. Cuối cùng hai người họ nhận ra đang bị hoán đổi với nhau qua giấc mơ. Kể từ lúc hai con người xa lạ ấy gặp nhau, bánh xe số phận bắt đầu chuyển động.'),
(5, 2131165352, 'Khu Vườn Ngôn Từ', 'Shinkai Makoto', 98400, 2015, 'Khu vườn ngôn từ kể về một tình yêu còn xa xưa hơn cả tình yêu. Khái niệm tình yêu trong tiếng Nhật hiện đại là luyến hoặc ái, nhưng vào thời xưa nó được viết là cô bi, nghĩa là nỗi buồn một mình. Shinkai Makoto đã cấu tứ Khu vườn ngôn từ theo ý nghĩa cổ điển này, miêu tả tình yêu theo khái niệm ban sơ của nó, tức là cô bi - nỗi buồn khi một mình thương nhớ một người. Những ngày mưa triền miên.... Nơi hàng hiên ngập tràn màu xanh của một khu vườn Nhật Bản... Có một cảm xúc êm dịu đến không thốt nên lời cứ thế manh nha, tựu hình và lửng lơ tồn tại. Trong lúc dòng đời cuồn cuộn chảy trôi, tất cả hối hả tiến về phía trước, thì cậu và cô lại dừng chân, chìm xuống trong tĩnh lặng riêng mình, và ở cái vũng tĩnh lặng đó, họ tìm thấy nhau. Dần dần và mạo hiểm, quên đi cả các chênh lệch về tuổi tác và vị trí, họ thả hồn mình trôi về nhau hòa điệu. Làm nền cho tất cả là mưa rơi không ngừng, là lá mướt mát rung rinh. Nhưng khi mưa tạnh và trời quang trở lại, mọi đường nét của hiện thực trở nên rõ rệt đến khắc nghiệt, thì những êm dịu và lửng lơ kia liệu còn khả năng tồn tại?'),
(6, 2131165328, 'Dragon Ball', 'Akira Toriyama', 50000, 2022, 'Dragon Ball - 7 Viên Ngọc Rồng là câu chuyện kể về cậu bé có đuôi khỉ tên là Goku được tìm thấy bởi ông lão sống một mình trong rừng, ông lão xem đứa bé như là cháu của mình. Một ngày nọ Goku tình cờ gặp cô gái tên là Bulma trên đường đi bắt cá về, Goku và Bulma đã cùng nhau truy tìm bảy viên ngọc rồng. Bảy viên ngọc rồng chứa đựng bí mật có thể triệu hồi một con rồng và ban điều ước cho ai sở hữu chúng.'),
(7, 2131165431, 'Khóa Chặt Cửa Nào Suzume', 'Shinkai Makoto', 10000, 2022, 'Truyện kể về Suzume, một cô gái 17 tuổi đến từ một thị trấn Kyushu yên tĩnh gặp một chàng trai trẻ đang tìm kiếm một cánh cửa. Bộ truyện hiện đã chuyển thể thành Movie'),
(8, 2131165430, 'Dáng Hình Thanh Âm', 'Yoshitoki Oima', 300000, 2017, 'Câu truyện xoay quanh hai nhân vật chính.  Shoyo Ishida từng là một cậu bé côn đồ, chuyên bắt nạt bạn học bị điếc là Shoko Nishimiya. Sau một biến cố, Ishida bỗng trở nên bị cô lập, trầm cảm, và có ý nghĩa tự sát.'),
(9, 2131165353, 'Kimetsu No Yaiba', 'Gotouge Koyoharu', 22500, 2021, 'Vào thời Taisho, có một cậu bé bán than với tấm lòng nhân hậu tên Tanjiro. Những ngày yên bình đã chẳng còn khi Quỷ đến tàn sát cả gia đình cậu, chỉ duy nhất người em gái Nezuko còn sống sót nhưng lại bị biến thành Quỷ. Mang trong mình quyết tâm chữa cho em gái, Tanjiro đã cùng Nezuko bắt đầu cuộc hành trình tìm kiếm tung tích con quỷ đã ra tay với gia đình cậu!! Cuộc phiêu lưu trên con đường kiếm sĩ đã bắt đầu!!'),
(10, 2131165354, 'Phước Lành Cho Thế Giới', 'Natsume Akatsuki', 25000, 2015, 'Một tên ăn hại thích chơi game có một cái chết rất buồn cười được nữ thần cho đến thế giới phép màu, vui thay hắn có cheated code làm cho nữ thần phải đi theo mình. Cuộc đời mới bắt đầu.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

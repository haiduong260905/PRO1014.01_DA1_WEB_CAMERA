-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2023 at 04:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_binhluan`
--

CREATE TABLE `tb_binhluan` (
  `id` int NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tendn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idsp` int NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ngaybinhluan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_binhluan`
--

INSERT INTO `tb_binhluan` (`id`, `noidung`, `tendn`, `idsp`, `tensp`, `ngaybinhluan`) VALUES
(140, 'good', 'kaoxown', 72, 'Máy ảnh Canon EOS R6', '08/12/2023'),
(145, 'ádad', 'caosontran', 72, 'Máy ảnh Canon EOS R6', '08/12/2023'),
(146, 'sadas', 'caosontran', 72, 'Máy ảnh Canon EOS R6', '08/12/2023'),
(147, 'tuyệt', 'caosontran', 72, 'Máy ảnh Canon EOS R6', '08/12/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id` int NOT NULL,
  `tendm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hinhdm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id`, `tendm`, `hinhdm`) VALUES
(40, 'Phụ Kiện', ''),
(41, 'Ống Kính', ''),
(42, 'Thân Máy', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id` int NOT NULL,
  `makh` int DEFAULT '0',
  `tenkh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dc_dh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_dh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_dh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pttt` varchar(50) DEFAULT NULL,
  `ngaydathang` varchar(50) NOT NULL,
  `tong` int NOT NULL DEFAULT '0',
  `trangthai_dh` tinyint(1) NOT NULL DEFAULT '0',
  `ten_nguoinhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dc_nguoinhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sdt_nguoinhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_donhang`
--

INSERT INTO `tb_donhang` (`id`, `makh`, `tenkh`, `dc_dh`, `sdt_dh`, `email_dh`, `pttt`, `ngaydathang`, `tong`, `trangthai_dh`, `ten_nguoinhan`, `dc_nguoinhan`, `sdt_nguoinhan`) VALUES
(155, 29, 'kaoxown', 'Trần Khất Chân', '0826240504', 'caosontr@gmail.com', NULL, '08/12/2023', 0, 0, NULL, NULL, NULL),
(165, 29, 'kaoxown', 'Trần Khất Chân', '0826240504', 'caosontr@gmail.com', NULL, '08/12/2023', 34000, 2, NULL, NULL, NULL),
(168, 34, 'caosontran', 'Lò Đúc', '0826240504', 'son@gmail.com', NULL, '09/12/2023', 8190000, 0, NULL, NULL, NULL),
(169, 34, 'caosontran', 'Lò Đúc', '0826240504', 'son@gmail.com', NULL, '09/12/2023', 10990000, 0, NULL, NULL, NULL),
(170, 34, 'caosontran', 'Lò Đúc', '12312414', 'son@gmail.com', NULL, '09/12/2023', 33490000, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_giohang`
--

CREATE TABLE `tb_giohang` (
  `id` int NOT NULL,
  `makh` int NOT NULL,
  `masp` int NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gia` int NOT NULL DEFAULT '0',
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `iddonhang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tb_giohang`
--

INSERT INTO `tb_giohang` (`id`, `makh`, `masp`, `hinh`, `ten`, `gia`, `soluong`, `thanhtien`, `iddonhang`) VALUES
(287, 34, 85, '../upload/18-135.jpg', 'Ống kính Canon EF-S 18-135mm f/3.5 -5.6 IS USM', 8190000, 1, 8190000, 168),
(288, 34, 85, '../upload/18-135.jpg', 'Ống kính Canon EF-S 18-135mm f/3.5 -5.6 IS USM', 8190000, 1, 8190000, 169),
(289, 34, 84, '../upload/50mmf1.8.jpg', 'Ống Kính 50mm F1.8', 2800000, 1, 2800000, 169),
(290, 34, 40, '../upload/70-200.jpg', 'Ống kính Canon EF 70-200mm f/2.8L IS III USM', 33490000, 1, 33490000, 170);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id` int NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `giasp` int DEFAULT NULL,
  `soluong` int NOT NULL DEFAULT '0',
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hinh2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hinh3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mota` text,
  `donvi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ngaynhap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id`, `tensp`, `giasp`, `soluong`, `hinh`, `hinh2`, `hinh3`, `mota`, `donvi`, `ngaynhap`, `iddm`) VALUES
(74, 'Máy ảnh Canon EOS R6', 37990000, 1234, 'canonr6.png', NULL, NULL, '', 'Canon', '31123-03-12', 42),
(75, 'Máy ảnh Fujifilm X-T30', 20490000, 564536, 'fj-xt30.jpg', NULL, NULL, '', 'FujiFilm', '1023-03-04', 42),
(76, 'Máy ảnh Fujifilm X-T3', 16990000, 12, 'fuji_xt3.jpg', NULL, NULL, '', 'FujiFilm', '5442-02-13', 42),
(77, '    Máy Ảnh Leica SL2', 186000000, 3, 'leicaboutique.jpg', NULL, NULL, '', 'Leica', '0423-04-23', 42),
(78, 'Máy ảnh Nikon D750', 24790000, 53, 'nikond750.jpg', NULL, NULL, '', 'Nikon', '', 42),
(79, 'Máy ảnh Nikon Z6', 26490000, 33, 'nikonz6.jpg', NULL, NULL, '', 'Nikon', '', 42),
(80, 'Máy ảnh Sony A7 Mark III', 37990000, 12, 'product-1.jpg', NULL, NULL, '', 'Sony', '', 42),
(81, 'Máy ảnh Sony Alpha A6000', 11990000, 45, 'product-2.jpg', NULL, NULL, '', 'Sony', '', 42),
(82, 'Máy quay phim Sony FX3', 87990000, 10, 'product-4.jpg', NULL, NULL, '', 'Sony', '', 42),
(83, 'Ống kính Canon EF 70-200mm f/2.8L IS III USM', 33490000, 55, '70-200.jpg', NULL, NULL, '', 'Canon', '', 41),
(84, 'Ống Kính 50mm F1.8', 2800000, 123145, '50mmf1.8.jpg', NULL, NULL, '', 'Canon', '', 41),
(85, 'Ống kính Canon EF-S 18-135mm f/3.5 -5.6 IS USM', 8190000, 44, '18-135.jpg', NULL, NULL, '', 'Canon', '', 41),
(86, 'Pin Wasabi LP-E6 dùng cho Canon 60D, 70D, 80D, 6D, 7D,...', 439000, 10000, 'pinlpe6.jpg', NULL, NULL, 'Pin Wasabi - thương hiệu pin-sạc hàng đầu uy tín tại Mỹ. Đứng đầu danh mục sản phẩm pin-sạc bán chạy nhất của Amazon - website bán hàng online nổi tiếng của Mỹ.\r\nPin Wasabi cung cấp các bộ sản phẩm chất lượng cao, đa dạng và tiện lợi. Đặc biệt lõi pin tiên tiến từ Nhật Bản cho dung lượng pin cao hơn cả pin hãng.\r\nWasabi Power được công ty TNHH Hoằng Quân phân phối chính hãng tại Việt Nam.\r\nChi tiết về sản phẩm:\r\n- Dùng được cho : Canon 60D, Canon 70D, Canon 77D, Canon 80D, Canon 6D, Canon 7D, Canon 7D Mark II, Canon 5D Mark II, Canon 5D Mark III, Canon 5D IV, Canon 5Ds, Canon 5Dsr\r\n- Bộ sản phẩm bao gồm: 1 viên pin dung lượng 2600mAh', 'Pin Canon', '', 40),
(87, 'Hắt Sáng Tròn 5in1 (110cm)', 350000, 10000, 'hatsang1.jpg', NULL, NULL, '', 'Hắt Sáng', '', 40),
(88, ' Bộ vệ sinh máy ảnh', 120000, 10000, 'vesinh.jpg', NULL, NULL, '', 'Vệ sinh', '', 40),
(89, 'Chân máy Yunteng VCT-668', 650000, 1234, 'chanmay.jpg', NULL, NULL, '', 'Chân máy', '', 40),
(90, 'Godox DP800III V, Mới 100% (Chính hãng)', 5200000, 100, 'flash.jpg', NULL, NULL, '', 'Flash', '', 40),
(91, 'Trigger Godox Xpro-S tích hợp TTL, HSS 1/8000s cho Sony', 1390000, 100, 'godox-xpro-sony.jpg', NULL, NULL, 'Godox vừa cho ra mắt bộ Trigger kích đèn thế hệ mới có màn hình lớn hơn và nhiều ưu điểm hơn so với các model đang có mặt trên thị tường, bộ kích đèn mới có tên Godox Xpro.\r\nTrigger Xpro của Godox có thể điều khiển các đèn flash ở chế độ TTL đồng bộ tốc độ máy ảnh ở 1/8000. Không chỉ có đèn flash Godox mà cả đèn flash của những hãng khác trong hệ thống  X1 2,4 GHz đều có thể được kết nối và kích hoạt dễ dàng.Thiết bị mới Godox Xpro này cho phép người dùng xử lý một lúc 16 đèn flash khác nhau trong một màn hình hiển thị và có thể đạt tốc độ đồng bộ lên tới 1/8000s. Điểm đặc biệt là Với một màn hình LCD ma trận lớn hiển thị 5 nhóm cùng một lúc và các nút nhóm chuyên dụng, XPro cung cấp một sự cải tiến lớn so với giao diện người dùng của bộ truyền tải R2 / X1 trước đây.Bên cạnh đó, Xpro có thể truyền dữ liệu một cách có chọn lọc để tiết kiệm năng lượng và tuổi thọ pin, cũng như chức năng phóng to hữu ích hiển thị chi tiết về cài đặt của từng nhóm đèn. Các điều chỉnh của toàn bộ các đèn trong cùng hệ thống có thể được thực hiện với các giá trị phơi sáng ở chế độ M, và một số tính năng khác bao gồm khóa FE, bù phơi sáng flash, và 11 chức năng tùy biến khác nhau phù hợp với nhiều yêu cầu chụp ảnh khác nhau.\r\n\r\n \r\n\r\nNgoài ra còn có một chức năng TTL-Convert-Manual (TCM) mới, cho phép bạn đo nháy mắt của bạn trong khi ở chế độ TTL. Nếu bạn sau đó nhấp vào một nút và chuyển sang chế độ thủ công, các cài đặt sẽ được tự động điều chỉnh để cung cấp cho đầu ra tương đương.\r\nTrên màn hình LCD, giao diện người dùng cũng có các nút lựa chọn trực tiếp cho mỗi nhóm đèn flash không dây – tương tự như Nissin Air 10s. Các nút như vậy sẽ mang lại khả năng sử dụng thuận tiện hơn khi sử dụng các đơn vị đèn flash một cách chính khác hơn.', 'Flash', '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `id` int NOT NULL,
  `tendn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `dc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `vaitro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT 'Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id`, `tendn`, `mk`, `hinh`, `email`, `dc`, `sdt`, `vaitro`) VALUES
(9, 'user4', '123', 'kh1.png', 'user4@gmail.com', 'Vân Canh - Hà Nội', '0123456789', 'Khách Hàng'),
(10, 'user1', '123', 'kh1.png', 'user1@gmail.com', 'Hà Nội - Vân Canh', '0123456789', 'Khách hàng'),
(11, 'user2', '123', 'kh1.png', 'user2@gmail.com', 'Hà Nội', '0123456789', 'Khách hàng'),
(12, 'user3', '123', 'kh1.png', 'user3@gmail.com', 'Hoài Đức - Hà Nội', '0123456789123', 'Khách hàng'),
(13, 'user5', '123', 'kh1.png', 'user5@gmail.com', 'Hà Nội ', '0123456789', 'Khách hàng'),
(28, 'caosontr', '1234', NULL, 'caosontr@gmail.com', '', '', 'admin'),
(29, 'kaoxown', '12345', NULL, 'sontcph33798@fpt.edu.vn     ', '123132đấádasd', '0826240504     ', 'Khách hàng'),
(30, 'trancaoson', '1234', NULL, 'caosontr@gmail.com', NULL, NULL, 'Khách hàng'),
(31, 'trancaoson', '1234', NULL, 'caosontr@gmail.com', NULL, NULL, 'Khách hàng'),
(32, 'trancaoson', '1234', NULL, 'caosontr@gmail.com', NULL, NULL, 'Khách hàng'),
(33, 'luybui', '1234', NULL, 'son@gmail.com', NULL, NULL, 'Khách hàng'),
(34, 'caosontran', '12345', NULL, 'son@gmail.com', NULL, NULL, 'Khách hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iddm`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `tb_danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

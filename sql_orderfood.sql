-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 05, 2021 lúc 07:46 AM
-- Phiên bản máy phục vụ: 10.5.12-MariaDB
-- Phiên bản PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id17924684_orderfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `mahd` int(9) NOT NULL,
  `mamon` int(11) NOT NULL,
  `tenmon` varchar(200) NOT NULL,
  `sl` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `danhgia` varchar(10) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `tt` varchar(50) NOT NULL DEFAULT 'Chờ xử lý.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `mamon` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `rating` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cmt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `mamon`, `matk`, `rating`, `cmt`, `date`) VALUES
(49, 21, 9, '4', '', '2021-11-29'),
(50, 73, 9, '5', 'ngon ma!', '2021-11-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(9) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `tt` varchar(20) NOT NULL DEFAULT 'Chờ xử lý.',
  `dc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `sdt`, `date`, `tt`, `dc`) VALUES
(125, '0392923691', '2021-11-28 14:31:10', 'Đã thanh toán.', 'Vinh Long'),
(126, '0392923691', '2021-11-28 15:15:43', 'Đã thanh toán.', 'Vinh Long'),
(127, '0392923691', '2021-11-28 15:48:07', 'Chờ xử lý.', 'Vinh Long'),
(128, '0392923691', '2021-11-28 15:48:40', 'Chờ xử lý.', 'Vinh Long'),
(137, '0392923691', '2021-11-29 19:35:43', 'Đã thanh toán.', 'Vinh Long'),
(138, '0392923691', '2021-11-30 12:45:57', 'Đã thanh toán.', 'Vinh Long');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimon`
--

CREATE TABLE `loaimon` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(200) NOT NULL,
  `hinhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaimon`
--

INSERT INTO `loaimon` (`maloai`, `tenloai`, `hinhanh`) VALUES
(1, 'Fried', 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/fried_potatoes.png?alt=media&token=a9a71a35-bcc2-4980-8009-00a3817f057e'),
(2, 'Kem', 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/ice_cream.png?alt=media&token=c7bb8adc-4fd4-40d7-804a-48c5dc948269'),
(3, 'Hamburger', 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/hamburger.png?alt=media&token=03832917-b8bd-4bad-8b44-0f32698b4f9f'),
(4, 'Sandwich', 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/sandwich.png?alt=media&token=9fed99b1-8630-431f-b29f-c3c8b95f9781'),
(5, 'Pizza', 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/pizza.png?alt=media&token=5736260c-4471-4820-8cf4-c162d927f7e1'),
(62, 'Banh mi', 'http://apporderfood1121.000webhostapp.com/server/imgCategory/fast-food-1851561-15692861638339409376.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `mamon` int(11) NOT NULL,
  `tenmon` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL,
  `danhgia` varchar(10) NOT NULL DEFAULT '5.0',
  `maloai` int(11) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `tt` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`mamon`, `tenmon`, `gia`, `danhgia`, `maloai`, `hinhanh`, `tt`) VALUES
(13, 'Kem', 20000, '4.5', 2, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/icecream1.jpg?alt=media&token=6ca59337-e16d-468a-bf5d-9540aceaebaf', 0),
(14, 'Kem 1', 20000, '3', 2, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/icecream2.jpg?alt=media&token=3de3641a-4048-42ec-be77-0b26d02b37f5', 0),
(15, 'Kem 2', 25000, '5', 2, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/icecream3.jpg?alt=media&token=1f22643a-67f4-40ad-bda4-45919fa84ddf', 0),
(16, 'Kem 3', 30000, '5', 2, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/icecream4.jpg?alt=media&token=c8cdf2e1-bc1c-4ed8-9058-a1776fdb264f', 0),
(17, 'Fried 1', 20000, '4', 1, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/fries1.jpg?alt=media&token=208695be-ac87-4862-8b75-a4c908fe5836', 0),
(18, 'Fried 2', 25000, '5', 1, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/fries2.jpg?alt=media&token=73163d23-00af-49c7-8b08-781f3b8c0a27', 0),
(19, 'Fried 3', 35000, '4', 1, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/fries3.jpg?alt=media&token=fb544976-43b3-448f-9861-c6e723e837d3', 0),
(20, 'Fried 4', 40000, '4.7', 1, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/fries4.jpg?alt=media&token=85279572-7b59-49cc-85aa-5dd7d55f1a11', 0),
(21, 'Hamburger 1', 30000, '4', 3, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/burger1.jpg?alt=media&token=c754d03d-43d1-4f04-88e8-79bb0e0baeef', 0),
(22, 'Hamburger 2', 35000, '4.6', 3, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/burger2.jpg?alt=media&token=38fb2255-63a7-4b09-9ab9-59612d847be8', 0),
(23, 'Hamburger 3', 50000, '4.8', 3, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/burger4.jpg?alt=media&token=e4213b53-6673-4218-8521-c21f3cfe2a69', 0),
(24, 'Pizza 1', 35000, '4.2', 5, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/pizza1.jpg?alt=media&token=ec4dddfd-9585-4b05-a8fa-6027d7234cbe', 0),
(25, 'Pizza 2', 40000, '4.5', 5, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/pizza2.jpg?alt=media&token=a43337eb-dec8-4589-810c-436c58bb6b0a', 0),
(26, 'Pizza 3', 45000, '4.7', 5, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/pizza3.jpg?alt=media&token=e2879a1f-2a4b-49d7-a812-e222b5d15669', 0),
(27, 'Pizza 4', 50000, '5', 5, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/pizza4.jpg?alt=media&token=6dd36284-e9e0-4c3c-9ee7-d45515572d1e', 0),
(28, 'Sandwich 1', 35000, '4.5', 4, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/sandwich1.jpg?alt=media&token=cf57d292-7450-436f-acb9-37ca43e89883', 0),
(29, 'Sandwich 2', 45000, '4.3', 4, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/sandwich2.jpg?alt=media&token=7cdf41cf-f014-4ee9-ac7c-213f57ba47a2', 0),
(30, 'Sandwich 3', 45000, '3', 4, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/sandwich3.jpg?alt=media&token=af84a6d8-b819-493f-a571-ec2c61008e32', 0),
(31, 'Sandwich 4', 60000, '4.8', 4, 'https://firebasestorage.googleapis.com/v0/b/orderfood-23d43.appspot.com/o/sandwich4.jpg?alt=media&token=2a872117-3413-4712-b9f2-969e3c35af10', 0),
(73, 'Banh mi bong dem', 999999, '3', 62, 'http://apporderfood1121.000webhostapp.com/server/imgMon/Phien_ban_moi_la_banh_mi_bong_dem11638344454511.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL,
  `tentk` varchar(200) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `mk` char(30) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `quyen` varchar(20) NOT NULL DEFAULT 'khach hang',
  `hinhanh` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tentk`, `sdt`, `mk`, `diachi`, `quyen`, `hinhanh`) VALUES
(1, 'Nguyễn Phát Tài', '0392923694', '123456', 'Cầu Ván Tân Long Hội Mang Thít Vĩnh Long', 'admin', 'http://apporderfood1121.000webhostapp.com/server/imgUsers/drink1636686561867.png'),
(3, 'Tài Nguyễn', '0392923692', '123456', 'Vũng Liêm', 'admin', ''),
(9, 'Nguyễn Tài', '0392923691', '123654', 'Vinh Long', 'khach hang', ''),
(26, 'Đặng Trí Nguyên', '0392923695', '123456', 'Vĩnh Long', 'admin', ''),
(32, 'Truyện Tranh tn', '0386541287', 'zxcvbhdhshs', '73 Nguyễn Huệ, Phường 2, TP, Vĩnh Long, Vietnam', 'khach hang', NULL),
(34, 'Truyện Tranh tz', '0386541288', 'qwertyuiop', '73 Nguyễn Huệ, Phường 2, TP, Vĩnh Long, Vietnam', 'admin', NULL),
(35, 'Trí Nguyên', '0901076409', '123456', 'Vĩnh Long', 'admin', 'http://apporderfood1121.000webhostapp.com/server/imgUsers/IMG_20210925_0117551636883759481.jpg'),
(36, 'phu', '0799517466', '123456', 'long ho, vinh long', 'khach hang', NULL),
(43, 'ggf', '1234567891', '4444447dgdh', '444fffccfsssdjdhA@ee', 'khach hang', NULL),
(45, 'ggf', '0981111111', '4444447dgdh', '444fffccfsssdjdhA@ee', 'khach hang', NULL),
(46, 'nvt', '0985112919', 'nvt123', 'vl', 'khach hang', NULL),
(49, 'cc', '0386541289', 'qwr123', 'ddd', 'khach hang', NULL),
(50, 'Truyện Tranh m4v', '0386541285', 'zzz111', 'ddd', 'admin', NULL),
(54, 'tai', '0349925859', '123123', 'vl', 'khach hang', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `fk_cthd_hd` (`mahd`),
  ADD KEY `fk_cthd_mon` (`mamon`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhgia_tk` (`matk`),
  ADD KEY `fk_danhgia_mon` (`mamon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `fk_hd_tk` (`sdt`);

--
-- Chỉ mục cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`maloai`),
  ADD UNIQUE KEY `tenloai` (`tenloai`);

--
-- Chỉ mục cho bảng `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`mamon`),
  ADD UNIQUE KEY `tenmon` (`tenmon`),
  ADD KEY `fk_mon_loaimon` (`maloai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`matk`),
  ADD UNIQUE KEY `sdt` (`sdt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `mon`
--
ALTER TABLE `mon`
  MODIFY `mamon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`),
  ADD CONSTRAINT `fk_cthd_mon` FOREIGN KEY (`mamon`) REFERENCES `mon` (`mamon`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_danhgia_mon` FOREIGN KEY (`mamon`) REFERENCES `mon` (`mamon`),
  ADD CONSTRAINT `fk_danhgia_tk` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_tk` FOREIGN KEY (`sdt`) REFERENCES `taikhoan` (`sdt`);

--
-- Các ràng buộc cho bảng `mon`
--
ALTER TABLE `mon`
  ADD CONSTRAINT `fk_mon_loaimon` FOREIGN KEY (`maloai`) REFERENCES `loaimon` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

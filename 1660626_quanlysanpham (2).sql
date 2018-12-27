-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2018 lúc 05:00 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `1660626_quanlysanpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(255) NOT NULL,
  `SoLuongSanPhamMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `MaSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `SoLuongSanPhamMua`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
(2, 1, 1990000, 'MDDH002', 21),
(6, 2, 1990000, 'MDDH003', 21),
(7, 1, 2390000, 'MDDH004', 55),
(8, 1, 2590000, 'MDDH004', 22),
(9, 1, 2290000, 'MDDH004', 54),
(10, 10, 2590000, 'MDDH005', 22),
(11, 1, 4790000, 'MDDH005', 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` varchar(9) CHARACTER SET utf8 NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  `DiaChiGiaoHang` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`, `DiaChiGiaoHang`) VALUES
('MDDH002', '2018-12-22 22:37:12', 1990000, 2, 2, NULL),
('MDDH003', '2018-12-22 22:39:12', 3980000, 2, 0, NULL),
('MDDH004', '2018-12-22 22:39:49', 7270000, 2, 1, NULL),
('MDDH005', '2018-12-27 10:56:57', 30690000, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL,
  `TenHangSanXuat` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `LogoURL` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'Apple Inc', 'assets/img/iPhone.png', 0),
(2, 'SamSung', 'assets/img/SamSung.png', 0),
(3, 'Nokia', 'assets/img/Nokia.png', 0),
(4, 'HuaWei', 'assets/img/Huawei.png', 0),
(5, 'Oppo', 'assets/img/Oppo.png', 0),
(6, 'HP', 'assets/img/2000px-HP_New_Logo_2D.svg.png', 1),
(7, 'Dell', 'assets/img/1024px-Dell_Logo.svg.png', 1),
(8, 'Asus', 'assets/img/1_NwfoiV9f96_MhpmJwdinPA.png', 1),
(10, '111', 'assets/img/youlose.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Phân Khúc Cao Cấp', 0),
(2, 'Phân Khúc Cận Cao Cấp', 0),
(3, 'Phân Khúc Tầm Trung', 0),
(4, 'Phân Khúc Giá Rẻ', 0),
(5, 'qqwewqeqwe', 1),
(7, 'wqeewq', 0),
(8, 'qwewqe', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motasanpham`
--

CREATE TABLE `motasanpham` (
  `MaSanPham` int(11) NOT NULL,
  `ManHinh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `HeDieuHanh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CameraSau` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CameraTruoc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CPU` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `RAM` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `BoNhoTrong` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `TheSim` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `DungLuongPin` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `XuatXu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `motasanpham`
--

INSERT INTO `motasanpham` (`MaSanPham`, `ManHinh`, `HeDieuHanh`, `CameraSau`, `CameraTruoc`, `CPU`, `RAM`, `BoNhoTrong`, `TheSim`, `DungLuongPin`, `XuatXu`) VALUES
(1, 'Super AMOLED, 5&quot; Quad HD (2K)', 'Android 6.0 (Marshmallow)', '12 MP', '5 MP', 'Exynos 8890 8 nhân 64-bit', '4 GB', '32 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Hàn Quốc'),
(2, 'Super AMOLED, 5.8&quot;', 'Android 7.0 (Nougat)', '12 MP', '8 MP', 'Exynos 8895 8 nhân 64-bit', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Hàn Quốc'),
(3, 'Super AMOLED, 6.2&quot;,Quad HD+ (2K+)', 'Android 7.0 (Nougat)', '12 MP', '8 MP', 'Exynos 8895 8 nhân 64-bit', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3500 mAh, có sạc nhanh', 'Hàn Quốc'),
(4, 'Super AMOLED, 5.8&quot;, Quad HD+ (2K+)', 'Android 8.0 (Oreo)', '12 MP', '8 MP', 'Exynos 9810 8 nhân 64 bit', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Hàn Quốc'),
(5, 'Super AMOLED, 6.2&quot;, Quad HD+ (2K+)', 'Android 8.0 (Oreo)', '2 camera 12 MP', '8 MP', 'Exynos 9810 8 nhân 64 bit', '6 GB', '128 GB\r\n', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3500 mAh, có sạc nhanh', 'Hàn Quốc'),
(6, 'Super AMOLED, 6.3&quot;, Quad HD+ (2K+)', 'Android 7.1 (Nougat)', '2 camera 12 MP', '8 MP', 'Exynos 8895 8 nhân 64-bit', '6 GB', '64 GB', '\r\n2 Nano SIM, Hỗ trợ 4G', '3300 mAh, có sạc nhanh', 'Hàn Quốc'),
(7, 'Super AMOLED, 6.4&quot;, Quad HD+ (2K+)', 'Android 8.1 (Oreo)', '2 camera 12 MP', '8 MP', 'Exynos 9810 8 nhân 64 bit', '6 GB', '128 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4000 mAh, có sạc nhanh', 'Hàn Quốc'),
(8, 'Super AMOLED, 6.0&quot;, Full HD+', 'Android 8.0 (Oreo)', '24 MP, 8 MP và 5 MP (3 camera)', '24 MP', 'Exynos 7885 8 nhân 64-bit', '4 GB', '64 GB', '\r\n2 Nano SIM, Hỗ trợ 4G', '3300 mAh', 'Hàn Quốc'),
(9, 'Super AMOLED, 5.6&quot;, Full HD+', 'Android 7.1 (Nougat)', '16 MP', '16 MP và 8 MP (2 camera)', 'Exynos 7885 8 nhân 64-bit', '4 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Hàn Quốc'),
(10, 'Super AMOLED, 6.3&quot;, Full HD+', 'Android 8.0 (Oreo)', '24 MP, 10 MP, 8 MP và 5 MP (4 camera)', '24 MP', 'Qualcomm Snapdragon 660 8 nhân', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '3800 mAh, có sạc nhanh', 'Hàn Quốc'),
(11, 'LED-backlit IPS LCD, 4.7&quot;', 'iOS 11', '8 MP', '1.2 MP', 'Apple A8 2 nhân 64-bit', '1 GB', '32 GB', '1 Nano SIM, Hỗ trợ 4G', '1810 mAh', 'Nhật'),
(12, 'LED-backlit IPS LCD, 5.5&quot;, Retina HD', 'iOS 11', '12 MP', '5 MP', 'Apple A9 2 nhân 64-bit', '2 GB', '32 GB', '\r\n1 Nano SIM, Hỗ trợ 4G', '2750 mAh', 'Việt Nam'),
(13, 'LED-backlit IPS LCD, 4.7&quot;, Retina HD', 'iOS 11', '12 MP', '7 MP', 'Apple A10 Fusion 4 nhân 64-bit', '2 GB', '32 GB', '1 Nano SIM, Hỗ trợ 4G', '1960 mAh', 'Mỹ'),
(14, 'LED-backlit IPS LCD, 5.5&quot;, Retina HD', 'iOS 11', '2 camera 12 MP', '7 MP', 'Apple A10 Fusion 4 nhân 64-bit', '2 GB', '32 GB', '1 Nano SIM, Hỗ trợ 4G', '2900 mAh', 'Việt Nam'),
(15, 'LED-backlit IPS LCD, 4.7&quot;, Retina HD', 'iOS 11', '12 MP', '7 MP', 'Apple A11 Bionic 6 nhân', '2 GB', '64 GB', '\r\n1 Nano SIM, Hỗ trợ 4G', '1821 mAh, có sạc nhanh', 'Nhật'),
(16, 'LED-backlit IPS LCD, 5.5&quot;, Retina HD', 'iOS 11', '2 camera 12 MP', '7 MP', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', '1 Nano SIM, Hỗ trợ 4G', '2691 mAh, có sạc nhanh', 'Việt Nam'),
(17, 'OLED, 5.8&quot;, Super Retina', 'iOS 11', '2 camera 12 MP', '7 MP', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', '1 Nano SIM, Hỗ trợ 4G', '2716 mAh, có sạc nhanh', 'Mỹ'),
(18, 'IPS LCD, 6.1&quot;, IPS LCD, 16 triệu màu', 'iOS 12', '12 MP', '7 MP', 'Apple A12 Bionic 6 nhân', '3 GB', '64 GB', '1 Nano SIM, Hỗ trợ 4G', '2942 mAh, có sạc nhanh', 'Mỹ'),
(19, 'OLED, 5.8&quot;, Super Retina', 'iOS 12', '2 camera 12 MP', '7 MP', 'Apple A12 Bionic 6 nhân', '4 GB', '256 GB', 'Nano SIM & eSIM, Hỗ trợ 4G', '2658 mAh, có sạc nhanh', 'Mỹ'),
(20, 'OLED, 6.5\", Super Retina', 'iOS 12', '2 camera 12 MP', '7 MP', 'Apple A12 Bionic 6 nhân', '4 GB', '512 GB', '\r\nNano SIM & eSIM, Hỗ trợ 4G', '3174 mAh, có sạc nhanh', 'Nhật'),
(21, 'LTPS LCD, 5\", HD', 'Android 7.1 (Nougat)', '8 MP', '5 MP', 'Qualcomm Snapdragon 212 4 nhân 32-bit', '1 GB', '8 GB', '\r\n2 Nano SIM, Hỗ trợ 4G', '4100 mAh', 'Phần Lan'),
(22, 'IPS LCD, 5.5\", HD', 'Android Go Edition', '8 MP', '5 MP', 'Qualcomm Snapdragon 425 4 nhân 64-bit', '1 GB', '8 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh', 'Phần Lan'),
(23, 'IPS LCD, 5\", HD', 'Android 7.0 (Nougat)', '8 MP', '8 MP', 'MT6737 4 nhân', '2 GB', '16 GB', '2 Nano SIM, Hỗ trợ 4G', '2630 mAh', 'Phần Lan'),
(24, 'IPS LCD, 5.2\", HD+', 'Android 8.0 (Oreo)', '13 MP', '8 MP', 'MediaTek MT6750N 8 nhân', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '2990 mAh', 'Phần Lan'),
(25, 'IPS LCD, 5.2\", HD', 'Android 7.1 (Nougat)', '13 MP', '8 MP', 'Qualcomm Snapdragon 430 8 nhân 64 bit', '2 GB', '16 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh', 'Phần Lan'),
(26, 'IPS LCD, 5.8\", HD+', 'Android One', '13 MP và 5 MP (2 camera)', '8 MP', 'MediaTek Helio P60 8 nhân 64-bit', '3 GB', '32 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3060 mAh, có sạc nhanh', 'Phần Lan'),
(27, 'IPS LCD, 5.5\", Full HD', 'Android 7.0 (Nougat)', '16 MP', '8 MP', 'Qualcomm Snapdragon 430 8 nhân 64 bit', '3 GB', '32 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh', 'Phần Lan'),
(28, 'IPS LCD, 5.5\", Full HD', 'Android 8.0 (Oreo)', '16 MP', '8 MP', 'Qualcomm Snapdragon 630 8 nhân', '3 GB', '32 GB', '\r\n2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Phần Lan'),
(29, 'IPS LCD, 5.8\", Full HD+', 'Android One', '16 MP và 5 MP (2 camera)', '16 MP', 'Qualcomm Snapdragon 636 8 nhân', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3060 mAh, có sạc nhanh', 'Phần Lan'),
(30, 'IPS LCD, 6\", Full HD+', 'Android 8.0 (Oreo)', '12 MP và 13 MP (2 camera)', '16 MP', 'Qualcomm Snapdragon 660 8 nhân', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3800 mAh, có sạc nhanh', 'Trung Quốc'),
(31, 'IPS LCD, 6.0\", Full HD+', 'ColorOS 3.2 (Android 7.1)', '16 MP', '20 MP', 'Mediatek Helio P23 8 nhân 64-bit', '4 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3200 mAh', 'Trung Quốc'),
(32, 'IPS LCD, 6.0\", Full HD+', 'ColorOS 3.2 (Android 7.1)', '13 MP', '16 MP', 'Mediatek Helio P23 8 nhân 64-bit', '3 GB', '32GB', '2 Nano SIM, Hỗ trợ 4G', '3200 mAh', 'Trung Quốc'),
(33, 'LTPS LCD, 6.23\", Full HD+', 'ColorOS 5.0 (Android 8.1)', '16 MP', '25 MP', 'MediaTek Helio P60 8 nhân 64-bit', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3400 mAh', 'Trung Quốc'),
(34, 'LTPS LCD, 6.0\", Full HD+', 'ColorOS 5.0 (Android 8.1)', '13 MP', '8 MP', 'MediaTek Helio P60 8 nhân 64-bit', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3410 mAh', 'Trung Quốc'),
(35, 'LTPS LCD, 6.3\", Full HD+', 'ColorOS 5.2 (Android 8.1)', '16 MP và 2 MP (2 camera)', '25 MP', 'MediaTek Helio P60 8 nhân 64-bit', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3500 mAh, có sạc nhanh', 'Trung Quốc'),
(36, 'AMOLED, 6.42\", Full HD+', 'Android 8.1 (Oreo)', '20 MP và 16 MP (2 camera)', '25 MP', 'Snapdragon 845 8 nhân', '8 GB', '256 GB', '2 Nano SIM, Hỗ trợ 4G', '3730 mAh, có sạc nhanh', 'Trung Quốc'),
(37, 'IPS LCD, 6.2\", HD+', 'ColorOS 5.2 (Android 8.1)', '13 MP và 2 MP (2 camera)', '16 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '4230 mAh', 'Trung Quốc'),
(38, 'IPS LCD, 5.2\", HD', 'Android 7.1 (Nougat)', '13 MP', '5 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh', 'Trung Quốc'),
(39, 'IPS LCD, 5.7\", HD+', 'Android 7.1 (Nougat)', '13 MP', '8 MP', 'Mediatek Helio P23 8 nhân 64-bit', '2 GB', '16 GB', '2 Nano SIM, Hỗ trợ 4G', '3180 mAh', 'Trung Quốc'),
(40, 'IPS LCD, 6.2\", HD+', 'Android 8.1 (Oreo)', '13 MP và 2 MP (2 camera)', '8 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '4230 mAh', 'Trung Quốc'),
(41, 'IPS LCD, 5.7\", HD+', 'Android 8.0 (Oreo)', '13 MP', '8 MP', 'Qualcomm Snapdragon 425 4 nhân 64-bit', '2 GB', '16 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh', 'Trung Quốc'),
(42, 'IPS LCD, 5.99\", HD+', 'Android 8.0 (Oreo)', '13 MP và 2 MP (2 camera)', '8 MP', 'Qualcomm Snapdragon 430 8 nhân 64 bit', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh', 'Trung Quốc'),
(43, 'IPS LCD, 5.9\", Full HD+', 'Android 7.0 (Nougat)', '16 MP và 2 MP (2 camera)', '13 MP và 2 MP (2 camera)', 'HiSilicon Kirin 659 8 nhân', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3340 mAh', 'Trung Quốc'),
(44, 'LTPS LCD, 6.5\", Full HD+', 'Android 8.1 (Oreo)', '13 MP và 2 MP (2 camera)', '16 MP và 2 MP (2 camera)', 'HiSilicon Kirin 710', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh', 'Trung Quốc'),
(45, 'IPS LCD, 5.84\", Full HD+', 'Android 8.0 (Oreo)', '16 MP và 2 MP (2 camera)', '16 MP', 'HiSilicon Kirin 659 8 nhân', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh, có sạc nhanh', 'Trung Quốc'),
(46, 'LTPS LCD, 6.3\", Full HD+', 'Android 8.0 (Oreo)', '16 MP và 2 MP (2 camera)', '24 MP và 2 MP (2 camera)', 'HiSilicon Kirin 710', '4 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '3340 mAh', 'Trung Quốc'),
(47, 'LTPS LCD, 6.3\", Full HD+', 'Android 8.0 (Oreo)', '24 MP và 16 MP (2 camera)', '24 MP và 2 MP (2 camera)', 'Hisilicon Kirin 970 8 nhân', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '3750 mAh, có sạc nhanh', 'Trung Quốc'),
(48, 'IPS LCD, 6.5\", Full HD+', 'Android 9.0 (Pie)', '12 MP, 16 MP và 8 MP (3 camera)', '24 MP', 'Hisilicon Kirin 980 8 nhân 64-bit', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh, có sạc nhanh', 'Trung Quốc'),
(49, 'OLED, 6.39\", Quad HD+ (2K+)', 'Android 9.0 (Pie)', '40 MP, 20 MP và 8 MP (3 camera)', '24 MP', 'Hisilicon Kirin 980 8 nhân 64-bit', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4200 mAh, có sạc nhanh', 'Trung Quốc'),
(50, 'IPS LCD, 5\", HD', 'Android 6.0 (Marshmallow)', '8 MP', '5 MP', 'MT6737T, 4 nhân', '2 GB', '16 GB', '\r\n2 Micro SIM, Hỗ trợ 4G', '3000 mAh', 'Trung Quốc'),
(51, 'LED-backlit IPS LCD, 4\", DVGA', 'iOS 10', '8 MP', '1.2 MP', 'Apple A7 2 nhân 64-bit', '1 GB', '16 GB', '1 Nano SIM, Hỗ trợ 4G', '1560 mAh', NULL),
(52, 'LED-backlit IPS LCD, 4\", DVGA', 'iOS 6', '8 MP', '1.2 MP', 'Apple A6 2 nhân 32-bit', '1 GB', '16 GB', '1 Nano SIM, Hỗ trợ 4G', '1440 mAh', NULL),
(53, 'LED-backlit IPS LCD, 4\", DVGA', 'iOS 6', '8 MP', '1.2 MP', 'Apple A6 2 nhân 32-bit', '1 GB', '32 GB', '1 Nano SIM, Hỗ trợ 4G', '1440 mAh', NULL),
(54, 'PLS TFT LCD, 5\", qHD', 'Android 6.0 (Marshmallow)', '8 MP', '5 MP', 'MT6737 4 nhân', '1.5 GB', '8 GB', '2 Micro SIM, Hỗ trợ 4G', '2600 mAh', NULL),
(55, 'PLS TFT LCD, 5\", qHD', 'Android Go Edition', '8 MP', '5 MP', 'Qualcomm Snapdragon 425 4 nhân 64-bit', '1 GB', '8 GB', '2 Micro SIM, Hỗ trợ 4G', '2600 mAh', NULL),
(56, 'Super AMOLED, 5\", qHD', 'Android 7.1 (Nougat)', '8 MP', '5 MP', 'Qualcomm Snapdragon 425 4 nhân 64-bit', '1.5 GB', '16 GB', '2 Micro SIM, Hỗ trợ 4G', '2600 mAh', NULL),
(57, 'TFT, 6.0\", HD+', 'Android Go Edition', '8 MP', '5 MP', 'Qualcomm Snapdragon 425 4 nhân 64-bit', '1 GB', '16 GB', '2 Micro SIM, Hỗ trợ 4G', '3300 mAh', NULL),
(58, 'Super AMOLED, 5.5\", HD', 'Android 8.0 (Oreo)', '13 MP', '5 MP', 'Exynos 7570 4 nhân 64-bit', '2 GB', '16 GB', '2 Micro SIM, Hỗ trợ 4G', '3000 mAh', NULL),
(59, 'IPS TFT, 5.2\", HD', 'ColorOS 3.2 (Android 7.1)', '13 MP', '5 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '2 GB', '16 GB', '2 Micro SIM, Hỗ trợ 4G', '3000 mAh', NULL),
(60, 'Super AMOLED, 5.6\", HD+', 'Android 8.0 (Oreo)', '16 MP', '16 MP', 'Exynos 7870 8 nhân 64-bit', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3000 mAh', NULL),
(61, 'Super AMOLED, 5.5\", Full HD', 'Android 7.0 (Nougat)', '13 MP và 5 MP (2 camera)', '16 MP', 'Mediatek Helio P25 Lite 8 nhân', '4 GB', '32 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh', NULL),
(62, 'Super AMOLED, 6.0\", HD+', 'Android 8.0 (Oreo)', '16 MP và 5 MP (2 camera)', '16 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3500 mAh', NULL),
(63, 'Super AMOLED, 5.6\", Full HD+', 'Android 7.1 (Nougat)', '16 MP', '16 MP và 8 MP (2 camera)', 'Exynos 7885 8 nhân 64-bit', '4 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '3000mAh, có sạc nhanh', NULL),
(64, 'Super AMOLED, 6\", Full HD+', 'Android 7.1 (Nougat)', '16 MP', '16 MP và 8 MP (2 camera)', 'Exynos 7885 8 nhân 64-bit', '6 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3500mAh, có sạc nhanh', NULL),
(65, 'D-backlit IPS LCD, 4.7\", Retina HD', 'iOS 10', '8 MP', '1.2 MP', 'Apple A8 2 nhân 64-bit', '1 GB', '16 GB', '\r\n1 Nano SIM, Hỗ trợ 4G', '1810 mAh', NULL),
(66, 'D-backlit IPS LCD, 4.7\", Retina HD', 'iOS 11', '12 MP', '5 MP', 'Apple A9 2 nhân 64-bit', '2 GB', '16 GB', '1 Nano SIM, Hỗ trợ 4G', '1715 mAh', NULL),
(67, 'D-backlit IPS LCD, 5.5\", Retina HD', 'iOS 10', '12 MP', '5 MP', 'Apple A9 2 nhân 64-bit', '2 GB', '64 GB', '1 Nano SIM, Hỗ trợ 4G', '2750 mAh', NULL),
(68, 'D-backlit IPS LCD, 4.7\", Retina HD', 'iOS 11', '8 MP', '1.2 MP', 'Apple A8 2 nhân 64-bit', '1 GB', '64 GB', '1 Nano SIM, Hỗ trợ 4G', '1810 mAh', NULL),
(69, 'IPS LCD, 6.2\", HD+', 'Android 8.1 (Oreo)', '13 MP và 2 MP (2 camera)', '8 MP', 'Qualcomm Snapdragon 450 8 nhân 64-bit', '2 GB', '16 GB', '2 Nano SIM, Hỗ trợ 4G', '4230 mAh', NULL),
(70, 'LTPS LCD, 6.3&quot;, Full HD+', 'ColorOS 5.2 (Android 8.1)', '16 MP và 2 MP (2 camera)', '25 MP', 'MediaTek Helio P60 8 nhân 64-bit', '6 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '3500 mAh, có sạc nhanh', NULL),
(71, 'LTPS LCD, 6.23&quot;', 'ColorOS 5.0 (Android 8.1)', '16 MP', '25 MP', 'MediaTek Helio P60 8 nhân 64-bit', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '3400 mAh', ''),
(72, 'AMOLED, 6.4&quot;, Full HD+', 'ColorOS 5.2 (Android 8.1)', '20 MP, 12 MP và TOF 3D (3 camera)', '25 MP', 'Snapdragon 710 8 nhân 64-bit', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '3700 mAh, có sạc nhanh', NULL),
(73, 'IPS LCD, 5.7&quot;, HD+', 'Android 7.1 (Nougat)', '13 MP', '8 MP', 'Mediatek Helio P23 8 nhân 64-bit', '2 GB', '16 GB', '\r\n2 Nano SIM, Hỗ trợ 4G', '3180 mAh', NULL),
(74, 'IPS LCD, 5.5&quot;, Full HD', 'Android 8.0 (Oreo)', '16 MP', '8 MP', 'Qualcomm Snapdragon 630 8 nhân', '4 GB', '64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3000 mAh, có sạc nhanh', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `HinhURL` varchar(555) CHARACTER SET utf8 DEFAULT NULL,
  `GiaSanPham` decimal(11,0) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuotXem` int(11) DEFAULT NULL,
  `MoTa` text CHARACTER SET utf8,
  `BiXoa` tinyint(1) DEFAULT NULL,
  `MaLoaiSanPham` int(11) DEFAULT NULL,
  `MaHangSanXuat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuong`, `SoLuongBan`, `SoLuotXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(1, 'Samsung Galaxy S7', 'assets/img/s7.png', '5990000', NULL, 200, 20, 24, 'Với những nâng cấp tuyệt vời mà Samsung mang lại cho người dùng như khả năng chống nước, thiết kế hoàn hảo, Galaxy S7 sẽ khiến bạn không thể rời mắt.', 0, 3, 2),
(2, 'Samsung Galaxy S8', 'assets/img/s8.png', '15990000', NULL, 200, 9, 9, 'Galaxy S8 là siêu phẩm mới nhất được Samsung ra mắt vào ngày 29/3 với thiết kế nhỏ gọn hoàn toàn mới, màn hình vô cực viền siêu mỏng.', 0, 1, 2),
(3, 'Samsung Galaxy S8 Plus', 'assets/img/s8+.png', '17990000', NULL, 200, 9, 4, 'Galaxy S8 và Galaxy S8 Plus hiện đang là chuẩn mực smartphone về thiết kế trong tương lai. Sau nhiều ngày được sử dụng, mình xin chia sẻ những cảm nhận chi tiết nhất về chiếc Galaxy S8 Plus - chiếc điện thoại Samsung đang có doanh số đặt hàng khủng nhất hiện tại.', 0, 1, 2),
(4, 'Samsung Galaxy S9', 'assets/img/s9.png', '20990000', '2018-12-14 09:16:08', 200, 9, 79, 'Siêu phẩm Samsung Galaxy S9 chính thức ra mắt mang theo hàng loạt cải tiến, tính năng cao cấp như camera thay đổi khẩu độ, quay phim siêu chậm 960 fps, AR Emoji... nhanh chóng gây sốt làng công nghệ.', 0, 1, 2),
(5, 'Samsung Galaxy S9 Plus ', 'assets/img/s9+.png', '24490000', NULL, 200, 0, 9, 'Samsung Galaxy S9 Plus 128GB Hoàng Kim, siêu phẩm smartphone hàng đầu trong thế giới Android đã ra mắt với màn hình vô cực, camera chuyên nghiệp như máy ảnh và hàng loạt những tính năng cao cấp đầy hấp dẫn.', 0, 1, 2),
(6, 'Samsung Galaxy Note 8', 'assets/img/note8.png', '19990000', '2018-12-26 09:16:08', 200, 15, 18, 'Galaxy Note 8 là niềm hy vọng vực lại dòng Note danh tiếng của điện thoại Samsung với diện mạo nam tính, sang trọng. Máy trang bị camera kép xóa phông thời thượng, màn hình vô cực như trên S8 Plus, bút S Pen cùng nhiều tính năng mới và nhiều công nghệ được ưu ái.', 0, 1, 2),
(7, 'Samsung Galaxy Note 9', 'assets/img/note9.png', '28490000', NULL, 200, 0, 1, 'Sau thành công vang dội của Galaxy Note 8 thì Samsung chính thức giới thiệu phiên bản tiếp theo tới người dùng cái tên Samsung Galaxy Note 9 mang trong mình hàng hoạt các thay đổi đột phá với điểm nhấn đặc biệt đến từ chiếc bút S-Pen thần thánh cùng một viên pin dung lượng khổng lồ tới 4.000 mAh.', 0, 1, 2),
(8, 'Samsung Galaxy A7', 'assets/img/a7.png', '8990000', NULL, 200, 2, 3, 'Samsung Galaxy A7 (2018) lột xác với nhiều thay đổi mới mẻ từ thiết kế đến hiệu năng. Bên cạnh đó, đây cũng là chiếc smartphone đầu tiên của Samsung sở hữu cụm camera sau với 3 thấu kính ấn tượng.', 0, 2, 2),
(9, 'Samsung Galaxy A8', 'assets/img/a8.png', '10990000', '2018-12-26 09:16:08', 200, 1, 1, 'Samsung Galaxy A8 Star là một biến thể mới của dòng A trong gia đình Samsung với sự nâng cấp vượt trội về camera cũng như thay đổi trong thiết kế.', 0, 2, 2),
(10, 'Samsung Galaxy A9', 'assets/img/a9.png', '12490000', NULL, 200, 0, 3, 'Samsung Galaxy A9 (2018) là chiếc điện thoại đầu tiên của Samsung sở hữu hệ thống camera ấn tượng với 4 thấu kính cùng hàng loạt các nâng cấp đáng giá về cấu hình và tính năng hiện đại khác.', 0, 1, 2),
(11, 'iPhone 6', 'assets/img/ip6.png', '6990000', NULL, 200, 0, 1, 'iPhone 6 là một trong những smartphone được yêu thích nhất của Apple. Lắng nghe nhu cầu về thiết kế, khả năng lưu trữ và giá cả, iPhone 6 32GB được chính thức phân phối chính hãng tại Việt Nam hứa hẹn sẽ là một sản phẩm rất \"Hot\".', 0, 3, 1),
(12, 'iPhone 6S Plus', 'assets/img/ip6s+.png', '10990000', '2018-12-26 09:16:08', 200, 1, 16, 'iPhone 6s Plus 32 GB là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn.\r\nCamera được cải tiến\r\nĐiện thoại iPhone 6s Plus 32 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt.', 0, 2, 1),
(13, 'iPhone 7', 'assets/img/ip7.png', '13990000', NULL, 200, 0, 4, 'iPhone 7 32GB vẫn mang trên mình thiết kế quen thuộc của từ thời iPhone 6 nhưng có nhiều thay đổi lớn về phần cứng, dàn loa stereo và cấu hình cực mạnh.Camera trước tăng lên 7 MP\r\nMột sự cải thiện đáng kể so với iPhone 6s trước đó, những tấm ảnh chụp selfie của bạn càng thêm độ chi tiết và sắc nét, bộ nhớ lớn 32 GB cũng giúp bạn thoải mái chụp và lưu trữ ảnh mà không lo hết dung lượng để lưu.', 0, 1, 1),
(14, 'iPhone 7 Plus', 'assets/img/ip7+.png', '15990000', NULL, 200, 0, 1, 'Mặc dù giữ nguyên vẻ bề ngoài so với dòng điện thoại iPhone đời trước, bù lại iPhone 7 Plus 32GB lại được trang bị nhiều nâng cấp đáng giá như camera kép đầu tiên cũng như cấu hình mạnh mẽ.\r\nChiếc điện thoại sở hữu camera kép đầu tiên của Apple', 0, 1, 1),
(15, 'iPhone 8', 'assets/img/ip8.png', '17990000', '2018-12-02 09:16:03', 200, 5, 2, 'iPhone 8 64GB nổi bật với điểm nhấn mặt lưng kính và mặt trước giữ nguyên thiết kế như iPhone 7, cùng với đó là hàng loạt công nghệ đáng mong đợi như sạc nhanh, không dây hay hỗ trợ thực tế ảo AR.\r\nThay đổi phong cách thiết kế\r\nĐiện thoại iPhone 8 kết hợp giữa những đường nét đã làm nên chuẩn mực, thương hiệu với sự thời thượng và hiện đại của mặt lưng phủ kính cường lực thay vì nguyên khối kim loại. Điểm thiết kế này mang lại độ bóng bẩy, đẹp mắt hơn cho sản phẩm', 0, 1, 1),
(16, 'iPhone 8 Plus', 'assets/img/ip8+.png', '20990000', NULL, 200, 0, 1, 'Thừa hưởng những thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.Camera kép chuyên nghiệp\r\nKhông có sự thay đổi trong thông số camera, chiếc điện thoại iPhone này chủ yếu được tập trung nâng cấp về ống kính, cảm biến, vi xử lý hình ảnh để nâng cao chất lượng ảnh chụp.\r\n\r\nKhả năng zoom quang 2X không thay đổi chất lượng cũng như xóa phông chân dung vẫn được tích hợp trên iPhone 8 Plus cùng với Portrait Lighting, tính năng chụp ảnh sân khấu hoàn toàn mới.', 0, 1, 1),
(17, 'iPhone X Silver', 'assets/img/ipx.png', '26990000', '2018-12-17 09:15:47', 200, 0, 6, 'iPhone X là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.\r\nThiết kế mang tính đột phá\r\nNhư các bạn cũng đã biết thì đã 4 năm kể từ chiếc điện thoại iPhone 6 và iPhone 6 Plus thì Apple vẫn chưa có thay đổi nào đáng kể trong thiết kế của mình.', 0, 1, 1),
(18, 'iPhone Xr', 'assets/img/ipxr.png', '22990000', NULL, 200, 0, 1, 'Đặc điểm nổi bật của iPhone Xr 64GB\r\n\r\nTìm hiểu thêm\r\nBộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim\r\n\r\nLà chiếc điện thoại iPhone có mức giá dễ chịu, phù hợp với nhiều khách hàng hơn, iPhone Xr vẫn được ưu ái trang bị chip Apple A12 mạnh mẽ, màn hình tai thỏ cùng khả năng chống nước chống bụi.\r\nMàn hình tai thỏ tràn viền công nghệ LCD\r\nKhác với iPhone Xs hay Xs Max, chiếc smartphone này sở hữu màn hình LCD.\r\n\r\nBù lại với công nghệ True Tone cùng màn hình tràn viền rộng tới 6.1 inch, mọi trải nghiệm trên máy vẫn đem lại sự thích thú và hoàn hảo, như dòng cao cấp khác của Apple.', 0, 1, 1),
(19, 'iPhone Xs ', 'assets/img/ipxs.png', '34990000', NULL, 200, 4, 1, 'Đến hẹn lại lên, năm nay Apple giới thiệu tới người dùng thế hệ tiếp theo với 3 phiên bản, trong đó có cái tên iPhone Xs với những nâng cấp mạnh mẽ về phần cứng đến hiệu năng, màn hình cùng hàng loạt các trang bị cao cấp khác. \r\nHiệu năng đỉnh cao đến từ con chip Apple A12\r\nNgoài điện thoại thì năm nay iPhone cũng đã chính thức ra mắt chip A12 bionic thế hệ mới với những nâng cấp vượt trội về mặt hiệu năng', 0, 1, 1),
(20, 'iPhone Xs Max', 'assets/img/ipxsmax.png', '43990000', NULL, 200, 0, 3, 'Hoàn toàn xứng đáng với những gì được mong chờ, phiên bản cao cấp nhất iPhone Xs Max của Apple năm nay nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp.\r\nThiết kế cao cấp với viền thép không gỉ và mặt kính cường lực\r\nĐiện thoại iPhone Xs Max sở hữu lối thiết kế vô cùng đẹp mắt với những đường cong mềm mại được thừa hưởng từ chiếc iPhone đời trước đó.', 0, 1, 1),
(21, 'Nokia 2', 'assets/img/nokia2.png', '1990000', '2018-12-17 09:15:47', 200, 3, 10, 'Nokia 2 là mẫu smartphone rẻ nhất của Nokia tại thời điểm hiện tại từ khi trở lại thị trường với dung lượng pin khủng, thiết kế kim loại chắc chắn và khả năng kháng nước.Dung lượng pin khủng\r\nViên pin trên Nokia 2 được trang bị có dung lượng lớn đến 4100 mAh cho thời gian sử dụng được công bố lên đến 2 ngày, tha hồ lướt web, facebook, youtube... Giá rẻ nhưng giải trí vẫn ngon.', 0, 4, 3),
(22, 'Nokia 2.1', 'assets/img/nokia2.1.png', '2590000', NULL, 200, 17, 3, 'Mới đây thì Nokia đã tiếp tục tung ra chiếc điện thoại Nokia 2.1 - là phiên bản nâng cấp của Nokia 2 năm ngoái, hứa hẹn có những sự thay đổi và cải tiến hợp xu hướng.\r\nThiết kế đơn giản nhưng tinh tế\r\nMáy vẫn giữ thiết kế đơn giản như đàn anh Nokia 2 trước đó.Thiết kế của máy trông thanh thoát và sang hơn hẳn phiên bản cũ. Và bật mí thêm là máy có đến 2 loa ngoài được đặt ở mặt trước.\r\n\r\nMặt lưng của điện thoại Nokia 2.1 được làm từ nhựa Polycarbonate nhám giúp máy hạn chế bám vân tay khi sử dụng.', 0, 4, 3),
(23, 'Nokia 3', 'assets/img/nokia3.png', '2290000', NULL, 200, 0, 1, 'Thương hiệu Nokia vẫn rất được người dùng tin tưởng và đón chờ, năm nay hãng cũng đã đánh dấu sự trở lại với 3 mẫu điện thoại, và Nokia 3 là một trong số đó.\r\nThiết kế hoàn thiện tốt\r\nNokia 3 vẫn có một phần nào đó thiết kế của hãng Nokia Với thân máy polycarbonate điêu khắc và chế tác tỉ mỉ, khung nhôm mang lại cảm giác chắc chắn, từng chi tiết được hoàn thiện rất tốt tối ưu rất tốt cho việc sử dụng của người dùng.', 0, 4, 3),
(24, 'Nokia 3.1', 'assets/img/nokia3.1.png', '3290000', '2018-12-05 09:16:18', 200, 0, 1, 'Nokia 3.1 là chiếc smartphone giá rẻ kế thừa sự thành công của mẫu Nokia 3 - chiếc smartphone bán chạy nhất của hãng trong năm ngoái.\r\nHiệu năng phù hợp với tầm giá\r\nHiệu năng của chiếc điện thoại Nokia này được thiết kế cao hơn 30% so với chiếc Nokia 3 năm ngoái.', 0, 4, 3),
(25, 'Nokia 5', 'assets/img/nokia5.png', '3090000', NULL, 200, 5, 3, 'Nokia 5 là một điện thoại mới được trình làng đánh dấu sự trở lại ở sự kiện MWC 2017. Chiếc  điện thoại Nokia này mang trong mình nhiều thay đổi cùng mức giá bán hấp dẫn.Máy có thiết kế nguyên khối với thân máy kim loại, các góc cạnh cùng phần mặt lưng được làm cong giúp bạn dễ cầm gọn trong tay. Các chi tiết trên máy được gia công tỉ mỉ và chắc chắn tạo sự cứng cáp cho thiết bị.', 0, 4, 3),
(26, 'Nokia 5.1 Plus', 'assets/img/nokia5.1+.png', '4790000', '2018-12-31 09:15:44', 200, 2, 10, 'Sau Nokia 6.1 Plus thì Nokia tiếp tục tung ra thị trường chiếc smartphone thứ 2 của mình sở hữu màn hình \"tai thỏ\" với tên gọi Nokia 5.1 Plus (Nokia X5) với mức giá dễ chịu và hấp dẫn.\r\nThiết kế đẳng cấp sang trọng\r\nChiếc điện thoại Nokia sở hữu thiết kế khung kim loại sang trọng và chắc chắn, đem lại vẻ nam tính và mạnh mẽ cho người dùng.', 0, 3, 3),
(27, 'Nokia 6', 'assets/img/nokia6.png', '3590000', NULL, 200, 0, 1, 'Nokia đã cho ra mắt chính thức Nokia 6 với cấu hình tốt trong mức giá tầm trung, thiết kế đẹp cùng bộ đôi camera chất lượng.\r\nThiết kế chắc chắn, sang trọng\r\nĐiện thoại Nokia 6 sở hữu một bộ khung từ nhôm nguyên khối vô cùng chắc chắn, thiết kế đẹp với chất lượng hoàn thiện vô cùng tốt, các góc cạnh được bo cong cho cảm giác cầm nắm thoải mái.', 0, 4, 3),
(28, 'Nokia 6.1', 'assets/img/nokia6.1.png', '4890000', NULL, 200, 0, 1, 'Sau nhiều rò rỉ thì cuối cùng chiếc Nokia 6.1 (Nokia 6 new) cũng đã chính thức ra mắt với một thiết kế sang trọng nhưng vẫn có gì đó đáng tiếc cho một chiếc smartphone ra mắt vào năm 2018.', 0, 3, 3),
(29, 'Nokia 6.1 Plus', 'assets/img/nokia6.1+.png', '6590000', NULL, 200, 9, 1, 'Nokia 6.1 Plus (hoặc tên khác Nokia X6) đã khiến người dùng trở nên phấn khích khi lột xác hoàn toàn trong thiết kế đến từ chiếc tai thỏ phá cách cũng như hiệu năng được cải tiến vượt bậc so với các đối thủ của nó.\r\nSự phá cách trong thiết kế\r\nSự kết hợp giữa khung kim loại và kính cao cấp đã tạo nên một chiếc điện thoại Nokia với một dáng vẻ trông khá sang trọng và uyển chuyển trong thân hình có phần hơi nữ tính.', 0, 3, 3),
(30, 'Nokia 7 Plus', 'assets/img/nokia7+.png', '8290000', NULL, 200, 0, 4, 'Nokia 7 Plus là chiếc smartphone đầu tiên đánh dấu bước đi đầu tiên của Nokia vào thế giới màn hình tỉ lệ 18:9.\r\nThiết kế đẹp mắt\r\nNokia 7 Plus mang trong mình thiết kế mới mẻ nhưng vẫn có những thứ rất quen thuộc với người dùng đã quen với thương hiệu Nokia.', 0, 2, 3),
(31, 'Oppo F5', 'assets/img/of5.png', '4990000', '2018-12-17 09:15:47', 200, 0, 1, 'OPPO F5, chuyên gia selfie mới nổi bật với màn hình tràn cạnh thời trang và camera tích hợp trí tuệ nhân tạo AI để càng chụp càng đẹp.OPPO F5 là chiếc smartphone đầu tiên của OPPO theo xu hướng màn hình tràn cạnh cực đẹp với các cạnh viền cực mỏng. Toàn bộ phím điều hướng đều được đưa vào màn hình.', 0, 3, 5),
(32, 'Oppo F5 Youth', 'assets/img/of5y.png', '4490000', NULL, 200, 6, 1, 'OPPO F5 Youth, phiên bản giá rẻ của chuyên gia selfie, màn hình tràn cạnh OPPO F5 với thiết kế và tính năng hoàn toàn tương đương nhưng thông số cấu hình phần cứng kém hơn một chút.\r\nThiết kế nguyên khối, màn hình tràn viền\r\nĐiện thoại OPPO F5 Youth mang trong mình thiết kế nguyên khối toàn phần với mặt lưng liền mạch cho vẻ đẹp sang trọng và tối giản tinh tế. Phiên bản này không có các đường anten chạy dọc trên đỉnh và đáy máy như OPPO F5.', 0, 3, 5),
(33, 'Oppo F7', 'assets/img/of7.png', '6990000', '2018-12-26 09:16:08', 200, 4, 1, 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục tung ra OPPO F7 với điểm nhấn vẫn là camera selfie và thiết kế \"tai thỏ độc đáo\".\r\nThiết kế tai thỏ độc đáo\r\nOPPO F7 vẫn đi theo thiết kế \"tai thỏ\" mà Apple đã từng làm trên iPhone X.', 0, 3, 5),
(34, 'Oppo F7 Youth', 'assets/img/of7y.png', '5490000', NULL, 200, 4, 1, 'OPPO F7 Youth là một phiên bản rút gọn của OPPO F7 không tai thỏ, không cảm biến vân tay, camera độ phân giải thấp hơn nhưng vẫn sở hữu cấu hình mạnh mẽ như người đàn anh trước đó.\r\nThiết kế bắt mắt\r\nTuy không còn phần \"tai thỏ\" theo xu thế nhưng tổng thể chiếc điện thoại OPPO này vẫn giữ được sự trẻ trung, thời trang của OPPO F7.', 0, 3, 5),
(35, 'Oppo F9', 'assets/img/of9.png', '7690000', NULL, 200, 0, 1, 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo, màn hình tràn viền giọt nước và camera chụp chân dung tích hợp trí tuệ nhân tạo A.I hoàn hảo.\r\nSạc VOOC nhanh đột phá\r\nTrong những giây phút gay cấn như chơi game điện thoại báo hết pin hay sáng dậy đi làm nhưng phát hiện quên sạc pin thì bộ sạc của OPPO F9 sẽ đem lại sự cứu trợ ngay lập tức.\r\n\r\nVới sạc VOOC 5V/AA, tốc độ sạc trở nên nhanh chóng so với các bộ sạc thông thường.', 0, 2, 5),
(36, 'Oppo Find X', 'assets/img/ofx.png', '20990000', '2018-12-14 09:15:42', 200, 0, 1, 'OPPO Find X tạo nên một cú hích lớn trong làng smartphone hiện nay khi mang trong mình nhiều tính năng đột phá mà nổi bật nhất đến từ thiết kế sáng tạo và một hiệu năng đỉnh cao.\r\nThiết kế đến từ tương lai\r\nChiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.', 0, 1, 5),
(37, 'Oppo A7', 'assets/img/oa7.png', '5990000', NULL, 200, 0, 1, 'OPPO A7, chiếc điện thoại được xem là sự hiện thân của cái đẹp, cái sáng tạo mà OPPO mang đến cho người dùng với mặt lưng được tô điểm bởi những họa tiết 3D thú vị cùng chiếc tai thỏ hình giọt nước đáng yêu.\r\nThiết kế cực chất với mặt lưng 3D dạng lưới\r\nOPPO A7 được tạo nên nhờ với một ngôn ngữ thiết kế mới lạ, bắt mắt khi có phần mặt lưng phản chiếu 3D vân lưới ánh sáng cực đẹp và thu hút.\r\n\r\n', 0, 3, 5),
(38, 'Oppo A71', 'assets/img/oa71.png', '3390000', NULL, 200, 0, 1, 'Phiên bản OPPO A71 2018 32 GB ra mắt với vi xử lý Snapdragon 450 mạnh mẽ hơn, chụp ảnh selfie làm đẹp bằng AI thông minh và giá rẻ hơn.\r\nThiết kế liền mạch thời trang\r\nĐiện thoại OPPO A71 32 GB (2018) có thiết kế hoàn toàn tương tự thế hệ trước với vỏ nhựa nguyên khối liền mạch, thiết kế thời trang, đẹp mắt thừa hưởng \"chất OPPO\" hấp dẫn và độc đáo. Mặt trước kính cong 2.5D thời thượng.', 0, 4, 5),
(39, 'Oppo A83', 'assets/img/oa83.png', '3190000', NULL, 200, 0, 1, 'OPPO A83 16GB 2018 (phiên bản không tai nghe và ốp) là chiếc smartphone dòng A đầu tiên sở hữu cho mình màn hình tràn viền và cùng với đó là camera với khả năng làm đẹp bằng AI nổi tiếng của OPPO.\r\nThiết kế thon gọn\r\nVới xu thế màn hình tràn viền 18:9 thì máy sở hữu một thân hình \"thon thả\" với các góc cạnh được bo tròn mềm mại.', 0, 4, 5),
(40, 'Oppo A3s', 'assets/img/oa3s.png', '4690000', NULL, 200, 0, 1, 'OPPO A3s 16GB là một chiếc smartphone giá rẻ hiếm hoi trên thị trường sở hữu những tính năng khá hấp dẫn trong năm 2018 đó là camera kép ở mặt lưng và màn hình tai thỏ ở mặt trước.\r\nMàn hình tai thỏ cao cấp\r\nĐiểm ấn tượng đầu tiên trên OPPO A3s chính là phần tai thỏ bên trên màn hình tương tự như chiếc iPhone X tới từ Apple.', 0, 3, 5),
(41, 'Huawei Y6 Prime', 'assets/img/hy6p.png', '2990000', '2018-12-20 09:15:39', 200, 0, 1, 'Huawei Y6 Prime là chiếc smartphone giá rẻ với màn hình tràn viền kích thước lớn.\r\nThiết kế cứng cáp\r\nHuawei tiếp tục mang lên một chiếc smartphone giá rẻ của mình màn hình tràn viền 18:9 với kích thước 5.7 inch.', 0, 4, 4),
(42, 'Huawei Y7 Pro', 'assets/img/hy7p.png', '3490000', NULL, 200, 0, 1, 'Huawei Y7 Pro (2018) là sản phẩm tầm trung với đầy đủ những trang bị của một chiếc smartphone theo xu thế của năm 2018.\r\nThiết kế đẹp mắt\r\nHuawei Y7 Pro 2018 trông khá quen thuộc với chất liệu vỏ nhựa cùng logo quen thuộc của dòng điện thoại Huawei ở phần dưới mặt lưng.', 0, 4, 4),
(43, 'Huawei Nova 2i', 'assets/img/hn2i.png', '4490000', NULL, 200, 0, 1, 'Huawei Nova 2i là chiếc smartphone phổ thông có thiết kế màn hình tràn cạnh đẹp mắt, 4 camera (2 camera kép) và hiệu năng khá tốt, đây là sự lựa chọn tuyệt vời trong tầm giá.', 0, 3, 4),
(44, 'Huawei Y9', 'assets/img/hy9.png', '5490000', NULL, 200, 0, 1, 'Huawei Y9 (2019) là chiếc smartphone được thiết kế dành riêng cho giới trẻ, với các màu sắc thời trang đi kèm nhiều xu hướng công nghệ mới nhất.\r\nThiết kế thu hút từ cái nhìn đầu tiên\r\nRất nhanh chóng thì Huawei đã mang lên chiếc Y9 (2019) thiết kế độc đáo với mặt lưng có thể thay đổi màu sắc trong môi trường và điều kiện khác nhau.', 0, 3, 4),
(45, 'Huawei Nova 3e', 'assets/img/hn3e.png', '5490000', NULL, 200, 0, 1, 'Huawei Nova 3e là phiên bản kế nhiệm hoàn hảo của chiếc Nova 2i vốn đã đạt được nhiều thành công tại thị trường Việt Nam với màn hình tràn viền \"tai thỏ\" mới và nhiều tính năng cao cấp.\r\nThiết kế \"tai thỏ\"\r\nHuawei Nova 3e sở hữu thiết kế thời thượng nhất hiện nay với phần viền màn hình được làm cực mỏng đến cả cạnh trên của máy, tạo nên hình dáng \"tai thỏ\" tương tự như iPhone X, rất đẹp và độc đáo.', 0, 3, 4),
(46, 'Huawei Nova 3i', 'assets/img/hn3i.png', '6490000', NULL, 200, 0, 1, 'Với những smartphone như Nova 2i hay Nova 3e thì Huawei đã và đang tạo nên những cơn sốt rất lớn trong phân khúc tầm trung và cái tên mới Huawei Nova 3i được cải tiến và nâng cấp nhiều điểm mới, hứa hẹn sẽ mang lại làn gió mới cho thị trường.\r\nThiết kế bắt mắt với mặt lưng chuyển màu\r\nNova 3i sở hữu mặt lưng kính chuyển màu gradient kiểu như điện thoại Huawei P20 Pro, nhờ thiết kế mặt lưng kính ấn tượng đã đem lại cho máy một thiết kế hiện đại và tinh tế.', 0, 3, 4),
(47, 'Huawei Nova 3', 'assets/img/hn3.png', '9990000', NULL, 200, 0, 1, 'Nếu như bạn là một người yêu thích thiết kế của siêu phẩm Huawei P20 Pro nhưng cần một mức giá dễ chịu hơn thì Huawei Nova 3 sẽ là một sự lựa chọn phải chăng dành cho bạn.\r\nThiết kế thân máy chuyển màu độc đáo\r\nẤn tượng đầu tiên của bạn về chiếc điện thoại Huawei này chắc hẳn phải là thiết kế độc đáo của máy.', 0, 2, 4),
(48, 'Huawei Mate 20', 'assets/img/hm20.png', '15990000', NULL, 200, 0, 1, 'Nếu đã quá quen thuộc với những chiếc điện thoại màu đơn thuần thì siêu phẩm Huawei Mate 20 Pro phiên bản mặt lưng chuyển màu gradient sẽ khiến bạn thích thú từ thiết kế đến hiệu năng cùng camera chuyên nghiệp như máy cơ.\r\nNổi bật đầy cá tính với sắc xanh - tím chuyển màu\r\nVới phiên bản màu mới này, ắt hẳn bạn sẽ rất ngạc nhiên và đầy thích thú khi từng góc nhìn của máy chuyển đổi màu.\r\n\r\nMềm mại và uyển chuyển từ các góc cạnh là những gì mà bạn sẽ cảm nhận được mỗi khi cầm nắm máy trên tay.', 0, 1, 4),
(49, 'Huawei Mate 20 Pro', 'assets/img/hm20p.png', '21990000', NULL, 200, 0, 1, 'Thế hệ siêu phẩm mới của Huawei chính thức lộ diện với cái tên Huawei Mate 20 Pro, chiếc điện thoại thu hút trong thiết kế, mạnh mẽ trong hiệu năng cùng một hệ thống camera ấn tượng.\r\nThiết kế mới mẻ, bắt mắt\r\nSang trọng và đẳng cấp là những từ mà bạn có thể thốt lên khi chiêm ngưỡng thân hình của siêu phẩm Huawei Mate 20 Pro.', 0, 1, 4),
(50, 'Huawei Y5 2017', 'assets/img/hy517.png', '1990000', '2018-12-17 09:15:33', 200, 0, 0, 'Huawei Y5 2017 là phiên bản nâng cấp của Y5 II với cấu hình mạnh mẽ hơn, pin dung lượng cao dùng lâu hơn và thiết kế đẹp mắt, cứng cáp hơn.\r\nThiết kế trẻ trung, cứng cáp\r\nChiếc điện thoại Huawei này mang trên mình thiết kế nhỏ gọn, trẻ trung, với mặt lưng làm từ nhựa nhưng không có cảm giác ọp ẹp mà rất chắc chắn.', 0, 4, 4),
(51, 'iPhone 5S 16GB', 'assets/img/ip5s.png', '2890000', '2018-12-14 09:15:39', 200, 0, 0, 'Thiết kế sang trọng, gia công tỉ mỉ, tích hợp cảm biến vân tay cao cấp hơn, camera cho hình ảnh đẹp và sáng hơn.', 0, 4, 1),
(52, 'iPhone 5 16GB', 'assets/img/ip5.png', '1820000', '2018-12-14 09:15:39', 200, 0, 1, 'Sau bao tháng ngày mong chờ, cả thế giới Công nghệ đã được đón nhận sự ra đời của siêu phẩm điện thoại thông minh iPhone 5, một trong những chiếc điện thoại được mong mỏi nhất năm 2012. Với những cải tiến mạnh mẽ cả về mặt thiết kế lẫn phần cứng, nên ngay từ khi lên kệ, iPhone 5 liên tục cháy hàng. iPhone 5 hứa hẹn sẽ tiếp tục khẳng định vị trí dẫn đầu trên thị trường Smartphone hiện nay.', 0, 4, 1),
(53, 'iPhone 5 32GB', 'assets/img/ip532.png', '2790000', '2018-12-14 09:15:39', 200, 0, 0, 'Với những cải tiến mạnh mẽ cả về mặt thiết kế lẫn phần cứng, nên ngay từ khi lên kệ, iPhone 5 liên tục cháy hàng. iPhone 5 hứa hẹn sẽ tiếp tục khẳng định vị trí dẫn đầu trên thị trường Smartphone hiện nay.', 0, 4, 1),
(54, 'Samsung Galaxy J2 Prime', 'assets/img/j2p.png', '2290000', '2018-12-14 09:15:39', 200, 1, 2, 'Samsung tiếp tục trình làng mẫu smartphone giá rẻ mới với tên gọi Samsung Galaxy J2 Prime mang nhiều cải tiến đáng giá như kết nối 4G.', 0, 4, 2),
(55, 'Samsung Galaxy J2 Core', 'assets/img/j2c.png', '2390000', '2018-12-14 09:15:39', 200, 1, 2, 'Samsung Galaxy J2 Core là chiếc smartphone đầu tiên của Samsung mang trong mình hệ điều hành Android Go Edition được tinh chỉnh để hoạt động mượt và ổn định hơn', 0, 4, 2),
(56, 'Samsung Galaxy J2 Pro', 'assets/img/j2pro.png', '2990000', '2018-12-14 09:15:39', 200, 0, 0, 'Đem đến nhiều lựa chọn cho người tiêu dùng hơn, dòng điện thoại chuẩn bị ra mắt của Samsung là Galaxy J2 Pro 2018 sở hữu thiết kế ánh kim thời thượng, đường nét thanh lịch, dù chỉ ở phân khúc giá rẻ.', 0, 4, 2),
(57, 'Samsung Galaxy J4 Core', 'assets/img/j4c.png', '3090000', '2018-12-14 09:15:39', 200, 0, 2, 'Samsung Galaxy J4 Core là chiếc điện thoại thứ 2 của Samsung chạy trên nền tảng Android Go siêu nhẹ được tối ưu dành riêng cho những chiếc máy giá rẻ', 0, 4, 2),
(58, 'Samsung Galaxy J4', 'assets/img/j4.png', '3490000', '2018-12-14 09:15:39', 200, 0, 0, 'Samsung Galaxy J4 là cái tên tiếp theo thuộc dòng J mà Samsung mới ra mắt với một số tính năng nổi bật nhằm cạnh tranh với các đối thủ trong phân khúc smartphone giá rẻ', 0, 4, 2),
(59, 'OPPO A71k (2018)', 'assets/img/oa71k.png', '2990000', '2018-12-14 09:15:39', 200, 0, 0, 'Phiên bản OPPO A71k (2018) ra mắt với vi xử lý Snapdragon 450 mạnh mẽ hơn, chụp ảnh selfie làm đẹp bằng AI thông minh và giá rẻ hơn, đổi lại bộ nhớ RAM giảm xuống còn 2 GB', 0, 4, 5),
(60, 'Samsung Galaxy A6 ', 'assets/img/a6.png', '5490000', '2018-12-14 09:15:39', 200, 0, 0, 'Samsung Galaxy A6 (2018) là chiếc smartphone tầm trung vừa được ra mắt của Samsung bên cạnh chiếc Samsung Galaxy A6+ (2018)', 0, 3, 2),
(61, 'Samsung Galaxy J7+', 'assets/img/j7+.png', '5990000', '2018-12-14 09:15:39', 200, 0, 0, 'Samsung Galaxy J7+ là dòng smartphone tầm trung nhưng được trang bị camera kép có khả năng chụp ảnh xóa phông chân dung cùng thiết kế đẹp và hiệu năng mạnh mẽ.', 0, 3, 2),
(62, 'Samsung Galaxy J8', 'assets/img/j8.png', '6290000', '2018-12-14 09:15:39', 200, 0, 0, 'Sau nhiều thông tin rò rỉ thì Samsung Galaxy J8 đã chính thức được ra mắt với nhiều trang bị cao cấp với màn hình tràn viền, camera kép xóa phông cùng một hiệu năng ổn định', 0, 3, 2),
(63, 'Samsung Galaxy A8', 'assets/img/a8.png', '10990000', '2018-12-14 09:15:39', 200, 0, 0, 'Galaxy A8 (2018) là tên gọi mới của chiếc điện thoại Samsung Galaxy A5 mà người dùng vẫn quen thuộc từ trước đến nay, sở dĩ có cái tên gọi mới là vì Samsung muốn đồng nhất giữa dòng Galaxy A và Galaxy S', 0, 2, 2),
(64, 'Samsung Galaxy A8+', 'assets/img/a8+.png', '11990000', '2018-12-14 09:15:39', 200, 0, 0, 'Samsung Galaxy A8+ (2018) là phiên bản lớn hơn của chiếc Samsung Galaxy A8 (2018) phù hợp với những bạn yêu thích điện thoại có màn hình lớn và thời lượng pin bền bỉ', 0, 2, 2),
(65, 'iPhone 6 16GB', 'assets/img/ip616.png', '4990000', '2018-12-14 09:15:39', 200, 0, 0, 'Được đổi mới mạnh mẽ về thiết kế, cấu hình và màn hình kích thước lớn hơn sẽ mang đến cho bạn nhiều thích thú hơn', 0, 3, 1),
(66, 'iPhone 6S 16GB', 'assets/img/ip6s16.png', '6890000', '2018-12-14 09:15:39', 200, 0, 1, 'iPhone 6s xứng đáng là phiên bản nâng cấp hoàn hảo từ iPhone 6 với nhiều tính năng mới hấp dẫn.', 0, 3, 1),
(67, 'iPhone 6S+ 64GB', 'assets/img/ip6s+64.png', '11990000', '2018-12-14 09:15:39', 200, 0, 0, 'iPhone 6s Plus là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn.', 0, 2, 1),
(68, 'iPhone 6 64GB', 'assets/img/ip664.png', '8900000', '2018-12-14 09:15:39', 200, 0, 0, 'Được đổi mới mạnh mẽ về thiết kế, cấu hình và màn hình kích thước lớn hơn sẽ mang đến cho bạn nhiều thích thú hơn', 0, 2, 1),
(69, 'OPPO A3s', 'assets/img/oa3s.png', '3690000', '2018-12-14 09:15:39', 200, 0, 0, 'OPPO A3s 16GB là một chiếc smartphone giá rẻ hiếm hoi trên thị trường sở hữu những tính năng khá hấp dẫn trong năm 2018 đó là camera kép ở mặt lưng và màn hình tai thỏ ở mặt trước', 0, 4, 5),
(70, 'OPPO F9 6GB', 'assets/img/of96.png', '8490000', '2018-12-14 09:15:39', 200, 0, 0, 'Là chiếc điện thoại OPPO được nâng cấp cấu hình, cụ thể là RAM lên tới 6 GB, OPPO F9 6GB còn trang bị nhiều tính năng đột phá như sở hữu công nghệ sạc VOOC mới nhất, mặt lưng chuyển màu độc đáo, màn hình tràn viền giọt nước và camera chụp chân dung tích hợp trí tuệ nhân tạo A.I hoàn hảo.', 0, 2, 5),
(71, 'OPPO F7 128GB', 'assets/img/of7128.png', '7290000', '2018-12-14 09:15:39', 200, 0, 2, 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục giới thiệu OPPO F7 128GB với mức giá tương đương nhưng mang trong mình thiết kế hoàn toàn mới cũng nhiều cải tiến đáng giá', 0, 2, 5),
(72, 'OPPO R17 Pro', 'assets/img/or17p.png', '16990000', '2018-12-14 09:15:39', 200, 0, 0, 'OPPO R17 Pro được xem là chiếc smartphone sự hiện thân của cái đẹp khi được khoác lên mình một thiết kế trẻ trung và hiện đại, cùng với đó là hàng loạt các trang bị cao cấp đi từ cấu hình cho đến camera', 0, 1, 5),
(73, 'OPPO A83 2018 16GB', 'assets/img/oa8316.png', '3190000', '2018-12-14 09:15:39', 200, 0, 0, 'OPPO A83 16GB 2018 (phiên bản không tai nghe và ốp) là chiếc smartphone dòng A đầu tiên sở hữu cho mình màn hình tràn viền và cùng với đó là camera với khả năng làm đẹp bằng AI nổi tiếng của OPPO', 0, 4, 5),
(74, 'Nokia 6.1 64GB', 'assets/img/nokia6.164.png', '5490000', '2018-12-14 09:15:39', 200, 0, 0, 'Sau nhiều rò rỉ thì cuối cùng chiếc Nokia 6.1 64GB cũng đã chính thức ra mắt với một thiết kế sang trọng nhưng vẫn có gì đó đáng tiếc cho một chiếc smartphone ra mắt vào năm 2018', 0, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT NULL,
  `MaLoaiTaiKhoan` int(11) DEFAULT NULL,
  `HinhDaiDien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CauTraLoi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CauHoi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `SoDienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`, `HinhDaiDien`, `CauTraLoi`, `CauHoi`, `NgayTao`) VALUES
(1, 'admin', 'ed7de67d31481f40495db3fa11c16f23', 'admin', '629B Bà Hạt Quận 10', '01627247666', 'hmbt@gmail.com', NULL, 1, ' assets/img/ava/admin/kisspng-grass-area-symbol-brand-sign-add-5ab0d6e8b235c8.07725069152153879273.png', NULL, NULL, '2018-12-25 13:25:48'),
(2, 'baotoan', 'ed7de67d31481f40495db3fa11c16f23', 'Bảo Toàn', 'Quận 10', '01627247666', 'hmbt@gmail.com', NULL, 0, ' assets/img/ava/baotoan/1024px-Dell_Logo.svg.png', NULL, NULL, NULL),
(3, 'vy', 'ed7de67d31481f40495db3fa11c16f23', 'Vy nè', '629B Bà Hạt Quận 10', '01627247666', 'hmbt@gmail.com', NULL, 0, ' assets/img/ava/vy/2000px-HP_New_Logo_2D.svg.png', NULL, NULL, NULL),
(4, 'cuong', 'ed7de67d31481f40495db3fa11c16f23', 'Anh Cường', 'Quận 10', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(5, 'trieu', 'ed7de67d31481f40495db3fa11c16f23', 'Tống Triều', 'Quận 5 ', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(6, 'sin', 'ed7de67d31481f40495db3fa11c16f23', 'Toàn Nguyễn', 'Quận Bình Tân', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(8, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(9, 'baotoan1', '202cb962ac59075b964b07152d234b70', 'Ha Toan', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(10, 'baotoan11', '202cb962ac59075b964b07152d234b70', 'Ha Toan', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, 'baotoan 123', '202cb962ac59075b964b07152d234b70', 'Hà Minh Bảo Toàn', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(12, '123', '202cb962ac59075b964b07152d234b70', 'Ha Toan', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(13, '123123', '202cb962ac59075b964b07152d234b70', 'Sửa nè', '', '', '', NULL, 0, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(14, '321321', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Ha Toan', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(15, '1231', '202cb962ac59075b964b07152d234b70', 'wqeqwewqwqewwqeqwe', '', '', '', NULL, 0, ' assets/img/ava/1231/simple-blue-background-abstract-photo-blue-background.jpg', NULL, NULL, '2018-12-14 13:35:10'),
(16, 'baotoan1111', '202cb962ac59075b964b07152d234b70', 'baotoan213', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-12-26 12:21:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(0, 'Đang Xử Lý'),
(1, 'Đang Giao'),
(2, 'Đã Giao');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `fk_chitietdonhang_sanpham` (`MaSanPham`),
  ADD KEY `fk_chitietdonhang_dondathang` (`MaDonDatHang`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`),
  ADD KEY `fk_dondathang_tinhtrang` (`MaTinhTrang`),
  ADD KEY `fk_dondathang_taikhoan` (`MaTaiKhoan`),
  ADD KEY `fk_dondathang_diachinhanhang` (`DiaChiGiaoHang`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `motasanpham`
--
ALTER TABLE `motasanpham`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `fk_sampham_loaisanpham` (`MaLoaiSanPham`),
  ADD KEY `fk_sampham_hangsanxuat` (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `fk_taikhoan_loaitaikhoan` (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chitietdonhang_dondathang` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`),
  ADD CONSTRAINT `fk_chitietdonhang_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_dondathang_taikhoan` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `fk_dondathang_tinhtrang` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`);

--
-- Các ràng buộc cho bảng `motasanpham`
--
ALTER TABLE `motasanpham`
  ADD CONSTRAINT `fk_motasanpham_sampham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sampham_hangsanxuat` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`),
  ADD CONSTRAINT `fk_sampham_loaisanpham` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_loaitaikhoan` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 08, 2019 lúc 08:54 PM
-- Phiên bản máy phục vụ: 5.6.29
-- Phiên bản PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vexe_dev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `type`, `latitude`, `longitude`) VALUES
(1, 'An Giang', 'Tỉnh', '10.7', '105.11667'),
(2, 'Bà Rịa - Vũng Tàu', 'Tỉnh', '10.49629', '107.16841'),
(3, 'Bắc Giang', 'Tỉnh', '21.27307', '106.1946'),
(4, 'Bắc Kạn', 'Tỉnh', '22.14701', '105.83481'),
(5, 'Bạc Liêu', 'Tỉnh', '9.29414', '105.72776'),
(6, 'Bắc Ninh', 'Tỉnh', '21.18608', '106.07631'),
(7, 'Bến Tre', 'Tỉnh', '10.23333', '106.28333'),
(8, 'Bình Định', 'Tỉnh', '13.77648', '109.22367'),
(9, 'Bình Dương', 'Tỉnh', '10.9804', '106.6519'),
(10, 'Bình Phước', 'Tỉnh', '11.64711', '106.60586'),
(11, 'Bình Thuận', 'Tỉnh', '10.92889', '108.10208'),
(12, 'Cà Mau', 'Tỉnh', '9.17682', '105.15242'),
(13, 'Cao Bằng', 'Tỉnh', '22.66568', '106.25786'),
(14, 'Cần Thơ', 'Thành phố Trung ương', '10.03711', '105.78825'),
(15, 'Đà Nẵng', 'Thành phố Trung ương', '16.06778', '108.22083'),
(16, 'Đắk Lắk', 'Tỉnh', '12.66747', '108.03775'),
(17, 'Đắk Nông', 'Tỉnh', '12.00423', '107.69074'),
(18, 'Điện Biên', 'Tỉnh', '21.38602', '103.02301'),
(19, 'Đồng Nai', 'Tỉnh', '10.94469', '106.82432'),
(20, 'Đồng Tháp', 'Tỉnh', '10.46017', '105.63294'),
(21, 'Gia Lai', 'Tỉnh', '13.98333', '108'),
(22, 'Hà Giang', 'Tỉnh', '22.82333', '104.98357'),
(23, 'Hà Nam', 'Tỉnh', '20.54531', '105.91221'),
(24, 'Hà Nội', 'Thành phố Trung ương', '21.0245', '105.84117'),
(25, 'Hà Tĩnh', 'Tỉnh', '18.34282', '105.90569'),
(26, 'Hải Dương', 'Tỉnh', '20.94099', '106.33302'),
(27, 'Hải Phòng', 'Thành phố Trung ương', '20.72779', '107.04819'),
(28, 'Hậu Giang', 'Tỉnh', '9.78449', '105.47012'),
(29, 'Hòa Bình', 'Tỉnh', '20.81717', '105.33759'),
(30, 'TP Hồ Chí Minh', 'Thành phố Trung ương', '10.82302', '106.62965'),
(31, 'Hưng Yên', 'Tỉnh', '20.64637', '106.05112'),
(32, 'Khánh Hòa', 'Tỉnh', '12.24507', '109.19432'),
(33, 'Kiên Giang', 'Tỉnh', '10.01245', '105.08091'),
(34, 'Kon Tum', 'Tỉnh', '14.35451', '108.00759'),
(35, 'Lai Châu', 'Tỉnh', '22.39644', '103.45824'),
(36, 'Lâm Đồng', 'Tỉnh', '11.94646', '108.44193'),
(37, 'Lạng Sơn', 'Tỉnh', '21.85264', '106.76101'),
(38, 'Lào Cai', 'Tỉnh', '22.34023', '103.84415'),
(39, 'Long An', 'Tỉnh', '10.60857', '106.67135'),
(40, 'Nam Định', 'Tỉnh', '20.43389', '106.17729'),
(41, 'Nghệ An', 'Tỉnh', '18.67337', '105.69232'),
(42, 'Ninh Bình', 'Tỉnh', '20.25809', '105.97965'),
(43, 'Ninh Thuận', 'Tỉnh', '11.56432', '108.98858'),
(44, 'Phú Thọ', 'Tỉnh', '21.32274', '105.40198'),
(45, 'Phú Yên', 'Tỉnh', '13.09546', '109.32094'),
(46, 'Quảng Bình', 'Tỉnh', '17.46885', '106.62226'),
(47, 'Quảng Nam', 'Tỉnh', '15.87944', '108.335'),
(48, 'Quảng Ngãi', 'Tỉnh', '15.12047', '108.79232'),
(49, 'Quảng Ninh', 'Tỉnh', '21.01667', '107.3'),
(50, 'Quảng Trị', 'Tỉnh', '16.81625', '107.10031'),
(51, 'Sóc Trăng', 'Tỉnh', '9.59995', '105.97193'),
(52, 'Sơn La', 'Tỉnh', '21.3256', '103.91882'),
(53, 'Tây Ninh', 'Tỉnh', '11.31004', '106.09828'),
(54, 'Thái Bình', 'Tỉnh', '20.45', '106.34002'),
(55, 'Thái Nguyên', 'Tỉnh', '21.59422', '105.84817'),
(56, 'Thanh Hóa', 'Tỉnh', '20.07806', '105.86028'),
(57, 'Thừa Thiên Huế', 'Tỉnh', '16.4619', '107.59546'),
(58, 'Tiền Giang', 'Tỉnh', '10.36004', '106.35996'),
(59, 'Trà Vinh', 'Tỉnh', '9.94719', '106.34225'),
(60, 'Tuyên Quang', 'Tỉnh', '21.82356', '105.21424'),
(61, 'Vĩnh Long', 'Tỉnh', '10.25369', '105.9722'),
(62, 'Vĩnh Phúc', 'Tỉnh', '21.30891', '105.60489'),
(63, 'Yên Bái', 'Tỉnh', '21.72288', '104.9113');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

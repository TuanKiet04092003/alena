-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2024 lúc 08:24 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(3) NOT NULL,
  `img` varchar(200) NOT NULL,
  `vitri` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `id_user` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_inventory` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stt` int(3) NOT NULL DEFAULT 0,
  `sethome` tinyint(1) NOT NULL DEFAULT 0,
  `id_parent` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `stt`, `sethome`, `id_parent`) VALUES
(0, 'Không thuộc danh mục nào', 0, 0, 0),
(1, 'Thời trang nam', 1, 1, 0),
(2, 'Thời trang nữ', 2, 1, 0),
(3, 'Unisex', 3, 1, 0),
(4, 'Áo thun nam', 0, 0, 1),
(5, 'Áo sơ mi nam', 0, 0, 1),
(6, 'Áo polo nam', 0, 0, 1),
(7, 'Áo khoác nam', 0, 0, 1),
(8, 'Áo thun nữ', 0, 0, 2),
(9, 'Áo sơ mi nữ', 0, 0, 2),
(10, 'Áo polo nữ', 0, 0, 2),
(11, 'Áo khoác nữ', 0, 0, 2),
(12, 'Áo thun Unisex', 0, 0, 3),
(13, 'Áo sơ mi Unisex', 0, 0, 3),
(14, 'Áo polo Unisex', 0, 0, 3),
(15, 'Áo khoác Unisex', 0, 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(3) NOT NULL,
  `color` varchar(20) NOT NULL,
  `code_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `color`, `code_color`) VALUES
(0, '', ''),
(1, 'Đen', '#000000'),
(2, 'Trắng', '#ffffff'),
(3, 'Nâu', '#a52a2a'),
(4, 'Beige', '#F4EDE6'),
(5, 'Hồng', '#ffc0cb'),
(6, 'Lục', '#00803e'),
(7, 'Lam', '#0051ff'),
(8, 'Vàng', '#ffff00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(9) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `thoigian` date NOT NULL,
  `noidung` text NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(8) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_color` int(3) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image`, `id_product`, `id_color`, `is_main`) VALUES
(1, 'images/sp001_black.jpeg', 1, 1, 1),
(2, 'images/sp001_brown.jpeg', 1, 3, 0),
(3, 'images/sp001_detail1.jpeg', 1, 0, 0),
(4, 'images/sp001_detail2.jpeg', 1, 0, 0),
(5, 'images/sp001_detail3.jpeg', 1, 0, 0),
(6, 'images/sp002_black.jpeg', 2, 1, 1),
(7, 'images/sp002_white.jpeg', 2, 2, 0),
(8, 'images/sp002_detail1.jpeg', 2, 0, 0),
(9, 'images/sp002_detail2.jpeg', 2, 0, 0),
(10, 'images/sp002_detail3.jpeg', 2, 0, 0),
(11, 'images/sp003_beige.jpeg', 3, 4, 1),
(12, 'images/sp003_brown.jpeg', 3, 3, 0),
(13, 'images/sp003_white.jpeg', 3, 2, 0),
(14, 'images/sp003_detail1.jpeg', 3, 0, 0),
(15, 'images/sp003_detail2.jpeg', 3, 0, 0),
(16, 'images/sp003_detail3.jpeg', 3, 0, 0),
(17, 'images/sp004_beige.jpeg', 4, 4, 1),
(18, 'images/sp004_white.jpeg', 4, 2, 0),
(19, 'images/sp004_detail1.jpeg', 4, 0, 0),
(20, 'images/sp004_detail2.jpeg', 4, 0, 0),
(21, 'images/sp004_detail3.jpeg', 4, 0, 0),
(22, 'images/sp005_brown.jpeg', 5, 3, 1),
(23, 'images/sp005_white.jpeg', 5, 2, 0),
(24, 'images/sp005_detail1.jpeg', 5, 0, 0),
(25, 'images/sp005_detail2.jpeg', 5, 0, 0),
(26, 'images/sp005_detail3.jpeg', 5, 0, 0),
(27, 'images/sp006_white.jpeg', 6, 2, 1),
(28, 'images/sp006_black.jpeg', 6, 1, 0),
(29, 'images/sp006_detail1.jpeg', 6, 0, 0),
(30, 'images/sp006_detail2.jpeg', 6, 0, 0),
(31, 'images/sp006_detail3.jpeg', 6, 0, 0),
(32, 'images/sp007_beige.jpeg', 7, 4, 1),
(33, 'images/sp007_black.jpeg', 7, 1, 0),
(34, 'images/sp007_white.jpeg', 7, 2, 0),
(35, 'images/sp007_detail1.jpeg', 7, 0, 0),
(36, 'images/sp007_detail2.jpeg', 7, 0, 0),
(37, 'images/sp007_detail3.jpeg', 7, 0, 0),
(38, 'images/sp008_pink.jpeg', 8, 5, 1),
(39, 'images/sp008_beige.jpeg', 8, 4, 0),
(40, 'images/sp008_white.jpeg', 8, 2, 0),
(41, 'images/sp008_yellow.jpeg', 8, 8, 0),
(42, 'images/sp008_detail1.jpeg', 8, 0, 0),
(43, 'images/sp008_detail2.jpeg', 8, 0, 0),
(44, 'images/sp008_detail3.jpeg', 8, 0, 0),
(45, 'images/sp009_black.jpeg', 9, 1, 1),
(46, 'images/sp009_pink.jpeg', 9, 5, 0),
(47, 'images/sp009_white.jpeg', 9, 2, 0),
(48, 'images/sp009_detail1.jpeg', 9, 0, 0),
(49, 'images/sp009_detail2.jpeg', 9, 0, 0),
(50, 'images/sp009_detail3.jpeg', 9, 0, 0),
(51, 'images/sp010_black.jpeg', 10, 1, 1),
(52, 'images/sp010_blue.jpeg', 10, 7, 0),
(53, 'images/sp010_brown.jpeg', 10, 3, 0),
(54, 'images/sp010_detail1.jpeg', 10, 0, 0),
(55, 'images/sp010_detail2.jpeg', 10, 0, 0),
(56, 'images/sp010_detail3.jpeg', 10, 0, 0),
(57, 'images/sp011_beige.jpeg', 11, 4, 1),
(58, 'images/sp011_blue.jpeg', 11, 7, 0),
(59, 'images/sp011_white.jpeg', 11, 2, 0),
(60, 'images/sp011_detail1.jpeg', 11, 0, 0),
(61, 'images/sp011_detail2.jpeg', 11, 0, 0),
(62, 'images/sp011_detail3.jpeg', 11, 0, 0),
(63, 'images/sp012_black.jpeg', 12, 1, 1),
(64, 'images/sp012_white.jpeg', 12, 2, 0),
(65, 'images/sp012_beige.jpeg', 12, 4, 0),
(66, 'images/sp012_detail1.jpeg', 12, 0, 0),
(67, 'images/sp012_detail2.jpeg', 12, 0, 0),
(68, 'images/sp012_detail3.jpeg', 12, 0, 0),
(69, 'images/sp013_brown.jpeg', 13, 3, 1),
(70, 'images/sp013_black.jpeg', 13, 1, 0),
(71, 'images/sp013_blue.jpeg', 13, 7, 0),
(72, 'images/sp013_detail1.jpeg', 13, 0, 0),
(73, 'images/sp013_detail2.jpeg', 13, 0, 0),
(74, 'images/sp013_detail3.jpeg', 13, 0, 0),
(75, 'images/sp014_white.jpeg', 14, 2, 1),
(76, 'images/sp014_black.jpeg', 14, 1, 0),
(77, 'images/sp014_brown.jpeg', 14, 3, 0),
(78, 'images/sp014_detail1.jpeg', 14, 0, 0),
(79, 'images/sp014_detail2.jpeg', 14, 0, 0),
(80, 'images/sp014_detail3.jpeg', 14, 0, 0),
(81, 'images/sp015_black.jpeg', 15, 1, 1),
(82, 'images/sp015_white.jpeg', 15, 2, 0),
(83, 'images/sp015_detail1.jpeg', 15, 0, 0),
(84, 'images/sp015_detail2.jpeg', 15, 0, 0),
(85, 'images/sp015_detail3.jpeg', 15, 0, 0),
(86, 'images/sp016_white.jpeg', 16, 2, 1),
(87, 'images/sp016_black.jpeg', 16, 1, 0),
(88, 'images/sp016_detail1.jpeg', 16, 0, 0),
(89, 'images/sp016_detail2.jpeg', 16, 0, 0),
(90, 'images/sp016_detail3.jpeg', 16, 0, 0),
(91, 'images/sp017_green.jpeg', 17, 6, 1),
(92, 'images/sp017_black.jpeg', 17, 1, 0),
(93, 'images/sp017_detail1.jpeg', 17, 0, 0),
(94, 'images/sp017_detail2.jpeg', 17, 0, 0),
(95, 'images/sp017_detail3.jpeg', 17, 0, 0),
(96, 'images/sp018_blue.jpeg', 18, 7, 1),
(97, 'images/sp018_green.jpeg', 18, 6, 0),
(98, 'images/sp018_black.jpeg', 18, 1, 0),
(99, 'images/sp018_brown.jpeg', 18, 3, 0),
(100, 'images/sp018_detail1.jpeg', 18, 0, 0),
(101, 'images/sp018_detail2.jpeg', 18, 0, 0),
(102, 'images/sp018_detail3.jpeg', 18, 0, 0),
(103, 'images/sp019_beige.jpeg', 19, 4, 1),
(104, 'images/sp019_blue.jpeg', 19, 7, 0),
(105, 'images/sp019_pink.jpeg', 19, 5, 0),
(106, 'images/sp019_white.jpeg', 19, 2, 0),
(107, 'images/sp019_detail1.jpeg', 19, 0, 0),
(108, 'images/sp019_detail2.jpeg', 19, 0, 0),
(109, 'images/sp019_detail3.jpeg', 19, 0, 0),
(110, 'images/sp020_beige.jpeg', 20, 4, 1),
(111, 'images/sp020_pink.jpeg', 20, 5, 0),
(112, 'images/sp020_black.jpeg', 20, 1, 0),
(113, 'images/sp020_blue.jpeg', 20, 7, 0),
(114, 'images/sp020_detail1.jpeg', 20, 0, 0),
(115, 'images/sp020_detail2.jpeg', 20, 0, 0),
(116, 'images/sp020_detail3.jpeg', 20, 0, 0),
(117, 'images/sp021_pink.jpeg', 21, 5, 1),
(118, 'images/sp021_blue.jpeg', 21, 7, 0),
(119, 'images/sp021_brown.jpeg', 21, 3, 0),
(120, 'images/sp021_detail1.jpeg', 21, 0, 0),
(121, 'images/sp021_detail2.jpeg', 21, 0, 0),
(122, 'images/sp021_detail3.jpeg', 21, 0, 0),
(123, 'images/sp022_black.jpeg', 22, 1, 1),
(124, 'images/sp022_beige.jpeg', 22, 4, 0),
(125, 'images/sp022_pink.jpeg', 22, 5, 0),
(126, 'images/sp022_detail1.jpeg', 22, 0, 0),
(127, 'images/sp022_detail2.jpeg', 22, 0, 0),
(128, 'images/sp022_detail3.jpeg', 22, 0, 0),
(208, 'uploads/1718186460470.jpg', 114, 0, 0),
(209, 'uploads/1718186460763.jpg', 114, 0, 0),
(210, 'uploads/171818646027.webp', 114, 0, 0),
(211, 'uploads/1718186460771.jpg', 114, 0, 0),
(212, 'uploads/1718186460266.jpg', 114, 3, 1),
(213, 'uploads/171818646042.jpg', 114, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventories`
--

CREATE TABLE `inventories` (
  `id` int(6) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_size` int(3) NOT NULL,
  `id_color` int(3) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inventories`
--

INSERT INTO `inventories` (`id`, `id_product`, `id_size`, `id_color`, `quantity`) VALUES
(1, 1, 1, 1, 45),
(2, 1, 2, 1, 27),
(3, 1, 3, 1, 62),
(4, 1, 4, 1, 31),
(5, 1, 5, 1, 19),
(6, 1, 6, 1, 38),
(7, 1, 1, 3, 17),
(8, 1, 2, 3, 9),
(9, 1, 3, 3, 25),
(10, 1, 4, 3, 53),
(11, 1, 5, 3, 41),
(12, 1, 6, 3, 77),
(13, 2, 1, 1, 63),
(14, 2, 2, 1, 22),
(15, 2, 3, 1, 48),
(16, 2, 4, 1, 11),
(17, 2, 5, 1, 35),
(18, 2, 6, 1, 79),
(19, 2, 1, 2, 92),
(20, 2, 2, 2, 6),
(21, 2, 3, 2, 29),
(22, 2, 4, 2, 57),
(23, 2, 5, 2, 14),
(24, 2, 6, 2, 40),
(25, 3, 1, 4, 23),
(26, 3, 2, 4, 67),
(27, 3, 3, 4, 89),
(28, 3, 4, 4, 5),
(29, 3, 5, 4, 31),
(30, 3, 6, 4, 55),
(31, 3, 1, 3, 74),
(32, 3, 2, 3, 12),
(33, 3, 3, 3, 39),
(34, 3, 4, 3, 85),
(35, 3, 5, 3, 26),
(36, 3, 6, 3, 61),
(37, 3, 1, 2, 47),
(38, 3, 2, 2, 3),
(39, 3, 3, 2, 71),
(40, 3, 4, 2, 19),
(41, 3, 5, 2, 93),
(42, 3, 6, 2, 34),
(43, 4, 1, 4, 65),
(44, 4, 2, 4, 28),
(45, 4, 3, 4, 52),
(46, 4, 4, 4, 10),
(47, 4, 5, 4, 81),
(48, 4, 6, 4, 44),
(49, 4, 1, 2, 37),
(50, 4, 2, 2, 76),
(51, 4, 3, 2, 15),
(52, 4, 4, 2, 59),
(53, 4, 5, 2, 96),
(54, 4, 6, 2, 7),
(55, 5, 1, 3, 49),
(56, 5, 2, 3, 84),
(57, 5, 3, 3, 22),
(58, 5, 4, 3, 66),
(59, 5, 5, 3, 13),
(60, 5, 6, 3, 30),
(61, 5, 1, 2, 73),
(62, 5, 2, 2, 51),
(63, 5, 3, 2, 8),
(64, 5, 4, 2, 36),
(65, 5, 5, 2, 90),
(66, 5, 6, 2, 24),
(67, 6, 1, 2, 58),
(68, 6, 2, 2, 16),
(69, 6, 3, 2, 43),
(70, 6, 4, 2, 70),
(71, 6, 5, 2, 4),
(72, 6, 6, 2, 32),
(73, 6, 1, 1, 87),
(74, 6, 2, 1, 1),
(75, 6, 3, 1, 25),
(76, 6, 4, 1, 53),
(77, 6, 5, 1, 69),
(78, 6, 6, 1, 97),
(79, 7, 1, 4, 46),
(80, 7, 2, 4, 83),
(81, 7, 3, 4, 14),
(82, 7, 4, 4, 60),
(83, 7, 5, 4, 29),
(84, 7, 6, 4, 72),
(85, 7, 1, 1, 91),
(86, 7, 2, 1, 5),
(87, 7, 3, 1, 33),
(88, 7, 4, 1, 78),
(89, 7, 5, 1, 21),
(90, 7, 6, 1, 54),
(91, 7, 1, 2, 68),
(92, 7, 2, 2, 2),
(93, 7, 3, 2, 41),
(94, 7, 4, 2, 86),
(95, 7, 5, 2, 18),
(96, 7, 6, 2, 56),
(97, 8, 1, 5, 39),
(98, 8, 2, 5, 75),
(99, 8, 3, 5, 11),
(100, 8, 4, 5, 48),
(101, 8, 5, 5, 94),
(102, 8, 6, 5, 23),
(103, 8, 1, 4, 64),
(104, 8, 2, 4, 7),
(105, 8, 3, 4, 36),
(106, 8, 4, 4, 82),
(107, 8, 5, 4, 20),
(108, 8, 6, 4, 57),
(109, 8, 1, 2, 88),
(110, 8, 2, 2, 3),
(111, 8, 3, 2, 27),
(112, 8, 4, 2, 65),
(113, 8, 5, 2, 10),
(114, 8, 6, 2, 46),
(115, 8, 1, 8, 80),
(116, 8, 2, 8, 13),
(117, 8, 3, 8, 52),
(118, 8, 4, 8, 28),
(119, 8, 5, 8, 69),
(120, 8, 6, 8, 95),
(121, 9, 1, 1, 71),
(122, 9, 2, 1, 6),
(123, 9, 3, 1, 44),
(124, 9, 4, 1, 18),
(125, 9, 5, 1, 59),
(126, 9, 6, 1, 93),
(127, 9, 1, 5, 26),
(128, 9, 2, 5, 62),
(129, 9, 3, 5, 8),
(130, 9, 4, 5, 35),
(131, 9, 5, 5, 79),
(132, 9, 6, 5, 16),
(133, 9, 1, 2, 50),
(134, 9, 2, 2, 84),
(135, 9, 3, 2, 22),
(136, 9, 4, 2, 67),
(137, 9, 5, 2, 12),
(138, 9, 6, 2, 39),
(139, 10, 1, 1, 74),
(140, 10, 2, 1, 11),
(141, 10, 3, 1, 47),
(142, 10, 4, 1, 92),
(143, 10, 5, 1, 25),
(144, 10, 6, 1, 61),
(145, 10, 1, 7, 37),
(146, 10, 2, 7, 76),
(147, 10, 3, 7, 14),
(148, 10, 4, 7, 58),
(149, 10, 5, 7, 3),
(150, 10, 6, 7, 29),
(151, 10, 1, 3, 65),
(152, 10, 2, 3, 9),
(153, 10, 3, 3, 42),
(154, 10, 4, 3, 87),
(155, 10, 5, 3, 20),
(156, 10, 6, 3, 54),
(157, 11, 1, 4, 32),
(158, 11, 2, 4, 68),
(159, 11, 3, 4, 5),
(160, 11, 4, 4, 41),
(161, 11, 5, 4, 77),
(162, 11, 6, 4, 16),
(163, 11, 1, 7, 60),
(164, 11, 2, 7, 4),
(165, 11, 3, 7, 38),
(166, 11, 4, 7, 82),
(167, 11, 5, 7, 25),
(168, 11, 6, 7, 71),
(169, 11, 1, 2, 94),
(170, 11, 2, 2, 7),
(171, 11, 3, 2, 43),
(172, 11, 4, 2, 19),
(173, 11, 5, 2, 56),
(174, 11, 6, 2, 30),
(175, 12, 1, 1, 66),
(176, 12, 2, 1, 2),
(177, 12, 3, 1, 39),
(178, 12, 4, 1, 85),
(179, 12, 5, 1, 28),
(180, 12, 6, 1, 74),
(181, 12, 1, 2, 17),
(182, 12, 2, 2, 53),
(183, 12, 3, 2, 90),
(184, 12, 4, 2, 6),
(185, 12, 5, 2, 42),
(186, 12, 6, 2, 79),
(187, 12, 1, 4, 24),
(188, 12, 2, 4, 61),
(189, 12, 3, 4, 8),
(190, 12, 4, 4, 35),
(191, 12, 5, 4, 72),
(192, 12, 6, 4, 19),
(193, 13, 1, 3, 55),
(194, 13, 2, 3, 1),
(195, 13, 3, 3, 37),
(196, 13, 4, 3, 83),
(197, 13, 5, 3, 26),
(198, 13, 6, 3, 69),
(199, 13, 1, 1, 92),
(200, 13, 2, 1, 5),
(201, 13, 3, 1, 41),
(202, 13, 4, 1, 78),
(203, 13, 5, 1, 14),
(204, 13, 6, 1, 50),
(205, 13, 1, 7, 87),
(206, 13, 2, 7, 23),
(207, 13, 3, 7, 59),
(208, 13, 4, 7, 3),
(209, 13, 5, 7, 46),
(210, 13, 6, 7, 80),
(211, 14, 1, 2, 67),
(212, 14, 2, 2, 4),
(213, 14, 3, 2, 31),
(214, 14, 4, 2, 75),
(215, 14, 5, 2, 18),
(216, 14, 6, 2, 52),
(217, 14, 1, 1, 89),
(218, 14, 2, 1, 22),
(219, 14, 3, 1, 56),
(220, 14, 4, 1, 10),
(221, 14, 5, 1, 43),
(222, 14, 6, 1, 77),
(223, 14, 1, 3, 34),
(224, 14, 2, 3, 68),
(225, 14, 3, 3, 2),
(226, 14, 4, 3, 37),
(227, 14, 5, 3, 86),
(228, 14, 6, 3, 20),
(229, 15, 1, 1, 57),
(230, 15, 2, 1, 93),
(231, 15, 3, 1, 29),
(232, 15, 4, 1, 65),
(233, 15, 5, 1, 11),
(234, 15, 6, 1, 48),
(235, 15, 1, 2, 84),
(236, 15, 2, 2, 27),
(237, 15, 3, 2, 63),
(238, 15, 4, 2, 9),
(239, 15, 5, 2, 45),
(240, 15, 6, 2, 81),
(241, 16, 1, 2, 18),
(242, 16, 2, 2, 58),
(243, 16, 3, 2, 94),
(244, 16, 4, 2, 36),
(245, 16, 5, 2, 70),
(246, 16, 6, 2, 13),
(247, 16, 1, 1, 47),
(248, 16, 2, 1, 85),
(249, 16, 3, 1, 27),
(250, 16, 4, 1, 63),
(251, 16, 5, 1, 6),
(252, 16, 6, 1, 40),
(253, 17, 1, 6, 69),
(254, 17, 2, 6, 14),
(255, 17, 3, 6, 49),
(256, 17, 4, 6, 88),
(257, 17, 5, 6, 31),
(258, 17, 6, 6, 65),
(259, 17, 1, 1, 2),
(260, 17, 2, 1, 39),
(261, 17, 3, 1, 76),
(262, 17, 4, 1, 13),
(263, 17, 5, 1, 50),
(264, 17, 6, 1, 87),
(265, 18, 1, 7, 24),
(266, 18, 2, 7, 61),
(267, 18, 3, 7, 98),
(268, 18, 4, 7, 35),
(269, 18, 5, 7, 70),
(270, 18, 6, 7, 9),
(271, 18, 1, 6, 43),
(272, 18, 2, 6, 83),
(273, 18, 3, 6, 20),
(274, 18, 4, 6, 57),
(275, 18, 5, 6, 94),
(276, 18, 6, 6, 31),
(277, 18, 1, 1, 68),
(278, 18, 2, 1, 5),
(279, 18, 3, 1, 36),
(280, 18, 4, 1, 79),
(281, 18, 5, 1, 16),
(282, 18, 6, 1, 53),
(283, 18, 1, 3, 90),
(284, 18, 2, 3, 27),
(285, 18, 3, 3, 64),
(286, 18, 4, 3, 1),
(287, 18, 5, 3, 38),
(288, 18, 6, 3, 75),
(289, 19, 1, 4, 6),
(290, 19, 2, 4, 49),
(291, 19, 3, 4, 82),
(292, 19, 4, 4, 23),
(293, 19, 5, 4, 60),
(294, 19, 6, 4, 97),
(295, 19, 1, 7, 34),
(296, 19, 2, 7, 71),
(297, 19, 3, 7, 8),
(298, 19, 4, 7, 45),
(299, 19, 5, 7, 82),
(300, 19, 6, 7, 19),
(301, 19, 1, 5, 50),
(302, 19, 2, 5, 93),
(303, 19, 3, 5, 30),
(304, 19, 4, 5, 67),
(305, 19, 5, 5, 4),
(306, 19, 6, 5, 41),
(307, 19, 1, 2, 78),
(308, 19, 2, 2, 15),
(309, 19, 3, 2, 52),
(310, 19, 4, 2, 89),
(311, 19, 5, 2, 26),
(312, 19, 6, 2, 63),
(313, 20, 1, 4, 84),
(314, 20, 2, 4, 37),
(315, 20, 3, 4, 74),
(316, 20, 4, 4, 11),
(317, 20, 5, 4, 48),
(318, 20, 6, 4, 85),
(319, 20, 1, 5, 22),
(320, 20, 2, 5, 59),
(321, 20, 3, 5, 95),
(322, 20, 4, 5, 33),
(323, 20, 5, 5, 70),
(324, 20, 6, 5, 7),
(325, 20, 1, 1, 44),
(326, 20, 2, 1, 81),
(327, 20, 3, 1, 10),
(328, 20, 4, 1, 55),
(329, 20, 5, 1, 92),
(330, 20, 6, 1, 29),
(331, 20, 1, 7, 66),
(332, 20, 2, 7, 3),
(333, 20, 3, 7, 40),
(334, 20, 4, 7, 65),
(335, 20, 5, 7, 14),
(336, 20, 6, 7, 48),
(337, 21, 1, 5, 64),
(338, 21, 2, 5, 25),
(339, 21, 3, 5, 62),
(340, 21, 4, 5, 99),
(341, 21, 5, 5, 36),
(342, 21, 6, 5, 73),
(343, 21, 1, 7, 9),
(344, 21, 2, 7, 47),
(345, 21, 3, 7, 82),
(346, 21, 4, 7, 21),
(347, 21, 5, 7, 58),
(348, 21, 6, 7, 95),
(349, 21, 1, 3, 28),
(350, 21, 2, 3, 67),
(351, 21, 3, 3, 6),
(352, 21, 4, 3, 43),
(353, 21, 5, 3, 80),
(354, 21, 6, 3, 17),
(355, 22, 1, 1, 14),
(356, 22, 2, 1, 91),
(357, 22, 3, 1, 28),
(358, 22, 4, 1, 65),
(359, 22, 5, 1, 1),
(360, 22, 6, 1, 26),
(361, 22, 1, 4, 76),
(362, 22, 2, 4, 13),
(363, 22, 3, 4, 50),
(364, 22, 4, 4, 85),
(365, 22, 5, 4, 22),
(366, 22, 6, 4, 61),
(367, 22, 1, 5, 98),
(368, 22, 2, 5, 35),
(369, 22, 3, 5, 70),
(370, 22, 4, 5, 9),
(371, 22, 5, 5, 46),
(372, 22, 6, 5, 83),
(463, 114, 1, 3, 0),
(464, 114, 2, 3, 0),
(465, 114, 3, 3, 0),
(466, 114, 4, 3, 0),
(467, 114, 5, 3, 0),
(468, 114, 6, 3, 0),
(469, 114, 1, 1, 0),
(470, 114, 2, 1, 0),
(471, 114, 3, 1, 0),
(472, 114, 4, 1, 0),
(473, 114, 5, 1, 0),
(474, 114, 6, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL,
  `thoigian` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_inventory` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `id_order`, `quantity`, `price`, `image`, `id_inventory`) VALUES
(1, 225, 2, 450000.00, 'images/sp022_black.jpeg', 355),
(2, 225, 3, 550000.00, 'images/sp021_brown.jpeg', 350),
(3, 226, 2, 220000.00, 'images/sp019_beige.jpeg', 289),
(4, 227, 2, 450000.00, 'images/sp018_blue.jpeg', 265),
(5, 228, 3, 200000.00, 'images/sp020_blue.jpeg', 336),
(6, 228, 2, 275000.00, 'images/sp016_black.jpeg', 247),
(7, 230, 2, 420000.00, 'images/sp017_green.jpeg', 255),
(8, 230, 2, 250000.00, 'images/sp014_brown.jpeg', 226),
(9, 230, 2, 550000.00, 'images/sp021_brown.jpeg', 350),
(10, 231, 1, 220000.00, 'images/sp019_beige.jpeg', 289),
(11, 231, 2, 220000.00, 'images/sp019_beige.jpeg', 291),
(14, 234, 2, 450000.00, 'images/sp018_blue.jpeg', 269),
(15, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(16, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(17, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(18, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(19, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(20, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(21, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(22, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(23, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(24, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(25, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(26, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(27, 235, 1, 450000.00, 'images/sp022_black.jpeg', 360),
(28, 236, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(29, 236, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(30, 237, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(31, 237, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(32, 238, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(33, 239, 2, 450000.00, 'images/sp022_black.jpeg', 355),
(34, 239, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(35, 240, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(36, 241, 2, 450000.00, 'images/sp022_pink.jpeg', 369),
(37, 241, 1, 450000.00, 'images/sp022_black.jpeg', 359),
(38, 242, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(39, 242, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(40, 242, 2, 420000.00, 'images/sp017_green.jpeg', 253),
(41, 242, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(42, 242, 2, 420000.00, 'images/sp017_green.jpeg', 253),
(43, 242, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(44, 242, 2, 420000.00, 'images/sp017_green.jpeg', 253),
(45, 242, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(46, 242, 2, 420000.00, 'images/sp017_green.jpeg', 253),
(47, 244, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(48, 244, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(49, 245, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(50, 247, 2, 550000.00, 'images/sp021_pink.jpeg', 337),
(51, 251, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(52, 251, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(53, 251, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(54, 252, 1, 450000.00, 'images/sp022_black.jpeg', 355),
(55, 253, 2, 550000.00, 'images/sp021_blue.jpeg', 345),
(56, 253, 1, 200000.00, 'images/sp020_pink.jpeg', 321),
(57, 254, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(58, 255, 1, 200000.00, 'images/sp020_blue.jpeg', 334),
(59, 255, 4, 200000.00, 'images/sp020_blue.jpeg', 334),
(60, 255, 4, 200000.00, 'images/sp020_blue.jpeg', 334),
(61, 256, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(62, 256, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(63, 259, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(64, 259, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(65, 259, 3, 450000.00, 'images/sp018_black.jpeg', 279),
(66, 259, 3, 450000.00, 'images/sp018_black.jpeg', 279),
(67, 260, 2, 550000.00, 'images/sp021_brown.jpeg', 349),
(68, 260, 2, 550000.00, 'images/sp021_brown.jpeg', 349),
(69, 261, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(70, 262, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(71, 263, 3, 450000.00, 'images/sp018_blue.jpeg', 265),
(72, 264, 3, 220000.00, 'images/sp019_pink.jpeg', 301),
(73, 264, 2, 275000.00, 'images/sp016_white.jpeg', 241),
(74, 264, 3, 220000.00, 'images/sp019_pink.jpeg', 301),
(75, 264, 2, 275000.00, 'images/sp016_white.jpeg', 241),
(76, 265, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(77, 266, 3, 450000.00, 'images/sp018_green.jpeg', 271),
(78, 267, 4, 200000.00, 'images/sp020_black.jpeg', 327),
(79, 267, 1, 220000.00, 'images/sp019_beige.jpeg', 289),
(80, 267, 4, 200000.00, 'images/sp020_black.jpeg', 327),
(81, 267, 1, 220000.00, 'images/sp019_beige.jpeg', 289),
(82, 268, 3, 200000.00, 'images/sp020_blue.jpeg', 334),
(83, 268, 1, 220000.00, 'images/sp019_beige.jpeg', 289),
(84, 269, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(85, 269, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(86, 269, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(87, 269, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(88, 269, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(89, 269, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(90, 269, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(91, 269, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(92, 269, 3, 450000.00, 'images/sp022_black.jpeg', 355),
(93, 269, 2, 200000.00, 'images/sp020_beige.jpeg', 313),
(94, 270, 3, 550000.00, 'images/sp021_pink.jpeg', 337),
(95, 270, 2, 220000.00, 'images/sp019_beige.jpeg', 291),
(96, 271, 2, 450000.00, 'images/sp022_beige.jpeg', 365),
(97, 272, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(98, 273, 1, 550000.00, 'images/sp021_blue.jpeg', 343),
(99, 274, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(100, 275, 1, 450000.00, 'images/sp018_blue.jpeg', 265),
(101, 276, 1, 550000.00, 'images/sp021_pink.jpeg', 337),
(102, 277, 2, 450000.00, 'images/sp022_beige.jpeg', 364);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `code_order` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `total_payment` double(10,2) NOT NULL,
  `name_order` varchar(50) NOT NULL,
  `name_receive` varchar(50) DEFAULT NULL,
  `email_order` varchar(50) NOT NULL,
  `email_receive` varchar(50) DEFAULT NULL,
  `phone_order` varchar(20) NOT NULL,
  `phone_receive` varchar(20) DEFAULT NULL,
  `address_order` varchar(100) NOT NULL,
  `address_receive` varchar(100) DEFAULT NULL,
  `method_payment` varchar(50) NOT NULL,
  `fast_delivery` tinyint(1) NOT NULL DEFAULT 0,
  `id_voucher` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `code_order`, `date_created`, `status`, `total_payment`, `name_order`, `name_receive`, `email_order`, `email_receive`, `phone_order`, `phone_receive`, `address_order`, `address_receive`, `method_payment`, `fast_delivery`, `id_voucher`) VALUES
(225, 156, 'alena_29128790', '2024-06-06', 'Chờ thanh toán', 2550000.00, 'blank', 'fdsfd', 'zxc@dgf.sdf', 'dsf@gdf.con', '0383858853', '0326589545', 'adfs', 'dfsd', 'offline', 0, 1),
(226, 159, 'alena_74134976', '2024-06-06', 'Chờ thanh toán', 440000.00, 'blank', 'blank', 'hoa484884sdfs74773@gmail.com', 'hoa484884sdfs74773@gmail.com', '0383858853', '0383858853', 'adfs', 'adfs', 'offline', 0, 1),
(227, 150, 'alena_11054720', '2024-06-06', 'Đã hủy', 900000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(228, 150, 'alena_60494677', '2024-06-06', 'Chờ thanh toán', 1150000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 1, 1),
(230, 150, 'alena_73021960', '2024-06-06', 'Chờ thanh toán', 2440000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(231, 160, 'alena_81382770', '2024-06-06', 'Chờ thanh toán', 660000.00, 'Đỗ Tuấn Kiệt', 'Đỗ Tuấn Kiệt', 'dotuankiet04092003@gmail.com', 'dotuankiet04092003@gmail.com', '0383858853', '0383858853', 'sfdsd', 'sfdsd', 'offline', 1, 1),
(234, 163, 'alena_95418751', '2024-06-09', 'Chờ thanh toán', 900000.00, 'Do Tuan Kiet (FPL HCM)', 'Do Tuan Kiet (FPL HCM)', 'kietdtps28446@fpt.edu.vn', 'kietdtps28446@fpt.edu.vn', '5623', '5623', 'sd', 'sd', 'offline', 0, 1),
(235, 163, 'alena_23950379', '2024-06-09', 'Chờ thanh toán', 5850000.00, 'Do Tuan Kiet (FPL HCM)', 'Do Tuan Kiet (FPL HCM)', 'kietdtps28446@fpt.edu.vn', 'kietdtps28446@fpt.edu.vn', 'sdfsd', 'sdfsd', 'dfs', 'dfs', 'offline', 0, 1),
(236, 163, 'alena_85386871', '2024-06-09', 'Chờ thanh toán', 900000.00, 'Do Tuan Kiet (FPL HCM)', 'Do Tuan Kiet (FPL HCM)', 'kietdtps28446@fpt.edu.vn', 'kietdtps28446@fpt.edu.vn', '0383858853', '0383858853', 'sdfsdf', 'sdfsdf', 'offline', 1, 1),
(237, 145, 'alena_89698527', '2024-06-10', 'Đã thanh toán', 900000.00, 'fsd', 'fsd', 'admin@gmail.com', 'admin@gmail.com', '0383858853', '0383858853', 'sdfdsd', 'sdfdsd', 'offline', 0, 1),
(238, 150, 'alena_20871535', '2024-06-10', 'Hoàn thành', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(239, 150, 'alena_77657741', '2024-06-10', 'Chờ thanh toán', 1300000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(240, 150, 'alena_31891018', '2024-06-10', 'Chờ thanh toán', 450000.00, 'Tuấn Kiệt', 'sdfljds', 'hoa48488474773@gmail.com', 'dsf@gdf.con', '0326597745', '0326589545', 'ddsdf', 'sdddsf', 'offline', 0, 1),
(241, 145, 'alena_90115949', '2024-06-10', 'Chờ thanh toán', 1350000.00, 'blank', 'blank', 'admin@gmail.com', 'admin@gmail.com', '0383858853', '0383858853', 'sdfd', 'sdfd', 'offline', 0, 1),
(242, 150, 'alena_86404059', '2024-06-11', 'Chờ thanh toán', 8860000.00, 'Tuấn Kiệt', 'fdsfd', 'hoa48488474773@gmail.com', 'dsf@gdf.con', '0326597745', '0326589545', 'ddsdf', 'dfsd', 'offline', 0, 1),
(243, 150, 'alena_40327036', '2024-06-11', 'Hoàn thành', 0.00, 'Tuấn Kiệt', 'fdsfd', 'hoa48488474773@gmail.com', 'dsf@gdf.con', '0326597745', '0326589545', 'ddsdf', 'dfsd', 'offline', 0, 1),
(244, 150, 'alena_34838819', '2024-06-11', 'Hoàn thành', 1000000.00, 'Tuấn Kiệt', 'fdsfd', 'hoa48488474773@gmail.com', 'dsf@gdf.con', '0326597745', '0326589545', 'ddsdf', 'dfsd', 'offline', 0, 1),
(245, 150, 'alena_16334808', '2024-06-11', 'Chờ thanh toán', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(246, 150, 'alena_09352701', '2024-06-11', 'Chờ thanh toán', 0.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(247, 150, 'alena_71612274', '2024-06-11', 'Chờ thanh toán', 1100000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(248, 150, 'alena_81871040', '2024-06-11', 'Chờ thanh toán', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(249, 150, 'alena_24112248', '2024-06-11', 'Chờ thanh toán', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(250, 150, 'alena_26240087', '2024-06-11', 'Chờ thanh toán', 440000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(251, 150, 'alena_69311774', '2024-06-11', 'Chờ thanh toán', 480000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(252, 150, 'alena_19528445', '2024-06-11', 'Chờ thanh toán', 480000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(253, 150, 'alena_03112366', '2024-06-11', 'Chờ thanh toán', 1300000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(254, 150, 'alena_56586509', '2024-06-11', 'Chờ thanh toán', 440000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(255, 150, 'alena_97878328', '2024-06-11', 'Chờ thanh toán', 640000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(256, 150, 'alena_48514861', '2024-06-11', 'Chờ thanh toán', 1080000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(257, 150, 'alena_99998259', '2024-06-11', 'Chờ thanh toán', 1350000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(258, 150, 'alena_59212496', '2024-06-11', 'Chờ thanh toán', 1350000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(259, 150, 'alena_69450027', '2024-06-11', 'Chờ thanh toán', 1080000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(260, 150, 'alena_89746670', '2024-06-11', 'Chờ thanh toán', 1100000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(261, 150, 'alena_15816005', '2024-06-11', 'Chờ thanh toán', 430000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(262, 150, 'alena_65961227', '2024-06-11', 'Chờ thanh toán', 430000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(263, 150, 'alena_91490915', '2024-06-11', 'Chờ thanh toán', 1080000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(264, 150, 'alena_56331540', '2024-06-11', 'Chờ thanh toán', 968000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(265, 150, 'alena_64771927', '2024-06-11', 'Chờ thanh toán', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(266, 150, 'alena_59307860', '2024-06-11', 'Chờ thanh toán', 1350000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(267, 150, 'alena_27489167', '2024-06-11', 'Chờ thanh toán', 816000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(268, 150, 'alena_36811840', '2024-06-11', 'Chờ thanh toán', 820000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(269, 150, 'alena_22244020', '2024-06-11', 'Chờ thanh toán', 1458800.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(270, 150, 'alena_21214658', '2024-06-11', 'Chờ thanh toán', 1740320.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(271, 150, 'alena_66339318', '2024-06-11', 'Chờ thanh toán', 720000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(272, 150, 'alena_54738662', '2024-06-11', 'Chờ thanh toán', 440000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(273, 150, 'alena_98622484', '2024-06-11', 'Chờ thanh toán', 440000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(274, 150, 'alena_58329622', '2024-06-11', 'Chờ thanh toán', 550000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(275, 150, 'alena_59239214', '2024-06-12', 'Chờ thanh toán', 480000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(276, 150, 'alena_84398402', '2024-06-12', 'Chờ thanh toán', 495000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1),
(277, 150, 'alena_23862841', '2024-06-12', 'Chờ thanh toán', 810000.00, 'Tuấn Kiệt', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', 'hoa48488474773@gmail.com', '0326597745', '0326597745', 'ddsdf', 'ddsdf', 'offline', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `code_product` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `priceold` double(10,2) NOT NULL DEFAULT 0.00,
  `description` varchar(1000) DEFAULT NULL,
  `id_category` int(3) NOT NULL,
  `view` int(6) NOT NULL DEFAULT 0,
  `sold` int(6) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `code_product`, `name`, `price`, `priceold`, `description`, `id_category`, `view`, `sold`, `hide`) VALUES
(1, 'sp001', 'Áo thun nam - Palaroid', 320000.00, 350000.00, '', 4, 812, 75, 0),
(2, 'sp002', 'Áo thun nam - Jeans shorts', 200000.00, 0.00, '', 4, 234, 123, 0),
(3, 'sp003', 'Áo thun nữ - Crewmate', 200000.00, 250000.00, '', 8, 143, 46, 0),
(4, 'sp004', 'Áo sơ mi nữ - Neoists', 150000.00, 0.00, '', 9, 576, 97, 0),
(5, 'sp005', 'Áo sơ mi nam - Shirt', 325000.00, 350000.00, '', 5, 689, 188, 0),
(6, 'sp006', 'Áo polo nam - Shoulder', 200000.00, 0.00, '', 6, 311, 112, 0),
(7, 'sp007', 'Áo polo nam - Rib', 350000.00, 400000.00, '', 6, 452, 143, 0),
(8, 'sp008', 'Áo khoác dù nữ - Blissfully', 250000.00, 0.00, '', 11, 109, 65, 0),
(9, 'sp009', 'Áo khoác dù nữ - Sweetie', 300000.00, 350000.00, '', 11, 923, 158, 0),
(10, 'sp010', 'Áo khoác dù Unisex - Ombre jacket', 450000.00, 0.00, '', 15, 368, 54, 0),
(11, 'sp011', 'Áo thun nam - Youthful', 185000.00, 0.00, '', 4, 245, 176, 0),
(12, 'sp012', 'Áo thun ba lỗ nam', 88000.00, 120000.00, '', 4, 532, 23, 0),
(13, 'sp013', 'Áo polo nam - Friends', 300000.00, 350000.00, '', 6, 378, 49, 0),
(14, 'sp014', 'Áo polo nam - Collar edge', 250000.00, 0.00, '', 6, 623, 102, 0),
(15, 'sp015', 'Áo sơ mi nam - Sleeves', 240000.00, 300000.00, '', 5, 812, 38, 0),
(16, 'sp016', 'Áo sơ mi nam - Short', 275000.00, 0.00, '', 5, 409, 161, 0),
(17, 'sp017', 'Áo khoác Unisex - Varsiry', 420000.00, 450000.00, '', 15, 711, 144, 0),
(18, 'sp018', 'Áo khoác Hoodes Unisex', 450000.00, 0.00, '', 15, 315, 99, 0),
(19, 'sp019', 'Áo thun nữ - Retro', 220000.00, 250000.00, '', 8, 123, 53, 0),
(20, 'sp020', 'Áo thun nữ - Starry', 200000.00, 0.00, '', 8, 576, 167, 0),
(21, 'sp021', 'Áo khoác dù nữ - Mixed', 550000.00, 0.00, '', 11, 275, 183, 0),
(22, 'sp022', 'Áo khoác thun nữ - Delight', 450000.00, 500000.00, '', 11, 365, 41, 0),
(114, 'G9UNYH3L', 'blank', 33.00, 56.00, NULL, 11, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(3) NOT NULL,
  `code_size` varchar(10) NOT NULL,
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `code_size`, `height`, `weight`) VALUES
(1, 'XS', '', ''),
(2, 'S', '', ''),
(3, 'M', '', ''),
(4, 'L', '', ''),
(5, 'XL', '', ''),
(6, 'XXL', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `used_vouchers`
--

CREATE TABLE `used_vouchers` (
  `id` int(11) NOT NULL,
  `id_voucher` int(6) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `used_vouchers`
--

INSERT INTO `used_vouchers` (`id`, `id_voucher`, `id_user`) VALUES
(44, 10, 150);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `birthday` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `google_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `gender`, `birthday`, `address`, `role`, `image`, `active`, `google_id`) VALUES
(145, 'admin', '$2y$10$HnbkKWxcW8siQjWDIoC4p.4C2q/WxvquasWiG/zjgTP5dT6Oty/CC', '', 'admin@gmail.com', '', 0, NULL, '', 1, '', 1, NULL),
(148, 'dotuankietcv', '$2y$10$7JbXZV58sFf11Xb1xmHpHuaf2CKAr9vrl3nWYecSSpty8zvslNdE2', NULL, 'admin2@gmail.com', NULL, 1, NULL, NULL, 1, 'uploads/1717520406834.jpg', 1, NULL),
(149, 'user31604078', '$2y$10$XEzxQzB0Svk2tuwzTN9n..YF8r.cBa7fD0O2jpDtLV9U7pgsKpmei', '', 's@gmai.com', '', 0, NULL, '', 0, '', 1, NULL),
(150, 'kietdt', '$2y$10$zTS1sYfNgsqtXQQm7QWecuTYib8sxY5ZBQDLxr.wtmh/1ts6tEu6y', 'Tuấn Kiệt', 'hoa48488474773@gmail.com', '0326597745', 0, NULL, 'ddsdf', 0, 'uploads/1717697542225.png', 1, NULL),
(156, 'user52489374', '$2y$10$XqBI71DUL05mL8s11GL67Ongzum/OYcgWn0z6LYhZyGZASyn9yYRe', 'blank', 'zxc@dgf.sdf', '0383858853', 0, NULL, 'adfs', 0, '', 1, NULL),
(157, 'user40921236', '$2y$10$qw8HE2QazEG0mZZhfBBVXOvDEkPDrAjoiO9rrTyUU5amoornYHYc2', '', 'sdkfjk@lksf.com', '', 0, NULL, '', 0, '', 1, NULL),
(158, 'user66296082', '$2y$10$UJg.Ul.zMsEVo5tLXUmLQukbC5GJYNHkTUdbEtCAjn.Lo7fZfT1ku', '', 'sdkfjk@lksf.coms', '', 0, NULL, '', 0, '', 1, NULL),
(159, 'user98807201', '$2y$10$mqC90Knej5T4cajtDU.8Zu2xmNr2wKkzRtFX5Khq6G1Ig72j0wVuy', 'blank', 'hoa484884sdfs74773@gmail.com', '0383858853', 0, NULL, 'adfs', 0, '', 1, NULL),
(160, 'user24257201', '$2y$10$8/WxP/V95.OMEFoNAYWDeeqlOEedGzNsoHY5o1tmCE/4Hbj5gC3Ae', 'Đỗ Tuấn Kiệt', 'dotuankiedfsft04092003@gmail.com', '0383858853', 0, NULL, 'sfdsd', 0, '', 1, NULL),
(163, 'dsfsd', 'eyJpdiI6IkFOTlpKdFo5a0pubUROcVZxRlkxRVE9PSIsInZhbHVlIjoidkZ3U293dzA4VnRmam5BcHVsOWVpanBmazNZOTZSd3l5bEowbTFKVWZQZz0iLCJtYWMiOiI3YWQzYWE4OTVjMTU2MmVkNWY0ZWMxMmU4OWM3MjE4OGUwYjc4ZmI1NDJjZjI1NjJiNWQzN2E3ODJlOWJkYzAxIiwidGFnIjoiIn0=', 'Do Tuan Kiet (FPL HCM)', 'kietdtps28446@fpt.edu.vn', NULL, 0, NULL, NULL, 0, 'uploads/1717936404639.png', 0, '107843524906623450564');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(6) NOT NULL,
  `code_voucher` varchar(10) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `miximum_payment` double(10,2) NOT NULL DEFAULT 0.00,
  `type_discount` tinyint(1) NOT NULL DEFAULT 1,
  `id_user` int(6) NOT NULL DEFAULT 0,
  `quantity` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code_voucher`, `discount`, `miximum_payment`, `type_discount`, `id_user`, `quantity`) VALUES
(1, 'nodiscount', 0.00, 0.00, 1, 0, 0),
(9, 'sdfs', 0.00, 0.00, 1, 0, 0),
(10, 'sơn', 20.00, 500000.00, 2, 0, 4),
(12, 'QfFqh5Zq', 10.00, 500000.00, 2, 150, 1),
(22, 'qm9M8nJA', 10.00, 500000.00, 2, 150, 1),
(23, 'N7Z347f7', 10.00, 500000.00, 2, 150, 1),
(24, '2Iz9PZEI', 10.00, 500000.00, 2, 150, 1),
(25, 'g3BrIQ4t', 10.00, 500000.00, 2, 150, 1),
(27, 'qPjP6LxM', 10.00, 500000.00, 2, 150, 1),
(29, 'z3zQ6VrQ', 10.00, 500000.00, 2, 150, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`id_user`),
  ADD KEY `fk_carts_inventores` (`id_inventory`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_parent` (`id_parent`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_product` (`id_product`),
  ADD KEY `fk_comment_user` (`id_user`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_img_product_color_product` (`id_product`),
  ADD KEY `fk_img_product_color_color` (`id_color`);

--
-- Chỉ mục cho bảng `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soluongtonkho_product` (`id_product`),
  ADD KEY `fk_soluongtonkho_color` (`id_color`),
  ADD KEY `fk_soluongtonkho_size` (`id_size`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetail_order` (`id_order`),
  ADD KEY `fk_orderdetail_inventory` (`id_inventory`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`id_user`),
  ADD KEY `fk_donhang_voucher` (`id_voucher`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_catalog` (`id_category`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `used_vouchers`
--
ALTER TABLE `used_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dadungvoucher_voucher` (`id_voucher`),
  ADD KEY `fk_dadungvoucher_user` (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_voucher_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT cho bảng `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `used_vouchers`
--
ALTER TABLE `used_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_carts_inventores` FOREIGN KEY (`id_inventory`) REFERENCES `inventories` (`id`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`id_parent`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_img_product_color_color` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `fk_img_product_color_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `fk_soluongtonkho_color` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `fk_soluongtonkho_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_soluongtonkho_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderdetail_inventory` FOREIGN KEY (`id_inventory`) REFERENCES `inventories` (`id`),
  ADD CONSTRAINT `fk_orderdetail_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_catalog` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `used_vouchers`
--
ALTER TABLE `used_vouchers`
  ADD CONSTRAINT `fk_dadungvoucher_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_dadungvoucher_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `vouchers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

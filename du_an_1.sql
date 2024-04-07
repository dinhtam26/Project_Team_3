-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 06, 2024 lúc 04:31 AM
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
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart-items`
--

CREATE TABLE `cart-items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Áo ', 0),
(2, 'Quần ', 0),
(3, 'Đồ mặc ngoài', 0),
(15, 'Áo Phông', 1),
(16, 'Áo Polo ', 1),
(17, 'Áo Sơ Mi', 1),
(18, 'Áo Ba Lỗ', 1),
(19, 'Quần Shorts ', 2),
(20, 'Quần Jeans ', 2),
(21, 'Quần Kaki', 2),
(22, 'Chống Nắng', 3),
(23, 'Áo Khoác Ngắn', 3),
(24, 'Áo Khoác Gió', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'xanh'),
(2, 'trắng'),
(3, 'tím'),
(4, 'xanh lá cây'),
(5, 'Đỏ'),
(6, 'Tím than'),
(7, 'Đen'),
(8, 'Nâu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date_comment` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `date_comment`, `content`, `user_id`, `product_id`) VALUES
(4, '25/03/2024', '<p>Sản phẩm đẹp, gi&aacute; cả hợp l&iacute;&nbsp;</p>', 5, 40),
(5, '25/03/2024', '<p>Sản phẩm đẹp&nbsp;</p>', 5, 41),
(6, '25/03/2024', '<p>Sản phẩm đẹp&nbsp;</p>', 5, 41),
(7, '25/03/2024', '<p>Sản phẩm đẹp&nbsp;</p>', 5, 41),
(11, '30-03-2024', 'Sản phẩm k chê vào đâu được', 5, 42),
(12, '05-04-2024', 'Sản phẩm quá là tuyệt vời. Không có điểm nào để chê được 10 điểm', 20, 56),
(13, '06-04-2024', 'Sản phẩm đẹp mê ly', 5, 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh`
--

INSERT INTO `hinh_anh` (`id`, `image`, `pro_id`) VALUES
(20, 'product/1711122647ap_1.4.webp', 39),
(21, 'product/1711122647ap_1.3.webp', 39),
(22, 'product/1711122647ap_1.2.webp', 39),
(23, 'product/1711122664ap_1.1.webp', 39),
(24, 'product/1711122705pl_1.4.webp', 40),
(25, 'product/1711122705pl_1.3.webp', 40),
(26, 'product/1711122705pl_1.2.webp', 40),
(27, 'product/1711122705pl_1.1.webp', 40),
(28, 'product/1711122736sm_1.4.webp', 41),
(29, 'product/1711122736sm_1.3.webp', 41),
(30, 'product/1711122736sm_1.2.webp', 41),
(31, 'product/1711122736sm_1.1.webp', 41),
(32, 'product/1711122770bl_1.4.webp', 42),
(33, 'product/1711122770bl_1.3.webp', 42),
(34, 'product/1711122770bl_1.2.webp', 42),
(35, 'product/1711122770bl_1.1.webp', 42),
(36, 'product/1711122821ap_2.4.webp', 43),
(37, 'product/1711122821ap_2.3.webp', 43),
(38, 'product/1711122821ap_2.2.webp', 43),
(39, 'product/1711122821ap_2.1.webp', 43),
(40, 'product/1711122862qj_1.4.webp', 44),
(41, 'product/1711122862qj_1.3.webp', 44),
(42, 'product/1711122862qj_1.2.webp', 44),
(43, 'product/1711122862qj_1.1.webp', 44),
(44, 'product/1711122965ap_4.4.webp', 46),
(45, 'product/1711122965ap_4.3.webp', 46),
(46, 'product/1711122965ap_4.2.webp', 46),
(47, 'product/1711122965ap_4.1.webp', 46),
(48, 'product/1711122992ap_5.4.webp', 47),
(49, 'product/1711122992ap_5.3.webp', 47),
(50, 'product/1711122992ap_5.2.webp', 47),
(51, 'product/1711122992ap_5.1.webp', 47),
(52, 'product/1711123026ap_6.4].webp', 48),
(53, 'product/1711123026ap_6.3.webp', 48),
(54, 'product/17111230266.2.webp', 48),
(55, 'product/17111230266.1.webp', 48),
(56, 'product/1711123325qj_2.4.webp', 49),
(57, 'product/1711123325qj_2.3.webp', 49),
(58, 'product/1711123325qj_2.2.webp', 49),
(59, 'product/1711123325qj_2.1.webp', 49),
(64, 'product/1711123390qj_4.4.webp', 51),
(65, 'product/1711123390qj_4.3.webp', 51),
(66, 'product/1711123390qj_4.2.webp', 51),
(67, 'product/1711123390qj_4.1.webp', 51),
(68, 'product/1711123599qj_3.4.webp', 50),
(69, 'product/1711123599qj_3.3.webp', 50),
(70, 'product/1711123599qj_3.2.webp', 50),
(71, 'product/1711123599qj_3.1.webp', 50),
(72, 'product/1711124112qs_1.4.webp', 52),
(73, 'product/1711124112qs_1.3.webp', 52),
(74, 'product/1711124112qs_1.2.webp', 52),
(75, 'product/1711124112qs_1.1.webp', 52),
(76, 'product/1711124159qs_2.4.webp', 53),
(77, 'product/1711124159qs_2.3.webp', 53),
(78, 'product/1711124159qs_2.2.webp', 53),
(79, 'product/1711124159qs_2.1.webp', 53),
(80, 'product/1711124211qs_3.4.webp', 54),
(81, 'product/1711124211qs_3.3.webp', 54),
(82, 'product/1711124211qs_3.2.webp', 54),
(83, 'product/1711124211qs_3.1.webp', 54),
(84, 'product/1711124239qs_4.4.webp', 55),
(85, 'product/1711124239qs_4.3.webp', 55),
(86, 'product/1711124239qs_4.2.webp', 55),
(87, 'product/1711124239qs_4.1.webp', 55),
(88, 'product/1711124342qs_5.4.webp', 56),
(89, 'product/1711124342qs_5.3.webp', 56),
(90, 'product/17111243428bs23s015-sa014-2-thumb.webp', 56),
(91, 'product/1711124342qs_5.1.webp', 56),
(92, 'product/1711124406qs_6.4.webp', 57),
(93, 'product/1711124406qs_6.3.webp', 57),
(94, 'product/1711124406qs_6.2.webp', 57),
(95, 'product/1711124406qs_6.1.webp', 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status_payment` tinyint(4) NOT NULL,
  `status_delivery` int(11) NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `code_order` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `fullname`, `email`, `phone`, `address`, `total_price`, `status_payment`, `status_delivery`, `create_at`, `code_order`, `user_id`) VALUES
(28, 'Nguyễn duy nhất', 'nhat2002@gmail.com', 933106298, 'Đường số 3, phường hiệp bình phước, quận Thủ Đức', 598000, 0, 1, '02:27 05-04-2024', 'KtFZU', 20),
(29, 'Nguyễn duy nhất', 'nhat2002@gmail.com', 933106298, 'Đường số 3, phường hiệp bình phước, quận Thủ Đức', 1048000, 0, 2, '03:07 05-04-2024', 'sOwbK', 20),
(30, 'Nguyễn Đình Tam', 'tamndph41864@fpt.edu.vn', 787497087, 'Số nhà 08 ngõ 26 ngọc hồi', 249000, 0, 2, '03:41 05-04-2024', 'ObdAV', 20),
(31, 'Nguyễn duy nhất', 'nhat2002@gmail.com', 933106298, 'Đường số 3, phường hiệp bình phước, quận Thủ Đức', 1137000, 0, 3, '04:07 05-04-2024', '5KXy4', 20),
(32, 'Nguyễn Văn Tiền', 'nhat2002@gmail.com', 933106298, 'Xóm 14 Xuân Phong Xuân Trường', 249000, 1, -1, '05:06 05-04-2024', 'Jewib', 20),
(33, 'Nguyễn Văn Tiền ', 'khang8647@gmail.com', 787497598, 'Số 8 / 26 ngọc hồi, Nam', 249000, 0, 2, '16:31 05-04-2024', 'HSGJZ', 5),
(34, 'Nguyễn Văn Tiền ', 'khang8647@gmail.com', 787497598, 'Số 8 / 26 ngọc hồi, Nam', 1118000, 1, 3, '02:51 06-04-2024', 'nGOSr', 5),
(35, 'Nguyễn Văn Tiền ', 'khang8647@gmail.com', 787497598, 'Số 8 / 26 ngọc hồi, Nam', 897000, 0, -1, '03:55 06-04-2024', '0GHgY', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `variation_id`, `price`, `quantity`) VALUES
(36, 28, 256, 299000, 2),
(37, 29, 260, 349000, 1),
(38, 29, 207, 699000, 1),
(39, 30, 264, 249000, 1),
(40, 31, 269, 419000, 2),
(41, 31, 221, 299000, 1),
(42, 32, 264, 249000, 1),
(43, 33, 264, 249000, 1),
(44, 34, 249, 559000, 2),
(45, 35, 221, 299000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `view` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `create_at` date NOT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `view`, `status`, `create_at`, `cate_id`) VALUES
(39, 'Áo phông nam cổ tim dáng suông', 'product/1711121828ap_1.1.webp', 'Áo phông nam basic dáng regular cổ tim.', 0, 1, '2024-03-22', 15),
(40, 'Áo polo nam', 'product/1711121906pl_1.1.webp', 'Áo t-shirt basic có cổ bẻ, nẹp cài cúc, kiểu dáng đơn giản phù hợp với nhiều hoàn cảnh sử dụng.', 0, 1, '2024-03-22', 16),
(41, 'Áo sơ mi tay dài nam bamboo trơn dáng suông', 'product/1711122041sm_1.1.webp', 'Áo được thiết kế theo form regular fit ôm dáng vừa phải giúp cho những hoạt động đều có thể diễn ra thoải mái, kể cả bạn có dáng người cân đối hay hơi to vòng hai một chút thì lúc lên dáng vẫn rất đẹp. Chiếc áo sẽ giúp body của bạn tôn lên một cách tối đa tạo cảm giác dáng người mặc cân đối và mạnh mẽ hơn rất nhiều. ', 0, 1, '2024-03-26', 17),
(42, 'Áo ba lỗ nam active có in chữ', 'product/1711122112bl_1.1.webp', 'Áo ba lỗ chất liệu polyester co giãn, cổ tròn, phom regular.', 0, 1, '2024-03-22', 18),
(43, 'Áo phông nam basic dáng regular cổ tròn.', 'product/1711122202ap_2.1.webp', 'Áo phông nam basic dáng regular cổ tròn.\r\n', 0, 0, '2024-03-22', 15),
(44, 'Quần jeans nam dáng ôm', 'product/1711122279qj_1.1.webp', 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, phom ôm.', 0, 0, '2024-03-22', 20),
(46, 'Áo phông nam có hình in', 'product/1711122411ap_4.1.webp', 'Áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm nhấn trên sản phẩm.', 0, 1, '2024-03-22', 15),
(47, 'Áo phông unisex người lớn in Mickey & Friends', 'product/1711122484ap_5.1.webp', 'Áo phông Basic Friends. Phù hợp với giới trẻ', 0, 0, '2024-03-22', 15),
(48, 'Áo phông unisex người lớn in Mickey & Friends', 'product/17111225416.1.webp', 'Áo phông', 0, 1, '2024-03-22', 15),
(49, 'Quần jeans nam dáng ôm', 'product/1711123165qj_2.1.webp', 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, phom ôm.', 0, 0, '2024-03-22', 20),
(50, 'Quần jeans nam dáng ôm', 'product/1711123233qj_3.1.webp', 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, phom ôm.', 0, 1, '2024-03-22', 20),
(51, 'Quần jeans nam', 'product/1711123284qj_4.1.webp', 'Quần jeans chất liệu 100% cotton, cạp thường cài cúc, phom regular.', 0, 0, '2024-03-22', 20),
(52, 'Quần soóc nam cạp chun', 'product/1711123704qs_1.1.webp', 'Quần soóc nam basic với chất liệu vải da cá mỏng đứng phom, thoải mái vân động và dễ lựa chọn với nhiều hoàn cảnh sử dụng.', 0, 1, '2024-03-22', 19),
(53, 'Quần soóc nam có hình in', 'product/1711123767qs_2.1.webp', 'Quần soóc nỉ nam dài ngang gối có hoạ tiết in và cạp co giãn có dây rút. Sự kết hợp của 2 thành phần sợi polyester và cotton giúp sản phẩm giữ form dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí.', 0, 0, '2024-03-22', 19),
(54, 'Quần soóc nam cotton cạp chun túi chéo', 'product/1711123839qs_3.1.webp', 'Quần soóc chất liệu 100% cotton, cạp chun luồn dây dệt, túi chéo 2 bên.', 0, 1, '2024-03-22', 19),
(55, 'Quần soóc nam có túi hai bên', 'product/1711123888qs_4.1.webp', 'Quần soóc chất liệu cotton, cạp thường cài cúc, túi chéo 2 bên.', 0, 0, '2024-03-22', 19),
(56, 'Quần soóc nam cạp chun moi giả', 'product/1711124323qs_5.1.webp', 'Quần soóc chất liệu cotton pha, cạp chun, moi giả.', 0, 1, '2024-03-22', 19),
(57, 'Quần soóc nam cạp chun túi ốp hai bên', 'product/1711124393qs_6.1.webp', 'Quần soóc chất liệu cotton pha, cạp chun, túi ốp 2 bên.', 0, 0, '2024-03-22', 19),
(58, 'Quần khaki nam dáng ôm', 'product/1711442599kk_1.1.webp', 'Quần khaki chất liệu cotton, cạp thường cài cúc, phom ôm.  ', 0, 0, '2024-03-26', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L '),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `phone`, `address`, `create_at`, `type`) VALUES
(2, 'Thầy Ba', '12345689', 'Anh Ba', '', 'bandph41864@gmail.com', '0787497087', 'Ha Nội', '12/3/2024', 1),
(5, 'Tiền', '1234', 'Nguyễn Văn Tiền ', 'user/mat_ca_nhan.jpg', 'khang8647@gmail.com', '0787497598', 'Số 8 / 26 ngọc hồi, Nam', '2024-03-25 ', 0),
(12, 'Thành', 'Lethanh123', 'Lê Văn Thành', 'user/1710667965gggg.jpg', 'thanh123@gmail.com', '0123456789', 'Thanh Hóa', '2024-03-07', 1),
(13, 'Tam', 'Dinhtam2607', 'Nguyễn Đình Tam', '', 'tamndph41864@fpt.edu.vn', '0787497087 ', 'Nam Định', '2024-03-12', 1),
(14, 'Toàn', 'Toan123456', 'Phùng Đức Toàn', '', 'toan@gmail.com', '9876543210', 'Quốc Oai', '2024-03-11', 0),
(20, '', '123456', 'Nguyễn duy nhất', 'user/dsc_6487.jpg', 'nhat2002@gmail.com', '0933106298', 'Đường số 3, phường hiệp bình phước, quận Thủ Đức', '2024-03-25 ', 0),
(21, '', '741258', '', '', 'assld@gmail.com', '', '', '', 0),
(22, '', '123456', 'Đạo Nguyễn', 'user/screenshot 2023-11-02 210038.png', 'dao@gmail.com', '0123456789', '123456', '2024-03-27 ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variation`
--

CREATE TABLE `variation` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variation`
--

INSERT INTO `variation` (`id`, `price`, `quantity`, `sale`, `product_id`, `color_id`, `size_id`) VALUES
(183, 149000, 2, 0, 39, 8, 3),
(184, 149000, 2, 0, 39, 7, 3),
(185, 149000, 2, 0, 39, 8, 2),
(186, 149000, 2, 0, 39, 7, 2),
(187, 149000, 2, 0, 39, 8, 1),
(188, 149000, 2, 0, 39, 7, 1),
(189, 499000, 2, 0, 40, 3, 3),
(190, 499000, 2, 0, 40, 3, 2),
(195, 299000, 1, 0, 42, 8, 3),
(196, 299000, 1, 0, 42, 7, 3),
(197, 299000, 1, 0, 42, 8, 2),
(198, 299000, 1, 0, 42, 7, 2),
(199, 299000, 1, 0, 42, 8, 1),
(200, 299000, 1, 0, 42, 7, 1),
(201, 149000, 2, 0, 43, 8, 3),
(202, 149000, 2, 0, 43, 1, 3),
(203, 149000, 2, 0, 43, 8, 2),
(204, 149000, 2, 0, 43, 1, 2),
(205, 149000, 2, 0, 43, 8, 1),
(206, 149000, 2, 0, 43, 1, 1),
(207, 699000, 2, 0, 44, 8, 5),
(208, 699000, 2, 0, 44, 7, 5),
(209, 699000, 2, 0, 44, 8, 4),
(210, 699000, 2, 0, 44, 7, 4),
(211, 699000, 2, 0, 44, 8, 3),
(212, 699000, 2, 0, 44, 7, 3),
(221, 299000, 5, 0, 46, 7, 3),
(222, 299000, 5, 0, 46, 6, 3),
(223, 299000, 5, 0, 46, 7, 2),
(224, 299000, 5, 0, 46, 6, 2),
(225, 299000, 5, 0, 46, 7, 1),
(226, 299000, 5, 0, 46, 6, 1),
(227, 349000, 10, 0, 47, 7, 5),
(228, 349000, 10, 0, 47, 6, 5),
(229, 349000, 10, 0, 47, 7, 4),
(230, 349000, 10, 0, 47, 6, 4),
(231, 349000, 10, 0, 47, 7, 3),
(232, 349000, 10, 0, 47, 6, 3),
(233, 349000, 10, 0, 47, 7, 2),
(234, 349000, 10, 0, 47, 6, 2),
(235, 349000, 5, 0, 48, 2, 5),
(236, 349000, 5, 0, 48, 1, 5),
(237, 349000, 5, 0, 48, 2, 4),
(238, 349000, 5, 0, 48, 1, 4),
(239, 349000, 5, 0, 48, 2, 3),
(240, 349000, 5, 0, 48, 1, 3),
(241, 349000, 5, 0, 48, 2, 2),
(242, 349000, 5, 0, 48, 1, 2),
(243, 499000, 2, 0, 49, 8, 5),
(244, 499000, 2, 0, 49, 7, 5),
(245, 499000, 2, 0, 49, 8, 4),
(246, 499000, 2, 0, 49, 7, 4),
(247, 499000, 2, 0, 49, 8, 3),
(248, 499000, 2, 0, 49, 7, 3),
(249, 559000, 3, 0, 50, 8, 4),
(250, 559000, 3, 0, 50, 7, 4),
(251, 559000, 3, 0, 50, 6, 4),
(252, 559000, 3, 0, 50, 8, 3),
(253, 559000, 3, 0, 50, 7, 3),
(254, 559000, 3, 0, 50, 6, 3),
(255, 499000, 2, 0, 51, 8, 3),
(256, 299000, 2, 0, 52, 8, 4),
(257, 299000, 2, 0, 52, 8, 3),
(258, 499000, 2, 0, 53, 7, 4),
(259, 499000, 2, 0, 53, 7, 3),
(260, 349000, 5, 0, 54, 8, 3),
(261, 349000, 5, 0, 54, 8, 2),
(262, 199000, 2, 0, 55, 2, 4),
(263, 199000, 2, 0, 55, 2, 3),
(264, 249000, 3, 0, 56, 6, 3),
(265, 249000, 3, 0, 56, 6, 2),
(266, 349000, 6, 0, 57, 2, 5),
(267, 349000, 6, 0, 57, 2, 4),
(268, 349000, 6, 0, 57, 2, 3),
(269, 419000, 2, 0, 41, 8, 3),
(270, 419000, 2, 0, 41, 7, 3),
(271, 1000, 2, 0, 58, 2, 3),
(272, 699, 2, 0, 58, 2, 2),
(273, 699, 2, 0, 58, 2, 1),
(274, 699, 2, 0, 58, 3, 5),
(275, 699, 2, 0, 58, 2, 5),
(276, 699, 2, 0, 58, 1, 5),
(277, 699, 2, 0, 58, 7, 3),
(278, 699, 2, 0, 58, 6, 3),
(279, 699, 2, 0, 58, 5, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart-items`
--
ALTER TABLE `cart-items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_pro` (`product_id`),
  ADD KEY `fk_cart` (`cart_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_cart` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`user_id`),
  ADD KEY `fk_cm_pr` (`product_id`);

--
-- Chỉ mục cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_pro_fk` (`pro_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_order` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_ord` (`order_id`),
  ADD KEY `fk_odr_var` (`variation_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro_cate` (`cate_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_varia_size` (`size_id`),
  ADD KEY `fk_varia_color` (`color_id`),
  ADD KEY `fk_varia_pro` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart-items`
--
ALTER TABLE `cart-items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `variation`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart-items`
--
ALTER TABLE `cart-items`
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `fk_cart_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_cm_pr` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD CONSTRAINT `img_pro_fk` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_odr_var` FOREIGN KEY (`variation_id`) REFERENCES `variation` (`id`),
  ADD CONSTRAINT `fk_order_ord` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `variation`
--
ALTER TABLE `variation`
  ADD CONSTRAINT `fk_varia_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_varia_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_varia_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

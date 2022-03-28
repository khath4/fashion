-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 30, 2021 lúc 01:46 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel7x`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_open` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `a_email`, `a_phone`, `a_address`, `time_open`, `a_description`, `created_at`, `updated_at`) VALUES
(1, 'tranhoangkha366@gmail.com', '0364784406', 'Cà Mau', 'Từ 8:00 - 17:00', 'Công ty TNHH ...', '2021-04-18 02:36:30', '2021-04-18 02:36:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Trần Hoàng Kha', 'tranhoangkha366@gmail.com', NULL, NULL, 1, NULL, '$2y$10$/0MHMHxMRd/TuHfLhcuIM.FggRZmLEYWUVh0KDpFQBrhdNQiTSWKq', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_active` tinyint(4) NOT NULL DEFAULT 1,
  `a_author_id` int(11) NOT NULL DEFAULT 0,
  `a_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_view` int(11) NOT NULL DEFAULT 0,
  `a_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `a_hot` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `a_name`, `a_slug`, `a_description`, `a_content`, `a_active`, `a_author_id`, `a_avatar`, `a_view`, `a_title_seo`, `a_description_seo`, `created_at`, `updated_at`, `a_hot`) VALUES
(1, 'Fashion Blogger', 'fashion-blogger', 'Tips diện quần áo phù hợp với từng dáng người cho mùa Hè – Thu.', '<p style=\"text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/109.png\" style=\"width:768px\" /></p>\r\n\r\n<h2>B&iacute; k&iacute;p tu luyện blog</h2>\r\n\r\n<p>L&agrave;m thế n&agrave;o để b&agrave;i blog của bạn c&oacute; thể vượt qua v&ograve;ng tuyển chọn của đội ngũ Shopee? Bỏ t&uacute;i ngay những b&iacute; k&iacute;p v&agrave;ng sau nh&eacute;!</p>\r\n\r\n<p><strong>Bước 1:</strong>&nbsp;Suy nghĩ v&agrave; chọn ra nội dung thật đặc sắc m&agrave; m&igrave;nh sẽ viết theo chủ đề của Shopee.</p>\r\n\r\n<p><strong>Bước 2:</strong>&nbsp;Viết ti&ecirc;u đề b&agrave;i viết thu h&uacute;t, n&oacute;i l&ecirc;n nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Ti&ecirc;u đề c&oacute; tối đa 55 k&yacute; tự t&iacute;nh cả khoảng trắng. Vd: Xu hướng v&aacute;y đầm thu đ&ocirc;ng 2019</p>\r\n\r\n<p><strong>Bước 3:</strong>&nbsp;Viết th&acirc;n b&agrave;i tối thiểu 700 từ v&agrave; tối thiểu 5 h&igrave;nh ảnh. Ng&ocirc;n từ b&agrave;i viết cần tập trung n&oacute;i về chủ đề ch&iacute;nh của b&agrave;i viết. H&igrave;nh ảnh đ&iacute;nh k&egrave;m phải chất lượng, r&otilde; n&eacute;t v&agrave; thể hiện nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Bật m&iacute;: Những b&agrave;i viết c&oacute; sự đầu tư về nội dung, h&igrave;nh ảnh v&agrave; những chủ đề thời trang đang được cộng đồng quan t&acirc;m sẽ c&oacute; cơ hội gi&agrave;nh giải thưởng cao đ&oacute;!</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Rủ bạn b&egrave;, người th&acirc;n cũng tham gia để học hỏi kiến thức thời trang cũng như trau dồi kinh nghiệm viết l&aacute;ch, đồng thời c&ugrave;ng nhau rinh về giải thưởng cực hấp dẫn từ Shopee!</p>\r\n\r\n<p>Bạn c&oacute; thể nhấn v&agrave;o banner dưới để xem th&ecirc;m&nbsp;Hướng dẫn viết Blog tr&ecirc;n Shopee&nbsp;nh&eacute;.</p>\r\n\r\n<p>&nbsp;</p>', 1, 0, '2021-04-29__46-51756.jpg', 0, 'Fashion Blogger', 'Tips diện quần áo phù hợp với từng dáng người cho mùa Hè – Thu.', '2021-04-28 09:46:30', '2021-04-29 04:14:07', 1),
(2, 'Fashion Week', 'fashion-week', 'Làm thế nào để bài blog của bạn có thể vượt qua vòng tuyển chọn của đội ngũ Shopee? Bỏ túi ngay những bí kíp vàng sau nhé!', '<p style=\"text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/109.png\" /></p>\r\n\r\n<h2>B&iacute; k&iacute;p tu luyện blog</h2>\r\n\r\n<p>L&agrave;m thế n&agrave;o để b&agrave;i blog của bạn c&oacute; thể vượt qua v&ograve;ng tuyển chọn của đội ngũ Shopee? Bỏ t&uacute;i ngay những b&iacute; k&iacute;p v&agrave;ng sau nh&eacute;!</p>\r\n\r\n<p><strong>Bước 1:</strong>&nbsp;Suy nghĩ v&agrave; chọn ra nội dung thật đặc sắc m&agrave; m&igrave;nh sẽ viết theo chủ đề của Shopee.</p>\r\n\r\n<p><strong>Bước 2:</strong>&nbsp;Viết ti&ecirc;u đề b&agrave;i viết thu h&uacute;t, n&oacute;i l&ecirc;n nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Ti&ecirc;u đề c&oacute; tối đa 55 k&yacute; tự t&iacute;nh cả khoảng trắng. Vd: Xu hướng v&aacute;y đầm thu đ&ocirc;ng 2019</p>\r\n\r\n<p><strong>Bước 3:</strong>&nbsp;Viết th&acirc;n b&agrave;i tối thiểu 700 từ v&agrave; tối thiểu 5 h&igrave;nh ảnh. Ng&ocirc;n từ b&agrave;i viết cần tập trung n&oacute;i về chủ đề ch&iacute;nh của b&agrave;i viết. H&igrave;nh ảnh đ&iacute;nh k&egrave;m phải chất lượng, r&otilde; n&eacute;t v&agrave; thể hiện nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Bật m&iacute;: Những b&agrave;i viết c&oacute; sự đầu tư về nội dung, h&igrave;nh ảnh v&agrave; những chủ đề thời trang đang được cộng đồng quan t&acirc;m sẽ c&oacute; cơ hội gi&agrave;nh giải thưởng cao đ&oacute;!</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Rủ bạn b&egrave;, người th&acirc;n cũng tham gia để học hỏi kiến thức thời trang cũng như trau dồi kinh nghiệm viết l&aacute;ch, đồng thời c&ugrave;ng nhau rinh về giải thưởng cực hấp dẫn từ Shopee!</p>\r\n\r\n<p>Bạn c&oacute; thể nhấn v&agrave;o banner dưới để xem th&ecirc;m&nbsp;Hướng dẫn viết Blog tr&ecirc;n Shopee&nbsp;nh&eacute;.</p>', 1, 0, '2021-04-29__57-84919.jpg', 0, 'Fashion Week', 'Làm thế nào để bài blog của bạn có thể vượt qua vòng tuyển chọn của đội ngũ Shopee? Bỏ túi ngay những bí kíp vàng sau nhé!', '2021-04-29 04:10:43', '2021-04-29 04:11:05', 1),
(3, 'Fashion Month', 'fashion-month', 'Bạn có thể nhấn vào banner dưới để xem thêm Hướng dẫn viết Blog trên Shopee nhé.', '<p style=\"text-align:center\"><img alt=\"\" src=\"/ckfinder/userfiles/files/109.png\" /></p>\r\n\r\n<h2>B&iacute; k&iacute;p tu luyện blog</h2>\r\n\r\n<p>L&agrave;m thế n&agrave;o để b&agrave;i blog của bạn c&oacute; thể vượt qua v&ograve;ng tuyển chọn của đội ngũ Shopee? Bỏ t&uacute;i ngay những b&iacute; k&iacute;p v&agrave;ng sau nh&eacute;!</p>\r\n\r\n<p><strong>Bước 1:</strong>&nbsp;Suy nghĩ v&agrave; chọn ra nội dung thật đặc sắc m&agrave; m&igrave;nh sẽ viết theo chủ đề của Shopee.</p>\r\n\r\n<p><strong>Bước 2:</strong>&nbsp;Viết ti&ecirc;u đề b&agrave;i viết thu h&uacute;t, n&oacute;i l&ecirc;n nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Ti&ecirc;u đề c&oacute; tối đa 55 k&yacute; tự t&iacute;nh cả khoảng trắng. Vd: Xu hướng v&aacute;y đầm thu đ&ocirc;ng 2019</p>\r\n\r\n<p><strong>Bước 3:</strong>&nbsp;Viết th&acirc;n b&agrave;i tối thiểu 700 từ v&agrave; tối thiểu 5 h&igrave;nh ảnh. Ng&ocirc;n từ b&agrave;i viết cần tập trung n&oacute;i về chủ đề ch&iacute;nh của b&agrave;i viết. H&igrave;nh ảnh đ&iacute;nh k&egrave;m phải chất lượng, r&otilde; n&eacute;t v&agrave; thể hiện nội dung của b&agrave;i viết.</p>\r\n\r\n<p>Bật m&iacute;: Những b&agrave;i viết c&oacute; sự đầu tư về nội dung, h&igrave;nh ảnh v&agrave; những chủ đề thời trang đang được cộng đồng quan t&acirc;m sẽ c&oacute; cơ hội gi&agrave;nh giải thưởng cao đ&oacute;!</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Rủ bạn b&egrave;, người th&acirc;n cũng tham gia để học hỏi kiến thức thời trang cũng như trau dồi kinh nghiệm viết l&aacute;ch, đồng thời c&ugrave;ng nhau rinh về giải thưởng cực hấp dẫn từ Shopee!</p>\r\n\r\n<p>Bạn c&oacute; thể nhấn v&agrave;o banner dưới để xem th&ecirc;m&nbsp;Hướng dẫn viết Blog tr&ecirc;n Shopee&nbsp;nh&eacute;.</p>', 1, 0, '2021-04-29__34-10689.jpg', 0, 'Fashion Month', 'Bạn có thể nhấn vào banner dưới để xem thêm Hướng dẫn viết Blog trên Shopee nhé.', '2021-04-29 04:12:05', '2021-04-29 04:13:19', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_type` tinyint(4) NOT NULL DEFAULT 1,
  `banner_status` tinyint(4) NOT NULL DEFAULT 0,
  `banner_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `banner_type`, `banner_status`, `banner_avatar`, `banner_link`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-04-18__banner-6803.jpg', '#', '2021-04-18 02:43:42', '2021-04-28 08:36:55'),
(2, 1, 1, '2021-04-18__4-25694.jpg', '#', '2021-04-18 02:44:13', '2021-04-28 08:36:43'),
(3, 1, 1, '2021-04-18__6-688.jpg', '#', '2021-04-18 02:44:20', '2021-04-28 08:36:49'),
(4, 1, 1, '2021-04-18__8-25505.jpg', '#', '2021-04-18 02:44:30', '2021-04-28 08:36:32'),
(5, 1, 1, '2021-04-18__57-50773.jpg', '#', '2021-04-18 02:44:40', '2021-04-28 08:36:15'),
(6, 1, 1, '2021-04-18__28-64346.jpg', '#', '2021-04-18 02:44:45', '2021-04-28 08:35:34'),
(7, 1, 1, '2021-04-18__32-76318.jpg', '#', '2021-04-18 02:45:26', '2021-04-28 08:35:28'),
(8, 2, 1, '2021-04-18__cat-34331.jpg', '#', '2021-04-18 03:33:16', '2021-04-28 08:35:21'),
(9, 3, 1, '2021-04-18__cat2-42546.jpg', '#', '2021-04-18 03:33:24', '2021-04-28 08:35:16'),
(10, 5, 1, '2021-04-19__57-61021.jpg', '#', '2021-04-19 07:38:01', '2021-04-28 08:35:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_active` tinyint(4) NOT NULL DEFAULT 1,
  `b_home` tinyint(4) NOT NULL DEFAULT 0,
  `b_total_product` int(11) NOT NULL DEFAULT 0,
  `b_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_keyword_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `b_name`, `b_slug`, `b_avatar`, `b_active`, `b_home`, `b_total_product`, `b_title_seo`, `b_description_seo`, `b_keyword_seo`, `created_at`, `updated_at`) VALUES
(1, 'NoBrands', 'nobrands', NULL, 1, 1, 7, 'NoBrands', NULL, NULL, '2021-04-18 11:32:16', '2021-04-29 07:31:58'),
(2, 'Lados', 'lados', NULL, 1, 1, 3, 'Lados', NULL, NULL, '2021-04-28 09:18:29', '2021-04-28 09:54:00'),
(3, 'AGE2X', 'age2x', NULL, 1, 1, 1, 'AGE2X', NULL, NULL, '2021-04-28 09:59:13', '2021-04-28 10:07:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_menu_category_id` int(11) NOT NULL DEFAULT 0,
  `c_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_active` tinyint(4) NOT NULL DEFAULT 1,
  `c_total_product` int(11) NOT NULL DEFAULT 0,
  `c_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_keyword_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `c_home` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_slug`, `c_menu_category_id`, `c_avatar`, `c_active`, `c_total_product`, `c_title_seo`, `c_description_seo`, `c_keyword_seo`, `created_at`, `updated_at`, `c_home`) VALUES
(1, 'Áo Sơ Mi', 'ao-so-mi', 1, NULL, 1, 4, 'Áo Sơ Mi', NULL, NULL, '2021-04-18 04:23:54', '2021-04-29 06:27:48', 1),
(2, 'Áo Thun', 'ao-thun', 1, NULL, 1, 4, 'Váy', NULL, NULL, '2021-04-18 04:29:33', '2021-04-28 09:17:24', 1),
(5, 'Phụ Kiện', 'phu-kien', 4, NULL, 1, 0, 'Túi Xách', NULL, NULL, '2021-04-19 03:26:05', '2021-04-28 10:04:16', 0),
(6, 'Áo Khoác & Áo Vest', 'ao-khoac-ao-vest', 1, NULL, 1, 0, 'Áo Khoác & Áo Vest', NULL, NULL, '2021-04-28 08:21:20', '2021-04-28 10:00:20', 0),
(7, 'Áo Nỉ / Áo Len', 'ao-ni-ao-len', 1, NULL, 1, 0, 'Áo Nỉ / Áo Len', NULL, NULL, '2021-04-28 08:21:46', '2021-04-28 10:00:25', 0),
(8, 'Đồ Bộ / Đồ Mặt Nhà', 'do-bo-do-mat-nha', 1, NULL, 1, 0, 'Đồ Bộ / Đồ Mặt Nhà', NULL, NULL, '2021-04-28 08:22:17', '2021-04-28 10:01:02', 0),
(9, 'Đồ Đôi', 'do-doi', 1, NULL, 1, 0, 'Đồ Đôi', NULL, NULL, '2021-04-28 08:22:26', '2021-04-28 10:01:05', 0),
(10, 'Đồ Trung Niên', 'do-trung-nien', 1, NULL, 1, 0, 'Đồ Trung Niên', NULL, NULL, '2021-04-28 08:23:15', '2021-04-28 10:00:59', 0),
(11, 'Áo', 'ao', 2, NULL, 1, 0, 'Áo', NULL, NULL, '2021-04-28 08:23:54', '2021-04-28 10:00:57', 0),
(12, 'Đầm', 'dam', 2, NULL, 1, 0, 'Đầm', NULL, NULL, '2021-04-28 08:25:29', '2021-04-28 10:08:29', 0),
(13, 'Chân Váy', 'chan-vay', 2, NULL, 1, 3, 'Chân Váy', NULL, NULL, '2021-04-28 08:25:43', '2021-04-29 07:31:58', 1),
(14, 'Set Trang Phục & Jumpsuit', 'set-trang-phuc-jumpsuit', 2, NULL, 1, 0, 'Set Trang Phục & Jumpsit', NULL, NULL, '2021-04-28 08:26:53', '2021-04-28 10:01:42', 0),
(15, 'Đồ Bơi', 'do-boi', 2, NULL, 1, 0, 'Đồ Bơi', NULL, NULL, '2021-04-28 08:27:54', '2021-04-28 10:01:38', 0),
(16, 'Đồ Lót, Đồ Ngủ & Đồ Mặt Nhà', 'do-lot-do-ngu-do-mat-nha', 2, NULL, 1, 0, 'Đồ Lót, Đồ Ngủ & Đồ Mặt Nhà', NULL, NULL, '2021-04-28 08:28:38', '2021-04-28 10:01:36', 0),
(17, 'Mắt Kính', 'mat-kinh', 4, NULL, 1, 0, 'Mắt Kính', NULL, NULL, '2021-04-28 08:31:43', '2021-04-28 10:01:35', 0),
(18, 'Nón & Dù', 'non-du', 4, NULL, 1, 0, 'Nón & Đu', NULL, NULL, '2021-04-28 08:31:49', '2021-04-28 10:01:34', 0),
(19, 'Khăn , Tất & Găng Tay', 'khan-tat-gang-tay', 4, NULL, 1, 0, 'Khăn , Tất & Găng Tay', NULL, NULL, '2021-04-28 08:32:34', '2021-04-28 10:01:33', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ct_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mc_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mc_status` tinyint(4) NOT NULL DEFAULT 0,
  `mc_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mc_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mc_keyword_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `mc_name`, `mc_slug`, `mc_status`, `mc_title_seo`, `mc_description_seo`, `mc_keyword_seo`, `created_at`, `updated_at`) VALUES
(1, 'Thời Trang Nam', 'thoi-trang-nam', 1, 'Thời Trang Nam', NULL, NULL, '2021-04-18 10:59:23', '2021-04-28 08:30:19'),
(2, 'Thời Trang Nữ', 'thoi-trang-nu', 1, 'Thời Trang Nữ', NULL, NULL, '2021-04-18 10:59:25', '2021-04-28 08:30:17'),
(4, 'Phụ Kiện Thời Trang', 'phu-kien-thoi-trang', 1, 'Phụ Kiện Thời Trang', NULL, NULL, '2021-04-18 10:59:37', '2021-04-28 08:30:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(56, '2014_10_12_000000_create_users_table', 1),
(57, '2014_10_12_100000_create_password_resets_table', 1),
(58, '2019_08_19_000000_create_failed_jobs_table', 1),
(60, '2021_02_28_021040_create_products_table', 1),
(61, '2021_02_28_030835_alter_column_pro_content_and_pro_title_seo_in_table_products', 1),
(62, '2021_03_02_025745_create_article_table', 1),
(63, '2021_03_08_030900_create_contact_table', 1),
(64, '2021_03_10_020155_create_transactions_table', 1),
(65, '2021_03_10_020228_create_orders_table', 1),
(66, '2021_03_10_022219_alter_column_pro_pay_in_table_products', 1),
(67, '2021_03_11_085905_create_ratings_table', 1),
(68, '2021_03_11_090701_alter_column_table_products', 1),
(69, '2021_03_18_024654_alter_column_total_pay_table_users', 1),
(70, '2021_03_24_013749_create_page_statics_table', 1),
(72, '2021_03_26_074131_create_admins_table', 1),
(73, '2021_03_27_030658_alter_column_c_hot_om_table_article', 1),
(74, '2021_03_29_031219_alter_column_address_on_user', 1),
(75, '2021_03_30_083716_alter_columns_on_user', 1),
(76, '2021_04_01_092231_alter_column_status_on_users', 1),
(77, '2021_04_07_084458_create_table_brand', 2),
(78, '2021_04_07_101803_alter_column_on_products', 2),
(79, '2021_04_09_160227_create_slider_table', 2),
(80, '2021_04_10_135956_create_banner_table', 2),
(81, '2021_04_10_140927_create_about_table', 2),
(82, '2021_04_14_113501_alter_column_on_transaction', 2),
(83, '2021_02_27_023430_create_categories_table', 3),
(84, '2021_03_25_031541_alter_column_c_hot_categories', 4),
(87, '2021_04_18_132611_create_menu_categories_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `or_transaction_id` int(11) NOT NULL DEFAULT 0,
  `or_product_id` int(11) NOT NULL DEFAULT 0,
  `or_qty` tinyint(4) NOT NULL DEFAULT 0,
  `or_price` int(11) NOT NULL DEFAULT 0,
  `or_sale` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `or_transaction_id`, `or_product_id`, `or_qty`, `or_price`, `or_sale`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 169000, 30, '2021-04-29 06:22:35', '2021-04-29 06:22:35'),
(2, 2, 11, 1, 130000, 50, '2021-04-29 08:21:51', '2021-04-29 08:21:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_statics`
--

CREATE TABLE `page_statics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ps_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ps_type` tinyint(4) NOT NULL DEFAULT 1,
  `ps_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_statics`
--

INSERT INTO `page_statics` (`id`, `ps_name`, `ps_type`, `ps_content`, `created_at`, `updated_at`) VALUES
(1, 'Điều khoản sử dụng', 4, '<h1>ĐIỀU 1. NGUY&Ecirc;N TẮC CHUNG</h1>\r\n\r\n<ol>\r\n	<li>Trước khi đăng k&yacute; t&agrave;i khoản để sử dụng dịch vụ tr&ecirc;n Mạng x&atilde; hội GAPO (&ldquo;<strong>Dịch vụ</strong>&rdquo;), bạn x&aacute;c nhận đ&atilde; đọc, hiểu v&agrave; đồng &yacute; với tất cả c&aacute;c quy định trong Thỏa Thuận Cung Cấp V&agrave; Sử Dụng Dịch Vụ Mạng X&atilde; Hội GAPO n&agrave;y (sau đ&acirc;y gọi tắt l&agrave; &ldquo;<strong>Thỏa thuận</strong>&rdquo;) th&ocirc;ng qua việc ho&agrave;n th&agrave;nh việc đăng k&yacute; t&agrave;i khoản Mạng x&atilde; hội GAPO. Bạn chấp nhận kh&ocirc;ng c&oacute; bất kỳ giới hạn n&agrave;o về v&agrave;/hoặc li&ecirc;n quan tới tất cả c&aacute;c điều khoản v&agrave; điều kiện dưới đ&acirc;y, kể từ thời điểm bạn sử dụng Dịch vụ lần đầu ti&ecirc;n.</li>\r\n	<li>Khi xem x&eacute;t việc sử dụng Dịch vụ cung cấp bởi C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ Gapo (sau đ&acirc;y gọi tắt l&agrave; &ldquo;<strong>ch&uacute;ng t&ocirc;i</strong>&rdquo; hoặc &ldquo;<strong>GAPO</strong>&rdquo;), bạn cam kết rằng bạn c&oacute; đủ tuổi theo luật định để x&aacute;c lập thỏa thuận c&oacute; t&iacute;nh r&agrave;ng buộc, v&agrave; kh&ocirc;ng phải l&agrave; người bị ngăn cấm tiếp nhận Dịch vụ theo ph&aacute;p luật Việt Nam, hoặc bạn đ&atilde; c&oacute; sự chấp thuận trước của cha mẹ hoặc người gi&aacute;m hộ hợp ph&aacute;p của bạn để sử dụng Dịch vụ theo quy định v&agrave; ph&ugrave; hợp với Thỏa thuận n&agrave;y.</li>\r\n	<li>Đối với Th&ocirc;ng tin được bảo vệ theo quyền sở hữu tr&iacute; tuệ như ảnh v&agrave; video (&ldquo;<strong>Th&ocirc;ng tin SHTT</strong>&rdquo;), bạn cấp ri&ecirc;ng cho ch&uacute;ng t&ocirc;i quyền sau: bạn cấp cho ch&uacute;ng t&ocirc;i một giấy ph&eacute;p to&agrave;n cầu, kh&ocirc;ng độc quyền, c&oacute; thể chuyển nhượng, c&oacute; thể cấp ph&eacute;p lại v&agrave; miễn ph&iacute; để sử dụng mọi Th&ocirc;ng tin SHTT m&agrave; bạn đăng l&ecirc;n (&ldquo;<strong>Giấy ph&eacute;p SHTT</strong>&rdquo;). Giấy ph&eacute;p SHTT n&agrave;y hết hiệu lực khi bạn x&oacute;a Th&ocirc;ng tin SHTT hoặc t&agrave;i khoản, trừ khi Th&ocirc;ng tin của bạn đ&atilde; được ch&iacute;nh bạn chia sẻ với người kh&aacute;c v&agrave; những người n&agrave;y chưa x&oacute;a Th&ocirc;ng tin đ&oacute; tr&ecirc;n Mạng x&atilde; hội GAPO.</li>\r\n	<li>Khi chia sẻ Th&ocirc;ng tin l&ecirc;n Mạng x&atilde; hội GAPO, bạn đồng &yacute; cấp cho ch&uacute;ng t&ocirc;i quyền sử dụng v&agrave; chia sẻ Th&ocirc;ng tin đ&oacute; l&ecirc;n c&aacute;c nền tảng kh&aacute;c của hệ sinh th&aacute;i GAPO thuộc quyền quản l&yacute; của ch&uacute;ng t&ocirc;i hoặc c&aacute;c phương tiện th&ocirc;ng tin đại ch&uacute;ng.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 2. QUY ĐỊNH VỀ ĐẶT T&Ecirc;N T&Agrave;I KHOẢN</h3>\r\n\r\n<ol>\r\n	<li>Kh&ocirc;ng được đặt t&ecirc;n t&agrave;i khoản, nh&acirc;n vật theo t&ecirc;n của danh nh&acirc;n, t&ecirc;n của c&aacute;c vị l&atilde;nh đạo, t&ecirc;n của tr&ugrave;m khủng bố, ph&aacute;t x&iacute;t, tội phạm, v&agrave; t&ecirc;n của những c&aacute; nh&acirc;n, tổ chức chống lại Nh&agrave; nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam, m&agrave; g&acirc;y phương hại đến an ninh quốc gia, trật tự an to&agrave;n x&atilde; hội.</li>\r\n	<li>Kh&ocirc;ng được đặt t&ecirc;n t&agrave;i khoản, nh&acirc;n vật tr&ugrave;ng hoặc tương tự g&acirc;y nhầm lẫn với t&ecirc;n viết tắt, t&ecirc;n đầy đủ của cơ quan nh&agrave; nước, tổ chức ch&iacute;nh trị, tổ chức ch&iacute;nh trị - x&atilde; hội, tổ chức ch&iacute;nh trị x&atilde; hội - nghề nghiệp, tổ chức x&atilde; hội, tổ chức x&atilde; hội - nghề nghiệp của Việt Nam v&agrave; tổ chức quốc tế, nếu kh&ocirc;ng được cơ quan, tổ chức đ&oacute; cho ph&eacute;p.</li>\r\n	<li>Kh&ocirc;ng được đặt t&ecirc;n t&agrave;i khoản, nh&acirc;n vật tr&ugrave;ng hoặc g&acirc;y nhầm lẫn để giả mạo c&aacute;c c&aacute; nh&acirc;n, tổ chức kh&aacute;c nhằm mục đ&iacute;ch đưa th&ocirc;ng tin sai sự thật, xuy&ecirc;n tạc, vu khống, x&uacute;c phạm uy t&iacute;n của tổ chức, danh dự v&agrave; nh&acirc;n phẩm của c&aacute; nh&acirc;n kh&aacute;c.</li>\r\n	<li>Kh&ocirc;ng được đặt t&ecirc;n t&agrave;i khoản, nh&acirc;n vật vi phạm c&aacute;c quyền sở hữu tr&iacute; tuệ.</li>\r\n	<li>Kh&ocirc;ng được đặt t&ecirc;n c&oacute; chứa c&aacute;c từ/cụm từ g&acirc;y nhầm lẫn với c&aacute;c nền tảng trong hệ sinh th&aacute;i của GAPO thuộc quyền quản l&yacute; của GAPO khi chưa c&oacute; sự đồng &yacute; bằng văn bản của GAPO.</li>\r\n	<li>T&agrave;i khoản vi phạm quy định về đặt t&ecirc;n sẽ bị kho&aacute; v&agrave;/hoặc x&oacute;a vĩnh viễn m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 3. QUY ĐỊNH VỀ H&Igrave;NH ĐẠI DIỆN</h3>\r\n\r\n<ol>\r\n	<li>Kh&ocirc;ng sử dụng h&igrave;nh ảnh c&oacute; h&agrave;m &yacute; k&iacute;ch động bạo lực, d&acirc;m &ocirc;, đồi trụy, tội &aacute;c, tệ nạn x&atilde; hội, m&ecirc; t&iacute;n dị đoan, ph&aacute; hoại thuần phong, mỹ tục của d&acirc;n tộc.</li>\r\n	<li>Kh&ocirc;ng sử dụng h&igrave;nh ảnh hoặc h&igrave;nh ảnh m&ocirc; tả c&oacute; t&iacute;nh x&uacute;c phạm c&aacute;c danh nh&acirc;n, anh h&ugrave;ng d&acirc;n tộc, l&atilde;nh đạo Đảng v&agrave; Nh&agrave; nước của Việt Nam v&agrave; l&atilde;nh đạo của c&aacute;c cơ quan tổ chức quốc tế.</li>\r\n	<li>Kh&ocirc;ng sử dụng h&igrave;nh ảnh c&oacute; chứa dấu hiệu tr&ugrave;ng hoặc tương tự đến mức g&acirc;y nhầm lẫn với biểu tượng, cờ, huy hiệu, t&ecirc;n viết tắt, t&ecirc;n đầy đủ của cơ quan nh&agrave; nước, tổ chức ch&iacute;nh trị, tổ chức ch&iacute;nh trị - x&atilde; hội, tổ chức ch&iacute;nh trị x&atilde; hội - nghề nghiệp, tổ chức x&atilde; hội, tổ chức x&atilde; hội - nghề nghiệp của Việt Nam v&agrave; tổ chức quốc tế m&agrave; x&uacute;c phạm đến uy t&iacute;n của c&aacute;c tổ chức n&agrave;y.</li>\r\n	<li>Kh&ocirc;ng sử dụng c&aacute;c h&igrave;nh ảnh li&ecirc;n quan tới t&ocirc;n gi&aacute;o m&agrave; g&acirc;y k&iacute;ch động, chia rẽ khối đại đo&agrave;n kết d&acirc;n tộc, đi ngược lại ch&iacute;nh s&aacute;ch t&ocirc;n gi&aacute;o của Việt Nam.</li>\r\n	<li>Kh&ocirc;ng sử dụng ảnh của tội phạm, khủng bố, ph&aacute;t x&iacute;t, v&agrave; ảnh hoặc h&igrave;nh ảnh m&ocirc; tả c&aacute;c c&aacute; nh&acirc;n, tổ chức chống lại Nh&agrave; nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam, g&acirc;y phương hại đến an ninh quốc gia, trật tự an to&agrave;n x&atilde; hội.</li>\r\n	<li>Kh&ocirc;ng sử dụng ảnh x&uacute;c phạm uy t&iacute;n của tổ chức, danh dự v&agrave; nh&acirc;n phẩm của c&aacute; nh&acirc;n kh&aacute;c.</li>\r\n	<li>Kh&ocirc;ng sử dụng h&igrave;nh ảnh c&oacute; chứa c&aacute;c từ/cụm từ, logo, dấu hiệu tr&ugrave;ng hoặc tương tự g&acirc;y nhầm lẫn với c&aacute;c nền tảng trong hệ sinh th&aacute;i GAPO thuộc quyền quản l&yacute; của GAPO khi chưa c&oacute; sự đồng &yacute; bằng văn bản của GAPO.</li>\r\n	<li>Kh&ocirc;ng sử dụng h&igrave;nh ảnh vi phạm c&aacute;c quyền sở hữu tr&iacute; tuệ.</li>\r\n	<li>T&agrave;i khoản vi phạm quy định về h&igrave;nh đại diện sẽ bị kho&aacute; v&agrave;/hoặc x&oacute;a vĩnh viễn m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 4. C&Aacute;C TH&Ocirc;NG TIN CẤM CHIA SẺ, TRAO ĐỔI, CHIA SẺ TR&Ecirc;N MẠNG X&Atilde; HỘI GAPO</h3>\r\n\r\n<ol>\r\n	<li>Th&ocirc;ng tin chống lại Nh&agrave; nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam; g&acirc;y phương hại đến an ninh quốc gia, trật tự an to&agrave;n x&atilde; hội; tổ chức, hoạt động, c&acirc;u kết, x&uacute;i giục, mua chuộc, lừa gạt, l&ocirc;i k&eacute;o, đ&agrave;o tạo, huấn luyện người chống Nh&agrave; nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam.</li>\r\n	<li>Tuy&ecirc;n truyền chiến tranh, khủng bố.</li>\r\n	<li>X&uacute;i giục, l&ocirc;i k&eacute;o, k&iacute;ch động người kh&aacute;c phạm tội.</li>\r\n	<li>Xuy&ecirc;n tạc lịch sử, phủ nhận th&agrave;nh tựu c&aacute;ch mạng, ph&aacute; hoại khối đại đo&agrave;n kết to&agrave;n d&acirc;n tộc, x&uacute;c phạm t&ocirc;n gi&aacute;o, ph&acirc;n biệt đối xử về giới, ph&acirc;n biệt chủng tộc, t&ocirc;n gi&aacute;o; g&acirc;y hận th&ugrave;, m&acirc;u thuẫn giữa c&aacute;c d&acirc;n tộc, sắc tộc, t&ocirc;n gi&aacute;o.</li>\r\n	<li>Th&ocirc;ng tin k&iacute;ch động bạo lực, d&acirc;m &ocirc;, đồi trụy, tội &aacute;c, tệ nạn x&atilde; hội, m&ecirc; t&iacute;n dị đoan, ph&aacute; hoại thuần phong, mỹ tục của d&acirc;n tộc.</li>\r\n	<li>Tiết lộ b&iacute; mật nh&agrave; nước, b&iacute; mật qu&acirc;n sự, an ninh, kinh tế, đối ngoại v&agrave; những b&iacute; mật kh&aacute;c do ph&aacute;p luật Việt Nam quy định.</li>\r\n	<li>Th&ocirc;ng tin xuy&ecirc;n tạc, vu khống, x&uacute;c phạm uy t&iacute;n của tổ chức, danh dự v&agrave; nh&acirc;n phẩm của c&aacute; nh&acirc;n.</li>\r\n	<li>Quảng c&aacute;o, tuy&ecirc;n truyền, mua b&aacute;n h&agrave;ng h&oacute;a, dịch vụ bị cấm; truyền b&aacute; t&aacute;c phẩm b&aacute;o ch&iacute;, văn học, nghệ thuật, xuất bản phẩm bị cấm.</li>\r\n	<li>Giả mạo tổ chức, c&aacute; nh&acirc;n v&agrave; ph&aacute;t t&aacute;n th&ocirc;ng tin giả mạo, th&ocirc;ng tin sai sự thật x&acirc;m hại đến quyền v&agrave; lợi &iacute;ch hợp ph&aacute;p của tổ chức, c&aacute; nh&acirc;n.</li>\r\n	<li>Th&ocirc;ng tin vi phạm quyền sở hữu tr&iacute; tuệ.</li>\r\n	<li>C&aacute;c Th&ocirc;ng tin kh&aacute;c vi phạm tới quyền v&agrave; lợi &iacute;ch hợp ph&aacute;p của c&aacute; nh&acirc;n, tổ chức.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 5. C&Aacute;C H&Agrave;NH VI BỊ CẤM KH&Aacute;C</h3>\r\n\r\n<ol>\r\n	<li>Cản trở tr&aacute;i ph&eacute;p hoạt động của hệ thống m&aacute;y chủ t&ecirc;n miền quốc gia Việt Nam &quot;.vn&quot;, hoạt động hợp ph&aacute;p của hệ thống thiết bị cung cấp dịch vụ Internet v&agrave; th&ocirc;ng tin tr&ecirc;n mạng.</li>\r\n	<li>Cản trở tr&aacute;i ph&eacute;p việc cung cấp v&agrave; truy cập th&ocirc;ng tin hợp ph&aacute;p, việc cung cấp v&agrave; sử dụng c&aacute;c dịch vụ hợp ph&aacute;p tr&ecirc;n Internet của tổ chức, c&aacute; nh&acirc;n.</li>\r\n	<li>Sử dụng tr&aacute;i ph&eacute;p mật khẩu, kho&aacute; mật m&atilde; của c&aacute;c tổ chức, c&aacute; nh&acirc;n; th&ocirc;ng tin ri&ecirc;ng, th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; t&agrave;i nguy&ecirc;n Internet.</li>\r\n	<li>Tạo đường dẫn tr&aacute;i ph&eacute;p đối với t&ecirc;n miền hợp ph&aacute;p của tổ chức, c&aacute; nh&acirc;n. Tạo, c&agrave;i đặt, ph&aacute;t t&aacute;n c&aacute;c phần mềm độc hại, vi r&uacute;t m&aacute;y t&iacute;nh; x&acirc;m nhập tr&aacute;i ph&eacute;p, chiếm quyền điều khiển hệ thống th&ocirc;ng tin, tạo lập c&ocirc;ng cụ tấn c&ocirc;ng tr&ecirc;n Internet.</li>\r\n	<li>Sử dụng bất kỳ chương tr&igrave;nh, c&ocirc;ng cụ hay h&igrave;nh thức n&agrave;o kh&aacute;c để can thiệp v&agrave;o dịch vụ của GAPO.</li>\r\n	<li>Ph&aacute;t t&aacute;n, truyền b&aacute; hay cổ vũ cho bất kỳ hoạt động n&agrave;o nhằm can thiệp, ph&aacute; hoại hay x&acirc;m nhập v&agrave;o dữ liệu của dịch vụ cung cấp hoặc hệ thống m&aacute;y chủ.</li>\r\n	<li>Đăng nhập tr&aacute;i ph&eacute;p hoặc t&igrave;m c&aacute;ch đăng nhập tr&aacute;i ph&eacute;p hoặc g&acirc;y thiệt hại cho hệ thống m&aacute;y chủ.</li>\r\n	<li>Quấy rối, chửi bới, l&agrave;m phiền hay c&oacute; bất kỳ h&agrave;nh vi thiếu văn ho&aacute; n&agrave;o đối với người sử dụng kh&aacute;c.</li>\r\n	<li>H&agrave;nh vi, th&aacute;i độ l&agrave;m tổn hại đến uy t&iacute;n của GAPO v&agrave;/hoặc c&aacute;c dịch vụ của GAPO dưới bất kỳ h&igrave;nh thức hoặc phương thức n&agrave;o.</li>\r\n	<li>Quảng b&aacute; bất kỳ sản phẩm/dịch vụ dưới bất kỳ h&igrave;nh thức n&agrave;o m&agrave; kh&ocirc;ng tu&acirc;n thủ theo thỏa thuận cung cấp v&agrave; sử dụng dịch vụ v&agrave; ch&iacute;nh s&aacute;ch quảng c&aacute;o của GAPO.</li>\r\n	<li>Đ&aacute;nh bạc v&agrave; tổ chức đ&aacute;nh bạc tr&ecirc;n Mạng x&atilde; hội GAPO.</li>\r\n	<li>C&aacute;c h&agrave;nh vi cấm kh&aacute;c theo quy định của ph&aacute;p luật Việt Nam trong từng lĩnh vực.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 6. QUYỀN CỦA NGƯỜI SỬ DỤNG MẠNG X&Atilde; HỘI GAPO</h3>\r\n\r\n<ol>\r\n	<li>Bạn được quyền thay đổi, bổ sung th&ocirc;ng tin c&aacute; nh&acirc;n, mật khẩu đ&atilde; đăng k&yacute;.</li>\r\n	<li>Bạn được hướng dẫn c&aacute;ch đặt mật khẩu an to&agrave;n; nhập c&aacute;c th&ocirc;ng tin quan trọng để bảo vệ t&agrave;i khoản; sử dụng t&agrave;i khoản li&ecirc;n kết để đăng nhập t&agrave;i khoản.</li>\r\n	<li>Bạn được quyền tặng cho t&agrave;i khoản Mạng x&atilde; hội GAPO của m&igrave;nh cho người kh&aacute;c. Quyền được tặng cho t&agrave;i khoản chỉ được &aacute;p dụng đối với t&agrave;i khoản đ&atilde; đăng k&yacute; đầy đủ v&agrave; ch&iacute;nh x&aacute;c c&aacute;c th&ocirc;ng tin t&agrave;i khoản theo quy định Thỏa thuận n&agrave;y.</li>\r\n	<li>Được bảo đảm b&iacute; mật th&ocirc;ng tin c&aacute; nh&acirc;n theo quy định của Thỏa thuận n&agrave;y v&agrave; Ch&iacute;nh s&aacute;ch Bảo mật Th&ocirc;ng tin c&aacute; nh&acirc;n tr&ecirc;n Mạng x&atilde; hội GAPO. Theo đ&oacute;, những th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; bạn cung cấp sẽ chỉ được GAPO sử dụng để kiểm so&aacute;t c&aacute;c hoạt động tr&ecirc;n Mạng x&atilde; hội GAPO v&agrave; sẽ kh&ocirc;ng được cung cấp cho bất kỳ b&ecirc;n thứ ba n&agrave;o kh&aacute;c khi chưa c&oacute; sự đồng &yacute; của bạn, trừ trường hợp c&oacute; sự y&ecirc;u cầu từ cơ quan Nh&agrave; nước c&oacute; thẩm quyền theo đ&uacute;ng quy định của ph&aacute;p luật Việt Nam.</li>\r\n	<li>Được quyền y&ecirc;u cầu GAPO cung cấp th&ocirc;ng tin cần thiết li&ecirc;n quan đến việc sử dụng Dịch vụ.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 7. NGHĨA VỤ CỦA NGƯỜI SỬ DỤNG MẠNG X&Atilde; HỘI GAPO</h3>\r\n\r\n<ol>\r\n	<li>Để nhận được sự hỗ trợ từ GAPO, t&agrave;i khoản của bạn phải đăng k&yacute; đầy đủ c&aacute;c th&ocirc;ng tin trung thực, ch&iacute;nh x&aacute;c.</li>\r\n	<li>Bạn c&oacute; tr&aacute;ch nhiệm tự bảo mật th&ocirc;ng tin t&agrave;i khoản của bạn tr&ecirc;n Mạng x&atilde; hội GAPO bao gồm: Mật khẩu, số điện thoại bảo vệ t&agrave;i khoản, th&ocirc;ng tin Giấy tờ t&ugrave;y th&acirc;n, email bảo vệ t&agrave;i khoản. Nếu những th&ocirc;ng tin tr&ecirc;n bị tiết lộ do sự bất cẩn hay bất kỳ lỗi bảo mật n&agrave;o kh&aacute;c của ch&iacute;nh c&aacute; nh&acirc;n bạn, th&igrave; bạn phải chấp nhận những rủi ro ph&aacute;t sinh. Ch&uacute;ng t&ocirc;i sẽ căn cứ v&agrave;o những th&ocirc;ng tin hiện c&oacute; trong t&agrave;i khoản để l&agrave;m căn cứ quyết định chủ sở hữu t&agrave;i khoản nếu c&oacute; tranh chấp v&agrave; ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm về mọi tổn thất ph&aacute;t sinh. Th&ocirc;ng tin Giấy tờ t&ugrave;y th&acirc;n đăng k&yacute; trong t&agrave;i khoản l&agrave; th&ocirc;ng tin quan trọng nhất để chứng minh chủ sở hữu t&agrave;i khoản.</li>\r\n	<li>Bạn đồng &yacute; sẽ th&ocirc;ng b&aacute;o ngay cho GAPO về bất kỳ trường hợp n&agrave;o sử dụng tr&aacute;i ph&eacute;p t&agrave;i khoản v&agrave; mật khẩu của bạn hoặc bất kỳ c&aacute;c h&agrave;nh động ph&aacute; vỡ hệ thống bảo mật n&agrave;o bằng c&aacute;ch gửi y&ecirc;u cầu hỗ trợ tại địa chỉ&nbsp;<a href=\"https://hotro.gapo.vn/\">https://hotro.gapo.vn/</a>.</li>\r\n	<li>Ch&uacute;ng t&ocirc;i quan t&acirc;m tới sự an to&agrave;n v&agrave; ri&ecirc;ng tư của tất cả th&agrave;nh vi&ecirc;n đăng k&yacute; t&agrave;i khoản v&agrave; sử dụng Dịch vụ tr&ecirc;n Mạng x&atilde; hội GAPO, đặc biệt l&agrave; người chưa th&agrave;nh ni&ecirc;n v&agrave; người được gi&aacute;m hộ. V&igrave; vậy, nếu bạn l&agrave; cha mẹ hoặc người gi&aacute;m hộ hợp ph&aacute;p, bạn c&oacute; tr&aacute;ch nhiệm x&aacute;c định xem Th&ocirc;ng tin n&agrave;o tr&ecirc;n Mạng x&atilde; hội GAPO th&iacute;ch hợp cho con của bạn hoặc người được bạn gi&aacute;m hộ. Tương tự, nếu bạn l&agrave; người chưa th&agrave;nh ni&ecirc;n hoặc người được gi&aacute;m hộ th&igrave; phải hỏi &yacute; kiến cha mẹ hoặc người gi&aacute;m hộ hợp ph&aacute;p của bạn để x&aacute;c định xem liệu rằng Th&ocirc;ng tin m&agrave; bạn sử dụng/truy cập tr&ecirc;n Mạng x&atilde; hội GAPO c&oacute; ph&ugrave; hợp với bạn hay kh&ocirc;ng.</li>\r\n	<li>Bạn phải chịu ho&agrave;n to&agrave;n tr&aacute;ch nhiệm trước ph&aacute;p luật Việt Nam về Th&ocirc;ng tin do bạn chia sẻ, truyền, đưa, lưu trữ tr&ecirc;n Mạng x&atilde; hội GAPO, mạng Internet, mạng viễn th&ocirc;ng.</li>\r\n	<li>Bạn phải bồi thường to&agrave;n bộ thiệt hại cho GAPO trong trường hợp bạn c&oacute; h&agrave;nh vi vi phạm bất kỳ quy định n&agrave;o tại Thỏa thuận n&agrave;y v&agrave;/hoặc h&agrave;nh vi vi phạm ph&aacute;p luật dẫn đến tổn thất, thiệt hại về t&agrave;i sản v&agrave; uy t&iacute;n của GAPO.</li>\r\n	<li>Tu&acirc;n thủ c&aacute;c quy định về bảo đảm an to&agrave;n th&ocirc;ng tin, an ninh th&ocirc;ng tin v&agrave; c&aacute;c quy định kh&aacute;c c&oacute; li&ecirc;n quan theo quy định của ph&aacute;p luật Việt Nam v&agrave; Thỏa thuận n&agrave;y.</li>\r\n	<li>Tu&acirc;n thủ c&aacute;c tr&aacute;ch nhiệm, nghĩa vụ kh&aacute;c của người sử dụng mạng x&atilde; hội, Internet, mạng viễn th&ocirc;ng theo quy định của ph&aacute;p luật Việt Nam.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 8. QUYỀN CỦA GAPO</h3>\r\n\r\n<ol>\r\n	<li>Nếu bạn cung cấp bất kỳ th&ocirc;ng tin n&agrave;o kh&ocirc;ng trung thực, kh&ocirc;ng ch&iacute;nh x&aacute;c, hoặc nếu GAPO c&oacute; cơ sở để nghi ngờ rằng th&ocirc;ng tin đ&oacute; kh&ocirc;ng ch&iacute;nh x&aacute;c hoặc nếu bạn vi phạm bất cứ điều khoản n&agrave;o trong Thỏa thuận n&agrave;y, GAPO c&oacute; to&agrave;n quyền chấm dứt, x&oacute;a bỏ t&agrave;i khoản của bạn m&agrave; kh&ocirc;ng cần sự đồng &yacute; của bạn v&agrave; kh&ocirc;ng phải chịu bất cứ tr&aacute;ch nhiệm n&agrave;o đối với bạn. Đồng thời, GAPO c&oacute; quyền từ chối hỗ trợ v&agrave; giải quyết c&aacute;c y&ecirc;u cầu đối với t&agrave;i khoản của bạn.</li>\r\n	<li>Nếu bạn c&oacute; những b&igrave;nh luận, b&agrave;i đăng v&ocirc; nghĩa v&agrave;/hoặc b&igrave;nh luận, b&agrave;i đăng li&ecirc;n tục g&acirc;y phiền to&aacute;i tới người sử dụng kh&aacute;c th&igrave; GAPO c&oacute; quyền tắt t&iacute;nh năng b&igrave;nh luận v&agrave;/hoặc đăng tải của bạn trong 01(một) ng&agrave;y, 03(ba) ng&agrave;y, hoặc l&acirc;u hơn, t&ugrave;y thuộc v&agrave;o mức độ vi phạm. Trong trường hợp bạn vi phạm nhiều lần, GAPO sẽ kh&oacute;a t&agrave;i khoản của bạn &iacute;t nhất 30 (ba mươi) ng&agrave;y, hoặc hơn tuỳ thuộc v&agrave;o t&iacute;nh chất v&agrave; mức độ vi phạm</li>\r\n	<li>Khi GAPO ph&aacute;t hiện những vi phạm của bạn trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ như truy cập tr&aacute;i ph&eacute;p, chia sẻ, truyền đưa c&aacute;c Th&ocirc;ng tin bị cấm theo Thỏa thuận n&agrave;y v&agrave;/hoặc theo quy định của ph&aacute;p luật Việt Nam, hoặc những lỗi kh&aacute;c g&acirc;y ảnh hưởng tới quyền v&agrave; lợi &iacute;ch hợp ph&aacute;p của GAPO v&agrave;/hoặc c&aacute; nh&acirc;n, tổ chức c&oacute; li&ecirc;n quan, GAPO c&oacute; quyền: (i) tước bỏ mọi quyền lợi của bạn trong Thỏa thuận n&agrave;y, bao gồm chấm dứt, x&oacute;a bỏ t&agrave;i khoản của bạn m&agrave; kh&ocirc;ng cần sự đồng &yacute; của bạn v&agrave; kh&ocirc;ng phải chịu bất cứ tr&aacute;ch nhiệm n&agrave;o với bạn; v&agrave;/hoặc (ii) sử dụng những th&ocirc;ng tin m&agrave; bạn cung cấp khi đăng k&yacute; t&agrave;i khoản để chuyển cho Cơ quan chức năng giải quyết c&aacute;c vi phạm n&agrave;y theo quy định của ph&aacute;p luật Việt Nam.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 9. TR&Aacute;CH NHIỆM CỦA GAPO</h3>\r\n\r\n<ol>\r\n	<li>C&oacute; tr&aacute;ch nhiệm hỗ trợ bạn trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ.</li>\r\n	<li>Nhận v&agrave; giải quyết c&aacute;c khiếu nại, tranh chấp của bạn ph&aacute;t sinh trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ trong thẩm quyền của GAPO theo quy định của ph&aacute;p luật Việt Nam. Tuy nhi&ecirc;n ch&uacute;ng t&ocirc;i chỉ hỗ trợ, nhận v&agrave; giải quyết c&aacute;c khiếu nại, tranh chấp đối với t&agrave;i khoản đăng k&yacute; đầy đủ th&ocirc;ng tin, trung thực v&agrave; ch&iacute;nh x&aacute;c.</li>\r\n	<li>C&oacute; tr&aacute;ch nhiệm bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n của bạn theo quy định của Thỏa thuận n&agrave;y, Ch&iacute;nh s&aacute;ch Bảo mật Th&ocirc;ng tin c&aacute; nh&acirc;n tr&ecirc;n Mạng x&atilde; hội GAPO v&agrave; quy định của ph&aacute;p luật Việt Nam. Ch&uacute;ng t&ocirc;i kh&ocirc;ng b&aacute;n hoặc trao đổi những th&ocirc;ng tin c&aacute; nh&acirc;n của bạn với b&ecirc;n thứ ba, trừ trường hợp theo y&ecirc;u cầu của cơ quan Nh&agrave; nước c&oacute; thẩm quyền theo quy định của ph&aacute;p luật Việt Nam v&agrave;/hoặc c&aacute;c trường hợp theo quy định tại Thỏa thuận n&agrave;y.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 10. CƠ CHẾ XỬ L&Yacute; VI PHẠM</h3>\r\n\r\n<ol>\r\n	<li>Nếu bạn vi phạm Thỏa thuận n&agrave;y, t&ugrave;y thuộc v&agrave;o mức độ vi phạm, ch&uacute;ng t&ocirc;i sẽ kh&oacute;a t&agrave;i khoản của bạn tạm thời hoặc vĩnh viễn hoặc x&oacute;a t&agrave;i khoản vĩnh viễn, tước bỏ mọi quyền lợi của bạn đối c&aacute;c Dịch vụ v&agrave; sẽ y&ecirc;u cầu cơ quan chức năng xử l&yacute; h&agrave;nh vi vi phạm theo quy định của ph&aacute;p luật Việt Nam.</li>\r\n	<li>Trường hợp h&agrave;nh vi vi phạm của bạn chưa được quy định trong Thỏa thuận n&agrave;y th&igrave; t&ugrave;y v&agrave;o t&iacute;nh chất, mức độ của h&agrave;nh vi vi phạm, GAPO sẽ đơn phương, to&agrave;n quyền quyết định mức xử phạt m&agrave; GAPO cho l&agrave; hợp l&yacute;.</li>\r\n	<li>Nếu c&oacute; khiếu nại về Th&ocirc;ng tin bị xem l&agrave; vi phạm v&agrave;/hoặc bất kỳ vấn đề n&agrave;o kh&aacute;c li&ecirc;n quan đến cơ chế xử l&yacute; vi phạm quy định tại Thỏa thuận n&agrave;y, vui l&ograve;ng gửi y&ecirc;u cầu hỗ trợ tại địa chỉ&nbsp;<a href=\"https://hotro.gapo.vn/\">https://hotro.gapo.vn/</a></li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 11. CẢNH B&Aacute;O VỀ RỦI RO KHI LƯU TRỮ, TRAO ĐỔI V&Agrave; CHIA SẺ TH&Ocirc;NG TIN TR&Ecirc;N MẠNG</h3>\r\n\r\n<ol>\r\n	<li>Khi bạn đăng k&yacute;, sử dụng t&iacute;nh năng đăng nhập li&ecirc;n quan đến c&aacute;c nền tảng v&agrave; ứng dụng của b&ecirc;n thứ ba, điều đ&oacute; đồng nghĩa với việc c&aacute;c th&ocirc;ng tin của bạn sẽ được chia sẻ cho b&ecirc;n thứ ba, dựa tr&ecirc;n sự chấp thuận của bạn. Bằng việc chấp nhận sự chia sẻ n&agrave;y, bạn cũng sẽ chấp nhận những rủi ro k&egrave;m theo. Trong trường hợp n&agrave;y, bạn đồng &yacute; v&agrave; chấp nhận loại trừ tr&aacute;ch nhiệm của GAPO li&ecirc;n quan tới việc th&ocirc;ng tin, dữ liệu của bạn bị chia sẻ cho b&ecirc;n thứ ba.</li>\r\n	<li>Nếu ph&aacute;t sinh rủi ro, thiệt hại trong trường hợp bất khả kh&aacute;ng bao gồm nhưng kh&ocirc;ng giới hạn như chập điện, hư hỏng phần cứng, phần mềm, sự cố đường truyền Internet hoặc do thi&ecirc;n tai, hỏa hoạn, đ&igrave;nh c&ocirc;ng, sự thay đổi của luật ph&aacute;p, người sử dụng phải chấp nhận những rủi ro, thiệt hại đ&oacute;. GAPO cam kết sẽ nỗ lực giảm thiểu những rủi ro, thiệt hại ph&aacute;t sinh tuy nhi&ecirc;n ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu bất cứ tr&aacute;ch nhiệm n&agrave;o ph&aacute;t sinh trong c&aacute;c trường hợp n&agrave;y.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 12. LUẬT &Aacute;P DỤNG V&Agrave; CƠ QUAN GIẢI QUYẾT TRANH CHẤP</h3>\r\n\r\n<p>Thỏa thuận n&agrave;y được điều chỉnh bởi ph&aacute;p luật Việt Nam. Bất kỳ tranh chấp n&agrave;o ph&aacute;t sinh trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ của bạn sẽ được giải quyết tại t&ograve;a &aacute;n c&oacute; thẩm quyền của Việt Nam, theo ph&aacute;p luật hiện h&agrave;nh của Việt Nam.</p>\r\n\r\n<h3>ĐIỀU 13. THỜI HẠN GIẢI QUYẾT KHIẾU NẠI, TRANH CHẤP</h3>\r\n\r\n<p>Bất kỳ khiếu nại, tranh chấp n&agrave;o ph&aacute;t sinh từ Thỏa thuận n&agrave;y,&nbsp;thuộc thẩm quyền giải quyết của GAPO, phải được gửi tới GAPO trong v&ograve;ng 01 (một) th&aacute;ng kể từ ng&agrave;y xảy ra h&agrave;nh vi dẫn đến khiếu nại, tranh chấp đ&oacute;.</p>\r\n\r\n<h3>ĐIỀU 14. ĐIỀU KIỆN V&Agrave; PHƯƠNG THỨC GIẢI QUYẾT KHIẾU NẠI, TRANH CHẤP</h3>\r\n\r\n<ol>\r\n	<li>Ch&uacute;ng t&ocirc;i chỉ hỗ trợ, giải quyết khiếu nại, tranh chấp của bạn trong thẩm quyền của GAPO theo quy định của ph&aacute;p luật Việt Nam, với điều kiện bạn đ&atilde; ghi đầy đủ, trung thực v&agrave; ch&iacute;nh x&aacute;c th&ocirc;ng tin khi đăng k&yacute; t&agrave;i khoản.</li>\r\n	<li>Đối với tranh chấp giữa người sử dụng với nhau hoặc giữa người sử dụng với GAPO, ch&uacute;ng t&ocirc;i sẽ căn cứ ghi ch&eacute;p của hệ thống để giải quyết. Theo đ&oacute;, ch&uacute;ng t&ocirc;i sẽ bảo vệ quyền lợi tối đa cho người sử dụng đăng k&yacute; đầy đủ th&ocirc;ng tin theo quy định.</li>\r\n	<li>Khi c&oacute; khiếu nại, tranh chấp giữa bạn v&agrave; người sử dụng kh&aacute;c tr&ecirc;n Mạng x&atilde; hội GAPO hoặc giữa bạn với GAPO, bạn c&oacute; thể gửi y&ecirc;u cầu giải quyết khiếu nại, tranh chấp tới GAPO tại địa chỉ&nbsp;<a href=\"https://hotro.gapo.vn/\">https://hotro.gapo.vn</a></li>\r\n	<li>Trừ trường hợp ph&aacute;p luật Việt Nam c&oacute; quy định kh&aacute;c, quyết định giải quyết khiếu nại, tranh chấp của GAPO l&agrave; quyết định cuối c&ugrave;ng v&agrave; c&oacute; hiệu lực.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 15. LOẠI TRỪ NGHĨA VỤ V&Agrave; BỒI THƯỜNG</h3>\r\n\r\n<ol>\r\n	<li>Bạn đồng &yacute; loại trừ GAPO khỏi tất cả c&aacute;c tr&aacute;ch nhiệm, nghĩa vụ ph&aacute;p l&yacute;, tố tụng ph&aacute;t sinh từ sự vi phạm của bạn trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ.</li>\r\n	<li>Bạn phải bồi thường to&agrave;n bộ thiệt hại cho GAPO, trong trường hợp bạn c&oacute; h&agrave;nh vi vi phạm Thỏa thuận n&agrave;y v&agrave;/hoặc h&agrave;nh vi vi phạm ph&aacute;p luật dẫn đến tổn thất, thiệt hại về t&agrave;i sản v&agrave; uy t&iacute;n của GAPO, bao gồm cả chi ph&iacute; li&ecirc;n quan đến việc giải quyết như &aacute;n ph&iacute;, ph&iacute; luật sư, ph&iacute; thu&ecirc; chuy&ecirc;n gia tư vấn v&agrave; c&aacute;c chi ph&iacute; kh&aacute;c c&oacute; li&ecirc;n quan đến việc giải quyết vụ việc.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 16. THU THẬP, XỬ L&Yacute; DỮ LIỆU C&Aacute; NH&Acirc;N</h3>\r\n\r\n<ol>\r\n	<li>Quy tr&igrave;nh đăng k&yacute; t&agrave;i khoản sử dụng Mạng x&atilde; hội GAPO y&ecirc;u cầu bạn cung cấp c&aacute;c th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; mật khẩu. Việc cung cấp những th&ocirc;ng tin kh&aacute;c cho ch&uacute;ng t&ocirc;i hay kh&ocirc;ng t&ugrave;y thuộc v&agrave;o quyết định của bạn.</li>\r\n	<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng sử dụng th&ocirc;ng tin của bạn v&agrave;o mục đ&iacute;ch bất hợp ph&aacute;p. Ch&uacute;ng t&ocirc;i được quyền cung cấp th&ocirc;ng tin của bạn cho b&ecirc;n thứ ba trong c&aacute;c trường hợp, bao gồm nhưng kh&ocirc;ng giới hạn:\r\n	<ul>\r\n		<li>Ch&uacute;ng t&ocirc;i được bạn chấp thuận;</li>\r\n		<li>Khi bạn đăng k&yacute;, sử dụng t&iacute;nh năng đăng nhập li&ecirc;n quan đến c&aacute;c nền tảng v&agrave; ứng dụng của b&ecirc;n thứ ba v&agrave; bạn đồng &yacute; để GAPO cung cấp th&ocirc;ng tin của bạn cho b&ecirc;n thứ ba đ&oacute;;</li>\r\n		<li>Theo y&ecirc;u cầu của cơ quan Nh&agrave; nước c&oacute; thẩm quyền;</li>\r\n	</ul>\r\n	</li>\r\n	<li>Trong qu&aacute; tr&igrave;nh sử dụng Dịch vụ, bạn đồng &yacute; nhận tất cả th&ocirc;ng b&aacute;o, quảng c&aacute;o từ GAPO li&ecirc;n quan tới Dịch vụ qua thư điện tử, thư bưu ch&iacute;nh hoặc điện thoại của bạn. Trong trường hợp bạn đăng k&yacute; sử dụng dịch vụ do b&ecirc;n thứ ba cung cấp th&igrave; những th&ocirc;ng tin của bạn sẽ được chia sẻ với b&ecirc;n thứ ba, dựa tr&ecirc;n sự chấp thuận của bạn. Bạn cũng đồng &yacute; nhận tất cả th&ocirc;ng b&aacute;o từ b&ecirc;n thứ ba li&ecirc;n quan tới dịch vụ qua thư điện tử, thư bưu ch&iacute;nh hoặc điện thoại của bạn.</li>\r\n	<li>Ch&uacute;ng t&ocirc;i c&oacute; thể d&ugrave;ng th&ocirc;ng tin của bạn để thực hiện c&aacute;c hoạt động nghi&ecirc;n cứu của GAPO để ph&aacute;t triển c&aacute;c dịch vụ nhằm phục vụ bạn tốt hơn.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 17. CH&Iacute;NH S&Aacute;CH BẢO MẬT TH&Ocirc;NG TIN C&Aacute; NH&Acirc;N TR&Ecirc;N MẠNG X&Atilde; HỘI GAPO</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng đ&aacute;p ứng c&aacute;c y&ecirc;u cầu của ph&aacute;p luật Việt Nam về bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n như được quy định trong Ch&iacute;nh s&aacute;ch Bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n tr&ecirc;n mạng x&atilde; hội GAPO nằm trong khả năng của ch&uacute;ng t&ocirc;i. Trong trường hợp bất khả kh&aacute;ng v&agrave;/hoặc c&oacute; sự t&aacute;c động từ c&aacute;c yếu tố nằm ngo&agrave;i khả năng kiểm so&aacute;t của ch&uacute;ng t&ocirc;i, ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm cho việc th&ocirc;ng tin c&aacute; nh&acirc;n của bạn bị tiết lộ.</p>\r\n\r\n<h3>ĐIỀU 18. QUYỀN SỞ HỮU TR&Iacute; TUỆ</h3>\r\n\r\n<ol>\r\n	<li>Ch&uacute;ng t&ocirc;i sở hữu quyền sở hữu tr&iacute; tuệ, bao gồm nhưng kh&ocirc;ng giới hạn c&aacute;c quyền t&aacute;c giả, quyền li&ecirc;n quan, nh&atilde;n hiệu, quyền chống cạnh tranh kh&ocirc;ng l&agrave;nh mạnh, b&iacute; mật kinh doanh, v&agrave; c&aacute;c quyền sở hữu tr&iacute; tuệ kh&aacute;c trong tất cả c&aacute;c dịch vụ của GAPO. Việc sử dụng bất kỳ đối tượng quyền sở hữu tr&iacute; tuệ n&agrave;o của GAPO cần phải được ch&uacute;ng t&ocirc;i cho ph&eacute;p trước bằng văn bản.</li>\r\n	<li>Ngo&agrave;i việc được cấp ph&eacute;p bằng văn bản, ch&uacute;ng t&ocirc;i kh&ocirc;ng cấp ph&eacute;p dưới bất kỳ h&igrave;nh thức n&agrave;o kh&aacute;c cho d&ugrave; đ&oacute; l&agrave; h&igrave;nh thức c&ocirc;ng bố hay h&agrave;m &yacute; để bạn thực hiện c&aacute;c quyền tr&ecirc;n. V&agrave; do vậy, bạn kh&ocirc;ng c&oacute; quyền sử dụng dịch vụ của GAPO v&agrave;o bất kỳ mục đ&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p bằng văn bản của ch&uacute;ng t&ocirc;i.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 19. BẢO LƯU QUYỀN XỬ L&Yacute; TH&Ocirc;NG TIN</h3>\r\n\r\n<ol>\r\n	<li>Tại c&aacute;c khu vực được ph&eacute;p chia sẻ Th&ocirc;ng tin, bạn c&oacute; thể chia sẻ Th&ocirc;ng tin được ph&eacute;p dưới c&aacute;c định dạng ch&uacute;ng t&ocirc;i mặc định v&agrave; bạn phải tự chịu tr&aacute;ch nhiệm đối với c&aacute;c Th&ocirc;ng tin chia sẻ, giao tiếp về t&iacute;nh hợp ph&aacute;p, cũng như c&aacute;c tr&aacute;ch nhiệm ph&aacute;p l&yacute; đối với Th&ocirc;ng tin chia sẻ của bạn với c&aacute; nh&acirc;n người sử dụng hoặc nh&oacute;m người sử dụng.</li>\r\n	<li>Ch&uacute;ng t&ocirc;i đ&oacute;ng vai tr&ograve; như người hướng dẫn thụ động cho sự tr&igrave;nh b&agrave;y v&agrave; c&ocirc;ng khai trực tuyến của Th&ocirc;ng tin do người sử dụng chia sẻ n&ecirc;n trong mọi trường hợp, ch&uacute;ng t&ocirc;i được bảo lưu quyền xử l&yacute; c&aacute;c Th&ocirc;ng tin chia sẻ cho ph&ugrave; hợp với Thỏa thuận n&agrave;y v&agrave; c&aacute;c quy định ph&aacute;p luật Việt Nam. Nếu những Th&ocirc;ng tin do người sử dụng chia sẻ kh&ocirc;ng ph&ugrave; hợp với những thỏa thuận v&agrave; điều kiện của Thỏa thuận n&agrave;y, ch&uacute;ng t&ocirc;i c&oacute; thể chỉnh sửa hoặc ngay lập tức loại bỏ (x&oacute;a) những Th&ocirc;ng tin đ&oacute; đồng thời b&aacute;o với cơ quan chức năng nếu cần thiết.</li>\r\n	<li>Việc xử l&yacute; Th&ocirc;ng tin chia sẻ của ch&uacute;ng t&ocirc;i tu&acirc;n thủ theo c&aacute;c quy tr&igrave;nh, ch&iacute;nh s&aacute;ch dựa tr&ecirc;n c&aacute;c quy định của ph&aacute;p luật Việt Nam để đảm bảo quyền v&agrave; lợi &iacute;ch của bạn cũng như c&aacute;c c&aacute; nh&acirc;n, tổ chức kh&aacute;c. Ch&uacute;ng t&ocirc;i c&oacute; nghĩa vụ v&agrave; chịu tr&aacute;ch nhiệm xử l&yacute; Th&ocirc;ng tin chia sẻ theo y&ecirc;u cầu của cơ quan nh&agrave; nước c&oacute; thẩm quyền v&agrave;/hoặc theo quy định của ph&aacute;p luật Việt Nam.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 20. SỬA ĐỔI, BỔ SUNG</h3>\r\n\r\n<p>C&aacute;c điều khoản tại Thỏa thuận n&agrave;y c&oacute; thể được ch&uacute;ng t&ocirc;i sửa đổi, bổ sung bất cứ l&uacute;c n&agrave;o m&agrave; kh&ocirc;ng cần phải th&ocirc;ng b&aacute;o trước tới bạn. Những Th&ocirc;ng tin sửa đổi, bổ sung sẽ được ch&uacute;ng t&ocirc;i c&ocirc;ng bố tr&ecirc;n Mạng x&atilde; hội GAPO.</p>\r\n\r\n<h3>ĐIỀU 21. HIỆU LỰC</h3>\r\n\r\n<ol>\r\n	<li>Thỏa thuận n&agrave;y c&oacute; gi&aacute; trị r&agrave;ng buộc với bạn kể từ thời điểm ho&agrave;n th&agrave;nh việc đăng k&yacute; t&agrave;i khoản Mạng x&atilde; hội GAPO.</li>\r\n	<li>Trong trường hợp một hoặc một số điều khoản Thỏa thuận n&agrave;y xung đột với c&aacute;c quy định của luật ph&aacute;p v&agrave; bị t&ograve;a &aacute;n c&oacute; thẩm quyền của Việt Nam tuy&ecirc;n l&agrave; v&ocirc; hiệu theo quy định của ph&aacute;p luật Việt Nam, điều khoản bị tuy&ecirc;n v&ocirc; hiệu đ&oacute; sẽ được chỉnh sửa cho ph&ugrave; hợp với quy định của ph&aacute;p luật Việt Nam, v&agrave; c&aacute;c điều khoản c&ograve;n lại của Thỏa thuận n&agrave;y vẫn c&oacute; hiệu lực.</li>\r\n</ol>\r\n\r\n<h3>ĐIỀU 22. THANH TO&Aacute;N</h3>\r\n\r\n<ol>\r\n	<li>Kh&aacute;i qu&aacute;t: Gapo c&oacute; thể cung cấp c&aacute;c sản phẩm v&agrave; dịch vụ để mua (&quot;mua trong ứng dụng&quot;) th&ocirc;ng qua Apple Pay, Google Play hoặc c&aacute;c nền tảng thanh to&aacute;n kh&aacute;c được Gapo ủy quyền. Khiếu nại về khoản thanh to&aacute;n đ&atilde; được thực hiện phải được chuyển đến bộ phận Hỗ trợ kh&aacute;ch h&agrave;ng nếu bạn được Gapo trực tiếp thanh to&aacute;n hoặc qua t&agrave;i khoản b&ecirc;n thứ ba c&oacute; li&ecirc;n quan. Bạn cũng c&oacute; thể khiếu nại bằng c&aacute;ch li&ecirc;n hệ với nh&agrave; cung cấp dịch vụ thanh to&aacute;n của m&igrave;nh, những người c&oacute; thể cung cấp th&ecirc;m th&ocirc;ng tin về c&aacute;c quyền của bạn cũng như giới hạn thời gian ph&ugrave; hợp</li>\r\n	<li>C&aacute;c vật phẩm ảo: bạn c&oacute; thể mua c&aacute;c vật phẩm ảo v&agrave; sử dụng trong một số chức năng tr&ecirc;n Gapo. Số lượng Vật phẩm ảo c&ograve;n lại được hiển thị trong t&agrave;i khoản của bạn kh&ocirc;ng thể chuyển th&agrave;nh số dư trong thế giới thực hoặc phản &aacute;nh bất kỳ gi&aacute; trị được lưu trữ n&agrave;o m&agrave; thay v&agrave;o đ&oacute; sẽ tạo th&agrave;nh chỉ số đo lường phạm vi giấy ph&eacute;p của bạn. C&aacute;c vật phẩm ảo kh&ocirc;ng ph&aacute;t sinh chi ph&iacute; khi kh&ocirc;ng được sử dụng, tuy nhi&ecirc;n, giấy ph&eacute;p được cấp cho bạn trong Vật phẩm ảo sẽ chấm dứt theo c&aacute;c điều khoản của Thỏa thuận n&agrave;y, khi Gapo ngừng cung cấp Dịch vụ hoặc t&agrave;i khoản của bạn bị đ&oacute;ng hoặc chấm dứt.<br />\r\n	Gapo c&oacute; quyền t&iacute;nh ph&iacute; quyền truy cập hoặc sử dụng Vật phẩm ảo v&agrave;/hoặc c&oacute; thể ph&acirc;n phối Vật phẩm ảo dưới h&igrave;nh thức c&oacute; hoặc kh&ocirc;ng t&iacute;nh ph&iacute;. Gapo c&oacute; thể quản l&yacute;, điều chỉnh, kiểm so&aacute;t, sửa đổi hoặc loại bỏ c&aacute;c Vật phẩm ảo bất cứ l&uacute;c n&agrave;o. Gapo sẽ kh&ocirc;ng c&oacute; tr&aacute;ch nhiệm với bạn hoặc bất kỳ b&ecirc;n thứ ba n&agrave;o trong trường hợp Gapo thực hiện c&aacute;c quyền n&ecirc;u tr&ecirc;n. C&aacute;c vật phẩm ảo chỉ c&oacute; thể được đổi th&ocirc;ng qua Dịch vụ. TẤT CẢ C&Aacute;C HOẠT ĐỘNG MUA V&Agrave; ĐỔI C&Aacute;C VẬT PHẨM ẢO ĐƯỢC THỰC HIỆN QUA DỊCH VỤ L&Agrave; QUYẾT ĐỊNH CUỐI C&Ugrave;NG V&Agrave; KH&Ocirc;NG ĐƯỢC HO&Agrave;N LẠI.<br />\r\n	Việc cung cấp c&aacute;c Vật phẩm ảo để sử dụng trong Dịch vụ l&agrave; một dịch vụ bắt đầu ngay khi c&oacute; sự chấp nhận mua c&aacute;c Vật phẩm ảo đ&oacute;. BẠN X&Aacute;C NHẬN RẰNG GAPO KH&Ocirc;NG PHẢI HO&Agrave;N LẠI TIỀN LI&Ecirc;N QUAN ĐẾN VẬT PHẨM ẢO V&Igrave; BẤT KỲ L&Yacute; DO G&Igrave; V&Agrave; BẠN SẼ KH&Ocirc;NG NHẬN ĐƯỢC TIỀN HOẶC BỒI THƯỜNG KH&Aacute;C CHO VẬT PHẨM ẢO KH&Ocirc;NG SỬ DỤNG KHI T&Agrave;I KHOẢN BỊ Đ&Oacute;NG, CHO D&Ugrave; VIỆC Đ&Oacute;NG Đ&Oacute; L&Agrave; TỰ NGUYỆN HAY KH&Ocirc;NG TỰ NGUYỆN.</li>\r\n	<li>Ho&agrave;n tiền: nh&igrave;n chung, tất cả chi ph&iacute; mua h&agrave;ng sẽ kh&ocirc;ng được ho&agrave;n lại.C&aacute;c khoản mua Vật phẩm ảo l&agrave; CUỐI C&Ugrave;NG V&Agrave; KH&Ocirc;NG ĐƯỢC HO&Agrave;N TRẢ.<br />\r\n	Tuy nhi&ecirc;n, bạn c&oacute; thể li&ecirc;n lạc với b&ecirc;n thứ ba để được tư vấn về việc ho&agrave;n tiền. Nếu bạn đ&atilde; đăng k&yacute; bằng ID Apple của m&igrave;nh, việc ho&agrave;n tiền sẽ được Apple xử l&yacute; chứ kh&ocirc;ng phải Gapo. Để y&ecirc;u cầu ho&agrave;n tiền, h&atilde;y truy cập iTunes, nhấn v&agrave;o ID Apple của bạn, chọn Lịch sử mua h&agrave;ng, t&igrave;m giao dịch v&agrave; nhấn &quot;B&aacute;o c&aacute;o sự cố&quot;. Bạn cũng c&oacute; thể gửi y&ecirc;u cầu tại https://getsupport.apple.com.<br />\r\n	Nếu bạn đ&atilde; đăng k&yacute; bằng t&agrave;i khoản Google Play Store : vui l&ograve;ng li&ecirc;n hệ bộ phận hỗ trợ kh&aacute;ch h&agrave;ng theo số đơn h&agrave;ng của bạn để Google Play Store (bạn c&oacute; thể t&igrave;m số đơn h&agrave;ng trong email x&aacute;c nhận đơn h&agrave;ng hoặc đăng nhập v&agrave;o Google Wallet) hoặc Gapo(bạn c&oacute; thể t&igrave;m thấy nội dung n&agrave;y trong email x&aacute;c nhận). Bạn cũng c&oacute; thể gửi thư hoặc cung cấp th&ocirc;ng b&aacute;o c&oacute; chữ k&yacute; v&agrave; cung cấp c&aacute;c th&ocirc;ng tin về ng&agrave;y mua, người mua, gi&aacute; trị đơn h&agrave;ng. Vui l&ograve;ng ghi r&otilde; địa chỉ email hoặc số điện thoại li&ecirc;n kết với t&agrave;i khoản Gapo của bạn.</li>\r\n</ol>', '2021-04-18 02:47:57', '2021-04-18 03:22:06'),
(2, 'Thông tin giao hàng', 2, '<p>...</p>\r\n\r\n<p>&nbsp;</p>', '2021-04-18 03:27:46', '2021-04-18 03:27:46'),
(3, 'Chính sách bảo mật', 3, '<p>Ch&uacute;ng t&ocirc;i muốn bạn hiểu r&otilde; c&aacute;c loại th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập khi bạn sử dụng dịch vụ của ch&uacute;ng t&ocirc;i</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i thu thập th&ocirc;ng tin để cung cấp c&aacute;c dịch vụ tốt hơn cho tất cả người d&ugrave;ng của m&igrave;nh &mdash; từ việc x&aacute;c định những th&ocirc;ng tin cơ bản như ng&ocirc;n ngữ m&agrave; bạn n&oacute;i cho đến những th&ocirc;ng tin phức tạp hơn như&nbsp;<a href=\"https://policies.google.com/privacy?hl=vi#footnote-useful-ads\">quảng c&aacute;o n&agrave;o bạn sẽ thấy hữu &iacute;ch nhất</a>,&nbsp;<a href=\"https://policies.google.com/privacy?hl=vi#footnote-people-online\">những người quan trọng nhất với bạn khi trực tuyến</a>&nbsp;hay những video n&agrave;o tr&ecirc;n YouTube m&agrave; bạn c&oacute; thể th&iacute;ch. Th&ocirc;ng tin Google thu thập v&agrave; c&aacute;ch th&ocirc;ng tin đ&oacute; được sử dụng t&ugrave;y thuộc v&agrave;o c&aacute;ch bạn d&ugrave;ng c&aacute;c dịch vụ của ch&uacute;ng t&ocirc;i cũng như c&aacute;ch bạn quản l&yacute; c&aacute;c t&ugrave;y chọn kiểm so&aacute;t bảo mật của m&igrave;nh.</p>\r\n\r\n<p>Khi bạn kh&ocirc;ng đăng nhập v&agrave;o một T&agrave;i khoản Google, ch&uacute;ng t&ocirc;i sẽ lưu trữ th&ocirc;ng tin ch&uacute;ng t&ocirc;i thu thập được c&ugrave;ng với c&aacute;c&nbsp;<a href=\"https://policies.google.com/privacy?hl=vi#footnote-unique-id\">gi&aacute; trị nhận dạng duy nhất</a>&nbsp;được li&ecirc;n kết với tr&igrave;nh duyệt, ứng dụng hoặc&nbsp;<a href=\"https://policies.google.com/privacy?hl=vi#footnote-device\">thiết bị</a>&nbsp;bạn đang sử dụng. C&aacute;ch n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i thực hiện được những việc như duy tr&igrave; c&aacute;c t&ugrave;y chọn ng&ocirc;n ngữ của bạn tr&ecirc;n c&aacute;c phi&ecirc;n duyệt web.</p>\r\n\r\n<p>Khi bạn đ&atilde; đăng nhập, ch&uacute;ng t&ocirc;i cũng thu thập cả th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i lưu trữ c&ugrave;ng với T&agrave;i khoản Google của bạn. Ch&uacute;ng t&ocirc;i xem những th&ocirc;ng tin n&agrave;y l&agrave;&nbsp;<a href=\"https://policies.google.com/privacy?hl=vi#footnote-personal-info\">th&ocirc;ng tin c&aacute; nh&acirc;n</a>.</p>', '2021-04-18 03:28:50', '2021-04-18 03:28:50'),
(4, 'Về chúng tôi', 1, '<p>C&acirc;u chuyện bắt đầu từ năm 1976 tại Brighton, Anh Quốc, khi nh&agrave; s&aacute;ng lập của ch&uacute;ng t&ocirc;i Dame Anita Roddick tự tay ho&agrave; trộn n&ecirc;n những sản phẩm của ri&ecirc;ng b&agrave; v&agrave; truyền v&agrave;o ch&uacute;ng &yacute; tưởng của m&igrave;nh: một m&ocirc; h&igrave;nh kinh doanh được tạo ra để mang lại những điều tốt đẹp. Theo đuổi tầm nh&igrave;n đ&oacute;, 40 năm qua ch&uacute;ng t&ocirc;i đ&atilde; lu&ocirc;n ph&aacute; vỡ c&aacute;c quy tắc, kh&ocirc;ng bao giờ lừa dối v&agrave; tạo n&ecirc;n thay đổi. Hiện tại, ch&uacute;ng t&ocirc;i c&oacute; hơn 3,000 cửa h&agrave;ng tr&ecirc;n 70 quốc gia c&ugrave;ng hơn 22,000 nh&acirc;n vi&ecirc;n lu&ocirc;n s&aacute;t c&aacute;nh c&ugrave;ng ch&uacute;ng t&ocirc;i tr&ecirc;n h&agrave;nh tr&igrave;nh đem sự ho&agrave; trộn vẻ đẹp nh&acirc;n đạo độc đ&aacute;o, c&ugrave;ng một ch&uacute;t h&agrave;i hước v&agrave; mục đ&iacute;ch nghi&ecirc;m t&uacute;c đến cả thế giới.</p>\r\n\r\n<p>Chưa bao giờ ngần ngại việc kh&aacute;c biệt với đ&aacute;m đ&ocirc;ng v&agrave; đứng l&ecirc;n bảo vệ lẽ phải, ch&uacute;ng t&ocirc;i đi khắp thế giới để t&igrave;m ra những nguy&ecirc;n liệu nh&acirc;n đạo tinh tu&yacute; nhất v&agrave; tạo ra một d&ograve;ng sản phẩm l&agrave;m đẹp lấy cảm hứng từ thi&ecirc;n nhi&ecirc;n.</p>\r\n\r\n<p>Ng&agrave;y h&ocirc;m nay, những cống hiến mong muốn sử dụng việc kinh doanh l&agrave;m động lực t&iacute;ch cực của ch&uacute;ng t&ocirc;i c&agrave;ng mạnh mẽ hơn bao giờ hết. L&agrave; một phần của Cam Kết Dựng X&acirc;y Kh&ocirc;ng Vụ Lợi&trade;, ch&uacute;ng t&ocirc;i tự đặt cho m&igrave;nh nhiệm vụ dựng x&acirc;y sản phẩm, con người v&agrave; h&agrave;nh tinh. Điều đ&oacute; bao gồm hợp t&aacute;c c&ocirc;ng bằng với những người n&ocirc;ng d&acirc;n v&agrave; nh&agrave; cung cấp của ch&uacute;ng t&ocirc;i v&agrave; gi&uacute;p đỡ cộng đồng ph&aacute;t triển bằng chương tr&igrave;nh Thương Mại Cộng Đồng; c&aacute;c sản phẩm 100% thi&ecirc;n nhi&ecirc;n, lu&ocirc;n lu&ocirc;n v&agrave; vĩnh viễn chống lại thử nghiệm tr&ecirc;n động vật.</p>\r\n\r\n<p>C&ugrave;ng nhau, ch&uacute;ng ta c&oacute; thể l&agrave;m được, tất cả đều ở trong tầm tay.</p>', '2021-04-18 03:30:20', '2021-04-18 03:30:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_category_id` int(11) NOT NULL DEFAULT 0,
  `pro_author_id` int(11) NOT NULL DEFAULT 0,
  `pro_price` int(11) NOT NULL DEFAULT 0,
  `pro_sale` tinyint(4) NOT NULL DEFAULT 0,
  `pro_active` tinyint(4) NOT NULL DEFAULT 1,
  `pro_hot` tinyint(4) NOT NULL DEFAULT 0,
  `pro_view` int(11) NOT NULL DEFAULT 0,
  `pro_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_keyword_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pay` int(11) NOT NULL DEFAULT 0,
  `pro_qty` int(11) NOT NULL DEFAULT 0,
  `pro_total_ratings` tinyint(4) NOT NULL DEFAULT 0,
  `pro_total_number` tinyint(4) NOT NULL DEFAULT 0,
  `pro_brand_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_category_id`, `pro_author_id`, `pro_price`, `pro_sale`, `pro_active`, `pro_hot`, `pro_view`, `pro_description`, `pro_avatar`, `pro_description_seo`, `pro_keyword_seo`, `created_at`, `updated_at`, `pro_title_seo`, `pro_content`, `pro_pay`, `pro_qty`, `pro_total_ratings`, `pro_total_number`, `pro_brand_id`) VALUES
(1, 'Áo thun bò sữa tay lỡ, form rộng Unisex ATLBO', 'ao-thun-bo-sua-tay-lo-form-rong-unisex-atlbo', 2, 0, 150000, 48, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-18__100-76443.png', 'Miễn Phí Vận Chuyển', NULL, '2021-04-18 11:33:54', '2021-04-28 08:46:54', 'Áo thun bò sữa tay lỡ, form rộng Unisex ATLBO', '<p>TH&Ocirc;NG TIN SẢN PHẨM: - T&ecirc;n sản phẩm: &Aacute;o thun b&ograve; sữa form rộng tay lỡ Unisex - Xuất sứ: Việt Nam - Chất liệu: cotton D&Agrave;Y MỀM MỊN M&Aacute;T kh&ocirc;ng x&ugrave; l&ocirc;ng. Form &aacute;o rộng chuẩn TAY LỠ UNISEX cực đẹp. - Size &aacute;o: FREESIZE form rộng - Chiều d&agrave;i &aacute;o: 72cm - Chiều rộng &aacute;o: 55cm - Chiều d&agrave;i tay &aacute;o: 20cm - Từ 50-65KG (mặc rộng thoải m&aacute;i) - Từ 66-75KG (mặc rộng vừa).</p>', 0, 2122, 0, 0, 1),
(2, 'Áo thun nam nữ form rộng Yinxx, áo phông tay lỡ ATL43', 'ao-thun-nam-nu-form-rong-yinxx-ao-phong-tay-lo-atl43', 2, 0, 80000, 15, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__105-10425.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 08:46:02', '2021-04-28 09:05:13', 'Áo thun nam nữ form rộng Yinxx, áo phông tay lỡ ATL43', '<p>TH&Ocirc;NG TIN SẢN PHẨM:</p>\r\n\r\n<p>- T&ecirc;n sản phẩm: &Aacute;o thun form rộng tay lỡ Unisex</p>\r\n\r\n<p>- Xuất sứ: Việt Nam</p>\r\n\r\n<p>- Chất liệu: 35% Cotton, 60% Polyester, 5% Spandex</p>\r\n\r\n<p>- D&agrave;y dặn, mềm mịn, co gi&atilde;n 4 chiều, kh&ocirc;ng x&ugrave;, kh&ocirc;ng nhăn, kh&ocirc;ng h&uacute;t bụi bẩn.</p>\r\n\r\n<p>- Size &aacute;o: FREESIZE form rộng chuẩn TAY LỠ UNISEX cực đẹp.</p>\r\n\r\n<p>- Chiều d&agrave;i &aacute;o: 72cm - Chiều rộng &aacute;o: 55cm - Chiều d&agrave;i tay &aacute;o: 20cm - Từ 50-65KG (mặc rộng thoải m&aacute;i) - Từ 66-75KG (mặc rộng vừa).</p>\r\n\r\n<p>Ng&agrave;y n&agrave;y, &aacute;o thun tay lỡ Unisex form rộng đang ng&agrave;y c&agrave;ng trở n&ecirc;n phổ biến v&agrave; đa dạng với c&aacute;c mẫu thiết kế độc đ&aacute;o bắt mắt, thậm ch&iacute; c&ograve;n bắt kịp nhiều tr&agrave;o lưu xu hướng đặc biệt l&agrave; phong c&aacute;ch H&agrave;n Quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Do đ&oacute;, việc t&igrave;m hiểu tất tần tật về &aacute;o thun tay lỡ nam/nữ l&agrave; cần thiết gi&uacute;p bạn lu&ocirc;n cập nhật những mẫu thiết kế mới nhất. Điều n&agrave;y sẽ gi&uacute;p bạn c&oacute; nhiều sự lựa chọn mới mẻ v&agrave; đa dạng phong c&aacute;ch thời trang của bạn.</p>', 0, 8940, 0, 0, 1),
(3, 'Áo thun tay lỡ Unisex Yinxx, áo phông form rộng ATL138', 'ao-thun-tay-lo-unisex-yinxx-ao-phong-form-rong-atl138', 2, 0, 80000, 15, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__106-41421.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 08:50:11', '2021-04-28 09:14:10', 'Áo thun tay lỡ Unisex Yinxx, áo phông form rộng ATL138', '<p>TH&Ocirc;NG TIN SẢN PHẨM:</p>\r\n\r\n<p>- T&ecirc;n sản phẩm: &Aacute;o thun tay lỡ form rộng UNISEX</p>\r\n\r\n<p>- Xuất sứ: Việt Nam</p>\r\n\r\n<p>- Chất liệu: cotton D&Agrave;Y MỀM MỊN M&Aacute;T kh&ocirc;ng x&ugrave; l&ocirc;ng.</p>\r\n\r\n<p>Form &aacute;o rộng chuẩn TAY LỠ UNISEX cực đẹp.</p>\r\n\r\n<p>- Size &aacute;o: FREESIZE form rộng</p>\r\n\r\n<p>- Chiều d&agrave;i &aacute;o: 72cm</p>\r\n\r\n<p>- Chiều rộng &aacute;o: 55cm</p>\r\n\r\n<p>- Chiều d&agrave;i tay &aacute;o: 20cm</p>\r\n\r\n<p>- Từ 50-65KG (mặc rộng thoải m&aacute;i)</p>\r\n\r\n<p>- Từ 66-75KG (mặc rộng vừa).</p>', 0, 9079, 0, 0, 1),
(4, 'Áo thun nam nữ form rộng Yinxx, áo phông tay lỡ ATL921', 'ao-thun-nam-nu-form-rong-yinxx-ao-phong-tay-lo-atl921', 2, 0, 100000, 31, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__107-29038.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 09:17:24', '2021-04-28 09:17:28', 'Áo thun nam nữ form rộng Yinxx, áo phông tay lỡ ATL921', '<p>TH&Ocirc;NG TIN SẢN PHẨM:</p>\r\n\r\n<p>- T&ecirc;n sản phẩm: &Aacute;o thun form rộng tay lỡ Unisex</p>\r\n\r\n<p>- Xuất sứ: Việt Nam</p>\r\n\r\n<p>- Chất liệu: cotton D&Agrave;Y MỀM MỊN M&Aacute;T kh&ocirc;ng x&ugrave; l&ocirc;ng.</p>\r\n\r\n<p>Form &aacute;o rộng chuẩn TAY LỠ UNISEX cực đẹp.</p>\r\n\r\n<p>- Size &aacute;o: FREESIZE form rộng</p>\r\n\r\n<p>- Chiều d&agrave;i &aacute;o: 72cm</p>\r\n\r\n<p>- Chiều rộng &aacute;o: 55cm</p>\r\n\r\n<p>- Chiều d&agrave;i tay &aacute;o: 20cm</p>\r\n\r\n<p>- Từ 50-65KG (mặc rộng thoải m&aacute;i)</p>\r\n\r\n<p>- Từ 66-75KG (mặc rộng vừa).</p>', 0, 1647, 0, 0, 1),
(5, 'Áo sơ mi nam tay dài có túi LADOS-1778', 'ao-so-mi-nam-tay-dai-co-tui-lados-1778', 1, 0, 169000, 30, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__108-2971.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 09:21:17', '2021-04-29 07:34:32', 'Áo sơ mi nam tay dài có túi LADOS-1778', '<p>&nbsp;</p>\r\n\r\n<p>⏩ Th&ocirc;ng tin sản phẩm:</p>\r\n\r\n<p>👉 Chất liệu: vải lụa nến mềm mại, thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>👉 Chất vải đẹp, kh&ocirc;ng x&ugrave; l&ocirc;ng, kh&ocirc;ng phai m&agrave;u</p>\r\n\r\n<p>👉 Đường may cực tỉ mỉ cực đẹp</p>\r\n\r\n<p>👉 C&oacute; thể mặc đi l&agrave;m, đi chơi, dễ phối đồ, kh&ocirc;ng k&eacute;n người mặc</p>\r\n\r\n<p>👉 Kiểu d&aacute;ng: Thiết kế theo form rộng vừa,đơn giản , dễ mặc ..T&ocirc;n l&ecirc;n được sự trẻ trung năng động cho c&aacute;c bạn nam, k&egrave;m v&agrave;o đ&oacute; l&agrave; sự hoạt động thoải m&aacute;i khi mặc sản phẩm.</p>', 1, 151, 1, 5, 2),
(6, 'Áo sơ mi nam ngắn tay LADOS - 8054 -VẢI OXFORD CỰC CHUẨN', 'ao-so-mi-nam-ngan-tay-lados-8054-vai-oxford-cuc-chuan', 1, 0, 265000, 50, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__111-13447.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 09:49:47', '2021-04-28 09:49:52', 'Áo sơ mi nam ngắn tay LADOS - 8054 -VẢI OXFORD CỰC CHUẨN', '<p>&Aacute;o sơ mi nam ngắn tay LADOS - 8054 -VẢI OXFORD CỰC CHUẨN ⏩ Th&ocirc;ng tin sản phẩm:</p>\r\n\r\n<p>👉 Chất liệu: VẢI OXFORD CỰC CHUẨN</p>\r\n\r\n<p>👉 &Aacute;o thấm h&uacute;t mồ h&ocirc;i tốt</p>\r\n\r\n<p>👉 Form rộng vừa, đứng form &aacute;o cực kỳ sang trọng</p>\r\n\r\n<p>👉 Chất vải d&agrave;y đẹp, kh&ocirc;ng x&ugrave; l&ocirc;ng, kh&ocirc;ng phai m&agrave;u</p>\r\n\r\n<p>👉 Đường may cực tỉ mỉ cực đẹp</p>\r\n\r\n<p>👉 C&oacute; thể mặc đi l&agrave;m, đi chơi, đặc biệt đi tiệc sự kiện , cực sang trọng</p>', 0, 50, 0, 0, 2),
(7, 'Áo sơ mi nam trơn cao cấp LADOS-665', 'ao-so-mi-nam-tron-cao-cap-lados-665', 1, 0, 299000, 50, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__112-19573.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 09:54:00', '2021-04-28 09:54:05', 'Áo sơ mi nam trơn cao cấp LADOS-665', '<p>⏩ Th&ocirc;ng tin sản phẩm:</p>\r\n\r\n<p>👉 Chất liệu Lụa d&agrave;y cao cấp, co gi&atilde;n tốt</p>\r\n\r\n<p>👉 Kh&ocirc;ng nhăn, kh&ocirc;ng nh&agrave;u, kh&ocirc;ng ra m&agrave;u</p>\r\n\r\n<p>👉 Chất vải đẹp, kh&ocirc;ng x&ugrave; l&ocirc;ng&nbsp;</p>\r\n\r\n<p>👉 Đường may cực tỉ mỉ cực đẹp</p>\r\n\r\n<p>👉 C&oacute; thể mặc đi l&agrave;m, đi chơi, dễ phối đồ, kh&ocirc;ng k&eacute;n người mặc</p>\r\n\r\n<p>👉 Kiểu d&aacute;ng: Thiết kế theo form &ocirc;m body trẻ trung lịch l&atilde;m</p>\r\n\r\n<p>⏩Được sản xuất v&agrave; bảo h&agrave;nh bởi C&ocirc;ng ty TNHH MTV LADOS VIỆT NAM</p>', 0, 209, 0, 0, 2),
(8, 'Chân váy voan tầng 2 lớp', 'chan-vay-voan-tang-2-lop', 13, 0, 130000, 0, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-28__113-96396.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-28 10:07:26', '2021-04-28 10:08:18', 'Chân váy voan tầng 2 lớp', '<p>🍊M&atilde;i mới t&igrave;m ra em ch&acirc;n v&aacute;y xinh xinh m&agrave; h&ocirc;ng bị qu&ecirc;.</p>\r\n\r\n<p>M&Atilde; SP: Ch&acirc;n v&aacute;y voan Ulzzang 3 tầng, l&oacute;t b&ecirc;n trong cực xinh.</p>\r\n\r\n<p>Chất liệu: Voan c&aacute;t H&agrave;n d&agrave;y dặn. Cạp chun freesize.</p>\r\n\r\n<p>Eo: 60-co d&atilde;n đến max 78cm. B&ecirc;n dưới xo&egrave; freesize ạ. D&agrave;i 64cm.</p>', 0, 57, 0, 0, 3),
(9, 'Sơ mi nam S391 chất lụa thái mềm mịn, phom slim fit', 'so-mi-nam-s391-chat-lua-thai-mem-min-phom-slim-fit', 1, 0, 150000, 34, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-29__114-64843.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-29 06:27:48', '2021-04-29 06:27:51', 'Sơ mi nam S391 chất lụa thái mềm mịn, phom slim fit', '<p>Chất vải nhập khẩu từ TH&Aacute;I LAN kh&ocirc;ng bai, kh&ocirc;ng nhăn, kh&ocirc;ng x&ugrave;.</p>\r\n\r\n<p>--Mếch cổ v&agrave; tay l&agrave;m bằng chất liệu cao cấp, kh&ocirc;ng sợ bong tr&oacute;c.</p>\r\n\r\n<p>--Fom Body cực chuẩn, &ocirc;m chọn bờ vai mặc cực trẻ trung v&agrave; phong c&aacute;ch, ph&ugrave; hợp mọi ho&agrave;n cảnh kể cả đi chơi v&agrave; đi l&agrave;m.</p>\r\n\r\n<p>👉SIZE M: C&acirc;n nặng 48-55kg, Cao 1m50 - 1m62, &quot; &Aacute;o D&agrave;i giữa cổ sau đến lai bầu 68cm, Vai 38cm, V&ograve;ng ngực 88cm, Chiết eo 76cm, D&agrave;i tay 54cm&quot;</p>\r\n\r\n<p>👉SIZE L: Can nặng 55- 60kg, Cao 1m60 - 1m68, &quot; &Aacute;o D&agrave;i giữa cổ sau đến lai bầu 70cm, Vai 40cm, V&ograve;ng Ngực 92cm, Chiết eo 80cm, D&agrave;i tay 56cm&quot;</p>\r\n\r\n<p>👉SIZE XL: c&acirc;n nặng 60 - 68kg, Cao 1m65 - 1m72, &quot; &Aacute;o D&agrave;i giữa cổ sau xuống lai bầu 72cm, Vai 42cm, V&ograve;ng ngực 96cm, Chiết eo 84cm, D&agrave;i tay 58cm&quot;</p>\r\n\r\n<p>👉SIZE XXL: C&acirc;n nặng 65 -74kg( TR&Ecirc;N 70kg C&Oacute; BỤNG MẶC XXXL NHA ) Cao 1m7. - 1m80, &Aacute;o D&agrave;i giữa cổ sau xuống lai bầu 74cm, Vai 46cm, V&ograve;ng Ngực 100cm, Chiết eo 90cm, D&agrave;i tay 60cm&quot;</p>\r\n\r\n<p>--H&agrave;ng c&oacute; sẵn, đủ size: Từ M, L, XL, XXL</p>', 0, 6139, 0, 0, 1),
(10, 'Quần giả váy chữ A phối cúc', 'quan-gia-vay-chu-a-phoi-cuc', 13, 0, 100000, 38, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-29__115-10997.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-29 07:22:57', '2021-04-29 07:23:21', 'Quần giả váy chữ A phối cúc', '<p>Quần giả v&aacute;y cực xinh lu&ocirc;n ạ Fom bao đẹp kh&aacute;ch nh&eacute; H&agrave;ng nh&agrave; e loại 1 ạ L&ecirc;n d&aacute;ng rất ok</p>\r\n\r\n<p>C&oacute; 4 size S M L Xl S:40-46kg M:47-51kg L:51-55kg Xl:55-59kg</p>', 0, 7742, 0, 0, 1),
(11, 'Chân váy công sở xinh dài qua gối_MJK001', 'chan-vay-cong-so-xinh-dai-qua-goi-mjk001', 13, 0, 130000, 50, 1, 1, 0, 'Miễn Phí Vận Chuyển', '2021-04-29__116-83976.jpg', 'Miễn Phí Vận Chuyển', NULL, '2021-04-29 07:31:58', '2021-04-29 07:32:13', 'Chân váy công sở xinh dài qua gối_MJK001', '<p>M&atilde; ch&acirc;n v&aacute;y đang hot lắm nha Mặc l&ecirc;n si&ecirc;u xinh ạ Kết hợp được với nhiều kiểu &aacute;o kh&aacute;c nhau nha</p>\r\n\r\n<p>Chất tuyết mưa Size S M L S:43-50kg M:50-56kg L:56-60kg</p>', 0, 7886, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rt_product_id` int(11) NOT NULL DEFAULT 0,
  `rt_user_id` int(11) NOT NULL DEFAULT 0,
  `rt_number` tinyint(4) NOT NULL DEFAULT 0,
  `rt_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `rt_product_id`, `rt_user_id`, `rt_number`, `rt_content`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 5, 'ok', '2021-04-29 07:34:32', '2021-04-29 07:34:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_status` tinyint(4) NOT NULL DEFAULT 0,
  `s_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `s_title`, `s_description`, `s_avatar`, `s_status`, `s_link`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'Top Models', '2021-04-18__slide1-55754.jpg', 1, '#', '2021-04-18 02:41:57', '2021-04-28 08:33:47'),
(2, 'Fashion', 'Models Fashion', '2021-04-18__silde2-70072.jpg', 1, '#', '2021-04-18 02:42:27', '2021-04-28 08:33:42'),
(3, 'Fashionship', 'fashionship', '2021-04-18__ads-89159.jpg', 1, '#', '2021-04-18 02:43:03', '2021-04-28 08:33:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tr_user_id` int(11) NOT NULL DEFAULT 0,
  `tr_total` int(11) NOT NULL DEFAULT 0,
  `tr_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tr_pay_type` tinyint(4) NOT NULL DEFAULT 0,
  `tr_pay_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `tr_user_id`, `tr_total`, `tr_note`, `tr_address`, `tr_phone`, `tr_status`, `created_at`, `updated_at`, `tr_pay_type`, `tr_pay_status`) VALUES
(1, 1, 118300, NULL, 'SG', '0364784406', 1, '2021-04-29 06:22:35', '2021-04-29 07:34:08', 1, 0),
(2, 1, 65000, NULL, 'KG', '0364784406', 0, '2021-04-29 08:21:51', '2021-04-29 08:21:51', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_total` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `code_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_status` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_total`, `address`, `code`, `time_code`, `status`, `code_status`, `time_status`) VALUES
(1, 'Trần Hoàng Kha', 'tranhoangkha366@gmail.com', '0364784406', '2021-04-29__18-9656.jpg', 1, NULL, '$2y$10$JYKJ4RQ2YLpBbcTr68tJVObOAXI2bUhpkCbOLySbHMjQ6AaQkEOjG', NULL, '2021-04-19 07:01:59', '2021-04-29 08:10:53', 1, NULL, NULL, NULL, 1, '$2y$10$OuEQlykt96mO5TvcFfkBOeScb.42XQHR292C0gw49e6rMVqPPi27S', '2021-04-19 07:01:59'),
(2, 'Trần Hoàng Kha', 'tranhoangkha3661@gmail.com', '0364784407', NULL, 1, NULL, '$2y$10$UoWKlEHxDZ3c8R5buKscHeeE0B.4Odml2CyzMETSJCkvaHypZNoYu', NULL, '2021-04-29 08:21:26', '2021-04-29 08:21:26', 0, NULL, NULL, NULL, 0, '$2y$10$LWx9Fb7XUMFF9q.Aobp6ieVjAzGNNeINdasS7rPKPIde9ImZWgT3m', '2021-04-29 08:21:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_active_index` (`active`);

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_a_name_unique` (`a_name`),
  ADD KEY `article_a_slug_index` (`a_slug`),
  ADD KEY `article_a_active_index` (`a_active`),
  ADD KEY `article_a_author_id_index` (`a_author_id`),
  ADD KEY `article_a_hot_index` (`a_hot`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_banner_type_index` (`banner_type`),
  ADD KEY `banner_banner_status_index` (`banner_status`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_b_name_unique` (`b_name`),
  ADD KEY `brands_b_slug_index` (`b_slug`),
  ADD KEY `brands_b_active_index` (`b_active`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_c_name_unique` (`c_name`),
  ADD KEY `categories_c_slug_index` (`c_slug`),
  ADD KEY `categories_c_menu_category_id_index` (`c_menu_category_id`),
  ADD KEY `categories_c_active_index` (`c_active`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_categories_mc_name_unique` (`mc_name`),
  ADD KEY `menu_categories_mc_slug_index` (`mc_slug`),
  ADD KEY `menu_categories_mc_status_index` (`mc_status`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_or_transaction_id_index` (`or_transaction_id`),
  ADD KEY `orders_or_product_id_index` (`or_product_id`);

--
-- Chỉ mục cho bảng `page_statics`
--
ALTER TABLE `page_statics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_statics_ps_type_index` (`ps_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pro_slug_index` (`pro_slug`),
  ADD KEY `products_pro_category_id_index` (`pro_category_id`),
  ADD KEY `products_pro_author_id_index` (`pro_author_id`),
  ADD KEY `products_pro_active_index` (`pro_active`),
  ADD KEY `products_pro_hot_index` (`pro_hot`),
  ADD KEY `products_pro_brand_id_index` (`pro_brand_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rt_product_id_index` (`rt_product_id`),
  ADD KEY `ratings_rt_user_id_index` (`rt_user_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_s_status_index` (`s_status`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_tr_user_id_index` (`tr_user_id`),
  ADD KEY `transactions_tr_status_index` (`tr_status`),
  ADD KEY `transactions_tr_pay_type_index` (`tr_pay_type`),
  ADD KEY `transactions_tr_pay_status_index` (`tr_pay_status`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_active_index` (`active`),
  ADD KEY `users_code_index` (`code`),
  ADD KEY `users_status_index` (`status`),
  ADD KEY `users_code_status_index` (`code_status`),
  ADD KEY `users_time_status_index` (`time_status`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `page_statics`
--
ALTER TABLE `page_statics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 11:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viettravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `anhien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `anhien`) VALUES
(1, 'Biển', 'https://cdn3d.iconscout.com/3d/premium/thumb/sea-horse-4551755-3774497.png', b'1'),
(2, 'Cắm trại', 'https://cdn3d.iconscout.com/3d/premium/thumb/camping-tent-4461649-3702746.png', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdatve`
--

CREATE TABLE `chitietdatve` (
  `idve` int(11) NOT NULL,
  `loaive` bit(1) NOT NULL COMMENT '0 người lớn, 1 trẻ em',
  `hotenkh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phai` bit(1) NOT NULL COMMENT '0 nữ\r\n1 nam',
  `ngaysinh` date DEFAULT NULL,
  `giaytotuythan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tienve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chitietdatve`
--

INSERT INTO `chitietdatve` (`idve`, `loaive`, `hotenkh`, `phai`, `ngaysinh`, `giaytotuythan`, `sdt`, `tienve`) VALUES
(2, b'0', 'trungnam', b'1', '2022-01-03', '123456', '', 123213213);

-- --------------------------------------------------------

--
-- Table structure for table `chitietloaive`
--

CREATE TABLE `chitietloaive` (
  `idlocation_detail` int(11) NOT NULL,
  `loaive` int(11) NOT NULL,
  `giave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chitietloaive`
--

INSERT INTO `chitietloaive` (`idlocation_detail`, `loaive`, `giave`) VALUES
(2, 0, 10000000),
(2, 1, 5000000),
(3, 0, 5000000),
(3, 1, 12359600);

-- --------------------------------------------------------

--
-- Table structure for table `datve`
--

CREATE TABLE `datve` (
  `idlocation_detail` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ngatdatve` date NOT NULL,
  `idmagiamgia` int(11) NOT NULL,
  `thanhtoan` bit(1) NOT NULL COMMENT '0 thanh toán tại quần\r\n1 thanh toán trực tuyến',
  `trangthai_thanhtoan` bit(1) NOT NULL COMMENT '0 chưa thanh toán,\r\n1 thanh toán thành công,\r\n2 đã hoàn tiền (khi hủy)',
  `idve` int(11) NOT NULL,
  `qrcode` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `datve`
--

INSERT INTO `datve` (`idlocation_detail`, `iduser`, `ngatdatve`, `idmagiamgia`, `thanhtoan`, `trangthai_thanhtoan`, `idve`, `qrcode`) VALUES
(2, 1, '2022-01-19', 1, b'1', b'0', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_location`
--

CREATE TABLE `detail_location` (
  `id` int(11) NOT NULL,
  `idlocation` int(11) NOT NULL,
  `ngaykhoihanh` date NOT NULL,
  `giokhoihanh` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `socho` int(11) NOT NULL,
  `idhdv` int(11) NOT NULL,
  `anhien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `detail_location`
--

INSERT INTO `detail_location` (`id`, `idlocation`, `ngaykhoihanh`, `giokhoihanh`, `socho`, `idhdv`, `anhien`) VALUES
(2, 1, '2022-01-19', '18h20', 30, 1, b'1'),
(3, 1, '2022-01-31', '07h00', 30, 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `huongdanvien`
--

CREATE TABLE `huongdanvien` (
  `id` int(11) NOT NULL,
  `tenhdv` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phai` bit(1) NOT NULL,
  `diachi` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anhien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `huongdanvien`
--

INSERT INTO `huongdanvien` (`id`, `tenhdv`, `phai`, `diachi`, `sdt`, `anhien`) VALUES
(1, 'Quang Đạt', b'1', 'Quận 12, TPHCM', '012345678', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `diemdi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diemden` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mota` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lichtrinh` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giavetb` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phuongtien` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `top` bit(1) NOT NULL DEFAULT b'0',
  `anhien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `diemdi`, `diemden`, `time`, `mota`, `lichtrinh`, `giavetb`, `category`, `image`, `phuongtien`, `top`, `anhien`) VALUES
(1, 'Hồ Chí Minh', 'Vịnh hạ long', '2 ngày 3 đêm', 'ok con dê', NULL, 15600000, 1, 'https://dulichhalongquangninh.com/wp-content/uploads/2016/07/hinh-anh-du-lich-ha-long.jpg,https://tranhtreotuonghanoi.com/wp-content/uploads/2020/05/tranh-vinh-ha-long-kho-lon-ban-chay-nhat.jpg,https://dulichhalongquangninh.com/wp-content/uploads/2016/07/hinh-anh-du-lich-ha-long.jpg,https://tranhtreotuonghanoi.com/wp-content/uploads/2020/05/tranh-vinh-ha-long-kho-lon-ban-chay-nhat.jpg', 'máy bay, xe du lịch', b'1', b'1'),
(2, 'Hồ Chí Minh', 'Hội An', '5 ngày 4 đêm', 'this is a hoi an', NULL, 8200000, 2, 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/08/hoi-an-quang-nam-vntrip.jpg,https://dulichkhampha24.com/wp-content/uploads/2021/03/hoi-an-thanh-pho-lang-man-nhat-the-gioi.jpg,https://img.nhandan.com.vn/Files/Images/2021/06/27/travel_hoi_an-1624775443712.jpg', 'xe tăng', b'1', b'1'),
(6, 'Hà Nội', 'Phú Quốc', '3 ngày 2 đêm', 'phú quốc is mô tả', NULL, 9250000, 2, 'https://img.nhandan.com.vn/Files/Images/2021/01/24/PQ_1-1611472998875.jpg,http://hanoimoi.com.vn/Uploads/images/tuandiep/2021/09/07/dulich.JPG,https://vcdn-dulich.vnecdn.net/2020/05/27/shutterstock-1355875478-3291-1-5462-7597-1590571669.jpg', 'căng hải', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int(11) NOT NULL,
  `magiamgia` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chitiet` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaybatdau` datetime NOT NULL,
  `ngayketthuc` datetime NOT NULL,
  `loaima` bit(1) NOT NULL COMMENT '0 giảm theo giá tiền\r\n1 giảm theo %',
  `giatri` int(11) NOT NULL,
  `anhien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `magiamgia`, `chitiet`, `ngaybatdau`, `ngayketthuc`, `loaima`, `giatri`, `anhien`) VALUES
(1, 'XUAN2022', 'giảm 50% cho các vé từ trong mùa xuân 2020', '2022-01-18 08:12:46', '2022-01-31 14:12:46', b'1', 50, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0154c89dcdfe02cc72d62016e84373b4c6b38709c5a9793ce950602692984dd170da49dd3e62379a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:25:46', '2022-01-19 18:25:46', '2023-01-20 01:25:46'),
('01d271d137229200c16708d2f77ed9788becf254c1b756b7402fef4ecd6a1bac3bc734ba999cee61', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:06', '2022-01-16 21:46:06', '2023-01-17 04:46:06'),
('01f170683ec168fe4388f6667a97dceb3239df329b0fede3044d4d9206d4c1d1a507b0dd8639ab3f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:19', '2022-01-16 21:48:19', '2023-01-17 04:48:19'),
('037250cf810e9a50e1714bb8130b5e49e01a8d4024aad98ebe94f94ba93fb45a1be4ac830c7ba3cd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:38:19', '2022-01-17 01:38:19', '2023-01-17 08:38:19'),
('0472a6f7472b9535f7b8aa137694b1804e778e98cc2ac5e389f9d75fc3383012ed674924b2bdf679', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:45:04', '2022-01-17 20:45:04', '2023-01-18 03:45:04'),
('04ceae19a3d869ccb9945c6cb840a1250edf6c5e5e4af1d04def651e4db30e224e0e6fad44bee7c1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:24:55', '2022-01-17 00:24:55', '2023-01-17 07:24:55'),
('055ce0f3613a9453e93bba76173f148c98ce80210891c316a5e65dc58ab605f904c8cec8acf5561b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:27', '2022-01-16 21:48:27', '2023-01-17 04:48:27'),
('0579974b96acc81c4d17af6bc2a4d932c3dfe9390b57cf1bdd820e6e86267127c37a10862aa27899', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:07:51', '2022-01-19 19:07:51', '2023-01-20 02:07:51'),
('058c888229cec3ff62fec849605cc607765af615f65069920d3c9d0674d0189e4260f5227353b8f9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:01:41', '2022-01-19 19:01:41', '2023-01-20 02:01:41'),
('0595e92b8f810e906f1f25aca1e8d5b9fb69ac9614be6768c3db04c62d23ff1c050a8e5127ae868c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:52:59', '2022-01-19 18:52:59', '2023-01-20 01:52:59'),
('065733808b06c12d08a8b66f8b1ba4fd877bec6379e067c12bef1a4e56ea8f0d5d3b0c778dbcee2d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:14:18', '2022-01-17 01:14:18', '2023-01-17 08:14:18'),
('070b6ab4fc780999eed99b65955ff348c3ac5d783d8bb3b77a055f8432571509f6e5c63fc49920f9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:51:18', '2022-01-19 19:51:18', '2023-01-20 02:51:18'),
('07bfee719c624309d9c6c04daac395db95e1de2f42fa5c3af20c0c0e44777bc8d3f1cbfb0dfaa0de', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:09:55', '2022-01-20 20:09:55', '2023-01-21 03:09:55'),
('0900d8fa5df4fd06aa54deffad0d8897a2af4e480fdecbe8a7069a706611a598aaf1eb1dd27979ab', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:44:17', '2022-01-16 21:44:17', '2023-01-17 04:44:17'),
('095cc82a3394bc5d0db8dae26cdd18e955579f963ceca1a4425913d83aeff39bbf19648e81a43934', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:20:29', '2022-01-19 19:20:29', '2023-01-20 02:20:29'),
('09cf1270606c620c1cc9f492a014b40bfdead1645366917b85ec073f38ce3a4d4ca7666955a95041', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 19:57:28', '2022-01-16 19:57:28', '2023-01-17 02:57:28'),
('0cf16195efe9a16bd63704295606f481077392df8b0f654874ec51d551c72be9c0d0ccbad7989c89', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:42:29', '2022-01-20 18:42:29', '2023-01-21 01:42:29'),
('0d66f4dd81c1c7d1e550128f27a1b3461907815d0d39c10ed5ef6100bae5f83b4cee6f666b47db69', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:21', '2022-01-15 00:51:21', '2023-01-15 07:51:21'),
('0e6901d5ab4888335b9153529ab64ad41685a7f1f22b69d27f616ed142e7f7cd325d582c6eccd1ea', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:08', '2022-01-15 00:51:08', '2023-01-15 07:51:08'),
('10fd4e3f90a9049ddc083fb00c1d0bbac645dcb665cc8a8249292cd45fb5d67a0394283dc8a28465', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:52:02', '2022-01-17 20:52:02', '2023-01-18 03:52:02'),
('1119f16486188d205463e9944184b13f381fa0f5318f0a60814554571f27bfab49e1dbf630eec254', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:43:22', '2022-01-17 00:43:22', '2023-01-17 07:43:22'),
('12a13e5320d9273c140ec6d217f034e7daee6329cab8d857dc49d8a4284436d37dee47c95d1870f2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:42:35', '2022-01-17 00:42:35', '2023-01-17 07:42:35'),
('1347defa701d1185b5e9f624020e55ed77009aec888310ffd3d110008947afeca4d9c6eff8b9536a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:41:26', '2022-01-20 18:41:26', '2023-01-21 01:41:26'),
('1427e1d100ec6aad8487f2020b002af2797dec63df3ef5f9715db33f77106d6f5400838a4875c5bc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:34:22', '2022-01-17 02:34:22', '2023-01-17 09:34:22'),
('167e384ec723053e7c5a6698fc5ddf1a73d28344ee8fe84bb3b9a6504480fef281b1903808216818', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:22:10', '2022-01-21 21:22:10', '2023-01-22 04:22:10'),
('16d490cf2a31d2f890b2e3a8d58e353d708d735b5e1551f910c46c03241a261dddbef1d0bf24e23a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:22:19', '2022-01-20 18:22:19', '2023-01-21 01:22:19'),
('16eccf81e88b6868634c8fbd8bea62f80d3b75d0c5df34614f38086cba5c26436bd88efbc4c8ce51', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:13:59', '2022-01-17 02:13:59', '2023-01-17 09:13:59'),
('178e00ad7f177e5870a0787278aeaaf6a89123c61dd4cbee6a66a2e4f8c1d2869ac1c244d791fdad', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:34:21', '2022-01-19 19:34:21', '2023-01-20 02:34:21'),
('17f6f16baea39925e4d2290f51b12075f2a6b47fd5c238aaebd7043031ecc5d5eeb20513aed67a9e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:38:58', '2022-01-17 01:38:58', '2023-01-17 08:38:58'),
('18857feec39e487b11ef46504bf221effb5a7d4969760753163a0840dbdf574ecc6f17e85c8092d9', 1, 1, 'Personal Access Token', '[]', 1, '2022-01-15 00:55:51', '2022-01-15 00:55:51', '2023-01-15 07:55:51'),
('1b792b470dd7f970dd47781ae347ec158ec1c89d7d831c1a5145c620c30c8bfae14c4fa9dce79f0c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 01:04:43', '2022-01-20 01:04:43', '2023-01-20 08:04:43'),
('1f5fe7b3844dc9422a977f80ed89f45974d19008e926792b2dc7059f271d03eeb6073ee713fdaf90', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:58:38', '2022-01-19 18:58:38', '2023-01-20 01:58:38'),
('2428bddebc6c77edbd3eddd406581541390161544ba38057e3ca314368996e8b3b2703ebad3e0c4b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:40', '2022-01-16 21:48:40', '2023-01-17 04:48:40'),
('259ae38579fe9a0b5f19f76424fbe824678ac4e762221579548c1ecaccb03c4944bd7e1095d58d2e', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:06', '2022-01-15 00:51:06', '2023-01-15 07:51:06'),
('26169900d315febd7bf9853fe82d4e6a7e1aa44577ea1e6058af83fd7cd14bfbc23aab680e4c1bbc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:07:46', '2022-01-16 21:07:46', '2023-01-17 04:07:46'),
('26cd2e099714a55c4aabee6a925129efc36d807db3ff0d8d3b3ee658e5767b1fc4bb05370a76d44f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:42:08', '2022-01-17 00:42:08', '2023-01-17 07:42:08'),
('2782dce59bda76946ef25fec91faf55d5998d836b9f17bbb1bd9e4c53297f864b50b61907e652939', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:14:07', '2022-01-17 01:14:07', '2023-01-17 08:14:07'),
('2792bc88586bdd0b142c36508a66d47fc8e409925f8eea1302159373589c1d838885c21b4d813d74', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:17:46', '2022-01-17 02:17:46', '2023-01-17 09:17:46'),
('27a46807e918ebc4f06d11c749531321c681aaed89afcc945f57284d14d355a69554f0f7eb2e6af7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:56:02', '2022-01-19 18:56:02', '2023-01-20 01:56:02'),
('282afaff69758987c167be7a250fa59da3ca3accfad5ea133ca51ec0d99e7f321a6221a80510f504', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:26:30', '2022-01-17 00:26:30', '2023-01-17 07:26:30'),
('2856f25c85ccd1138cf359a596dcd1810fb100314f630cf07e3719f185e2bca7a2524c6b7bf6681f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:33:31', '2022-01-16 20:33:31', '2023-01-17 03:33:31'),
('28f61cd064d2fac1f38548b9c0a96382bee52f04eea8f00ab14b67f5e5192cfd044a1affb94b6907', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:23:15', '2022-01-17 00:23:15', '2023-01-17 07:23:15'),
('293c5a97f4cbe4ad57d0af26117e01bd6c119e5f9f14998d46741ebaea19712d59a823b6be6d47b7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:38:39', '2022-01-19 18:38:39', '2023-01-20 01:38:39'),
('296986ade8710ee9d6f84e30aee69a928da3fc0948d2bccbb3a3f273d0c6917fc5f6364fc09716b9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:12:08', '2022-01-16 21:12:08', '2023-01-17 04:12:08'),
('2a9cdbb5bb56417525da3bcade8b47ddadce605226572473f6f962ec46d7d8a321f1c365e72300b8', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:12:04', '2022-01-19 18:12:04', '2023-01-20 01:12:04'),
('2b13968adc4a27a9e784314daa888f2bcc97fd9cfd72ae0ff0bda3d33d3949b5ca62909b784d1953', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:23:59', '2022-01-17 00:23:59', '2023-01-17 07:23:59'),
('2c18ebd0334096b3407dae1909f06f04655f03d48e9db6bbe209713d0be036df85c80025a84933bc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:12:03', '2022-01-19 19:12:03', '2023-01-20 02:12:03'),
('2c68517e1399be54c2bcb18a19bd0b04e6453452260cb2e44916e2ccbb98bfa2726f38c08cb62259', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:38:41', '2022-01-17 00:38:41', '2023-01-17 07:38:41'),
('2c85ed0f0a346275902ebfac185654227ea411618fe40b20ea0b605dcd01f8b8788df7dda9fae65f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:40:46', '2022-01-20 18:40:46', '2023-01-21 01:40:46'),
('2dc8c8d544e2f39df558bffa27f5422b3a08f7fd64391168b640f9aedee270e85bb994b5f46ba6f3', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 18:34:41', '2022-01-16 18:34:41', '2023-01-17 01:34:41'),
('2dccf9cfb52d41f83799f1ce20bd4d1cfed240854cecfe973aaef3f89723b3fd80dfaac7ef1db7eb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:47:48', '2022-01-16 21:47:48', '2023-01-17 04:47:48'),
('2e1738230f370303624afbae36d002a4d3cd8e76cce91e1a3d9d382d8aba3fff5328aaa4209ae664', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:47:51', '2022-01-16 21:47:51', '2023-01-17 04:47:51'),
('2e8f6b42a83cc4868e91146efb711edcd2da8a9c0c193870eabb2daee9b6044e4b0965a7ab8eda08', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-18 00:39:29', '2022-01-18 00:39:29', '2023-01-18 07:39:29'),
('30115024f7613e41dfa93d976943cdc59137bc95fe007ca1325fd08f3d262b813285b7fa5ab6f1c7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:35:52', '2022-01-19 19:35:52', '2023-01-20 02:35:52'),
('30618254adfe1b0e377d73ff35a30ba680b923bc57010d4043a81742fc44838ddb3b0f23a1c5e94a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:27:26', '2022-01-16 20:27:26', '2023-01-17 03:27:26'),
('30680bea6337098e82577f176db7d4b4f4c79e86b953cceb758bbe3a0a1b56f7bdf017de8fc0dfb0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:40:27', '2022-01-19 19:40:27', '2023-01-20 02:40:27'),
('3207e67d581a834328fb8d664d0aa2f984e9a85a667e472c361080e23e61ff75bbdf3b29fff59c84', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:51:33', '2022-01-19 19:51:33', '2023-01-20 02:51:33'),
('32af9d7f11d3adba9b16d786c5e207f6d42e0e802ac44048d5f7716816af7943bb19ac21e2a0bfa2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:38:38', '2022-01-17 01:38:38', '2023-01-17 08:38:38'),
('33503afdfaacb7728ec007fd11b8430728487af6e36576adb776e02339a00b454dee6b2ecc1eca6f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:04:46', '2022-01-20 20:04:46', '2023-01-21 03:04:46'),
('335c56fbf6aa69eda83d0bfb8a20ad979f4c71c2eb26590c42632166b009a3db82ebf689bc5859ad', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:07:41', '2022-01-19 20:07:41', '2023-01-20 03:07:41'),
('35d55c63566a500a2bb6d092f34d8c29310ba4c442e692a86ac4595e884e5a06494d22a514e87177', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:12:12', '2022-01-20 18:12:12', '2023-01-21 01:12:12'),
('36714d84f14389383fbcd61104bcd9f35806c0bbdeda4b14a22a88f5ec31b967966c113e1ce06009', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:44:01', '2022-01-17 00:44:01', '2023-01-17 07:44:01'),
('36b3f1e409341888fbd027319ba72ffa18818c8ff1863588d262325b24c273197fca96809698eeec', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:26:11', '2022-01-19 19:26:11', '2023-01-20 02:26:11'),
('3a22c2a115ff38bf1c071cecf8efe327069e18e72b1b191c734db8497e537d01ba5ee09b436e0e3f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:12:28', '2022-01-19 19:12:28', '2023-01-20 02:12:28'),
('3a866e7dc9bbfe32ede63967ca65b073810cb270dd574c484e6e5545198b033579fc2dfcd59431c8', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:29:35', '2022-01-19 19:29:35', '2023-01-20 02:29:35'),
('3b11a922ad8984122da1f5f40839fca560823ed865bf2d36456cfacf2fa6e43be44a0bb968b17d3c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:55:23', '2022-01-19 18:55:23', '2023-01-20 01:55:23'),
('3b6b08cd99b171ca4629fdc23019f2387b9d3fc811f8dfa2b8fe9c42d4f9801ba92b0447653d8c82', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:13:27', '2022-01-16 21:13:27', '2023-01-17 04:13:27'),
('3b96f3180430621e2ef7c741f86715a188516951f1a974fcc21ba2bee1cd653e668480027b249d50', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:26:01', '2022-01-17 00:26:01', '2023-01-17 07:26:01'),
('3c24cc0a0fb3bf7d23a3064039347d2c668ee4c2443e7fabc3c26b13dedbf4837526990ed63d2f69', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:45:38', '2022-01-19 19:45:38', '2023-01-20 02:45:38'),
('3d8841ce1819855b5f8756c27371f5c261be830a694aa343d73672b23fad7c2b1a15495782edea6f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:11', '2022-01-16 21:46:11', '2023-01-17 04:46:11'),
('3eb4421c955952aec3fad28333b298f99390afae66f7585f899573eaf21bb65860ae38fb85818d80', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:26:15', '2022-01-19 18:26:15', '2023-01-20 01:26:15'),
('3f6068b6596dab9e36db7216184b0dca2982a886e43a2062b4a5e651bb7898913f92c1a71ea28b5c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:55:23', '2022-01-20 18:55:23', '2023-01-21 01:55:23'),
('3f8b9feaa6817a6736621acd7596e379f69dc4239840297e5f3fa48d2273316cfa3883546237b962', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:09:41', '2022-01-19 19:09:41', '2023-01-20 02:09:41'),
('403ff62f581a3023dcd8cb7fac5c197d2348ba2cb36d7a5d45de5ab81240f4315e33584fa3332804', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 19:47:38', '2022-01-20 19:47:38', '2023-01-21 02:47:38'),
('4143301ab36d68aa58eb74ad90b136ab7cd0be75ddf12cf01b4d7f4c69d2bcd8ada0314b01431e58', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:43:58', '2022-01-19 19:43:58', '2023-01-20 02:43:58'),
('421c5b81cef3f1c1a3a98ff8cbbf46ce7de382fe9d5164cb1227976f2d852b3357488698b2e47f24', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:50:58', '2022-01-20 18:50:58', '2023-01-21 01:50:58'),
('43ce358c8c8f2e2bc99ec3ce895c08b1cbc8810e3cbaf3a506d72b486d8103eeb1d7ce0192110efd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-18 20:50:20', '2022-01-18 20:50:20', '2023-01-19 03:50:20'),
('4503780ef6c9293c257fd93b0242e5c8d93ccccd7a361a2d89f11578859d404b895e614c12213471', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:13', '2022-01-16 21:46:13', '2023-01-17 04:46:13'),
('47ed7e6135a806d5f6d92fb9c94ef19e247b0a4476abf2995c9ad8c47cae638b868b9ed2f2f741af', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:41:02', '2022-01-19 19:41:02', '2023-01-20 02:41:02'),
('4820dbe13f2586b3cc982dd0538645e0e52160644cbb64736912db8d057c620f4a76e245aa1ff5f0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:22:28', '2022-01-17 00:22:28', '2023-01-17 07:22:28'),
('48f11fd1ff2b77e05c8c8e0f8a113ee4671c8ddac817ec8920b3662804022b7883512654c51add6d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:07:00', '2022-01-19 20:07:00', '2023-01-20 03:07:00'),
('49e549ba3280770785ceeb41f61f68eeb6e7ba9cf05fa6b771a4dd6ba4125d490718aee6cd66ae8f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:47:50', '2022-01-16 21:47:50', '2023-01-17 04:47:50'),
('4a0bae300ca2191d90da1d758eb4a2257f41d3835b43c7cc4c0d949d63e93d443be683f17ce3593e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 21:01:40', '2022-01-17 21:01:40', '2023-01-18 04:01:40'),
('4a872fb47f3ac76f2fca23337ce116c895944dac4ba00aa4dd9cceca35782d1388dc2214cd979157', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:30:31', '2022-01-19 19:30:31', '2023-01-20 02:30:31'),
('4aa5a0c0af2cea49f03eca47a21565b4047584e6cd8d071157a08f1b83fd39380520a318b684c2f9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:07:31', '2022-01-19 20:07:31', '2023-01-20 03:07:31'),
('4acc82b8cb4a901e00a7d56edc85122dc4fa3b619d3e5889bcea6f8b113a010d33c1557798623aed', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:06:32', '2022-01-19 20:06:32', '2023-01-20 03:06:32'),
('4b68b61f2acfb49cc0f14c3ce11e793d0902ab1ee2f84686de72cca6ee418e2de6552588523bc429', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:20:27', '2022-01-17 02:20:27', '2023-01-17 09:20:27'),
('4bb817088be84ff8ab240f4656df62ec5eae0e6cf2bdb6d447ab1f26895e45238120567be4bbecf2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:05', '2022-01-16 21:46:05', '2023-01-17 04:46:05'),
('4bfe2e33eecbbb1eba9276e31721ab9e1235fc72186139ebd0ec76f170385b933e99a6c7c3a842af', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:51:38', '2022-01-20 18:51:38', '2023-01-21 01:51:38'),
('4c76365268864a273bf8af04ee294c4bb5c595878c5887410d1d55891c3a0f0854a61cf045189681', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:06:54', '2022-01-19 19:06:54', '2023-01-20 02:06:54'),
('4c9e8b3030c5b742ad425d8282822d3b6fcea930886bd8662b9436ea374045a2040253273716bb8f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:51:24', '2022-01-20 18:51:24', '2023-01-21 01:51:24'),
('4de0fcc11daf312024f8d7c846c3184ee62fc024ce053eb85d25f7c4b566d3286a6e1a6efd44a839', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:44:51', '2022-01-17 20:44:51', '2023-01-18 03:44:51'),
('4fc3fa84b9627e671ea35292b7bf68a3478c23bd842d4c6cdaf9ca75a00917ea1a9202fc7f29488b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 19:38:17', '2022-01-16 19:38:17', '2023-01-17 02:38:17'),
('4fe210dbbb5a8c6df43470a2d96bd892aa55c757e54a0e0f08cfd4baf9c66e2615bc66de037c39da', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:45:03', '2022-01-17 20:45:03', '2023-01-18 03:45:03'),
('50b195878c9457f7f070b91a180ae3020b1531ccd7352acc1e6ba36d9dca4e08d58ecec6e075d9b1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:09:18', '2022-01-19 18:09:18', '2023-01-20 01:09:18'),
('50cc794f5b14d3b7290c2b173b845ec85f96b31a1e06a795458469872e0f2ce3ad68a705acdcd3fc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:21:14', '2022-01-21 21:21:14', '2023-01-22 04:21:14'),
('5151c1510485f4767953feeb577ddf33d2a7f33e0810de0d83c3e58fe7ee17d07e9f1e5d7c177fdb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:06:42', '2022-01-19 20:06:42', '2023-01-20 03:06:42'),
('51d01a621d16a395d3d2d5f451df7cd4aeeb868d8d69716895569a11a495b5270a08c44acc547e7c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:11:04', '2022-01-19 19:11:04', '2023-01-20 02:11:04'),
('53018dcba10341ad427d10049b6a9762b483ae5ac3560a2bfe89b9a58ada5e4570ec407877e5b41e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 00:45:26', '2022-01-19 00:45:26', '2023-01-19 07:45:26'),
('537e764fde8ebfbdac8a8df3775a0049a42b1c73617e54b2aaa8c950debb1d0e220784ef16ab65be', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:46:57', '2022-01-19 20:46:57', '2023-01-20 03:46:57'),
('5445b63149d6d43ceabaf71d31415b1a88fd7f6a9493a844c382a76396d530bd465e3078e0d67ec1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:07:25', '2022-01-16 21:07:25', '2023-01-17 04:07:25'),
('55517b9f9e9efba811d89311bb675efd7cd5042eaf454eafb07aba2649f1bf91b3849bf9d31dc7ca', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:36:21', '2022-01-19 19:36:21', '2023-01-20 02:36:21'),
('5568cfe300c82153a0346ac168a43e229ece6260b056f9eb678fb08a69bf29e50a28c98d2746538a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:12:20', '2022-01-16 21:12:20', '2023-01-17 04:12:20'),
('5606d549fabe2aa6b141a8fad307b30c6ca5e521a3b903d0969ab75dd0333986ff33bc0e31e1cbfb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:13:10', '2022-01-19 19:13:10', '2023-01-20 02:13:10'),
('5c463453000dd85e2079ec949953fda406e6dacca7b2e2ad9cf11865a9fb8256752e765cfce7e8b7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:09:07', '2022-01-20 20:09:07', '2023-01-21 03:09:07'),
('5e5e2f7ab05f5d8eba3340f135c0611740ec326de9a3a45c4a9bc70a93914d46b66ca99f7693cc42', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:16:56', '2022-01-19 19:16:56', '2023-01-20 02:16:56'),
('5ed1cb6cd7bef702e947e38c92db0986dc5f63ff3c88ac3e660eb35fca7dcc67f2dd432eba1cc060', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:56:09', '2022-01-19 18:56:09', '2023-01-20 01:56:09'),
('602569bd40b37a2969ffe54f13f661babf13737629230ca6b1053dadba7fb90dff81f534a2c8e4ec', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:44:27', '2022-01-19 19:44:27', '2023-01-20 02:44:27'),
('6226febdb29c99bbdb44dd0fe4e61f8b324fc492a4ab4ffe83dc6b1904a5379b555c2d1b82e089f7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:11:02', '2022-01-17 00:11:02', '2023-01-17 07:11:02'),
('62a254f97a6d753faaf4f6f657d45e9628ae36a89c00c158d08bfac51a3cc1221e67d32fcc5c61a4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:58:53', '2022-01-19 18:58:53', '2023-01-20 01:58:53'),
('62dc3f129a95dae0e59b88b192659dac924af8e840b63392bf23a57f8788db42f4e93ce6430b94b1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:29:46', '2022-01-19 19:29:46', '2023-01-20 02:29:46'),
('6407fa62d228ec5ae3180af763b6f5b7236e592627aa85dc7463e046cf1a70802d4474fbe262ef3b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:10:15', '2022-01-19 19:10:15', '2023-01-20 02:10:15'),
('6564f40289fb9e2a2f4408fa4c17057c637a4bdf1e84212c4048b7ac303202558ef72b2a55f41efd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:55:34', '2022-01-20 18:55:34', '2023-01-21 01:55:34'),
('657f2d591687d299a5cfd7d443fd4919dcff5b942982eb5827f7c026114e681085d5e9320b28b5b0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:41:26', '2022-01-17 00:41:26', '2023-01-17 07:41:26'),
('65b3fe98dcaba1e61f8caac7d6d73f4b1755f5942673b69a7e10e3e9ac94c1440a7ba37f983845f3', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:01:59', '2022-01-21 21:01:59', '2023-01-22 04:01:59'),
('65f8957f226b70a87f331d8186e39f817652859331d2dfd064710432759013a11a4d8c0882e66c38', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:22:19', '2022-01-20 18:22:19', '2023-01-21 01:22:19'),
('664f22722fb56a6b673847956f39519dd9fe6a2b3ccfb197147b65d700bff32e05e105e03957ff53', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:04', '2022-01-15 00:51:04', '2023-01-15 07:51:04'),
('68231633f4c1abfe60c305956d6363c385dc2c3d6e22e84eb5baf2dd2555eb32bf675acc1b0dbfd4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:08:00', '2022-01-19 20:08:00', '2023-01-20 03:08:00'),
('69061b34c631612e88aac8bd6416b99845c3741e83bcd8e844e506c8e904ec6983fa0c10b5bc09aa', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:13', '2022-01-16 21:46:13', '2023-01-17 04:46:13'),
('6dfbd7f27e89207b5fbe775ac5a8e39959447051b17eea6ced868382be5570b289fd0a7f9da652b1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:56:58', '2022-01-17 20:56:58', '2023-01-18 03:56:58'),
('6fc3f361d238a241acdf4d185768a0bb6a0818e4f6a5d8a0f2d5a45e55e9915d44fdb56915626942', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:54:44', '2022-01-20 18:54:44', '2023-01-21 01:54:44'),
('6fcb10067947e42392ccd94de16dff2893d0187fe1b4b0bd679fe8aece3bd537125c99c93da04aad', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:57:37', '2022-01-19 19:57:37', '2023-01-20 02:57:37'),
('713bae2ff8085381c91193e091b0033002dba166c617bb791634fa9a5e8544121335e3801f3b46b9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:14:26', '2022-01-17 02:14:26', '2023-01-17 09:14:26'),
('72d251dba5734787e0071e23e1109fffd646900811c18394e8950c18216f7890d99b3e5ae1399660', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:41:13', '2022-01-20 18:41:13', '2023-01-21 01:41:13'),
('72f42506c64210b4286686cc84cfa2e93087bbc7a61ab3aca5aad2ec0c32caae629bce52c5b00b1f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:27:21', '2022-01-19 19:27:21', '2023-01-20 02:27:21'),
('73b2d48dcd259a40b8b57fb8b32ec128695fc5be13bc9d11abedb795e1232283f0e0e0114338d72b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:40:37', '2022-01-17 00:40:37', '2023-01-17 07:40:37'),
('74b0901baf220344d955981b2eae44f0623fbc994beaf13cca9a696d5436b055ca032aa804f20389', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:18', '2022-01-16 21:48:18', '2023-01-17 04:48:18'),
('74fa0d121cc67f2b561935d4515d02edda71ae4dfa542dedbb6e9ca2466bb37014ecdd67432c59d5', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:50:05', '2022-01-20 18:50:05', '2023-01-21 01:50:05'),
('75c4c8e42233a5c808bc14a3a0d08d8d4d077859b75bfe7a7cb29463720bcfc518101e92e22f90c4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 23:44:48', '2022-01-20 23:44:48', '2023-01-21 06:44:48'),
('77ae51d78514b2f3e01193a1eb4251345cb72e5a0c5ae7f7ed9df5c67d19b1ffcda34177ef07244c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:25:36', '2022-01-19 19:25:36', '2023-01-20 02:25:36'),
('789ec829c22ed51c07dab0565aafa11a2b5c52725a1d8ad11060822ed4c75d21cf239f385d0afec7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:12', '2022-01-16 21:46:12', '2023-01-17 04:46:12'),
('78c131537cd2a9c2397db4b2594c80f0ff680e249a04db306bf37d40723def10ebde66b3a3ed326f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:10', '2022-01-16 21:46:10', '2023-01-17 04:46:10'),
('78ead85a808a559e11b0dfb3b8417c1b96ddadecb2f97901a0c6c6236cf8b90408c32c2f3cc9201f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 01:14:40', '2022-01-17 01:14:40', '2023-01-17 08:14:40'),
('79d5478fc3925d7ada2dee306dff084466d696d903eafe793c46b7408eb897341c4c2269cdaccefb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:14:17', '2022-01-17 02:14:17', '2023-01-17 09:14:17'),
('7b86c5afbc50adac7ca5b558ada8f39f60d73d30170ec5c7d8685134b22f6645df939bb70f30fdb8', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:00:20', '2022-01-19 20:00:20', '2023-01-20 03:00:20'),
('7cfa5dbd6f1f4fc26e4766de191fc32c53743e59b69310f73f80605ea244baec7f6bb63c274092b0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:40:52', '2022-01-19 19:40:52', '2023-01-20 02:40:52'),
('7d483d9cc43bdc2f7b8f0598591946768e84fa36718b8bd8f670aab280f10817c28bfb3b187539dc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:54:13', '2022-01-19 18:54:13', '2023-01-20 01:54:13'),
('7d5617ffb037d4ddb22c5c65a04f87adcd693187e3cf458b22d7334387ff6f6b1121e9151a452b71', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:49:58', '2022-01-20 18:49:58', '2023-01-21 01:49:58'),
('7d734652474dd970f3982980612dca3ff22cc92bf1894c6082bd7d452fa27e7319e9fe5cef27da4b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:45:26', '2022-01-17 20:45:26', '2023-01-18 03:45:26'),
('7da30276e968300d5a4cc0e5d9b4f85aeb5be5ac182c9ab68df8452f5322e2527d99452bb26079c2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:53:25', '2022-01-20 18:53:25', '2023-01-21 01:53:25'),
('7f57c4717b72c37ca96ae2e2845c18d55b066ccf2707e7c4d1cb7272e418aac5ccbea24f88646df0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:23:07', '2022-01-20 18:23:07', '2023-01-21 01:23:07'),
('808d7b795bb99ba007a4c5e557a4ba2a3ee0952f6048e26b5df54722f1515a60371502a3cabb2f09', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:07:16', '2022-01-16 21:07:16', '2023-01-17 04:07:16'),
('810a1dbd3803cdd2859c726fc3cc3193169e2c9e8c4995ca4aae45ed3ba9596412c9544a1e5946fa', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:10', '2022-01-15 00:51:10', '2023-01-15 07:51:10'),
('830969db34995459525621b1d81c82dad88f20c835a2491277b3fce5b73aeeca1654ab0058ad8c59', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:21:23', '2022-01-17 00:21:23', '2023-01-17 07:21:23'),
('84de6630a09a79ff6dfc17830adcb5df9097698070f4c8c3164397f6d950579be2fd5159d78f104e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:27:09', '2022-01-16 21:27:09', '2023-01-17 04:27:09'),
('854241426806665dc2b4a1d9110d335efd0dc0647d7947a3edad0559f1bc2abad6fe2e13da89185d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:11:21', '2022-01-17 00:11:21', '2023-01-17 07:11:21'),
('85c79342b4b128eff1067dbb65149f579220874aad6f7d329ab58ed183d7bf901599fc34b203ae54', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 21:00:27', '2022-01-17 21:00:27', '2023-01-18 04:00:27'),
('88c505df1b9c6f2919d02254faf7a10265c79f364afaf97a28f69b8b734edd03c2e417b187f6f032', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:50:00', '2022-01-19 18:50:00', '2023-01-20 01:50:00'),
('89df3e7266d29d417b8b1523fa293e9a920e769d364f5186e5f9cfe02b7bf37853c26d883b93f510', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:54:28', '2022-01-20 18:54:28', '2023-01-21 01:54:28'),
('8d8f5b876173c106d14601648635fd77a12214e1d8c2efc766a3df52428fc13a2f643ce70c102070', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:45:25', '2022-01-16 20:45:25', '2023-01-17 03:45:25'),
('8edc7f5622e0045764544cc4284f2a2d60e9225bd0e9b8f8b484009711a563ba890a0c95b4bfead4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 21:12:51', '2022-01-20 21:12:51', '2023-01-21 04:12:51'),
('8ffa10ccb68f2583920b6afd6e5fd34e53567ce82573fcb4f9f8f270a72a34eaa2bd4b486703d32b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 19:54:27', '2022-01-20 19:54:27', '2023-01-21 02:54:27'),
('90ec59428dad2831b57e0b3333cf98b28b381804a58b5972279e024b0bea1dfa066e0ac56129ed4f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:15:27', '2022-01-19 19:15:27', '2023-01-20 02:15:27'),
('9198c5b8980c7cf548f890f0a6a6a5aa5ab14414ef06c2025ea60a38fc7e35efe2ebb126a264dc17', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:10:48', '2022-01-20 20:10:48', '2023-01-21 03:10:48'),
('922080ba93efd9890dd1c9e5f07bce8ca5729acefa3e857b937d05793162e30a42593ab06b08bf42', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-15 01:46:36', '2022-01-15 01:46:36', '2023-01-15 08:46:36'),
('92c34f2e597db99ab33606d0560441478cf392b284ff8d09dc63b94e24b25c9b068aa78275e65147', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:36:25', '2022-01-19 20:36:25', '2023-01-20 03:36:25'),
('92c6bdcfb5bfa5f1386ef1b7c7933afde515ce97750450563b60d1e2f4fb28d827957f1477101795', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:12:50', '2022-01-16 21:12:50', '2023-01-17 04:12:50'),
('93e4ebc83b0d490b74c51e54b39149a1729d481fd3b3d7f7c9859daba526587fc87a4a41ae577585', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:12:19', '2022-01-16 20:12:19', '2023-01-17 03:12:19'),
('94e4606d04028be1852619a7cab552a2b96c4f22d34da1798b9e8addd0a8735257323e7deede4ae6', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:35:10', '2022-01-19 19:35:10', '2023-01-20 02:35:10'),
('955fdfbd5aa468cd7f2f06850af103c6e8b3fa88e1bc24bfd17a1599bf853c5c1aa9bfc10a95af2a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:44:10', '2022-01-17 02:44:10', '2023-01-17 09:44:10'),
('97a3ef6905ecf013bb9d98eaa35063c21410aca15d4f4ef0446c81dc2c1284c5fda5b779c84a18c2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:24:50', '2022-01-16 20:24:50', '2023-01-17 03:24:50'),
('9845433e64fabc355ab37fba85c2a770209b1db391a4236e3028c209bb2307560b356fb1d2064a8c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:45:49', '2022-01-17 00:45:49', '2023-01-17 07:45:49'),
('99577fe07fc64f47d244f2a99627ac4d20ccecd9bb9309e2ad76c320bf208da55d996956bfde9f0a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:13:47', '2022-01-17 02:13:47', '2023-01-17 09:13:47'),
('99eef7d23039fd95d76fb412312128e72bb5fce9049b6ce18a051e5e3d3667ca9b6eedc54fb9d666', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:11:24', '2022-01-19 19:11:24', '2023-01-20 02:11:24'),
('9b0786f9dcf7439a3a0f51a8867e60904358e5dd85c11c5af892a30bd63377d6c5a4ed4d6148f383', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:46:25', '2022-01-17 20:46:25', '2023-01-18 03:46:25'),
('9b3fef1fa56b8c2b4ce941be4c90fb37517d15a587a4b023286977393637bd9ef9860e181bb793bd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 20:30:44', '2022-01-21 20:30:44', '2023-01-22 03:30:44'),
('9cb40541879e9e3775ae140a20882b121a39353cb1c120b1b156349fedff1e221a870712a7e66cbc', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:26', '2022-01-16 21:48:26', '2023-01-17 04:48:26'),
('9cc4bcb093c71bc9208b323489d7de1f9e9a3222366fecc75138a107ae220e303b52f776ce01f3fb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:12:00', '2022-01-16 21:12:00', '2023-01-17 04:12:00'),
('9cd81e5768918013bcb63b77f437a9a5c0e81651959145fedf314f12f8093474b85ffb531531e21b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 02:25:53', '2022-01-21 02:25:53', '2023-01-21 09:25:53'),
('9cf113654fa66395276e10ddef6b3e8c885843d23c844022e645051b7793fb6bb16c7f5b71321099', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:17:31', '2022-01-19 19:17:31', '2023-01-20 02:17:31'),
('9d87e23ec8d70707ddfd814920df3aa5ad5cef17cc55e3019e03985414c8c5d250f6c9a3fceb2cfe', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:19:27', '2022-01-19 19:19:27', '2023-01-20 02:19:27'),
('a158d53e64c31f4d4deb0c81bb19aa7fe09a48ab6dd7fff94afab71a2fd2201b9e1e003add759894', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:29:08', '2022-01-19 20:29:08', '2023-01-20 03:29:08'),
('a45b6c28f7bab01e658cdc2ca97fd26257481b9a47d71bef9deab784b0a4d1a27645ba12e78c8ce4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:00:07', '2022-01-19 20:00:07', '2023-01-20 03:00:07'),
('a4c8910baf1c20a9991f872c59e18734685e2bd8f3204317582bc2ea348a103cc78a8348b91edf03', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 19:45:57', '2022-01-20 19:45:57', '2023-01-21 02:45:57'),
('a5f6c012e23d965fc9e1ed45120d0611f72dab075c152dee0c068e1a7f960ef7216270538a82dfb2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:33:30', '2022-01-17 02:33:30', '2023-01-17 09:33:30'),
('a6dc8d6084d351759ecdfacd757eed7089671f832e73c159d396f6b05872a418d1648941cf0c7813', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 22:25:30', '2022-01-16 22:25:30', '2023-01-17 05:25:30'),
('aa6259eb37b6c6face801dcfc1ad9061009649cf6e17198f2d9c7c8d37453c23029ab83c07693c3b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 19:57:37', '2022-01-16 19:57:37', '2023-01-17 02:57:37'),
('ab7dd3acbcc1c1282fab26d081927dd79665fc7d49b27d1e8aebd6f19da38987cc1b48639d1247de', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 18:43:25', '2022-01-16 18:43:25', '2023-01-17 01:43:25'),
('ac2b742506b84aa42e98c57cb115167176cc4e2d91b12c1e2e2592038a8cacdf756c29cf173b0786', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:44:51', '2022-01-17 00:44:51', '2023-01-17 07:44:51'),
('ac3106f8e7b8c0c389094fa6f37a586a2fcfbafcdf312b7647967be78136ca47153d3d2b7ef843c9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 19:05:17', '2022-01-20 19:05:17', '2023-01-21 02:05:17'),
('ac55fd14908fbd1eacb8612d90bfa6fe6931273907837500f1795aeb16eaa500f9d23fe5df6d6463', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:42:46', '2022-01-20 18:42:46', '2023-01-21 01:42:46'),
('ad4372eaad19c6ddf60ab8732cff660edf99f7372c4179dfa9414ed7b1418b6175e60d2071cfda64', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:14:40', '2022-01-17 00:14:40', '2023-01-17 07:14:40'),
('ad771738009b7610e006cf06680d6b44d6eb778bd8e400833f50654f86f351407f8e201f178268d5', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:45:19', '2022-01-16 20:45:19', '2023-01-17 03:45:19'),
('ae1763d67270c9602007357d57b279bf6b4fba147c996703bcd8a275ee033cfd1e06e4613bfbf363', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 21:38:03', '2022-01-20 21:38:03', '2023-01-21 04:38:03'),
('aeb075ca9658bedfef5f36b56dce328ae1880bdfb08e928a894617845b1eac6ba89607040dfb6b4e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:02:53', '2022-01-21 21:02:53', '2023-01-22 04:02:53'),
('b00077250eafedafc60d373ec24f3469ffac4bc7b7edd2c38bdfb3572cb5c2c546a46cd6316d8706', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:51:55', '2022-01-19 19:51:55', '2023-01-20 02:51:55'),
('b0bf81c81f638b86052f7a4022070dd4b538aef6156c35ccbe1c9f8e759cb30000fa23219d35dcf3', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 21:36:35', '2022-01-20 21:36:35', '2023-01-21 04:36:35'),
('b15d23496bc5e66751a93129e38c002e475aa33962096a5c815b3b7ed231d6291394ff864182c38e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:48:18', '2022-01-16 21:48:18', '2023-01-17 04:48:18'),
('b18d1cc2bc37158385e7ac0a26e4713efdc2cb4c5a4f535da1d3e8729d43cf3efe39c61c6ba1cda7', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:24:41', '2022-01-16 20:24:41', '2023-01-17 03:24:41'),
('b1ee252132c7b0d72f3c04f4cbaccb3a2ec3d4f7a3155d5772a109daf64e5c5e2baca2ae1a233dc2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:44:09', '2022-01-16 20:44:09', '2023-01-17 03:44:09'),
('b28a7d2456c6251e1a8eb0f71e3ce85f4fcb17170fd1813309432fd63347ba8ecbc4e56c24637b2c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:27:39', '2022-01-19 19:27:39', '2023-01-20 02:27:39'),
('b5601d8c83debe2165a9bc5771873bc26fe1805583670def251831478789bde4d6cd7533301c9331', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 02:53:33', '2022-01-19 02:53:33', '2023-01-19 09:53:33'),
('b6584c64e3fd38f49b37b349b8982be663d003dcfb4b9990b88cc9187574ca956628f0057f8fb342', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:52:40', '2022-01-19 19:52:40', '2023-01-20 02:52:40'),
('b682ea60a744097a74949eb88122630831c80be811238e9932a846d4044c278dc10b1c3a3e9d3e13', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:25:02', '2022-01-19 18:25:02', '2023-01-20 01:25:02'),
('b6d5ab580c202c1228b12edc6ffcf5f604de22739b5cd5ab781d240672a033c1151f87f3257c56af', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:25:03', '2022-01-19 19:25:03', '2023-01-20 02:25:03'),
('b7914d00be69a18aae31d2929f00f961405086715c4bb9710ff8b0927b24e5d9267d41fad3c2768f', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:19', '2022-01-15 00:51:19', '2023-01-15 07:51:19'),
('b94b96118df8245d3bba82ff8bab6b191553d724ef9dc4bcc3e120a00d9b23edd22abcfd6301a430', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:10', '2022-01-16 21:46:10', '2023-01-17 04:46:10'),
('b966b6e482868156b752eb5e5d2cfe56db18bd496a5e23c0eb0b8740496ce7a668c4435ccfe8eac9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:40:14', '2022-01-17 00:40:14', '2023-01-17 07:40:14'),
('ba13bd0c83a59e3756787d07fa2d19dfcd847367cdb99f54fe6cdcb2ee482e4f0c320070669748bd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:09:23', '2022-01-19 19:09:23', '2023-01-20 02:09:23'),
('babd9ffc69c6afa94131d33784347ac9be38be54994a2f15853378826e0ea16b7d2e5fd292c30106', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:14:06', '2022-01-16 21:14:06', '2023-01-17 04:14:06'),
('bd814378f542c6bf505366fc60b12d948763a9bb49817fddbada6dd6841ad12b259e33ec0657bc6b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:12:37', '2022-01-16 20:12:37', '2023-01-17 03:12:37'),
('beab3ac2a019927e46a280846876447bf498f6e3ca41694b708784f6024a10360a1681eb1b93a543', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:12', '2022-01-16 21:46:12', '2023-01-17 04:46:12'),
('bfd0cc2338ca8c6c83a0b1178f20a5e9a127be16cbeede802f63c710808b7d88c09af78433080a81', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:00:37', '2022-01-19 19:00:37', '2023-01-20 02:00:37'),
('c096fe22099fdc7ab63734294140d6c1cc79cb351974176bee200b0f6c2abf35bde9abb43e9139ad', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:41:27', '2022-01-20 18:41:27', '2023-01-21 01:41:27'),
('c2010dbaa4f8cde28b49e85338c20c808e6faf3150bb5d5a8eae2b1358ec33dcb19d2e01a2ed4881', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:43:33', '2022-01-19 19:43:33', '2023-01-20 02:43:33'),
('c23072f2195c3fa96465d7aef2b689b7d7ea23a3f56fbccc214550a5a75e9de0f22ebf0f7a274af4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:49:17', '2022-01-19 20:49:17', '2023-01-20 03:49:17'),
('c233c0439572caf357e3e4a9fde733038c4e02fb85d292c02f82c11da1a4f6645857bd2dc971cc6a', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-18 00:36:28', '2022-01-18 00:36:28', '2023-01-18 07:36:28'),
('c2f58c87bf52126c7c4142e8ffb038b9db5a415504150c3a0e6787f9332b993e77d59822dfef832b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 19:39:45', '2022-01-16 19:39:45', '2023-01-17 02:39:45'),
('c309560cef2568ff4c7fad265d800491105988c6530bae8d8d91c61dc035bca03984ec1a4cb4c649', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:59:24', '2022-01-19 18:59:24', '2023-01-20 01:59:24'),
('c5cdeff8298bb08569dbab500129f33b9a6fc9b725068a6068160b9b20322ff444b6c16c6abd00f8', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:33:45', '2022-01-17 02:33:45', '2023-01-17 09:33:45'),
('c7ae46d9bc40ef993470811be8987483f97b900d00c87086621a5d7f1cb03f2aca727a82d8f5f7f6', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:09', '2022-01-15 00:51:09', '2023-01-15 07:51:09'),
('c8e5ca9a977cfc3bf015b284f0c67b02695a7b3125bb48c2ced4d655c59096e0396ff65e3e35249d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:46:11', '2022-01-16 21:46:11', '2023-01-17 04:46:11'),
('c969a1756843b87da4ef2a37284c2e7caae60e9bd315b0be96612725e94813552f489c3a29970248', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:36:32', '2022-01-17 20:36:32', '2023-01-18 03:36:32'),
('cabdc93bc451450ba069feb242619ea3538d1c5a127bd247ce571497b17073dd14ef46c62ca41453', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:47:17', '2022-01-15 00:47:17', '2023-01-15 07:47:17'),
('cc266fb3c9a76ef2515ef3cc761420f72712ec776ca1b7fafbc1d360c9a98c0d84dbb38b0595c4ac', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:39:36', '2022-01-20 18:39:36', '2023-01-21 01:39:36'),
('cd87a8b98984082c7e032131e51007260d712a38e987266dba5dd4b1f4463559f428bb4f2774ec22', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:34:05', '2022-01-19 19:34:05', '2023-01-20 02:34:05'),
('ce9770bef748d3c0da0e52d652533f6642f33eb162cf2ebe892959be4219f721767da6ce46ad0ff2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:54:02', '2022-01-20 18:54:02', '2023-01-21 01:54:02'),
('ceac63f5d295f5273e84fa933be83bdb491099a7ddf2db741acccf7faf0f588271d565a2e84f82b2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:48:25', '2022-01-19 19:48:25', '2023-01-20 02:48:25'),
('d1a5b35fb0e496bd57eae7a4d758c8218f40f9642811d22f56b676b591dc49981c1b2ebe79eaacbd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:46:13', '2022-01-19 19:46:13', '2023-01-20 02:46:13'),
('d1fc408edd969c091733789073093e4f9b3168c6b76e8295ccec4101d9c52242abf5f67ccb4b9cd6', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:54:01', '2022-01-19 18:54:01', '2023-01-20 01:54:01'),
('d2615a83bfdc1bf94539320bc88d6b321073dd865165aab3db9d333d9147fe5d52d80de3f6cd0fc1', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:05', '2022-01-15 00:51:05', '2023-01-15 07:51:05'),
('d28ffc3c512675179095fd6000a04778458f6c0cb6c52c07e663a2fbf95d0c245dc4e89e5c2de33e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:28:13', '2022-01-19 20:28:13', '2023-01-20 03:28:13'),
('d30e9c09c7bfc5e89446c062323a3ce73a6344ee3cf155e2cf2be3be43094f6fcd8811bb78c2c37e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:00:35', '2022-01-19 20:00:35', '2023-01-20 03:00:35'),
('d3c89383492fc2174632d893c84ee61d183ac2d7e7ffad792e23c5e79c0197eb39c36dad4a6c476f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:36:20', '2022-01-19 19:36:20', '2023-01-20 02:36:20'),
('d5304195100f4782118a17e1af3d5011347fbed6615719bd2f4ad7aaf5bbad8c889bb340e019cf82', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:18:13', '2022-01-19 19:18:13', '2023-01-20 02:18:13'),
('d5606cdddec4950399ebd2383d1e6db447339e6a7e16d1d02375998f8b9309e765b3bfa59e337128', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:07:31', '2022-01-17 00:07:31', '2023-01-17 07:07:31'),
('d7b8839eaf1c1bc0f1aec71b9cd15d9ac6c9170ea39fca08d0f485196d3e4ef389f8f3cd1816d6ac', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:06:31', '2022-01-20 20:06:31', '2023-01-21 03:06:31'),
('d977392f8f0e7890739a19a0c129bfa4047f212e3a06aee25191a340b1f7cf9a37c1da6c55425d55', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:05:28', '2022-01-16 21:05:28', '2023-01-17 04:05:28'),
('da8d6b61159033d7b36028147a23543e72b190443ac4ff449d84e64cfd741b03307b03a5f6c079a4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:13:08', '2022-01-20 20:13:08', '2023-01-21 03:13:08'),
('dab278fd474cde6bf33999f2976160aa678049a47f549fc5dd9271fdb4a7f312f7642ad6ffa30231', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:50:57', '2022-01-19 19:50:57', '2023-01-20 02:50:57'),
('daf922e3ee5ef0c41e4c7eb144c4b14da89730aab9d41d9a393eb85115005b4d25962d63ae1c95c6', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 21:00:32', '2022-01-17 21:00:32', '2023-01-18 04:00:32'),
('dc8c0f1585b156944a95dd6d4d4dea388e92e47de96dfe8854a3c74cdba0c54650c299ebecc9b162', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:24:11', '2022-01-17 00:24:11', '2023-01-17 07:24:11'),
('dd18035b617bd36d4ffbe042791fcb3fe706ecc8fa4138dd9cad504f093bacc91523ff22c3a02cbd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:16:57', '2022-01-19 19:16:57', '2023-01-20 02:16:57'),
('dd3e9c33396d053852056b8c46f43081540918dedf111d9acb8f1bda01aff6d0294b1da56a9dcbbb', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 18:16:37', '2022-01-21 18:16:37', '2023-01-22 01:16:37'),
('dd4597968a80faf01ad38460f068bfe92dc31f1a32026361bf8b5da854ceeee206c4045396b06324', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 20:58:56', '2022-01-21 20:58:56', '2023-01-22 03:58:56'),
('de1c230c232b0a88add9221811f4ac86517de1af257862386896f9f637d46f6b0660be4f42d96553', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:39:53', '2022-01-17 20:39:53', '2023-01-18 03:39:53'),
('dffc0c37ae26d9105fb100583a0a873d1e6240314556cac827971bb71c28af002145d14076d8df4f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:36:07', '2022-01-19 19:36:07', '2023-01-20 02:36:07'),
('e132b1188614737a92c54c876b2cc186160ee1b6a5e2b0a7ec364306578e21dd341c5e519d8568dd', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 21:12:14', '2022-01-20 21:12:14', '2023-01-21 04:12:14'),
('e27302bf1174db9ff493f4b9ef899a7f39014028a2f67565b45db96d290926084d85560e2966facf', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:47:51', '2022-01-16 21:47:51', '2023-01-17 04:47:51'),
('e298ddd200ebd63bbf8387951c1d579673cfc11cd1c71e850ef1633e1e4aaf2fd9ef92ee4bcf927f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 20:04:55', '2022-01-19 20:04:55', '2023-01-20 03:04:55'),
('e3186656116c25e5ff5275961b48fa0097c1fc4f320218a0fbfa3b0d41124059e0bee4e327c149e2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 00:07:10', '2022-01-17 00:07:10', '2023-01-17 07:07:10'),
('e43a6801bc418c5b5553c704d95a452c24f34b4002f514f57167b9db1d5f3b7ed16294b0cdc9799e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:25:51', '2022-01-19 19:25:51', '2023-01-20 02:25:51'),
('e59552d4a236bd0965befddc8f2007c64d9ca2ce9b7ce43b5becb028379c6d23de04aa54bafe03aa', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:29:05', '2022-01-19 19:29:05', '2023-01-20 02:29:05'),
('e798c6dce4ef17c08face9792979549e5d15e8f3f47efd85c6c2c62b12a6d0418f1d42fae325b14f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:09:17', '2022-01-19 18:09:17', '2023-01-20 01:09:17'),
('e873a7adb1ed2eb094ca180b3c63b851e003520a738e7ac09f93c1272d5628cb77deb61c03115858', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:12:41', '2022-01-16 21:12:41', '2023-01-17 04:12:41'),
('e88851991396474ff007da14a3123dfdc10e1be4a7cbada1175e7fda214561d71c7ae761ee9af09d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 20:46:15', '2022-01-17 20:46:15', '2023-01-18 03:46:15'),
('e95cbc9b01be01bd89cd70824c5f696edc453be953a38c5a86e500c33a63932978aa513401a1be66', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:24:05', '2022-01-19 19:24:05', '2023-01-20 02:24:05'),
('ebd01dd1c781351e1facd3d840cdec10ae1c572894f909b8ae7ff5487bae57ed6dee04d7dc1c256c', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:22:44', '2022-01-20 18:22:44', '2023-01-21 01:22:44'),
('ec8a9add583d49d33683159621e8cf1968f19a7d3bfc8e0df4c29dd76592f1f7a692dacc4e031773', 1, 1, 'Personal Access Token', '[]', 0, '2022-01-15 00:51:40', '2022-01-15 00:51:40', '2023-01-15 07:51:40'),
('ed445610f294a86b5d4115f9753a8df3b889f69d3b56d0120b6a90641f2da16074dabb5cd73676d9', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 22:21:14', '2022-01-20 22:21:14', '2023-01-21 05:21:14'),
('edf75f7803e5d5d4ce10e3dbeeb91102f4520e42624126d21e39dea070e044672d78b09cb4e06699', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:20:38', '2022-01-20 20:20:38', '2023-01-21 03:20:38'),
('ee26557972a8ff15b0b0c7ef695453245f8e90f7bcf08b21f2fa50aacfbc4e2c160fe2c6bb6ff7e1', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:13:56', '2022-01-16 20:13:56', '2023-01-17 03:13:56'),
('ee6a00e67010e219567e623c11f4c8434950389bcf638858a24d54f9aaaa52d74f77275dea1f5a64', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:40:13', '2022-01-20 18:40:13', '2023-01-21 01:40:13'),
('eec3bbffe1bceb712b084667872f46e2f10a5ccb9acc816b1fae62f3a434de9b76f57af32c0b9579', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 20:44:33', '2022-01-16 20:44:33', '2023-01-17 03:44:33'),
('f02c18e3fea810532282ab5fc6402a0830e9788457a28043ba10b329e48200f42e18bf36eda68573', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:54:54', '2022-01-19 19:54:54', '2023-01-20 02:54:54'),
('f13586d28c2ee7d89e3c6e55c9567435f55b10a260f67fcc33f2d93326bac64ec86827790bd960de', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 20:32:14', '2022-01-21 20:32:14', '2023-01-22 03:32:14'),
('f1e53df4b350c52ad21397c77e047f87d2abcbb43b90dcb8fe0d86c6a976f072c640809e3db22a7b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 21:01:31', '2022-01-17 21:01:31', '2023-01-18 04:01:31'),
('f3c30bc047346f3d7c5cc15a521d48a139bd8c37330fcf1a85ee8cc0655ff70c9f75db28816d4105', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 19:54:56', '2022-01-16 19:54:56', '2023-01-17 02:54:56'),
('f479f8d47f69ca6608c109bba47f9082dbbcd30ea4373364a0faf68834e07a7d3cf49b1f0fca750b', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:47:54', '2022-01-19 19:47:54', '2023-01-20 02:47:54'),
('f4b7dfb4f856d405bcb5f16cb985279478384e65f83b8577eac5c2bbff874cbf0c4b14adb79ddb2f', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:53:49', '2022-01-19 19:53:49', '2023-01-20 02:53:49'),
('f565376fa7919c52fcba5aaadf5d1de2065513f1dc908a3368ed3af71b5b9bf47cfbae8586d16b94', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:26:10', '2022-01-16 21:26:10', '2023-01-17 04:26:10'),
('f6457482ef8f706def3674f4f11925dbc8db21bc9c1c6d663f55294c75b692659ccbc8eb336f0ce0', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:18:46', '2022-01-17 02:18:46', '2023-01-17 09:18:46'),
('f75957cf489ceae20734d261fd15b10d6c3e9837172e5781294f9739ee47af9b79f70ad83768c735', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:25:30', '2022-01-21 21:25:30', '2023-01-22 04:25:30');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('f7b4657d2a6c654ee6328c6c081b654ef3fc1dcca1269655386a750b70ce873d42e4ac460075b8e4', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:06:38', '2022-01-19 19:06:38', '2023-01-20 02:06:38'),
('f8f1cad65eaf44c6be622ec788162331cd050672eee42b4f2b8963a09f8c7a77e099200a8fecc8c2', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-16 21:28:54', '2022-01-16 21:28:54', '2023-01-17 04:28:54'),
('fa6e82c6ccb3b261a9ceee01591b43de784e7dc764e7259d2a154229a71d101bf698539269a5dbda', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-21 21:21:42', '2022-01-21 21:21:42', '2023-01-22 04:21:42'),
('fb120e48d8185442211539d453db04927fbf67a185ce5e96c050449627c94dbfe15e40cce79ebe5e', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-17 02:15:43', '2022-01-17 02:15:43', '2023-01-17 09:15:43'),
('fbd8add2ad325b10164966b50b03568e9f2773cf3ad3eec32e87e4cbfe0877badededcc9b16e8fde', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 18:31:29', '2022-01-19 18:31:29', '2023-01-20 01:31:29'),
('fca2c8b9abb096fcd470c9994a96280f2c6f227215b35f447bc9266bc8cbc0a2261e408ea9a4016d', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 18:49:45', '2022-01-20 18:49:45', '2023-01-21 01:49:45'),
('fe3645e704696e92eedf8b77f057d8cae39286a0f85f393297ef9638bc22df05877af26b52f9a329', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-20 20:24:43', '2022-01-20 20:24:43', '2023-01-21 03:24:43'),
('fedb401d630962a2d627f79daf465b1e85db5819a11ad57d9198416ce46ca038304bb17d78af6328', 1, 1, 'travelapptrungnam', '[]', 0, '2022-01-19 19:53:25', '2022-01-19 19:53:25', '2023-01-20 02:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'zr761VgoFl5p9MtVtj87aIBu4Y2k9vTXce3zh0H9', NULL, 'http://localhost', 1, 0, 0, '2022-01-15 00:47:02', '2022-01-15 00:47:02'),
(2, NULL, 'Laravel Password Grant Client', 'nFPTCDgCd5gP78WXqGjieSITen4hIGwKA5zszSAq', 'users', 'http://localhost', 0, 1, 0, '2022-01-15 00:47:02', '2022-01-15 00:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-15 00:47:02', '2022-01-15 00:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gmail` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `gmail`, `avatar`) VALUES
(1, 'Trung Nam', '$2a$12$/EEImPJ89J5vNpwJMWBPPO2jvCcBbaOm1/xD2WcZP4YiFZ4pBrj3C', 'namn71201@gmail.com', ''),
(2, 'Võ Chí Hiếu', '$2y$10$JQllq2rgsny3Tg9SXxX/A.Vg2gwn4/U4E7CAGs6xcpx7fu9UnBWMu', NULL, NULL),
(3, 'Võ Chí Hiếu', '$2y$10$oAHXDDXgucK23Vea/8H7BurxEdh5TkEtGDc9JyiQgFu22m.4JJKhq', 'namn71202@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdatve`
--
ALTER TABLE `chitietdatve`
  ADD KEY `idve` (`idve`),
  ADD KEY `loaive` (`loaive`);

--
-- Indexes for table `chitietloaive`
--
ALTER TABLE `chitietloaive`
  ADD UNIQUE KEY `idlocation` (`idlocation_detail`,`loaive`),
  ADD KEY `idloaive` (`loaive`);

--
-- Indexes for table `datve`
--
ALTER TABLE `datve`
  ADD PRIMARY KEY (`idve`),
  ADD KEY `datve_ibfk_2` (`iduser`),
  ADD KEY `datve_ibfk_3` (`idmagiamgia`),
  ADD KEY `datve_ibfk_1` (`idlocation_detail`);

--
-- Indexes for table `detail_location`
--
ALTER TABLE `detail_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `huongdanvien` (`idhdv`),
  ADD KEY `detail_location_ibfk_1` (`idlocation`);

--
-- Indexes for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_ibfk_1` (`category`);

--
-- Indexes for table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datve`
--
ALTER TABLE `datve`
  MODIFY `idve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_location`
--
ALTER TABLE `detail_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `huongdanvien`
--
ALTER TABLE `huongdanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdatve`
--
ALTER TABLE `chitietdatve`
  ADD CONSTRAINT `chitietdatve_ibfk_1` FOREIGN KEY (`idve`) REFERENCES `datve` (`idve`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitietloaive`
--
ALTER TABLE `chitietloaive`
  ADD CONSTRAINT `chitietloaive_ibfk_1` FOREIGN KEY (`idlocation_detail`) REFERENCES `detail_location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `datve`
--
ALTER TABLE `datve`
  ADD CONSTRAINT `datve_ibfk_1` FOREIGN KEY (`idlocation_detail`) REFERENCES `detail_location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `datve_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `datve_ibfk_3` FOREIGN KEY (`idmagiamgia`) REFERENCES `magiamgia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_location`
--
ALTER TABLE `detail_location`
  ADD CONSTRAINT `detail_location_ibfk_1` FOREIGN KEY (`idlocation`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_location_ibfk_2` FOREIGN KEY (`idhdv`) REFERENCES `huongdanvien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

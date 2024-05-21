-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2024 lúc 06:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `auction_ooad`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `biddings`
--

CREATE TABLE `biddings` (
  `bidding_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `bidding_amount` float NOT NULL,
  `bidding_date_time` datetime NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `biddings`
--

INSERT INTO `biddings` (`bidding_id`, `customer_id`, `product_id`, `bidding_amount`, `bidding_date_time`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1000000, '2024-05-19 04:21:46', 'null', 'Active', '2024-05-18 21:21:46', '2024-05-18 21:21:46'),
(2, 2, 1, 2000000, '2024-05-19 04:25:16', 'null', 'Active', '2024-05-18 21:25:16', '2024-05-18 21:25:16'),
(3, 2, 1, 3000000, '2024-05-19 14:48:17', 'null', 'Active', '2024-05-19 07:48:17', '2024-05-19 07:48:17'),
(4, 2, 7, 1000000, '2024-05-19 16:30:54', 'null', 'Active', '2024-05-19 09:30:54', '2024-05-19 09:30:54'),
(5, 2, 7, 2000000, '2024-05-19 16:31:02', 'null', 'Active', '2024-05-19 09:31:02', '2024-05-19 09:31:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billings`
--

CREATE TABLE `billings` (
  `billing_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_amount` float NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expire_date` date NOT NULL,
  `cvv_number` varchar(5) NOT NULL,
  `card_holder` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billings`
--

INSERT INTO `billings` (`billing_id`, `customer_id`, `purchase_date`, `purchase_amount`, `payment_type`, `card_type`, `card_number`, `expire_date`, `cvv_number`, `card_holder`, `delivery_date`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-05-19', 13000000, 'Deposit', 'Credit card', '1234567890654321', '2028-12-01', '123', 'NGUYEN QUANG THANH', '2024-05-19', 'null', 'Active', '2024-05-18 21:20:09', '2024-05-18 21:20:09'),
(2, 2, '2024-05-19', 2000000, 'Winners', 'Credit card', '1234567890123456', '2027-07-01', '123', 'HOANG MANH QUAN', '2024-05-19', 'null', 'Active', '2024-05-19 09:35:06', '2024-05-19 09:35:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blockchains`
--

CREATE TABLE `blockchains` (
  `blockchain_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` text NOT NULL,
  `data` text NOT NULL,
  `previous_hash` text NOT NULL,
  `hash` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blockchains`
--

INSERT INTO `blockchains` (`blockchain_id`, `timestamp`, `data`, `previous_hash`, `hash`, `created_at`, `updated_at`) VALUES
(1, '0', '01/01/2023', '0', 'd2960287ada5710e230713589663a20831a9c4209c834c5313868d2b926e6a49', '2024-05-19 09:32:04', '2024-05-19 09:32:04'),
(2, '2024-05-19 16:32:04', '\"Customer with ID [2] Named Customer2 has won bidding on amount: [2000000] for Product named L\\u00c0NG VEN S\\u00d4NG and Product ID [7] with bidding starting from 100000 and ending on 2000000 \"', 'd2960287ada5710e230713589663a20831a9c4209c834c5313868d2b926e6a49', '44b9928ddbc51b3a2bf5b2cade385145ae85e8764026c6a9604bfcb78e14005d', '2024-05-19 09:32:04', '2024-05-19 09:32:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_icon` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đồng Hồ', '1716054218.jpg', 'Danh mục Đồng Hồ trong hệ thống đấu giá online của chúng tôi là điểm đến lý tưởng cho những ai đam mê sưu tầm và sở hữu những chiếc đồng hồ đẳng cấp. Tại đây, bạn sẽ tìm thấy Bộ sưu tập phong phú, Chất lượng đảm bảo, Giá cả cạnh tranh, Thông tin rõ ràng, Dịch vụ chuyên nghiệp', 'Active', '2024-05-18 17:43:38', '2024-05-18 17:43:38'),
(2, 'Biển Số', '1716056197.jpg', 'Biển Số là nơi bạn có thể tìm thấy các loại biển số phong phú và đa dạng, phục vụ cho nhu cầu đăng ký và thay thế biển số xe của bạn. Tại đây, chúng tôi cung cấp:\n- Biển số chất lượng cao, đáp ứng các tiêu chuẩn quốc gia.\n- Các mẫu biển số phong phú, từ biển số thông thường đến biển số đặc biệt.\n- Dịch vụ đăng ký và giao nhận nhanh chóng, tiện lợi.', 'Active', '2024-05-18 18:16:37', '2024-05-18 18:16:37'),
(3, 'Đồ Cổ', '1716056441.png', 'Danh mục Đồ Cổ là nơi bạn có thể khám phá những bí mật của quá khứ và sở hữu những mảnh kỷ vật độc đáo. Tại đây, chúng tôi cung cấp:\r\n- Các mẫu đồ cổ từ các thời kỳ lịch sử khác nhau, từ vật dụng hàng ngày đến những hiện vật quý giá.\r\n- Đồ cổ chất lượng, được kiểm định và bảo quản cẩn thận, đảm bảo giá trị lịch sử và tình trạng tốt nhất.\r\n- Sự đa dạng trong các loại đồ cổ, từ đồ gốm sứ, đồ nội thất, đồ trang trí đến các bức tranh và sách cũ.', 'Active', '2024-05-18 18:20:41', '2024-05-18 18:20:41'),
(4, 'Tiền Seria Đẹp', '1716056589.png', 'Danh mục Tiền Tệ với Seria Đẹp là nơi bạn có thể khám phá và sưu tầm những đồng tiền có seri số độc đáo và ấn tượng. Tại đây, chúng tôi cung cấp:\r\n- Các loại tiền tệ từ khắp nơi trên thế giới, từ các quốc gia lớn đến những quốc gia nhỏ.\r\n- Tiền có seri số đẹp, hiếm và độc đáo, làm tăng giá trị sưu tầm và độ phong phú của bộ sưu tập.\r\n- Tiền tệ được bảo quản cẩn thận và có nguồn gốc xác định, đảm bảo tính chất và giá trị của mỗi một đồng.', 'Active', '2024-05-18 18:23:09', '2024-05-18 18:23:09'),
(5, 'Sim Số Đẹp', '1716056717.png', 'Danh mục Sim Số Đẹp là nơi bạn có thể tìm kiếm và sở hữu những sim số độc đáo và ấn tượng. Tại đây, chúng tôi cung cấp:\r\n- Các sim số với các dãy số đẹp, dễ nhớ và phong thủy tốt, phục vụ cho nhu cầu liên lạc và kinh doanh của bạn.\r\n- Sim số may mắn với các dãy số lặp, số cuối giống nhau hoặc số có thứ tự đặc biệt, tạo điểm nhấn và độc đáo cho số điện thoại của bạn.\r\n- Sim số được kiểm định về tính hợp pháp và chất lượng, đảm bảo tính minh bạch và đáng tin cậy.', 'Inactive', '2024-05-18 18:25:17', '2024-05-18 18:25:17'),
(6, 'Tác phẩm Nghệ thuật', '1716056957.jpg', 'Danh mục Tác Phẩm Nghệ Thuật là nơi bạn có thể khám phá và sở hữu những tác phẩm độc đáo và ấn tượng. Tại đây, chúng tôi cung cấp:\r\n- Tác phẩm đa dạng từ tranh vẽ, điêu khắc đến ảnh nghệ thuật và đồ trang trí.\r\n- Sự kết hợp của sáng tạo và cảm xúc trong từng tác phẩm.\r\n- Tác phẩm được chọn lọc cẩn thận, đảm bảo chất lượng và giá trị nghệ thuật.', 'Active', '2024-05-18 18:29:17', '2024-05-18 18:29:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `landmark` varchar(50) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email_id`, `password`, `address`, `state`, `city`, `landmark`, `pincode`, `mobile_no`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Customer1', 'customer1@gmail.com', '$2y$12$cv4wlbu70XZKLvMURU8FJO2a/hbBNR1vmCLxLrOT2ufdRPlfGX1ne', 'Address 1', 'State 1', 'City 1', 'Landmark 1', '111111', '+841234567890', 'Note 1', 'Active', '2024-05-18 17:20:14', '2024-05-18 17:20:14'),
(2, 'Customer2', 'customer2@gmail.com', '$2y$12$ylrKRxqNJLinT3uob.tIdu.YAeaQMvDoj8O1CNuM4.hL1FnM9d9Pa', '144 Xuân Thủy Cầu Giấy Hà Nội Việt Nam', 'Cầu Giấy', 'Hà Nội', '81', '123', '+8409444271', 'Note 2', 'Active', '2024-05-18 17:20:14', '2024-05-19 09:35:05'),
(3, 'Customer3', 'customer3@gmail.com', '$2y$12$SVnYHMl2HiSnZSifEBitCewsoVtVyAyqrULylt5ejkf7uxwQXfsaK', 'Address 3', 'State 3', 'City 3', 'Landmark 3', '333333', '1122334455', 'Note 3', 'Active', '2024-05-18 17:20:14', '2024-05-18 17:20:14'),
(4, 'Customer4', 'customer4@gmail.com', '$2y$12$B/NvN5uXk5LEZUJN8itIou6jJ6fw58F4Kpy/k.hLD6.FqTKGnIEYG', 'Address 4', 'State 4', 'City 4', 'Landmark 4', '444444', '2233445566', 'Note 4', 'Active', '2024-05-18 17:20:15', '2024-05-18 17:20:15'),
(5, 'Customer5', 'customer5@gmail.com', '$2y$12$Y7OcBexSIo5nZaY1CoBY9.Zwt2Zb8aXFKUyVChrZsSzTcaiFjnptO', 'Address 5', 'State 5', 'City 5', 'Landmark 5', '555555', '3344556677', 'Note 5', 'Active', '2024-05-18 17:20:15', '2024-05-18 17:20:15'),
(6, 'quang thanh', 'thanhaxt342@gmail.com', '$2y$12$0C5K/3ThwSi67IiS7m1HWusqCcxNWdzDajlNRuWimI550s4YPXCjy', NULL, NULL, NULL, 'Landmark 6', '456', '+8409444271', NULL, 'Active', '2024-05-19 11:58:03', '2024-05-19 11:58:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `employee_type` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `login_id`, `password`, `employee_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$iFj0bJOobYLbzlzDHUCe1OnpElbm7IzJUhGzAMjwhZ.zYhd8yKxia', 'admin', 'active', '2024-05-18 17:20:15', '2024-05-18 17:20:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_date_time` datetime NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message_date_time`, `product_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-05-19 04:18:31', 1, 'chào bạn', 'Seller', '2024-05-18 21:18:31', '2024-05-18 21:18:31'),
(2, 2, 1, '2024-05-19 04:18:39', 1, 'sản phẩm này có bảo hành không', 'Seller', '2024-05-18 21:18:39', '2024-05-18 21:18:39'),
(3, 1, 2, '2024-05-19 04:19:02', 1, 'sản phẩm này chỉ còn duy nhất 1 cái thôi nhé', 'Customer', '2024-05-18 21:19:02', '2024-05-18 21:19:02'),
(4, 2, 1, '2024-05-19 04:19:09', 1, 'oki bạn ơi', 'Seller', '2024-05-18 21:19:09', '2024-05-18 21:19:09'),
(5, 2, 1, '2024-05-19 14:46:50', 1, 'hello', 'Seller', '2024-05-19 07:46:50', '2024-05-19 07:46:50'),
(6, 1, 2, '2024-05-19 14:46:58', 1, 'hiii', 'Customer', '2024-05-19 07:46:58', '2024-05-19 07:46:58'),
(7, 2, 1, '2024-05-19 14:47:30', 1, 'edededede', 'Customer', '2024-05-19 07:47:30', '2024-05-19 07:47:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_07_191449_create_blockchains_table', 1),
(5, '2024_05_07_191813_create_categories_table', 1),
(6, '2024_05_07_191917_create_customers_table', 1),
(7, '2024_05_07_192001_create_products_table', 1),
(8, '2024_05_07_192034_create_employees_table', 1),
(9, '2024_05_07_192045_create_biddings_table', 1),
(10, '2024_05_07_192100_create_messages_table', 1),
(11, '2024_05_07_192130_create_billings_table', 1),
(12, '2024_05_07_192145_create_payments_table', 1),
(13, '2024_05_07_192322_create_winners_table', 1),
(14, '2024_05_08_095643_create_homes_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `bidding_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_amount` float NOT NULL,
  `paid_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `payment_type`, `product_id`, `bidding_id`, `paid_amount`, `paid_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Bid', 1, 1, 1000000, '2024-05-19', 'Active', '2024-05-18 21:21:46', '2024-05-18 21:21:46'),
(2, 2, 'Bid', 1, 2, 2000000, '2024-05-19', 'Active', '2024-05-18 21:25:16', '2024-05-18 21:25:16'),
(3, 2, 'Bid', 1, 3, 3000000, '2024-05-19', 'Active', '2024-05-19 07:48:17', '2024-05-19 07:48:17'),
(4, 2, 'Bid', 7, 4, 1000000, '2024-05-19', 'Active', '2024-05-19 09:30:54', '2024-05-19 09:30:54'),
(5, 2, 'Bid', 7, 5, 2000000, '2024-05-19', 'Active', '2024-05-19 09:31:02', '2024-05-19 09:31:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` text NOT NULL,
  `starting_bid` float NOT NULL,
  `ending_bid` float NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `product_cost` float NOT NULL,
  `product_image` text NOT NULL,
  `product_warranty` varchar(100) NOT NULL,
  `product_delivery` text NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `customer_id`, `product_name`, `category_id`, `product_description`, `starting_bid`, `ending_bid`, `start_date_time`, `end_date_time`, `product_cost`, `product_image`, `product_warranty`, `product_delivery`, `company_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Grand Complications 5207G-001', 1, 'Patek Philippe luôn là thương hiệu tiên phong trong việc sáng tạo ra những cỗ máy thời gian cao cấp được trang bị những tính năng phức tạp. Hãng còn sở hữu cả bộ sưu tập mang tên Grand Complications, bao gồm rất nhiều chiếc đồng hồ khiến giới mê đồng hồ phải khao khát và chiếc đồng hồ Patek Philippe Grand Complications White Gold Tourbillon 5207G-001 mà Gia Bảo Luxury muốn giới thiệu tới quý khách hàng dưới đây là một trong những chiếc đồng hồ như thế.', 1000000, 3000000, '2024-05-22 00:00:00', '2024-05-24 00:00:00', 2000000, '[\"1716066732_rolex2.jpg\",\"1716066732_rolex1.jpg\",\"1716066732_rolex3.jpg\"]', '100 years', '3-4 Days', 'Gia Bảo Luxury', 'Active', '2024-05-18 21:12:12', '2024-05-19 07:48:17'),
(2, 2, 'Hoàng đế chi bảo', 3, '\"Hoàng đế chi bảo\" có nghĩa là ấn của hoàng đế, một trong những chiếc ấn có ý nghĩa quan trọng nhất của triều Nguyễn, chỉ được sử dụng cho các sắc phong và văn bản quan trọng nhất. Đây là chiếc kim bảo lớn và đẹp nhất của triều Nguyễn, được đúc vào năm thứ 4 đời vua Minh Mạng (năm 1823), chất liệu bằng vàng, nặng 10,78 kg. Ấn được truyền từ đời vua này đến đời vua cuối cùng nhà Nguyễn là Bảo Đại.\r\nCác nhà nghiên cứu cho biết \"Hoàng đế chi bảo\" có hình vuông, quai ấn là một con rồng uốn khúc (rồng đoanh), đầu ngẩng cao, mắt nhìn thẳng về phía trước. Đỉnh đầu rồng khắc hình chữ vương; kỳ (vây lưng) và đuôi dựng đứng, vây đuôi uốn cong về phía trước; 4 chân rồng đúc rõ 5 móng, tư thế chống chân xuống mặt ấn rất vững vàng. Mặt dưới của ấn khắc 4 chữ triện “Hoàng đế chi bảo”. Mặt trên của ấn, phía 2 bên quai khắc nổi 2 dòng chữ: “Minh Mạng tứ niên nhị nguyệt sơ tứ nhật cát thời chú tạo” (đúc vào giờ tốt ngày mồng 4 tháng 2 năm Minh Mạng thứ 4). “Thập thành hoàng kim, trọng nhị bách thập lạng cửu tiền nhị phân” - (Đúc bằng vàng, trọng lượng 280 lạng 9 chỉ 2 phân).', 7000000, 0, '2024-05-19 00:00:00', '2024-05-29 00:00:00', 8000000, '[\"1716105585_anh-00-1666251817535382110196.jpg\",\"1716105585_anh-000-1666251817429236097673.jpg\",\"1716105585_anh-0-16662518175901299578488.jpg\"]', '100 years', '10-14 days', 'VJCO GROUP', 'Active', '2024-05-19 07:59:45', '2024-05-19 08:00:46'),
(3, 2, 'Đêm đầy sao', 6, 'Đêm đầy sao (tiếng Hà Lan: De sterrennacht) là một bức tranh của họa sĩ hậu ấn tượng người Hà Lan Vincent van Gogh. Được vẽ vào tháng 6 năm 1889, bức tranh miêu tả khung cảnh bên ngoài cửa sổ phòng bệnh của ông ở Saint-Rémy-de-Provence, miền Nam nước Pháp về đêm, mặc dù ông đã vẽ bức tranh vào ban ngày qua trí nhớ. Đêm đầy sao nằm trong bộ sưu tập của Bảo tàng Nghệ thuật Hiện đại ở thành phố New York, một phần trong Di vật của Lillie P. Bliss, từ năm 1941. Bức tranh Đêm đầy sao là một trong những tác phẩm nổi tiếng nhất của Van Gogh, đánh dấu bước ngoặt mang tính quyết định chuyển sang sự tự do sáng tạo to lớn hơn trong nghệ thuật của ông.', 9000000, 0, '2024-05-19 00:00:00', '2024-05-23 00:00:00', 10000000, '[\"1716106063_starry-night-1093721-960-720-7985.jpeg\",\"1716106063_van-gogh-5268.jpg\",\"1716106063_photo-1-15584089153861139507813.jpg\"]', '100 years', '7-10 days', 'QUAN HOANG', 'Active', '2024-05-19 08:07:43', '2024-05-19 08:08:04'),
(4, 1, 'TRANH MỘC THẠCH TÔ ĐÔNG PHA', 3, 'Mộc thạch\" là tranh duy nhất của văn hào thời Tống Tô Đông Pha\r\nTác phẩm còn có tên \"cây khô và đá lạ\", được vẽ trên giấy, dài 50 cm, ngang 26 cm. Họa sĩ khắc họa các sự vật đơn giản, bên phải là cây trụi lá, các cành tạo hình như sừng hươu. Dưới gốc là tảng đá hình thù kỳ lạ, gần giống ốc sên. Một vài nhành cây mọc sau hòn đá.', 1000000, 0, '2024-05-19 00:00:00', '2024-05-25 00:00:00', 100, '[\"1716106200_to-dong-pha-6769-1681978433.jpg\",\"1716106200_B\\u1ee9c-tranh-c\\u1ed5-Trung-Qu\\u1ed1c-G\\u1ed7-v.jpg\"]', '100 years', '4-5 days', 'CHINA', 'Pending', '2024-05-19 08:10:00', '2024-05-19 08:10:00'),
(5, 2, 'Graff Diamonds Hallucination', 1, 'Những người lần đầu tiên chạm mắt vào chiếc đồng hồ đá quý Graff Diamonds Hallucination cũng sẽ phải trầm trồ trước vẻ đẹp tuyệt tác của nó, cũng như phải nhướng mày với cái giá 55 triệu đô, cho đến nay đây là giá niêm yết cao nhất trong lịch sử ngành đồng hồ. <br>Giá trị đáng kinh ngạc của nó có thể được hiểu ngay qua 110 carat kim cương đa dạng màu sắc, cực kỳ quý hiếm được đính trên lớp vỏ đồng hồ bằng bạch kim của nó. Các chuyên gia trang sức hàng đầu có thể liệt kê rất nhiều loại đá quý vang danh thế giới đã được đính trên nó như: ancy Vivid Yellow, Fancy Intense Pink, Fancy Intense Blue, Fancy Light Pink, Fancy Light Grey Blue, Fancy Intense Blue, Fancy Green và Fancy Orange.', 55000000, 0, '2024-05-19 00:00:00', '2024-05-25 00:00:00', 50000000, '[\"1716106630_293bf0_1e1a47e9453a41709bb8f97fe0c2363a~mv2.jpg\",\"1716106630_293bf0_b3c2a847b50546d5a730d10b34353ef6~mv2.jpg\",\"1716106630_293bf0_5306a160a5d649bcaab8774ff4ebe47d~mv2.jpg\",\"1716106630_293bf0_25fac2d059d7455d82f11243bca79275~mv2.jpg\",\"1716106630_293bf0_1fc61b175d274af88e612a26dc6ab579~mv2.jpg\"]', '100 years', '7-10 days', 'QUAN HOANG', 'Active', '2024-05-19 08:17:10', '2024-05-19 08:18:13'),
(6, 1, 'NGỌC TỶ CỦA VUA CÀN LONG', 3, 'Ngọc tỷ thuộc về Vua Càn Long (nhà Thanh, Trung Quốc), một trong những vị hoàng đế có thời gian trị vì lâu nhất lịch sử phong kiến Trung Hoa.', 10000000, 0, '2024-05-23 00:00:00', '2024-05-31 00:00:00', 1000, '[\"1716107327_03-1-image.jpg\",\"1716107327_cvth201610076ebfe085-df2c-470e-be4c-d4ec18d92f34.jpg\",\"1716107327_106d622t5677l0.jpg\"]', '100 years', '4-5 days', 'VJCO', 'Active', '2024-05-19 08:28:47', '2024-05-19 08:31:11'),
(7, 3, 'LÀNG VEN SÔNG', 6, 'Tranh được vẽ bằng những màu sắc đơn giản chủ yếu là tông màu trắng đen và những điểm nhấn nhẹ nhàng tạo hồn cho bức tranh. Tranh thủy mặc khắc họa lại hình ảnh thiên nhiên, non nước, hoa lá, chim muông, đất trời… Khi nhìn vào bức tranh thủy mặc, người ta cảm nhận được một điều gì đó rất hoang sơ, nguyên thủy nhưng không thiếu đi vẻ nên thơ, trữ tình và có chiều sâu.', 100000, 2000000, '2024-05-19 00:00:00', '2024-05-24 00:00:00', 1000, '[\"1716108235_hinh-anh-tranh-thuy-mac-trung-quoc-co-nghe-thuat-doc-dao-cua-nguoi-tau-8.jpg\"]', '100 years', '3-4 Days', 'VJCO', 'Active', '2024-05-19 08:43:55', '2024-05-19 09:31:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('87qPw5KXi2ucgYYzH7ZXzGqQ9brC0hlZq6GP6osO', NULL, '192.168.1.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV3RUcFJpUXRoZVB1MWlZRWFoWW9weVhXWmFybmZSa1dId3NYVUJHbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvZW1wbG95ZWVfYWNjb3VudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fXM6MTE6ImN1c3RvbWVyX2lkIjtpOjI7czoxMToiZW1wbG95ZWVfaWQiO2k6MTt9', 1716111917),
('BdRGnxAUdrOnthwvV6kfWAd7exfddTrXh988S68M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2gwODZhVE9ZYmRKN2xlSFNzMGJvdXVMNTVKNm9WbEJQaEVPMG13TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcl9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1716122470),
('dPDxG0UBfyqiDVBzYGFFPvAbwogQHwG4DBmFKvFc', NULL, '192.168.1.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTW5NaHpRQVllbmpvM2hidGlwTjVoa05uUWtUYXRkOGk5NTZCV2Z4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvYXVjdGlvbi9VcGNvbWluZyUyMEF1Y3Rpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMToiZW1wbG95ZWVfaWQiO2k6MTtzOjU6ImFsZXJ0IjthOjA6e319', 1716111679),
('eQQWvPIHlKuRxfkeH7F0FJBNKECkzdT6e9TyheUX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRjBXVnRQT3hybE5MT0R2bU5VOUo4RFgyd3JkcTVCVGc5U1dMMFhKNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcl9sb2dpbiI7fXM6NToiYWxlcnQiO2E6MDp7fXM6MTE6ImVtcGxveWVlX2lkIjtpOjE7fQ==', 1716119832),
('ETt5bEotIk48LmKppQcem8IbeeOoS0RMU4pWNkPd', NULL, '192.168.1.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNU9OVGh3Qk14aExob0tuSldXdUlxcE90S0RkZXhGTWU1bjFXbmdWZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvcHJvZHVjdC81Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJhbGVydCI7YTowOnt9czoxMToiY3VzdG9tZXJfaWQiO2k6Mjt9', 1716112408),
('JeQiwaDQyk9qeWtp6D5GWNTxUN2quDCxbjsgfSzO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiczJkeDF5MFVVblRJSnVKVnMySk9xUFFUYnJzNFo3RGJOVjA0TU8yayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6ImFsZXJ0IjthOjA6e31zOjExOiJlbXBsb3llZV9pZCI7aToxO30=', 1716122457),
('JSq1nnAxSKmKvcdxLBO2IIiumEKY203pe14vbo4p', NULL, '192.168.1.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic3l0WExacXNDVVNhUkQ2MlBlUEszeVkzeGVuVnRJWVZFR05sRWVGTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvcHJvZHVjdC83JTIwJTdEJTdEIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMToiY3VzdG9tZXJfaWQiO2k6MjtzOjU6ImFsZXJ0IjthOjA6e319', 1716111715),
('m2IFK1SniJUzSZLAgXBdl3FOdb8oo2oyMlAuGT5Z', NULL, '192.168.1.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ3dNSjBPSXJ4SkJoZmk4dERNYUY0RlJ1RGh4WEljOTNCamh3RFp1SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvY2xvc2VfYmlkZGluZ19wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMToiY3VzdG9tZXJfaWQiO2k6MjtzOjU6ImFsZXJ0IjthOjA6e319', 1716111871),
('yc183H5mWuRbV8aymC80PK5To6mY206gt4Lyx2xn', NULL, '192.168.1.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZGxZZThIdG1HM3pNU2ZsdFRWVEt6V3puTklYZ3htTnBka1E0aGVsTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xOTIuMTY4LjEuMTQxOjgwMDAvdmlld193aW5uZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMToiZW1wbG95ZWVfaWQiO2k6MTtzOjU6ImFsZXJ0IjthOjA6e319', 1716112631);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `winners`
--

CREATE TABLE `winners` (
  `winner_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `winners_image` varchar(100) NOT NULL,
  `winning_bid` float NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `winners`
--

INSERT INTO `winners` (`winner_id`, `product_id`, `customer_id`, `winners_image`, `winning_bid`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 2, '1716111305.png', 2000000, '2024-05-19', 'Active', '2024-05-19 09:32:04', '2024-05-19 09:35:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `biddings`
--
ALTER TABLE `biddings`
  ADD PRIMARY KEY (`bidding_id`),
  ADD KEY `biddings_customer_id_foreign` (`customer_id`),
  ADD KEY `biddings_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `billings_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `blockchains`
--
ALTER TABLE `blockchains`
  ADD PRIMARY KEY (`blockchain_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_email_id_unique` (`email_id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employees_login_id_unique` (`login_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `messages_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_customer_id_foreign` (`customer_id`),
  ADD KEY `payments_product_id_foreign` (`product_id`),
  ADD KEY `payments_bidding_id_foreign` (`bidding_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_customer_id_foreign` (`customer_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`winner_id`),
  ADD KEY `winners_product_id_foreign` (`product_id`),
  ADD KEY `winners_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `biddings`
--
ALTER TABLE `biddings`
  MODIFY `bidding_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `billings`
--
ALTER TABLE `billings`
  MODIFY `billing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `blockchains`
--
ALTER TABLE `blockchains`
  MODIFY `blockchain_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `winners`
--
ALTER TABLE `winners`
  MODIFY `winner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `biddings`
--
ALTER TABLE `biddings`
  ADD CONSTRAINT `biddings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `biddings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bidding_id_foreign` FOREIGN KEY (`bidding_id`) REFERENCES `biddings` (`bidding_id`),
  ADD CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `payments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `winners_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

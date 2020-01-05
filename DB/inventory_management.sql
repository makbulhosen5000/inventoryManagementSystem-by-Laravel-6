-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 04:36 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `advance_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `emp_id`, `month`, `status`, `advance_salary`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 'January', '0', '10000', '2019', NULL, NULL),
(2, 1, 'February', '0', '10000', '2019', NULL, NULL),
(3, 1, 'March', '0', '8000', '2019', '2019-12-03 06:06:35', NULL),
(4, 2, 'January', '0', '10000', '2019', '2019-12-03 13:50:03', NULL),
(5, 2, 'February', '0', '10000', '2019', '2019-12-03 13:50:56', NULL),
(6, 4, 'January', '0', '10000', '2020', '2020-01-04 09:41:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `att_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `att_date`, `att_year`, `edit_date`, `attendance`, `month`, `created_at`, `updated_at`) VALUES
(52, 1, '15/12/19', '2019', '15_12_19', 'Absence', 'Dec', '2019-12-15 13:52:12', '2019-12-15 07:52:44'),
(53, 2, '15/12/19', '2019', '15_12_19', 'Absence', 'Dec', '2019-12-15 13:52:12', '2019-12-15 07:52:44'),
(54, 3, '15/12/19', '2019', '15_12_19', 'Absence', 'Dec', '2019-12-15 13:52:12', '2019-12-15 07:52:44'),
(55, 1, '16/12/19', '2019', '16_12_19', 'Absence', NULL, '2019-12-16 08:44:59', NULL),
(56, 2, '16/12/19', '2019', '16_12_19', 'Absence', NULL, '2019-12-16 08:44:59', NULL),
(57, 3, '16/12/19', '2019', '16_12_19', 'Present', NULL, '2019-12-16 08:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `row_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Noha', NULL, NULL),
(3, 'BMW', NULL, NULL),
(4, 'Toyota', NULL, NULL),
(5, 'Mercedes', NULL, NULL),
(6, 'Mercedes', NULL, NULL),
(7, 'Cosmetics', NULL, NULL),
(8, 'Vehicle Instrument', NULL, NULL),
(9, 'Beauty Product', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `phone`, `email`, `address`, `nid_no`, `shop_name`, `account_holder`, `account_no`, `bank_name`, `branch_name`, `city`, `image`, `created_at`, `updated_at`) VALUES
(5, NULL, 'mh akash', '01782283171', 'mhakash5000@gmail.com', 'Brahmanbaria,Cittagong,Bangladesh.', '53-565464646486', 'Shopno', 'akash', '5578764', 'Datch-Bangla', 'Brahmanbaria', 'Brahmanbaria', 'public/customers/cygbWIMhKhXz.jpg', '2019-12-30 16:21:41', NULL),
(6, NULL, 'Jyoti', '01521532765', 'mustarijyoti99@gmail.com', 'Cittagong,Bangladesh.', '53-565464646485', 'Shopno', 'jyoti', '557874', 'Datch-Bangla', 'Cittagong', 'Cittagong', 'public/customers/guJKpiezs3yK.jpg', '2019-12-30 16:26:02', NULL),
(7, NULL, 'Rohim', '01782283175', 'Rohim500@gmail.com', 'Norshigdi', '123', 'sky blue', 'Rohim', '5578764', 'Datch-Bangla', 'Dhaka', 'Dhaka', 'public/customers/5bVl3yT288uK.png', '2020-01-01 14:25:57', NULL),
(8, NULL, 'Rima', '555544544', 'rima444@gmail.com', 'Norshigdi', '53-5654646464844', 'my shop', 'rima', '55787641', 'Datch-Bangla', 'Khulna', 'Norshigdi', 'public/customers/s7tuOAsBbDPl.jpg', '2020-01-01 15:40:25', NULL),
(9, NULL, 'Ria', '01989139570', 'ria100@gmail.com', 'Brahmanbaria,Cittagong,Bangladesh.', '546756458/71', 'Shopno', 'Ria', '55787641', 'Datch-Bangla', 'Brahmanbaria', 'Brahmanbaria', 'public/customers/t1konUnQGzDH.jpg', '2020-01-04 03:25:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `address`, `nid_no`, `experience`, `salary`, `vacation`, `city`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Jyoti', '01521532768', 'mustarijyoti99@gmail.com', 'Brahmanbaria,Cittagong,Bangladesh.', '53-5654646464847', '3 years', '10000', '12', 'Brahmanbaria', 'public/employees/PyP0Y6whKPhJ.png', NULL, NULL),
(3, 'Fahim', '018269646546', 'fahim@gmail.com', 'Norshigdi', '53-5654646464848', '5 years', 'Shopno2', '12', 'Norshigdi', 'public/employees/rwKgcX4Pyz6Y.jpg', NULL, NULL),
(4, 'mh akash', '01782283171', 'mhakash5000@gmail.com', 'Brahmanbaria,Cittagong,Bangladesh.', '53-565464646487', '5 years', '10000', '10', 'Brahmanbaria', 'public/employees/WYFFxQcHZm0b.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `year`, `date`, `created_at`, `updated_at`) VALUES
(1, 'pendrive', '1500 taka', 'December', 2019, '08/12/19', '2019-12-08 11:09:41', NULL),
(2, 'computer', '50000 taka', 'December', 2019, '08/12/19', '2019-12-08 11:11:14', NULL),
(3, 'I-phone', '1050000 taka', 'December', 2019, '08/12/19', '2019-12-08 11:13:04', NULL),
(4, 'pen', '15 taka', 'December', 2019, '08/12/19', '2019-12-08 11:16:35', NULL),
(5, 'Phone', '15000 taka', 'December', 2019, '08/12/19', '2019-12-08 12:08:12', NULL),
(6, 'bike', '200000 taka', 'December', 2019, '08/12/19', '2019-12-08 13:36:02', NULL),
(7, 'Cold Drink', '70 taka', 'December', 2019, '09/12/19', '2019-12-09 01:55:25', NULL),
(8, 'Wifi bill', '1000 taka', 'December', 2019, '09/12/19', '2019-12-09 09:25:57', NULL),
(9, 'Oppo Mobile', '13500 taka', 'December', 2019, '10/12/19', '2019-12-10 10:49:19', NULL),
(10, 'Router', '15000 taka', 'December', 2019, '10/12/19', '2019-12-10 10:52:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_11_25_124012_create_employees_table', 1),
(32, '2019_11_29_134747_create_customers_table', 1),
(33, '2019_11_30_082039_create_suppliers_table', 1),
(34, '2019_12_01_221327_create_salaries_table', 1),
(35, '2019_12_02_125827_create_advanced_salaries_table', 2),
(36, '2019_12_02_130800_create_advance_salaries_table', 3),
(37, '2019_12_03_144455_create_salary_table', 4),
(38, '2019_12_04_035653_create_categories_table', 5),
(39, '2019_12_05_025716_create_products_table', 6),
(40, '2019_12_05_122441_create_products_table', 7),
(41, '2019_12_08_034145_create_expenses_table', 8),
(42, '2019_12_09_095441_create_attendences_table', 9),
(43, '2019_12_12_045059_create_attendances_table', 10),
(44, '2019_12_15_143801_create_settings_table', 11),
(45, '0000_00_00_000000_create_shoppingcart_table', 12),
(46, '2019_12_24_110353_create_orders_table', 12),
(47, '2019_12_24_110704_create_orderdetails_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitcost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(1, 9, 16, '2', '200', '484', NULL, NULL),
(2, 9, 17, '3', '200', '726', NULL, NULL),
(3, 9, 15, '3', '8000', '29040', NULL, NULL),
(4, 10, 16, '2', '200', '484', NULL, NULL),
(5, 10, 17, '5', '200', '1210', NULL, NULL),
(6, 10, 15, '3', '8000', '29040', NULL, NULL),
(7, 11, 15, '4', '8000', '38720', NULL, NULL),
(8, 11, 16, '4', '200', '968', NULL, NULL),
(9, 12, 16, '3', '200', '726', NULL, NULL),
(10, 13, 16, '1', '200', '242', NULL, NULL),
(11, 14, 17, '4', '200', '968', NULL, NULL),
(12, 15, 16, '2', '200', '484', NULL, NULL),
(13, 16, 16, '3', '200', '726', NULL, NULL),
(14, 17, 17, '4', '200', '968', NULL, NULL),
(15, 17, 16, '4', '200', '968', NULL, NULL),
(16, 17, 15, '4', '8000', '38720', NULL, NULL),
(17, 18, 15, '5', '8000', '48400', NULL, NULL),
(18, 19, 16, '4', '200', '968', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(5, NULL, '29/12/19', 'success', '5', '1,000.00', '210.00', '1,210.00', 'handcash', '1000', '210', NULL, NULL),
(6, NULL, '29/12/19', 'success', '5', '1,000.00', '210.00', '1,210.00', 'handcash', '1000', '210', NULL, NULL),
(7, NULL, '29/12/19', 'success', '5', '1,000.00', '210.00', '1,210.00', 'handcash', '1010', '200', NULL, NULL),
(8, NULL, '29/12/19', 'success', '8', '25,000.00', '5,250.00', '30,250.00', 'handcash', '30,250', '00', NULL, NULL),
(9, NULL, '29/12/19', 'success', '8', '25,000.00', '5,250.00', '30,250.00', 'handcash', '30,250', '00', NULL, NULL),
(10, NULL, '30/12/19', 'pending', '10', '25,400.00', '5,334.00', '30,734.00', 'handcash', '30,734', '00', NULL, NULL),
(11, NULL, '30/12/19', 'pending', '8', '32,800.00', '6,888.00', '39,688.00', 'handcash', '39,688', '00', NULL, NULL),
(12, NULL, '31/12/19', 'pending', '3', '600.00', '126.00', '726.00', 'handcash', '726', '00', NULL, NULL),
(13, NULL, '31/12/19', 'pending', '1', '200.00', '42.00', '242.00', 'handcash', '242', '00', NULL, NULL),
(14, NULL, '01/01/20', 'pending', '4', '800.00', '168.00', '968.00', 'handcash', '968', '00', NULL, NULL),
(15, NULL, '01/01/20', 'pending', '2', '400.00', '84.00', '484.00', 'handcash', '968', '00', NULL, NULL),
(16, NULL, '03/01/20', 'pending', '3', '600.00', '126.00', '726.00', 'handcash', '726', '00', NULL, NULL),
(17, NULL, '03/01/20', 'pending', '12', '33,600.00', '7,056.00', '40,656.00', 'handcash', '40,656', '00', NULL, NULL),
(18, NULL, '04/01/20', 'pending', '5', '40,000.00', '8,400.00', '48,400.00', 'handcash', '48,400', '00', NULL, NULL),
(19, NULL, '04/01/20', 'pending', '4', '800.00', '168.00', '968.00', 'handcash', '968', '00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_garage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `category_id`, `supplier_id`, `product_garage`, `product_route`, `buying_date`, `expire_date`, `buying_price`, `selling_price`, `product_image`, `created_at`, `updated_at`) VALUES
(15, 'Gear Level', 'GL', 8, 3, 'hhh', '71', '2019-12-03', '2023-07-13', '5000', '8000', 'public/Products/fXldH.jpg', '2019-12-18 12:12:51', NULL),
(16, 'Fair&Lovely', 'FL', 9, 2, 'A', '51', '2019-12-03', '2026-10-21', '100', '200', 'public/products/AYrYO5yOA0JL0k81Y7K4.jpg', '2019-12-18 12:15:25', NULL),
(17, 'Fair&Handsome', 'FH', 7, 4, '10', '50', '2019-12-02', '2029-06-05', '150', '200', 'public/products/c2ceFhw5jMee857ru5eI.jpg', '2019-12-21 15:48:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `advance_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` int(30) NOT NULL,
  `company_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_logo`, `company_address`, `company_website`, `company_email`, `company_phone`, `company_mobile`, `company_city`, `company_country`, `company_zip_code`, `created_at`, `updated_at`) VALUES
(2, 'CodingDuck', 'public/company/g8ch9dfLPSYp.jpg', 'dfdsf', 'www.codingduck.com', 'mhakash5000@gmail.com', '0218945646', 1782803571, 'Dhaka', 'Bangladesh', '1200', '2019-12-15 17:54:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `address`, `nid_no`, `type`, `shop_name`, `account_holder`, `account_no`, `bank_name`, `branch_name`, `city`, `image`) VALUES
(2, 'mh akash', '01521532761', 'mhakash5000@gmail.com', 'Brahmanbaria,Cittagong,Bangladesh.', '53-5654646464847', '1', 'sky blue', 'mh akash', '5578764', 'Datch-Bangla', 'Brahmanbaria', 'Brahmanbaria', 'public/suppliers/q8LLTwaPNnSn.jpg'),
(3, 'Jyoti', '01521532761', 'mustarijyoti99@gmail.com', 'Cittagong,Bangladesh.', '53-56546464648', '2', 'my shop', 'mh akash', '5578764', 'Datch-Bangla', 'Brahmanbaria', 'Cittagong', 'public/suppliers/lBBYHkgClnda.png'),
(4, 'Rohim', '555', 'rohim500@gmail.com', 'Cittagong,Bangladesh.', '5356546464648', '2', 'my shop', 'korim', '557876r', 'Datch-Bangla', 'Cittagong', 'Cittagong', 'public/suppliers/yu5oubffkE0p.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'mh akash', 'mhakash5000@gmail.com', NULL, '$2y$10$Y5FW9z0QQdq9XgwBgx7MYuxqxEYstHw.KX/w8jkkdH7JwCyK6gQ9G', NULL, '2020-01-01 04:13:10', '2020-01-01 04:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`row_id`,`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

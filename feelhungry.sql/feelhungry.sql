-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 07:28 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feelhungry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(20) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `area`, `city`, `zip`, `avatar`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Moumita', 'Dey', 'moumi@gmail.com', '$2y$10$DajTSt87zlFxZ/Obxz2Z2.LcxDCQ8qHz65YC0ecrCti0S1UoGQg7C', '017xxxxxxxx', '19 Polashi, Kazi Ilias', 'Zindabazar', 'Sylhet', '3100', 'Moumi.jpeg', 2, 'miyiGYYmt2M2VAZuDl6orfkS8pRw9sB3Yua0vhUUp7vfpWvJlzPImb5aVGC3', '2021-03-18 22:53:07', '2021-03-18 22:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(8, 'JiM', 'jim@gmail.com', '+88017XXXXXXXX', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium illo perferendis autem dolorem, earum natus temporibus velit! Voluptates corporis illo aspernatur, incidunt quos cupiditate debitis molestias, aliquam ea quia nemo', '2021-03-18 23:29:59', '2021-03-18 23:29:59'),
(9, 'Rafi Mizan', 'rafimizannur9@gmail.com', '01725585979', 'Get a new chef!', '2021-03-18 23:30:29', '2021-03-18 23:30:29'),
(10, 'Puja', 'puja@gmail.com', '017xxxxxxxx', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium illo perferendis autem dolorem, earum natus temporibus velit! Voluptates corporis illo aspernatur, incidunt quos cupiditate debitis molestias, aliquam ea quia nemo', '2021-03-18 23:30:48', '2021-03-18 23:30:48'),
(11, 'Farhaan Mahbub', 'farhan@gmail.com', '017xxxxxxxx', 'Hey, you there?', '2021-03-18 23:31:33', '2021-03-18 23:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dish_category_id` int(11) NOT NULL,
  `chef_special` tinyint(1) NOT NULL DEFAULT '0',
  `most_loved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `details`, `price`, `photo`, `dish_category_id`, `chef_special`, `most_loved`, `created_at`, `updated_at`) VALUES
(1, 'Ultimate Veggie Pizza', 'The near perfect combination of spiciness and creaminess.', '655', '8.jpg', 1, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, 'Chicken BBQ Cheese Burger', 'The near perfect combination of spiciness and creaminess.', '160', 'D.jpg', 1, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, 'Oven Baked Pasta', 'The near perfect combination of spiciness and creaminess.', '285', '3.jpg', 1, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, 'Chicken Tikka Masala', 'The near perfect combination of spiciness and creaminess.', '310', '4.jpg', 1, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(5, 'Continental Sizzler', 'The near perfect combination of spiciness and creaminess.', '330', 'I.jpg', 1, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(6, 'Achari Paneer Tikka', 'The near perfect combination of spiciness and creaminess.', '120', 'G.jpg', 1, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(7, 'Mexican Chicken Steak', 'The near perfect combination of spiciness and creaminess.', '320', '7.jpg', 1, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(8, 'Ultimate Veggie Pizza', 'The near perfect combination of spiciness and creaminess.', '655', '8.jpg', 2, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(9, 'Margherita', 'The near perfect combination of spiciness and creaminess.', '433', '9.jpg', 2, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(10, 'Pizza Pepperoni', 'The near perfect combination of spiciness and creaminess.', '530', 'F.jpg', 2, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(11, 'Chicken Supreme', 'The near perfect combination of spiciness and creaminess.', '620', '11.jpg', 2, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(12, 'Smoky BBQ', 'The near perfect combination of spiciness and creaminess.', '600', '12.jpg', 2, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(13, 'Hot Mexicana', 'The near perfect combination of spiciness and creaminess.', '630', '13.jpg', 2, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(14, 'Crispy Chicken Burger', 'The near perfect combination of spiciness and creaminess.', '120', '10.jpg', 3, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(15, 'Grilled Chicken Burger(25tk for cheese)', 'The near perfect combination of spiciness and creaminess.', '115', 'H.jpg', 3, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(16, 'Grilled Beef Burger(25tk for cheese)', 'The near perfect combination of spiciness and creaminess.', '120', '2.jpg', 3, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(17, 'Jumbo Burger(Double Cheese)', 'The near perfect combination of spiciness and creaminess.', '210', '3.jpg', 3, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(18, 'Combo Cheese Burger', 'The near perfect combination of spiciness and creaminess.', '240', '4.jpg', 3, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(19, 'Chicken BBQ Cheese Burger', 'The near perfect combination of spiciness and creaminess.', '160', 'D.jpg', 3, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(20, 'Chicken Burger', 'The near perfect combination of spiciness and creaminess.', '110', '6.jpg', 3, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(21, 'Pasta Arrabiata', 'The near perfect combination of spiciness and creaminess.', '210', '6.jpg', 4, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(22, 'Pasta Carbonara', 'The near perfect combination of spiciness and creaminess.', '230', 'C.jpg', 4, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(23, 'Spicy Pasta', 'The near perfect combination of spiciness and creaminess.', '240', '9.jpg', 4, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(24, 'spicy Naga Pasta', 'The near perfect combination of spiciness and creaminess.', '255', '10.jpg', 4, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(25, 'Oven Baked Pasta', 'The near perfect combination of spiciness and creaminess.', '285', 'B.jpg', 4, 0, 1, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(26, 'Pasta Basta', 'The near perfect combination of spiciness and creaminess.', '290', '12.jpg', 4, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(27, 'Pasta Italiano', 'The near perfect combination of spiciness and creaminess.', '295', '12.jpg', 4, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(28, 'Crispy Fried Chicken(2pcs)', 'The near perfect combination of spiciness and creaminess.', '130', '13.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(29, 'Crispy Fried Chicken(4pcs)', 'The near perfect combination of spiciness and creaminess.', '260', '14.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(30, 'Masala Chicken(1pcs)', 'The near perfect combination of spiciness and creaminess.', '70', '1.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(31, 'Masala Wings(1pcs)', 'The near perfect combination of spiciness and creaminess.', '55', '2.jpg', 5, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(32, 'Crispy Strips(2pcs)', 'The near perfect combination of spiciness and creaminess.', '60', '3.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(33, 'Peri Peri Chicken(1pcs)', 'The near perfect combination of spiciness and creaminess.', '130', '4.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(34, 'Crispy Nuggets', 'The near perfect combination of spiciness and creaminess.', '120', '5.jpg', 5, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(35, 'Veg. Sizzler', 'The near perfect combination of spiciness and creaminess.', '150', '6.jpg', 6, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(36, 'Indian Sizzler', 'The near perfect combination of spiciness and creaminess.', '160', '7.jpg', 6, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(37, 'Chinese Sizzler', 'The near perfect combination of spiciness and creaminess.', '180', '8.jpg', 6, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(38, 'Paneer Tandoori Sizzler', 'The near perfect combination of spiciness and creaminess.', '220', '9.jpg', 6, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(39, 'Continental Sizzler', 'The near perfect combination of spiciness and creaminess.', '330', '10.jpg', 6, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(40, 'Tandoori Momos', 'The near perfect combination of spiciness and creaminess.', '70', '11.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(41, 'Tandoori Gobhi Tikkka', 'The near perfect combination of spiciness and creaminess.', '80', '12.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(42, 'Tandoori Aloo', 'The near perfect combination of spiciness and creaminess.', '80', '13.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(43, 'Paneer Tikka', 'The near perfect combination of spiciness and creaminess.', '100', '14.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(44, 'Achari Paneer Tikka', 'The near perfect combination of spiciness and creaminess.', '120', 'G.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(45, 'Malai Paneer Tikka', 'The near perfect combination of spiciness and creaminess.', '160', '2.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(46, 'Soya Chaap', 'The near perfect combination of spiciness and creaminess.', '145', '3.jpg', 7, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(47, 'Woondall Special Family Naan', 'The near perfect combination of spiciness and creaminess.', '425', '4.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(48, 'Plain Naan', 'The near perfect combination of spiciness and creaminess.', '50', '5.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(49, 'Butter Naan', 'The near perfect combination of spiciness and creaminess.', '65', '6.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(50, 'Garlic Naan', 'The near perfect combination of spiciness and creaminess.', '90', '7.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(51, 'Keema Naan', 'The near perfect combination of spiciness and creaminess.', '175', '8.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(52, 'Masala Naan', 'The near perfect combination of spiciness and creaminess.', '140', '9.jpg', 8, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(53, 'Student Platter Meal', 'The near perfect combination of spiciness and creaminess.', '150', '10.jpg', 9, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(54, 'BBQ Chicken Rice Meal', 'The near perfect combination of spiciness and creaminess.', '250', '11.jpg', 9, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(55, 'Chili Chicken Meal(gravy)', 'The near perfect combination of spiciness and creaminess.', '165', '12.jpg', 9, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(56, 'Peri Peri Rice Meal', 'The near perfect combination of spiciness and creaminess.', '270', '13.jpg', 9, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(57, 'Mexican Chicken Steak', 'The near perfect combination of spiciness and creaminess.', '320', '14.jpg', 9, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(58, 'Orio Shake', 'The near perfect combination of spiciness and creaminess.', '150', '1.jpg', 10, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(59, 'Hot Coffee', 'The near perfect combination of spiciness and creaminess.', '90', '2.jpg', 10, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(60, 'Cold Coffee', 'The near perfect combination of spiciness and creaminess.', '110', '3.jpg', 10, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(61, 'Ice Smooothie', 'The near perfect combination of spiciness and creaminess.', '100', '4.jpg', 10, 1, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(62, 'Cappuccino', 'The near perfect combination of spiciness and creaminess.', '80', '5.jpg', 10, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(63, 'Soft Drinks ', 'The near perfect combination of spiciness and creaminess.', '20', '5.jpg', 10, 0, 0, '2018-02-02 02:56:02', '2018-02-02 02:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `dish_categories`
--

CREATE TABLE `dish_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dish_categories`
--

INSERT INTO `dish_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Popular Dishes', 'popular', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, 'Pizza', 'pizza', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, 'Burger', 'burger', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, 'Pasta', 'beef', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(5, 'Fried Chicken', 'fried chicken', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(6, 'Sizzler', 'pasta', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(7, 'Tandoori Starter', 'tandoori', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(8, 'Naan & Paratha', 'naan & paratha', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(9, 'Set Menu', 'set menu', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(10, 'Beverages', 'beverages', '2018-02-02 02:56:02', '2018-02-02 02:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'My order is late', 'Try as we do to get your food to you on time, some things are sadly out of our control, meaning that delivery orders can occasionally be delayed.\n			The ETA can sometimes change but if the restaurant needs to extend the delivery time, hungryhouse will send you a notification.', '2018-02-05 16:19:33', '2018-02-05 16:19:33'),
(2, 'My order is cancelled', 'If an order is unsuccessful or cancelled by the restaurant we will send you an SMS, push or email notification of the cancellation that outlines the next steps.', '2018-02-05 16:19:33', '2018-02-05 16:19:33'),
(3, 'I didn\'t enjoy my food', 'We understand that sometimes food does not arrive as expected and you may not be happy with what you received.\n		\n				It is best to speak to the restaurant directly to discuss the issues with the order and request a replacement or compensation, but we are always more than happy to facilitate that conversation.', '2018-02-05 16:19:33', '2018-02-05 16:19:33'),
(4, 'My food never arrived', 'In the unlikely event your food does not arrive at all, we\'ll speak to the restaurant to work out what happened and confirm the cancellation & refund of the order itself.', '2018-02-05 16:19:33', '2018-02-05 16:19:33'),
(5, 'My order was incorrect', 'Get in touch with us and let us know what was incorrect. We can liaise with restaurant to find a solution.\n\nIf you would prefer a refund, we will request this from the restaurant. From there, our refund process is the same as usual', '2018-02-05 16:19:33', '2018-02-05 16:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `caption`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 'Feel Hungry Gallery Caption 1', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, '2.jpg', 'Feel Hungry Gallery Caption 2', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, '3.jpg', 'Feel Hungry Gallery Caption 3', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, '4.jpg', 'Feel Hungry Gallery Caption 4', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(5, '5.jpg', 'Feel Hungry Gallery Caption 5', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(6, '6.jpg', 'Feel Hungry Gallery Caption 6', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(7, '7.jpg', 'Feel Hungry Gallery Caption 7', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(8, '8.jpg', 'Feel Hungry Gallery Caption 8', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(9, '9.jpg', 'Feel Hungry Gallery Caption 9', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(10, '10.jpg', 'Feel Hungry Gallery Caption 10', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(11, '11.jpg', 'Feel Hungry Gallery Caption 11', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(12, '12.jpg', 'Feel Hungry Gallery Caption 12', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(13, '13.jpg', 'Feel Hungry Gallery Caption 13', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(14, '14.jpg', 'Feel Hungry Gallery Caption 14', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(15, '15.jpg', 'Feel Hungry Gallery Caption 15', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(16, 'm.jpg', 'Latest Photo to the Gallery', '2018-02-17 19:34:32', '2018-02-17 19:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_navs`
--

CREATE TABLE `home_navs` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_navs`
--

INSERT INTO `home_navs` (`id`, `photo`, `nav_text`, `nav_link`, `created_at`, `updated_at`) VALUES
(1, 'pizzaa.jpg', 'Popular Dishes', '/menu#popular', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, 'chicken.jpg', 'Chicken Specials', '/menu#chicken', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, 'popular.jpg', 'Pizza & Burger', '/menu#pizzaburger', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, 'sizzler.jpg', 'Sizzler', '/menu#sizzler', '2018-02-02 02:56:02', '2018-02-02 02:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_15_134650_create_admins_table', 1),
(4, '2018_01_19_132819_create_dish_categories_table', 1),
(5, '2018_01_19_142028_create_dishes_table', 1),
(6, '2018_01_19_161153_create_orders_table', 1),
(7, '2018_01_19_161225_create_teams_table', 1),
(8, '2018_01_19_161240_create_reviews_table', 1),
(9, '2018_01_19_161304_create_website_details_table', 1),
(10, '2018_01_19_161318_create_galleries_table', 1),
(11, '2018_01_19_161333_create_sliders_table', 1),
(12, '2018_01_19_161344_create_home_navs_table', 1),
(13, '2018_01_19_161417_create_loved_dishes_table', 1),
(14, '2018_01_19_161451_create_chef_specials_table', 1),
(15, '2018_01_19_161510_create_socials_table', 1),
(16, '2018_01_19_170802_create_invoices_table', 1),
(17, '2018_01_29_131619_create_contacts_table', 1),
(18, '2018_02_02_125427_create_reservations_table', 2),
(19, '2018_02_05_205505_create_roles_table', 3),
(20, '2018_02_05_220449_create_faqs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart`, `checkout_info`, `total`, `qty`, `status`, `payment_type`, `payment_id`, `payment_number`, `created_at`, `updated_at`) VALUES
(13, 6, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:4:{s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";s:2:\"id\";i:5;s:3:\"qty\";i:1;s:4:\"name\";s:19:\"Continental Sizzler\";s:5:\"price\";d:330;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"I.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"e39b028f8ee23e29ef33fedefc43d889\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"e39b028f8ee23e29ef33fedefc43d889\";s:2:\"id\";i:26;s:3:\"qty\";i:1;s:4:\"name\";s:11:\"Pasta Basta\";s:5:\"price\";d:290;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:6:\"12.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"2a92f1891b7f79640e00fe817d2dcb55\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"2a92f1891b7f79640e00fe817d2dcb55\";s:2:\"id\";i:57;s:3:\"qty\";i:1;s:4:\"name\";s:21:\"Mexican Chicken Steak\";s:5:\"price\";d:320;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:6:\"14.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"906df8b94ae1aab5c455bc21e59905f8\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"906df8b94ae1aab5c455bc21e59905f8\";s:2:\"id\";i:62;s:3:\"qty\";i:1;s:4:\"name\";s:10:\"Cappuccino\";s:5:\"price\";d:80;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"5.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:4:\"Nafi\";s:13:\"billing_lname\";s:6:\"Rumman\";s:13:\"billing_email\";s:14:\"nafi@gmail.com\";s:13:\"billing_phone\";N;s:15:\"billing_address\";s:10:\"12 Swapnil\";s:12:\"billing_area\";s:11:\"Mirzajangal\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:5:\"Moumi\";s:14:\"shipping_lname\";s:3:\"Dey\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:20:\"19 Polashi,Kazi lias\";s:13:\"shipping_area\";s:10:\"Zindabazar\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '1020', 4, 1, 'Bkash', '34354', '017xxxxxxxx', '2021-03-18 23:28:20', '2021-03-18 23:44:10'),
(14, 7, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"446f668dbed93b891cb6d8f673f5bcff\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"446f668dbed93b891cb6d8f673f5bcff\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:25:\"Chicken BBQ Cheese Burger\";s:5:\"price\";d:160;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"D.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"162eec1fc7d6daed0080d4552cb4e7fb\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"162eec1fc7d6daed0080d4552cb4e7fb\";s:2:\"id\";i:61;s:3:\"qty\";i:1;s:4:\"name\";s:13:\"Ice Smooothie\";s:5:\"price\";d:100;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"4.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:8:\"Yasjudan\";s:13:\"billing_lname\";s:4:\"Raba\";s:13:\"billing_email\";s:14:\"raba@gmail.com\";s:13:\"billing_phone\";N;s:15:\"billing_address\";s:29:\"128 Nomi Cottage,Medical Road\";s:12:\"billing_area\";s:9:\"KajalShah\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:3:\"Mim\";s:14:\"shipping_lname\";s:4:\"Noor\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:20:\"19 Polashi,Kazi lias\";s:13:\"shipping_area\";s:10:\"Zindabazar\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '260', 2, 0, 'COD', ' ', '01725585979', '2021-03-18 23:35:40', '2021-03-18 23:43:34'),
(15, 8, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"189825ec9db222952d087173e5646d54\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"189825ec9db222952d087173e5646d54\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:21:\"Ultimate Veggie Pizza\";s:5:\"price\";d:655;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"8.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"e269250b37104147cac7e64060c016e2\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"e269250b37104147cac7e64060c016e2\";s:2:\"id\";i:15;s:3:\"qty\";i:1;s:4:\"name\";s:39:\"Grilled Chicken Burger(25tk for cheese)\";s:5:\"price\";d:115;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"H.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:3:\"Mim\";s:13:\"billing_lname\";s:4:\"Noor\";s:13:\"billing_email\";s:13:\"mim@gmail.com\";s:13:\"billing_phone\";s:11:\"017xxxxxxxx\";s:15:\"billing_address\";s:20:\"19 Polashi,Kazi lias\";s:12:\"billing_area\";s:10:\"Zindabazar\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:4:\"Rafi\";s:14:\"shipping_lname\";s:5:\"Mizan\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:29:\"128 Nomi Cottage,Medical Road\";s:13:\"shipping_area\";s:10:\"Zindabazar\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '770', 2, 0, 'Bkash', '45678', '0175788890', '2021-03-19 02:21:11', '2021-03-19 02:21:11'),
(16, 9, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";s:2:\"id\";i:5;s:3:\"qty\";i:1;s:4:\"name\";s:19:\"Continental Sizzler\";s:5:\"price\";d:330;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"I.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"1822604e4b1bc30b076e342df7fc8117\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"1822604e4b1bc30b076e342df7fc8117\";s:2:\"id\";i:13;s:3:\"qty\";i:1;s:4:\"name\";s:12:\"Hot Mexicana\";s:5:\"price\";d:630;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:6:\"13.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:3:\"Mim\";s:13:\"billing_lname\";s:4:\"Noor\";s:13:\"billing_email\";s:16:\"miiimm@gmail.com\";s:13:\"billing_phone\";s:11:\"017xxxxxxxx\";s:15:\"billing_address\";s:20:\"19 Polashi,Kazi lias\";s:12:\"billing_area\";s:10:\"Zindabazar\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:4:\"Rafi\";s:14:\"shipping_lname\";s:5:\"Mizan\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:10:\"12 Swapnil\";s:13:\"shipping_area\";s:15:\"Noyasarak Point\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '960', 2, 0, 'Bkash', '45678', '017xxxxxxxx', '2021-03-19 03:23:29', '2021-03-19 03:23:29'),
(17, 10, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";s:2:\"id\";i:5;s:3:\"qty\";i:1;s:4:\"name\";s:19:\"Continental Sizzler\";s:5:\"price\";d:330;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"I.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"e269250b37104147cac7e64060c016e2\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"e269250b37104147cac7e64060c016e2\";s:2:\"id\";i:15;s:3:\"qty\";i:1;s:4:\"name\";s:39:\"Grilled Chicken Burger(25tk for cheese)\";s:5:\"price\";d:115;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"H.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:4:\"Naba\";s:13:\"billing_lname\";s:4:\"Noor\";s:13:\"billing_email\";s:14:\"naba@gmail.com\";s:13:\"billing_phone\";s:11:\"017xxxxxxxx\";s:15:\"billing_address\";s:20:\"19 Polashi,Kazi lias\";s:12:\"billing_area\";s:10:\"Zindabazar\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:4:\"Rafi\";s:14:\"shipping_lname\";s:5:\"Mizan\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:10:\"12 Swapnil\";s:13:\"shipping_area\";s:15:\"Noyasarak Point\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '445', 2, 0, 'Bkash', '34354', '017xxxxxxxx', '2021-03-19 03:35:58', '2021-03-19 03:35:58'),
(18, 11, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"a36b1fb9c77917ee75eca2bfdf0e80d7\";s:2:\"id\";i:5;s:3:\"qty\";i:1;s:4:\"name\";s:19:\"Continental Sizzler\";s:5:\"price\";d:330;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"I.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"62c507ba143a0bb1f1854face5be77ec\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"62c507ba143a0bb1f1854face5be77ec\";s:2:\"id\";i:19;s:3:\"qty\";i:1;s:4:\"name\";s:25:\"Chicken BBQ Cheese Burger\";s:5:\"price\";d:160;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"D.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:4:\"Safa\";s:13:\"billing_lname\";s:4:\"Noor\";s:13:\"billing_email\";s:14:\"safa@gmail.com\";s:13:\"billing_phone\";s:11:\"017xxxxxxxx\";s:15:\"billing_address\";s:20:\"19 Polashi,Kazi lias\";s:12:\"billing_area\";s:10:\"Zindabazar\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:4:\"Rafi\";s:14:\"shipping_lname\";s:5:\"Mizan\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:10:\"12 Swapnil\";s:13:\"shipping_area\";s:15:\"Noyasarak Point\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '490', 2, 0, 'Bkash', '34354', '0175788890', '2021-03-19 04:31:35', '2021-03-19 04:31:35'),
(19, 12, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"4a4038da9833afb74522115a4c7fceb7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"4a4038da9833afb74522115a4c7fceb7\";s:2:\"id\";i:7;s:3:\"qty\";i:1;s:4:\"name\";s:21:\"Mexican Chicken Steak\";s:5:\"price\";d:320;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"7.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}s:32:\"62c507ba143a0bb1f1854face5be77ec\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"62c507ba143a0bb1f1854face5be77ec\";s:2:\"id\";i:19;s:3:\"qty\";i:1;s:4:\"name\";s:25:\"Chicken BBQ Cheese Burger\";s:5:\"price\";d:160;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:5:\"photo\";s:5:\"D.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;}}}', 'a:15:{s:13:\"billing_fname\";s:5:\"Munni\";s:13:\"billing_lname\";s:4:\"Noor\";s:13:\"billing_email\";s:15:\"munni@gmail.com\";s:13:\"billing_phone\";s:11:\"017xxxxxxxx\";s:15:\"billing_address\";s:20:\"19 Polashi,Kazi lias\";s:12:\"billing_area\";s:10:\"Zindabazar\";s:12:\"billing_city\";s:6:\"Sylhet\";s:16:\"billing_postCode\";s:4:\"3100\";s:14:\"shipping_fname\";s:4:\"Rafi\";s:14:\"shipping_lname\";s:5:\"Mizan\";s:14:\"shipping_phone\";s:11:\"017XXXXXXXX\";s:16:\"shipping_address\";s:10:\"12 Swapnil\";s:13:\"shipping_area\";s:15:\"Noyasarak Point\";s:13:\"shipping_city\";s:6:\"Sylhet\";s:17:\"shipping_postCode\";s:4:\"3100\";}', '480', 2, 0, 'Bkash', '34354', '017xxxxxxxx', '2021-03-19 07:21:32', '2021-03-19 07:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('adiba@gmail.com', '$2y$10$WqVSV/M6NbHAZzAJEzayNOUKKz9G2ci0s0hEx/NfP3OkM9y9PxXXC', '2018-02-03 10:30:58'),
('amin@gmail.com', '$2y$10$LWpzmzaix7oLHnLKoAsA0ur8cl90fNRjviScBN/i2WXC9tyYpxsge', '2018-02-21 14:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_person` int(11) NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` enum('Breakfast','Lunch','Dinner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `num_of_person`, `date`, `time_slot`, `status`, `created_at`, `updated_at`) VALUES
(6, 'MiM', '01717935380', 4, '26 Nov 2020', 'Lunch', 1, '2020-11-22 05:43:14', '2021-03-18 23:22:37'),
(7, 'JiM', '01648586586', 3, '09 Jan 2020', 'Lunch', 0, '2020-12-30 20:21:25', '2020-12-30 20:21:25'),
(8, 'Raba', '017xxxxxxxx', 6, '3 Mar 2021', 'Lunch', 0, '2021-03-18 23:37:13', '2021-03-18 23:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Rafi Mizan', 'rafimizan@gmail.com', '5', 'Staff is the best I have ever experienced at ANY fast food establishment. Restaurant is very clean and neat looking. A great place for a fast meal.', '2020-02-21 05:18:16', '2020-02-21 05:18:16'),
(2, 'Dean Newton', 'newton@gmail.com', '5', 'I was introduced to this restaurant by a family member. This is new my new local! Food is absolutely on point', '2020-02-21 05:18:16', '2020-02-21 05:18:16'),
(3, 'Ismet Kestek', 'Ismet@gmail.com', '5', 'I normally don\'t write reviews for fast food. However this place stands out. It is clean, friendly service, and much better than average food for the price. This is a great place!', '2018-02-21 05:18:16', '2018-02-21 05:18:16'),
(4, 'Wesley Shuwai', 'Wesley@gmail.com', '5', 'Staff is the best I have ever experienced at ANY fast food establishment. Restaurant is very clean and neat looking. A great place for a fast meal.', '2018-02-21 05:18:16', '2018-02-21 05:18:16'),
(6, 'William Ambrose', 'william@gmail.com', '5', 'The food here is amazing definitely recommend getting their take-out, will certainly be ordering again soon. ', '2018-02-21 05:18:16', '2018-02-21 05:18:16'),
(7, 'Luke Andrews', 'alistair@gmail.com', '5', '1st time trying this Restaurent, absolutely great food would highly recommend safe to say is now my regular', '2018-02-21 05:18:16', '2018-02-21 05:18:16'),
(8, 'Safa Tasmin', 'safatasmin@gmail.com', '5', 'Staff is the best I have ever experienced at ANY fast food establishment. Restaurant is very clean and neat looking. A great place for a fast meal.', '2018-02-21 05:18:16', '2018-02-21 05:18:16'),
(13, 'Shafi Raihan', 'shafi@gmail.com', '4', 'Once again the Feel Hungry delivered our takeaway on time, great food as always, great service', '2018-02-21 05:18:16', '2018-02-21 05:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super', '2018-02-05 15:00:07', '2018-02-05 15:00:07'),
(2, 'Regular', '2018-02-05 15:00:07', '2018-02-05 15:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slide` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slide`, `heading`, `slide_text`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, '11.jpg', 'Feed Your Good', 'At Feel Hungry, We create food that makes you feel alive, food that nourishes and energies like our comforting Veggie Pizza, so you can be out there enjoying the things you love!', 'Order Online', '/menu', '2018-02-02 02:56:02', '2018-02-19 14:25:57'),
(3, '17.jpg', 'We serve passion', 'Authentic fast food, freshly prepared by one of our experienced Cheifs, delivered straight to your door by one of our super fast Ninjas', 'Order Now', '/menu', '2018-02-02 02:56:02', '2018-02-19 14:21:27'),
(4, 'res.jpg', 'Book good times', 'We Offer Online Table Reservations. Have a Party on Mind ? inform us and We will take care of the rest. Make Your reservation Now', 'Make Reservation', '/reservation', '2018-02-19 14:25:39', '2018-02-19 18:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `icon_class`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'fa fa-facebook', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, 'Twitter', 'https://twitter.com/', 'fa fa-twitter', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, 'Instagram', 'https://www.instagram.com/', 'fa fa-instagram', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, 'Location', 'https://www.google.com.bd/maps/place/Al+Hamra+Shopping+City/@24.897095,91.867982,18.5z/data=!4m13!1m7!3m6!1s0x3750552af8919883:0x6fc2fe33c01b3797!2zWmluZGFiYXphciwg4Ka44Ka_4Kay4KeH4Kaf!3b1!8m2!3d24.8948017!4d91.8690311!3m4!1s0x0:0x268dcbd12a1df334!8m2!3d24.8972775!4d91.8681794', 'fa fa-map-marker', '2018-02-02 02:56:02', '2018-02-02 02:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Marjana Mim', 'Owner', 'mim.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(2, 'Moumita Chaity', 'Owner', 'moumi.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(3, 'Farhaan Mahbub', 'Manager', 'farhaan.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(4, 'Sanjan Suhan', 'Head Chef', 'shanda.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(5, 'Nasif Istiak', 'Assistant Chef', 'nasu.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02'),
(6, 'HaHaaa Din', 'Assistant Chef', 'shahadin.jpg', '2018-02-02 02:56:02', '2018-02-02 02:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `area`, `city`, `zip`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Nafi', 'Rumman', 'nafi@gmail.com', '$2y$10$jgG9i5Q6UYL0HVl0iB1L4.PkXuI0lOPUxJ0iID1ArY4CwNKhv7wmu', NULL, '12 Swapnil', 'Mirzajangal', 'Sylhet', '3100', NULL, 'xAP3BKa5at2xIrA6SDuoCRlJWN2tY2f5E2lkBR9FzjDJDXG8t1rnbzdvcIaP', '2021-03-18 23:24:14', '2021-03-18 23:26:39'),
(7, 'Yasjudan', 'Raba', 'raba@gmail.com', '$2y$10$MkidFhmBX2N340qEAFuTRePmgxGtc4LmHXxRppIE8NXmiXHi4dYAO', NULL, '128 Nomi Cottage,Medical Road', 'KajalShah', 'Sylhet', '3100', NULL, NULL, '2021-03-18 23:32:45', '2021-03-18 23:34:24'),
(8, 'Mim', 'Noor', 'mim@gmail.com', '$2y$10$TnFjimqABOVOfZzoHKgzFO8rQ4XdH13VreEg.Ng0MbmvHaXFyeVDG', '017xxxxxxxx', '19 Polashi,Kazi lias', 'Zindabazar', 'Sylhet', '3100', NULL, 'kF3gHhIJgzdmCZUPm67pdO8IoT9tg0tpaR5ydt6qrVlfjJU56y1LlSdublMp', '2021-03-19 02:18:09', '2021-03-19 02:18:47'),
(9, 'Mim', 'Noor', 'miiimm@gmail.com', '$2y$10$iJvqdV9Ksk7oGAmJaa/1teETtud.h0wxJ1TkhqYJscYd7JAZT4vkm', '017xxxxxxxx', '19 Polashi,Kazi lias', 'Zindabazar', 'Sylhet', '3100', NULL, 'dscoJMyvOhkeBfTgZWXHtVjcdJjmFwTYXReQNbIqimmpeFygp601305CC4rR', '2021-03-19 03:20:23', '2021-03-19 03:20:58'),
(10, 'Naba', 'Noor', 'naba@gmail.com', '$2y$10$SSYPqNJDadFN3QHtn7POeeOVjxRcgN6lMLeB8yW.WNkeVzTBFFwUe', '017xxxxxxxx', '19 Polashi,Kazi lias', 'Zindabazar', 'Sylhet', '3100', NULL, 'zjEjJZYTQFlRk0EgzE5jcB3RWRAktqUBt0iM4vp0slR6SuRACjIYOhOT2klw', '2021-03-19 03:33:15', '2021-03-19 03:33:46'),
(11, 'Safa', 'Noor', 'safa@gmail.com', '$2y$10$AoARp3PTFBD1rq4NfBYVTuUJvug/vv.VduIohafsMCeZOYvB3eTbu', '017xxxxxxxx', '19 Polashi,Kazi lias', 'Zindabazar', 'Sylhet', '3100', NULL, NULL, '2021-03-19 04:28:47', '2021-03-19 04:29:20'),
(12, 'Munni', 'Noor', 'munni@gmail.com', '$2y$10$1pVCtfmnVDOAFEntoEPN0.jdE4uKp5OVeINCVncmCXlzqTAQLrpBa', '017xxxxxxxx', '19 Polashi,Kazi lias', 'Zindabazar', 'Sylhet', '3100', NULL, NULL, '2021-03-19 07:18:52', '2021-03-19 07:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `website_details`
--

CREATE TABLE `website_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dash_logo` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_details`
--

INSERT INTO `website_details` (`id`, `logo`, `dash_logo`, `name`, `email`, `phone`, `location`, `open_time`, `close_time`, `map_link`, `created_at`, `updated_at`) VALUES
(1, 'logo-bold.png', '014106logo-dash.png', 'Feel Hungry?', 'feelhungry@gmail.com', '+88017XXXXXXXX', 'k47 Complex, 2nd Floor, Nayasarak Road, Sylhet 3100', 'Everyday 10:00am - 11.30pm', 'Friday', 'https://www.google.com/maps/dir/\'\'/\'\'/@24.8973086,91.868193,20z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3750552bc8816749:0x268dcbd12a1df334!2m2!1d91.8681794!2d24.8972775', '2018-02-02 02:56:02', '2021-03-18 23:09:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_categories`
--
ALTER TABLE `dish_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dish_categories_name_unique` (`name`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_navs`
--
ALTER TABLE `home_navs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_details`
--
ALTER TABLE `website_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `dish_categories`
--
ALTER TABLE `dish_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_navs`
--
ALTER TABLE `home_navs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `website_details`
--
ALTER TABLE `website_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

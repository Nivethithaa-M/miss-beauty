-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 01:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Nivethithaa', 'nivethithaaathithan75@gmail.com', 'Nivetha', 'admin.png', '9578768133', 'India', 'Developer', '<p>Founder of Miss Beauty</p>');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(2, 'ELLE', 'ELLE is the world\'s largest fashion magazine and media brand inspiring women to explore and celebrate style in all aspects of their lives with content that is inclusive and innovative.'),
(3, 'NYKAA', 'Nykaa is an India based brand that specialises in multi-beauty and personal care products. The brand had been originally established as a sole e-commerce medium until it later began setting up various retail outlets in many metropolitan cities across the nation. 						'),
(4, 'LAKME', 'Lakmé is an Indian cosmetics brand which is owned by Hindustan Unilever. Having Kareena Kapoor and Chamma as the ambassador, it ranked at number 1 among the cosmetics brands in India.					'),
(5, 'LOREAL PARIS', 'The Loreal Paris Brand Division of Loreal USA, Inc. is a total beauty care company that combines the latest in technology with the highest in quality for the ultimate in luxury beauty at mass. Loreal Paris is a truly global beauty brand with many internationally renowned products.				'),
(6, 'MAC', 'M·A·C is a proud COMMUNITY of professional makeup artists working together to bring our vision to life. M·A·C is at the forefront of fashion TRENDSETTING, collaborating with leading talents from fashion, art and popular culture. Our Artists create trends backstage at fashion weeks around the world.			'),
(7, 'MAYBELLINE', 'Maybelline New York is the number one global cosmetics brand and is available in over 129 countries worldwide. Offering more than 200 products, Maybelline New York combines technologically advanced formulas with on-trend expertise to create accessible cosmetics with a cool, urban edge and a spirited style.			'),
(8, 'NIVEA', 'NIVEA is a global skin - and body-care brand, owned by the German company Beiersdorf. The company was founded on March 28 1882 by pharmacist Carl Paul Beiersdorf. In 1900, the new owner Oskar Troplowitz developed a water-in-oil emulsifier as a skin cream with Eucerit, the first stable emulsion of its kind. 					'),
(9, 'PONDS', 'Ponds is an American brand of beauty and health care products, currently owned by parent company the multinational corporation Unilever.					');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Raji', 'raji@gmail.com', 'Rajalakshmi', 'india', 'chennai', '9758697480', '1st street pammal', 'nivetha.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `product_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(3, 2, 1, 1800, 828511470, 4, '250g', '2021-08-01 03:37:20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `code` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 2, 2, '2021-07-31 15:54:36', 'Elle 18 Kajal', 'elle2.jpg', 'elle22.jpg', 'elle222.jpg', 245, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Elle 18 Eye Drama is&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">long lasting Kajal</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;in a twist-up format.It has intense matte texture and you can experiment with a thin line or a bold wing, this kajal is great for day and night looks. Its long-lasting- up to 12 hours without smudging and is completely water proof.</span></p>', 'ellekajal'),
(2, 2, 3, '2021-08-01 11:04:08', 'Wink Eyeshadow', 'nykaa7.jpg', 'nykaa77.jpg', 'nykaa777.jpg', 450, '<p><span style=\"color: #3f414d; font-family: webfontregular; font-size: 16px; text-align: center; background-color: #cacaca;\">With masks still on, even a sweep of eyeshadow can brighten your look (and day)! Consider this your Eyeshadow Bible to find one for every mood.</span></p>', 'Nykaaeyeshadow'),
(3, 3, 2, '2021-08-01 04:16:47', 'Elle 18 Face Powder', 'elle1.jpg', 'elle11.jpg', 'elle111.jpg', 100, '<p><span style=\"color: #212121; font-family: Roboto, Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Conceal your dark spots and get radiant skin with the Elle 18 Glow Compact. It is crafted for Indian skin tones to complement your everyday look perfectly.</span></p>', 'ellefacepowder'),
(4, 2, 2, '2021-08-01 04:09:44', 'Elle 18 Eye Drama Kajal', 'elle3.jpg', 'elle33.JPG', 'elle333.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Elle 18 Eye Drama is long lasting kajal</span><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;in a twistup format.Its a smudge proof water proof kajal and can add the dramatic and glamorous look to your eyes. It has intense matte texture and you can experiment with a thin line or a bold wing, this kajal is great for day and night looks.</span></p>', 'elledrama'),
(5, 3, 2, '2021-08-01 04:18:31', 'Elle 18 Glow Foundation', 'elle4.jpg', 'elle44.jpg', 'elle444.jpg', 340, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Give your skin a radiant glow with this compact from Elle 18. It gives an even spread and a natural glow with a smooth matte finish. It contains vitamin E and C</span><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;which provides your skin with the necessary nourishment.</span></p>', 'elleglow'),
(6, 5, 2, '2021-08-01 04:33:18', 'Elle 18 Pops', 'elle5.jpg', 'elle55.jpg', 'elle555.jpg', 340, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Elle 18 Color Pops lipsticks give you attractive lips</span><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;with a blast of color. They have great features like Cocoa butter and Jojoba oil that makes lips soft and luscious, Smudge free, Available in 51 shades.</span></p>', 'ellecolorpops'),
(7, 4, 2, '2021-08-01 04:25:53', 'Elle 18 lotion', 'elle6.jpg', 'elle66.jpg', 'elle666.jpg', 240, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nourishing body cream</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;for beautiful skin thats soft and smooth With Moisture Lock Formula Gives soft, smooth &amp; glowing skin</span></p>', 'ellebodylotion'),
(8, 6, 2, '2021-08-01 04:27:44', 'Elle 18 Nail pops', 'elle7.jpg', 'elle77.jpg', 'elle777.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Elle 18 Nail Pops are</span><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;for the excited you who needs a new shades for every mood and occasion, be it a college party, or festival, theres always a nail pop for you.Elle 18 Nail Pops are designed to give you a long lasting finish at just Rs. 50.</span></p>', 'ellenail'),
(9, 5, 2, '2021-08-01 04:30:24', 'Elle 18 lipbalm', 'elle8.jpg', 'elle88.jpg', 'elle888.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">he Elle 18 Juicy Lip Balm protects and moistures your lip</span><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and is available in 6 exciting shades you will love. It is fortified with SPF 15 and enriched with Vitamin E, olive oil and jojoba oil. This lip balm is just the kind of love your lips need everyday</span></p>', 'ellelipbalm'),
(10, 6, 2, '2021-08-01 04:31:51', 'Elle 18 Remover', 'elle9.jpg', 'elle99.jpg', 'elle999.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Elle 18&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Nail Paint Remover that removes nail paint easily and is safe for nails</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">.</span></p>', 'elleremover'),
(11, 2, 2, '2021-08-01 04:35:44', 'Elle 18 Eyelashes', 'elle10.jpg', 'elle100.jpg', 'elle1000.jpg', 450, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">A&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lash</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;extension treatment involves applying individual synthetic&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lashes</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;onto each natural&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">eyelash</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;to add extra length and volume</span></p>', 'ellelashes'),
(12, 2, 4, '2021-08-01 04:37:36', 'Lakme Instant Liner', 'lakme1.jpg', 'lakme11.jpg', 'lakme111.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Lakme Insta Eyeliner is&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">a liquid eyeliner</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. It comes in a glass bottle with a precision application brush that allows you to create different eye makeup looks.</span></p>', 'lakmeeyeliner'),
(13, 4, 4, '2021-08-01 04:41:06', 'Lakme Oil Gradiance', 'lakme2.jpg', 'lakme22.jpg', 'lakme222.jpg', 280, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Infused with the power of Moroccan Argan Oil, this oil in creme formula can help you achieve radiant looking and flawless skin. It is lightweight by nature and </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">nourishes</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;revitalises your skin with regular usage.</span></p>', 'lakmeoilradiance'),
(14, 3, 4, '2021-08-01 04:46:11', 'Lakme 9to5 foundation', 'lakme3.jpg', 'lakme33.jpg', 'lakme333.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Lakme 9 To 5 WEIGHTLESS Mousse Foundation is your answer to a workings women barrier to using foundation. It is a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">lightweight foundation meant for everyday use</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. It is so lightweight that you wont even feel you are wearing foundation.</span></p>', 'lakme9to5foundation'),
(15, 5, 4, '2021-08-01 04:47:54', 'Lakme Absolute Matte Lipstick', 'lakme4.jpg', 'lakme44.jpg', 'loreal444.jpg', 340, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Lakm&eacute; Absolute introduces a new Matte Ultimate Lip colour with&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Argan oil</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\"> &nbsp;a glamorous matte lipstick range suited for every occasion. From deep plum to fierce red, the collection comprises of 12 trendy shades with a lightweight formula enriched with luxe argan oil that nourishes your lips and keeps it from drying.</span></p>', 'lakmelipstick'),
(16, 3, 4, '2021-08-01 04:49:20', 'Lakme Face Magic', 'lakme5.jpg', 'lakme55.jpg', 'lakme555.jpg', 340, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Lakme Magic Souffle foundation </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">covers up spots, diminishes blemishes, dark circles and patchy skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;to give you a radiant and glowing skin tone. The Lakme Magic Souffl&eacute; is a light weight, water based foundation which is enriched with the goodness of sunscreen, cucumber extracts, and Vitamin E.</span></p>', 'lakmefacemagic'),
(17, 3, 4, '2021-08-01 04:50:46', 'Lakme compact', 'lakme6.jpg', 'lakme66.jpg', 'lakme666.jpg', 320, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Lakme Radiance Complexion Compact is available in an easy to carry pack and you can use it even when you are in a hurry. It </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">nourishes and moisturizes your skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">, with the advanced Mircromesh technology which gives your face a matte finish, while the Allantoin complex soothes your skin and protects it from pollution.</span></p>', 'lakmecompact'),
(18, 2, 4, '2021-08-01 05:17:24', 'Lakme Mascara', 'lakme7.jpg', 'lakme77.jpg', 'lakme777.jpg', 320, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Lakm&eacute; Eyeconic Curling Mascara is unique mascara thats lets </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">you play with dramatic eye looks</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">, by giving you intensely curled lashes. The smart curl brush allows smooth strokes for perfectly curled lashes. The lightweight mascara with DPanthenol keeps lashes smooth.</span></p>', 'lakmemascara'),
(19, 2, 4, '2021-08-01 05:20:43', 'Lakme Eyeshadow', 'lakme8.jpg', 'lakme88.jpg', 'lakme888.jpg', 340, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">This quartet has four unique shimmery shades </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">a dark purple, an emerald green, a rusty copper, and a yellow gold</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. These shades are so vivid that they leave you with a high intensity, defined finish. It is the perfect palette for your next night out</span></p>', 'lakmeeyeshadow'),
(20, 5, 4, '2021-08-01 05:22:23', 'Lakme LipLove ', 'lakme9.jpg', 'lakme99.jpg', 'lakme999.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Lakme lip love is a new </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">super moisturizing formula</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;in a convenient and vibrant pack. It gives you 22 hours of intense moisture so you can say bye to dry, with soft lips that last all day.</span></p>', 'lakmeliplove'),
(21, 4, 4, '2021-08-01 05:24:28', 'Lakme youth creme', 'lakme10.jpg', 'lakme100.jpg', 'lakme1000.jpg', 280, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Regular use of the Lakme Absolute Youth Infinity Day Cream shows spectacular results </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">a youthful skin that helps reduce dullness and signs of aging</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">.It provides sun protection. For the best results, use the product every morning and evening. Dot across your face and neck.</span></p>', 'lakmecreme'),
(22, 3, 5, '2021-08-01 07:40:59', 'Loreal true match', 'loreal1.jpg', 'loreal11.jpg', 'loreal111.jpg', 240, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Rediscover True Match, a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">skin care infused foundation</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">, now available in 40 shades. The formula provides perfect, natural and true to skin coverage. True Match is enriched with Hyaluronic Acid to improve skin quality and reveal more radiant and healthier looking skin.</span></p>', 'lorealttruematch'),
(23, 5, 5, '2021-08-01 07:46:19', 'Loreal Paris Matte Lipstick', 'loreal2.jpg', 'loreal22.jpg', 'loreal222.jpg', 120, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">More contemporary, liquid&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipsticks</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\"> need to be applied to the foam tip and reveal a flawless lip outline. Every moment requires the right matte </span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">!</span></p>', 'lorealmattelipstick'),
(24, 5, 5, '2021-08-01 07:45:42', 'Loreal Paris Lipstick', 'loreal3.jpg', 'loreal33.jpg', 'loreal333.jpg', 240, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">More contemporary, liquid&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipsticks</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;need to be applied to the foam tip and reveal a flawless lip outline. Every moment requires the right&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">!</span></p>', 'loreallipstick'),
(25, 4, 5, '2021-08-01 07:49:30', 'loreal paris skin perfect', 'loreal4.jpg', 'loreal44.JPG', 'loreal444.jpg', 320, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Loreal Paris skin perfect uses superior </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">vitamin 3x technology</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;through this range that combines Vitamin B3, Vitamin C and Vitamin E well known for their skin enhancing properties along with deep whitening actives that work on improving skin tone to give you healthy looking skin at any age.</span></p>', 'lorealskinperfect'),
(26, 2, 5, '2021-08-01 07:51:30', 'Loreal Eyes Shadow', 'loreal5.jpg', 'loreal55.jpg', 'loreal555.jpg', 340, '<div class=\"g\" style=\"font-family: arial, sans-serif; font-size: 14px; line-height: 1.58; text-align: left; width: 600px; margin: 0px; clear: both; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; color: #202124; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div data-hveid=\"CBAQAA\" data-ved=\"2ahUKEwjerJa8q4_yAhW2yzgGHeDNC8MQFSgAMAJ6BAgQEAA\">\r\n<div class=\"tF2Cxc\" style=\"position: relative; clear: both; padding-bottom: 0px;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"wDYxhc\" lang=\"en-IN\" style=\"clear: none; padding-left: 0px; padding-right: 0px; color: #202124; font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-md=\"61\">\r\n<div class=\"LGOjhe\" style=\"overflow: hidden; padding-bottom: 20px;\" role=\"heading\" data-attrid=\"wa:/description\" aria-level=\"3\" data-hveid=\"CA4QAA\"><span class=\"ILfuVd\" style=\"font-size: 16px; line-height: 24px;\"><span class=\"hgKElc\" style=\"padding: 0px 8px 0px 0px;\">Go neutral or bold with our highly pigmented eyeshadows.Discover eyeshadow for brown eyes, blue eyes, and green eyes in matte and shimmery finishes. Our soft powders and velvety creams blend smoothly, making it easy to create any look.</span></span></div>\r\n</div>', 'lorealeyeshadow'),
(27, 3, 5, '2021-08-01 07:53:11', 'Loreal primer', 'loreal6.jpg', 'loreal66.jpg', 'loreal666.jpg', 220, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Loreal Paris Base Magique </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Transforming Smoothing Primer instantly smooths pores</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and creates an even surface, so that you get a more flawless makeup result that lasts. The silky, lightweight formula glides onto skin and minimises the prominence of pores and fine lines to transform your skin surface.</span></p>', 'lorealprimer'),
(28, 2, 5, '2021-08-01 07:56:04', 'Loreal paris Kajal', 'loreal7.jpg', 'loreal77.jpg', 'loreal777.jpg', 180, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Loreal Paris Kajal Magique glides easily to give you intense black lines that are </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">waterproof</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and stay smudge proof for up to 12 hours. Loreal Paris Kajal Magique Bold has 25% more concentrated pigments that are waterproof, gentle on the eyes, and do not smudge for up to 14 hours.</span></p>', 'lorealkajal'),
(29, 2, 5, '2021-08-01 07:58:07', 'Loreal Eyes Shadow', 'loreal8.jpg', 'loreal88.jpg', 'loreal888.jpg', 320, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Go neutral or bold with our highly pigmented eyeshadows.Discover eyeshadow for brown eyes, blue eyes, and green eyes in matte and shimmery finishes. Our soft powders and velvety creams blend smoothly, making it easy to create any look.</span></p>', 'lorealeyeshadow'),
(30, 6, 5, '2021-08-01 07:59:44', 'Loreal Nailpolish', 'loreal9.jpg', 'loreal99.jpg', 'loreal999.jpg', 100, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Loreal brings to you a nail polish enriched with a blend of </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">precious oils and intense color pigments</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">, for the most sophisticated, powerful colors and shine in one stroke. With a patented flexi brush for the easiest, most precise application.</span></p>', 'lorealnailpolish'),
(31, 4, 5, '2021-08-01 08:01:59', 'Loreal paris fragnance tan mousse', 'loreal10.jpg', 'loreal100.JPG', 'loreal1000.jpg', 290, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Loreal Paris Hydrating Lightweight Bronzing SelfTanning Water Mousse&nbsp; Instantly gives skin a natural looking tan with a sunkissed glow and even finish within 48 hours. Clear transfer resistant formula disappears into skin for an invisible feel and quick drying, gradual, natural-looking tan.</span></p>', 'lorealtanmousse'),
(32, 3, 6, '2021-08-01 10:02:41', 'Mac Foundation', 'mac1.jpg', 'mac11.jpg', 'mac111.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The Face And Body Foundation by MAC is&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">lightweight, moisturizing, and long wearing</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. It delivers sheer coverage with a satin finish. The foundation glides onto your face and body, providing true to color even skin tone. The MAC Face And Body Foundation comes in 13 different shades</span></p>', 'macfoundation'),
(33, 3, 6, '2021-08-01 10:05:54', 'Mac Face Powder', 'mac2.jpg', 'mac22.jpg', 'mac222.jpg', 190, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">A one step powder and foundation that gives skin a smooth and even ultra </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">matte</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;finish with medium to full buildable coverage, with a velvety texture that allows skin to breathe. MAC Studio Fix Powder Plus Foundation is long wearing, colour true, non caking, non streaking and non settling&nbsp; all for 12 hours.</span></p>', 'macfacepowder'),
(34, 3, 6, '2021-08-01 10:08:17', 'Mac Violet Blush', 'mac3.jpg', 'mac33.jpg', 'mac333.jpg', 250, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">MAC Powder Blush is designed by and for professionals. It is enriched with vitamin E and formulated to </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">provide fantastic colour to cheeks</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;with ease and consistency. Applies evenly, adheres lightly to skin to achieve a natural looking application of colour.</span></p>', 'macblush'),
(35, 5, 6, '2021-08-01 10:10:17', 'Mac Lip Liner', 'mac4.jpg', 'mac44.jpg', 'mac444.jpg', 170, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">A lip liner&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">designed for shaping, lining or filling in the lip</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. Our Lip Pencils have a smooth, creamy texture that is perfect for outlining lips or colouring them in. Available in a wide selection of colours that each work well with many different lipstick shades.</span></p>', 'maclippencil'),
(36, 5, 6, '2021-08-01 10:11:57', 'Mac Lipstick', 'mac5.jpg', 'mac55.jpg', 'mac555.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">MAC Lipstick comes in a variety of finishes, and the&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">pigmentation</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and wear tend to be dependent on the finish.The Amplified and Satin finishes tend to have good pigmentation, lightly creamy to moderately creamy consistencies with a bit of shine, and moderate to long wear with deeper, richer shades wearing longer.</span></p>', 'maclipstick'),
(37, 3, 6, '2021-08-01 10:13:20', 'Mac Brush', 'mac6.jpg', 'mac66.jpeg', 'mac666.jpg', 240, '<p><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">For shading or blending of colour or creamy products</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. This brush has fine, densely packed fibers that are arranged in an oval shape. MAC professional brushes are hand sculpted and assembled using the finest quality materials.</span></p>', 'macbrush'),
(38, 4, 6, '2021-08-01 10:14:41', 'Mac creme', 'mac7.jpg', 'mac77.jpg', 'mac777.jpg', 208, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">MAC Creme Cup is a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">neutral toned, medium pink with a pearl finish</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. It is a lipstick that is permanent in this palette Nude.</span></p>', 'maccream'),
(39, 2, 6, '2021-08-01 10:16:00', 'Mac Violet pigment ', 'mac8.jpg', 'mac88.jpg', 'mac888.jpg', 200, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">A&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">highly concentrated loose colour powder that contains ingredients to help it adhere to skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. Create a subtle wash of colour or an intense effect. Easy to blend. Pigments are sold by weight, not volume.</span></p>', 'macpig'),
(40, 3, 6, '2021-08-01 10:17:32', 'Mac Palette', 'mac9.jpg', 'mac99.jpg', 'mac999.jpg', 230, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The palette is in a sleek and stylish black case so you can take your eyeshadow almost anywhere.Our eyeshadow is designed to be kind to skin and is suitable for ages 12 and above. It is </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">water resistant</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and keeps on lasting way after the day is done.</span></p>', 'macpalette'),
(41, 5, 6, '2021-08-01 10:18:47', 'Mac Glitter Lipstick', 'mac10.jpg', 'mac100.jpg', 'mac1000.jpg', 180, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">MAC Lipstick comes in a variety of finishes, and the&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">pigmentation</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and wear tend to be dependent on the finish.The Amplified and Satin finishes tend to have good pigmentation, lightly creamy to moderately creamy consistencies with a bit of shine, and moderate to long wear with deeper, richer shades wearing longer.</span></p>', 'macglitterlipstick'),
(42, 2, 7, '2021-08-01 10:28:35', 'Maybelline  Mascara', 'may1.jpeg', 'may11.jpg', 'may111.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Mascara by Maybelline New York features superior brush technology and innovative formulas that let you create whatever&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">lash</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;look you set your eyes on. Choose from our long lasting, lengthening or volumizing mascaras to curl, define and boost lash fullness for a natural or dramatic lash look.</span></p>', 'maymascara'),
(43, 3, 7, '2021-08-01 10:21:19', 'Maybelline Fit me', 'may2.jpeg', 'may22.jpg', 'may222.jpg', 230, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">MAYBELLINE FIT ME MATTE and PORELESS foundation is made </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">to fit diverse Indian skin tones</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. The Fit Me Liquid Foundation is ideal for normal to oily skin and refines pores for a natural looking glowing skin.</span></p>', 'mayfitme'),
(44, 3, 7, '2021-08-01 10:23:08', 'Maybelline master prime', 'may3.jpg', 'may33.jpg', 'may333.jpg', 220, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Maybelline skin perfecting face primers are formulated with a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">water soluble base and active ingredients</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;that refine the look and feel of skin for makeup that lasts all day. Packaging may vary, what you receive may not be what is reflected on site.</span></p>', 'maybellineprimer'),
(45, 3, 7, '2021-08-01 10:24:24', 'Maybelline Color Show Blush', 'may4.jpeg', 'may44.jpg', 'may444.jpg', 300, '<p><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Flawless</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;that lets the real you come through. Lightweight pigments blend easily and wears evenly. Provides a natural, fade proof cheek color that leaves skin the way it was meant to be: fresh, breathing, and natural.</span></p>', 'mayblush'),
(46, 5, 7, '2021-08-01 10:25:58', 'Maybelline Lipgloss', 'may5.jpeg', 'may55.jpg', 'may555.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Maybelline lip gloss selection offers more than just a flashy finish. Get </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">fuller looking lips</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and lasting hydration in clear, nude and pink shades. Non sticky glossy lip looks that go the distance.</span></p>', 'maylipgloss'),
(47, 5, 7, '2021-08-01 10:26:57', 'Maybelline baby lips', 'may6.jpeg', 'may66.jpg', 'may666.jpg', 202, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Maybelline Baby Lips Loves Color Lip Balm is enriched with SPF 20 and designed to&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">provide 16 hour hydration</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. This lip balm protects and moisturizes your lips, all day.</span></p>', 'maybabylips'),
(48, 5, 7, '2021-08-01 10:30:39', 'Maybelline lipstick', 'may7.jpeg', 'may77.jpg', 'may777.jpg', 210, '<p><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Maybelline</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;has&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">, from matte to high shine, to play up your pout. Go from dramatic reds or purples for a night out to subdued nudes or pinks&nbsp;</span></p>', 'maybellinelipstick'),
(49, 3, 7, '2021-08-01 10:33:54', 'Maybelline compact', 'may8.jpeg', 'may88.jpg', 'may888.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The silky and lightweight mineral based formula of this Maybelline loose finishing powder is designed to control the excess shine from your face and smoothen out your skin texture. The loose powder also adds a hint of colour to your complexion, making it perfect for your nomakeup makeup days.</span></p>', 'maycompact'),
(50, 2, 7, '2021-08-01 10:35:26', 'Maybelline browdefiner', 'may9.jpeg', 'may99.jpg', 'may999.jpg', 230, '<p>T<span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">wo steps to perfect, softly defined and natural brows with NEW Total Temptation Brow Definer. First use, the unique teardrop&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">shaped</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\"> tip fill in and define the brows. Use the spoolie end to blend and create a natural look. Find this Pin and more on Maybelline Beauty Guides by Maybelline New York.</span></p>', 'maybrowliner'),
(51, 2, 7, '2021-08-01 10:36:51', 'Maybelline Kajal', 'may10.jpg', 'may100.jpg', 'may1000.jpg', 300, '<div class=\"g\" style=\"font-family: arial, sans-serif; font-size: 14px; line-height: 1.58; text-align: left; width: 600px; margin: 0px; clear: both; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; color: #202124; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div data-hveid=\"CBEQAA\" data-ved=\"2ahUKEwj62M650I_yAhWjyzgGHWXMAEYQFSgAMAJ6BAgREAA\">\r\n<div class=\"tF2Cxc\" style=\"position: relative; clear: both; padding-bottom: 0px;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"wDYxhc\" lang=\"en-IN\" style=\"clear: none; padding-left: 0px; padding-right: 0px; color: #202124; font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-md=\"61\">\r\n<div class=\"LGOjhe\" style=\"overflow: hidden; padding-bottom: 20px;\" role=\"heading\" data-attrid=\"wa:/description\" aria-level=\"3\" data-hveid=\"CBQQAA\"><span class=\"ILfuVd\" style=\"font-size: 16px; line-height: 24px;\"><span class=\"hgKElc\" style=\"padding: 0px 8px 0px 0px;\">The light absorbing pigments in the Maybelline kajal pencil delivers 2 times more blackness for double the intensity. Enriched with oil for super smooth application, the kajal eye pencil glides on effortlessly, adding a rich, glossy sheen color that stays waterproof and smudge proof for upto 16 hours.</span></span></div>\r\n</div>', 'maykajal'),
(52, 4, 8, '2021-08-01 10:38:38', 'Nivea Makeup Remover', 'nivea1.jpg', 'nivea11.jpg', 'nivea111.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Maybelline Makeup Remover makes this task easy. Available in a small blue and white bottle of 68g, this remover contains two substances that have to be mixed by shaking the bottle before it can be used. This remover is convenient for all sorts of makeup removal, including waterproof ones.</span></p>', 'niveamakeupremover'),
(53, 4, 8, '2021-08-01 10:40:13', 'Nivea care cream', 'nivea2.jpg', 'nivea22.jpg', 'nivea222.jpg', 222, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">medium </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">dream</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;fresh bb cream skin perfector is the 1 step wonder for a good skin day, everyday. Get 8 skin benefits in 1 simple step blurs imperfections, brightens, evens skin tone, smoothes, hydrates, enhances, protects with spf 30 and contains 0% oils and heavy ingredients.</span></p>', 'niveacream'),
(54, 4, 8, '2021-08-01 10:41:45', 'Nivea Nourishing body oil', 'nivea3.jpg', 'nivea33.jpg', 'nivea333.jpg', 210, '<p><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">MAYBELLINE</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;NEW YORK Mousse Matte Foundation SPF 15, Nivea Lip Balm &amp; Loreal Deep&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nourishing</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;Hair Spa</span></p>', 'niveanourishingoil'),
(55, 4, 8, '2021-08-01 10:43:28', 'Nivea Rose Water Wipes', 'nivea4.jpg', 'nivea44.jpg', 'nivea444.jpg', 280, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Skin is left deeply cleansed .no rinsing necessary! The formula with Moringa Seed extract, goes beyond make up removal to purify and clear everyday impurities. Oil-free towelettes clean and refresh without harsh rubbing or greasy residue. Formula contains conditioning agents so skin feels moisturized and smooth.</span></p>', 'niveawipes'),
(56, 4, 8, '2021-08-01 10:45:13', 'Nivea skin cream', 'nivea5.jpg', 'nivea55.jpg', 'nivea555.jpg', 180, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">NIVEA Creme is an&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">everyday, multipurpose moisturising cream for oily skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;which protects and gives relief from damaged skin, leaving it healthy. ... Using it will help you protect and soothe the dry skin over your body, especially areas such as elbows, heels, cuticles and any body parts that need extra hydration.</span></p>', 'niveacream'),
(57, 2, 8, '2021-08-01 10:47:29', 'Nivea Eye liner', 'nivea6.jpg', 'nivea66.JPG', 'nivea666.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">The NIVEA Moisture Lip Care formula is&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Mineral Oil free</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and enriched with a variety of nourishing oils which include Shea Butter, Jojoba Oil, and Avocado Oil, to keep lips beautiful all day long.This leave lips feeling super soft and looking smooth.</span></p>', 'niveaeyeliner'),
(58, 4, 8, '2021-08-01 10:48:55', 'Nivea oil', 'nivea7.jpg', 'nivea77.jpg', 'nivea777.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Building on over 100 years of skincare expertise, NIVEA has developed the new Nourishing Body Oil. Use daily on dry or wet skin to deeply condition and leave skin feeling smooth and radiant. Made with carefully selected ingredients that meet strict quality standards.</span></p>', 'niveaoil'),
(59, 4, 8, '2021-08-01 10:51:00', 'Nivea repair cream', 'nivea8.jpg', 'nivea88.jpg', 'nivea888.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">NIVEA Repair and Care Body Lotion provides </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">long lasting relief from very dry, tight skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. Its delicate and rich formula, developed with a dermatologist, contains NIVEA Deep Care Serum and Provitamin B5 that soothes dry skin and protects the skin moisture barrier.</span></p>', 'nivearepaircream'),
(60, 3, 8, '2021-08-01 10:52:14', 'Nivea Facewash', 'nivea9.jpg', 'nivea99.jpg', 'nivea999.jpg', 250, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">This face wash&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">prevents skin breakouts, blackheads, whiteheads and acne</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;and gives you clear and healthy skin by reducing acne causing bacteria.</span></p>', 'niveafacewash'),
(61, 5, 8, '2021-08-01 10:53:26', 'Nivea Lip Butter', 'nivea10.jpg', 'nivea100.jpg', 'nivea1000.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Applying a rich, velvety NIVEA Lip Butter to your lips is an indulgence they deserve. Made with&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">creamy shea butter and almond oil</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">, our lip butters will nourish, smooth and deeply moisturize your lips for up to 12 hours while delighting your senses with delectable aromas.</span></p>', 'nivealip'),
(62, 3, 3, '2021-08-01 11:02:27', 'Nykaa PrepMeup', 'nykaa1.jpg', 'nykaa11.jpg', 'nykaa111.jpg', 111, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">This lightweight,&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">non greasy Formula</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. instantly blurs the appearance of pores and. fine lines to create a flawless base. WHY. Leaves a sensational velvety Matte finish.</span></p>', 'nykaaprepmeup'),
(63, 5, 3, '2021-08-01 10:57:07', 'Nykaa Lipstick', 'nykaa2.jpg', 'nykaa22.jpg', 'nykaa222.jpg', 210, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">This comes in a transparent tube which allow us to see the colour from outside which is such an amazing quality in this. This&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;is such a handy one</span></p>', 'nykaalipstick'),
(64, 6, 3, '2021-08-01 10:58:30', 'Nykaa nail polish', 'nykaa3.jpg', 'nykaa33.jpg', 'nykaa333.jpg', 310, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Buy the best&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">nail polish</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;at low price in India from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">. Choose from a wide range of&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">nail paint</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;shades &amp; colours like blue or matte&nbsp;</span></p>', 'nykaanailpolish'),
(65, 3, 3, '2021-08-01 11:00:07', 'Nykaa BB Cream', 'nykaa4.jpg', 'nykaa44.jpg', 'nykaa444.jpg', 210, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Buy best&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">creams</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;at low price from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">. Choose from a wide range of skin&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">creams</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;&amp; soap from top brands! Free Shipping and COD!</span></p>', 'nykaabbcream');
INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(66, 5, 3, '2021-08-01 11:01:33', 'Nykaa Lip Liner', 'nykaa5.jpg', 'nykaa55.jpg', 'nykaa555.jpg', 210, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Buy&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lip liners</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;online at low prices in India from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">. Check out the best&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lip liner</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;colors &amp; shades from top brands such as Revlon</span></p>', 'nykaaliplinear'),
(67, 5, 3, '2021-08-01 11:05:41', 'Nykaa Lip Balm', 'nykaa6.jpg', 'nykaa66.jpg', 'nykaa666.jpg', 310, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Buy&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lip Balm</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;at low price from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">. Choose from a wide range of&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lip Balm</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;For Lip from top brands</span></p>', 'nykaalips'),
(68, 3, 3, '2021-08-01 11:07:36', 'Nykaa Compact', 'nykaa8.jpg', 'nykaa88.jpg', 'nykaa888.jpg', 190, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Nykaa SKINgenius Compact&nbsp;</span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">seamlessly blends in your skin and perfects your complexion</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. The PolyLift technology allows the powder to melt in your skin, giving you a naturally radiant look.Never cakey, never dry, its velvety formula covers your imperfection to you give you a youthful, radiant complexion.</span></p>', 'nykaacompact'),
(69, 4, 3, '2021-08-01 11:08:57', 'Nykaa oil', 'nykaa9.jpg', 'nykaa99.jpg', 'nykaa999.jpg', 210, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Buy Face&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Oils</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;at low price from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">. Choose from a wide range of Face&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Oils</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;for face from top brands</span></p>', 'nykaaoil'),
(70, 5, 3, '2021-08-01 11:10:13', 'Nykaa Lipstick', 'nykaa10.jpg', 'nykaa100.jpeg', 'nykaa1000.jpg', 310, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Matte&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;Colors Online: Buy Matte&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lipsticks</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;at Best Price in India from&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nykaa</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">! Choose from some of the best matte&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lipstick</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;shades from top .</span></p>', 'nykaalipstick'),
(71, 3, 9, '2021-08-01 11:13:43', 'Ponds white Beauty', 'ponds1.jpg', 'ponds11.jpg', 'ponds111.jpg', 100, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Ponds White Beauty Pinkish </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">White Glow Cream transforms your skin to</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;a radiant pinkish white glow. It gently evens out skin tone as it works from within to nourish your skin, leaving it instantly brighter, softer and more radiant.</span></p>', 'pondswhitebeauty'),
(72, 4, 9, '2021-08-01 11:19:16', 'Ponds cold cream', 'ponds2.jpg', 'ponds22.jpg', 'ponds222.jpg', 220, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Ponds White Beauty Pinkish White Glow Cream </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">transforms your skin</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;to a radiant pinkish white glow. It gently evens out skin tone as it works from within to nourish your skin, leaving it instantly brighter, softer and more radiant. And its triple sun protection keeps skin safe from damaging UV rays.</span></p>', 'pondsbalm'),
(73, 4, 9, '2021-08-01 11:18:23', 'Ponds bodylotion', 'ponds3.jpg', 'ponds33.jpg', 'ponds333.jpg', 210, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Massage lightly on the skin with finger tips until completely absorbed. Use this moisturising </span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">lotion</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;for soft, smooth and radiant skin that leaves you feeling.</span></p>', 'pondsbodylotion'),
(74, 4, 9, '2021-08-01 11:20:56', 'Ponds Cleansing Balm', 'ponds4.jpg', 'ponds44.jpg', 'ponds444.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">PONDS Cold Cream Cleansing Balm recently awarded Best of Beauty for skincare in 2018&nbsp; is a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">unique blend of oils and cleansing essence pressed into</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;a solid balm. Once massaged into skin, it transforms into a silky oil, melting away stubborn makeup and removing impurities.</span></p>', 'pondsbalm'),
(75, 4, 9, '2021-08-01 11:22:17', 'Ponds pimple clear', 'ponds5.jpg', 'ponds55.jpg', 'ponds555.jpg', 190, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Ponds Pimple Clear Face Wash, it offers the best solution for pimples and acne thanks to its unique formula that includes </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">active Thymo T Essence</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">.It penetrates deep into your skin epidermis to lock pimple causing germs at the root and helps clear them away.</span></p>', 'pondspimple'),
(76, 3, 9, '2021-08-01 11:23:45', 'Ponds facelotion', 'ponds6.jpg', 'ponds66.jpg', 'ponds666.jpg', 220, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Ponds Dry Skin Cream is a </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">face moisturizer that moisturizes deeply and preps Skin for makeup application</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">.This rich creamy formula is easily absorbed in the skin, and locks in moisture, to hydrate deeply while significantly reducing dryness.</span></p>', 'pondsfacelotion'),
(77, 4, 9, '2021-08-01 11:24:46', 'Ponds wibes', 'ponds7.jpg', 'ponds77.jpg', 'ponds777.jpg', 180, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">These ultra soft, textured cleansing wipes work with micellar water, rose water extract and a super charged level of Vitamin B3 helping diminish the appearance of dark spots while leaving skin soft and visibly brighter.</span></p>', 'pondswibes'),
(78, 4, 9, '2021-08-01 11:26:47', 'Ponds Cleansing oil', 'ponds9.jpg', 'ponds99.jpg', 'ponds999.jpg', 290, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Ponds Cleansing Oil comes with three kinds of </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">natural plant remover ingredients effectively remove the face makeup</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. In addition to skin dull grease and dirt, after cleaning, no greasy and skin irritates. The skin will be fresh and smooth after use.</span></p>', 'pondscleansingoil'),
(79, 4, 9, '2021-08-01 11:28:12', 'Ponds Wrinkle Cream', 'ponds10.jpg', 'ponds100.jpg', 'ponds1000.jpg', 260, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Rejuveness&nbsp; Anti </span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Wrinkle Cream</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;reduces the appearance of fine lines and&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">wrinkles</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;in 2 weeks. This daily moisturizer is formulated with Alpha Hydroxy cream</span></p>', 'pondswinklecream'),
(80, 4, 9, '2021-08-01 11:29:35', 'Ponds spray', 'ponds8.jpg', 'ponds88.jpg', 'ponds888.jpg', 210, '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">It works from within to nourish your skin, leaving it instantly brighter, softer and more radiant. And its triple sun protection keeps skin safe from damaging UV rays.</span></p>', 'pondsspray');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(2, 'EYES', 'Eye makeup is a type of cosmetics which aims to make the eyes look noticeable and attractive. It is mostly used by females, and by stage performers of all types. Eye makeup is an important part of the fashion and cosmetic industries. Main products of Eye makeup are Mascara , Eye liner , Kajal etc..				'),
(3, 'FACE POWDERS', 'Face powder is a cosmetic product applied to the face to serve different functions, typically to beautify the face.One of which is loose powder, which is used to assist with oily skin in absorbing excess moisture and mattifying the face to reduce shininess.				'),
(4, 'SKINCARE', 'Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients.Skin care is a part of the treatment of wound healing, radiation therapy and some medications						'),
(5, 'LIPS', 'Lips is an organ in which we can apply cosmetic that gives color, texture, and protection to the lips. Many colors and types of lipstick exist.						'),
(6, 'NAILS', 'A nail is a hard part of the body at the tip of the fingers and toes, of which most people have ten. Toenails and fingernails .We can decorate nails using nail polish etc..							');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`) VALUES
(1, 'slider number 1', '1.jpg'),
(2, 'slider number 2', '2.jpg'),
(3, 'slider number 3', '3.jpg'),
(4, 'slider number 4', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

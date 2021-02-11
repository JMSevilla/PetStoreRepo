-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 04:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbprojectzero`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_categories` ()  NO SQL
BEGIN
SELECT * FROM categories;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_account_details_first_update` (IN `p_email` VARCHAR(100), IN `p_firstname` VARCHAR(100), IN `p_lastname` VARCHAR(100), IN `p_mobileno` VARCHAR(100), IN `p_address` TEXT, IN `p_image` VARCHAR(255))  NO SQL
BEGIN
UPDATE users SET firstname=p_firstname, lastname=p_lastname, mobileno=p_mobileno, 
profileimage = p_image WHERE email = p_email;
UPDATE checkoutaddress SET address=p_address WHERE email=p_email;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_address_dynamic` (IN `p_paymentaddress` TEXT, IN `p_shippingaddress` TEXT)  NO SQL
BEGIN
INSERT INTO addressdynamic VALUES(DEFAULT,p_paymentaddress, p_shippingaddress);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_cart_summary` ()  NO SQL
BEGIN
DECLARE variable_name varchar(100);
SET variable_name = (SELECT isquantitycart FROM products WHERE isquantitycart = 1);
IF variable_name = 1 THEN
SELECT isquantitycart, SUM(product_price) + variable_name AS pricing FROM products WHERE iscart = 1 and isaccount = 'test@gmail.com';
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_categories` (IN `p_category` VARCHAR(255))  NO SQL
BEGIN
INSERT INTO categories VALUES (DEFAULT,p_category,CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_categories_updater` (IN `p_id` INT(11), IN `p_category` VARCHAR(255))  NO SQL
BEGIN
UPDATE categories SET category_name=p_category WHERE id=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_iscart_updater` (IN `p_id` INT, IN `p_isaccount` VARCHAR(100))  NO SQL
BEGIN
update products set iscart=1, isaccount=p_isaccount, isquantitycart= isquantitycart+1 where id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_isorder` (IN `p_isaccount` INT)  NO SQL
BEGIN
update products set iscart=0, isorder=1, product_quantity = product_quantity - isquantitycart, isquantitycart = 0 where isaccount=p_isaccount;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_placeorder` (IN `p_address` TEXT, IN `p_country` VARCHAR(100), IN `p_city` VARCHAR(100), IN `p_state` VARCHAR(100), IN `p_zipcode` VARCHAR(100), IN `p_firstname` VARCHAR(100), IN `p_lastname` VARCHAR(100), IN `p_email` VARCHAR(100), IN `p_mobile` VARCHAR(100), IN `p_paymentmethod` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO checkoutaddress VALUES (DEFAULT, p_address, p_country, p_city, p_state, p_zipcode, p_firstname, p_lastname, p_email, p_mobile, p_paymentmethod, CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_product` (IN `p_prodname` VARCHAR(255), IN `p_prodprice` DECIMAL, IN `p_prodquantity` DOUBLE, IN `p_proddescription` TEXT, IN `p_prodcategory` VARCHAR(100), IN `p_prodimage` VARCHAR(255), IN `p_iscart` CHAR(1), IN `p_iswish` CHAR(1))  NO SQL
BEGIN
INSERT INTO products VALUES(default,p_prodname, p_prodprice, p_prodquantity, p_proddescription, p_prodcategory,p_prodimage,p_iscart,p_iswish, null, 0, 0, CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_product_added` ()  NO SQL
BEGIN
SELECT * FROM products WHERE created_at = CURRENT_TIMESTAMP OR created_at = created_at < CURRENT_TIMESTAMP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_updateindicator` (IN `p_email` VARCHAR(100))  NO SQL
BEGIN
UPDATE email_indicator SET emailchanged=p_email WHERE id = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addressdynamic`
--

CREATE TABLE `addressdynamic` (
  `id` int(11) NOT NULL,
  `payment_address` text DEFAULT NULL,
  `shipping_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addressdynamic`
--

INSERT INTO `addressdynamic` (`id`, `payment_address`, `shipping_address`) VALUES
(1, 'test', 'test'),
(2, 'blk 2 lot 13 hacienda hills\npalo alto calamba city laguna', 'blk 2 lot 13 hacienda hills\npalo alto calamba city laguna'),
(3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`) VALUES
(5, 'DOG FOODS', '2021-02-06 00:57:49'),
(6, 'DOG GROOMING TOOL', '2021-02-06 00:59:08'),
(7, 'DOG ACCESSORIES', '2021-02-06 01:01:30'),
(8, 'test', '2021-02-07 03:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `checkoutaddress`
--

CREATE TABLE `checkoutaddress` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileno` varchar(100) DEFAULT NULL,
  `paymentmethod` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkoutaddress`
--

INSERT INTO `checkoutaddress` (`id`, `address`, `country`, `city`, `state`, `zipcode`, `firstname`, `lastname`, `email`, `mobileno`, `paymentmethod`, `created_date`) VALUES
(1, 'Blk 2 lot 13 Hacienda hills palo alto calamba city, laguna', 'Philippines', 'Calamba', 'laguna', '4027', 'Jose', 'Sevilla', 'devopsbyte60@gmail.com', '09300323216', 'cashondelivery', '2021-02-08 01:50:10'),
(2, 'Blk 2 lot 13 Hacienda hills palo alto calamba city, laguna', 'Philippines', 'Calamba', 'laguna', '4027', 'jastine', 'magboo', 'jastinemagboo25@gmail.com', '123123', 'cashondelivery', '2021-02-08 21:56:57'),
(3, 'Blk 2 lot 13 Hacienda hills palo alto calamba city, laguna', 'Philippines', 'Calamba', 'laguna', '4027', 'test firstname', 'test lastname', 'test@gmail.com', '123123123', 'cashondelivery', '2021-02-09 01:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `clientdashboard`
--

CREATE TABLE `clientdashboard` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientdashboard`
--

INSERT INTO `clientdashboard` (`id`, `description`) VALUES
(1, 'Here in dashboard, you can track your orders, you can change and update your personal information and payment details.');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(11) NOT NULL,
  `about_us` text DEFAULT NULL,
  `privacypolicy` text DEFAULT NULL,
  `termsandcondition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `about_us`, `privacypolicy`, `termsandcondition`) VALUES
(1, 'ABOUT US', 'PRIVACY POLICY', 'TERMS & CONDITION');

-- --------------------------------------------------------

--
-- Table structure for table `email_indicator`
--

CREATE TABLE `email_indicator` (
  `id` int(11) NOT NULL,
  `emailchanged` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_indicator`
--

INSERT INTO `email_indicator` (`id`, `emailchanged`, `created_date`) VALUES
(1, 'miggysvll@gmail.com', '2021-02-04 21:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `getintouch`
--

CREATE TABLE `getintouch` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `getintouch`
--

INSERT INTO `getintouch` (`id`, `address`, `email`, `phone`, `created_at`) VALUES
(1, 'Diversity Avenue St. corner Evoliving Parkway, Nuvali, Canlubang, Calamba City, Laguna', 'petstorephil@gmail.com', '(02) 1234 4567', '2021-02-07 00:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodclientdashboard`
--

CREATE TABLE `paymentmethodclientdashboard` (
  `id` int(11) NOT NULL,
  `paymentmethod` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethodclientdashboard`
--

INSERT INTO `paymentmethodclientdashboard` (`id`, `paymentmethod`) VALUES
(1, 'As of now, Pet Store Philippines is only accommodating or allowing a Cash on Delivery method of Payment. And we assure that before the end of the year we can offer and provide other payment method service.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_quantity` double DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_category` varchar(100) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `iscart` char(1) DEFAULT NULL,
  `iswish` char(1) DEFAULT NULL,
  `isaccount` varchar(100) DEFAULT NULL,
  `isquantitycart` double DEFAULT NULL,
  `isorder` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `product_category`, `product_image`, `iscart`, `iswish`, `isaccount`, `isquantitycart`, `isorder`, `created_at`) VALUES
(4, 'Korean Pet Saliva Towel Tide Dog Bib', '300.00', 5, 'Make your pet look more fashionable and attractive.', 'DOG ACCESSORIES', '903.jpg', '0', '0', NULL, 0, '0', '2021-02-06 00:05:54'),
(5, 'Pet Potty Tray', '600.00', 7, 'Pet potty training pad is the unique solution for pet accident-free living. Perfect for when you\'re late coming home to let the dog out, or unable to let your pet outside due to bad weather. Ideal as a training tool for your puppy.', 'category name testing', '366.jpg', '0', '0', 'test@gmail.com', 0, '0', '2021-02-06 00:29:08'),
(6, '10 Color Pet Physiological Pants Puppy', '350.00', 49, 'Dog Cat Underwear Cute Flower Dots Printed Dog Shorts Diaper Sanitary Briefs Panties.\n100% Brand New and High Quality!\nStyle: Pet Dog Puppy Physiological Pants\nColor: Pink, Blue, Red ,Yellow,Black\nMaterial: Cotton Blend\nItem Includes : 1 X Dog Pant\nSize Information:\nS      Waist     15cm/5.90\'\'—25cm/9.84\'\'\nM     Waist     25cm/9.84\'\'—35cm/13.77\'\'\nL      Waist     35cm/13.77\'\'—45cm/17.71\'\'\nXL    Waist     45cm/17.71\'\'—55cm/21.65\'\'', 'category name testing', '628.jpg', '0', '0', NULL, 0, '1', '2021-02-06 00:32:29'),
(7, 'SLICKER BRUSH', '280.00', 15, '*Fine wire bristles remove tough tangles\n*Can help de-mat undercoats\n*Great for most coat types', 'category name testing', '915.jpg', '0', '0', 'ptrcyhny@yahoo.com', 0, '1', '2021-02-06 00:32:34'),
(8, 'SHEDDING BLADE', '190.00', 9, 'Keep your dog\'s coat clean and healthy with the Safari® Dual-Sided Dog Shedding Blade! The ridged stainless steel blade efficiently removes loose hair to keep your dog and home clean. It\'s easy to use: Simply stroke from head to tail and watch the loose hair fall away. Hold the handles apart to cover large areas at a time, or hold them together to shed smaller areas. Use this shedding blade regularly in your grooming routine for a beautiful coat!\n\n*Keeps your dog and home clean by removing excess hair.\n*Ridged stainless steel blade efficiently sheds even the thickest coats.\n*Sheds large surface areas with handles held apart.\n*Targets smaller surface areas with handles held together.\n*Maintains a healthy, beautiful coat.\n', 'category name testing', '959.jpg', '0', '0', NULL, 0, '0', '2021-02-06 00:32:39'),
(10, 'Small Dog Cat Bibs Scarf Collar Lace Flower', '250.00', 20, 'Soft and comfortable to wear, lace decoration, make it more fashionable and attractive.', 'DOG ACCESSORIES', '963.jpg', '0', '0', NULL, 0, '0', '2021-02-06 00:48:56'),
(11, 'PetEx Training Pads 45x60cm 50\'s', '450.00', 15, 'Training Pads are great for house training your indoor dogs and provides convenience when travelling with your pet\nThese training pads are made with thick and strong materials\nAdvanced Polymer Technology is used in making these pads for better absorbency\nOutstanding Absorbency\n5 Layer Protection ( Tear-Resistant Cover, Locking Layer, Super Absorbent Technology, Locking Layer, Leakproof Plastic Liner)\nOdour Free\n50 pcs 45cm x 60 cm', 'category name testing', '459.jpeg', '0', '0', NULL, 0, '0', '2021-02-06 00:49:26'),
(13, '2 Bowl Food Tray', '300.00', 23, 'With the Double Dinner Dog Bowl, you\'ll be able to keep your dog\'s food and water bowls in one spot for easy feeding', 'DOG ACCESSORIES', '837.jpg', '0', '0', 'ptrcyhny@yahoo.com', 0, '1', '2021-02-06 01:11:19'),
(14, 'Carno Food Dispenser 3.8 Litre', '480.00', 10, '3.8L Large Automatic Pet Food Drink Dispenser', 'DOG ACCESSORIES', '326.jpg', '0', '0', NULL, 0, '0', '2021-02-06 01:13:36'),
(15, 'Adjustable Height Twin Bowl For Food & Water (Large)', '550.00', 10, 'Twin stainless steel pet dog food water bowls set with adjustable height', 'DOG ACCESSORIES', '954.jpg', '0', '0', NULL, 0, '0', '2021-02-06 01:14:41'),
(16, 'Hoopets Food Dispenser 3.5 Liter Capacity', '650.00', 15, 'The automatic pet feeder is 3.5L and suitable for small and medium size pets. And this pet dog feeder can continually provide food for your pets.', 'DOG ACCESSORIES', '526.jpg', '0', '0', NULL, 0, '0', '2021-02-06 01:17:06'),
(17, 'Food Grade Stainless Steel Food Bowl W/ Rubber Base (XL)', '250.00', 30, 'Rubber base protects floors and prevents bowl from sliding while your pet eats', 'DOG ACCESSORIES', '161.jpeg', '0', '0', NULL, 0, '0', '2021-02-06 01:18:18'),
(20, 'NAIL CLIPPER', '549.00', 7, 'Made with stainless steel, this clippers’ blades are extra strong, sharp and durable, and will cut through nails quickly — which is perfect for squirmy dogs or dogs who hate having their nails trimmed. It’s equipped with a quick stop, which will prevent causing painful damage to the quick (the thicker, nerve-filled section) of your dog’s nails. Plus, the handles are padded with c', 'DOG GROOMING TOOLS', '692.jpg', '0', '0', NULL, 0, '0', '2021-02-06 01:20:48'),
(21, 'Shape Dog Anchor Sleeveless Puppy Apparel Vest T-shirt Pet Clothes', '250.00', 20, 'Sleeveless clothes with big anchor printed to Keep your dog stylish, cute and clean.', 'DOG ACCESSORIES', '168.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:31:21'),
(22, 'Cute Polka Dot Bowknot Sleeveless Puppy Tiny Dog Dress', '350.00', 25, 'Dog dress in adorable pattern with elegant ribbon, perfect for your pet girls.', 'DOG ACCESSORIES', '855.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:34:00'),
(23, 'Adidas-Style Tracksuit for Dogs', '550.00', 19, 'Lined with a fuzzy fleece and double-stitched for durability, this jumpsuit will keep your dog cozy on cold-weather days.', 'DOG ACCESSORIES', '861.jpg', '0', '0', 'ptrcyhny@yahoo.com', 0, '1', '2021-02-07 00:34:47'),
(24, 'Anti Slip Pet Dog Puppy Shoes Protective Rain Boots', '400.00', 29, 'Durable anti-slip sole provides stability and traction, helping pet with mobility and stability on tile and the sand.', 'DOG ACCESSORIES', '818.jpg', '0', '0', 'ptrcyhny@yahoo.com', 0, '1', '2021-02-07 00:36:17'),
(26, 'Floral Dog Harness Collar With Matching Leash Set', '750.00', 30, 'Adjustable dog collar harness leash set, easy for you to walking your dog', 'DOG ACCESSORIES', '973.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:42:27'),
(27, 'Pet Dog Collars Cute Small Nylon Dog Harness', '250.00', 30, 'easy to wear on and take off, comfortable and breathable for your dog.', 'DOG ACCESSORIES', '359.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:43:17'),
(29, 'Dog Harness and Leash Set with Collar', '600.00', 35, 'This set of dog\'s safety harness, leash and collar must be strong enough to easily control your naughty dog.', 'DOG ACCESSORIES', '627.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:45:06'),
(30, 'Dog Collar Pet Leash Dogs Harness', '300.00', 30, 'Suitable for small and medium-sized dogs', 'DOG ACCESSORIES', '698.jpg', '0', '0', NULL, 0, '0', '2021-02-07 00:45:47'),
(37, 'Noblesse Dog Gate', '999.00', 23, '34”-39.5” Wide; 32” Tall - Indoor Pet Barrier, Walk Through Swinging Door, Extra Wide, Black. Pressure Mounted, Expandable. Walls, Stairs.', 'DOG ACCESSORIES', '844.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:34:39'),
(38, 'Secure gate with Small Lockable pet Door.', '1500.00', 27, 'The My Pet extra tall pet gate with door is designed to fit doorways and openings 29.8\" To 38\" Wide and is 36\" tall.', 'DOG ACCESSORIES', '622.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:35:51'),
(39, 'Large Size Stackable Folding Cage Metal Aluminum', '2500.00', 30, 'Heavy Duty Large Size Stackable Folding Cage Metal Aluminum Pet Cat Dog Crate And Kennel For Large Dogs', 'DOG ACCESSORIES', '451.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:37:07'),
(40, 'Super Soft Dog Bed Washable Plush Pet Bed Deep Sleep Dog', '1100.00', 35, 'Plush material for comfort and warmth. Washable pet litter for convenience and comfort.', 'DOG ACCESSORIES', '443.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:39:23'),
(41, 'Princess Castle Royalty Pet Bed', '1500.00', 25, 'Plush material for comfort and warmth. Washable pet litter for convenience and comfort.', 'DOG ACCESSORIES', '424.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:40:44'),
(42, 'Frisco Igloo Covered Dog Bed', '2000.00', 37, 'Perfect for small dogs who like to curl up and sleep in a den-like nest. It’s a safe hide-out for lounging during the day too.', 'DOG ACCESSORIES', '610.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:41:40'),
(43, 'Double Dog Stroller', '7000.00', 15, 'Utilizes multiple entry points to provide easy access for your dog. You can use it as a crate on wheels to take your pet wherever you go! ', 'DOG ACCESSORIES', '962.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:47:12'),
(44, 'City Pet Stroller', '7000.00', 17, 'Easy to fold down and put up so it can fit in your car, the stroller allows your pet to travel in the lap of luxury.', 'DOG ACCESSORIES', '783.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:47:58'),
(45, 'Luxury Pet Stroller for Puppy', '5500.00', 10, 'The handy dog buggy is ideal for pets up to 70 lb. Taking your pet to the vet, on long walks, holidays or to the mall has never been easier.', 'DOG ACCESSORIES', '714.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:48:55'),
(46, 'Dog Collar Heavy Duty Buckle Personalized ID Name', '200.00', 23, 'Adjustable, ID Tag, Engraved, Personalized', 'DOG ACCESSORIES', '210.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:51:57'),
(47, 'Stainless Stee Dog ID Tag', '180.00', 30, 'Dog Collar Accessories Personalized Pet ID Tag Customized Dog Tag Free engraving', 'DOG ACCESSORIES', '552.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:52:55'),
(48, 'Engraved Dog Tags Pet ID Collar', '200.00', 30, 'ID Tag, Engraved, Personalized', 'DOG ACCESSORIES', '987.jpg', '0', '0', NULL, 0, '0', '2021-02-08 22:53:46'),
(49, 'Cute pet ramp Stairs for small dog pet', '1500.00', 20, 'Dog mat mattress mesh breathable fabric pet steps 2-steps with detachable soft Cover', 'DOG ACCESSORIES', '444.jpg', '0', '0', NULL, 0, '0', '2021-02-08 23:01:31'),
(50, 'Petscene Extra Long Aluminium Dog Ramp Stairs', '3500.00', 25, 'Give your dog what he needs the most—easier access to allow them to catch up with their owners when it comes to climbing up onto a vehicle like SUV or truck. ', 'DOG ACCESSORIES', '473.jpg', '0', '0', NULL, 0, '0', '2021-02-08 23:02:21'),
(51, 'Portable Folding Safety Pet Stairs', '3000.00', 27, 'Help your dog or puppy reach hard-to-get places with ease and comfort. ', 'DOG ACCESSORIES', '964.jpg', '0', '0', NULL, 0, '0', '2021-02-08 23:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinfo`
--

CREATE TABLE `purchaseinfo` (
  `id` int(11) NOT NULL,
  `paymentpolicy` text DEFAULT NULL,
  `shippingpolicy` text DEFAULT NULL,
  `returnpolicy` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchaseinfo`
--

INSERT INTO `purchaseinfo` (`id`, `paymentpolicy`, `shippingpolicy`, `returnpolicy`) VALUES
(1, 'PAYMENT POLICY', 'SHIPPING POLICY', 'RETURN POLICY');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `secure_payment` text DEFAULT NULL,
  `word_delivery` text DEFAULT NULL,
  `days_return` text DEFAULT NULL,
  `support` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `secure_payment`, `word_delivery`, `days_return`, `support`) VALUES
(1, 'Payment upon delivery helps build trust because customers only pay for the item once they have an opportunity to personally inspect the product.', 'Pet Store Philippines prides itself for being the first to offer worldwide delivery options in the Philippines.', 'Any product can be returned within 90 days upon delivery depending on the type of product purchased.', 'Pet Store is providing an 24/7 customer service regarding about the concern and questions of the customers and even the sellers.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `usertype` char(1) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobileno`, `password`, `created_at`, `usertype`, `profileimage`) VALUES
(25, 'customer test', 'customer test', 'customer@gmail.com', '12345', '$2y$10$ZOujyg.6laIkDFXJ11PQ7.5pdmBOiw1dRD7FdUjT4.EQ1COw0GWN.', '2021-02-11 16:37:36', '0', '122.png'),
(26, 'admin', 'admin', 'admin@gmail.com', '12345', '$2y$10$q.IuQ6lkcWP.7IFgi59joOFSZnlzHwd6.q2KMKvGLSjQZvu99RXfG', '2021-02-11 16:38:07', '1', 'NONE'),
(27, 'Patricia ', 'Yhany', 'ptrcyhny@gmail.com', '09090909090', '$2y$10$9ZDAug6ZuOfPCvvEvlcNteFos5pJDp0G2OfrZcvoCoOmAjlW1V.Iy', '2021-02-11 23:14:28', '0', 'NONE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressdynamic`
--
ALTER TABLE `addressdynamic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkoutaddress`
--
ALTER TABLE `checkoutaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientdashboard`
--
ALTER TABLE `clientdashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_indicator`
--
ALTER TABLE `email_indicator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getintouch`
--
ALTER TABLE `getintouch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodclientdashboard`
--
ALTER TABLE `paymentmethodclientdashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `addressdynamic`
--
ALTER TABLE `addressdynamic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkoutaddress`
--
ALTER TABLE `checkoutaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientdashboard`
--
ALTER TABLE `clientdashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_indicator`
--
ALTER TABLE `email_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `getintouch`
--
ALTER TABLE `getintouch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethodclientdashboard`
--
ALTER TABLE `paymentmethodclientdashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

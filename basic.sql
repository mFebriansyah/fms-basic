-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2014 at 12:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_active_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_active_category` (
  `id_fms_pr_active_category` int(11) NOT NULL AUTO_INCREMENT,
  `active_category_name` varchar(255) NOT NULL,
  `active_category_name_alt_1` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_active_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fms_pr_active_category`
--

INSERT INTO `fms_pr_active_category` (`id_fms_pr_active_category`, `active_category_name`, `active_category_name_alt_1`, `timestamp`) VALUES
(1, 'Active', 'Available', '2014-02-27 19:06:50'),
(2, 'Not Active', 'Unavailable', '2014-02-27 19:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_gender_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_gender_category` (
  `id_fms_pr_gender_category` int(11) NOT NULL AUTO_INCREMENT,
  `gender_category_name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_gender_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fms_pr_gender_category`
--

INSERT INTO `fms_pr_gender_category` (`id_fms_pr_gender_category`, `gender_category_name`, `timestamp`) VALUES
(1, 'male', '2014-05-02 12:38:30'),
(2, 'female', '2014-05-02 12:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_headline_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_headline_category` (
  `id_fms_pr_headline_category` int(11) NOT NULL AUTO_INCREMENT,
  `headline_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_headline_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_marital_status_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_marital_status_category` (
  `id_fms_pr_marital_status_category` int(11) NOT NULL AUTO_INCREMENT,
  `marital_status_category_name` varchar(255) NOT NULL,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_marital_status_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fms_pr_marital_status_category`
--

INSERT INTO `fms_pr_marital_status_category` (`id_fms_pr_marital_status_category`, `marital_status_category_name`, `id_fms_pr_active_category`, `timestamp`) VALUES
(1, 'Menikah', 1, '2014-02-16 17:38:41'),
(2, 'Belum Menikah', 1, '2014-02-16 17:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_member_tag`
--

CREATE TABLE IF NOT EXISTS `fms_pr_member_tag` (
  `id_fms_pr_member_tag` int(11) NOT NULL AUTO_INCREMENT,
  `member_tag_name` varchar(255) NOT NULL,
  `table` varchar(255) NOT NULL,
  `prompt` text,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_member_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_menu_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_menu_category` (
  `id_fms_pr_menu_category` int(11) NOT NULL AUTO_INCREMENT,
  `menu_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_menu_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_module_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_module_category` (
  `id_fms_pr_module_category` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_module` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_module_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_nationality_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_nationality_category` (
  `id_fms_pr_nationality_category` int(11) NOT NULL AUTO_INCREMENT,
  `nationality_category_name` varchar(255) NOT NULL,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_nationality_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_portfolio_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_portfolio_category` (
  `id_fms_pr_portfolio_category` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_portfolio_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_portfolio_tag`
--

CREATE TABLE IF NOT EXISTS `fms_pr_portfolio_tag` (
  `id_fms_pr_portfolio_tag` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_portfolio_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_post_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_post_category` (
  `id_fms_pr_post_category` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_post_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_post_tag`
--

CREATE TABLE IF NOT EXISTS `fms_pr_post_tag` (
  `id_fms_pr_post_tag` int(11) NOT NULL AUTO_INCREMENT,
  `post_tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_post_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_product_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_product_category` (
  `id_fms_pr_product_category` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_product_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_religion_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_religion_category` (
  `id_fms_pr_religion_category` int(11) NOT NULL AUTO_INCREMENT,
  `religion_category_name` varchar(255) NOT NULL,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_pr_religion_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fms_pr_religion_category`
--

INSERT INTO `fms_pr_religion_category` (`id_fms_pr_religion_category`, `religion_category_name`, `id_fms_pr_active_category`, `timestamp`) VALUES
(1, 'Islam', 1, '2014-02-16 17:30:22'),
(2, 'Katolik', 1, '2014-02-16 17:31:22'),
(3, 'Protestan', 1, '2014-02-16 17:31:57'),
(4, 'Hindu', 1, '2014-02-16 17:34:39'),
(5, 'Budha', 1, '2014-02-16 17:35:06'),
(6, 'Konghucu', 1, '2014-02-16 17:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_static_module_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_static_module_category` (
  `id_fms_pr_static_module_category` int(11) NOT NULL AUTO_INCREMENT,
  `static_module_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_pr_static_module_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fms_pr_static_module_category`
--

INSERT INTO `fms_pr_static_module_category` (`id_fms_pr_static_module_category`, `static_module_category_name`) VALUES
(1, 'General'),
(2, 'Blog'),
(3, 'Shop'),
(4, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_timezone`
--

CREATE TABLE IF NOT EXISTS `fms_pr_timezone` (
  `id_fms_pr_timezone` int(11) NOT NULL AUTO_INCREMENT,
  `timezone_name` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fms_pr_timezone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=413 ;

--
-- Dumping data for table `fms_pr_timezone`
--

INSERT INTO `fms_pr_timezone` (`id_fms_pr_timezone`, `timezone_name`, `location`) VALUES
(1, 'Africa/Abidjan', 'UTC +0000'),
(2, 'Africa/Accra', 'UTC +0000'),
(3, 'Africa/Addis_Ababa', 'UTC +0300'),
(4, 'Africa/Algiers', 'UTC +0100'),
(5, 'Africa/Asmara', 'UTC +0300'),
(6, 'Africa/Bamako', 'UTC +0000'),
(7, 'Africa/Bangui', 'UTC +0100'),
(8, 'Africa/Banjul', 'UTC +0000'),
(9, 'Africa/Bissau', 'UTC +0000'),
(10, 'Africa/Blantyre', 'UTC +0200'),
(11, 'Africa/Brazzaville', 'UTC +0100'),
(12, 'Africa/Bujumbura', 'UTC +0200'),
(13, 'Africa/Cairo', 'UTC +0200'),
(14, 'Africa/Casablanca', 'UTC +0000'),
(15, 'Africa/Ceuta', 'UTC +0100'),
(16, 'Africa/Conakry', 'UTC +0000'),
(17, 'Africa/Dakar', 'UTC +0000'),
(18, 'Africa/Dar_es_Salaam', 'UTC +0300'),
(19, 'Africa/Djibouti', 'UTC +0300'),
(20, 'Africa/Douala', 'UTC +0100'),
(21, 'Africa/El_Aaiun', 'UTC +0000'),
(22, 'Africa/Freetown', 'UTC +0000'),
(23, 'Africa/Gaborone', 'UTC +0200'),
(24, 'Africa/Harare', 'UTC +0200'),
(25, 'Africa/Johannesburg', 'UTC +0200'),
(26, 'Africa/Kampala', 'UTC +0300'),
(27, 'Africa/Khartoum', 'UTC +0300'),
(28, 'Africa/Kigali', 'UTC +0200'),
(29, 'Africa/Kinshasa', 'UTC +0100'),
(30, 'Africa/Lagos', 'UTC +0100'),
(31, 'Africa/Libreville', 'UTC +0100'),
(32, 'Africa/Lome', 'UTC +0000'),
(33, 'Africa/Luanda', 'UTC +0100'),
(34, 'Africa/Lubumbashi', 'UTC +0200'),
(35, 'Africa/Lusaka', 'UTC +0200'),
(36, 'Africa/Malabo', 'UTC +0100'),
(37, 'Africa/Maputo', 'UTC +0200'),
(38, 'Africa/Maseru', 'UTC +0200'),
(39, 'Africa/Mbabane', 'UTC +0200'),
(40, 'Africa/Mogadishu', 'UTC +0300'),
(41, 'Africa/Monrovia', 'UTC +0000'),
(42, 'Africa/Nairobi', 'UTC +0300'),
(43, 'Africa/Ndjamena', 'UTC +0100'),
(44, 'Africa/Niamey', 'UTC +0100'),
(45, 'Africa/Nouakchott', 'UTC +0000'),
(46, 'Africa/Ouagadougou', 'UTC +0000'),
(47, 'Africa/Porto', 'UTC +0100'),
(48, 'Africa/Sao_Tome', 'UTC +0000'),
(49, 'Africa/Tripoli', 'UTC +0200'),
(50, 'Africa/Tunis', 'UTC +0100'),
(51, 'Africa/Windhoek', 'UTC +0200'),
(52, 'America/Adak', 'UTC -1000'),
(53, 'America/Anchorage', 'UTC -0900'),
(54, 'America/Anguilla', 'UTC -0400'),
(55, 'America/Antigua', 'UTC -0400'),
(56, 'America/Araguaina', 'UTC -0300'),
(57, 'America/Argentina/Buenos_Aires', 'UTC -0300'),
(58, 'America/Argentina/Catamarca', 'UTC -0300'),
(59, 'America/Argentina/Cordoba', 'UTC -0300'),
(60, 'America/Argentina/Jujuy', 'UTC -0300'),
(61, 'America/Argentina/La_Rioja', 'UTC -0300'),
(62, 'America/Argentina/Mendoza', 'UTC -0300'),
(63, 'America/Argentina/Rio_Gallegos', 'UTC -0300'),
(64, 'America/Argentina/Salta', 'UTC -0300'),
(65, 'America/Argentina/San_Juan', 'UTC -0300'),
(66, 'America/Argentina/San_Luis', 'UTC -0300'),
(67, 'America/Argentina/Tucuman', 'UTC -0300'),
(68, 'America/Argentina/Ushuaia', 'UTC -0300'),
(69, 'America/Aruba', 'UTC -0400'),
(70, 'America/Asuncion', 'UTC -0300'),
(71, 'America/Atikokan', 'UTC -0500'),
(72, 'America/Bahia_Banderas', 'UTC -0600'),
(73, 'America/Bahia', 'UTC -0300'),
(74, 'America/Barbados', 'UTC -0400'),
(75, 'America/Belem', 'UTC -0300'),
(76, 'America/Belize', 'UTC -0600'),
(77, 'America/Blanc', 'UTC -0400'),
(78, 'America/Boa_Vista', 'UTC -0400'),
(79, 'America/Bogota', 'UTC -0500'),
(80, 'America/Boise', 'UTC -0700'),
(81, 'America/Cambridge_Bay', 'UTC -0700'),
(82, 'America/Campo_Grande', 'UTC -0300'),
(83, 'America/Cancun', 'UTC -0600'),
(84, 'America/Caracas', 'UTC -0430'),
(85, 'America/Cayenne', 'UTC -0300'),
(86, 'America/Cayman', 'UTC -0500'),
(87, 'America/Chicago', 'UTC -0600'),
(88, 'America/Chihuahua', 'UTC -0700'),
(89, 'America/Costa_Rica', 'UTC -0600'),
(90, 'America/Cuiaba', 'UTC -0300'),
(91, 'America/Curacao', 'UTC -0400'),
(92, 'America/Danmarkshavn', 'UTC +0000'),
(93, 'America/Dawson_Creek', 'UTC -0700'),
(94, 'America/Dawson', 'UTC -0800'),
(95, 'America/Denver', 'UTC -0700'),
(96, 'America/Detroit', 'UTC -0500'),
(97, 'America/Dominica', 'UTC -0400'),
(98, 'America/Edmonton', 'UTC -0700'),
(99, 'America/Eirunepe', 'UTC -0400'),
(100, 'America/El_Salvador', 'UTC -0600'),
(101, 'America/Fortaleza', 'UTC -0300'),
(102, 'America/Glace_Bay', 'UTC -0400'),
(103, 'America/Godthab', 'UTC -0300'),
(104, 'America/Goose_Bay', 'UTC -0400'),
(105, 'America/Grand_Turk', 'UTC -0500'),
(106, 'America/Grenada', 'UTC -0400'),
(107, 'America/Guadeloupe', 'UTC -0400'),
(108, 'America/Guatemala', 'UTC -0600'),
(109, 'America/Guayaquil', 'UTC -0500'),
(110, 'America/Guyana', 'UTC -0400'),
(111, 'America/Halifax', 'UTC -0400'),
(112, 'America/Havana', 'UTC -0500'),
(113, 'America/Hermosillo', 'UTC -0700'),
(114, 'America/Indiana/Indianapolis', 'UTC -0500'),
(115, 'America/Indiana/Knox', 'UTC -0600'),
(116, 'America/Indiana/Marengo', 'UTC -0500'),
(117, 'America/Indiana/Petersburg', 'UTC -0500'),
(118, 'America/Indiana/Tell_City', 'UTC -0600'),
(119, 'America/Indiana/Vevay', 'UTC -0500'),
(120, 'America/Indiana/Vincennes', 'UTC -0500'),
(121, 'America/Indiana/Winamac', 'UTC -0500'),
(122, 'America/Inuvik', 'UTC -0700'),
(123, 'America/Iqaluit', 'UTC -0500'),
(124, 'America/Jamaica', 'UTC -0500'),
(125, 'America/Juneau', 'UTC -0900'),
(126, 'America/Kentucky/Louisville', 'UTC -0500'),
(127, 'America/Kentucky/Monticello', 'UTC -0500'),
(128, 'America/Kralendijk', 'UTC -0400'),
(129, 'America/La_Paz', 'UTC -0400'),
(130, 'America/Lima', 'UTC -0500'),
(131, 'America/Los_Angeles', 'UTC -0800'),
(132, 'America/Lower_Princes', 'UTC -0400'),
(133, 'America/Maceio', 'UTC -0300'),
(134, 'America/Managua', 'UTC -0600'),
(135, 'America/Manaus', 'UTC -0400'),
(136, 'America/Marigot', 'UTC -0400'),
(137, 'America/Martinique', 'UTC -0400'),
(138, 'America/Matamoros', 'UTC -0600'),
(139, 'America/Mazatlan', 'UTC -0700'),
(140, 'America/Menominee', 'UTC -0600'),
(141, 'America/Merida', 'UTC -0600'),
(142, 'America/Metlakatla', 'UTC -0800'),
(143, 'America/Mexico_City', 'UTC -0600'),
(144, 'America/Miquelon', 'UTC -0300'),
(145, 'America/Moncton', 'UTC -0400'),
(146, 'America/Monterrey', 'UTC -0600'),
(147, 'America/Montevideo', 'UTC -0200'),
(148, 'America/Montreal', 'UTC -0500'),
(149, 'America/Montserrat', 'UTC -0400'),
(150, 'America/Nassau', 'UTC -0500'),
(151, 'America/New_York', 'UTC -0500'),
(152, 'America/Nipigon', 'UTC -0500'),
(153, 'America/Nome', 'UTC -0900'),
(154, 'America/Noronha', 'UTC -0200'),
(155, 'America/North_Dakota/Beulah', 'UTC -0600'),
(156, 'America/North_Dakota/Center', 'UTC -0600'),
(157, 'America/North_Dakota/New_Salem', 'UTC -0600'),
(158, 'America/Ojinaga', 'UTC -0700'),
(159, 'America/Panama', 'UTC -0500'),
(160, 'America/Pangnirtung', 'UTC -0500'),
(161, 'America/Paramaribo', 'UTC -0300'),
(162, 'America/Phoenix', 'UTC -0700'),
(163, 'America/Port_of_Spain', 'UTC -0400'),
(164, 'America/Port', 'UTC -0500'),
(165, 'America/Porto_Velho', 'UTC -0400'),
(166, 'America/Puerto_Rico', 'UTC -0400'),
(167, 'America/Rainy_River', 'UTC -0600'),
(168, 'America/Rankin_Inlet', 'UTC -0600'),
(169, 'America/Recife', 'UTC -0300'),
(170, 'America/Regina', 'UTC -0600'),
(171, 'America/Resolute', 'UTC -0500'),
(172, 'America/Rio_Branco', 'UTC -0400'),
(173, 'America/Santa_Isabel', 'UTC -0800'),
(174, 'America/Santarem', 'UTC -0300'),
(175, 'America/Santiago', 'UTC -0300'),
(176, 'America/Santo_Domingo', 'UTC -0400'),
(177, 'America/Sao_Paulo', 'UTC -0200'),
(178, 'America/Scoresbysund', 'UTC -0100'),
(179, 'America/Shiprock', 'UTC -0700'),
(180, 'America/Sitka', 'UTC -0900'),
(181, 'America/St_Barthelemy', 'UTC -0400'),
(182, 'America/St_Johns', 'UTC -0330'),
(183, 'America/St_Kitts', 'UTC -0400'),
(184, 'America/St_Lucia', 'UTC -0400'),
(185, 'America/St_Thomas', 'UTC -0400'),
(186, 'America/St_Vincent', 'UTC -0400'),
(187, 'America/Swift_Current', 'UTC -0600'),
(188, 'America/Tegucigalpa', 'UTC -0600'),
(189, 'America/Thule', 'UTC -0400'),
(190, 'America/Thunder_Bay', 'UTC -0500'),
(191, 'America/Tijuana', 'UTC -0800'),
(192, 'America/Toronto', 'UTC -0500'),
(193, 'America/Tortola', 'UTC -0400'),
(194, 'America/Vancouver', 'UTC -0800'),
(195, 'America/Whitehorse', 'UTC -0800'),
(196, 'America/Winnipeg', 'UTC -0600'),
(197, 'America/Yakutat', 'UTC -0900'),
(198, 'America/Yellowknife', 'UTC -0700'),
(199, 'Antarctica/Casey', 'UTC +0800'),
(200, 'Antarctica/Davis', 'UTC +0700'),
(201, 'Antarctica/DumontDUrville', 'UTC +1000'),
(202, 'Antarctica/Macquarie', 'UTC +1100'),
(203, 'Antarctica/Mawson', 'UTC +0500'),
(204, 'Antarctica/McMurdo', 'UTC +1300'),
(205, 'Antarctica/Palmer', 'UTC -0300'),
(206, 'Antarctica/Rothera', 'UTC -0300'),
(207, 'Antarctica/South_Pole', 'UTC +1300'),
(208, 'Antarctica/Syowa', 'UTC +0300'),
(209, 'Antarctica/Vostok', 'UTC +0600'),
(210, 'Arctic/Longyearbyen', 'UTC +0100'),
(211, 'Asia/Aden', 'UTC +0300'),
(212, 'Asia/Almaty', 'UTC +0600'),
(213, 'Asia/Amman', 'UTC +0200'),
(214, 'Asia/Anadyr', 'UTC +1200'),
(215, 'Asia/Aqtau', 'UTC +0500'),
(216, 'Asia/Aqtobe', 'UTC +0500'),
(217, 'Asia/Ashgabat', 'UTC +0500'),
(218, 'Asia/Baghdad', 'UTC +0300'),
(219, 'Asia/Bahrain', 'UTC +0300'),
(220, 'Asia/Baku', 'UTC +0400'),
(221, 'Asia/Bangkok', 'UTC +0700'),
(222, 'Asia/Beirut', 'UTC +0200'),
(223, 'Asia/Bishkek', 'UTC +0600'),
(224, 'Asia/Brunei', 'UTC +0800'),
(225, 'Asia/Choibalsan', 'UTC +0800'),
(226, 'Asia/Chongqing', 'UTC +0800'),
(227, 'Asia/Colombo', 'UTC +0530'),
(228, 'Asia/Damascus', 'UTC +0200'),
(229, 'Asia/Dhaka', 'UTC +0600'),
(230, 'Asia/Dili', 'UTC +0900'),
(231, 'Asia/Dubai', 'UTC +0400'),
(232, 'Asia/Dushanbe', 'UTC +0500'),
(233, 'Asia/Gaza', 'UTC +0200'),
(234, 'Asia/Harbin', 'UTC +0800'),
(235, 'Asia/Ho_Chi_Minh', 'UTC +0700'),
(236, 'Asia/Hong_Kong', 'UTC +0800'),
(237, 'Asia/Hovd', 'UTC +0700'),
(238, 'Asia/Irkutsk', 'UTC +0900'),
(239, 'Asia/Jakarta', 'UTC +0700'),
(240, 'Asia/Jayapura', 'UTC +0900'),
(241, 'Asia/Jerusalem', 'UTC +0200'),
(242, 'Asia/Kabul', 'UTC +0430'),
(243, 'Asia/Kamchatka', 'UTC +1200'),
(244, 'Asia/Karachi', 'UTC +0500'),
(245, 'Asia/Kashgar', 'UTC +0800'),
(246, 'Asia/Kathmandu', 'UTC +0545'),
(247, 'Asia/Kolkata', 'UTC +0530'),
(248, 'Asia/Krasnoyarsk', 'UTC +0800'),
(249, 'Asia/Kuala_Lumpur', 'UTC +0800'),
(250, 'Asia/Kuching', 'UTC +0800'),
(251, 'Asia/Kuwait', 'UTC +0300'),
(252, 'Asia/Macau', 'UTC +0800'),
(253, 'Asia/Magadan', 'UTC +1200'),
(254, 'Asia/Makassar', 'UTC +0800'),
(255, 'Asia/Manila', 'UTC +0800'),
(256, 'Asia/Muscat', 'UTC +0400'),
(257, 'Asia/Nicosia', 'UTC +0200'),
(258, 'Asia/Novokuznetsk', 'UTC +0700'),
(259, 'Asia/Novosibirsk', 'UTC +0700'),
(260, 'Asia/Omsk', 'UTC +0700'),
(261, 'Asia/Oral', 'UTC +0500'),
(262, 'Asia/Phnom_Penh', 'UTC +0700'),
(263, 'Asia/Pontianak', 'UTC +0700'),
(264, 'Asia/Pyongyang', 'UTC +0900'),
(265, 'Asia/Qatar', 'UTC +0300'),
(266, 'Asia/Qyzylorda', 'UTC +0600'),
(267, 'Asia/Rangoon', 'UTC +0630'),
(268, 'Asia/Riyadh', 'UTC +0300'),
(269, 'Asia/Sakhalin', 'UTC +1100'),
(270, 'Asia/Samarkand', 'UTC +0500'),
(271, 'Asia/Seoul', 'UTC +0900'),
(272, 'Asia/Shanghai', 'UTC +0800'),
(273, 'Asia/Singapore', 'UTC +0800'),
(274, 'Asia/Taipei', 'UTC +0800'),
(275, 'Asia/Tashkent', 'UTC +0500'),
(276, 'Asia/Tbilisi', 'UTC +0400'),
(277, 'Asia/Tehran', 'UTC +0330'),
(278, 'Asia/Thimphu', 'UTC +0600'),
(279, 'Asia/Tokyo', 'UTC +0900'),
(280, 'Asia/Ulaanbaatar', 'UTC +0800'),
(281, 'Asia/Urumqi', 'UTC +0800'),
(282, 'Asia/Vientiane', 'UTC +0700'),
(283, 'Asia/Vladivostok', 'UTC +1100'),
(284, 'Asia/Yakutsk', 'UTC +1000'),
(285, 'Asia/Yekaterinburg', 'UTC +0600'),
(286, 'Asia/Yerevan', 'UTC +0400'),
(287, 'Atlantic/Azores', 'UTC -0100'),
(288, 'Atlantic/Bermuda', 'UTC -0400'),
(289, 'Atlantic/Canary', 'UTC +0000'),
(290, 'Atlantic/Cape_Verde', 'UTC -0100'),
(291, 'Atlantic/Faroe', 'UTC +0000'),
(292, 'Atlantic/Madeira', 'UTC +0000'),
(293, 'Atlantic/Reykjavik', 'UTC +0000'),
(294, 'Atlantic/South_Georgia', 'UTC -0200'),
(295, 'Atlantic/St_Helena', 'UTC +0000'),
(296, 'Atlantic/Stanley', 'UTC -0300'),
(297, 'Australia/Adelaide', 'UTC +1030'),
(298, 'Australia/Brisbane', 'UTC +1000'),
(299, 'Australia/Broken_Hill', 'UTC +1030'),
(300, 'Australia/Currie', 'UTC +1100'),
(301, 'Australia/Darwin', 'UTC +0930'),
(302, 'Australia/Eucla', 'UTC +0845'),
(303, 'Australia/Hobart', 'UTC +1100'),
(304, 'Australia/Lindeman', 'UTC +1000'),
(305, 'Australia/Lord_Howe', 'UTC +1100'),
(306, 'Australia/Melbourne', 'UTC +1100'),
(307, 'Australia/Perth', 'UTC +0800'),
(308, 'Australia/Sydney', 'UTC +1100'),
(309, 'Europe/Amsterdam', 'UTC +0100'),
(310, 'Europe/Andorra', 'UTC +0100'),
(311, 'Europe/Athens', 'UTC +0200'),
(312, 'Europe/Belgrade', 'UTC +0100'),
(313, 'Europe/Berlin', 'UTC +0100'),
(314, 'Europe/Bratislava', 'UTC +0100'),
(315, 'Europe/Brussels', 'UTC +0100'),
(316, 'Europe/Bucharest', 'UTC +0200'),
(317, 'Europe/Budapest', 'UTC +0100'),
(318, 'Europe/Chisinau', 'UTC +0200'),
(319, 'Europe/Copenhagen', 'UTC +0100'),
(320, 'Europe/Dublin', 'UTC +0000'),
(321, 'Europe/Gibraltar', 'UTC +0100'),
(322, 'Europe/Guernsey', 'UTC +0000'),
(323, 'Europe/Helsinki', 'UTC +0200'),
(324, 'Europe/Isle_of_Man', 'UTC +0000'),
(325, 'Europe/Istanbul', 'UTC +0200'),
(326, 'Europe/Jersey', 'UTC +0000'),
(327, 'Europe/Kaliningrad', 'UTC +0300'),
(328, 'Europe/Kiev', 'UTC +0200'),
(329, 'Europe/Lisbon', 'UTC +0000'),
(330, 'Europe/Ljubljana', 'UTC +0100'),
(331, 'Europe/London', 'UTC +0000'),
(332, 'Europe/Luxembourg', 'UTC +0100'),
(333, 'Europe/Madrid', 'UTC +0100'),
(334, 'Europe/Malta', 'UTC +0100'),
(335, 'Europe/Mariehamn', 'UTC +0200'),
(336, 'Europe/Minsk', 'UTC +0200'),
(337, 'Europe/Monaco', 'UTC +0100'),
(338, 'Europe/Moscow', 'UTC +0400'),
(339, 'Europe/Oslo', 'UTC +0100'),
(340, 'Europe/Paris', 'UTC +0100'),
(341, 'Europe/Podgorica', 'UTC +0100'),
(342, 'Europe/Prague', 'UTC +0100'),
(343, 'Europe/Riga', 'UTC +0200'),
(344, 'Europe/Rome', 'UTC +0100'),
(345, 'Europe/Samara', 'UTC +0400'),
(346, 'Europe/San_Marino', 'UTC +0100'),
(347, 'Europe/Sarajevo', 'UTC +0100'),
(348, 'Europe/Simferopol', 'UTC +0200'),
(349, 'Europe/Skopje', 'UTC +0100'),
(350, 'Europe/Sofia', 'UTC +0200'),
(351, 'Europe/Stockholm', 'UTC +0100'),
(352, 'Europe/Tallinn', 'UTC +0200'),
(353, 'Europe/Tirane', 'UTC +0100'),
(354, 'Europe/Uzhgorod', 'UTC +0200'),
(355, 'Europe/Vaduz', 'UTC +0100'),
(356, 'Europe/Vatican', 'UTC +0100'),
(357, 'Europe/Vienna', 'UTC +0100'),
(358, 'Europe/Vilnius', 'UTC +0200'),
(359, 'Europe/Volgograd', 'UTC +0400'),
(360, 'Europe/Warsaw', 'UTC +0100'),
(361, 'Europe/Zagreb', 'UTC +0100'),
(362, 'Europe/Zaporozhye', 'UTC +0200'),
(363, 'Europe/Zurich', 'UTC +0100'),
(364, 'Indian/Antananarivo', 'UTC +0300'),
(365, 'Indian/Chagos', 'UTC +0600'),
(366, 'Indian/Christmas', 'UTC +0700'),
(367, 'Indian/Cocos', 'UTC +0630'),
(368, 'Indian/Comoro', 'UTC +0300'),
(369, 'Indian/Kerguelen', 'UTC +0500'),
(370, 'Indian/Mahe', 'UTC +0400'),
(371, 'Indian/Maldives', 'UTC +0500'),
(372, 'Indian/Mauritius', 'UTC +0400'),
(373, 'Indian/Mayotte', 'UTC +0300'),
(374, 'Indian/Reunion', 'UTC +0400'),
(375, 'Pacific/Apia', 'UTC -1100'),
(376, 'Pacific/Auckland', 'UTC +1300'),
(377, 'Pacific/Chatham', 'UTC +1345'),
(378, 'Pacific/Chuuk', 'UTC +1000'),
(379, 'Pacific/Easter', 'UTC -0500'),
(380, 'Pacific/Efate', 'UTC +1100'),
(381, 'Pacific/Enderbury', 'UTC +1300'),
(382, 'Pacific/Fakaofo', 'UTC -1000'),
(383, 'Pacific/Fiji', 'UTC +1200'),
(384, 'Pacific/Funafuti', 'UTC +1200'),
(385, 'Pacific/Galapagos', 'UTC -0600'),
(386, 'Pacific/Gambier', 'UTC -0900'),
(387, 'Pacific/Guadalcanal', 'UTC +1100'),
(388, 'Pacific/Guam', 'UTC +1000'),
(389, 'Pacific/Honolulu', 'UTC -1000'),
(390, 'Pacific/Johnston', 'UTC -1000'),
(391, 'Pacific/Kiritimati', 'UTC +1400'),
(392, 'Pacific/Kosrae', 'UTC +1100'),
(393, 'Pacific/Kwajalein', 'UTC +1200'),
(394, 'Pacific/Majuro', 'UTC +1200'),
(395, 'Pacific/Marquesas', 'UTC -0930'),
(396, 'Pacific/Midway', 'UTC -1100'),
(397, 'Pacific/Nauru', 'UTC +1200'),
(398, 'Pacific/Niue', 'UTC -1100'),
(399, 'Pacific/Norfolk', 'UTC +1130'),
(400, 'Pacific/Noumea', 'UTC +1100'),
(401, 'Pacific/Pago_Pago', 'UTC -1100'),
(402, 'Pacific/Palau', 'UTC +0900'),
(403, 'Pacific/Pitcairn', 'UTC -0800'),
(404, 'Pacific/Pohnpei', 'UTC +1100'),
(405, 'Pacific/Port_Moresby', 'UTC +1000'),
(406, 'Pacific/Rarotonga', 'UTC -1000'),
(407, 'Pacific/Saipan', 'UTC +1000'),
(408, 'Pacific/Tahiti', 'UTC -1000'),
(409, 'Pacific/Tarawa', 'UTC +1200'),
(410, 'Pacific/Tongatapu', 'UTC +1300'),
(411, 'Pacific/Wake', 'UTC +1200'),
(412, 'Pacific/Wallis', 'UTC +1200');

-- --------------------------------------------------------

--
-- Table structure for table `fms_pr_valuta_category`
--

CREATE TABLE IF NOT EXISTS `fms_pr_valuta_category` (
  `id_fms_pr_valuta_category` int(11) NOT NULL AUTO_INCREMENT,
  `valuta_category_name` varchar(255) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`id_fms_pr_valuta_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fms_pr_valuta_category`
--

INSERT INTO `fms_pr_valuta_category` (`id_fms_pr_valuta_category`, `valuta_category_name`, `symbol`) VALUES
(1, 'Rupiah', 'Rp.');

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_backlink`
--

CREATE TABLE IF NOT EXISTS `fms_sm_backlink` (
  `id_fms_sm_backlink` int(11) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_backlink`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_city`
--

CREATE TABLE IF NOT EXISTS `fms_sm_city` (
  `id_fms_sm_city` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_country` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_city`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fms_sm_city`
--

INSERT INTO `fms_sm_city` (`id_fms_sm_city`, `id_fms_sm_country`, `city_name`, `id_fms_pr_active_category`, `timestamp`) VALUES
(1, 1, 'Jakarta Pusat', 1, '2014-03-05 07:07:52'),
(2, 1, 'Jakarta Selatan', 1, '2014-03-05 07:07:56'),
(3, 1, 'Jakarta Utara', 1, '2014-03-05 07:07:55'),
(4, 1, 'Jakarta Barat', 1, '2014-03-05 07:07:57'),
(5, 1, 'Jakarta Timur', 1, '2014-03-05 07:07:59'),
(6, 1, 'Depok', 1, '2014-03-05 07:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_country`
--

CREATE TABLE IF NOT EXISTS `fms_sm_country` (
  `id_fms_sm_country` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_country`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fms_sm_country`
--

INSERT INTO `fms_sm_country` (`id_fms_sm_country`, `country_name`) VALUES
(1, 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_customer`
--

CREATE TABLE IF NOT EXISTS `fms_sm_customer` (
  `id_fms_sm_customer` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bod` date NOT NULL,
  `id_fms_sm_active_category` int(11) NOT NULL,
  PRIMARY KEY (`id_fms_sm_customer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_history`
--

CREATE TABLE IF NOT EXISTS `fms_sm_history` (
  `id_fms_sm_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_user` int(11) NOT NULL,
  `id_fms_sm_member` int(11) NOT NULL,
  `id_fms_sm_client` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_history`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_member`
--

CREATE TABLE IF NOT EXISTS `fms_sm_member` (
  `id_fms_sm_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_fms_pr_religion_category` int(11) NOT NULL,
  `id_fms_pr_marital_status_category` int(11) NOT NULL,
  `id_fms_pr_nationality_category` int(11) NOT NULL,
  `identification_number` varchar(255) NOT NULL,
  `id_fms_pr_member_tag` text NOT NULL,
  `is_online` int(11) NOT NULL,
  `last_seen` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `member_signature` int(11) NOT NULL,
  `img_url` text NOT NULL,
  `id_fms_pr_active_category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_member`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_menu`
--

CREATE TABLE IF NOT EXISTS `fms_sm_menu` (
  `id_fms_sm_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_parent` int(11) DEFAULT NULL,
  `id_menu_category` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `icon_url` varchar(255) DEFAULT NULL,
  `order_number` int(11) NOT NULL,
  PRIMARY KEY (`id_fms_sm_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_module`
--

CREATE TABLE IF NOT EXISTS `fms_sm_module` (
  `id_fms_sm_module` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `id_parent_module` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `id_fms_pr_module_category` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fms_sm_module`),
  KEY `id_mf_pr_kategori_module` (`id_fms_pr_module_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_officer`
--

CREATE TABLE IF NOT EXISTS `fms_sm_officer` (
  `id_fms_sm_officer` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_officer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_order`
--

CREATE TABLE IF NOT EXISTS `fms_sm_order` (
  `id_fms_sm_order` int(11) NOT NULL,
  `id_fms_pr_order_category` int(11) NOT NULL,
  `id_fms_sm_customer` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_order`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_order_detail`
--

CREATE TABLE IF NOT EXISTS `fms_sm_order_detail` (
  `id_fms_sm_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_order` int(11) NOT NULL,
  `id_fms_sm_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_fms_sm_order_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_order_temp`
--

CREATE TABLE IF NOT EXISTS `fms_sm_order_temp` (
  `id_fms_sm_order_temp` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_product` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp_temp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock_temp` int(11) NOT NULL,
  PRIMARY KEY (`id_fms_sm_order_temp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_page`
--

CREATE TABLE IF NOT EXISTS `fms_sm_page` (
  `id_fms_sm_page` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_menu` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_page`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_portfolio`
--

CREATE TABLE IF NOT EXISTS `fms_sm_portfolio` (
  `id_fms_sm_portfolio` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_portfolio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_portfolio_comment`
--

CREATE TABLE IF NOT EXISTS `fms_sm_portfolio_comment` (
  `id_fms_sm_portfolio_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_portfolio` int(11) NOT NULL,
  `id_fms_sm_active_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_portfolio_comment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_post`
--

CREATE TABLE IF NOT EXISTS `fms_sm_post` (
  `id_fms_sm_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_pr_post_category` int(11) NOT NULL,
  `id_fms_pr_headline_category` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `id_fms_pr_post_tag` text NOT NULL,
  `image_url` text NOT NULL,
  PRIMARY KEY (`id_fms_sm_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_post_comment`
--

CREATE TABLE IF NOT EXISTS `fms_sm_post_comment` (
  `id_fms_sm_post_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_fms_sm_post` int(11) NOT NULL,
  `id_fms_sm_active_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fms_sm_post_comment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_product`
--

CREATE TABLE IF NOT EXISTS `fms_sm_product` (
  `id_fms_sm_product` int(5) NOT NULL AUTO_INCREMENT,
  `id_fms_pr_product_category` int(5) NOT NULL,
  `product_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `price` int(20) NOT NULL,
  `stock` int(5) NOT NULL,
  `weight` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `tgl_masuk` date NOT NULL,
  `image_url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `has_sold` int(5) NOT NULL DEFAULT '1',
  `discount` int(5) NOT NULL,
  PRIMARY KEY (`id_fms_sm_product`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_static_module`
--

CREATE TABLE IF NOT EXISTS `fms_sm_static_module` (
  `id_fms_sm_static_module` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `id_parent_module` int(11) DEFAULT NULL,
  `table_name` varchar(255) NOT NULL,
  `id_fms_pr_module_category` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fms_sm_static_module`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `fms_sm_static_module`
--

INSERT INTO `fms_sm_static_module` (`id_fms_sm_static_module`, `module_name`, `id_parent_module`, `table_name`, `id_fms_pr_module_category`, `img`) VALUES
(3, 'Post', 0, 'fms_sm_post', 2, ''),
(4, 'Portfolios', 0, 'fms_sm_portfolio', 2, ''),
(5, 'Testimonials', 0, 'fms_sm_testimonials', 2, NULL),
(6, 'Subscribers', 0, 'fms_sm_subscriber', 2, NULL),
(12, 'Product', 0, 'fms_sm_product', 3, ''),
(13, 'Orders', 0, 'fms_sm_order', 3, ''),
(14, 'Shop Preferences', 0, 'fms_sm_shop_preference', 3, ''),
(15, 'Menus', 0, 'fms_sm_menu', 1, ''),
(16, 'Appearances', 0, 'fms_sm_appearances', 1, ''),
(17, 'User', 0, 'fms_sm_users', 1, ''),
(18, 'Product Category', 12, 'fms_pr_product_category', 3, ''),
(19, 'Post Category', 3, 'fms_pr_post_category', 2, ''),
(20, 'Post Tags', 3, 'fms_pr_post_tag', 2, ''),
(21, 'Post Comments', 3, 'fms_sm_post_comment', 2, ''),
(22, 'Portfolios Categories', 4, 'fms_pr_portfolio_category', 2, ''),
(23, 'Portfolios Tags', 4, 'fms_pr_portfolio_tag', 2, ''),
(24, 'Portfolios Comments', 4, 'fms_sm_portfolio_comment', 2, ''),
(25, 'Member', 17, 'fms_sm_member', 1, ''),
(26, 'Officer', 17, 'fms_sm_officer', 1, ''),
(27, 'Module Management', 0, 'fms_sm_module', 1, ''),
(28, 'Module Category', 27, 'fms_pr_module_category', 1, ''),
(29, 'Backlink', 0, 'fms_sm_backlink', 2, ''),
(30, 'Kategori Headline', 3, 'fms_pr_headline_category', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_subscriber`
--

CREATE TABLE IF NOT EXISTS `fms_sm_subscriber` (
  `id_fms_sm_subscriber` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_subscriber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_testimonial`
--

CREATE TABLE IF NOT EXISTS `fms_sm_testimonial` (
  `id_fms_sm_testimonial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fms_sm_testimonial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fms_sm_user`
--

CREATE TABLE IF NOT EXISTS `fms_sm_user` (
  `id_fms_sm_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `link_to_id_member` int(11) DEFAULT NULL,
  `last_login` text NOT NULL,
  PRIMARY KEY (`id_fms_sm_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fms_sm_user`
--

INSERT INTO `fms_sm_user` (`id_fms_sm_user`, `username`, `password`, `link_to_id_member`, `last_login`) VALUES
(2, 'febri', '0cc175b9c0f1b6a831c399e269772661', 1, '-'),
(1, 'admin', '4db4364bf5e54b5a0e8b0e1fb04737d0', 4, '132');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

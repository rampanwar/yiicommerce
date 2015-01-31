-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2015 at 04:41 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(255) NOT NULL,
  `a_selection` enum('1','2','3','4','5') NOT NULL COMMENT '1=textbox, 2=radio, 3=checkbox, 4=dropdown, 5=textarea',
  `a_date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `a_date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`a_id`, `a_name`, `a_selection`, `a_date_created`, `a_date_updated`) VALUES
(1, 'Color', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Name', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_data`
--

DROP TABLE IF EXISTS `attribute_data`;
CREATE TABLE IF NOT EXISTS `attribute_data` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_attribute_id` int(11) NOT NULL,
  `ad_value` varchar(255) NOT NULL,
  `ad_is_default` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  PRIMARY KEY (`ad_id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `attribute_data`
--

INSERT INTO `attribute_data` (`ad_id`, `ad_attribute_id`, `ad_value`, `ad_is_default`) VALUES
(1, 1, 'Red', '0'),
(2, 1, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

DROP TABLE IF EXISTS `attribute_group`;
CREATE TABLE IF NOT EXISTS `attribute_group` (
  `ag_id` int(11) NOT NULL AUTO_INCREMENT,
  `ag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group_set`
--

DROP TABLE IF EXISTS `attribute_group_set`;
CREATE TABLE IF NOT EXISTS `attribute_group_set` (
  `ags_id` int(11) NOT NULL AUTO_INCREMENT,
  `ags_category_id` int(11) NOT NULL,
  `ags_group_id` int(11) NOT NULL,
  `ags_attribute_id` int(11) NOT NULL,
  PRIMARY KEY (`ags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_units`
--

DROP TABLE IF EXISTS `attribute_units`;
CREATE TABLE IF NOT EXISTS `attribute_units` (
  `au_id` int(11) NOT NULL,
  `au_attribute_id` int(11) NOT NULL,
  `au_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `itemname` (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, NULL),
('buyer', '3', NULL, NULL),
('supplier', '2', NULL, NULL),
('supplier', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'administrator', '', NULL),
('AdmindashboardAdminIndex', 0, NULL, NULL, NULL),
('AdmindashboardAdminLogin', 0, NULL, NULL, NULL),
('AdmindashboardAdminLogout', 0, NULL, NULL, NULL),
('AdmindashboardAttributedataManage', 0, '', NULL, NULL),
('AdmindashboardAttributesAdmin', 0, '', NULL, NULL),
('AdmindashboardAttributesCreate', 0, '', NULL, NULL),
('AdmindashboardAttributesDelete', 0, '', NULL, NULL),
('AdmindashboardAttributesIndex', 0, '', NULL, NULL),
('AdmindashboardAttributesUpdate', 0, '', NULL, NULL),
('AdmindashboardAttributesView', 0, '', NULL, NULL),
('AdmindashboardAuthdataCreate', 0, NULL, NULL, NULL),
('AdmindashboardAuthdataDelete', 0, NULL, NULL, NULL),
('AdmindashboardAuthdataIndex', 0, NULL, NULL, NULL),
('AdmindashboardCategoriesAdmin', 0, '', NULL, NULL),
('AdmindashboardCategoriesCreate', 0, '', NULL, NULL),
('AdmindashboardCategoriesDelete', 0, '', NULL, NULL),
('AdmindashboardCategoriesIndex', 0, NULL, NULL, NULL),
('AdmindashboardCategoriesUpdate', 0, '', NULL, NULL),
('AdmindashboardCategoriesView', 0, '', NULL, NULL),
('AdmindashboardSiteError', 0, NULL, NULL, NULL),
('AdmindashboardSubCategoriesAdmin', 0, '', NULL, NULL),
('AdmindashboardSubCategoriesCreate', 0, '', NULL, NULL),
('AdmindashboardSubCategoriesDelete', 0, '', NULL, NULL),
('AdmindashboardSubCategoriesIndex', 0, '', NULL, NULL),
('AdmindashboardSubCategoriesUpdate', 0, '', NULL, NULL),
('AdmindashboardSubCategoriesView', 0, '', NULL, NULL),
('AttributesAdmin', 0, '', NULL, NULL),
('AttributesCreate', 0, '', NULL, NULL),
('AttributesDetele', 0, '', NULL, NULL),
('AttributesIndex', 0, '', NULL, NULL),
('AttributesUpdate', 0, '', NULL, NULL),
('AttributesView', 0, '', NULL, NULL),
('buyer', 2, 'buyer', '', NULL),
('guest', 2, 'guest user. for access without login.', '', NULL),
('SiteError', 0, NULL, NULL, NULL),
('supplier', 2, 'supplier', '', NULL),
('UsersAutocomplete', 0, NULL, NULL, NULL),
('UsersCaptcha', 0, NULL, NULL, NULL),
('UsersChangepassword', 0, '', NULL, NULL),
('UsersDeleteaccount', 0, '', NULL, NULL),
('UsersForgotpassword', 0, '', NULL, NULL),
('UsersHome', 0, 'landing page', NULL, NULL),
('UsersIndex', 0, 'profile page', NULL, NULL),
('UsersLogin', 0, 'to log-in to the front end site', '', NULL),
('UsersLogout', 0, 'to log-out the user', NULL, NULL),
('UsersResetpassword', 0, '', NULL, NULL),
('UsersSignup', 0, 'front-end users signup', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`child`,`parent`),
  KEY `parent` (`parent`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'AdmindashboardAdminIndex'),
('admin', 'AdmindashboardAdminLogout'),
('admin', 'AdmindashboardAttributedataManage'),
('admin', 'AdmindashboardAttributesAdmin'),
('admin', 'AdmindashboardAttributesCreate'),
('admin', 'AdmindashboardAttributesDelete'),
('admin', 'AdmindashboardAttributesIndex'),
('admin', 'AdmindashboardAttributesUpdate'),
('admin', 'AdmindashboardAttributesView'),
('admin', 'AdmindashboardAuthdataCreate'),
('admin', 'AdmindashboardAuthdataDelete'),
('admin', 'AdmindashboardAuthdataIndex'),
('admin', 'AdmindashboardCategoriesAdmin'),
('admin', 'AdmindashboardCategoriesCreate'),
('admin', 'AdmindashboardCategoriesDelete'),
('admin', 'AdmindashboardCategoriesIndex'),
('admin', 'AdmindashboardCategoriesUpdate'),
('admin', 'AdmindashboardCategoriesView'),
('admin', 'AdmindashboardSubCategoriesAdmin'),
('admin', 'AdmindashboardSubCategoriesCreate'),
('admin', 'AdmindashboardSubCategoriesDelete'),
('admin', 'AdmindashboardSubCategoriesIndex'),
('admin', 'AdmindashboardSubCategoriesUpdate'),
('admin', 'AdmindashboardSubCategoriesView'),
('admin', 'AttributesDetele'),
('admin', 'AttributesIndex'),
('admin', 'AttributesUpdate'),
('admin', 'supplier'),
('buyer', 'guest'),
('buyer', 'UsersChangepassword'),
('buyer', 'UsersDeleteaccount'),
('buyer', 'UsersIndex'),
('buyer', 'UsersLogout'),
('guest', 'AdmindashboardAdminLogin'),
('guest', 'AdmindashboardSiteError'),
('guest', 'SiteError'),
('guest', 'UsersAutocomplete'),
('guest', 'UsersCaptcha'),
('guest', 'UsersForgotpassword'),
('guest', 'UsersHome'),
('guest', 'UsersLogin'),
('guest', 'UsersResetpassword'),
('guest', 'UsersSignup'),
('supplier', 'AttributesAdmin'),
('supplier', 'AttributesCreate'),
('supplier', 'AttributesView'),
('supplier', 'buyer');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=base, 1=child',
  `c_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `c_description` text CHARACTER SET latin1,
  `c_parent_category_id` int(11) DEFAULT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `c_date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `c_deleted` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '0' COMMENT '0=not deleted, 1=deleted',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_type`, `c_name`, `c_description`, `c_parent_category_id`, `c_date_created`, `c_date_updated`, `c_deleted`) VALUES
(1, '0', 'Electronics', 'description for the electronics category', NULL, '2014-11-11 04:27:48', '2014-11-11 04:30:09', '0'),
(2, '0', 'Clothings', 'Main parent category for cloths', NULL, '2014-11-12 04:02:34', '0000-00-00 00:00:00', '0'),
(3, '0', 'Books', 'main books category', NULL, '2014-11-12 04:09:16', '0000-00-00 00:00:00', '0'),
(4, '0', 'Footwear', 'main footwear category', NULL, '2014-11-12 04:09:53', '0000-00-00 00:00:00', '0'),
(5, '0', 'Home/Kitchen', 'home and kitchen appliances', NULL, '2014-11-12 04:11:48', '0000-00-00 00:00:00', '0'),
(6, '1', 'Storage', 'all storage media types are listed under this.', 1, '2014-11-12 16:54:40', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

DROP TABLE IF EXISTS `category_attributes`;
CREATE TABLE IF NOT EXISTS `category_attributes` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_subcategory_id` int(11) NOT NULL,
  `ca_attribute_id` int(11) NOT NULL,
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `cityID` mediumint(6) NOT NULL DEFAULT '0',
  `cityName` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortCity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regionID` smallint(8) DEFAULT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `cityName`, `shortCity`, `regionID`) VALUES
(1, 'Abbeville', 'Abbeville', 1),
(2999, 'Likely', 'Likely', 5),
(3000, 'Lily Gap', 'LilyGap', 5),
(3001, 'Lincoln', 'Lincoln', 5),
(3002, 'Lincoln Village', 'LincolnVillage', 5),
(3003, 'Linda', 'Linda', 5),
(3004, 'Linden', 'Linden', 5),
(3005, 'Lindsay', 'Lindsay', 5),
(3006, 'Littlerock', 'Littlerock', 5),
(3007, 'Live Oak', 'LiveOak', 5),
(3008, 'Livermore', 'Livermore', 5),
(3009, 'Livingston', 'Livingston', 5),
(3010, 'Loch Lomond', 'LochLomond', 5),
(3011, 'Lockeford', 'Lockeford', 5),
(3012, 'Lockwood Valley', 'LockwoodValley', 5),
(3013, 'Lodgepole', 'Lodgepole', 5),
(3014, 'Lodi', 'Lodi', 5),
(3015, 'Lodoga', 'Lodoga', 5),
(3016, 'Loleta', 'Loleta', 5),
(3017, 'Loma Linda', 'LomaLinda', 5),
(3018, 'Loma Rica', 'LomaRica', 5),
(3019, 'Lompoc', 'Lompoc', 5),
(3020, 'Lone Pine', 'LonePine', 5),
(3021, 'Long Barn', 'LongBarn', 5),
(3022, 'Long Beach', 'LongBeach', 5),
(3023, 'Lookout', 'Lookout', 5),
(3024, 'Lookout Peak', 'LookoutPeak', 5),
(3025, 'Loomis', 'Loomis', 5),
(3026, 'Los Alamitos', 'LosAlamitos', 5),
(3027, 'Los Altos', 'LosAltos', 5),
(3028, 'Los Altos Hills', 'LosAltosHills', 5),
(3029, 'Los Angeles', 'LosAngeles', 5),
(3030, 'Los Banos', 'LosBanos', 5),
(3031, 'Los Gatos', 'LosGatos', 5),
(3032, 'Los Molinos', 'LosMolinos', 5),
(3033, 'Los Serranos', 'LosSerranos', 5),
(3034, 'Lost Hills', 'LostHills', 5),
(3035, 'Lost Horse-Keys Village', 'LostHorse-KeysVillage', 5),
(3036, 'Lotus', 'Lotus', 5),
(3037, 'Lovelock', 'Lovelock', 5),
(3038, 'Lower Lake', 'LowerLake', 5),
(3039, 'Loyalton', 'Loyalton', 5),
(3040, 'Loyola', 'Loyola', 5),
(3041, 'Lucas Valley-Marinwood', 'LucasValley-Marinwood', 5),
(3042, 'Lucerne', 'Lucerne', 5),
(3043, 'Ludlow', 'Ludlow', 5),
(3044, 'Luther Pass', 'LutherPass', 5),
(3045, 'Lynwood', 'Lynwood', 5),
(3046, 'Lyonsville', 'Lyonsville', 5),
(3047, 'Macdoel', 'Macdoel', 5),
(3048, 'Madeline', 'Madeline', 5),
(3049, 'Madera', 'Madera', 5),
(3050, 'Madison', 'Madison', 5),
(3058, 'Manton', 'Manton', 5),
(3059, 'Manzanita Lake', 'ManzanitaLake', 5),
(3060, 'Maple Creek', 'MapleCreek', 5),
(3061, 'March Afb', 'MarchAfb', 5),
(3062, 'Marina', 'Marina', 5),
(3063, 'Marina Del Rey', 'MarinaDelRey', 5),
(3064, 'Mariposa', 'Mariposa', 5),
(3065, 'Markleeville', 'Markleeville', 5),
(3066, 'Martinez', 'Martinez', 5),
(3067, 'Marysville', 'Marysville', 5),
(3068, 'Mather Afb', 'MatherAfb', 5),
(3069, 'Maxwell', 'Maxwell', 5),
(40033, 'Yoder', 'Yoder', 51),
(40034, 'Acme', 'Acme', 52),
(40395, 'Sointula', 'Sointula', 53),
(40396, 'Sooke', 'Sooke', 53),
(40397, 'Sorrento', 'Sorrento', 53),
(40398, 'Squamish', 'Squamish', 53),
(40399, 'Stephen', 'Stephen', 53),
(40400, 'Stewart', 'Stewart', 53),
(40401, 'Sturdies Bay', 'SturdiesBay', 53),
(40402, 'Summerland', 'Summerland', 53),
(40403, 'Surrey', 'Surrey', 53),
(40404, 'Tahsis', 'Tahsis', 53),
(40405, 'Tappen', 'Tappen', 53),
(40406, 'Taylor', 'Taylor', 53),
(40407, 'Telegraph Creek', 'TelegraphCreek', 53),
(40408, 'Terrace', 'Terrace', 53),
(40409, 'Tlell', 'Tlell', 53),
(40410, 'Tofino', 'Tofino', 53),
(40411, 'Trail', 'Trail', 53),
(40412, 'Tsawwassen', 'Tsawwassen', 53),
(40413, 'Ucluelet', 'Ucluelet', 53),
(40414, 'Union Bay', 'UnionBay', 53),
(40415, 'Valemount', 'Valemount', 53),
(40416, 'Vancouver', 'Vancouver', 53),
(40417, 'Vanderhoof', 'Vanderhoof', 53),
(40418, 'Vernon', 'Vernon', 53),
(40419, 'Victoria', 'Victoria', 53),
(45800, '*Vienna', 'Vienna', NULL),
(45801, 'Linz-Wels-Steyr', 'Linz-Wels-Steyr', NULL),
(45802, 'Graz', 'Graz', NULL),
(45803, 'Linz', 'Linz', NULL),
(45804, 'Salzburg', 'Salzburg', NULL),
(45805, 'Innsbruck', 'Innsbruck', NULL),
(45806, 'Klagenfurt am Wörthersee', 'KlagenfurtamWorthersee', NULL),
(45807, 'Villach', 'Villach', NULL),
(45808, 'Wels', 'Wels', NULL),
(45809, 'Sankt Pölten', 'SanktPolten', NULL),
(45810, 'Dornbirn', 'Dornbirn', NULL),
(45811, 'Steyr', 'Steyr', NULL),
(45812, 'Wiener Neustadt', 'WienerNeustadt', NULL),
(45813, 'Feldkirch', 'Feldkirch', NULL),
(45814, 'Bregenz', 'Bregenz', NULL),
(45815, 'Wolfsberg', 'Wolfsberg', NULL),
(45816, 'Baden', 'Baden', NULL),
(45817, 'Klosterneuburg', 'Klosterneuburg', NULL),
(45818, 'Leoben', 'Leoben', NULL),
(45819, 'Weinzierl bei Krems', 'WeinzierlbeiKrems', NULL),
(45820, 'Traun', 'Traun', NULL),
(45821, 'Krems an der Donau', 'KremsanderDonau', NULL),
(45822, 'Amstetten', 'Amstetten', NULL),
(45823, 'Leonding', 'Leonding', NULL),
(45824, 'Kapfenberg', 'Kapfenberg', NULL),
(45825, 'Mödling', 'Modling', NULL),
(45826, 'Lustenau', 'Lustenau', NULL),
(45827, 'Hallein', 'Hallein', NULL),
(45828, 'Braunau am Inn', 'BraunauamInn', NULL),
(45829, 'Spittal an der Drau', 'SpittalanderDrau', NULL),
(45830, 'Traiskirchen', 'Traiskirchen', NULL),
(45831, 'Saalfelden am Steinernen Meer', 'SaalfeldenamSteinernenMeer', NULL),
(45832, 'Kufstein', 'Kufstein', NULL),
(45833, 'Schwechat', 'Schwechat', NULL),
(45834, 'Ternitz', 'Ternitz', NULL),
(45835, 'Ansfelden', 'Ansfelden', NULL),
(45836, 'Stockerau', 'Stockerau', NULL),
(45837, 'Feldkirchen in Kärnten', 'FeldkircheninKarnten', NULL),
(45838, 'Bad Ischl', 'BadIschl', NULL),
(45839, 'Tulln', 'Tulln', NULL),
(53380, '*Warsaw', 'Warsaw', NULL),
(53381, 'Łódź', 'Lodz', NULL),
(53382, 'Kraków', 'Krakow', NULL),
(53383, 'Wrocław', 'Wroclaw', NULL),
(53384, 'Poznań', 'Poznan', NULL),
(53385, 'Gdańsk', 'Gdansk', NULL),
(53386, 'Szczecin', 'Szczecin', NULL),
(53387, 'Bydgoszcz', 'Bydgoszcz', NULL),
(53388, 'Lublin', 'Lublin', NULL),
(53389, 'Katowice', 'Katowice', NULL),
(53390, 'Białystok', 'Bialystok', NULL),
(53391, 'Gdynia', 'Gdynia', NULL),
(53392, 'Częstochowa', 'Czestochowa', NULL),
(53393, 'Sosnowiec', 'Sosnowiec', NULL),
(53394, 'Radom', 'Radom', NULL),
(53395, 'Toruń', 'Torun', NULL),
(53396, 'Kielce', 'Kielce', NULL),
(53397, 'Gliwice', 'Gliwice', NULL),
(53398, 'Zabrze', 'Zabrze', NULL),
(53399, 'Bytom', 'Bytom', NULL),
(53400, 'Bielsko-Biała', 'Bielsko-Biala', NULL),
(53401, 'Olsztyn', 'Olsztyn', NULL),
(53402, 'Rzeszów', 'Rzeszow', NULL),
(53403, 'Ruda Śląska', 'RudaSlaska', NULL),
(53404, 'Rybnik', 'Rybnik', NULL),
(53405, 'Dąbrowa Górnicza', 'DabrowaGornicza', NULL),
(53406, 'Tychy', 'Tychy', NULL),
(53407, 'Opole', 'Opole', NULL),
(53408, 'Elblag', 'Elblag', NULL),
(60158, 'Laughton', 'Laughton', 65),
(60159, 'Leamington', 'Leamington', 65),
(60160, 'Leeds', 'Leeds', 65),
(60161, 'Leek', 'Leek', 65),
(60162, 'Leicester', 'Leicester', 65),
(60163, 'Leigh', 'Leigh', 65),
(60164, 'Letchworth', 'Letchworth', 65),
(60165, 'Lewes', 'Lewes', 65),
(60166, 'Leyland', 'Leyland', 65),
(60167, 'Lichfield', 'Lichfield', 65),
(60168, 'Lincoln', 'Lincoln', 65),
(60169, 'Little Chalfont', 'LittleChalfont', 65),
(60170, 'Liverpool', 'Liverpool', 65),
(60171, 'London', 'London', 65),
(60172, 'Loughborough', 'Loughborough', 65),
(60173, 'Louth', 'Louth', 65),
(60174, 'Lowestoft', 'Lowestoft', 65),
(60175, 'Luton', 'Luton', 65),
(60292, 'Kabul', 'Kabul', NULL),
(60293, 'Kandahār', 'Kandahar', NULL),
(60294, 'Mazār-e Sharīf', 'Mazar-eSharif', NULL),
(60295, 'Herāt', 'Herat', NULL),
(60296, 'Jalālābād', 'Jalalabad', NULL),
(60297, 'Kunduz', 'Kunduz', NULL),
(60298, 'Ghazni', 'Ghazni', NULL),
(60299, 'Balkh', 'Balkh', NULL),
(60300, 'Baghlān', 'Baghlan', NULL),
(60301, 'Gardēz', 'Gardez', NULL),
(64999, '*Tokyo', 'Tokyo', NULL),
(65000, 'Yokohama-shi', 'Yokohama-shi', NULL),
(65001, 'Ōsaka-shi', 'Osaka-shi', NULL),
(65002, 'Nagoya-shi', 'Nagoya-shi', NULL),
(65003, 'Sapporo-shi', 'Sapporo-shi', NULL),
(65004, 'Kōbe-shi', 'Kobe-shi', NULL),
(65005, 'Kyoto', 'Kyoto', NULL),
(65006, 'Fukuoka-shi', 'Fukuoka-shi', NULL),
(65007, 'Kawasaki', 'Kawasaki', NULL),
(65008, 'Saitama', 'Saitama', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `continentID` smallint(11) NOT NULL DEFAULT '0',
  `continentName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`continentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`continentID`, `continentName`) VALUES
(1, 'North America'),
(2, 'South America'),
(3, 'Europe'),
(4, 'Asia'),
(5, 'Africa'),
(6, 'Australia & Oceania');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `countryID` smallint(9) NOT NULL DEFAULT '0',
  `countryName` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortCountry` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `continentID` smallint(11) DEFAULT NULL,
  `countryCode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dialCode` smallint(8) DEFAULT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryID`, `countryName`, `shortCountry`, `continentID`, `countryCode`, `dialCode`) VALUES
(1, 'United States', 'US', 1, 'us', 1),
(2, 'Canada', 'Canada', 1, 'ca', 1),
(3, 'Bahamas', 'Bahamas', 1, NULL, 242),
(4, 'Barbados', 'Barbados', 1, NULL, 246),
(5, 'Belize', 'Belize', 1, 'bz', 501),
(6, 'Bermuda', 'Bermuda', 1, NULL, 441),
(7, 'British Virgin Islands', 'BVI', 1, NULL, 284),
(8, 'Cayman Islands', 'CaymanIsl', 1, NULL, 345),
(9, 'Costa Rica', 'CostaRica', 1, 'cr', 506),
(10, 'Cuba', 'Cuba', 1, 'cu', 53),
(11, 'Dominica', 'Dominica', 1, NULL, 767),
(12, 'Dominican Republic', 'DominicanRep', 1, NULL, 809),
(13, 'El Salvador', 'ElSalvador', 1, 'sv', 503),
(14, 'Greenland', 'Greenland', 1, 'gl', 299),
(15, 'Grenada', 'Grenada', 1, NULL, 473),
(16, 'Guadeloupe', 'Guadeloupe', 1, NULL, 590),
(17, 'Guatemala', 'Guatemala', 1, 'gt', 502),
(18, 'Haiti', 'Haiti', 1, 'ht', 509),
(19, 'Honduras', 'Honduras', 1, 'hn', 503),
(20, 'Jamaica', 'Jamaica', 1, NULL, 876),
(21, 'Martinique', 'Martinique', 1, NULL, 596),
(22, 'Mexico', 'Mexico', 1, 'mx', 52),
(23, 'Montserrat', 'Montserrat', 1, NULL, 664),
(24, 'Nicaragua', 'Nicaragua', 1, 'ni', 505),
(25, 'Panama', 'Panama', 1, 'pa', 507),
(26, 'Puerto Rico', 'PuertoRico', 1, 'pr', 787),
(27, 'Trinidad and Tobago', 'Trinidad-Tobago', 1, NULL, 868),
(28, 'United States Virgin Islands', 'USVI', 1, NULL, 340),
(29, 'Argentina', 'Argentina', 2, 'ar', 54),
(30, 'Bolivia', 'Bolivia', 2, NULL, 591),
(31, 'Brazil', 'Brazil', 2, 'br', 55),
(32, 'Chile', 'Chile', 2, 'cl', 56),
(33, 'Colombia', 'Colombia', 2, 'co', 57),
(34, 'Ecuador', 'Ecuador', 2, 'ec', 593),
(35, 'Falkland Islands', 'FalklandIsl', 2, NULL, 500),
(36, 'French Guiana', 'FrenchGuiana', 2, NULL, 594),
(37, 'Guyana', 'Guyana', 2, 'gy', 592),
(38, 'Paraguay', 'Paraguay', 2, 'py', 595),
(39, 'Peru', 'Peru', 2, 'pe', 51),
(40, 'Suriname', 'Suriname', 2, 'sr', 597),
(41, 'Uruguay', 'Uruguay', 2, 'uy', 598),
(42, 'Venezuela', 'Venezuela', 2, NULL, 58),
(43, 'Albania', 'Albania', 3, 'al', 355),
(44, 'Andorra', 'Andorra', 3, 'ad', 376),
(45, 'Armenia', 'Armenia', 3, 'am', 374),
(46, 'Austria', 'Austria', 3, 'at', 43),
(47, 'Azerbaijan', 'Azerbaijan', 3, 'az', 994),
(48, 'Belarus', 'Belarus', 3, 'by', 375),
(49, 'Belgium', 'Belgium', 3, 'be', 32),
(50, 'Bosnia and Herzegovina', 'Bosnia-Herzegovina', 3, 'ba', 387),
(51, 'Bulgaria', 'Bulgaria', 3, 'bg', 359),
(52, 'Croatia', 'Croatia', 3, 'hr', 385),
(53, 'Cyprus', 'Cyprus', 3, 'cy', 357),
(54, 'Czech Republic', 'CzechRep', 3, 'cz', 420),
(55, 'Denmark', 'Denmark', 3, 'dk', 45),
(56, 'Estonia', 'Estonia', 3, 'ee', 372),
(57, 'Finland', 'Finland', 3, 'fi', 358),
(58, 'France', 'France', 3, 'fr', 33),
(59, 'Georgia', 'Georgia', 3, 'ge', 995),
(60, 'Germany', 'Germany', 3, 'de', 49),
(61, 'Gibraltar', 'Gibraltar', 3, 'gi', 350),
(62, 'Greece', 'Greece', 3, 'gr', 30),
(63, 'Guernsey', 'Guernsey', 3, NULL, 44),
(64, 'Hungary', 'Hungary', 3, 'hu', 36),
(65, 'Iceland', 'Iceland', 3, NULL, 354),
(66, 'Ireland', 'Ireland', 3, 'ie', 353),
(67, 'Isle of Man', 'IsleofMan', 3, 'im', 44),
(68, 'Italy', 'Italy', 3, 'it', 39),
(69, 'Jersey', 'Jersey', 3, NULL, 44),
(70, 'Kosovo', 'Kosovo', 3, NULL, 381),
(71, 'Latvia', 'Latvia', 3, 'lv', 371),
(72, 'Liechtenstein', 'Liechtenstein', 3, 'li', 423),
(73, 'Lithuania', 'Lithuania', 3, 'lt', 370),
(74, 'Luxembourg', 'Luxembourg', 3, 'lu', 352),
(75, 'Macedonia', 'Macedonia', 3, NULL, 389),
(76, 'Malta', 'Malta', 3, 'mt', 356),
(77, 'Moldova', 'Moldova', 3, NULL, 373),
(78, 'Monaco', 'Monaco', 3, 'mc', 377),
(79, 'Montenegro', 'Montenegro', 3, 'me', 381),
(80, 'Netherlands', 'Netherlands', 3, 'nl', 31),
(81, 'Norway', 'Norway', 3, 'no', 47),
(82, 'Poland', 'Poland', 3, 'pl', 48),
(83, 'Portugal', 'Portugal', 3, 'pt', 351),
(84, 'Romania', 'Romania', 3, 'ro', 40),
(85, 'Russia', 'Russia', 3, NULL, 7),
(86, 'San Marino', 'SanMarino', 3, 'sm', 378),
(87, 'Serbia', 'Serbia', 3, 'rs', 381),
(88, 'Slovakia', 'Slovakia', 3, 'sk', 421),
(89, 'Slovenia', 'Slovenia', 3, 'si', 386),
(90, 'Spain', 'Spain', 3, 'es', 34),
(91, 'Sweden', 'Sweden', 3, 'se', 46),
(92, 'Switzerland', 'Switzerland', 3, 'ch', 41),
(93, 'Turkey', 'Turkey', 3, 'tr', 90),
(94, 'Ukraine', 'Ukraine', 3, 'ua', 380),
(95, 'United Kingdom', 'UK', 3, 'gb', 44),
(96, 'Vatican City', 'Vatican', 3, NULL, 39),
(97, 'Afghanistan', 'Afghanistan', 4, 'af', 93),
(98, 'Bahrain', 'Bahrain', 4, 'bh', 973),
(99, 'Bangladesh', 'Bangladesh', 4, 'bd', 880),
(100, 'Bhutan', 'Bhutan', 4, 'bt', 975),
(101, 'Brunei', 'Brunei', 4, NULL, 673),
(102, 'Cambodia', 'Cambodia', 4, 'kh', 855),
(103, 'China', 'China', 4, 'cn', 86),
(104, 'East Timor', 'EastTimor', 4, NULL, 670),
(105, 'Hong Kong', 'HongKong', 4, 'hk', 852),
(106, 'India', 'India', 4, 'in', 91),
(107, 'Indonesia', 'Indonesia', 4, 'id', 62),
(108, 'Iran', 'Iran', 4, NULL, 98),
(109, 'Iraq', 'Iraq', 4, 'iq', 964),
(110, 'Israel', 'Israel', 4, 'il', 972),
(111, 'Japan', 'Japan', 4, 'jp', 81),
(112, 'Jordan', 'Jordan', 4, 'jo', 962),
(113, 'Kazakhstan', 'Kazakhstan', 4, 'kz', 7),
(114, 'Kuwait', 'Kuwait', 4, 'kw', 965),
(115, 'Kyrgyzstan', 'Kyrgyzstan', 4, 'kg', 996),
(116, 'Laos', 'Laos', 4, NULL, 856),
(117, 'Lebanon', 'Lebanon', 4, 'lb', 961),
(118, 'Macau', 'Macau', 4, NULL, 853),
(119, 'Malaysia', 'Malaysia', 4, 'my', 60),
(120, 'Maldives', 'Maldives', 4, 'mv', 960),
(121, 'Mongolia', 'Mongolia', 4, 'mn', 976),
(122, 'Myanmar (Burma)', 'Myanmar(Burma)', 4, NULL, 95),
(123, 'Nepal', 'Nepal', 4, 'np', 977),
(124, 'North Korea', 'NorthKorea', 4, NULL, 850),
(125, 'Oman', 'Oman', 4, 'om', 968),
(126, 'Pakistan', 'Pakistan', 4, 'pk', 92),
(127, 'Philippines', 'Philippines', 4, 'ph', 63),
(128, 'Qatar', 'Qatar', 4, 'qa', 974),
(129, 'Saudi Arabia', 'SaudiArabia', 4, 'sa', 966),
(130, 'Singapore', 'Singapore', 4, 'sg', 65),
(131, 'South Korea', 'SouthKorea', 4, NULL, 82),
(132, 'Sri Lanka', 'SriLanka', 4, 'lk', 94),
(133, 'Syria', 'Syria', 4, NULL, 963),
(134, 'Taiwan', 'Taiwan', 4, NULL, 886),
(135, 'Tajikistan', 'Tajikistan', 4, 'tj', 992),
(136, 'Thailand', 'Thailand', 4, 'th', 66),
(137, 'Turkmenistan', 'Turkmenistan', 4, 'tm', 993),
(138, 'United Arab Emirates', 'UAE', 4, 'ae', 971),
(139, 'Uzbekistan', 'Uzbekistan', 4, 'uz', 998),
(140, 'Vietnam', 'Vietnam', 4, NULL, 84),
(141, 'Yemen', 'Yemen', 4, 'ye', 967),
(142, 'Algeria', 'Algeria', 5, 'dz', 213),
(143, 'Angola', 'Angola', 5, 'ao', 244),
(144, 'Benin', 'Benin', 5, 'bj', 229),
(145, 'Botswana', 'Botswana', 5, 'bw', 267),
(146, 'Burkina Faso', 'BurkinaFaso', 5, 'bf', 226),
(147, 'Burundi', 'Burundi', 5, 'bi', 257),
(148, 'Cameroon', 'Cameroon', 5, 'cm', 237),
(149, 'Cape Verde', 'CapeVerde', 5, 'cv', 238),
(150, 'Central African Republic', 'CentralAfricanRep', 5, 'cf', 236),
(151, 'Chad', 'Chad', 5, 'td', 235),
(152, 'Congo-Brazzaville', 'Congo-Brazzaville', 5, NULL, 242),
(153, 'Congo-Kinshasa', 'Congo-Kinshasa', 5, NULL, 242),
(154, 'Djibouti', 'Djibouti', 5, 'dj', 253),
(155, 'Egypt', 'Egypt', 5, 'eg', 20),
(156, 'Equatorial Guinea', 'EquatorialGuinea', 5, 'gq', 240),
(157, 'Eritrea', 'Eritrea', 5, 'er', 291),
(158, 'Ethiopia', 'Ethiopia', 5, 'et', 251),
(159, 'Gabon', 'Gabon', 5, 'ga', 241),
(160, 'Gambia', 'Gambia', 5, 'gm', 220),
(161, 'Ghana', 'Ghana', 5, 'gh', 233),
(162, 'Guinea', 'Guinea', 5, 'gn', 224),
(163, 'Guinea-Bissau', 'Guinea-Bissau', 5, 'gw', 245),
(164, 'Ivory Coast', 'IvoryCoast', 5, NULL, 225),
(165, 'Kenya', 'Kenya', 5, 'ke', 254),
(166, 'Lesotho', 'Lesotho', 5, 'ls', 266),
(167, 'Liberia', 'Liberia', 5, 'lr', 231),
(168, 'Libya', 'Libya', 5, 'ly', 218),
(169, 'Madagascar', 'Madagascar', 5, 'mg', 261),
(170, 'Malawi', 'Malawi', 5, 'mw', 265),
(171, 'Mali', 'Mali', 5, 'ml', 223),
(172, 'Mauritania', 'Mauritania', 5, 'mr', 222),
(173, 'Mauritius', 'Mauritius', 5, 'mu', 230),
(174, 'Morocco', 'Morocco', 5, 'ma', 212),
(175, 'Mozambique', 'Mozambique', 5, 'mz', 258),
(176, 'Namibia', 'Namibia', 5, 'na', 264),
(177, 'Niger', 'Niger', 5, 'ne', 227),
(178, 'Nigeria', 'Nigeria', 5, 'ng', 234),
(179, 'Reunion', 'Reunion', 5, NULL, 262),
(180, 'Rwanda', 'Rwanda', 5, 'rw', 250),
(181, 'Sao Tome and Principe', 'SaoTome-Principe', 5, 'st', 239),
(182, 'Senegal', 'Senegal', 5, 'sn', 221),
(183, 'Seychelles', 'Seychelles', 5, 'sc', 248),
(184, 'Sierra Leone', 'SierraLeone', 5, 'sl', 232),
(185, 'Somalia', 'Somalia', 5, 'so', 252),
(186, 'South Africa', 'SouthAfrica', 5, 'za', 27),
(187, 'Sudan', 'Sudan', 5, 'sd', 249),
(188, 'Swaziland', 'Swaziland', 5, 'sz', 268),
(189, 'Tanzania', 'Tanzania', 5, NULL, 255),
(190, 'Togo', 'Togo', 5, 'tg', 228),
(191, 'Tunisia', 'Tunisia', 5, 'tn', 216),
(192, 'Uganda', 'Uganda', 5, 'ug', 256),
(193, 'Western Sahara', 'WesternSahara', 5, NULL, 212),
(194, 'Zambia', 'Zambia', 5, 'zm', 260),
(195, 'Zimbabwe', 'Zimbabwe', 5, 'zw', 263),
(196, 'Australia', 'Australia', 6, 'au', 61),
(197, 'New Zealand', 'NewZealand', 6, 'nz', 64),
(198, 'Fiji', 'Fiji', 6, 'fj', 679),
(199, 'French Polynesia', 'FrenchPolynesia', 6, 'pf', 689),
(200, 'Guam', 'Guam', 6, NULL, 671),
(201, 'Kiribati', 'Kiribati', 6, 'ki', 686),
(202, 'Marshall Islands', 'MarshallIsl', 6, 'mh', 692),
(203, 'Micronesia', 'Micronesia', 6, NULL, 691),
(204, 'Nauru', 'Nauru', 6, 'nr', 674),
(205, 'New Caledonia', 'NewCaledonia', 6, 'nc', 687),
(206, 'Papua New Guinea', 'PapuaNewGuinea', 6, 'pg', 675),
(207, 'Samoa', 'Samoa', 6, 'ws', 684),
(208, 'Solomon Islands', 'SolomonIsl', 6, 'sb', 677),
(209, 'Tonga', 'Tonga', 6, 'to', 676),
(210, 'Tuvalu', 'Tuvalu', 6, 'tv', 688),
(211, 'Vanuatu', 'Vanuatu', 6, 'vu', 678),
(212, 'Wallis and Futuna', 'Wallis-Futuna', 6, 'wf', 681);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_customer_id` int(11) NOT NULL,
  `o_product_id` int(11) NOT NULL,
  `o_supplier_id` int(11) NOT NULL,
  `o_payment_id` int(11) NOT NULL,
  `o_shipper_id` int(11) DEFAULT NULL,
  `o_order_placed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `o_order_shipped` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `o_order_completed` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `o_status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=placed, 1=shipped, 2=completed, 3=canceled',
  `o_price` decimal(11,2) NOT NULL,
  `o_qty` int(11) NOT NULL,
  `o_discount` decimal(5,2) DEFAULT NULL,
  `o_total` int(11) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `os_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `py_id` int(11) NOT NULL AUTO_INCREMENT,
  `py_type` varchar(100) NOT NULL,
  PRIMARY KEY (`py_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_subcategory_id` int(11) NOT NULL COMMENT 'subcategory id',
  `p_supplier_id` int(11) NOT NULL,
  `p_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_description` text CHARACTER SET latin1 NOT NULL,
  `p_sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_manufacturer_id` int(11) NOT NULL,
  `p_manufacturere_part_number` varchar(45) CHARACTER SET latin1 NOT NULL,
  `p_used` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `p_price` decimal(11,2) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_discount` decimal(5,2) DEFAULT NULL,
  `p_country` int(11) NOT NULL,
  `p_state` int(11) NOT NULL,
  `p_city` int(11) NOT NULL,
  `p_date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_deleted` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '0=not deleted, 1=deleted',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_data`
--

DROP TABLE IF EXISTS `product_attributes_data`;
CREATE TABLE IF NOT EXISTS `product_attributes_data` (
  `pad_id` int(11) NOT NULL,
  `pad_product_id` int(11) NOT NULL,
  `pad_attribute_id` int(11) NOT NULL,
  `pad_unit_id` int(11) DEFAULT NULL,
  `pad_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `regionID` smallint(8) NOT NULL DEFAULT '0',
  `regionName` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortRegion` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryID` smallint(9) DEFAULT NULL,
  PRIMARY KEY (`regionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`regionID`, `regionName`, `shortRegion`, `countryID`) VALUES
(1, 'Alabama', 'AL', 1),
(2, 'Alaska', 'AK', 1),
(3, 'Arizona', 'AZ', 1),
(4, 'Arkansas', 'AR', 1),
(5, 'California', 'CA', 1),
(6, 'Colorado', 'CO', 1),
(7, 'Connecticut', 'CT', 1),
(8, 'Delaware', 'DE', 1),
(9, 'District of Columbia', 'DC', 1),
(10, 'Florida', 'FL', 1),
(11, 'Georgia', 'GA', 1),
(12, 'Hawaii', 'HI', 1),
(13, 'Idaho', 'ID', 1),
(14, 'Illinois', 'IL', 1),
(15, 'Indiana', 'IN', 1),
(16, 'Iowa', 'IA', 1),
(17, 'Kansas', 'KS', 1),
(18, 'Kentucky', 'KY', 1),
(19, 'Louisiana', 'LA', 1),
(20, 'Maine', 'ME', 1),
(21, 'Maryland', 'MD', 1),
(22, 'Massachusetts', 'MA', 1),
(23, 'Michigan', 'MI', 1),
(24, 'Minnesota', 'MN', 1),
(25, 'Mississippi', 'MS', 1),
(26, 'Missouri', 'MO', 1),
(27, 'Montana', 'MT', 1),
(28, 'Nebraska', 'NE', 1),
(29, 'Nevada', 'NV', 1),
(30, 'New Hampshire', 'NH', 1),
(31, 'New Jersey', 'NJ', 1),
(32, 'New Mexico', 'NM', 1),
(33, 'New York', 'NY', 1),
(34, 'North Carolina', 'NC', 1),
(35, 'North Dakota', 'ND', 1),
(36, 'Ohio', 'OH', 1),
(37, 'Oklahoma', 'OK', 1),
(38, 'Oregon', 'OR', 1),
(39, 'Pennsylvania', 'PA', 1),
(40, 'Rhode Island', 'RI', 1),
(41, 'South Carolina', 'SC', 1),
(42, 'South Dakota', 'SD', 1),
(43, 'Tennessee', 'TN', 1),
(44, 'Texas', 'TX', 1),
(45, 'Utah', 'UT', 1),
(46, 'Vermont', 'VT', 1),
(47, 'Virginia', 'VA', 1),
(48, 'Washington', 'WA', 1),
(49, 'West Virginia', 'WV', 1),
(50, 'Wisconsin', 'WI', 1),
(51, 'Wyoming', 'WY', 1),
(52, 'Alberta', 'AB', 2),
(53, 'British Columbia', 'BC', 2),
(54, 'Manitoba', 'MB', 2),
(55, 'New Brunswick', 'NB', 2),
(56, 'Newfoundland and Labrador', 'NL', 2),
(57, 'Northwest Territories', 'NT', 2),
(58, 'Nova Scotia', 'NS', 2),
(59, 'Nunavut', 'NU', 2),
(60, 'Ontario', 'ON', 2),
(61, 'Prince Edward Island', 'PE', 2),
(62, 'Quebec', 'QC', 2),
(63, 'Saskatchewan', 'SK', 2),
(64, 'Yukon', 'YT', 2),
(65, 'England', 'England', 95),
(66, 'Northern Ireland', 'NorthernIreland', 95),
(67, 'Scotland', 'Scottland', 95),
(68, 'Wales', 'Wales', 95);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sc_description` text CHARACTER SET latin1 NOT NULL,
  `sc_category_id` int(11) NOT NULL,
  `sc_date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sc_date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sc_id`, `sc_name`, `sc_description`, `sc_category_id`, `sc_date_created`, `sc_date_updated`) VALUES
(1, 'External Hard Drives', 'All external hard disk storage devices are listed here', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_pass` varchar(512) CHARACTER SET latin1 NOT NULL,
  `u_salt` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `u_role` enum('admin','buyer','supplier') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'buyer' COMMENT 'admin, buyer, supplier',
  `u_type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=individual, 1=organization',
  `u_fname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_lname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_organization_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_gender` enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `u_pphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_sphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `u_verified_phone` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `u_phone_verified_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `u_verified_email` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `u_email_verified_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `u_phone_verification_code` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_email_verification_code` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_forgot_password_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `u_forgot_password_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_address_main` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_main_landmark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_main_country` int(11) NOT NULL,
  `u_main_state` int(11) NOT NULL,
  `u_main_city` int(11) NOT NULL,
  `u_main_pin` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_address_billing` text CHARACTER SET utf8 COLLATE utf8_bin,
  `u_billing_landmark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_billing_country` int(11) DEFAULT NULL,
  `u_billing_state` int(11) DEFAULT NULL,
  `u_billing_city` int(11) DEFAULT NULL,
  `u_billing_pin` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_address_shipping` text CHARACTER SET utf8 COLLATE utf8_bin,
  `u_shipping_landmark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `u_shipping_country` int(11) DEFAULT NULL,
  `u_shipping_state` int(11) DEFAULT NULL,
  `u_shipping_city` int(11) DEFAULT NULL,
  `u_shipping_pin` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `u_date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `u_deleted` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '0=not deleted, 1=not deleted',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pass`, `u_salt`, `u_role`, `u_type`, `u_fname`, `u_lname`, `u_organization_name`, `u_gender`, `u_pphone`, `u_sphone`, `u_verified_phone`, `u_phone_verified_date`, `u_verified_email`, `u_email_verified_date`, `u_phone_verification_code`, `u_email_verification_code`, `u_forgot_password_date`, `u_forgot_password_key`, `u_address_main`, `u_main_landmark`, `u_main_country`, `u_main_state`, `u_main_city`, `u_main_pin`, `u_address_billing`, `u_billing_landmark`, `u_billing_country`, `u_billing_state`, `u_billing_city`, `u_billing_pin`, `u_address_shipping`, `u_shipping_landmark`, `u_shipping_country`, `u_shipping_state`, `u_shipping_city`, `u_shipping_pin`, `u_date_created`, `u_date_updated`, `u_deleted`) VALUES
(1, 'admin@ecomm.com', '2ccb6d8b81dc20c831007daee5b5b48e', '98f13708210194c475687be6106a3b84', 'admin', '0', 'Site', 'Admin', '', NULL, '', NULL, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00', NULL, '', NULL, 0, 0, 0, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, NULL, '2014-09-28 15:22:27', '0000-00-00 00:00:00', '0'),
(2, 'ram@ecomm.com', '54503b0457235444dcc8b85165ee042e', '6f4922f45568161a8cdf4ad2299f6d23', 'supplier', '0', 'admin', 'admin', '', '1', '9100000000', NULL, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00', '', 'sadasd', 'asdas', 2, 52, 40034, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-10-14 18:41:43', '2014-12-04 18:38:16', '0'),
(3, 'test@ecommsite.com', 'ffaae32a2027222f8ce8a05e0557703e', 'c74d97b01eae257e44aa9d5bade97baf', 'buyer', '0', 'Site', 'Buyer', '', '1', '+19900990099', NULL, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', NULL, NULL, '2014-11-27 18:05:26', 'KDerjxqi4P8s7XAz', 'primary address', '', 1, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-25 16:30:09', '0000-00-00 00:00:00', '0'),
(4, 'seller@ecommsite.com', 'cf04b33487cf6e5afc2a75e94517bc5f', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'supplier', '1', '', '', 'Free Seller Inc.', NULL, '+122293345', NULL, '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00', NULL, 'vancouver canada', '', 2, 53, 40416, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-27 03:58:07', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_methods`
--

DROP TABLE IF EXISTS `user_payment_methods`;
CREATE TABLE IF NOT EXISTS `user_payment_methods` (
  `upm_id` int(11) NOT NULL AUTO_INCREMENT,
  `upm_payment_id` int(11) NOT NULL,
  `upm_supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`upm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

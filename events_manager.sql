-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 08:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `img_id` int(10) NOT NULL,
  `gallery_id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`img_id`, `gallery_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, '13971.jpg', '2020-05-04 19:39:40', '2020-05-04 17:39:40'),
(3, 1, '66822.jpg', '2020-05-04 19:39:40', '2020-05-04 17:39:40'),
(4, 1, '78238.jpg', '2020-05-04 19:39:41', '2020-05-04 17:39:41'),
(5, 1, '93626.jpg', '2020-05-04 19:39:41', '2020-05-04 17:39:41'),
(6, 1, '27908.jpg', '2020-05-04 19:39:41', '2020-05-04 17:39:41'),
(7, 1, '42420.jpg', '2020-05-04 20:09:54', '2020-05-04 18:09:54'),
(8, 1, '47886.jpg', '2020-05-04 21:25:52', '2020-05-04 19:25:52'),
(9, 1, '98856.jpg', '2020-05-04 21:25:52', '2020-05-04 19:25:52'),
(10, 1, '42210.jpg', '2020-05-04 21:25:52', '2020-05-04 19:25:52'),
(11, 1, '53996.jpg', '2020-05-04 21:25:52', '2020-05-04 19:25:52'),
(13, 1, '30229.jpg', '2020-05-04 21:28:51', '2020-05-04 19:28:51'),
(14, 1, '86438.jpg', '2020-05-04 21:28:51', '2020-05-04 19:28:51'),
(15, 1, '22249.jpg', '2020-05-04 21:28:51', '2020-05-04 19:28:51'),
(16, 1, '17689.jpg', '2020-05-04 21:28:52', '2020-05-04 19:28:52'),
(17, 1, '72380.jpg', '2020-05-04 21:28:52', '2020-05-04 19:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(4, '50162.png', 'Slayer Banner', 'events/concerts', 1, '2020-05-20 18:12:38', '2020-05-20 18:44:49'),
(5, '14236.png', 'The Gentlemen Banner', 'events/cinemas', 1, '2020-05-20 18:13:04', '2020-05-20 18:44:58'),
(6, '55406.png', 'Rammstein Banner', 'events/concerts', 1, '2020-05-20 18:13:35', '2020-05-20 18:45:08'),
(7, '25412.png', 'The Gentlemen Banner 2', 'events/cinemas', 1, '2020-05-20 18:14:10', '2020-05-20 18:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Concerts', 'Rock Concerts\r\nHardcore, Punk, Metal', 'concerts', 1, NULL, '2020-04-23 18:28:02', '2020-04-23 18:28:02'),
(5, 'Cinemas', 'Movies', 'cinemas', 1, NULL, '2020-04-28 12:13:58', '2020-04-28 17:20:27'),
(6, 'Theatres', 'Amateur', 'theatres', 1, NULL, '2020-04-30 18:13:41', '2020-04-30 18:13:41'),
(7, 'Exhibitions', 'Modern and Classic Art', 'exhibitions', 1, NULL, '2020-04-30 18:14:30', '2020-04-30 18:14:30'),
(8, 'Trade Fair', 'Fairs in Serbia', 'fairs', 1, NULL, '2020-04-30 18:15:17', '2020-05-18 23:03:46'),
(9, 'Conferences', 'All kinds', 'conferences', 1, NULL, '2020-04-30 18:15:47', '2020-04-30 18:15:47'),
(10, 'Parties', 'Underground', 'parties', 1, NULL, '2020-04-30 18:16:30', '2020-04-30 18:16:30'),
(11, 'Street Races', 'Underground car races', 'street-races', 0, NULL, '2020-05-13 18:33:53', '2020-05-13 20:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Belgrade', 'Serbia', '2020-04-24 18:22:13', '2020-04-24 18:22:13'),
(2, 'Novi Sad', 'Serbia', '2020-04-24 18:27:03', '2020-04-24 18:27:03'),
(4, 'Kragujevac', 'Serbia', '2020-04-24 18:27:39', '2020-04-24 18:27:39'),
(6, 'Vrnjacka Banja', 'Serbia', '2020-04-27 19:30:00', '2020-04-27 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `first_name`, `last_name`, `address`, `city`, `country`, `postal_code`, `mobile`, `created_at`, `updated_at`) VALUES
(1, '3', 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', 'Serbia', '36000', '065666999', '2020-06-20 20:16:45', '2020-07-26 06:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `ticket_price` double NOT NULL,
  `www_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `buy_tickets` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `event_description`, `place_name`, `place_address`, `start_event`, `end_event`, `ticket_price`, `www_address`, `image`, `latitude`, `longitude`, `id`, `category_id`, `city_id`, `is_active`, `buy_tickets`, `created_at`, `updated_at`) VALUES
(5, 'Hitchcock Movies 1', 'Strangers on a Train (1951)\r\nI Confess (1953)\r\nDial M for Murder (1954)\r\nRear Window (1954)\r\nTo Catch a Thief (1955)\r\nThe Trouble with Harry (1955)\r\nThe Man Who Knew Too Much (1956)\r\nThe Wrong Man (1956)\r\nVertigo (1958)', 'Summer Fest 2.0', 'Atrium', '2020-06-30 19:30:00', '2020-07-02 22:30:00', 40, 'www.summerfest.rs', '37570.jpg', '1', '1', 1, 5, 6, 1, 0, '2020-04-28 12:16:43', '2020-05-13 20:49:59'),
(9, 'Agnostic Front', 'Godfathers of Hardcore', 'Arsenal Fest', 'Stari Aerodrom', '2020-06-25 21:00:00', '2020-06-25 23:00:00', 65, 'www.agnosticfront.com', '44291.jpg', '1', '1', 1, 1, 4, 1, 1, '2020-04-30 18:18:42', '2020-05-13 19:32:02'),
(10, 'Ritam Nereda', 'Serbian Street Punk', 'Love Fest', 'Central Park', '2020-08-06 22:00:00', '2020-08-06 23:30:00', 25, 'www.ritamnereda.com', '83218.jpg', '1', '1', 1, 1, 6, 1, 0, '2020-04-30 18:22:10', '2020-04-30 18:56:29'),
(11, 'Kulisa festival', 'Ovogodišnje izdanje pozorišnog festivala Kulisa, 6. po redu, održaće se pod sloganom UDAHNI SLOBODNO, i predstaviće najnovija teatarska ostvarenja amaterskih i akademskih pozorišta Srbije i regiona. Kao i prethodne godine, odluku o predstavama koje će se naći u takmičarskoj selekciji doneo je selektor festivala Dragan Jakovljević, pozorišni reditelj. Festival će otvoriti tribina Zakulisni razgovori, čiji će učesnici biti članovi oba žirija, a koja će se održati u Kontakt galeriji SKC-a. U takmičarskom delu festivala naći će se šest predstava, dok će, na samom zatvaranju festivala, u čast nagrađenih, Akademsko pozorište SKC-a izvesti predstavu Totovi.', 'SKC', 'Radoja Domanovica 28', '2020-06-12 19:00:00', '2020-06-16 23:00:00', 60, 'www.skckg.com', '14310.jpg', '1', '1', 1, 6, 4, 1, 0, '2020-04-30 18:26:30', '2020-04-30 18:51:31'),
(12, 'The Exploited', 'Fuck The System', 'Arsenal Fest', 'Stari Aerodrom', '2020-06-26 22:00:00', '2020-06-26 23:30:00', 30, 'www.theexploited.com', '90692.jpg', '1', '1', 1, 1, 4, 1, 0, '2020-04-30 18:44:36', '2020-04-30 18:44:36'),
(13, 'Slayer', 'Reign in Blood Tour', 'Exit Fest 2.0', 'Petrovaradin', '2020-07-05 21:30:00', '2020-07-05 23:30:00', 30, 'www.slayer.net', '44353.jpg', '1', '1', 1, 1, 2, 1, 0, '2020-05-06 19:06:03', '2020-05-16 21:12:46'),
(14, 'Love Fest', 'The bigest East Europe Festival', 'Central Park', 'Central Park', '2020-08-06 20:00:00', '2020-08-10 05:00:00', 60, 'www.lovefest.rs', '92412.jpg', '1', '1', 1, 1, 6, 1, 1, '2020-05-13 19:19:46', '2020-05-16 21:12:33'),
(17, 'Sajam Automobila', 'BG Show', 'Beogradski sajam', 'Savska bb', '2020-12-18 12:12:00', '2021-01-06 16:01:00', 55, 'www.beogradskisajam.rs', '13729.jpg', '1', '1', 1, 8, 1, 1, 0, '2020-05-22 07:48:31', '2020-05-22 07:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `events_images`
--

CREATE TABLE `events_images` (
  `image_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_images`
--

INSERT INTO `events_images` (`image_id`, `event_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 10, '63578.jpg', '2020-05-04 16:26:38', '2020-05-04 14:26:38'),
(7, 10, '23578.jpg', '2020-05-04 16:27:00', '2020-05-04 14:27:00'),
(8, 14, '90797.png', '2020-05-18 23:57:21', '2020-05-18 21:57:21'),
(9, 14, '42209.jpg', '2020-05-18 23:57:21', '2020-05-18 21:57:21'),
(10, 14, '87765.jpeg', '2020-05-18 23:58:37', '2020-05-18 21:58:37');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(10) NOT NULL,
  `gallery_name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`gallery_id`, `gallery_name`, `city`, `location`, `date`, `id`, `created_at`, `updated_at`) VALUES
(1, 'Ritam Nereda', 'Vrnjacka Banja', 'Love Fest Balkan', '2020-08-03', 1, '2020-04-28 21:59:40', '2020-05-03 16:41:40'),
(3, 'Slayer', 'Novi Sad', 'Exit Fest 2.0', '2020-07-07', 1, '2020-05-03 12:59:54', '2020-05-03 16:44:26');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2020_04_22_214759_create_cities_table', 4),
(15, '2020_04_22_214517_create_categories_table', 5),
(18, '2020_04_22_222016_create_events_table', 6),
(20, '2020_05_19_130128_create_cart_table', 7),
(21, '2020_05_20_165724_create_banners_table', 8),
(22, '2020_06_19_214439_create_delivery_addresses_table', 9),
(23, '2020_06_21_181012_create_orders_table', 10),
(24, '2020_06_21_182101_create_orders_tickets_table', 11),
(25, '2020_06_28_132010_create_newsletter_subscribers_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'groucho@events.com', 0, '2020-06-28 21:33:21', '2020-06-29 18:03:12'),
(4, 'bookshareonline@gmail.com', 1, '2020-06-29 17:30:59', '2020-06-29 17:30:59'),
(5, 'dylan@events.com', 1, '2020-06-29 18:02:56', '2020-06-29 18:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10',
  `coupon_amount` double(8,2) NOT NULL DEFAULT 11.00,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `first_name`, `last_name`, `address`, `city`, `postal_code`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(6, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 50.00, '2020-06-22 11:11:11', '2020-06-22 09:11:11'),
(7, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 105.00, '2020-06-22 11:16:48', '2020-06-22 09:16:48'),
(8, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 30.00, '2020-06-22 13:49:52', '2020-06-22 11:49:52'),
(9, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 40.00, '2020-06-22 13:50:14', '2020-06-22 11:50:14'),
(10, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 50.00, '2020-06-22 13:50:54', '2020-06-22 11:50:54'),
(11, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 300.00, '2020-06-22 13:51:18', '2020-06-22 11:51:18'),
(12, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 65.00, '2020-06-22 13:51:41', '2020-06-22 11:51:41'),
(13, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 30.00, '2020-06-22 13:52:07', '2020-06-22 11:52:07'),
(14, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 40.00, '2020-06-22 13:52:27', '2020-06-22 11:52:27'),
(15, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 50.00, '2020-06-22 13:52:51', '2020-06-22 11:52:51'),
(16, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 65.00, '2020-06-22 13:53:40', '2020-06-22 11:53:40'),
(17, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 40.00, '2020-06-22 14:46:36', '2020-06-22 12:46:36'),
(18, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 65.00, '2020-06-22 14:49:39', '2020-06-22 12:49:39'),
(19, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 40.00, '2020-06-22 14:52:55', '2020-06-22 12:52:55'),
(20, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 65.00, '2020-06-22 17:06:25', '2020-06-22 15:06:25'),
(21, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 130.00, '2020-06-22 17:12:49', '2020-06-22 15:12:49'),
(22, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 340.00, '2020-06-22 17:14:47', '2020-06-22 15:14:47'),
(23, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 80.00, '2020-06-25 00:05:56', '2020-06-24 22:05:56'),
(24, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 80.00, '2020-06-26 14:14:04', '2020-06-26 12:14:04'),
(25, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 65.00, '2020-06-26 15:50:00', '2020-06-26 13:50:00'),
(28, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 50.00, '2020-06-26 18:01:51', '2020-06-26 16:01:51'),
(31, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 40.00, '2020-06-26 22:50:35', '2020-06-26 20:50:35'),
(32, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'Paypal', 65.00, '2020-06-26 22:53:55', '2020-06-26 20:53:55'),
(33, 3, 'dylan@events.com', 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', '36000', 'Serbia', '065666999', NULL, '10', 11.00, 'New', 'COD', 30.00, '2020-07-26 08:32:21', '2020-07-26 06:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders_tickets`
--

CREATE TABLE `orders_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tickets`
--

INSERT INTO `orders_tickets` (`id`, `order_id`, `user_id`, `event_id`, `ticket_code`, `event_name`, `event_location`, `event_city`, `ticket_type`, `ticket_price`, `ticket_quantity`, `created_at`, `updated_at`) VALUES
(3, 6, 3, 14, 'LF654VB3', 'Love Fest', '', '', '3-day-ticket', '50', '1', '2020-06-22 11:11:11', '2020-06-22 09:11:11'),
(4, 7, 3, 9, 'AF2020AF6', 'Agnostic Front', '', '', '1-ticket', '65', '1', '2020-06-22 11:16:48', '2020-06-22 09:16:48'),
(5, 7, 3, 14, 'LF654VB2', 'Love Fest', '', '', '2-day-ticket', '40', '1', '2020-06-22 11:16:48', '2020-06-22 09:16:48'),
(6, 8, 3, 14, 'LF654VB1', 'Love Fest', '', '', '1-day-ticket', '30', '1', '2020-06-22 13:49:52', '2020-06-22 11:49:52'),
(7, 9, 3, 14, 'LF654VB2', 'Love Fest', '', '', '2-day-ticket', '40', '1', '2020-06-22 13:50:14', '2020-06-22 11:50:14'),
(8, 10, 3, 14, 'LF654VB3', 'Love Fest', '', '', '3-day-ticket', '50', '1', '2020-06-22 13:50:54', '2020-06-22 11:50:54'),
(9, 11, 3, 9, 'AF2020AF6-5', 'Agnostic Front', '', '', '5-tickets', '300', '1', '2020-06-22 13:51:18', '2020-06-22 11:51:18'),
(10, 12, 3, 9, 'AF2020AF6', 'Agnostic Front', '', '', '1-ticket', '65', '1', '2020-06-22 13:51:41', '2020-06-22 11:51:41'),
(11, 13, 3, 14, 'LF654VB1', 'Love Fest', '', '', '1-day-ticket', '30', '1', '2020-06-22 13:52:07', '2020-06-22 11:52:07'),
(12, 14, 3, 14, 'LF654VB2', 'Love Fest', '', '', '2-day-ticket', '40', '1', '2020-06-22 13:52:27', '2020-06-22 11:52:27'),
(13, 15, 3, 14, 'LF654VB3', 'Love Fest', '', '', '3-day-ticket', '50', '1', '2020-06-22 13:52:51', '2020-06-22 11:52:51'),
(14, 16, 3, 9, 'AF2020AF6', 'Agnostic Front', '', '', '1-ticket', '65', '1', '2020-06-22 13:53:40', '2020-06-22 11:53:40'),
(15, 17, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', '', '2-day-ticket', '40', '1', '2020-06-22 14:46:36', '2020-06-22 12:46:36'),
(16, 18, 3, 9, 'AF2020AF6', 'Agnostic Front', 'Arsenal Fest', '', '1-ticket', '65', '1', '2020-06-22 14:49:39', '2020-06-22 12:49:39'),
(17, 19, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', '', '2-day-ticket', '40', '1', '2020-06-22 14:52:55', '2020-06-22 12:52:55'),
(18, 20, 3, 9, 'AF2020AF6', 'Agnostic Front', 'Arsenal Fest', '', '1-ticket', '65', '1', '2020-06-22 17:06:25', '2020-06-22 15:06:25'),
(19, 21, 3, 9, 'AF2020AF6', 'Agnostic Front', 'Arsenal Fest', 'Kragujevac', '1-ticket', '65', '2', '2020-06-22 17:12:49', '2020-06-22 15:12:49'),
(20, 22, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '2-day-ticket', '40', '1', '2020-06-22 17:14:47', '2020-06-22 15:14:47'),
(21, 22, 3, 9, 'AF2020AF6-5', 'Agnostic Front', 'Arsenal Fest', 'Kragujevac', '5-tickets', '300', '1', '2020-06-22 17:14:47', '2020-06-22 15:14:47'),
(22, 23, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '2-day-ticket', '40', '2', '2020-06-25 00:05:56', '2020-06-24 22:05:56'),
(23, 24, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '2-day-ticket', '40', '2', '2020-06-26 14:14:04', '2020-06-26 12:14:04'),
(24, 25, 3, 9, 'AF2020AF6', 'Agnostic Front', 'Arsenal Fest', 'Kragujevac', '1-ticket', '65', '1', '2020-06-26 15:50:00', '2020-06-26 13:50:00'),
(25, 28, 3, 14, 'LF654VB3', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '3-day-ticket', '50', '1', '2020-06-26 18:01:51', '2020-06-26 16:01:51'),
(26, 31, 3, 14, 'LF654VB2', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '2-day-ticket', '40', '1', '2020-06-26 22:50:35', '2020-06-26 20:50:35'),
(27, 32, 3, 9, 'AF2020AF6', 'Agnostic Front', 'Arsenal Fest', 'Kragujevac', '1-ticket', '65', '1', '2020-06-26 22:53:55', '2020-06-26 20:53:55'),
(28, 33, 3, 14, 'LF654VB1', 'Love Fest', 'Central Park', 'Vrnjacka Banja', '1-day-ticket', '30', '1', '2020-07-26 08:32:21', '2020-07-26 06:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `ticket_code`, `ticket_type`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 14, 'LF654VB1', '1-day-ticket', 30.00, 5, '2020-05-17 15:03:58', '2020-05-19 20:57:26'),
(2, 14, 'LF654VB2', '2-day-ticket', 40.00, 3, '2020-05-17 15:03:58', '2020-05-19 20:57:26'),
(3, 14, 'LF654VB3', '3-day-ticket', 50.00, 3, '2020-05-17 15:03:58', '2020-05-19 20:57:26'),
(5, 9, 'AF2020AF6', '1-ticket', 65.00, 90, '2020-05-17 15:07:52', '2020-05-17 16:30:59'),
(6, 9, 'AF2020AF6-5', '5-tickets', 300.00, 40, '2020-05-17 16:08:20', '2020-05-17 16:30:59'),
(7, 14, 'LF654VB4', '4-day-ticket', 60.00, 0, '2020-05-18 20:56:39', '2020-05-19 20:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `country`, `postal_code`, `mobile`, `username`, `email`, `email_verified_at`, `password`, `user_avatar`, `remember_token`, `created_at`, `updated_at`, `user_category`) VALUES
(1, 'Petar', 'Stankovic', '', '', '', '', '', 'ps', 'petar@events.com', NULL, '$2y$10$wdygvdjsVmR6uLF2Dr6gLOBhplA786UmVWCzP1EvKLQs9fI5xxihu', 'user.jpg', NULL, '2020-04-18 09:31:20', '2020-04-22 22:10:38', 'admin'),
(3, 'Dylan', 'Dog', 'Dolina Sumraka 66/6', 'Kraljevo', 'Serbia', '36000', '065666999', 'dd', 'dylan@events.com', NULL, '$2y$10$sfXgwRI0lL3zpD.RLfLuUutYJa5PDju3qBS29oIqsD3B3uFPxm1aK', 'user.jpg', NULL, '2020-05-08 08:46:17', '2020-07-26 06:32:13', 'user'),
(12, 'Groucho', 'Marx', '', '', '', '', '', 'gm', 'groucho@events.com', NULL, '$2y$10$gEC8mi8D682oyuDnMIXZu.3ayljynRC3exu7N.cbniHPOjT8a44QK', '64841.jpg', NULL, '2020-05-09 20:08:35', '2020-06-05 10:04:53', 'event_manager'),
(13, 'Proba', 'Probic', '', '', '', '', '', 'pp', 'proba@events.com', NULL, '$2y$10$7rvA/n1NQ.ZLMzXhQulNK.2DVDxY/WA3H.LDWxRWYm54uh5/1k5ay', 'user.jpg', NULL, '2020-05-09 20:10:06', '2020-05-09 22:56:52', 'admin'),
(14, 'Prcko', 'Prckic', '', '', '', '', '', 'ppc', 'prcko@events.com', NULL, '$2y$10$9EQXLkuakb9ubWC.BC3ZheIRclDqSaOg12ENTsLnPBVvnIjirA/Ni', '36602.jpg', NULL, '2020-05-09 20:11:53', '2020-05-09 20:11:53', 'user'),
(15, 'Peca', 'Punker', 'Dolina Sumraka', '', '', '', '', 'peca', 'peca@events.com', NULL, '$2y$10$jBPNMAquWv0fytKQT6IPpOxIYIk709Ompdvoezry7KOYdxmdMlHha', 'user.jpg', NULL, '2020-06-04 16:19:50', '2020-06-04 20:14:24', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_id_foreign` (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`),
  ADD KEY `events_city_id_foreign` (`city_id`);

--
-- Indexes for table `events_images`
--
ALTER TABLE `events_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_tickets`
--
ALTER TABLE `orders_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events_images`
--
ALTER TABLE `events_images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders_tickets`
--
ALTER TABLE `orders_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `events_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `events_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

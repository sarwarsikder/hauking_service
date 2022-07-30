-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 03:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hauking_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `label`, `value`, `offset`, `created_at`, `updated_at`) VALUES
(1, '(GMT -12:00) Eniwetok, Kwajalein', '-12:00', '', NULL, NULL),
(2, 'GMT -11:00) Midway Island, Samoa', '-11:00', '', NULL, NULL),
(3, '(GMT -10:00) Hawaii', '-10:00', '', NULL, NULL),
(4, '(GMT -9:30) Taiohae', '-09:50', '', NULL, NULL),
(5, '(GMT -9:00) Alaska', '-09:00', '', NULL, NULL),
(6, '(GMT -8:00) Pacific Time (US & Canada)', '-08:00', '', NULL, NULL),
(7, '(GMT -7:00) Mountain Time (US &amp; Canada)', '-07:00', '', NULL, NULL),
(8, '(GMT -6:00) Central Time (US & Canada), Mexico City', '-06:00', '', NULL, NULL),
(9, '(GMT -5:00) Eastern Time (US & Canada), Bogota,\r\n                                            Lima', '-05:00', '', NULL, NULL),
(10, '(GMT -4:30) Caracas', '-04:50', '', NULL, NULL),
(11, '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz', '-04:00', '', NULL, NULL),
(12, '(GMT -3:30) Newfoundland', '-03:50', '', NULL, NULL),
(13, '(GMT -3:00) Brazil, Buenos Aires, Georgetown', '-03:00', '', NULL, NULL),
(14, '(GMT -2:00) Mid-Atlantic', '-02:00', '', NULL, NULL),
(15, '(GMT -1:00) Azores, Cape Verde Islands', '-01:00', '', NULL, NULL),
(16, '(GMT) Western Europe Time, London,\r\n                                            Lisbon, Casablanca', '+00:00', '', NULL, NULL),
(17, '(GMT +1:00) Brussels, Copenhagen, Madrid, Paris', '+01:00', '', NULL, NULL),
(18, '(GMT +2:00) Kaliningrad, South Africa', '+02:00', '', NULL, NULL),
(19, '(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg', '+03:00', '', NULL, NULL),
(20, '(GMT +3:30) Tehran', '+03:50', '', NULL, NULL),
(21, '(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi', '+04:00', '', NULL, NULL),
(22, '(GMT +4:30) Kabul', '+04:50', '', NULL, NULL),
(23, '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent', '+05:00', '', NULL, NULL),
(24, '(GMT +5:30) Bombay, Calcutta, Madras, New Delhi', '+05:50', '', NULL, NULL),
(25, '(GMT +5:45) Kathmandu, Pokhara', '+05:75', '', NULL, NULL),
(26, '(GMT +6:00) Almaty, Dhaka, Colombo', '+06:00', '', NULL, NULL),
(27, '(GMT +6:30) Yangon, Mandalay', '+06:50', '', NULL, NULL),
(28, '(GMT +7:00) Bangkok, Hanoi, Jakarta', '+07:00', '', NULL, NULL),
(29, '(GMT +8:00) Beijing, Perth, Singapore, Hong ', '+08:00', '', NULL, NULL),
(30, '(GMT +8:45) Eucla', '+08:75', '', NULL, NULL),
(31, '(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk', '+09:00', '', NULL, NULL),
(32, '(GMT +9:30) Adelaide, Darwin', '+09:50', '', NULL, NULL),
(33, '(GMT +10:00) Eastern Australia, Guam, Vladivostok', '+10:00', '', NULL, NULL),
(34, '(GMT +10:30) Lord Howe Island', '+10:50', '', NULL, NULL),
(35, '(GMT +11:00) Magadan, Solomon Islands, New Caledonia', '+11:00', '', NULL, NULL),
(36, '(GMT +11:30) Norfolk Island', '+11:50', '', NULL, NULL),
(37, '(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka', '+12:00', '', NULL, NULL),
(38, '(GMT +12:45) Chatham Islands', '+12:75', '', NULL, NULL),
(39, '(GMT +13:00) Apia, Nukualofa', '+13:00', '', NULL, NULL),
(40, '(GMT +14:00) Line Islands, Tokelau', '+14:00', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2014 at 06:55 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `multicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `trv_admin_user`
--

CREATE TABLE `trv_admin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_email_verified` set('0','1') NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  `salt` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `u_created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_on_ip` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_first_login` set('0','1') NOT NULL DEFAULT '1',
  `last_login_ip` varchar(255) NOT NULL,
  `user_type` set('0','1','2') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(255) NOT NULL,
  `password_request_code` varchar(255) NOT NULL,
  `user_auto_signin` set('0','1') NOT NULL,
  `is_admin` set('0','1') NOT NULL DEFAULT '0',
  `is_active` set('0','1','2') NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_admin_user`
--

INSERT INTO `trv_admin_user` (`user_id`, `username`, `email`, `is_email_verified`, `password`, `salt`, `display_name`, `avatar`, `u_created_on`, `created_on_ip`, `last_updated`, `last_login`, `is_first_login`, `last_login_ip`, `user_type`, `user_activation_key`, `password_request_code`, `user_auto_signin`, `is_admin`, `is_active`) VALUES
(1, 'admin', 'info@travelly.com', '1', '6b41e51454e51d7691ca6181decb31a2f56bad59', 'cfc755116544c00795b082acf8e43353669415d9', 'Ashish Kumar Basak', '988bc4e23011fc1b5deaa2a564bc6e00.jpg', '2011-10-29 21:10:12', '127.0.0.1', '2011-10-29 21:10:12', '2012-01-28 02:20:47', '0', '127.0.0.1', '0', '9c6768a171ae66df37b7fea164f3011d', '34c574edf5b133707d4e5082ce5d170b', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trv_admin_userprofile`
--

CREATE TABLE `trv_admin_userprofile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `localtion` varchar(255) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `favourite_team` text,
  `biodata` longtext,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trv_attachments`
--

CREATE TABLE `trv_attachments` (
  `attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_height` int(11) NOT NULL,
  `image_width` int(11) NOT NULL,
  `image_size` int(11) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `mime_name` varchar(255) NOT NULL,
  `croped` set('0','1') NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`attachment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=404 ;

--
-- Dumping data for table `trv_attachments`
--

INSERT INTO `trv_attachments` (`attachment_id`, `image_name`, `image_height`, `image_width`, `image_size`, `mime_type`, `mime_name`, `croped`, `user_id`) VALUES
(1, '4d0c49a886cc92b82b40e2113b384c5f.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 1),
(2, 'f865c323751312d635673b2f47557b15.jpg', 768, 1024, 760, 'image/jpeg', '', '0', 1),
(3, '9181e93b58e8933bfe87410e25c9a7e2.jpg', 768, 1024, 758, 'image/jpeg', '', '0', 1),
(4, 'fef83d441ca4b90fae66e732ff3166b0.jpg', 768, 1024, 763, 'image/jpeg', '', '0', 1),
(5, 'fd1d2a873256f1f0c69fd1e2bc1a1b58.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 1),
(6, '811ea4ae82cfe9daabe072d67b2256f4.jpg', 768, 1024, 760, 'image/jpeg', '', '0', 1),
(7, '767ff98ffe6df53fd33cb2eee340d6bb.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 2),
(8, 'caf86b82b928d71917576d6ad2f1e8f8.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 2),
(9, 'ce5de0eeedf2d20ee20147bb71cf701c.jpg', 768, 1024, 826, 'image/jpeg', '', '0', 2),
(10, '37948eb358fe1d5f2567fb4089510db5.jpg', 768, 1024, 859, 'image/jpeg', '', '0', 2),
(11, '6b55bd8ca60976f55c4aee872f0b26c5.jpg', 768, 1024, 758, 'image/jpeg', '', '0', 3),
(12, '8fdca730af526dd4b02056ecab8a0898.jpg', 768, 1024, 606, 'image/jpeg', '', '0', 3),
(13, '51985f8af31bf8a0e08fcb03e4af6a04.jpg', 768, 1024, 826, 'image/jpeg', '', '0', 3),
(14, '28bd3609794f272263265bd7f1305a21.jpg', 768, 1024, 760, 'image/jpeg', '', '0', 3),
(15, '550612f12b674e3e1266ebb1f15e3e6e.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 3),
(16, '7cecbc1639b30c6c9f74de143fb89500.jpg', 768, 1024, 826, 'image/jpeg', '', '0', 3),
(17, '14f9338c794ca39304a58e703f259e05.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 3),
(18, '07e25a245aff36b77d11e7532598d947.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 3),
(19, 'd02cebea2d949f67767913482c9828cf.jpg', 768, 1024, 606, 'image/jpeg', '', '0', 3),
(20, '951fa50bb9b3dc6ad73a5fb120ee71b9.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 3),
(21, '374caa16e107ec11acd64caaa8e2014d.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 3),
(22, '8c75cf3851a87a4f46898d55f0446d42.jpg', 768, 1024, 760, 'image/jpeg', '', '0', 3),
(23, '0e2f34b801905647fc09782166f87d14.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 3),
(24, '017b63d76ceeb01cc57d1ddcfbe4646d.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 1),
(25, 'daa045a947a13c8819b9c89167905b5c.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 1),
(26, '4f865204f73e1496e8057e6c7c57c06e.jpg', 400, 640, 264, 'image/jpeg', '', '0', 1),
(27, 'b617f6650a75a7a15d495f02d93e17d2.jpg', 400, 640, 153, 'image/jpeg', '', '0', 1),
(28, '8ccaac03cfcad1d8100f157fb204b8d6.jpg', 400, 640, 174, 'image/jpeg', '', '0', 1),
(29, '27a8822aad04a398130cc955d92ac773.jpg', 400, 640, 264, 'image/jpeg', '', '0', 1),
(30, '170bdbe9379ab2b87b7fa3279713b1dc.jpg', 400, 640, 153, 'image/jpeg', '', '0', 1),
(31, '271a2e74cd1bfe3724ce8f6d23b0949b.jpg', 400, 640, 174, 'image/jpeg', '', '0', 1),
(32, '97bcc453e252354de9dd1ff4f8affa36.jpg', 400, 640, 153, 'image/jpeg', '', '0', 5),
(33, '3593340a0035d3a679428b2a1531559a.jpg', 400, 640, 264, 'image/jpeg', '', '0', 5),
(34, '2c99c95bc92b6d5fe630edd5bc057f8b.jpg', 828, 1024, 856, 'image/jpeg', '', '0', 6),
(35, '2c99c95bc92b6d5fe630edd5bc057f8b.jpg', 828, 1024, 856, 'image/jpeg', '', '0', 6),
(36, '338bdd043c4187b8eaf306fd172c5db0.jpg', 404, 720, 75, 'image/jpeg', '', '0', 6),
(37, '366fed7fc93a7092c6930b20fe08f543.jpg', 400, 640, 264, 'image/jpeg', '', '0', 1),
(38, 'd66a24af5262fda384121046aaab0cd3.jpg', 768, 1024, 760, 'image/jpeg', '', '0', 1),
(39, '4a8446f81a5f0adc872923a55871f2df.jpg', 320, 415, 47, 'image/jpeg', '', '0', 6),
(40, '949b9e3dff77a52be1da5eea9979c586.jpg', 320, 296, 34, 'image/jpeg', '', '0', 6),
(41, '20c71f580c236b42a90273ee212d8ae2.jpg', 196, 296, 24, 'image/jpeg', '', '0', 6),
(42, '360ea6e931677088d3ee09ebca248bb8.jpg', 176, 296, 23, 'image/jpeg', '', '0', 6),
(43, '85b117b74634b607001bdfc99c3e6652.jpg', 400, 920, 128, 'image/jpeg', '', '0', 9),
(44, '6df759ae8137c992fd3a2947fd350737.jpg', 400, 660, 103, 'image/jpeg', '', '0', 9),
(45, '5dc1a018c121689e82edb211b44fb73b.jpg', 400, 400, 47, 'image/jpeg', '', '0', 6),
(46, 'f5acec3aa211bbd679ae5db96cbab722.png', 569, 569, 19, 'image/png', '', '0', 6),
(47, 'd5a2c145b0a27c4ee5013a19a6605364.png', 569, 569, 19, 'image/png', '', '0', 6),
(48, 'a09b0834dc59ebd5575fbaf629f07e44.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 25),
(49, '4c162dbafdda3949c3b13dbaf796248b.jpg', 768, 1024, 606, 'image/jpeg', '', '0', 25),
(50, 'a6a451ab371dd5b255a02b76e51b6221.jpg', 768, 1024, 826, 'image/jpeg', '', '0', 25),
(51, 'cc2be177ef049d9b36000f5f72f2bae2.jpg', 768, 1024, 859, 'image/jpeg', '', '0', 25),
(52, '99b8e436daae90829d0557c37136647d.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 25),
(53, 'fefdcc3cfe17c34caa5f488143f1eac2.jpg', 768, 1024, 826, 'image/jpeg', '', '0', 15),
(54, '0fc4611223f16b41e21ca0a8a4bad02c.jpg', 768, 1024, 581, 'image/jpeg', '', '0', 15),
(55, '104e6bb3637aa568cff7794ef0f8469a.jpg', 768, 1024, 548, 'image/jpeg', '', '0', 26),
(56, '34b3b5d6b29e792f3fae1991e2fa522e.jpg', 685, 1024, 250, 'image/jpeg', '', '0', 29),
(57, '34b3b5d6b29e792f3fae1991e2fa522e.jpg', 685, 1024, 250, 'image/jpeg', '', '0', 29),
(58, 'b07669ddbd007445a74aaf1dcdad355b.jpg', 2448, 3264, 575, 'image/jpeg', '', '0', 34),
(59, 'b07669ddbd007445a74aaf1dcdad355b.jpg', 2448, 3264, 575, 'image/jpeg', '', '0', 34),
(60, 'b07669ddbd007445a74aaf1dcdad355b.jpg', 2448, 3264, 575, 'image/jpeg', '', '0', 34),
(61, '00e9748789fcc32aabc5fa524cbdeb5e.jpg', 1406, 2122, 464, 'image/jpeg', '', '0', 34),
(62, 'bf6639b2738fa4d711f555ce04ea9085.jpg', 425, 624, 199, 'image/jpeg', '', '0', 34),
(63, '840bfb47b8bdd4055979ebba207ca5b4.jpg', 1197, 1800, 875, 'image/jpeg', '', '0', 30),
(64, '299d7533e7c1a62a1e481f08ae49ba12.jpg', 669, 1000, 298, 'image/jpeg', '', '0', 30),
(65, '0a791541983ce8444c72525952c4460f.jpg', 1338, 2000, 703, 'image/jpeg', '', '0', 30),
(66, '437f2717502462332ae6e3eacdb4b115.jpg', 1338, 2000, 962, 'image/jpeg', '', '0', 30),
(67, '07b4a966b314730d6689ee3ec70379e8.jpg', 1003, 1500, 683, 'image/jpeg', '', '0', 30),
(68, '16972475f879dfd5075fa83893497641.jpg', 400, 920, 190, 'image/jpeg', '', '0', 33),
(69, '6dc38d365a2227fdbc8f5c205cbd1ab6.jpg', 334, 500, 76, 'image/jpeg', '', '0', 30),
(70, 'b627ee59899be4ac1bd1b6af4df02fec.jpg', 746, 500, 160, 'image/jpeg', '', '0', 30),
(71, 'a188d0afda4bed50a0c8d5e9dc84476e.jpg', 1338, 2000, 992, 'image/jpeg', '', '0', 30),
(72, '496c996e995deb8743a56ba5b9858c5d.jpg', 669, 1000, 298, 'image/jpeg', '', '0', 30),
(73, 'd996a3b712aab7126253dc9f147b1206.jpg', 2244, 1500, 613, 'image/jpeg', '', '0', 30),
(74, '0ccf350d838386adef45b67e39468891.jpg', 1344, 900, 486, 'image/jpeg', '', '0', 30),
(75, '60f267c4071945f7650a3b3a75661742.jpg', 1338, 2000, 920, 'image/jpeg', '', '0', 30),
(76, '3bf1f99dc0bb135d19c89ad0874c16f7.jpg', 2448, 3264, 575, 'image/jpeg', '', '0', 34),
(77, '520bd51621dc2364b73135d89d07960e.JPG', 1296, 968, 377, 'image/jpeg', '', '0', 36),
(78, '3ea051b3057d522eb3a5b1a5905741b7.jpg', 1153, 1540, 495, 'image/jpeg', '', '0', 36),
(79, '5c066add3bdfe0f07d30fb5c680ebd9d.JPG', 225, 300, 36, 'image/jpeg', '', '0', 36),
(80, '669b220c342250b748c1190896fc767f.JPG', 968, 1296, 745, 'image/jpeg', '', '0', 36),
(81, 'c149b175298c1039a06986a9be4f4c64.JPG', 1632, 1224, 859, 'image/jpeg', '', '0', 36),
(82, 'a6fae5ca1085deb6700fbaf90cde9bc1.jpg', 390, 600, 94, 'image/jpeg', '', '0', 35),
(83, 'd07c93929dc173f85e7bfabccbb603bf.jpg', 600, 800, 146, 'image/jpeg', '', '0', 38),
(84, '080a8a43a970748fa69194a637164707.jpg', 600, 800, 216, 'image/jpeg', '', '0', 38),
(85, 'fa754dcce43312d5090680be5bf6026a.jpg', 600, 800, 121, 'image/jpeg', '', '0', 38),
(86, '335404741a2fd0b0673cbef8f26b419a.jpg', 600, 800, 137, 'image/jpeg', '', '0', 38),
(87, 'b7353d7cc6f57990f16fe06ab70425f7.jpg', 600, 800, 127, 'image/jpeg', '', '0', 38),
(88, '2d99bd5790dda5227a39abd73d11c7a5.jpg', 600, 800, 136, 'image/jpeg', '', '0', 38),
(89, 'ee92b53bf96a1f1be890a42d1dd4c798.jpg', 600, 800, 141, 'image/jpeg', '', '0', 38),
(90, '96770ffb653430f9e1607586d3249e64.jpg', 600, 800, 128, 'image/jpeg', '', '0', 38),
(91, '6a9d63e8686cd09e7e61a2c5f2355179.JPG', 1728, 2304, 715, 'image/jpeg', '', '0', 32),
(92, '584d7f4bed90e22c8a6d045dd9c65e11.JPG', 768, 1024, 191, 'image/jpeg', '', '0', 32),
(93, '3a7542906b54f7e7a1bd15ac092826e3.JPG', 1728, 2304, 860, 'image/jpeg', '', '0', 32),
(94, 'a275ea0cc4573926a6083ee0870f0fcd.jpg', 680, 800, 171, 'image/jpeg', '', '0', 32),
(95, 'fcb393f20abacbc6de77f1651f3abbce.jpg', 657, 1550, 727, 'image/jpeg', '', '0', 32),
(96, 'fbeeaa51256f424a6785a6512815dfbc.JPG', 488, 650, 59, 'image/jpeg', '', '0', 43),
(97, '37cf3d53584ce819275f2d8a04a16e52.JPG', 488, 650, 62, 'image/jpeg', '', '0', 43),
(98, '036132fb058931070172fa0f96533565.JPG', 488, 650, 60, 'image/jpeg', '', '0', 43),
(99, 'b51e2e88447d9ecb43d24493a1f3ea7d.JPG', 488, 650, 55, 'image/jpeg', '', '0', 43),
(100, '0f58f7fb69a612f417dc1939164a83e9.JPG', 488, 650, 77, 'image/jpeg', '', '0', 43),
(101, '3b00aab319408e28cd0bfa88131a24d2.JPG', 488, 650, 55, 'image/jpeg', '', '0', 43),
(102, '44a7abce1e2456cb7da5db3eea096c78.JPG', 488, 650, 77, 'image/jpeg', '', '0', 43),
(103, '9f0712759a81da772ac0e8ba3842a5cb.jpg', 250, 250, 46, 'image/jpeg', '', '0', 43),
(104, 'd228b07325833236f59e04a827eae0e1.JPG', 488, 650, 59, 'image/jpeg', '', '0', 43),
(105, 'bdf7e36341e31650de77b613006ee6ed.jpg', 250, 250, 46, 'image/jpeg', '', '0', 43),
(106, 'c5227d1ed40dab1771c38cbf24ff7b4d.jpg', 250, 250, 46, 'image/jpeg', '', '0', 43),
(107, '98abd4cbf27679ce9afb25c0a6fb24cb.JPG', 488, 650, 77, 'image/jpeg', '', '0', 43),
(108, '4c0de26bec7a75fa88997699aa4948a4.JPG', 488, 650, 55, 'image/jpeg', '', '0', 43),
(109, 'a5f7632008e74d4c025f19125237d235.JPG', 488, 650, 59, 'image/jpeg', '', '0', 43),
(110, '3ef74cde9ec5b4405a61b98be526a276.JPG', 488, 650, 62, 'image/jpeg', '', '0', 43),
(111, 'c002122f6b6ae889c239eaadd4fb1321.jpg', 666, 1000, 275, 'image/jpeg', '', '0', 44),
(112, '12224edff0e51bef77852172de39f125.jpg', 665, 1000, 249, 'image/jpeg', '', '0', 44),
(113, '0096e6389b89efda37a4a1f2835466f9.JPG', 665, 1000, 213, 'image/jpeg', '', '0', 44),
(114, '93fd96558044fb868d5bcf1301b46fa8.JPG', 664, 1000, 342, 'image/jpeg', '', '0', 44),
(115, 'cc74a1ec8b922435219b58e8d0e36bee.jpg', 402, 604, 45, 'image/jpeg', '', '0', 47),
(116, '9cd1879f93eb1a0d0c38f20af4ef1454.jpg', 402, 604, 43, 'image/jpeg', '', '0', 47),
(117, '23e14b0efdac2aacf9dc22c899852162.jpg', 402, 604, 42, 'image/jpeg', '', '0', 47),
(118, '482b3aa36795090f7a6fe584e031e831.jpg', 401, 604, 53, 'image/jpeg', '', '0', 47),
(119, '7436d705b45b31b6642e52e4271b3162.jpg', 504, 672, 60, 'image/jpeg', '', '0', 47),
(120, 'f78016eac348e7f12e3411413dd4acd2.JPG', 480, 640, 140, 'image/jpeg', '', '0', 48),
(121, 'b5ee2fcb479aad87c97b986ee221314b.JPG', 480, 640, 138, 'image/jpeg', '', '0', 48),
(122, '1d8a2350fd413dcf5aae7a0969167b5b.JPG', 480, 640, 141, 'image/jpeg', '', '0', 48),
(123, 'b6d0835a99eb6deb5e256521f4d57285.JPG', 480, 640, 140, 'image/jpeg', '', '0', 48),
(124, '5efdd28bf7a3e0db014b2400527ece7d.JPG', 480, 640, 141, 'image/jpeg', '', '0', 48),
(125, 'f12ceeb457669c3c626c087a422e9200.jpg', 500, 375, 145, 'image/jpeg', '', '0', 52),
(126, '005c897fb644499162245941c79dbce2.JPG', 1536, 2048, 851, 'image/jpeg', '', '0', 52),
(127, 'bcc5d940cbfc7f5816b942bb3254a9a2.jpg', 300, 400, 29, 'image/jpeg', '', '0', 52),
(128, 'edf5163a1d71e42b893e31880d44916b.jpg', 300, 400, 40, 'image/jpeg', '', '0', 52),
(129, '61e728880168805e91acb86dd483f7c0.jpg', 300, 400, 41, 'image/jpeg', '', '0', 52),
(130, '4109886c79e3a0847863d86aab3f4391.JPG', 1200, 1600, 869, 'image/jpeg', '', '0', 53),
(131, 'b2a7b1396a54b1b1a39e3582c58e2c01.JPG', 1200, 1600, 814, 'image/jpeg', '', '0', 53),
(132, '7722ee7ccc772618c91a591a152a3273.JPG', 480, 640, 150, 'image/jpeg', '', '0', 48),
(133, 'be58b9e3562ea99d50f10f8e933ae2f9.JPG', 480, 640, 139, 'image/jpeg', '', '0', 48),
(134, 'a5f8ba9bc034838f511b123bff75382e.JPG', 480, 640, 144, 'image/jpeg', '', '0', 48),
(135, '78047bc011aa67e1614468300f2827cc.jpg', 160, 245, 14, 'image/jpeg', '', '0', 48),
(136, 'e336fb281fe5b9f0c467af1ae9b95dc1.JPG', 480, 640, 145, 'image/jpeg', '', '0', 48),
(137, '99065c2f5e003e81914b65ea4e426c27.JPG', 336, 448, 51, 'image/jpeg', '', '0', 59),
(138, '66783b46a2a226e1d000d98bf0dd901a.jpg', 480, 640, 276, 'image/jpeg', '', '0', 59),
(139, '326ea591c3b54d66e225386c4c77e0e5.jpg', 640, 480, 268, 'image/jpeg', '', '0', 59),
(140, '39c5828ecaadc92d1cc6150f62bbed89.JPG', 640, 480, 240, 'image/jpeg', '', '0', 59),
(141, 'af151aded2677ac0c817b38a919aa655.JPG', 480, 640, 236, 'image/jpeg', '', '0', 59),
(142, '3bf45a1bdd48749815ef51e1ca7a11ad.JPG', 480, 640, 235, 'image/jpeg', '', '0', 61),
(143, 'cf83316408f850a6d4a2dfd90a5542a4.JPG', 480, 640, 237, 'image/jpeg', '', '0', 61),
(144, 'ce67c6120fa56d0d5d48b5cf9d3c0393.JPG', 480, 640, 99, 'image/jpeg', '', '0', 61),
(145, 'a372a2b3b34df539473c72d6ec7f8682.jpg', 640, 960, 122, 'image/jpeg', '', '0', 61),
(146, '48d22821e5c6e700c13f967a64fc9d19.jpg', 640, 960, 122, 'image/jpeg', '', '0', 61),
(147, '5cfc14c72556f21b8a150fb3e39e1626.jpg', 480, 640, 78, 'image/jpeg', '', '0', 61),
(148, '964931f3aaba72a4eb61f43b2825bde1.jpg', 533, 800, 54, 'image/jpeg', '', '0', 57),
(149, '3bc7e31458c9e439f09d2b269562839c.jpg', 531, 800, 363, 'image/jpeg', '', '0', 57),
(150, 'e4081f9fb54c802d498a5c333288ba32.jpg', 531, 800, 359, 'image/jpeg', '', '0', 57),
(151, 'f52092cd9d12db5979caf40e77740dc8.jpg', 431, 650, 55, 'image/jpeg', '', '0', 57),
(152, 'c5403464cd1fafc3ad345fbf807777d8.jpg', 226, 300, 17, 'image/jpeg', '', '0', 57),
(153, '9f18d63a6b464a60b8befa945d5f70ef.jpg', 664, 1000, 753, 'image/jpeg', '', '0', 57),
(154, '2b87eb4e0320341916e9d6bf8524dc62.jpg', 100, 150, 47, 'image/jpeg', '', '0', 57),
(155, '4dd9b378e5589f2660c28eb40f5b47c9.jpg', 100, 150, 44, 'image/jpeg', '', '0', 57),
(156, '081685fc77a34f93a453578fe2eb53bd.jpg', 664, 1000, 617, 'image/jpeg', '', '0', 57),
(157, '59da70c015fc6e29b3301b2e10ef282d.jpg', 664, 1000, 737, 'image/jpeg', '', '0', 57),
(158, '1abd253cf9987d9e91ad9f3dd144cda1.jpg', 400, 660, 142, 'image/jpeg', '', '0', 62),
(159, '7430d640911d6394b65ecbed76e37658.JPG', 768, 1024, 511, 'image/jpeg', '', '0', 50),
(160, '7430d640911d6394b65ecbed76e37658.JPG', 768, 1024, 511, 'image/jpeg', '', '0', 50),
(161, '4ab7025f8b084ddcefdf157107e0ffc5.JPG', 441, 640, 203, 'image/jpeg', '', '0', 50),
(162, 'b024439a092a08253c8216b1750be345.JPG', 433, 640, 143, 'image/jpeg', '', '0', 50),
(163, '6a92865ca4e6014a2ba613afa5c39720.JPG', 447, 640, 191, 'image/jpeg', '', '0', 50),
(164, '7b6ae8801a46e49403479e3c6f9c7a4b.jpg', 604, 453, 46, 'image/jpeg', '', '0', 68),
(165, '63b3858f13b217146ea4ece6a57f107f.jpg', 453, 604, 38, 'image/jpeg', '', '0', 68),
(166, 'd408f84985179df43a9d679042b55691.jpg', 453, 604, 35, 'image/jpeg', '', '0', 68),
(167, '2ae71c34cf90b64fd5c57b3f1f518b10.jpg', 453, 604, 38, 'image/jpeg', '', '0', 68),
(168, '47b3c846a660850deb7e02aa2cabe2ff.jpg', 604, 453, 28, 'image/jpeg', '', '0', 68),
(169, '8d9fcd023bc7d5db649f205d180d0657.jpg', 597, 720, 119, 'image/jpeg', '', '0', 69),
(170, '6ef4d4a4362a6b66b94f6743adb37448.jpg', 1536, 2048, 606, 'image/jpeg', '', '0', 69),
(171, '4d22e741fc3ef6a225414faf67f206d4.JPG', 480, 640, 127, 'image/jpeg', '', '0', 69),
(172, '010c7ea5d82824d5baf68be21dd9d0ed.JPG', 1426, 2000, 973, 'image/jpeg', '', '0', 69),
(173, '9fe8e971a8030e518ea4cc4dc62a76bd.jpg', 540, 720, 90, 'image/jpeg', '', '0', 69),
(174, '071ccdfee79bae2945991f8496309ab4.jpg', 75, 100, 4, 'image/jpeg', '', '0', 70),
(175, '68c612296750963fd1a809ecd5f717ae.jpg', 143, 190, 9, 'image/jpeg', '', '0', 70),
(176, '3727aa5fb930445ff3ef394a6f4eb177.jpg', 664, 1000, 96, 'image/jpeg', '', '0', 70),
(177, '8eafc6c2fd14745e8c6093c3fc7160ef.jpg', 75, 100, 3, 'image/jpeg', '', '0', 70),
(178, '36b02ec7217372ea5f8f5de8e8f1bf69.jpg', 481, 640, 95, 'image/jpeg', '', '0', 71),
(179, '22b6caa85a551117e2800a66011a7949.jpg', 480, 640, 62, 'image/jpeg', '', '0', 71),
(180, 'fdb6a0c40e184dddfdcca0570908d761.jpg', 750, 1000, 354, 'image/jpeg', '', '0', 72),
(181, '252b33e7c320c91346a431f1eef110bd.jpg', 1200, 1600, 354, 'image/jpeg', '', '0', 72),
(182, '95abe978bf28680ea86ec5dd3a6b3535.jpg', 672, 896, 57, 'image/jpeg', '', '0', 72),
(183, 'a3c2cbf02ecd22b0186c65852aa48b73.jpg', 826, 1000, 140, 'image/jpeg', '', '0', 72),
(184, 'e827c2079afc26c037707bc77ccc7a80.jpg', 751, 500, 151, 'image/jpeg', '', '0', 72),
(185, 'afd7d892de66d7dbfe58285981c9f679.jpg', 821, 1200, 169, 'image/jpeg', '', '0', 73),
(186, '500171e3abdf93488a9aa9efa3cd6a6a.jpg', 600, 800, 156, 'image/jpeg', '', '0', 73),
(187, '4f797252d9f4cbe0b71b33bfc7ee119f.jpg', 600, 800, 155, 'image/jpeg', '', '0', 73),
(188, '9478eeb2b2e208df5f179e3cd7bd13dd.jpg', 240, 320, 42, 'image/jpeg', '', '0', 73),
(189, '94b98f20355ba867c1bb22b1a494eb7d.jpg', 904, 1359, 130, 'image/jpeg', '', '0', 73),
(190, '2acae827746951607d78849231ce19ff.jpg', 1020, 680, 373, 'image/jpeg', '', '0', 74),
(191, '24eadc57507d876c27ad122e79f1beee.jpg', 683, 1024, 391, 'image/jpeg', '', '0', 74),
(192, '41ff0cb1ab922a964b21756f4ae4238e.jpg', 1024, 683, 295, 'image/jpeg', '', '0', 74),
(193, '8921acd2e763c090ab5744dfba21bb72.jpg', 667, 1024, 92, 'image/jpeg', '', '0', 74),
(194, 'c1de6d5c37f762f0a7350e3556daaf64.jpg', 683, 1024, 378, 'image/jpeg', '', '0', 74),
(195, 'd4be2eaf5f505cce549856b96b307fe3.jpg', 426, 640, 74, 'image/jpeg', '', '0', 75),
(196, 'c82ff94aa165a6426f562dae827ccf04.jpg', 426, 640, 55, 'image/jpeg', '', '0', 75),
(197, 'face3f095913052a316a587e85683f2b.jpg', 438, 640, 40, 'image/jpeg', '', '0', 75),
(198, '7ba75e25ce464239c0406c477af4515a.jpg', 480, 342, 32, 'image/jpeg', '', '0', 75),
(199, '5193a615e10130bbb49bc93e047808e1.jpg', 480, 342, 25, 'image/jpeg', '', '0', 75),
(200, '91e11f8322bf59889b5120606d9d06a3.jpg', 680, 454, 66, 'image/jpeg', '', '0', 77),
(201, '16dd61f58fef43127f0244004f3bca3f.jpg', 680, 454, 107, 'image/jpeg', '', '0', 77),
(202, '66eb2e6985d525305bf75c690f35f3ee.jpg', 56, 37, 1, 'image/jpeg', '', '0', 77),
(203, 'a926b657a636c759fe0a8b1ad754c2fb.jpg', 37, 56, 1, 'image/jpeg', '', '0', 77),
(204, '085b719affe075e28aa71d71165c1c17.JPG', 686, 1024, 220, 'image/jpeg', '', '0', 78),
(205, '263c73ac1d7e046949d58444abe8122e.JPG', 686, 1024, 221, 'image/jpeg', '', '0', 78),
(206, 'b045b61a3ffa97c9a40b39c0d6fe815b.JPG', 683, 1024, 635, 'image/jpeg', '', '0', 78),
(207, '2e0e6dfc17719f9d70b7a43b65b01af5.JPG', 686, 1024, 216, 'image/jpeg', '', '0', 78),
(208, '7a0d898868ca079c76494086c69be3c4.JPG', 686, 1024, 383, 'image/jpeg', '', '0', 78),
(209, 'c052707c60c78a34642511fb06ee149e.JPG', 768, 1156, 134, 'image/jpeg', '', '0', 79),
(210, '5a83f8954156e9f23bc34f5a8d62bd1a.jpg', 768, 1156, 143, 'image/jpeg', '', '0', 79),
(211, '162e31f6b4474f7d783ba331ada70cea.JPG', 768, 1156, 160, 'image/jpeg', '', '0', 79),
(212, '45ab91039126449ea60dc08667e13063.JPG', 768, 1156, 168, 'image/jpeg', '', '0', 79),
(213, 'ba290423621eda83c583ae8f8f54b827.JPG', 768, 1156, 164, 'image/jpeg', '', '0', 79),
(214, 'f7e19e05a99f8596910199aba1b0621a.jpg', 640, 426, 57, 'image/jpeg', '', '0', 80),
(215, '6b1f382f488c901f3de4f6280d4ed201.jpg', 640, 426, 57, 'image/jpeg', '', '0', 80),
(216, 'd2845db36e23792a0377c19b1db3b36d.jpg', 612, 640, 61, 'image/jpeg', '', '0', 80),
(217, '1d3d69d3f12df015f784509b394da1f3.jpg', 509, 640, 50, 'image/jpeg', '', '0', 80),
(218, 'd310db9d88042aaa7a4d426f913e4680.jpg', 431, 640, 53, 'image/jpeg', '', '0', 80),
(219, '8075c4b0f4fed5aa046c593272a594f5.jpg', 471, 640, 57, 'image/jpeg', '', '0', 80),
(220, 'af75cc51aa08e7716acc701fce986e23.jpg', 329, 480, 60, 'image/jpeg', '', '0', 81),
(221, '0c5c877794a6619f1444248704d91b48.JPG', 512, 768, 108, 'image/jpeg', '', '0', 81),
(222, 'ad961cd0569f14c55b649b746c44920d.JPG', 1200, 1600, 546, 'image/jpeg', '', '0', 81),
(223, 'f5c5d712c4750b027383fc74dadbb2dd.jpg', 390, 480, 89, 'image/jpeg', '', '0', 81),
(224, '4a99648d3bef32407e03d4ef89ff4c6a.JPG', 1200, 1600, 546, 'image/jpeg', '', '0', 81),
(225, 'ba7eba4fa712693d3df7de9a9dd13aea.JPG', 512, 768, 108, 'image/jpeg', '', '0', 81),
(226, '95f10b37b336357c1fba9dd8a669935a.jpg', 390, 480, 89, 'image/jpeg', '', '0', 81),
(227, 'f99059c6a698eb538b86c43b2d81b52e.jpg', 329, 480, 60, 'image/jpeg', '', '0', 81),
(228, '3abd18456b31bced867278db339732fc.jpg', 768, 1024, 84, 'image/jpeg', '', '0', 83),
(229, '99b822a7f590840c419eaf86c6534cb0.jpg', 2592, 3872, 851, 'image/jpeg', '', '0', 83),
(230, '80097e3d648f7f99e53cfefa9a973f7a.jpg', 648, 968, 243, 'image/jpeg', '', '0', 86),
(231, '1571b6011005beb1f4cac7e1a876e776.jpg', 968, 648, 153, 'image/jpeg', '', '0', 86),
(232, '37f0bcaea109fa924a2d1259ce74a773.jpg', 648, 968, 153, 'image/jpeg', '', '0', 86),
(233, 'f006eda015a5c58758a3ef5ad68fc720.jpg', 648, 968, 170, 'image/jpeg', '', '0', 86),
(234, 'e892b4df5d5af82b98af18747a75cc71.jpg', 648, 968, 144, 'image/jpeg', '', '0', 86),
(235, 'a8e637aaadc8f1b755dc7dc947495970.jpg', 400, 600, 128, 'image/jpeg', '', '0', 87),
(236, '1eba79d8b22dc40a1682778855a9ac64.jpg', 400, 600, 136, 'image/jpeg', '', '0', 87),
(237, 'e963d1fffb2682a79c7329d7401eede8.jpg', 400, 600, 209, 'image/jpeg', '', '0', 87),
(238, '6ede8f3d9575924022347282b3427459.jpg', 400, 533, 55, 'image/jpeg', '', '0', 87),
(239, '506c7441e25ecc8447d55436aa6af45d.jpg', 400, 600, 58, 'image/jpeg', '', '0', 87),
(240, 'f43ce4a1d40fdb25326afdb6b7c71ece.jpg', 400, 600, 85, 'image/jpeg', '', '0', 87),
(241, '988aa8be57b044a1acc963da9ddfde80.jpg', 400, 639, 63, 'image/jpeg', '', '0', 87),
(242, '37ed9ed0b5782a1eda44b09b2bb9f63c.jpg', 168, 250, 19, 'image/jpeg', '', '0', 84),
(243, '2e74cdc9962e893abd20ca62989df6e9.jpg', 768, 1024, 63, 'image/jpeg', '', '0', 83),
(244, '1c5d799dfff62cbd458ac7a9c72092b9.jpg', 768, 1024, 89, 'image/jpeg', '', '0', 83),
(245, 'cf28d93fb75a07b51d7dab67bb4e8cd2.jpg', 768, 1024, 92, 'image/jpeg', '', '0', 83),
(246, 'bd2f31f6025867a13bc2715132367696.jpg', 768, 1024, 188, 'image/jpeg', '', '0', 83),
(247, '6864d5f6a678bab0cb49613066ec248f.jpg', 480, 640, 43, 'image/jpeg', '', '0', 83),
(248, 'cbde2623bd76e7e480d3a0fbdaa5390a.jpg', 768, 1024, 66, 'image/jpeg', '', '0', 83),
(249, 'cee7f08852270425e800369b1520ffcb.jpg', 768, 1024, 85, 'image/jpeg', '', '0', 83),
(250, 'e91444e4708888c61cbda02b3acb0f36.jpg', 768, 1024, 84, 'image/jpeg', '', '0', 83),
(251, 'ff68b23896b3031caee7ea07d56ff6ac.jpg', 768, 1024, 85, 'image/jpeg', '', '0', 83),
(252, '0bff7374079e26d3fc2ed440c6c879cb.jpg', 480, 640, 43, 'image/jpeg', '', '0', 83),
(253, '9068fbb7ccc583e9e8306c73a291ec78.jpg', 768, 1024, 84, 'image/jpeg', '', '0', 83),
(254, '6e0611296e1b17ef73bd1fdd7135dddb.JPG', 1080, 1920, 917, 'image/jpeg', '', '0', 84),
(255, '40b51ef6320cadc530bf810dcc1fbb58.JPG', 960, 1280, 575, 'image/jpeg', '', '0', 84),
(256, 'a0428271e7297cbc816a75509f0e9770.jpg', 204, 300, 76, 'image/jpeg', '', '0', 84),
(257, '4ee52434b241cf8c460ea4b1650d17eb.JPG', 469, 699, 170, 'image/jpeg', '', '0', 89),
(258, 'ed43c212c12127bfc4d36de2851a47dc.jpg', 1458, 970, 408, 'image/jpeg', '', '0', 89),
(259, '840abb8a4e8e5258dcb20805dbdf3a77.jpg', 576, 768, 108, 'image/jpeg', '', '0', 89),
(260, '292078b08d94460d1de3710d5b1480c3.jpg', 600, 800, 106, 'image/jpeg', '', '0', 89),
(261, '9b641a63a07d4f305d602264503997b2.jpg', 480, 640, 35, 'image/jpeg', '', '0', 88),
(262, '463cba1a27b642c6bdacaaaaa25a9363.JPG', 425, 567, 136, 'image/jpeg', '', '0', 88),
(263, '21794ad1523b036cd408fb48f3f98b3a.jpg', 303, 405, 10, 'image/jpeg', '', '0', 88),
(264, '8233edf1b572b6d1c9d2c879919f7eac.JPG', 425, 567, 124, 'image/jpeg', '', '0', 88),
(265, 'e34cf2e4e8ccdaedc4966b0507c9e418.JPG', 425, 567, 149, 'image/jpeg', '', '0', 88),
(266, '0040fb283c960214cd7c72f0edde081d.jpg', 600, 656, 181, 'image/jpeg', '', '0', 89),
(267, '691207abd7bc4278633f2ef81d9b7f91.jpg', 768, 1024, 276, 'image/jpeg', '', '0', 89),
(268, '72683ac146d34bc4805a65021e2517c0.jpg', 421, 640, 39, 'image/jpeg', '', '0', 88),
(269, 'ce18b1252843ced156d553432bc6f607.jpg', 305, 595, 85, 'image/jpeg', '', '0', 88),
(270, '7af4ec10e5e6465689d9ccb229ff729b.jpg', 302, 678, 31, 'image/jpeg', '', '0', 88),
(271, 'f1ad0e257492a373737800d991e0df1f.jpg', 302, 430, 27, 'image/jpeg', '', '0', 88),
(272, 'be9f1c0fbbf831ffb16583e1bc329f51.jpg', 301, 400, 21, 'image/jpeg', '', '0', 88),
(273, 'ba792fbbd2a61fe433b6c924805e6fee.jpg', 600, 800, 117, 'image/jpeg', '', '0', 89),
(274, '119ad6b94f0f0fd358e1423be5fe93c2.jpg', 480, 640, 156, 'image/jpeg', '', '0', 89),
(275, '314bb74d7e04de835ccd5a57cd4af894.jpg', 768, 1024, 336, 'image/jpeg', '', '0', 89),
(276, '29bb9df8519b9fc24161c6e46b825347.JPG', 768, 1009, 239, 'image/jpeg', '', '0', 89),
(277, 'a9677c783f7099ab4e0100572878d0f4.jpg', 432, 563, 54, 'image/jpeg', '', '0', 91),
(278, '1ed8d4d5573f259dc164510dbea39030.jpg', 436, 573, 38, 'image/jpeg', '', '0', 91),
(279, 'b2bd2aa2e4285d3d1696360f273e5cd7.jpg', 600, 800, 472, 'image/jpeg', '', '0', 94),
(280, '6cd1c4296750a4b6729908e3cb6d7606.jpg', 600, 800, 458, 'image/jpeg', '', '0', 94),
(281, 'fa4acbb74b1bd5047cf62a3a06077094.jpg', 480, 640, 62, 'image/jpeg', '', '0', 94),
(282, '88792c6ae19c2b0e5688e0f6f3ccb343.jpg', 233, 574, 154, 'image/jpeg', '', '0', 94),
(283, '8a83929d112bff3632bfbdfcaa5cd8c8.jpg', 600, 800, 438, 'image/jpeg', '', '0', 94),
(284, '8f69bc5be242a15d0df9b3a24f7baa0c.jpg', 466, 700, 47, 'image/jpeg', '', '0', 96),
(285, '6efdfc1657809b5f1f12e6b06691cca7.jpg', 469, 700, 47, 'image/jpeg', '', '0', 96),
(286, '73c7390846c2257566001118a139ff2c.jpg', 803, 1200, 580, 'image/jpeg', '', '0', 96),
(287, 'fd9d0da1cab9cdf57d216ab4227ecc40.jpg', 225, 336, 56, 'image/jpeg', '', '0', 96),
(288, '0cd6feb7ad2278391c7859e8eb713e03.jpg', 520, 700, 51, 'image/jpeg', '', '0', 96),
(289, 'fd33339e174480fef621070cff76aded.jpg', 469, 700, 58, 'image/jpeg', '', '0', 96),
(290, '463d4ff82c1cee45c11ccbb3ef9ebd27.jpg', 482, 700, 62, 'image/jpeg', '', '0', 96),
(291, 'dadc3a440c1f3279183276ccd09c14e3.jpg', 469, 700, 43, 'image/jpeg', '', '0', 96),
(292, '09ccd0b9a75b774fb92bf8e0b09009e3.jpg', 469, 700, 45, 'image/jpeg', '', '0', 96),
(293, 'ae947212a963823332478cab364b11d7.jpg', 469, 700, 37, 'image/jpeg', '', '0', 96),
(294, '715e2ff071bb2d895d2ae928d37ef1b3.jpg', 498, 700, 43, 'image/jpeg', '', '0', 96),
(295, '54efcee40f253527600ecd97b512a111.jpg', 469, 700, 42, 'image/jpeg', '', '0', 96),
(296, '65b37d5a1c04a5478631853bdbe7fade.jpg', 469, 700, 40, 'image/jpeg', '', '0', 96),
(297, 'b7cf05df59e454a1f3b1aa5f7cbddfd2.jpg', 473, 700, 35, 'image/jpeg', '', '0', 96),
(298, 'df5f2c772eb3ee6d0776778c6b28a599.jpg', 463, 700, 35, 'image/jpeg', '', '0', 96),
(299, '819b95d2d35ab075309d5f6ea41ae2a8.jpg', 495, 700, 39, 'image/jpeg', '', '0', 96),
(300, '2a83cd117c66d3d81862ccb64c20dd0e.jpg', 483, 700, 42, 'image/jpeg', '', '0', 96),
(301, '6893fc0d87927cbee7a6a226318565cf.jpg', 790, 700, 63, 'image/jpeg', '', '0', 96),
(302, '27d7bee7a71f7fad5e71e580b2cc8a22.jpg', 469, 700, 43, 'image/jpeg', '', '0', 96),
(303, '8c4dddb738c0e99f66fa1b1d8ea39fd2.jpg', 596, 399, 32, 'image/jpeg', '', '0', 96),
(304, '36ec576ce5741c03bb5ba28ef85a4f9a.jpg', 596, 399, 38, 'image/jpeg', '', '0', 96),
(305, '6c4fc95f4ffb40bdb8202f39408d2636.jpg', 803, 1200, 699, 'image/jpeg', '', '0', 96),
(306, 'f1c35e748825adf5cab48ec97c37be6b.jpg', 803, 1200, 714, 'image/jpeg', '', '0', 96),
(307, 'fad567b8e3f446816a577008347396ce.jpg', 803, 1200, 733, 'image/jpeg', '', '0', 96),
(308, 'b33c79d7e857e3cca8cb4f0951140986.jpg', 402, 600, 163, 'image/jpeg', '', '0', 96),
(309, 'be8d8f1d6500be53ba71ec0b60cd4712.jpg', 402, 600, 158, 'image/jpeg', '', '0', 96),
(310, 'ff82935a23e227cb2e162ca2f997073f.jpg', 375, 560, 60, 'image/jpeg', '', '0', 98),
(311, 'c4e7fce14121e7882cd5255e8ae52f93.jpg', 536, 800, 107, 'image/jpeg', '', '0', 98),
(312, '47b0764dd92f76499986ee252665e0bc.jpg', 536, 800, 148, 'image/jpeg', '', '0', 98),
(313, '45856c9a0e961f1c1e425d4f92bc0152.jpg', 551, 800, 152, 'image/jpeg', '', '0', 98),
(314, '030e28a57e14354275bbb18609388178.jpg', 555, 800, 93, 'image/jpeg', '', '0', 98),
(315, '13d71fd4d6f41925c7cd950416dafaf4.jpg', 509, 800, 111, 'image/jpeg', '', '0', 98),
(316, '1f62b8fcf895fba882d738b23b5f2200.jpg', 511, 800, 143, 'image/jpeg', '', '0', 98),
(317, '31997eefb452fc772599962ead1ba29c.jpg', 536, 800, 81, 'image/jpeg', '', '0', 98),
(318, '8b807e272d79f623919d2c1ab536c966.jpg', 525, 800, 105, 'image/jpeg', '', '0', 98),
(319, 'b1f037067533af7106bdcf5b1f3a52b7.jpg', 523, 800, 108, 'image/jpeg', '', '0', 98),
(320, '5d16a2a6677874f35bd40b2ad55add35.jpg', 525, 800, 80, 'image/jpeg', '', '0', 98),
(321, '0643515c372718c7c2905d2518e86d94.jpg', 515, 800, 120, 'image/jpeg', '', '0', 98),
(322, '8f3ea8e567610a142ea43a3342ba03ad.jpg', 520, 800, 118, 'image/jpeg', '', '0', 98),
(323, '84349d21b68195363e9e6000c38be3d3.jpg', 527, 800, 80, 'image/jpeg', '', '0', 98),
(324, 'ab9f5722579e540c8e061ac6f107a755.jpg', 528, 800, 112, 'image/jpeg', '', '0', 98),
(325, 'a3c633602f6300a87f7acce608915d72.jpg', 514, 800, 80, 'image/jpeg', '', '0', 98),
(326, '336d8f67374da79017e24796496723a7.jpg', 537, 800, 80, 'image/jpeg', '', '0', 98),
(327, '24d77fb04ec3c4e6951c27e07ed24702.jpg', 543, 800, 56, 'image/jpeg', '', '0', 98),
(328, 'ee7fe64483426da37b95bdb3a9570a75.jpg', 536, 800, 51, 'image/jpeg', '', '0', 98),
(329, '62c2a74af79d660a1c7323ccef9ecf58.jpg', 536, 800, 85, 'image/jpeg', '', '0', 98),
(330, '570dfb580a4b2b30ca7fa6688a338e70.jpg', 536, 800, 82, 'image/jpeg', '', '0', 98),
(331, 'b12e88178e4cc89fc01357b4968a9d4a.jpg', 536, 800, 85, 'image/jpeg', '', '0', 98),
(332, '2a7b3eedfe1cbef12483110d8075ae63.jpg', 528, 800, 96, 'image/jpeg', '', '0', 98),
(333, '04da8c06601c2e83cab69960d9f9d2fe.jpg', 528, 800, 96, 'image/jpeg', '', '0', 98),
(334, '61204a9512fa323044c048016494ffe4.jpg', 547, 800, 166, 'image/jpeg', '', '0', 98),
(335, '5781ed2474d65bc65637bb513719973f.jpg', 534, 800, 93, 'image/jpeg', '', '0', 98),
(336, '961b347e6bcd94bf44d7012eccc2f988.jpg', 534, 800, 88, 'image/jpeg', '', '0', 98),
(337, '45334f90714b1457685592d75b153400.jpg', 503, 800, 81, 'image/jpeg', '', '0', 98),
(338, '3e42e82e7021f8514c88df13d5dbf53e.jpg', 520, 800, 79, 'image/jpeg', '', '0', 98),
(339, '808657d3c0b32ad17e87bb022e1c21b4.jpg', 536, 800, 95, 'image/jpeg', '', '0', 98),
(340, '0b28a82d87616c6558be43583418fe4c.jpg', 528, 800, 82, 'image/jpeg', '', '0', 98),
(341, 'a511f89c4d0c9980e2a136ccca5edc73.jpg', 536, 800, 78, 'image/jpeg', '', '0', 98),
(342, 'dac864a2af29392902395cd831a88558.jpg', 526, 800, 75, 'image/jpeg', '', '0', 98),
(343, '327cfb370f0725bd277f1e2439b685c9.jpg', 536, 800, 79, 'image/jpeg', '', '0', 98),
(344, '8650e09657348217aa4eb106eaa96612.jpg', 518, 800, 66, 'image/jpeg', '', '0', 98),
(345, 'e7bf3cc1cc2e86af204faf7df5e73dfd.jpg', 533, 800, 58, 'image/jpeg', '', '0', 98),
(346, '49824288a1438842683102b45f1cd5b6.jpg', 508, 800, 56, 'image/jpeg', '', '0', 98),
(347, 'acd4a839175b65ac7a20230f448df14b.jpg', 524, 800, 85, 'image/jpeg', '', '0', 98),
(348, '044b775ed8ac589dcac49d86d38507a6.jpg', 527, 800, 73, 'image/jpeg', '', '0', 98),
(349, '55b0816760bbc541b7849fbce6bc99b2.jpg', 517, 800, 57, 'image/jpeg', '', '0', 98),
(350, 'f925360c0b2f036b29a48afd56659412.jpg', 1197, 1795, 911, 'image/jpeg', '', '0', 101),
(351, 'f925360c0b2f036b29a48afd56659412.jpg', 1197, 1795, 911, 'image/jpeg', '', '0', 101),
(352, 'f925360c0b2f036b29a48afd56659412.jpg', 1197, 1795, 911, 'image/jpeg', '', '0', 101),
(353, '5badb8121394d278f4686f3761bd164c.jpg', 400, 660, 152, 'image/jpeg', '', '0', 102),
(354, 'ab0c844bccc96b6aa65f3b0aab1cb7af.jpg', 400, 660, 152, 'image/jpeg', '', '0', 102),
(355, 'bf358a93f2c057b48c158d8281158c5e.jpg', 400, 660, 152, 'image/jpeg', '', '0', 102),
(356, '804770e37df7b87ed3bf1893c8d08931.jpg', 400, 660, 152, 'image/jpeg', '', '0', 102),
(357, '50d91dbf5f5972393fc165d314674447.jpg', 400, 660, 152, 'image/jpeg', '', '0', 102),
(358, 'f0f9e5b362c1247d9abd554cd3ec6717.jpg', 3043, 2145, 432, 'image/jpeg', '', '0', 102),
(359, '31c67d2df72616ee0a35e6db9f4df3d4.jpg', 2910, 2044, 326, 'image/jpeg', '', '0', 102),
(360, 'c2e0888939d1551ea40cbfb9abc673f4.jpg', 1507, 1060, 357, 'image/jpeg', '', '0', 102),
(361, '04ecc60b647bfb82e370db9060c2bc4f.jpg', 400, 660, 51, 'image/jpeg', '', '0', 102),
(362, '0f8086936697855a5a8367fab683944f.jpg', 400, 660, 44, 'image/jpeg', '', '0', 102),
(363, 'e8832718b3fc239331220a32cd7d5784.jpg', 400, 660, 52, 'image/jpeg', '', '0', 102),
(364, '12a70397276cdda2a515fc4596c26cf9.jpg', 400, 600, 210, 'image/jpeg', '', '0', 102),
(365, '70720c0cfacbf65a7e24839ce7a4f501.jpg', 329, 600, 108, 'image/jpeg', '', '0', 102),
(366, '945893fb3050a2bc30363977cfbe0e9d.jpg', 399, 600, 65, 'image/jpeg', '', '0', 102),
(367, 'ae200412fa37215b2e5bf6a6d32fe85f.jpg', 399, 600, 161, 'image/jpeg', '', '0', 102),
(368, 'c1c11f84f13aa10c7b320cb9857bb787.jpg', 396, 600, 200, 'image/jpeg', '', '0', 102),
(369, '6177ce07f2bbd3ddbcba7d6ab0f6b26a.jpg', 439, 660, 71, 'image/jpeg', '', '0', 102),
(370, '583edcaa52370e2636b5f9043b825f09.JPG', 1200, 900, 309, 'image/jpeg', '', '0', 104),
(371, '6e4358780426a013edd7caf7a7630014.JPG', 1536, 2075, 755, 'image/jpeg', '', '0', 104),
(372, '6e4358780426a013edd7caf7a7630014.JPG', 1536, 2075, 755, 'image/jpeg', '', '0', 104),
(373, '306064127d818f04d95325c2eeb253ad.JPG', 1028, 900, 396, 'image/jpeg', '', '0', 104),
(374, '1a791735b460bfb41da935fe4f86ce7c.JPG', 2048, 1365, 650, 'image/jpeg', '', '0', 104),
(375, '36933177d87cca7a92ba8ee254063eae.jpg', 800, 1200, 256, 'image/jpeg', '', '0', 104),
(376, 'a8a182938d300d528bb4077ef14ef7a9.JPG', 800, 700, 300, 'image/jpeg', '', '0', 104),
(377, '68b68e356f5b8128071c63ea75a21c5a.JPG', 1728, 2592, 707, 'image/jpeg', '', '0', 104),
(378, 'aa68b22f6236fce88c53bcf6ad1e1558.JPG', 600, 800, 126, 'image/jpeg', '', '0', 104),
(379, '49d8201c554e841dae2a8dd10cc82d79.JPG', 600, 900, 132, 'image/jpeg', '', '0', 104),
(380, 'fed1d3ed3c05eafd08456ea71226ca0e.JPG', 700, 1200, 185, 'image/jpeg', '', '0', 104),
(381, 'b3dfcccbfa449c5b41bf5c8d77da6125.JPG', 800, 1200, 194, 'image/jpeg', '', '0', 104),
(382, '785a612b069dd8eddd66cbffe9e67f2f.JPG', 600, 900, 134, 'image/jpeg', '', '0', 104),
(383, '5a29ddc9d30cf06285f5f9a56e015112.JPG', 516, 800, 122, 'image/jpeg', '', '0', 104),
(384, '9971e72b9aa735a6c0b8988ab1fcb684.JPG', 600, 800, 152, 'image/jpeg', '', '0', 104),
(385, '9d197b26fa419540dd3a7873ddeeb71b.JPG', 600, 900, 129, 'image/jpeg', '', '0', 104),
(386, '7693ab09bb92052f7d0242aa1176848c.JPG', 640, 600, 140, 'image/jpeg', '', '0', 104),
(387, 'aeb51b640029d920d55bffd588609454.JPG', 532, 800, 150, 'image/jpeg', '', '0', 104),
(388, 'c6914274da5b2b34bacbd7e60df72117.JPG', 532, 800, 150, 'image/jpeg', '', '0', 104),
(389, '62351ef36c24e9ab6b6045f50589cd62.JPG', 1000, 1500, 294, 'image/jpeg', '', '0', 104),
(390, '2d3adad4d75c24250b5e450dd66704d2.JPG', 600, 900, 138, 'image/jpeg', '', '0', 104),
(391, '3918ba5f2e9e96df5ff14a1ceb458116.jpg', 833, 1500, 248, 'image/jpeg', '', '0', 104),
(392, '315820ef6f140b45ecfc69d5ea515cb1.JPG', 600, 800, 217, 'image/jpeg', '', '0', 104),
(393, '1f2584d0be8918ea99f94b0d059a0ba9.JPG', 592, 800, 201, 'image/jpeg', '', '0', 104),
(394, 'dbbc901dcf3f8940c2ac46bc07aa08ed.jpg', 425, 640, 97, 'image/jpeg', '', '0', 103),
(395, 'dbbc901dcf3f8940c2ac46bc07aa08ed.jpg', 425, 640, 97, 'image/jpeg', '', '0', 103),
(396, 'dd6b97f228928b0b0ad6a0ea27483b49.jpg', 2000, 3008, 675, 'image/jpeg', '', '0', 103),
(397, 'fcacedefaff04c07aacec6b346f6dfa5.jpg', 106, 160, 14, 'image/jpeg', '', '0', 103),
(398, '1494fd26c528efa95937b8319fb564f1.jpg', 399, 600, 412, 'image/jpeg', '', '0', 103),
(399, '1777b2ea65e6377b1a4e73713b63981c.jpg', 450, 600, 456, 'image/jpeg', '', '0', 103),
(400, 'f1eef2cbd20b85e6a4464645fea65f63.jpg', 400, 600, 297, 'image/jpeg', '', '0', 103),
(401, 'c76251544d506ef45e39b3f18166d164.jpg', 533, 400, 239, 'image/jpeg', '', '0', 103),
(402, 'c18ca0f2df410d06a352eb285a4ddd13.jpg', 399, 600, 95, 'image/jpeg', '', '0', 103),
(403, 'Desert.jpg', 0, 0, 845941, 'jpg', '', '0', 28);

-- --------------------------------------------------------

--
-- Table structure for table `trv_categories`
--

CREATE TABLE `trv_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` text,
  `category_image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `show_in_search_panel` set('0','1') NOT NULL DEFAULT '0',
  `language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `trv_categories`
--

INSERT INTO `trv_categories` (`category_id`, `category_name`, `category_description`, `category_image`, `parent_id`, `show_in_search_panel`, `language_id`) VALUES
(2, 'Cooperativa', 'Cooperativa<br>', NULL, 0, '0', 2),
(3, 'Categoria esempio', '', NULL, 0, '0', 2),
(4, 'Certificazione ISO 9001:2008', 'Certificazione ISO 9001:2008<br>', NULL, 0, '0', 1),
(5, 'Cooperativa', 'Cooperativa<br>', NULL, 0, '0', 1),
(6, 'Categoria esempio', '', NULL, 0, '0', 1),
(7, 'Certificazione ISO 9001:2008', 'Certificazione ISO 9001:2008<br>', NULL, 0, '0', 3),
(8, 'Cooperativa', 'Cooperativa<br>', NULL, 0, '0', 3),
(9, 'Categoria esempio', '', NULL, 0, '0', 3),
(10, 'Test Category Germany', 'Test category Germany description<br>', NULL, 0, '0', 1),
(11, 'Another Test Category Germany', 'Another Test Category Germany description Another Test Category Germany description Another Test Category Germany description Another Test Category Germany description Another Test Category Germany description Another Test Category Germany description Another Test Category Germany description ', NULL, 0, '0', 1),
(12, 'Another Test Category Germany 2', 'Another Test Category Germany 2 description Another Test Category Germany 2 description <br>Another Test Category Germany 2 description <br>Another Test Category Germany 2 description <br>Another Test Category Germany 2 description <br>Another Test Category Germany 2 description <br><br><br><br><br><br><br><br>', NULL, 0, '0', 1),
(13, 'Categoria English', '', NULL, 0, '0', 5),
(14, 'Test Category IT X', 'Test Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT X', NULL, 5, '0', 1),
(15, 'Test Category IT X', 'Test Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT XTest Category IT X', 'ddf6d59e4a1aacd66f741fcec9aeea3e.jpg', 5, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trv_client_documents`
--

CREATE TABLE `trv_client_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) DEFAULT NULL,
  `document_category_id` int(11) DEFAULT NULL,
  `document_file_name` varchar(255) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_privilege` set('0','1','2') DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `trv_documents`
--

CREATE TABLE `trv_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) DEFAULT NULL,
  `document_category_id` int(11) DEFAULT NULL,
  `document_file_name` varchar(255) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_privilege` set('0','1','2') DEFAULT '0',
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `trv_documents`
--

INSERT INTO `trv_documents` (`document_id`, `document_name`, `document_category_id`, `document_file_name`, `added_on`, `user_privilege`) VALUES
(2, 'Striscione Stadio', 1, '9ae939acb6fa355c5e540459f30eefee.pdf', '0000-00-00 00:00:00', '0'),
(5, 'Documento giulio', 3, '9c0edb975ef53478d1b3517a3b475293.pdf', '2013-08-28 20:15:18', '0'),
(6, 'Test Documents', 10, NULL, '2014-01-09 13:58:21', '0'),
(7, 'Cover Photo', 11, NULL, '2014-01-09 13:58:41', '0'),
(8, 'Cover Photo', 11, 'cde8d3a69e5ba2ed967ed181aa317903.pdf', '2014-01-09 13:59:05', '0'),
(9, 'Test Documents', 5, 'd0c49368103ecedbe7aa92bb9ddc5f29.pdf', '2014-01-09 14:14:43', '0'),
(10, 'Test Documents', 5, '2c3ce23d1e52083201e83b38ba5fe649.pdf', '2014-01-09 14:42:36', '0'),
(11, 'Test Documents', 6, '82a6c827809bb10b9969adff96c714d9.pdf', '2014-01-09 14:45:41', '0');

-- --------------------------------------------------------

--
-- Table structure for table `trv_documents_download`
--

CREATE TABLE `trv_documents_download` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) DEFAULT NULL,
  `document_category_id` int(11) DEFAULT NULL,
  `document_file_name` varchar(255) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_privilege` set('0','1','2') DEFAULT '0',
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trv_documents_download`
--

INSERT INTO `trv_documents_download` (`document_id`, `document_name`, `document_category_id`, `document_file_name`, `added_on`, `user_privilege`) VALUES
(2, 'Cover Photo', 14, '295abfba0e8769dcecbcbf2f3f633163.pdf', '2014-01-09 14:54:03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `trv_languages`
--

CREATE TABLE `trv_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) DEFAULT NULL,
  `lang_short_code` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `is_default` set('0','1') DEFAULT '0',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_languages`
--

INSERT INTO `trv_languages` (`language_id`, `language_name`, `lang_short_code`, `flag`, `is_default`) VALUES
(1, 'Italian', 'it', 'it', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trv_menus`
--

CREATE TABLE `trv_menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trv_menus`
--

INSERT INTO `trv_menus` (`menu_id`, `menu_name`, `status`) VALUES
(2, 'Top Header Menu  Edit', '1'),
(3, 'Top Menu befor logo edit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trv_menu_pages`
--

CREATE TABLE `trv_menu_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `trv_menu_pages`
--

INSERT INTO `trv_menu_pages` (`id`, `menu_id`, `page_id`) VALUES
(1, 2, 26),
(2, 3, 26),
(4, 2, 27),
(5, 3, 27);

-- --------------------------------------------------------

--
-- Table structure for table `trv_news`
--

CREATE TABLE `trv_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_news`
--

INSERT INTO `trv_news` (`news_id`, `page_id`) VALUES
(1, 139);

-- --------------------------------------------------------

--
-- Table structure for table `trv_news_in_page`
--

CREATE TABLE `trv_news_in_page` (
  `news_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trv_packagings`
--

CREATE TABLE `trv_packagings` (
  `packaging_id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_title` varchar(255) NOT NULL,
  `pack_code` varchar(255) NOT NULL,
  `pack_description` text,
  `language_id` int(11) NOT NULL,
  `m_ref_packaging_id` int(11) NOT NULL,
  PRIMARY KEY (`packaging_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_packagings`
--

INSERT INTO `trv_packagings` (`packaging_id`, `pack_title`, `pack_code`, `pack_description`, `language_id`, `m_ref_packaging_id`) VALUES
(1, 'Weight', 'W-1', 'Weight of product', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trv_pages`
--

CREATE TABLE `trv_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_template` varchar(255) DEFAULT NULL,
  `mother_page_id` int(11) DEFAULT '0',
  `is_homepage` set('0','1') DEFAULT '0',
  `page_title` varchar(255) DEFAULT NULL,
  `page_seotitle` varchar(255) DEFAULT NULL,
  `page_seokeywords` longtext,
  `page_seodescription` longtext,
  `page_url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description_1` longtext,
  `photo_1` varchar(255) DEFAULT NULL,
  `description_2` longtext,
  `photo_2` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `page_order` float DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `m_ref_page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `trv_pages`
--

INSERT INTO `trv_pages` (`page_id`, `page_template`, `mother_page_id`, `is_homepage`, `page_title`, `page_seotitle`, `page_seokeywords`, `page_seodescription`, `page_url`, `photo`, `description_1`, `photo_1`, `description_2`, `photo_2`, `date_created`, `status`, `author`, `page_order`, `language_id`, `m_ref_page_id`) VALUES
(1, 'pages_default_product_list.php', 0, '0', 'Linea Ospedaliera', '', '', '', 'linea-ospedaliera', '', 'Description 1 [Italian]', '', 'Description 2 [Italian]', '', '2013-10-09 16:10:26', 'published', 'admin', 2, 1, 1),
(6, 'pages_default_homepage.php', 0, '0', 'Home', '', '', '', 'home', '', '', '', '', '', '2013-10-11 07:10:02', 'published', 'admin', 1, 1, 5),
(11, 'pages_default_homepage.php', 0, '1', 'Home', '', '', '', 'home', '', 'dadasasd', '', 'sdadsa', '', '2013-11-07 09:11:03', 'published', 'admin', 1, 5, 5),
(12, 'pages_default_product_list.php', 0, '0', 'Irrigatori Meccanici', '', '', '', 'irrigatori-meccanici', '', '', '', '', '', '2013-11-07 10:11:27', 'published', 'admin', 3, 1, 12),
(13, 'pages_default_product_list.php', 12, '0', 'ACTEON GROUP-SATELEC', '', '', '', 'acteon-group-satelec', '', '', '', '', '', '2013-11-07 10:11:38', 'published', 'admin', 0, 1, 13),
(15, 'pages_default.php', 6, '0', 'Chi siamo', '', '', '', 'chi-siamo', '', '', '', '', '', '2013-11-07 10:11:08', 'published', 'admin', 1, 1, 15),
(16, 'pages_default_contatto.php', 6, '0', 'Contatto', '', '', '', 'contatto', '', '', '', '', '', '2013-11-07 11:11:10', 'published', 'admin', 2, 1, 16),
(17, 'pages_default_product_list.php', 0, '0', 'Hospital Collection', '', '', '', 'hospital-collection', '', '', '', '', '', '2013-11-07 11:11:26', 'published', 'admin', 2, 5, 17),
(18, 'pages_default_product_list.php', 0, '0', 'Irrigatori Meccanici', '', '', '', 'irrigatori-meccanici', '', '', '', '', '', '2013-11-07 11:11:31', 'published', 'admin', 3, 5, 18),
(19, 'pages_default.php', 11, '0', 'about us', '', '', '', 'about-us', '', '', '', '', '', '2013-11-08 07:11:08', 'published', 'admin', NULL, 5, 15),
(20, 'pages_default.php', 0, '1', 'hello page', '', '', '', 'hello-page', '', 'dsadsddsa', '', '', '', '2013-11-10 14:11:03', 'published', 'admin', NULL, 1, 20),
(21, 'pages_default.php', 0, '0', 'Test page by me', '', '', '', 'test-page-by-me', '', '', '', '', '', '2013-11-10 14:11:37', 'published', 'admin', NULL, 1, 21),
(25, 'pages_default.php', 0, '0', 'public', '', '', '', 'public', '', '', '', '', '', '2013-11-11 05:11:54', 'published', 'admin', NULL, 1, 25),
(26, 'pages_default.php', 0, '0', 'Test Page for menu', '', '', '', 'test-page-for-menu', '', '', '', '', '', '2013-11-13 12:11:45', 'published', 'admin', NULL, 1, 26),
(27, 'pages_default.php', 0, '0', 'another test page for menu test', '', '', '', 'another-test-page-for-menu-test', '', '', '', '', '', '2013-11-13 12:11:48', 'published', 'admin', NULL, 1, 27),
(100, 'pages_default.php', 0, '0', 'Mother Page - Level 1', '', '', '', 'mother-page-level-1', '', '', '', '', '', '2013-11-28 23:11:19', 'published', 'admin', NULL, 1, 100),
(101, 'pages_default.php', 100, '0', 'Child Page - Level 2', '', '', '', 'child-page-level-2', '', '', '', '', '', '2013-11-28 23:11:52', 'published', 'admin', NULL, 1, 101),
(102, 'pages_default.php', 101, '0', 'Child Page - Level 3', '', '', '', 'child-page-level-3', '', '', '', '', '', '2013-11-28 23:11:49', 'published', 'admin', NULL, 1, 102),
(103, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 103),
(104, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 103),
(105, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 103),
(106, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 106),
(107, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 106),
(108, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 106),
(109, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 109),
(110, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 109),
(111, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 109),
(112, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 112),
(113, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 112),
(114, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 112),
(115, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 115),
(116, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 115),
(117, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 115),
(118, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 118),
(119, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 118),
(120, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 118),
(121, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 121),
(122, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 121),
(123, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 121),
(124, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 124),
(125, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 124),
(126, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 124),
(127, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 127),
(128, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 127),
(129, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 127),
(130, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 130),
(131, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 130),
(132, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 130),
(133, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 133),
(134, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 133),
(135, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 133),
(136, 'products.php', -1, '0', 'Test product italian', '', '', '', 'test-product-italian', 'x.pjg', 'test product italian description', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 1, 136),
(137, 'products.php', -1, '0', 'test product english', '', '', '', 'test-product-english', 'y.gif', 'test description english', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 5, 136),
(138, 'products.php', -1, '0', 'test product french', '', '', '', 'test-product-french', 'z.png', 'test product description french', '', '', '', '2013-11-29 13:11:48', 'published', 'admin', NULL, 6, 136),
(139, 'news.php', -2, '0', 'test news', '', '', '', 'test-news', '', '', '', '', '', '2013-12-10 03:12:09', 'published', 'admin', NULL, 1, 139);

-- --------------------------------------------------------

--
-- Table structure for table `trv_page_extended_fields`
--

CREATE TABLE `trv_page_extended_fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_type` varchar(255) DEFAULT NULL,
  `field_value` longtext,
  `is_temp` set('0','1') DEFAULT '0',
  `ref_page_id` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trv_page_files`
--

CREATE TABLE `trv_page_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trv_page_files`
--

INSERT INTO `trv_page_files` (`id`, `file_name`, `description`, `page_id`) VALUES
(1, '13860737695tpea', 'Test description file', 20),
(2, 'Recomendation Letter - 2nd.pdf', 'Test file', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trv_page_slideshows`
--

CREATE TABLE `trv_page_slideshows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trv_page_slideshows`
--

INSERT INTO `trv_page_slideshows` (`id`, `image_name`, `description`, `page_id`) VALUES
(1, '13860735397onj5.jpeg', 'Test description 1', 20),
(2, '1386073539y89ma.jpeg', 'Test description 2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trv_page_videos`
--

CREATE TABLE `trv_page_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_page_videos`
--

INSERT INTO `trv_page_videos` (`id`, `video_name`, `description`, `page_id`) VALUES
(1, 'abcdefghijklmnopqrst.mp4', 'Test description video', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trv_products`
--

CREATE TABLE `trv_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `keyword` text,
  `product_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `trv_products`
--

INSERT INTO `trv_products` (`product_id`, `page_id`, `productID`, `categoryID`, `keyword`, `product_type`) VALUES
(1, 103, 1, 1, 'search keyword italian', 1),
(2, 104, 1, 1, 'search keywords english', 1),
(3, 105, 1, 1, 'search keyword french', 1),
(4, 106, 2, 2, 'search keyword italian', 2),
(5, 107, 2, 2, 'search keywords english', 2),
(6, 108, 2, 2, 'search keyword french', 2),
(7, 109, 3, 3, 'search keyword italian', 3),
(8, 110, 3, 3, 'search keywords english', 3),
(9, 111, 3, 3, 'search keyword french', 3),
(10, 112, 4, 4, 'search keyword italian', 1),
(11, 113, 4, 4, 'search keywords english', 1),
(12, 114, 4, 4, 'search keyword french', 1),
(13, 115, 5, 5, 'search keyword italian', 2),
(14, 116, 5, 5, 'search keywords english', 2),
(15, 117, 5, 5, 'search keyword french', 2),
(16, 118, 6, 6, 'search keyword italian', 3),
(17, 119, 6, 6, 'search keywords english', 3),
(18, 120, 6, 6, 'search keyword french', 3),
(19, 121, 7, 7, 'search keyword italian', 1),
(20, 122, 7, 7, 'search keywords english', 1),
(21, 123, 7, 7, 'search keyword french', 1),
(22, 124, 8, 8, 'search keyword italian', 2),
(23, 125, 8, 8, 'search keywords english', 2),
(24, 126, 8, 8, 'search keyword french', 2),
(25, 127, 9, 9, 'search keyword italian', 3),
(26, 128, 9, 9, 'search keywords english', 3),
(27, 129, 9, 9, 'search keyword french', 3),
(28, 130, 10, 10, 'search keyword italian', 1),
(29, 131, 10, 10, 'search keywords english', 1),
(30, 132, 10, 10, 'search keyword french', 1),
(31, 133, 11, 11, 'search keyword italian', 2),
(32, 134, 11, 11, 'search keywords english', 2),
(33, 135, 11, 11, 'search keyword french', 2),
(34, 136, 12, 12, 'search keyword italian', 3),
(35, 137, 12, 12, 'search keywords english', 3),
(36, 138, 12, 12, 'search keyword french', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trv_products_in_page`
--

CREATE TABLE `trv_products_in_page` (
  `product_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trv_product_packages`
--

CREATE TABLE `trv_product_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `packaging_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `package_code_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trv_product_packages`
--

INSERT INTO `trv_product_packages` (`id`, `product_id`, `packaging_id`, `language_id`, `package_code_value`) VALUES
(1, 1, 1, 1, '100gM'),
(2, 1, 1, 1, '200gM'),
(3, 1, 1, 1, '300gM');

-- --------------------------------------------------------

--
-- Table structure for table `trv_userprofiles`
--

CREATE TABLE `trv_userprofiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `address_line` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT '80',
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `localtion` varchar(255) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `favourite_team` text,
  `biodata` longtext,
  `is_complete` set('0','1') NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trv_userprofiles`
--

INSERT INTO `trv_userprofiles` (`profile_id`, `gender`, `first_name`, `last_name`, `full_name`, `address_line`, `zipcode`, `city`, `country`, `phone`, `fax`, `localtion`, `website`, `favourite_team`, `biodata`, `is_complete`, `user_id`) VALUES
(2, NULL, 'Matthias', 'Gutsch', 'Matthias Gutsch', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2),
(3, NULL, 'Ashish Kumar', 'Basak', 'Ashish Kumar Basak', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 3),
(4, NULL, 'Ashish Kumar', 'Basak', 'Ashish Kumar Basak', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 4),
(5, NULL, 'Ashish Kumar', 'Basak', 'Ashish Kumar Basak', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 5),
(6, NULL, 'Tarapodo', 'Basak', 'Tarapodo Basak', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 6),
(7, NULL, 'Tarapodo', 'Basak', 'Tarapodo Basak', NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, '0', 7);

-- --------------------------------------------------------

--
-- Table structure for table `trv_users`
--

CREATE TABLE `trv_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `available_credit` int(11) NOT NULL DEFAULT '0',
  `request_credit` int(11) NOT NULL DEFAULT '0',
  `account_expiry_date` date DEFAULT NULL,
  `is_email_verified` set('0','1') NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  `org_password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `u_total_follower` int(11) NOT NULL DEFAULT '0',
  `u_total_following` int(11) NOT NULL DEFAULT '0',
  `u_total_match` int(11) NOT NULL DEFAULT '0',
  `u_total_post` int(11) NOT NULL DEFAULT '0',
  `u_created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_on_ip` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_first_login` set('0','1') NOT NULL DEFAULT '1',
  `last_login_ip` varchar(255) NOT NULL,
  `user_type` set('0','1','2','3') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(255) NOT NULL,
  `password_request_code` varchar(255) NOT NULL,
  `user_auto_signin` set('0','1') NOT NULL,
  `is_admin` set('0','1') NOT NULL DEFAULT '0',
  `is_active` set('0','1','2') NOT NULL DEFAULT '',
  `upload_permission` set('0','1') DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trv_users`
--

INSERT INTO `trv_users` (`user_id`, `username`, `email`, `available_credit`, `request_credit`, `account_expiry_date`, `is_email_verified`, `password`, `org_password`, `salt`, `display_name`, `avatar`, `u_total_follower`, `u_total_following`, `u_total_match`, `u_total_post`, `u_created_on`, `created_on_ip`, `last_updated`, `last_login`, `is_first_login`, `last_login_ip`, `user_type`, `user_activation_key`, `password_request_code`, `user_auto_signin`, `is_admin`, `is_active`, `upload_permission`) VALUES
(2, 'info@studiomodo.it', 'info@studiomodo.it', 0, 0, NULL, '0', '4e1032dfe595c3e31d928033dda245d8574e67ad', '@shish123', 'f981d7a6c932f6fd2e749043776e444c148726d0', 'Matthias Gutsch', '', 0, 0, 0, 0, '2013-08-25 20:08:41', '180.149.31.252', '2014-01-09 15:01:50', '2013-08-26 05:59:41', '0', '58.97.229.172', '1', 'f5cfb90dd07dde0112db206b344df9b0', '7bbc42172a34e845584d1dd4429cf139', '0', '0', '1', '1'),
(3, 'ashish021@gmail.com', 'ashish021@gmail.com', 0, 0, NULL, '0', 'e646cde6e052ff7293007fd598cb806071dd5523', '@shish123', '7d24f000f8420be650d117c65e52ad6bdf290b82', 'Ashish Kumar Basak', '', 0, 0, 0, 0, '2013-09-26 18:09:54', '180.149.31.253', '2013-09-26 18:09:54', '2013-09-26 22:31:54', '0', '127.0.0.1', '1', '66a56d1d4bb7c62fab5e20bee9f25b7c', '508eee39dc4ce6f33d42dbb14ea0c974', '0', '0', '1', '1'),
(5, 'ashish.kumar.basak@gmail.com', 'ashish.kumar.basak@gmail.com', 0, 0, NULL, '0', '3c21673bef78b1ce3971e01d9086e16de6448708', '@shish123', '2f618f380ac238bb2ecc810bb7dfdc609fd39174', 'Ashish Kumar Basak', '', 0, 0, 0, 0, '2014-01-09 14:01:27', '127.0.0.1', '2014-01-09 14:01:27', '2014-01-09 13:57:27', '1', '127.0.0.1', '1', '754e33f9632762cb214fae3ee81fbfb8', 'e85911e23b44686bd896ee5f588c30e7', '0', '0', '1', '1'),
(7, 'tarapodo.basak@tangail-sharee.com', 'tarapodo.basak@tangail-sharee.com', 0, 0, NULL, '0', '5910452c42aec2044fd8719942b55336350c593c', '@shish123', 'c73cea4972d0b8cd4f5f6e9b765fabe9b8e165a9', 'Tarapodo Basak', '', 0, 0, 0, 0, '2014-01-09 15:01:26', '127.0.0.1', '2014-01-09 15:01:26', '2014-01-09 14:01:26', '1', '127.0.0.1', '2', '14f98bd85b96afb10857f534acbe9900', 'f8315bc543b41ed4153208b8b8d67752', '0', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trv_usersettings`
--

CREATE TABLE `trv_usersettings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `timezone` varchar(255) NOT NULL DEFAULT 'UP1',
  `twitter_connect` set('0','1') NOT NULL DEFAULT '0',
  `facebook_connect` set('0','1') NOT NULL DEFAULT '0',
  `send_newsletter` set('0','1') NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `trv_usersettings`
--

INSERT INTO `trv_usersettings` (`setting_id`, `language`, `timezone`, `twitter_connect`, `facebook_connect`, `send_newsletter`, `user_id`) VALUES
(2, 'en', 'UP1', '0', '0', '1', 2),
(3, 'en', 'UP1', '0', '0', '1', 3),
(4, 'en', 'UP1', '0', '0', '1', 5),
(5, 'en', 'UP1', '0', '0', '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `trv_usershotel_profiles`
--

CREATE TABLE `trv_usershotel_profiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_type` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `hotel_rating` int(11) NOT NULL DEFAULT '0',
  `hotel_name` varchar(255) NOT NULL,
  `hotel_address` varchar(255) DEFAULT NULL,
  `hotel_zip` varchar(255) DEFAULT NULL,
  `hotel_town` varchar(255) DEFAULT NULL,
  `hotel_city` int(11) DEFAULT NULL,
  `hotel_state` int(11) DEFAULT NULL,
  `hotel_country` int(11) NOT NULL DEFAULT '80',
  `hotel_phone` varchar(255) DEFAULT NULL,
  `hotel_fax` varchar(255) NOT NULL,
  `hotel_website` varchar(255) NOT NULL,
  `hotel_description_en` longtext,
  `hotel_description_it` longtext,
  `hotel_description_fr` longtext,
  `hotel_description_de` longtext,
  `hotel_description_es` longtext,
  `hotel_activities_en` longtext,
  `hotel_activities_it` longtext,
  `hotel_activities_fr` longtext,
  `hotel_activities_de` longtext,
  `hotel_activities_es` longtext,
  `total_profile_view` int(11) NOT NULL DEFAULT '0',
  `total_profile_like` int(11) NOT NULL DEFAULT '0',
  `total_profile_follower` int(11) NOT NULL DEFAULT '0',
  `total_profile_comment` int(11) NOT NULL DEFAULT '0',
  `map_address` varchar(255) DEFAULT NULL,
  `map_latitude` float NOT NULL DEFAULT '0',
  `map_longitude` float NOT NULL DEFAULT '0',
  `map_zoom_level` int(11) NOT NULL DEFAULT '7',
  `important_information_en` longtext,
  `important_information_it` longtext,
  `important_information_fr` longtext,
  `important_information_de` longtext,
  `important_information_es` longtext,
  `nearest_airport_1` varchar(255) DEFAULT NULL,
  `nearest_airport_2` varchar(255) DEFAULT NULL,
  `nearest_airport_3` varchar(255) DEFAULT NULL,
  `nearest_train_station` varchar(255) DEFAULT NULL,
  `nearest_bus_station` varchar(255) DEFAULT NULL,
  `nearest_beach` varchar(255) DEFAULT NULL,
  `nearest_restaurant` varchar(255) DEFAULT NULL,
  `accept_privacy` set('0','1') NOT NULL DEFAULT '0',
  `total_comments` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`),
  FULLTEXT KEY `hotel_name` (`hotel_name`,`hotel_description_en`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trv_usershotel_profiles`
--

INSERT INTO `trv_usershotel_profiles` (`profile_id`, `hotel_type`, `category`, `sub_category`, `hotel_rating`, `hotel_name`, `hotel_address`, `hotel_zip`, `hotel_town`, `hotel_city`, `hotel_state`, `hotel_country`, `hotel_phone`, `hotel_fax`, `hotel_website`, `hotel_description_en`, `hotel_description_it`, `hotel_description_fr`, `hotel_description_de`, `hotel_description_es`, `hotel_activities_en`, `hotel_activities_it`, `hotel_activities_fr`, `hotel_activities_de`, `hotel_activities_es`, `total_profile_view`, `total_profile_like`, `total_profile_follower`, `total_profile_comment`, `map_address`, `map_latitude`, `map_longitude`, `map_zoom_level`, `important_information_en`, `important_information_it`, `important_information_fr`, `important_information_de`, `important_information_es`, `nearest_airport_1`, `nearest_airport_2`, `nearest_airport_3`, `nearest_train_station`, `nearest_bus_station`, `nearest_beach`, `nearest_restaurant`, `accept_privacy`, `total_comments`, `user_id`) VALUES
(2, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 2),
(3, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 3),
(4, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 4),
(5, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 5),
(6, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 6),
(7, 1, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, 80, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `trv_userspayment_profiles`
--

CREATE TABLE `trv_userspayment_profiles` (
  `payment_setttings_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` int(11) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `paypal_payment_type` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `swift_code` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `benificiary_name` varchar(255) NOT NULL,
  `IBAN_number` varchar(255) NOT NULL,
  `bank_country` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_setttings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trv_userspayment_profiles`
--

INSERT INTO `trv_userspayment_profiles` (`payment_setttings_id`, `payment_method`, `paypal_email`, `paypal_payment_type`, `bank_name`, `swift_code`, `bank_code`, `benificiary_name`, `IBAN_number`, `bank_country`, `user_id`) VALUES
(2, 0, '', '', '', '', '', '', '', '', 2),
(3, 0, '', '', '', '', '', '', '', '', 3),
(4, 0, '', '', '', '', '', '', '', '', 4),
(5, 0, '', '', '', '', '', '', '', '', 5),
(6, 0, '', '', '', '', '', '', '', '', 6),
(7, 0, '', '', '', '', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `trv_videos`
--

CREATE TABLE `trv_videos` (
  `trv_video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title_it` text,
  `video_description_it` longtext,
  `video_title_br` text,
  `video_description_br` longtext,
  `video_title_fr` text,
  `video_description_fr` longtext,
  `video_title_en` text,
  `video_description_en` longtext,
  `video_image_name_it` varchar(255) DEFAULT NULL,
  `video_file_name_it` varchar(255) DEFAULT NULL,
  `video_image_name_br` varchar(255) DEFAULT NULL,
  `video_file_name_br` varchar(255) DEFAULT NULL,
  `video_image_name_fr` varchar(255) DEFAULT NULL,
  `video_file_name_fr` varchar(255) DEFAULT NULL,
  `video_image_name_en` varchar(255) DEFAULT NULL,
  `video_file_name_en` varchar(255) DEFAULT NULL,
  `attachment_it` varchar(255) DEFAULT NULL,
  `attachment_en` varchar(255) DEFAULT NULL,
  `attachment_br` varchar(255) DEFAULT NULL,
  `attachment_fr` varchar(255) DEFAULT NULL,
  `video_category_id` int(11) NOT NULL,
  PRIMARY KEY (`trv_video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trv_videos`
--

INSERT INTO `trv_videos` (`trv_video_id`, `video_title_it`, `video_description_it`, `video_title_br`, `video_description_br`, `video_title_fr`, `video_description_fr`, `video_title_en`, `video_description_en`, `video_image_name_it`, `video_file_name_it`, `video_image_name_br`, `video_file_name_br`, `video_image_name_fr`, `video_file_name_fr`, `video_image_name_en`, `video_file_name_en`, `attachment_it`, `attachment_en`, `attachment_br`, `attachment_fr`, `video_category_id`) VALUES
(1, 'Test Video Title IT', 'Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;Test Video Description IT&nbsp;<br>', 'Test Video Description BR', 'Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;Test Video Description BR&nbsp;&nbsp;<br>', 'Test Video Description FR', 'Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;Test Video Description FR&nbsp;<br>', 'Test Video Description EN', 'Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;Test Video Description EN&nbsp;<br>', '', '137416745613700886371.mp4', '', '137416745613700886371 (3).mp4', '', '137416745613700886371 (2).mp4', '', '137416745613700886371 (1).mp4', '', '', '', '', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

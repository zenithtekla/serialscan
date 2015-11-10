/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serialscan`
--

-- --------------------------------------------------------
--
CREATE TABLE IF NOT EXISTS `mantis_user_table` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `realname` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `protected` tinyint(4) NOT NULL DEFAULT '0',
  `access_level` smallint(6) NOT NULL DEFAULT '10',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `lost_password_request_count` smallint(6) NOT NULL DEFAULT '0',
  `failed_login_count` smallint(6) NOT NULL DEFAULT '0',
  `cookie_string` varchar(64) NOT NULL DEFAULT '',
  `last_visit` int(10) unsigned NOT NULL DEFAULT '1',
  `date_created` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `seriscan_customer` (
  `customer_id` int(19) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;
--
CREATE TABLE IF NOT EXISTS `seriscan_assembly` (
  `assembly_id` int(19) NOT NULL AUTO_INCREMENT,
  `customer_id` int(19) NOT NULL,
  `assembly_number` varchar(20) NOT NULL,
  `revision` varchar(10) NOT NULL,
  PRIMARY KEY (`assembly_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `seriscan_format` (
  `format_id` int(19) NOT NULL AUTO_INCREMENT,
  `format` varchar(60) NOT NULL,
  `format_example` varchar(60) NOT NULL,
  PRIMARY KEY (`format_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `seriscan_serial` (
  `serial_id` int(19) NOT NULL AUTO_INCREMENT,
  `assembly_id` int(19) NOT NULL,
  `customer_id` int(19) NOT NULL,
  `sale_order_id` varchar(250) NOT NULL,
  `serial_number` varchar(250) NOT NULL,
  -- criteria:  serial_number, assembly_number, and  revision === unique for acceptance.
  --            serial_number matches format table.
  `user_id` int(19) NOT NULL,
  `time` TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

INSERT INTO `mantis_user_table` (`id`, `username`, `realname`, `email`, `password`, `enabled`, `protected`, `access_level`, `login_count`, `lost_password_request_count`, `failed_login_count`, `cookie_string`, `last_visit`, `date_created`) VALUES
(1, 'administrator', '', 'root@localhost', '7ec89e96618a09272531710ee958444e', 1, 0, 90, 60, 0, 0, '33993407d5712633a93ecce184bd9e1e573371eb655adf23a56ea027f36b24d6', 1445475530, 1438271596),
(2, 'hp', '', 'hp@gmail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 25, 4, 0, 0, '6191995c152f0c30ede124b1fba71a8e1d1517bdfbd53d9b263b1a148483e920', 1441128778, 1438274668),
(3, 'dummy', '', 'dummy@hp.com', '7ec89e96618a09272531710ee958444e', 1, 0, 55, 2, 0, 0, 'df99f90473bf34fa40f52f14994fc04b55ebc1d6aa7d25bd5234e6cbd592c823', 1442873609, 1438274750),
(4, 'dell', '', 'dell@hp.com', 'fdb23e7a33efb1efb3d001e45d74b816', 1, 0, 40, 0, 0, 4, '443f9631055de7f0a908d4d6eeb8e4d27aa8bac4fc3c2e0f4d1e5cd232437cb3', 1438274774, 1438274774),
(5, 'lenovo', '', 'lenovo@mail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 90, 49, 0, 0, 'bdc99ff6383e0c8168967b30aecc95d189d60c96a759632c4300c12efdbe164d', 1445899618, 1438274797),
(6, 'usher', '', 'usher@gmail.com', 'c76a3bfa8f267dd594aa853d4c5229c9', 1, 0, 25, 0, 0, 0, '8aba31fed484fc12457d02a3c2bc1e3f4a1660e8f8e62a9c494321c950184ddc', 1438965692, 1438965692),
(7, 'kosher', '', 'kosher@gmail.com', 'b4a1729cb54466eb8e6836f50d24cc68', 1, 0, 55, 0, 0, 0, 'ab01194edd9f82ca650a27dafcc9f6cffaed282d888a219a4f2a322dc70adcf1', 1438965714, 1438965714),
(8, 'labor', 'Lobar', 'laboris@gmail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 36, 4, 0, 0, '3685aca6df30bac0d9b68117395c60156dd548ac6144b464371470a5e9830410', 1442875392, 1440715968),
(9, 'pm', 'program_manager', 'pm@hp.com', '7ec89e96618a09272531710ee958444e', 1, 0, 48, 4, 0, 0, '5f552115c9486e306cadb0d41ccfe522c52d11a02da06c2a1ca11ee48b4ccc75', 1441212365, 1440716433),
(10, 'pmp', 'pm_protected', 'pmp@hp.com', '7ec89e96618a09272531710ee958444e', 1, 1, 48, 3, 0, 0, 'aaaf9bfe9ef042bb70f0f0b9917bfe7f7524e7f9ddb5a00c40eb5d26949fb238', 1441136956, 1440716467),
(11, 'new_user', 'New G', 'new_user@abc.com', '7ec89e96618a09272531710ee958444e', 1, 0, 48, 2, 0, 0, '92d3bc39994d3b0bb0460e19592063c45b076fd52a4f3c7c9635e1c1494c260a', 1443136572, 1442875433),
(12, 'asus', '', 'asus@abc.com', '0e44eb5295b9b2e4f69dd9ef39131d06', 1, 0, 0, 0, 0, 0, 'ece2bc8712a031ec27edea79561182d1b1dc6f7c06fd3078c070fa1fb7f9252e', 1443136364, 1443136364),
(13, 'acer', 'Acer Tech', 'acer@hotmail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 25, 2, 0, 0, 'ca515b6c7f989b9b06ca30b0dea0caea51d3499236b6bb351819d408b1c2a8b5', 1443136692, 1443136468),
(14, 'toshiba', '', 'toshiba@gmail.com', '3040d879149fd013447fc78fea9262be', 1, 0, 25, 0, 0, 0, 'a04f75e3320665495ae3503b18e038020d3a266f7bd601035f91c649d1c0d338', 1443136726, 1443136726),
(15, 'hitachi', 'hitachi Tech', 'hitachi@hotmail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 25, 7, 0, 0, '0bc42738dab13acf3a3a713e6a67797df0fa9900c694b030574580ac3ced9cd3', 1443544534, 1443137170),
(16, 'sharp', 'Sharp Tech', 'genbot@mail.com', '7ec89e96618a09272531710ee958444e', 1, 0, 25, 0, 0, 0, '813bfab7b948efa3ec1575a5e19a44773debaa6aecec14e9193a1e27b6b6394d', 1443540676, 1443540676),
(17, 'siiri', 'Siiri Kerava', 'siirikerava@gmail.com', '8fa99daffef1fafc1fbdae05edd0b81d', 0, 0, 25, 0, 0, 0, 'f8728ed3074c79758e515200f90ed36221964edc01c582a3d8eb210b483c5859', 1443540885, 1443540885);

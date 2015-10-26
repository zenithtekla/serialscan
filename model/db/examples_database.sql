/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_database`
--

-- --------------------------------------------------------
--

CREATE TABLE IF NOT EXISTS `seriscan_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postalCode` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `sale_order` varchar(60) NOT NULL,
  `assembly_number` varchar(20) NOT NULL,
  PRIMARY KEY (`customerNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

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

--

CREATE TABLE IF NOT EXISTS `seriscan_assembly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = assemblyId
  `formatId` int(11) NOT NULL,
  `assembly_number` varchar(20) NOT NULL,
  -- assembly_number = data entry that user enters
  `revision` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `seriscan_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = formatId
  `format` varchar(60) NOT NULL,
  `format_example` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `seriscan_sale_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = sale_order_id
  `assemblyId` int(11) NOT NULL,
  `sale_order` varchar(60) NOT NULL,
  -- sale_order = data entry that user enters
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `seriscan_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_order_id` varchar(40) NOT NULL,
  `serial_number` varchar(60) NOT NULL,
  -- criteria:  serial_number, assembly_number, and  revision === unique for acceptance.
  --            serial_number matches format table.
  `user_id` varchar(20) NOT NULL,
  `time` TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

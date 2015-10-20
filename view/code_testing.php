<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Implementation of Alex's SyntaxHighlighter</title>
  <!-- WORKING VERSION, not best as the Evolved but just an okay result -->
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js"></script>
  <link type="text/css" rel="stylesheet" href="http://alexgorbatchev.com/pub/sh/current/styles/shThemeDefault.css"/>
  <!-- Loading Brushes -->
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushSql.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPython.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushRuby.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPlain.js"></script>
	<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPowerShell.js"></script>
	
	<script type="text/javascript">
		SyntaxHighlighter.config.bloggerMode = true;
		SyntaxHighlighter.defaults['toolbar'] = false;
		// SyntaxHighlighter.defaults['html-script'] = true;
		SyntaxHighlighter.all();
	</script>
</head>

<body style="background: white; font-family: Helvetica">

<h1>Hello SyntaxHighlighter</h1>
<pre class="brush: sql;">
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
  `customerNumber` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(50) NOT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postalCode` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `salesRepEmployeeNumber` int(11) DEFAULT NULL,
  `creditLimit` double DEFAULT NULL,
  PRIMARY KEY (`customerNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=497 ;

--

CREATE TABLE IF NOT EXISTS `seriscan_assembly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = assemblyId
  `formatId` int(11) NOT NULL,
  `assembly_number` varchar(20) NOT NULL,
  -- assembly_number = data entry that user enters
  `revision` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

CREATE TABLE IF NOT EXISTS `seriscan_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = formatId
  `format` varchar(60) NOT NULL,
  `format_example` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

CREATE TABLE IF NOT EXISTS `seriscan_sale_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = sale_order_id
  `assemblyId` int(11) NOT NULL,
  `sale_order` varchar(60) NOT NULL,
  -- sale_order = data entry that user enters
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

CREATE TABLE IF NOT EXISTS `seriscan_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_order_id` varchar(40) NOT NULL,
  `serial_number` varchar(60) NOT NULL,
  -- criteria:  serial_number, assembly_number, and  revision === unique for acceptance.
  --            serial_number matches format table.
  `user_id` varchar(20) NOT NULL,
  `time` TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

</pre>

</html>

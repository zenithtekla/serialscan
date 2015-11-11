<?php
	require_once('../model/dbi_con.php');
	session_start();

	$t_user_table = 'mantis_user_table';
	require_once('core/date_time.php');
	$_SESSION['time']     = getDateTime();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['assembly'] = $_POST['assembly'];
	$_SESSION['revision'] = $_POST['revision'];
	$_SESSION['format'] = $_POST['format'];
	$_SESSION['format_example'] = $_POST['format_example'];
	$_SESSION['sale_order'] = $_POST['sale_order'];
	$_SESSION['ss_key'] = 0;

	echo 'username : ' . $_POST['username']. '<br/>';
	echo 'password : ' . $_POST['password']. '<br/>';
	echo 'format : ' . $_POST['format']. '<br/>';
	echo 'format_example : ' . $_POST['format_example']. '<br/>';
	echo 'sale_order : ' . $_POST['sale_order']. '<br/>';
	$t_username 		= $mysqli->real_escape_string($_SESSION['username']);
	$t_password 		= $mysqli->real_escape_string($_SESSION['password']);
		$t_password_copy 		= $t_password;
	$t_format 	= $mysqli->real_escape_string($_SESSION['format']);
	$t_format_example 		= $mysqli->real_escape_string($_SESSION['format_example']);
	$t_sale_order 		= $mysqli->real_escape_string($_SESSION['sale_order']);
	require_once('core/access_control.php');
?>

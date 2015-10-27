<?php
	require_once('../model/dbi_con.php');
	session_start();

	$t_user_table = 'mantis_user_table';
	require_once('core/date_time.php');
	$_SESSION['time']     = getDateTime();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['assembly_number'] = $_POST['assembly_number'];
	$_SESSION['revision'] = $_POST['revision'];
	$_SESSION['sale_order'] = $_POST['sale_order'];

	echo 'username : ' . $_POST['username']. '<br/>';
	echo 'password : ' . $_POST['password']. '<br/>';
	echo 'assembly_number : ' . $_POST['assembly_number']. '<br/>';
	echo 'revision : ' . $_POST['revision']. '<br/>';
	echo 'sale_order : ' . $_POST['sale_order']. '<br/>';
	$t_username 		= $mysqli->real_escape_string($_SESSION['username']);
	$t_password 		= $mysqli->real_escape_string($_SESSION['password']);
		$t_password_copy 		= $t_password;
	$t_assembly_number 	= $mysqli->real_escape_string($_SESSION['assembly_number']);
	$t_revision 		= $mysqli->real_escape_string($_SESSION['revision']);
	$t_sale_order 		= $mysqli->real_escape_string($_SESSION['sale_order']);
	require_once('core/access_control.php');
?>

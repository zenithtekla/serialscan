<?php
	require_once('../model/dbi_con.php');
	session_start();
	$t_user_table = 'mantis_user_table';
	date_default_timezone_set('America/Los_Angeles');
	$date = date('m/d/Y h:i:s a', time());
	$_SESSION['time']     = $date;
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

	$t_username 		= mysql_real_escape_string($_POST['username']);
	$t_password 		= mysql_real_escape_string($_POST['password']);
		$t_password_copy 		= $t_password;
	$t_assembly_number 	= mysql_real_escape_string($_POST['assembly_number']);
	$t_revision 		= mysql_real_escape_string($_POST['revision']);
	$t_sale_order 		= mysql_real_escape_string($_POST['sale_order']);

	require_once('/core/access_control.php');

?>
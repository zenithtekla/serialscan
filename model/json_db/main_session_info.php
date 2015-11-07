<?php
    header('Content-Type: application/json');
	session_start();

	$t_arr = [];
	$t_arr['assembly_number'] = $_SESSION['assembly_number'];
	$t_arr['revision'] = $_SESSION['revision'];
	$t_arr['sale_order'] = $_SESSION['sale_order'];
	$t_arr['format'] = $_SESSION['format'];
	$t_arr['format_example'] = $_SESSION['format_example'];
	$t_arr['access_level'] = $_SESSION['access_level'];
	$t_arr['username'] = $_SESSION['username'];
	$t_arr['time'] = $_SESSION['time'];
	$t_arr['ss_key'] = $_SESSION['ss_key'];

	$jsonString = json_encode($t_arr, JSON_PRETTY_PRINT);
	echo $jsonString;
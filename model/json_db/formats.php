<?php
header('Content-Type: application/json');
require_once('../dbi_con.php');

	$t_format_table = 'seriscan_format';
	$qr = "SELECT format, format_example FROM $t_format_table";
	$result = $mysqli->query($qr);
	$t_format_arr = [];
	if ($result){
		while ( ($row=$result->fetch_assoc()) !== null ) {
			$t_format_arr[] = $row;
		}
	} else die('Invalid query: ' . mysql_error());
	
	$jsonString = json_encode($t_format_arr, JSON_PRETTY_PRINT);
	echo $jsonString;
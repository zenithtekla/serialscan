<?php
header('Content-Type: application/json');
require_once('../dbi_con.php');

	$t_customer_table = 'seriscan_customer';
	$qr = "SELECT customer_id, customer_name FROM $t_customer_table";
	// query looping to remove customer_id that does not result in any assemble
	$result = $mysqli->query($qr) or die($mysqli->error);
	$num_rows = $result->num_rows;
		
	if ($num_rows){
		$t_format_arr = [];
		while ( ($row=$result->fetch_assoc()) !== null ) {
			$t_format_arr[] = $row;
		}
		$result->free();
	}
	
    /* close connection */
	$mysqli->close();
	
	$jsonString = json_encode($t_format_arr, JSON_PRETTY_PRINT);
	echo $jsonString;
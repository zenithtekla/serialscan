<?php
header('Content-Type: application/json');
require_once('../dbi_con.php');

	$t_customer_table = 'seriscan_customer';
	$t_assembly_table = 'seriscan_assembly';
	$qr = "	SELECT seriscan_customer.customer_id, customer_name 
		   	FROM seriscan_customer
	 	INNER JOIN seriscan_assembly
	 	ON 
	 		seriscan_customer.customer_id = seriscan_assembly.customer_id
	 	ORDER BY 
	 		seriscan_customer.customer_name";

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
<?php
header('Content-Type: application/json');
// echo json_encode(array("formatId" => "0000","revision" => $_POST["customer_id"]));
require_once('../dbi_con.php');
	if($_POST["customer_id"]){
		$t_assembly_table = 'seriscan_assembly';
		$t_customer_id = $_POST["customer_id"];
		$qr = "SELECT assembly_number, revision FROM $t_assembly_table WHERE customer_id='$t_customer_id'";
		// $qr = "SELECT formatId, revision FROM $t_assembly_table WHERE customer_id=".$t_customer_id;
		$result = $mysqli->query($qr) or die($mysqli->error);
		$num_rows = $result->num_rows;
		
		if ($num_rows){
			$t_format_arr = [];
			while ($row=$result->fetch_assoc()) {
				$t_format_arr[] = $row;
			}
			$result->free();
		}
		
	    /* close connection */
		$mysqli->close();
		
		$jsonString = json_encode($t_format_arr, JSON_PRETTY_PRINT);
		echo $jsonString;
	}
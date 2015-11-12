<?php
header('Content-Type: application/json');
require_once('../dbi_con.php');
	if($_POST["assembly_number"]){
		$t_assembly_table = 'seriscan_assembly';
		$t_assembly_number = $_POST["assembly_number"];
		$qr = "SELECT revision, assembly_id FROM $t_assembly_table WHERE assembly_number='$t_assembly_number'";
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
	}
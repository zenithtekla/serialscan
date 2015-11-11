<?php
header('Content-Type: application/json');
// echo json_encode(array("formatId" => "0000","revision" => $_POST["customer_id"]));
require_once('../dbi_con.php');
	if($_POST["customer_id"]){
		$t_assembly_table = 'seriscan_assembly';
		$t_customer_id = $_POST["customer_id"];
		$qr = "SELECT * FROM $t_assembly_table WHERE customer_id='$t_customer_id'";
		// $qr = "SELECT formatId, revision FROM $t_assembly_table WHERE customer_id=".$t_customer_id;
		$result = $mysqli->query($qr);
		if ($result->num_rows){
			$t_format_arr = [];
			while ( ($row=$result->fetch_assoc()) !== null ) {
				$t_format_arr[] = $row;
			}
		} else die('Invalid query: ' . mysql_error());
		$jsonString = json_encode($t_format_arr, JSON_PRETTY_PRINT);
		echo $jsonString;
		// $mysqli->close();
	}
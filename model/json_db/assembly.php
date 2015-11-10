<?php
header('Content-Type: application/json');
// echo json_encode(array("formatId" => "0000","revision" => $_POST["assembly_number"]));
require_once('../dbi_con.php');
	if($_POST["assembly_number"]){
		$t_assembly_table = 'seriscan_assembly';
		$t_assembly_number = $_POST["assembly_number"];
		$qr = "SELECT * FROM $t_assembly_table WHERE assembly_number='$t_assembly_number'";
		// $qr = "SELECT formatId, revision FROM $t_assembly_table WHERE assembly_number=".$t_assembly_number;
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
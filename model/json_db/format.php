<?php
header('Content-Type: application/json');
require_once('../dbi_con.php');

if($_POST["assembly_id"]){
	$t_assembly_table = 'seriscan_assembly';
	$t_format_table = 'seriscan_format';
	$t_assembly_id = $_POST["assembly_id"];
	$qr = "SELECT format_id, format, format_example FROM $t_format_table WHERE assembly_id='$t_assembly_id'";
	// $qr = "SELECT formatId, revision FROM $t_assembly_table WHERE assembly_id=".$t_assembly_id;
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
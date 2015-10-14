<?php
	require_once('../model/dbi_con.php');
	$value = $_POST['value'];

	$t_assembly_number 	= mysql_real_escape_string($_SESSION['assembly_number']);
	$t_revision 		= mysql_real_escape_string($_SESSION['revision']);
	$t_sale_order 		= mysql_real_escape_string($_SESSION['sale_order']);



	if(!empty($value)) {
		$result = $mysqli->query("UPDATE users SET ".$_POST['name']."=" . mysql_escape_string($value) . " WHERE user_id = " . $_POST['pk']) or die(mysqli_error());

	}	else 	{
	    header('HTTP 400 Bad Request', true, 400);
	    echo "This field is required!";
	}

	$query = sprintf("INSERT INTO markers " .
         " (id, name, address, lat, lng, type ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
         mysql_real_escape_string($lat),
         mysql_real_escape_string($lng),
         mysql_real_escape_string($type));
	$result = mysql_query($query);
	if (!$result) {
	  die('Invalid query: ' . mysql_error());
	}
?>
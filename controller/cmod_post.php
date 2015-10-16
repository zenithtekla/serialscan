<?php
	require_once('../model/dbi_con.php');
	require_once('../model/db_modeling.php');
	session_start();

	$t_user_table = 'mantis_user_table';
	$t_format_table = 'seriscan_format';
	$t_assembly_table = 'seriscan_assembly';

	require_once('core/date_time.php');
	$_SESSION['time']     = getDateTime();

	$t_assembly_number 	= mysql_real_escape_string($_POST['assembly_number']);
	$t_revision 		= mysql_real_escape_string($_POST['revision']);
	$t_format 		= mysql_real_escape_string($_POST['format']);
	$t_format_example 		= mysql_real_escape_string($_POST['format_example']);

	//markup
	$m_format = $t_new_format->getFormat();
	$m_format_example = $t_new_format->getFormatExample();

	// instantiate new object as a new instance of the Format class.
	$t_new_format = new Format($t_format,$t_format_example);
		// indexing JSON data for key-value pair [format]-[format_example]
		$t_format_data = json_encode($t_new_format);
		echo $t_format_data . "<br />";
		$fp = fopen('../json/format_data.json', 'w') or die("Unable to open file!");
	    fwrite($fp, "\n". $json_data);
	    fclose($fp);

    // move to input_api.php
	function createScanFormat($p_format, $p_format_example){
		GLOBAL $t_format_table; // accessing global variable
		$qr = "INSERT INTO $t_format_table
						(format, format_example)
						VALUE
						( " . $p_format . ',' . $p_format_example . ')';
		// db_param(); db_query_bound( $query, Array( $p_format, $p_format_example) );
		$result = $mysqli->query($qr) or die($mysqli->error);

		return $result->insert_id; // formatId
	}
	// calling
	$t_formatId = $t_new_format->createScanFormat($m_format, $m_format_example); // should be the same for using $t_format, $t_format_example : testing needed!

	// now that formatId is ready, querying the rest to the assembly table
	$t_new_assembly = new Assembly( $t_formatId, $t_assembly_number , $t_revision );

		// indexing JSON data for key-value pair [assembly_number]-[format]
		$t_format_data = json_encode($t_new_format);
		echo $t_format_data . "<br />";
		$fp = fopen('../json/format_example_data.json', 'w') or die("Unable to open file!");
	    fwrite($fp, "\n". $json_data);
	    fclose($fp);

	function createAssembly($p_formatId, $p_assembly_number, $p_revision){
		GLOBAL $t_assembly_table; // accessing global variable
		$qr = "INSERT INTO $t_assembly_table
						(formatId, assembly_number, revision)
						VALUE
						( " . $p_formatId . ',' . $p_assembly_number . ',' . $p_revision .')';
		$result = $mysqli->query($qr) or die($mysqli->error);
		return $result->insert_id; // assemblyId
	}
	$t_assemblyId = $t_new_assembly->createAssembly($t_new_assembly->getFormatId(), $t_new_assembly->getAssemblyNumber(), $t_assembly_number->getRevision() );

	// now that formatId is ready, awaiting user's input of sale_order and querying the rest to the sale_order table
	// once the sale_order_id is available, awaiting new scanned serial_number and querying the sale_order_id, serial_number and session user_id with timestamp into the last table. Need syncronization of cmod_post with session_post and user_post (serial_number)!
?>
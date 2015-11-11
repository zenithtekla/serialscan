<?php
	require_once('../model/dbi_con.php');
	require_once('../model/db_modeling.php');
	session_start();
	
	$t_user_table = 'mantis_user_table';
	$t_format_table = 'seriscan_format';
	$t_assembly_table = 'seriscan_assembly';
	$t_customer_table = 'seriscan_customer';

	require_once('core/date_time.php');
	$_SESSION['time']     = getDateTime();
	
	$t_customer_name 	= $mysqli->real_escape_string($_POST['customer_name']);
	$t_assembly_number 	= $mysqli->real_escape_string($_POST['assembly_number']);
	$t_revision 		= $mysqli->real_escape_string($_POST['revision']);
	$t_format 			= $mysqli->real_escape_string($_POST['format']);
	$t_format_example 	= $mysqli->real_escape_string($_POST['format_example']);

//------Customer instantiation	
	$t_new_customer = new Customer($t_customer_name);

	function createCustomer($p_customer_name){
		GLOBAL $mysqli;
		GLOBAL $t_customer_table; // accessing global variable
		$qr = "INSERT INTO $t_customer_table
						(customer_name)
						VALUE ('$p_customer_name')";
		// db_param(); db_query_bound( $query, Array( $p_format, $p_format_example) );
		$result = $mysqli->query($qr) or die($mysqli->error);
		echo "New record created successfully. Last inserted ID is: " . $mysqli->insert_id;
		return $mysqli->insert_id; // customerId
	}
	$t_customerId = createCustomer($t_new_customer->getCustomerName());

		$t_customer_data = json_encode($t_new_customer);
		echo "<br/>". $t_customer_data . "<br/>";
		$fp = fopen('../json/customer_data.json', 'a') or die("Unable to open file!");
	    fwrite($fp, "\n". $t_customer_data);
	    fclose($fp);

//-----Assembly instantiation
	// now that customerId is ready, querying the rest to the assembly table
	$t_new_assembly = new Assembly( $t_customerId, $t_assembly_number , $t_revision );

	function createAssembly($p_customerId, $p_assembly_number, $p_revision){
		GLOBAL $mysqli;
		GLOBAL $t_assembly_table; // accessing global variable
		$qr = sprintf("INSERT INTO $t_assembly_table " .
						" (assembly_id, customer_id, assembly_number, revision ) " .
						" VALUES (NULL, '%s', '%s', '%s' );",
								$p_customerId,
								$p_assembly_number,
								$p_revision);
		$result = $mysqli->query($qr) or die($mysqli->error);
		echo "New record created successfully. Last inserted ID is: " . $mysqli->insert_id;
		return $mysqli->insert_id; // assemblyId
	}

	$t_assemblyId = createAssembly($t_new_assembly->getCustomerId(), $t_new_assembly->getAssemblyNumber(), $t_new_assembly->getRevision() );
	
		// indexing JSON data for key-value pair [assembly_number]-[format]
		$t_assembly_data = json_encode($t_new_assembly); // unsafe encoding, 3 values not a pair!
		echo "<br/>". $t_assembly_data . "<br/>";
		$fp = fopen('../json/assembly_data.json', 'a') or die("Unable to open file!");
	    fwrite($fp, "\n". $t_assembly_data);
	    fclose($fp);

//-----Format instantiation	
	// instantiate new object as a new instance of the Format class.
	$t_new_format = new Format($t_assemblyId,$t_format,$t_format_example);
	//markup
	$m_assemblyId = $t_new_format->getAssemblyId();
	$m_format = $t_new_format->getFormat();
	$m_format_example = $t_new_format->getFormatExample();

    // move to input_api.php
	function createScanFormat($p_assemblyId, $p_format, $p_format_example){
		GLOBAL $mysqli;
		GLOBAL $t_format_table; // accessing global variable
		$qr = "INSERT INTO $t_format_table
						(assembly_id, format, format_example)
						VALUE
						( " . $p_assemblyId . ',' . $p_format . ',' . $p_format_example . ')';
		// db_param(); db_query_bound( $query, Array( $p_format, $p_format_example) );
		$result = $mysqli->query($qr) or die($mysqli->error);
		echo "New record created successfully. Last inserted ID is: " . $mysqli->insert_id;
		return $mysqli->insert_id; // formatId
	}
	// calling
	$t_formatId = createScanFormat($m_assemblyId, $m_format, $m_format_example); // should be the same for using $t_format, $t_format_example : testing needed!
		
		// indexing JSON data for key-value pair [format]-[format_example]
		$t_format_data = json_encode($t_new_format);
		echo "<br />" . $t_format_data . "<br />";
		$fp = fopen('../json/format_data.json', 'a') or die("Unable to open file!");
	    fwrite($fp, "\n". $t_format_data);
	    fclose($fp);

	echo '<h3><a href="../view/cmod_enter.php">Enter new format</a></h3><br><br>';
	// now that formatId is ready, awaiting user's input of sale_order and querying the rest to the sale_order table
	// once the sale_order_id is available, awaiting new scanned serial_number and querying the sale_order_id, serial_number and session user_id with timestamp into the last table. Need syncronization of cmod_post with session_post and user_post (serial_number)!
?>
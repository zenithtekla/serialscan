<?php
	require_once('authentication.php'); //function from the related API

	/* // username
	if ($_POST['pk']==1){
		$t_input_type = mysql_real_escape_string($_POST['pk']);
		$t_input_field_name = mysql_real_escape_string($_POST['name']);
		$t_input_field_value = mysql_real_escape_string($_POST['value']);
		$t_username = new NewInput($t_input_type,$t_input_field_name,$t_input_field_value);
	}
	if ($_POST['pk']==2){
		$t_input_type = mysql_real_escape_string($_POST['pk']);
		$t_input_field_name = mysql_real_escape_string($_POST['name']);
		$t_input_field_value = mysql_real_escape_string($_POST['value']);
		$t_password = new NewInput($t_input_type,$t_input_field_name,$t_input_field_value);
		$t_password_copy = $t_password;
	} */

	// auth_process_plain_password
	$t_hash_password = md5 ( $t_password_copy );
	$qr = "SELECT * FROM $t_user_table WHERE username='$t_username' && password='$t_hash_password'";
	$result = $mysqli->query($qr) or die($mysqli->error);
	$num_rows = $result->num_rows;

	if ($num_rows){
		$_SESSION['is_auth'] = true;
		if ($num_rows==1)
		while ($row = $result->fetch_assoc()) {
			$_SESSION['access_level'] = $row['access_level'];
    	}
    	$result->free();
		printf ( 'authentication completed successfully' );
		header("Location: ../view/serialscan_home_view.php");

	} else { $_SESSION['is_auth'] = false; session_destroy(); printf( '<p class="red">authentication FAILED, wrong set of username and password</p>' ); header("refresh:2; url=../view/front.php");}

    /* close result set */
    $result->close();

    /* close connection */
	$mysqli->close();

?>

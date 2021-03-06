<?php
// Db connexion
require_once('dbi_con.php');

// Construct NewScan class to hold temp input value
class NewScan {
	public $assembly_number = "";
	public $revision = "";
	public $sale_order = "";
	public $serial_number = "";
	function __construct($assembly_number, $revision, $sale_order, $serial_number){
		$this->assembly_number = $assembly_number;
		$this->revision = $revision;
		$this->sale_order = $sale_order;
		$this->serial_number = $serial_number;
	}
	function __destruct(){}

	function setAssemblyNumber($val){
		$this->assembly_number = $val;
	}
	function getAssemblyNumber(){
		return $this->assembly_number;
	}

	function setRevision($val){
		$this->revision = $val;
	}
	function getRevision(){
		return $this->revision;
	}

	function setSaleOrder($val){
		$this->sale_order = $val;
	}
	function getSaleOrder(){
		return $this->sale_order;
	}

	function setSerialNumber($val){
		$this->serial_number = $val;
	}
	function getSerialNumber(){
		return $this->serial_number;
	}
}

// Queries for db insertion
class Seriscan {

	public $t_user_id = "getUserId()";
	public $t_obj_datetime = new DateTime('NOW');
	public $t_session_id = "md5_hash_($t_user_id.$t_obj_datetime->format('m-d-Y H:i:s')) mbe use only m-d-Y => less variation of $t_session_id";

	// access control condition; form_purge, form_security, session handling accept <--> reject
	/* if ( user_has_access && ($t_session_id == previousSession) )
			continue;
		else exit(); // force application quit
	*/

	public $t_query = "";

	public $t_new_scan = new NewScan()
	public $t_db_table ="";

	// #1: Assembly_number, #2: Revision, #3: sale_order, #default: serial_number
	switch ($t_input_type) {
		case '1', '2':
			$t_db_table = "seriscan_assembly";
			$t_query = "";
			break;

		case '3':
			$t_db_table = "seriscan_sale_order";
			$t_query = ""
			$t_query = "SELECT id FROM " . $t_db_table . "WHERE sale_order=" . $t_input_field_value;
			break;

		default:
			$t_db_table = "seriscan_serial";
			$t_query = "INSERT INTO ". $t_db_table . " (id, sale_order_id, serial_number, user_id, time) " . " VALUES (NULL, '%s', '%s', '%s', NULL);",
			$t_sale_order_id, "SELECT id FROM seriscan_sale_order WHERE "
			$t_input_field_value,
			$t_user_id;
			break;
	}

}

class NewInput {
	public $input_type = "";
	public $input_field_name = "";
	public $input_field_value = "";
	function __construct($input_type, $input_field_name, $input_field_value){
		$this->input_type = $input_type;
		$this->input_field_name = $input_field_name;
		$this->input_field_value = $input_field_value;
	}
	function __destruct(){}

	function setInputType($val){
		$this->input_type = $val;
	}
	function getInputType(){
		return $this->input_type;
	}

	function setFieldName($val){
		$this->input_field_name = $val;
	}
	function getFieldName(){
		return $this->input_field_name;
	}

	function setFieldValue($val){
		$this->input_field_value = $val;
	}
	function getFieldValue(){
		return $this->input_field_value;
	}
}

// load and evaluate input text

$t_input_type = mysql_real_escape_string($_POST['pk']);
$t_input_field_name = mysql_real_escape_string($_POST['name']);
$t_input_field_value = mysql_real_escape_string($_POST['value']);
$t_new_input = new NewInput($t_input_type,$t_input_field_name,$t_input_field_value);

$t_type = $t_new_input->getInputType();

switch ($t_type) {
	case '3':
		$t_assembly_number = $t_new_input->getInputValue();
		break;

	case '4':
		$t_revision = $t_new_input->getInputValue();
		break;

	case '5':
		$t_sale_order = $t_new_input->getInputValue();
		break;

	default:
		$t_serial_number = $t_new_input->getInputValue();
		break;
}
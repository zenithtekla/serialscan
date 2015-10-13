<?php
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
	case '1':
		$t_assembly_number = $t_new_input->getInputValue();
		break;

	case '2':
		$t_revision = $t_new_input->getInputValue();
		break;

	case '3':
		$t_sale_order = $t_new_input->getInputValue();
		break;

	default:
		$t_serial_number = $t_new_input->getInputValue();
		break;
}
<?php
class Customer {
	public $customer_name = "";
	function __construct($customer_name){
		$this->customer_name = $customer_name;
	}
	public function setCustomerName($val){
		$this->customer_name = $val;
	}
	public function getCustomerName(){
		return $this->customer_name;
	}
}

class Assembly {
	public $customer_id;
	public $assembly_number = "";
	public $revision = "";
	function __construct($customer_id, $assembly_number, $revision){
		$this->customer_id = $customer_id;
		$this->assembly_number = $assembly_number;
		$this->revision = $revision;
	}
	function __destruct(){}
	
	public function __toString()
	{
		echo "Output with the __toString method: ";
		return $this->getCustomerId();
	}

	public function setCustomerId($val){
		$this->customer_id = $val;
	}
	public function getCustomerId(){
		return $this->customer_id;
	}

	public function setAssemblyNumber($val){
		$this->assembly_number = $val;
	}
	public function getAssemblyNumber(){
		return $this->assembly_number;
	}

	public function setRevision($val){
		$this->revision = $val;
	}
	public function getRevision(){
		return $this->revision;
	}

	/* public function __isset($name) {
		return isset( $this->{$name} );
	} */
}

/*// Create a new object
$obj = new Assembly(1,2,'cvx','cvs');
$obj->format_id ='007';
 
// Output the object as a string
echo $obj;

// Destroy the object
unset($obj);*/

// $t_new_assembly = new Assembly($t_formatId, $t_assembly_number, $t_revision);

class Format {
	public $format = "";
	public $format_example = "";
	function __construct($format, $format_example){
		$this->format = $format;
		$this->format_example = $format_example;
	}
	function __destruct(){}

	public function setFormat($val){
		$this->format = $val;
	}
	public function getFormat(){
		return $this->format;
	}

	public function setFormatExample($val){
		$this->format_example = $val;
	}
	public function getFormatExample(){
		return $this->format_example;
	}
}

// $t_format = new Format($t_format, $t_format_example);

class Serial {
	public $assembly_id;
	public $customer_id;
	public $sale_order_id = "";
	public $serial_number = "";
	public $user_id = "";
	public $time = "";
	function __construct($assembly_id, $customer_id, $sale_order_id, $serial_number, $user_id, $time = ""){
		$this->assembly_id = $assembly_id;
		$this->customer_id = $customer_id;
		$this->sale_order_id = $sale_order_id;
		$this->serial_number = $serial_number;
		$this->user_id = $user_id;
		if (!isset($this->time))
			$this->time = new DateTime("now");
		else $this->time = $time;
	}
	function __destruct(){}
	
	public function setAssemblyId($val){
		$this->assembly_id = $val;
	}
	public function getAssemblyId(){
		return $this->assembly_id;
	}
	
	public function setCustomerId($val){
		$this->customer_id = $val;
	}
	public function getCustomerId(){
		return $this->customer_id;
	}

	public function setSaleOrderId($val){
		$this->sale_order_id = $val;
	}
	public function getSaleOrderId(){
		return $this->sale_order_id;
	}

	public function setSerialNumber($val){
		$this->serial_number = $val;
	}
	public function getSerialNumber(){
		return $this->serial_number;
	}

	public function setUserId($val){
		$this->user_id = $val;
	}
	public function getUserId(){
		return $this->user_id;
	}

	public function setTime($val){
		$this->time = $val;
	}
	public function getTime(){
		return $this->time;
	}
}
// $t_serial = new Serial($assembly_id, $customer_id, $t_sale_order_id, $t_serial_number, $t_user_id, $t_time);
//
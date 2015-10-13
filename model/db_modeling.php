<?php
class Assembly {
	public $format_id;
	public $assembly_number = "";
	public $revision = "";
	function __construct($format_id, $assembly_number, $revision){
		$this->format_id = $format_id;
		$this->assembly_number = $assembly_number;
		$this->state = $state;
	}
	function __destruct(){}

	function setFormatId($val){
		$this->format_id = $val;
	}
	function getFormatId(){
		return $this->format_id;
	}

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
}

// $t_new_assembly = new Assembly($t_formatId, $t_assembly_number, $t_revision);

class Format {
	public $format = "";
	public $format_example = "";
	function __construct($format, $format_example){
		$this->format = $format;
		$this->format_example = $format_example;
	}
	function __destruct(){}

	function setFormat($val){
		$this->format = $val;
	}
	function getFormat(){
		return $this->format;
	}

	function setFormatExample($val){
		$this->format_example = $val;
	}
	function getFormatExample(){
		return $this->format_example;
	}
}

// $t_format = new Format($t_format, $t_format_example);

class SaleOrder {
	public $assembly_id;
	public $sale_order = "";
	function __construct($assembly_id, $sale_order){
		$this->assembly_id = $assembly_id;
		$this->sale_order = $sale_order;
	}
	function __destruct(){}

	function setAssemblyId($val){
		$this->assembly_id = $val;
	}
	function getAssemblyId(){
		return $this->assembly_id;
	}

	function setSaleOrder($val){
		$this->sale_order = $val;
	}
	function getSaleOrder(){
		return $this->sale_order;
	}
}

// $t_sale_order = new SaleOrder($t_assemblyId, $sale_order);

class Serial {
	public $sale_order_id = "";
	public $serial_number = "";
	public $user_id = "";
	public $time = "";
	function __construct($sale_order_id, $serial_number, $user_id, $time = ""){
		$this->sale_order_id = $sale_order_id;
		$this->serial_number = $serial_number;
		$this->user_id = $user_id;
		if (!isset($this->time))
			$this->time = new DateTime("now");
		$this->time = $time;
	}
	function __destruct(){}

	function setSaleOrderId($val){
		$this->sale_order_id = $val;
	}
	function getSaleOrderId(){
		return $this->sale_order_id;
	}

	function setSerialNumber($val){
		$this->serial_number = $val;
	}
	function getSerialNumber(){
		return $this->serial_number;
	}

	function setUserId($val){
		$this->user_id = $val;
	}
	function getUserId(){
		return $this->user_id;
	}

	function setTime($val){
		$this->time = $val;
	}
	function getTime(){
		return $this->time;
	}
}
// $t_serial = new Serial($t_sale_order_id, $t_serial_number, $t_user_id, $t_time);
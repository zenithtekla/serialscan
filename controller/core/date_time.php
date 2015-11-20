<?php
	function getDateTime($timezone='America/Los_Angeles'){
		date_default_timezone_set($timezone);
		return date('m/d/Y h:i:s a', time());
	}
	function getDateTime2($timezone='America/Los_Angeles'){
		date_default_timezone_set($timezone);
		return date('Y-m-d H:i:s', time());
	}
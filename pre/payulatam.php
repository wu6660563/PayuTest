<?php

require_once 'mysqli.php';
class Payu {
	
	public function getPayuSetting() {
		$db = new DB\MySQLi("localhost", "u_opencart", "p_opencart_0701", "opencart");
		$query = $db->query("SELECT * FROM oc_setting oc WHERE oc.code = 'payulatam'");
		foreach ($query->rows as $row) {
			foreach ($row as $key => $value) {
				
			}
		}
		
		return $query->rows;
	}
}
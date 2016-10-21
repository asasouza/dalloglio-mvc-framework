<?php

final class Connection{

	const USER = "root";
	const PASS = "root";
	const DBNAME = "tcc";
	const HOST = "localhost";

	private static $conn;

	private function __construct(){
	}

	private function __clone(){}

	private static function open(){
		$conn = new PDO("mysql:host=".self::HOST.";port=3306;dbname=".self::DBNAME, self::USER, self::PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}

	public static function getInstance(){
		if (empty(self::$conn)) {
			self::$conn = self::open();
		}
		return self::$conn;
	}


}

?>
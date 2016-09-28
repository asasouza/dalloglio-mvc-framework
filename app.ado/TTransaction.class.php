<?php
final class TTransaction{
	private static $conn;
	private static $logger;

	private function __construct(){}

	public static function open(){
		if (empty(self::$conn)) {
			self::$conn = TConnection::getInstance();
			self::$conn->beginTransaction();
		}
	}

	public static function get(){
		return self::$conn;
	}

	public static function rollback(){
		if (self::$conn) {
			self::$conn->rollback();
			self::$conn = NULL;
		}
	}

	public static function close(){
		self::$conn->commit();
		self::$conn = NULL;
	}

	public static function log($message){
		self::$logger = new TLoggerTXT("app.log/log.txt");
		self::$logger->write($message);
	}
}

?>
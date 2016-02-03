<?php

namespace school\library;

/*
* Mysql database class - only one connection alowed
*/

class Database {
	
	private static $instance; //The single instance
	
	private $conn;
	
	private $servername = "localhost";
	
	private $username = "root";
	
	private $password = "";
	
	private $dbname = "mydb1";
	
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$instance) { // If no instance then make one
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	// Constructor
	private function __construct() {
		$this->conn = new \mysqli($this->servername, $this->username,
			$this->password, $this->dbname);
	
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	
	// Get mysqli connection
	public function getConn() {
		return $this->conn;
	}
		
}

?>
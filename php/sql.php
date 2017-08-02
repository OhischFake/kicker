<?php
session_start();


error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);
//$_SESSION['foo'] = 'bar';
/*default_charset = "utf-8";*/

class SQL{
	protected $conn;
	function __construct(){
		$servername = "localhost";
		$username = "tischkicker";
		$password = "tischkicker";
		$dbname = "usrdb_kempfdbe_tischkicker";

		// Create connection
		$this->conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		} 
		/*echo "Connected successfully";*/
	}
}
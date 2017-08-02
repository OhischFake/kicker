<?php

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

	function test() {
		echo 1;
	}
}
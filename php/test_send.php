<?php 	

class TestSend extends SQL{
			function __construct(){
			parent::__construct();
			
		}
		function testSend(){
			if(isset($_POST['name'])){
				$name = $_POST['name'];
				$nachname = $_POST['nachname'];
				$email = $_POST['email'];

				$sql = "INSERT INTO test (name, nachname, email, created_at) VALUES ('$name', '$nachname', '$email', now())";
				$check = mysqli_query($this->conn,$sql);
			}
		}
}
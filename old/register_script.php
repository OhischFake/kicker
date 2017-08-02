<?php


class Register extends SQL{

	private $success = false;
	
	function __construct(){
		parent::__construct();



		if(!empty($_POST['register'])){
			$user_name = $_POST['register']['user_name'];
			$passwort = $_POST['register']['passwort'];


			$sql = "SELECT * FROM user WHERE user_name = '$user_name'";
			$check = mysqli_query($this->conn,$sql);

			$this->success = false;

			if(($_POST['register']['passwort'] !== $_POST['register']['passwort2'])){
				echo "Sorry die Passwörter stimmen nicht überein";

			}elseif(mysqli_num_rows($check) > 0){
				echo "Der Benutzername existiert bereits";
			}
			else {
				$sql2 = "INSERT INTO user (passwort, user_name, created_at) VALUES ('$passwort', '$user_name', now())";
				$ins = mysqli_query($this->conn,$sql2);
				echo "Benutzer erfolgreich angelegt";
				$this->success = true;
			}
		}
	}

	function is_successfull() {
		return $this->success;
	}
}
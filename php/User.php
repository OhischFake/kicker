<?php
//Klasse wird mit der SQL Klasse erweitert um eine Verbindung zur Datenbank zu erhalten
class User extends SQL{
	private $success = false;

	function __construct(){	
		parent::__construct();

		if(isset($_GET['logout'])) {
			$this->loggedOut();
		}

		if(isset($_POST['login'])) {
			$this->login();
		}
		if(!empty($_POST['register'])){
			$this->register();
		}
	}



/*Login*/

	function login(){
			//Speichern der eingegebenen Daten aus der Login Seite
			$user_name = $_POST['login']['user_name'];
			$passwort = $_POST['login']['passwort'];	

			//SQL Abfrage für Übergabe an IF
			$sql = "SELECT * FROM user WHERE passwort = '$passwort' AND user_name = '$user_name'";
			$check = mysqli_query($this->conn,$sql);


				//Abfrage ob die Tabelle "user" mehr als keinen Eintrag hat. Zieht sich die Daten aus der Session
			if ( mysqli_num_rows($check) > 0){
				$_SESSION['user'] = mysqli_fetch_assoc($check);
				header("Location: index.php");
			//Wenn nicht wird Error geworfen	
			}else{
				echo "Das Passwort oder der Benutzername sind falsch ";
			}
	}



/*Checkt Status auf Logged in*/
	public function is_loggedin() {
		if(!empty($_SESSION['user'])) {
			return true;
		} else {
			return false;
		}
	}

/* Registrierung*/

	function register(){
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
	
	function is_successfull() {
		return $this->success;
	}



/*Logout*/

	function loggedOut(){
		session_start();
		session_destroy();
		header('Location: index.php');
		exit;
	}
}
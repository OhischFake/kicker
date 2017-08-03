<?php 

//print_r ($_GET);


class Points extends SQL{
	//private Variablen sind nicht veränderbar von außen
	private $row;
	private $user;
	private $id = 0;
	function __construct(){
		//parent:: lädt zuerst die __construct Funktion aus der SQL Klasse für eine Verbindung zur DB
		parent::__construct();
		$this->id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM user WHERE id = $this->id";
		$result = mysqli_query($this->conn,$sql);

		if (mysqli_num_rows($result) > 0) {
		     //output data of each row
				$this->row = mysqli_fetch_array($result);
		    /*while($row = mysqli_fetch_assoc($result)) {*/
		    //echo  "<br>" .$row["score"]. "<br>";
		    /*}*/
		} else {
		    echo "0 results";
		}

		if(!empty($_GET['action'])){
			$score = $this->getScore();
			if($_GET['action'] === 'tor'){
				$score += 100;
			
			} else if ($_GET['action'] === 'eigen'){
				$score -= 100;
			
			}else if ($_GET['action'] === 'rage'){
				$score += 150;
			
			}else if ($_GET['action'] === 'bande'){
				$score += 175;
			
			}else if ($_GET['action'] === 'slow'){
				$score += 150;
			}

			$this->setScore($score);
			header("Location: index.php");
		}
	}

	function getScore(){
		return $this->row["score"];
	}

	function setScore($newS){
		$this->row["score"] = $newS;
		$sql = "UPDATE user SET score = $newS WHERE id = $this->id";
		mysqli_query($this->conn,$sql);
	}
	function getUser(){
		return $this->row["user_name"];
	}
	function getUsers(){
		$users = "SELECT id, user_name FROM user";
		$result = mysqli_query($this->conn,$users);	

		if (mysqli_num_rows($result) > 0) {
				$this->user = mysqli_fetch_all($result,MYSQLI_ASSOC);
				return $this->user;
		}	
	}
}

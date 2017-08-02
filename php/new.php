<?php 

class NewGame extends SQL{
		function __construct(){
			parent::__construct();
			
		}

		function createGame(){
			if(isset($_POST['new'])){
				$sql = "SELECT * FROM game";
				$check = mysqli_query($this->conn,$sql);


			if(isset($_POST['new']['player_1']) && ($_POST['new']['player_2']) && ($_POST['new']['player_3']) && ($_POST['new']['player_4'])){

					$player_1 = $_POST['new']['player_1'];
					$player_2 = $_POST['new']['player_2'];
					$player_3 = $_POST['new']['player_3'];
					$player_4 = $_POST['new']['player_4'];

					$score_1 = $_POST['new']['score_1'];
					$score_2 = $_POST['new']['score_2'];
					$score_3 = $_POST['new']['score_3'];
					$score_4 = $_POST['new']['score_4'];

					$sql1 = "INSERT INTO game ";
					$sql1 .= "(player_1, player_2, player_3, player_4, score_1, score_2, score_3, score_4, created_at) VALUES ";
					$sql1 .= "('$player_1', '$player_2', '$player_3', '$player_4', '$score_1', '$score_2', '$score_3', '$score_4', now())";
					$ins = mysqli_query($this->conn,$sql1);
					// echo "4 Spieler nehmen Teil";
					echo json_encode(array("message" => "4 Spieler nehmen Teil"));
					die();
				
				}else if(isset($_POST['new']['player_1']) && ($_POST['new']['player_2'])){
					$player_1 = $_POST['new']['player_1'];
					$player_2 = $_POST['new']['player_2'];
					$player_3 = $_POST['new']['player_1'];
					$player_4 = $_POST['new']['player_2'];


					$score_1 = $_POST['new']['score_1'];
					$score_2 = $_POST['new']['score_2'];
					$score_3 = $_POST['new']['score_1'];
					$score_4 = $_POST['new']['score_2'];
					
					$sql2 = "INSERT INTO game ";
					$sql2 .= "(player_1, player_2, player_3, player_4, score_1, score_2, score_3, score_4, created_at) VALUES ";
					$sql2 .= "('$player_1', '$player_2', '$player_3', '$player_4', '$score_1', '$score_2', '$score_3', '$score_4', now())";
					$ins = mysqli_query($this->conn,$sql2);
					// echo "2 Spieler nehmen Teil";
					echo json_encode(array("message" => "2 Spieler nehmen Teil"));
					die();
				}
			}
		}
}
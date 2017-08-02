<?php
	


 include '../php/sql.php';
 include '../php/log_script.php';
 $User = new User();
 if(!$User->is_loggedin()) {
 	header("Location: ../login.php");
 }
 
 include '../php/points.php';
 include '../php/new.php';
 
 $NewGame = new NewGame();
 $Points = new Points();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tischkicker | New Game</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,500|Josefin+Slab:300,400,700" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-latest.js"></script>	
	<script language="javascript" type="text/javascript" src="../js/jquery.kicker.js"></script>
	<script language="javascript" type="text/javascript" src="../js/script.js"></script>
<!-- 	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon"> -->
</head>
	<body>
		<div class ="main">
			<div id="start"  class="show">
			<h1>Neues Spiel</h1>

					<div class="config" >
						<form method="post" id="test">
							<p>Silber hinten:</p>
								<select id="player_1" class="player_select player_1" name="new[player_1]" required>
									<option disabled selected value=""></option>
									<?php 
									$user = $Points->getUsers();
									foreach ($user as $key => $value) {?>								
									<option value="<?php echo $value['id']?>"><?php echo $value['user_name']?></option>
									<?php } ?>
								</select>
									<input name="new[score_1]" value="0" type="hidden">
							<p> Schwarz hinten:</p>
								<select  id="player_2" class="player_select player_2" name="new[player_2]" required>
									<option disabled selected value=""></option>
									<?php 
									$user = $Points->getUsers();
									foreach ($user as $key => $value) {?>								
									<option value="<?php echo $value['id']?>"><?php echo $value['user_name']?></option>
									<?php } ?>
								</select>
									<input name="new[score_2]" value="0" hidden>
							<p> Silber vorne:</p>
								<select id="player_3" class="player_select player_3" name="new[player_3]">
									<option disabled selected value=""></option>
									<?php 
									$user = $Points->getUsers();
									foreach ($user as $key => $value) {?>								
									<option value="<?php echo $value['id']?>"><?php echo $value['user_name']?></option>
									<?php } ?>
								</select>
									<input name="new[score_3]" value="0" hidden>
							<p>Schwarz vorne:</p>
								<select id="player_4" class="player_select player_4" name="new[player_4]">
									<option disabled selected value=""></option>
									<?php 
									$user = $Points->getUsers();
									foreach ($user as $key => $value) {?>								
									<option value="<?php echo $value['id']?>"><?php echo $value['user_name']?></option>
									<?php } ?>
								</select>
									<input name="new[score_4]" value="0" hidden>
								<br>
								<br>
								<input class="go" type="submit" value="Beginnen" disabled>
								
								<a class="cancel" href="./index.php"><button type="button">Zurück</button></a> 
						</form>

						<?php 
							echo $NewGame->createGame();
						?>
				</div>

				<div class="rules">
					<h2>Regeln</h2>
					<ul>
						<li>- Nach dem Anspiel ins Tor zu schiessen, zählt nicht</li>
						<li>- Wenn der Ball stehen bleibt, muss der Gegner den Ball in die Ecke legen</li>
						<li>- Bei einer zu Null Niederlage ist ein Getränk an den Gewinner auszugeben</li>
					</ul>
				</div>

			</div>
			<div id="game_silver">
				<div id="feld_aussen" class="all">
					<img src="../img/feld.jpg" alt="">
					<div id="goal_left">
						
					</div>
					<div id="goal_right">
						
					</div>
					<div id="feld_innen">
						
					</div>
					<div class="players_s">
						<div class="counter_1">
							<img class="gk_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_2">
							<img class="def_left" src="../img/silver_p.png" alt="">
							<img class="def_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_3">
							<img class="atk_left" src="../img/black_p.png" alt="">
							<img class="atl_left" src="../img/black_p.png" alt="">
							<img class="atk_left" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_4">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_5">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_6">
							<img class="atk_right" src="../img/silver_p.png" alt="">
							<img class="atk_right" src="../img/silver_p.png" alt="">
							<img class="atk_right" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_7">
							<img class="def_right" src="../img/black_p.png" alt="">
							<img class="def_right" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_8">
							<img class="gk_right" src="../img/black_p.png" alt="">
						</div>
					</div>
				</div>
				<div id="end_game">
					<input class="end" type="submit" value="Spiel Beenden">
				</div>
			</div>
			<div id="game_black">
				<div id="feld_aussen" class="all">
					<img src="../img/feld.jpg" alt="">
					<div id="goal_left">
						
					</div>
					<div id="goal_right">
						
					</div>
					<div id="feld_innen">
						
					</div>
					<div class="players_n">
						<div class="counter_1">
							<img class="gk_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_2">
							<img class="def_left" src="../img/silver_p.png" alt="">
							<img class="def_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_3">
							<img class="atk_left" src="../img/black_p.png" alt="">
							<img class="atl_left" src="../img/black_p.png" alt="">
							<img class="atk_left" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_4">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
							<img class="mid_left" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_5">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
							<img class="mid_right" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_6">
							<img class="atk_right" src="../img/silver_p.png" alt="">
							<img class="atk_right" src="../img/silver_p.png" alt="">
							<img class="atk_right" src="../img/silver_p.png" alt="">
						</div>
						<div class="counter_7">
							<img class="def_right" src="../img/black_p.png" alt="">
							<img class="def_right" src="../img/black_p.png" alt="">
						</div>
						<div class="counter_8">
							<img class="gk_right" src="../img/black_p.png" alt="">
						</div>
					</div>
				</div>
				<div id="end_game">
					<input class="end" type="submit" value="Spiel Beenden">
				</div>
			</div>
		</div>
	</body>
</html>
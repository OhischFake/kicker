<?php

 include '../php/sql.php';
 include '../php/log_script.php';
 $User = new User();
 if(!$User->is_loggedin()) {
 	header("Location: ../login.php");
 }

 include '../php/points.php';
 
 $Points = new Points();
 $SQL = new SQL();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tischkicker</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/ball.css">
	<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,500|Josefin+Slab:300,400,700" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-latest.js"></script>	
	<script language="javascript" type="text/javascript" src="../js/script.js"></script>
</head>
	<body>
		<div id="feld_aussen" class="all">
			<img src="../img/feld.jpg" alt="">
			<div id="goal_left">
				
			</div>
			<div id="goal_right">
				
			</div>
			<div id="feld_innen">
				
			</div>
			<div class="players">
				<div class="row_1 silver">
					<img class="gk_left" src="../img/silver_p.png" alt="">
				</div>
				<div class="row_2 silver">
						<img class="def_left" src="../img/silver_p.png" alt="">
						<img class="def_left" src="../img/silver_p.png" alt="">
				</div>
				<div class="row_3 black">
						<img class="atk_left" src="../img/black_p.png" alt="">
						<img class="atk_left" src="../img/black_p.png" alt="">
						<img class="atk_left" src="../img/black_p.png" alt="">
				</div>
				<div class="row_4 silver">
						<img class="mid_left" src="../img/silver_p.png" alt="">
						<img class="mid_left" src="../img/silver_p.png" alt="">
						<img class="mid_left" src="../img/silver_p.png" alt="">
						<img class="mid_left" src="../img/silver_p.png" alt="">
						<img class="mid_left" src="../img/silver_p.png" alt="">
				</div>
				<div class="row_5 black">
						<img class="mid_right" src="../img/black_p.png" alt="">
						<img class="mid_right" src="../img/black_p.png" alt="">
						<img class="mid_right" src="../img/black_p.png" alt="">
						<img class="mid_right" src="../img/black_p.png" alt="">
						<img class="mid_right" src="../img/black_p.png" alt="">
				</div>
				<div class="row_6 silver">
						<img class="atk_right" src="../img/silver_p.png" alt="">
						<img class="atk_right" src="../img/silver_p.png" alt="">
						<img class="atk_right" src="../img/silver_p.png" alt="">
				</div>
				<div class="row_7 black">
					<img class="def_right" src="../img/black_p.png" alt="">
					<img class="def_right" src="../img/black_p.png" alt="">
				</div>
				<div class="row_8 black">
						<img class="gk_right" src="../img/black_p.png" alt="">
				</div>
			</div>
		</div>
		<div class="bounce">
			<div class="ball_outter">
				<div class="pattern_1">
					<div class="inner_pattern_1">
					
					</div>
					<div class="inner_pattern_2">
					
					</div>
					<div class="inner_pattern_3">
					
					</div>
				</div>
			</div>
			<div class="shadow">
			</div>
		</div>
		<div class="main ov">
			<h1>
			<?php 
					echo $Points->getUser();
			?>
			</h1>
			<h2> Punktestand</h2>
			<p>
			<?php 
					echo $Points->getScore()."</br>";
			?>
			</p>
			<div id="logout">
					<a class="logout" href="<?php echo $_SERVER['PHP_SELF'];?>?logout=1">Logout</a>
					<a class="new_game" href="new_game.php">Neues Spiel</a>
			</div>
		</div>
	</body>
</html>
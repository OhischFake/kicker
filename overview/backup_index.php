<?php

 include '../php/sql.php';
 include '../php/log_script.php';
 $User = new User();
 if(!$User->is_loggedin()) {
 	header("Location: ../login.php");
 }
 include '../php/points.php';
 $Points = new Points();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Tischkicker</title>
	<link rel="stylesheet" href="../css/style.css">
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
					<a href=""><img class="gk_left" src="../img/silver_p.png" alt=""></a>
				</div>
				<div class="row_2 silver">
					<a href=""><img class="def_left" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="def_left" src="../img/silver_p.png" alt=""></a>
				</div>
				<div class="row_3 black">
					<a href=""><img class="atk_left" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="atk_left" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="atk_left" src="../img/black_p.png" alt=""></a>
				</div>
				<div class="row_4 silver">
					<a href=""><img class="mid_left" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="mid_left" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="mid_left" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="mid_left" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="mid_left" src="../img/silver_p.png" alt=""></a>
				</div>
				<div class="row_5 black">
					<a href=""><img class="mid_right" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="mid_right" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="mid_right" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="mid_right" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="mid_right" src="../img/black_p.png" alt=""></a>
				</div>
				<div class="row_6 silver">
					<a href=""><img class="atk_right" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="atk_right" src="../img/silver_p.png" alt=""></a>
					<a href=""><img class="atk_right" src="../img/silver_p.png" alt=""></a>
				</div>
				<div class="row_7 black">
					<a href=""><img class="def_right" src="../img/black_p.png" alt=""></a>
					<a href=""><img class="def_right" src="../img/black_p.png" alt=""></a>
				</div>
				<div class="row_8 black">
					<a href=""><img class="gk_right" src="../img/black_p.png" alt=""></a>
				</div>
			</div>
		</div>
		<div class="main">
				<h1>
				<?php 
						echo $Points->getUser();
				?>
				</h1>
				<h2> Punktestand</h2>
				<p>
				<?php 
						echo $Points->getScore();
				?>
				</p>
				<div class="side">
					<button class="black_b" type="button"> Schwarze Seite </button>
					<button class="silver_b" type="button"> Silberne Seite </button>
					<button class="all active" type="button"> Ganze Übersicht </button>
				</div>
		</div>
		<div id="points">
			<a href="index.php?action=tor">Tor +100</a>
			<a href="index.php?action=eigen">Eigentor -100</a>
			<a href="index.php?action=rage">Gewaltschuss +50</a>
			<a href="index.php?action=bande">Bandentor +75</a>
			<a href="index.php?action=slow">Langsames Tor +50</a>
		</div>
	</body>
</html>
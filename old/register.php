<?php 
include 'php/sql.php';

$SQL = new SQL();
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,500|Josefin+Slab:300,400,700" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
		<div class="main">
			<h1>Registrierung</h1>
			<p>Registriere dich zuerst, bevor die Punkte Jagd beginnt</p>
			<form action="login.php" method="post">
				<div class="name">
					<input type="text" placeholder="Benutzername*" name="register[user_name]" required>
				</div>
				<div class="pw">
					<input type="password" placeholder="Passwort*" name="register[passwort]" required>
				</div>
				<div class="log"> 
					<input type="submit" value="Registrieren">
				</div>
			</form>
		</div>
</body>
</html>
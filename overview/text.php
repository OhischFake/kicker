<?php

include '../php/sql.php';
include '../php/test_send.php';

$TestSend = new TestSend();
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="https://code.jquery.com/jquery-latest.js"></script>	
		<script language="javascript" type="text/javascript" src="../js/script.js"></script>
	</head>
	<body>
		<div class="main">
			<form method="post">
					First name:<br>
				  <input type="text" name="name"><br>
 					Last name:<br>
					<input type="text" name="nachname"><br>
					E-Mail:<br>
					<input type="text" name="email"><br><br>
					<input type="submit" value="Submit">
			</form>

			<?php 
				echo $TestSend->testSend();
			?>
		</div>
	</body>
</html> 
<div class="main">
<div id="login"<?php if(empty($_POST) || (!empty($_POST) && $User->is_successfull())){?> class="show"<?php }?>>
	<h1>Login</h1>
	<p> Logge dich ein um deinen persönlichen Score zu sehen</p>
	<form action="index.php" method="post">
		<div class="name">
			<input type="text" placeholder="Benutzername*" name="login[user_name]" required>
		</div>
		<div class="pw">
			<input type="password" placeholder="Passwort*" name="login[passwort]" required>
		</div>
		<div class="log"> 
			<input type="submit" value="Login">
			<a class="register" ><input type="button" value="Registrierung"></a>
		</div>
	</form>
</div>

<div id="register"<?php if(!empty($_POST) && !$User->is_successfull()){?> class="show"<?php }?>>
	<h1>Registrierung</h1>
	<p>Registriere dich zuerst, bevor die Punkte Jagd beginnt</p>
	<form action="index.php" method="post">
		<div class="name">
			<input type="text" placeholder="Benutzername*" name="register[user_name]" value="<?php echo $_POST['register']['user_name'];?>" required>
		</div>
		<div class="pw">
			<input type="password" placeholder="Passwort*" name="register[passwort]" required>
		</div>
		<div class="pw">
			<input type="password" placeholder="Passwort wiederholen" name="register[passwort2]" required>
		</div>
		<div class="reg"> 
			<input type="submit" value="Registrieren">
			<a class="stop" ><input type="button" value="Zum Login"></a>
		</div>
	</form>
</div>
</div>
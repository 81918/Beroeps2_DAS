 <?php
session_start();

// maak een encrypted key
$token = bin2hex(openssl_random_pseudo_bytes(32));

// zet de key in een session
$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html>
<head>
	<title>opdracht 7</title>
</head>
<body>
	<?php
	$_SESSION['level'] = 2;
	if ($_SESSION['level'] == 0){

	?>
	<form action="login_verwerk.php" method="post">
		<input type="hidden" name="csrf_token" value="<?php echo $token;?>">
		<!-- stuur de key door -->
		<table>
			<tr>
				<td><label for="gebruikersnaam">Gebruikersnaam:</label></td>
				<td><input type="text" name="gebruikersnaam" id="gebruikersnaam" required></td>
			</tr>
			<tr>
				<td><label for="Wachtwoord">Wachtwoord:</label></td>
				<td><input type="password" name="wachtwoord" id="Wachtwoord" required maxlength="40"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="register"></td>
			</tr>
		</table>
	</form>
	<?php
	} else {
		echo "<h1>OOPS</h1>";
		echo "<p class='error'>U bent al ingelogd</p>"; 
	} 
	?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>opdracht 7</title>
</head>
<body>
	<form action="login_verwerk.php" method="post">
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
</body>
</html>

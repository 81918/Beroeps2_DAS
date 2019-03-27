<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		form
		{
			display: inline-block;
		}
	</style>
</head>
<body>
	<?php
	if($_SESSION['level'] == 0)
	{
		echo $_SESSION['level'];
	?>
		<div class="aanmeld_verwerk.php">
			<form action="aanmeld_verwerk.php" method="post" id="aanmeld">
				<table>
					<tr>
						<td>Voornaam:</td>
						<td colspan="3"><input type="text" name="voornaam"></td>
					</tr>
					<tr>
						<td>Achternaam:</td>
						<td colspan="3"><input type="text" name="achternaam"></td>
					</tr>
					<tr>
						<td>Geboortedatum:</td>
						<td colspan="3">
							<?php
							// dag
							echo "<select>";
							for ($i=0; $i < 31; $i++) { 

								echo "<option value='" . $i . "'>" . $i . "</option>";

							}
							echo "</select>";

							//maand
							echo "<select>";
							for ($i=0; $i < 12; $i++) { 

								echo "<option value='" . $i . "'>" . $i . "</option>";

							}
							echo "</select>";

							//jaar
							echo "<select>";
							for ($i=1910; $i < date("Y"); $i++) { 

								echo "<option value='" . $i . "'>" . $i . "</option>";

							}
							echo "</select>";
							?>
						</td>
					</tr>
					<tr>
						<td>Gebruikersnaam:</td>
						<td colspan="3"><input type="text" name="gebruikersnaam" maxlength="32"></td>
					</tr>
					<tr>
						<td>Wachtwoord:</td>
						<td colspan="3"><input type="password" name="wachtwoord1" maxlength="40"></td>
					</tr>
					<tr>
						<td>Wachtwoord opnieuw:</td>
						<td colspan="3"><input type="password" name="wachtwoord2" maxlength="40"></td>
					</tr>
					<tr>
						<td>E-mail:</td>
						<td colspan="3"><input type="email" name="email" maxlength="50"></td>
					</tr>
					<tr>
						<td>Stad:</td>
						<td colspan="3"><input type="text" name="stad" maxlength="40"></td>
					</tr>
					<tr>
						<td>Straat:</td>
						<td colspan="3"><input type="text" name="straat" maxlength="40"></td>
						<td>Huisnummer en toevoeging</td>
						<td><input type="text" name="huintoegv" maxlength="5"></td>
						<td>Postcode:</td>
						<td><input type="text" name="postcode"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="submit" value="meld aan"></td>
					</tr>
				</table>
			</form>
		</div>
	<?php
		}
		elseif($_SESSION['level'] == 1) {
			// 
			echo "<h1>OOPS!</h1>";
			echo "<p class='error'>U hoord hier niet te zijn! <a href='../../index.php'>Ga naar home</a></p>";
		}
		else
		{
			echo "<h1>OOPS!</h1>";
			echo "<p class='error'>U hoord hier niet te zijn! <a href='../index.php'>Ga naar uitlees</a>.</p>";
		}

	?>
</body>
</html>
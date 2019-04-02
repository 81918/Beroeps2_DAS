<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if($_SESSION['level'] == 0)
	{
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
						<td>Geboortedatum (DD/MM/YYYY):</td>
						<td colspan="3">
							<?php
								// dag
								echo "<select name='geboortedatum1' form='aanmeld'>";
								echo "<option selected> - - - - </option>";
								for ($i = 1; $i < 31; $i++) { 

									echo "<option value='" . $i . "'>" . $i . "</option>";

								}
								echo "</select>";

								//maand
								echo "<select name='geboortedatum2' form='aanmeld'>";
								echo "<option selected> - - - - </option>";
								for ($i = 1; $i < 12; $i++) { 

									echo "<option value='" . $i . "'>" . $i . "</option>";

								}
								echo "</select>";

								//jaar
								echo "<select name='geboortedatum3' form='aanmeld'>";
								echo "<option selected> - - - - </option>";
								$date = date("Y");
								for ($i = $date; $i > 1910; $i--) { 

									echo "<option value='" . $i . "'>" . $i . "</option>";

								}
								echo "</select>";
							?>
						</td>
					</tr>
					<tr>
						<td>Gebruikersnaam:</td>
						<td><input type="text" name="gebruikersnaam" maxlength="32"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Wachtwoord:</td>
						<td><input type="password" name="wachtwoord1" maxlength="40"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Wachtwoord opnieuw:</td>
						<td><input type="password" name="wachtwoord2" maxlength="40"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Moet minstens 1 cijfer van 0 t/m 9, letters a-z, minstns een hoofdletter en een van deze tekens !@#$%^&*-</td>
					</tr>
					<tr>
						<td>E-mail:</td>
						<td><input type="email" name="email" maxlength="50"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Stad:</td>
						<td><input type="text" name="stad" maxlength="40"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Straat:</td>
						<td><input type="text" name="straat" maxlength="40"></td>
						<td>Huisnummer en toevoeging</td>
						<td><input type="text" name="huintoegv" maxlength="5"></td>
						<td>Postcode:</td>
						<td><input type="text" name="postcode"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
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
		elseif($_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
			// 
			echo "<h1>OOPS!</h1>";
			echo "<p class='error'>U bent al ingelogt! <a href='../../index.php'>Ga naar home</a></p>";
		}
		else
		{
			echo "<h1>OOPS!</h1>";
			echo "<p class='error'>Er is iets fouts gegaan! <a href='../index.php'>Ga naar uitlees</a>.</p>";
		}

	?>
</body>
</html>
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
						<td colspan="3"><input type="date" name="geboortedatum" min="1900-01-01" max="<?php
							$i 		=	date('Y-m-d');
							$i 		=	explode('-', $i);
							$year	=	$i[0];
							$month	=	$i[1];
							$day	=	$i[2];
							if ($year < 100)
							{
								echo 20 . $i[0] . '-' . $i[1] . '-' . $i[2];
							}
							else if ($year < 1000)
							{
								echo 2 . $i[0] . '-' . $i[1] . '-' . $i[2];
							}
							else if ($year > 1000)
							{
								echo $i[0] . '-' . $i[1] . '-' . $i[2];
							}
							;?>"></td>
					</tr>
					<tr>
						<td>Gebruikersnaam:</td>
						<td colspan="3"><input type="text" name="gebruikersnaam" maxlength="32"></td>
					</tr>
					<tr>
						<td>Wachtwoord:</td>
						<td colspan="3"><input type="password" name="wachtwoord" maxlength="40"></td>
					</tr>
					<tr>
						<td>e-mail:</td>
						<td colspan="3"><input type="email" name="email" maxlength="50"></td>
					</tr>
					<tr>
						<td>land:</td>
						<td colspan="3"><input type="text" name="land" maxlength="40"></td>
					</tr>
					<tr>
						<td>provincie:</td>
						<td colspan="3"><input type="text" name="provincie" maxlength="40"></td>
					</tr>
					<tr>
						<td>stad:</td>
						<td colspan="3"><input type="text" name="stad" maxlength="40"></td>
					</tr>
					<tr>
						<td>postcode:</td>
						<td><input type="text" name="postcode"></td>
						<td>Huisnummer en toevoeging</td>
						<td><input type="text" name="ht" maxlength="5"></td>
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
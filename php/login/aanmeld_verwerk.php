<!DOCTYPE html>
<html>
<head>
	<title>aanmeld</title>
</head>
<body>
	<?php
	
	if (isset($_POST['submit']))
	{
		require('../../config_beroeps2.inc.php');

		$voornaam = $_POST['voornaam'];
		$achternaam = $_POST['achternaam'];
		$geboortedatum = $_POST['geboortedatum1'];
		$geboortedatum = $_POST['geboortedatum2'];
		$geboortedatum = $_POST['geboortedatum3'];
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$wachtwoord = $_POST['wachtwoord1'];
		$wachtwoord = $_POST['wachtwoord2'];
		$email = $_POST['email'];
		$stad = $_POST['stad'];
		$straat = $_POST['straat'];
		$huintoegv = $_POST['huintoegv'];
		$postcode = $_POST['postcode'];

		if (empty($voornaam) && empty($achternaam) &&
			empty($gebruikersnaam) && empty($wachtwoord) &&
			empty($email) && empty($land) &&
			empty($provincie) && empty($stad) &&
			empty($postcode) && empty($ht)) {

			$query = "INSERT INTO De_aquarium_specialist_login
			(id, voornaam, achternaam, geboortedatum,
			gebruikersnaam, wachtwoord, email, land,
			provincie, stad, postcode, ht, level)
			VALUES (NULL, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

			if (mysqli_query($mysqli, $query))
			{
				echo "<p class='no_error'> U bent sucsessvol aangemeld.</p>";
			}
			else
			{
				echo "<p class='error'>Er ging iets fout we konde uw account niet aanmaken.</p>";
			}
		}
		else
		{
			echo "<p class='error'>Er was iets niet ingevuld.</p>";
		}
	}
	?>
</body>
</html>
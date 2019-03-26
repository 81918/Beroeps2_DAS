<!DOCTYPE html>
<html>
<head>
	<title>aanmeld</title>
</head>
<body>
	<?php
	error_reporting(1);
	ini_set('error_reporting', E_ALL);
	require('config_beroeps2.inc.php');
	if (isset($_POST['submit']))
	{
		$voornaam = $_POST['voornaam'];
		$achternaam = $_POST['achternaam'];
		$geboortedatum = $_POST['geboortedatum'];
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$wachtwoord = $_POST['wachtwoord'];
		$email = $_POST['email'];
		$land = $_POST['land'];
		$provincie = $_POST['provincie'];
		$stad = $_POST['stad'];
		$postcode = $_POST['postcode'];
		$ht = $_POST['ht'];
		if (strlen($voornaam) > 0 &&
			strlen($achternaam) > 0 &&
			strlen($gebruikersnaam) > 0 &&
			strlen($wachtwoord) > 0 &&
			strlen($email) > 0 &&
			strlen($land) > 0 &&
			strlen($provincie) > 0 &&
			strlen($stad) > 0 &&
			strlen($postcode) > 0 &&
			strlen($ht) > 0)
		{
			$query = "INSERT INTO De_aquarium_specialist_login (id, voornaam, achternaam, geboortedatum, gebruikersnaam, wachtwoord, email, land, provincie, stad, postcode, ht, level)
			VALUES (NULL, '$voornaam', '$achternaam' , '$geboortedatum', '$gebruikersnaam', '$wachtwoord', '$email', '$land', '$provincie', '$stad', '$postcode', '$ht', 1)";

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
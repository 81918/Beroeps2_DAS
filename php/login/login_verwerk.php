<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div></div>
	<header>
		<nav>
			<h1>Login</h1>
			<?php

				//lees het config-bestand
				require('config_beroeps2.inc.php');

				//lees alle formuliervelden
				$gebruikersnaam = $_POST['gebruikersnaam'];
				$wachtwoord = $_POST['wachtwoord'];

				// controleer of alle formulieren waren ingevuld
				if (strlen($gebruikersnaam) > 0 && strlen($wachtwoord) > 0)
				{
					//versleutel het wachtwoord
					$wachtwoord = md5($wachtwoord);

					//maak de conrole-query
					$query = "SELECT * FROM DAS_login
							  WHERE gebruikersnaam = '$gebruikersnaam'
							  AND wachtwoord = '$wachtwoord'";
					
					//voer de query uit 
					$result = mysqli_query($mysqli, $query);

					//controleer of de login correct was
					if (mysqli_num_rows($result) == 1) {

						$row = mysqli_fetch_array($result);
						$_SESSION['level'] = $row['level'];

						if($row['level'] == 1) {

							// redirect naar index (main home pagina)
							header("Location:../../index.php");

						} elseif ($row['level'] == 2) {

							// redirect naar homepagina van admin
							header("Location:../admin/index.php");

						} else {
							// een andere level dan 0, 1 of 2
							echo "<p>OOPS, er is iets fout gegaan!</p>";

						}
					} else {
						//login incorrect, terug naar het login-formulier (alleen login form als je probeerde inteloggen bij aanmeld_login)
						header("Location:login.php");
					
					}
				} else {

					echo "<p>Niet alle velden zijn ingevuld!</p>";
					//exit;
				}
			?>
		</nav>
	</header>
	<main>
	<p>Click <a href="../home.php">here</a> to go to home.</p>
	</main>
	<footer>
			<p>De Aquariam Specialist - copyright - 2018</p>
	</footer>
</body>
</html>
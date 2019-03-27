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
				if (isset($_POST['submit'])) {

					// check of de key van het formulier is opgestuurd en het zelfe is het session variable
					if (isset($_SESSION['token']) && $_SESSION['token'] == $_POST['csrf_token'])
					{
						//lees alle formuliervelden
						$gebruikersnaam = $_POST['gebruikersnaam'];
						$wachtwoord = $_POST['wachtwoord'];

						// controleer of alle formulieren waren ingevuld
						if (!empty($gebruikersnaam) && !empty($wachtwoord)) {


							//lees het config-bestand
							require('../../config_beroeps2.inc.php');

							//versleutel het wachtwoord
							$wachtwoord = md5(mysqli_real_escape_string($mysqli, htmlentities($wachtwoord)));
							$gebruikersnaam = mysqli_real_escape_string($mysqli, htmlentities($gebruikersnaam));

							//maak de controle-query
							$query = "SELECT level FROM DAS_login
									  WHERE gebruikersnaam = ?
									  AND wachtwoord = ?";
							
							// check of de voorberijding op een statment gelukt is 
							if ($stmt = mysqli_prepare($mysqli, $query)){

								// bind de vraagtekens aan een variable
								mysqli_stmt_bind_param($stmt, "ss", $gebruikersnaam, $wachtwoord);

								if ($result1 = mysqli_stmt_execute($stmt)) {

									// buffer data
									mysqli_stmt_store_result($stmt);

									//controleer of de login correct was
									if (mysqli_stmt_num_rows($stmt) == 1) {

										// zet de resultaat in een variable
										mysqli_stmt_bind_result($stmt, $level);

										// vraag de informatie op
										mysqli_stmt_fetch ($stmt);

										$_SESSION['level'] = $level;

										mysqli_stmt_close($stmt);

										// genereer een nieuw session id
										session_regenerate_id();

										if($_SESSION['level'] == 1) {

											// redirect naar index
											header("Location:../../index.php");

										} elseif ($_SESSION['level'] == 2) {

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
									echo "<p class='error'>Er was een probleem met het uitvoren van de query!</p>";
								}
							} else {
								echo "<p class='error'>Er zijn problemen met het voorberijden op een statment maken!</p>";
							}
						} else {

							echo "<p class='error'>Niet alle velden zijn ingevuld!</p>";
						}
					} else {
						echo "<p class='error'>U heeft het formulier niet ingevuld.</p>";
					}
				} else {
					echo "<p class='error'>We hebben geen data binnen.</p>";
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
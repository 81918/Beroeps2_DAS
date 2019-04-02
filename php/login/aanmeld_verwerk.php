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
		$geboortedatum1 = $_POST['geboortedatum1'];
		$geboortedatum2 = $_POST['geboortedatum2'];
		$geboortedatum3 = $_POST['geboortedatum3'];
		$gebruikersnaam = $_POST['gebruikersnaam'];
		$wachtwoord1 = $_POST['wachtwoord1'];
		$wachtwoord2 = $_POST['wachtwoord2'];
		$email = $_POST['email'];
		$stad = $_POST['stad'];
		$straat = $_POST['straat'];
		$huintoegv = $_POST['huintoegv'];
		$postcode = $_POST['postcode'];

		// check of niks leeg is
		if (!empty($voornaam) && !empty($achternaam) &&
			!empty($geboortedatum1) && !empty($geboortedatum2) &&
			!empty($geboortedatum3) && !empty($wachtwoord1) &&
			!empty($wachtwoord2) && !empty($email) &&
			!empty($stad) && !empty($straat) &&
			!empty($huintoegv) && !empty($postcode)) {

			if (preg_match("/^(?=.*[A-Za-z0-9_.-])/", $gebruikersnaam)) {

				$SQL = "SELECT gebruikersnaam FROM DAS_login WHERE gebruikersnaam =  ?";
				$stmt = mysqli_stmt_init($mysqli);

				// berijd statment voor
				if (mysqli_stmt_prepare($stmt, $SQL)) {
				
					// verbind de vraagtekens in de query met een variable in.
					if (mysqli_stmt_bind_param($stmt,"s", $gebruikersnaam)) {

						if (mysqli_stmt_execute($stmt)) {

							mysqli_stmt_store_result($stmt);

							if (mysqli_stmt_num_rows($stmt) == 0) {

								// check of het een echte email is
								if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
								{

									// check of leeftijd klopt
									if (is_numeric($geboortedatum1) && 
										is_numeric($geboortedatum2) && 
										is_numeric($geboortedatum3) && 
										$geboortedatum1 <= 12 &&
										$geboortedatum1 >= 1 &&
										$geboortedatum2 <= 12 &&
										$geboortedatum2 >= 1 &&
										$geboortedatum3 <= date("Y") &&
										$geboortedatum3 >= 1910)
									{
										$geboortedatum = $geboortedatum3  . "-" . $geboortedatum2 . "-" . $geboortedatum1;
										// check of wachtwoorden gelijk zijn.
										if ($wachtwoord1 == $wachtwoord2) {

											/* wachtwoord heeft een minimum van 8 characters
											 * wachtwoord heeft minimaal 1 hoofdletter
											 * wachtwoord heeft minimaal 1 cijfer
											 * wachtwoord heeft minimaal 1 van de volgende characters !@#$%^&*-
											*/
											$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,40}$/';
											if(preg_match($pattern, $wachtwoord1)){


												// check of er niks anders dan letters, hoofdletters en spaties zijn
												if (preg_match("/([^0-9]*)([a-zA-Z])/", $straat)) {

													// haal spaces weg die naast elkaar staan
													$straat = preg_replace('/\s+/', ' ',$straat);

													$postcode = strtoupper($postcode);
													if (preg_match("/[1-9][0-9]{3}[A-Z]{2}/", $postcode)) {

														if (preg_match("/[\sA-Za-z0-9]/", $huintoegv)) {
															$voornaam =			mysqli_real_escape_string($mysqli, htmlentities($voornaam));
															$achternaam =		mysqli_real_escape_string($mysqli, htmlentities($achternaam));
															$geboortedatum =	mysqli_real_escape_string($mysqli, htmlentities($geboortedatum));
															$gebruikersnaam =	mysqli_real_escape_string($mysqli, htmlentities($gebruikersnaam));
															$wachtwoord =		hash('SHA512', mysqli_real_escape_string($mysqli, htmlentities($wachtwoord1)));
															$email =			mysqli_real_escape_string($mysqli, htmlentities($email));
															$stad =				mysqli_real_escape_string($mysqli, htmlentities($stad));
															$straat =			mysqli_real_escape_string($mysqli, htmlentities($straat));
															$huintoegv =		mysqli_real_escape_string($mysqli, htmlentities($huintoegv));
															$postcode =			mysqli_real_escape_string($mysqli, htmlentities($postcode));

															/*
															 * wat er uitlijndelijk gebeurt.
															 *
															 * maak een prepare statment
															 * berijd de prepare statment voor
															 * verbind ? in de query aan de opgegeven variabelen
															 * voer uit
															 */

															//lees het config-bestand
															require('../../config_beroeps2.inc.php');

															// haal spaces weg die naast elkaar staan
															$huintoegv = preg_replace('/\s+/', ' ',$huintoegv);
															
															$query = "INSERT INTO DAS_login
															(id, voornaam, achternaam, geboortedatum,
															gebruikersnaam, wachtwoord, email, stad,
															straat, hnt, postcode, level)
															VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

															// berijd prepare statment voor
															$stmt = mysqli_stmt_init($mysqli);

															// berijd statment voor
															if (mysqli_stmt_prepare($stmt, $query)) {
															
																// verbind de vraagtekens in de query met een variable in.
																if (mysqli_stmt_bind_param($stmt,"ssssssssss", $voornaam, $achternaam,
																$geboortedatum, $gebruikersnaam, $wachtwoord,
																$email, $stad, $straat, $huintoegv, $postcode)) {

																	if (mysqli_stmt_execute($stmt)) {

																		echo "<p class='no_error'> U bent sucsessvol aangemeld.</p>";

																	} else {
																		echo "<p class='error'>Er was een probleem we konden uw account niet aanmaken.</p>";
																	}
																} else {
																	echo "<p class='error'>INTERNAL ERROR kon de statments niet binden aan parameters.</p>";
																}

															} else {

																echo "<p class='error'>INTERNAL ERROR kon de parameter niet voorberijden</p>";

															}


														} else {
															echo "<p class='error'>De toevoeging/huisnummer die u gegeven hebt komt niet overeen met onze eisen.</p>";
														}
													} else {
														echo "<p class='error'>De postcode die u gegeven hebt komt niet overeen met onze eisen.</p>";
													}
												} else {
													echo "<p class='error'>De straat die u gegeven hebt komt niet overeen met onze eisen.</p>";
												}
											} else {
												echo "<p class='error'>De wachtwoorden heeft voldoet niet aan de eisen.</p>";
											}
										} else {
											echo "<p class='error'>De wachtwoorden komen niet met elkaar overeen.</p>";
										}
									} else {
										echo "<p class='error'>De geboortedatum die u ingevuld hebt is niet geldig.</p>";
									}
								} else {
									echo "<p class='error'>De email die u ingevuld hebt is niet geldig.</p>";
								}
							} else  {
								echo "<p class='error'>Gebruikersnaam bestaat al.</p>";
							}
						} else {
							echo "<p class='error'>INTERNAL ERROR er was een probleem met het uitvoeren.</p>";
						}
					} else {
						echo "<p class='error'>INTERNAL ERROR kon de statments niet binden aan parameters.</p>";
					}
				} else {
					echo "<p class='error'>INTERNAL ERROR kon de parameter niet voorberijden</p>";
				}
			} else {
				echo "<p class='error'>Gebruikersnaam bevond zich niet in de a-z, A-Z en 0-9 range.</p>";
			}
		} else {
			echo "<p class='error'>Er was iets niet ingevuld.</p>";
		}
	} else {

		echo "<p class='error'>Er was geen informatie verzonden.</p>";

	}

	?>
</body>
</html>
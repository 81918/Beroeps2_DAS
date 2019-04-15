<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../css/main.css">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap/bootstrap.css">
		<title></title>
		<style>
			form
			{
				display: inline-block;
			}
		</style>
	</head>
	<body id="aanmeld_back">
		<?php
		if($_SESSION['level'] == 0)
		{
			echo $_SESSION['level'];
		?>

		<!--Bootstrap-->
		<div class="container">
		    <div class="row">
		      	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			        <div class="card card-signin my-5">
			          	<div class="card-body">
				            <h5 class="card-title text-center">Aanmelden bij <b>De Aquarium Specialist</b></h5>
				            <!--Kelvin-->
				            <div class="aanmeld_verwerk.php">
									<form class="form-signin" action="aanmeld_verwerk.php" method="post" id="aanmeld">

										<!--Voornaam-->
												<td><b class="grey">*</b>Voornaam:</td>
												<td colspan="3">
													<input class="form-control" type="text" name="voornaam" placeholder="Voornaam" required autofocus>
												</td>
										<!--Achternaam-->
												<td><b class="grey">*</b>Achternaam:</td>
												<td colspan="3">
													<input type="text" name="achternaam" id="Achternaam" class="form-control" placeholder="Email address" required>
												</td>
										<!--Geboortedatum-->
												<td>Geboortedatum:</td>
												<td colspan="3">
													<input class="form-control" required type="date" name="geboortedatum" min="1900-01-01" max="<?php
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
										<!--Gebruikersnaam-->
												<td><b class="grey">*</b>Gebruikersnaam:</td>
												<td colspan="3"><input type="text" name="gebruikersnaam" maxlength="32" id="gebruikersnaam" class="form-control" placeholder="Gebruikersnaam" required></td>
										<!--Wachtwoord-->
												<td><b class="grey">*</b>Wachtwoord:</td>
												<td colspan="3"><input type="password" name="wachtwoord" maxlength="40" id="wachtwoord" class="form-control" placeholder="Wachtwoord" required></td>
										<!--E-mail-->
												<td><b class="grey">*</b>E-mail:</td>
												<td colspan="3"><input type="email" name="email" maxlength="50" id="email" class="form-control" placeholder="E-mail" required></td>
										<!--Land-->

												<td>Land:</td>
												<td colspan="3"><input type="text" name="land" maxlength="40" id="land" class="form-control" placeholder="Land" required></td>
										<!--Provincie-->
												<td>Provincie:</td>
												<td colspan="3"><input type="text" name="provincie" maxlength="40" id="provincie" class="form-control" placeholder="Provincie" required></td>

										<!--Stad-->
												<td>Stad:</td>
												<td colspan="3"><input type="text" name="stad" maxlength="40" id="stad" class="form-control" placeholder="Stad" required></td>

										<!--Postcode & Huisnummer-->	
											<div>
												<td><b class="grey">*</b>Postcode:</td>
												<td><input type="text" maxlength="6" name="postcode"  size="4" id="postcode" class="form-control " placeholder="Postcode" required></td>
												</div>
												<div>
												<td><b class="grey">*</b>Huisnummer en toevoeging:</td>
												<td><input type="text" name="ht" maxlength="5"  size="2" id="ht" class=" form-control" placeholder="Huisnummer" required></td>
												</div>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><input type="submit" name="submit" value="meld aan" class="btn btn-lg btn-primary btn-block text-uppercase"></td>
											
										
									</form>
									<hr class="my-4">
				            		<h5 class="text-center">Al een account?</h5><a class="nav-link" href="login.php">
				            		<button href="login.php" class="btn btn-lg btn-danger btn-block">Inloggen</button></a>
								</div>















				            <!--
								<div class="aanmeld_verwerk.php">
									<form class="form-signin" action="aanmeld_verwerk.php" method="post" id="aanmeld">
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
												<td colspan="3"><input type="date" name="geboortedatum" min="1900-01-01" max="<?php/*
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
													}*/
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
								</div>-->
				          	</div>
				        </div>
			      	</div>
			    </div>
		  	</div
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
	<script src="../../js/jquery-3.3.1.js"></script>
</html>
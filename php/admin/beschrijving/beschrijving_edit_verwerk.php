<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="../../../index.php">Home</a></li>
				<li><a href="../product/product_toevoeg.php">Product toevoegen</a></li>
				<li><a href="../uitlees_admin.php">Uitlees</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
	<?php
	if ($_SESSION['level'] == 2) {
		require('../../../config_beroeps2.inc.php');

		if (isset($_POST['submit'])) {
			
			// variablen
			$beschrijving = $_POST['beschrijving'];
			$id = $_POST['id'];

			// check of de key van het formulier is opgestuurd en het zelfe is het session variable
			if (isset($_SESSION['token']) && $_SESSION['token'] == $_POST['csrf_token']) {

				// check of input velden niet leeg zijn
				if (!empty($_POST['beschrijving']) && !empty($_POST['id'])) {

					// check of de id wel een nummer is
					if (is_numeric($id)) {

						// variablen
						$beschrijving = mysqli_real_escape_string($mysqli, htmlentities( $_POST['beschrijving'] ) );

						// query
						$query = "SELECT * FROM DAS_productbeschrijving WHERE product_id = ?";

						// maak prepare statment
						$stmt = mysqli_stmt_init($mysqli);

						// voorberijden op prepare statment
						if (mysqli_stmt_prepare($stmt, $query)) {
							
							mysqli_stmt_bind_param($stmt, "i", $id);

							$result1 = mysqli_stmt_execute($stmt);
							// check of query niet is uigevoerd
							if (!$result1) {

								echo "<p class='error'>Er ging iets fout, beschrijving kon niet gevonden worden!</p>";

							} else {
								// check of de query succesvol is uit gevoerd
								if ($result1) {

									// query
									$query2 = "UPDATE DAS_productbeschrijving SET beschrijving = ? WHERE product_id = ?";

									// voorberijden op prepare statment
									if (mysqli_stmt_prepare($stmt, $query2)) {
										
										// verbind variable met prepare statements
										mysqli_stmt_bind_param($stmt, "si", $beschrijving, $id);

										// voer de query uit
										$result2 = mysqli_stmt_execute($stmt);

										// check of het goed is uitgevoerd
										if ($result2) {

											echo "<p class='no_error'>Beschrijving is veranderd.</p>";

										} else {

											echo "<p class='error'>Er ging iets fout, beschrijving kon niet veranderd worden!</p>";

										}
									} else {

										echo "<p class='error'>Kon geen voorberijding maken op prepare statement</p>";
									}
								} else {

									echo "<p class='error'>Kon geen voorberijding maken op prepare statement</p>";
								}
							} 
						} else {

							echo "<p class='error'>Dit product bestaat niet!</p>";

						}
					} else {

						echo "<p class='error'>Het product bestaat niet.</p>";

					}
				} else {

					echo "<p class='error'>Er ontbreekt iets waar van we de gegevends binnen hebben gekregen.</p>";

				}
			} else {
				echo "<p class='error'>U heeft het formulier niet ingevuld.</p>";
			}
		} else {

			echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";

		}
	} else {
		echo "<h1>OOPS!</h1>";
		echo "<p class='error'>U hoord hier niet te zijn! <a href='../index.php'>ga naar home</a></p>";
	}

	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
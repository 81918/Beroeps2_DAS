<?php 
session_start();

// maak een encrypted key
$token = bin2hex(openssl_random_pseudo_bytes(32));

// zet de key in een session
$_SESSION['token'] = $token;

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
		// de id die je krijg via link
		if (!empty($_GET['id']) && isset($_GET['id'])) {

			// check of het id wel een nummer is 
			$id = $_GET['id'];
			if (is_numeric($id)) {
				require('../../../config_beroeps2.inc.php');

				//de query
				$query = "SELECT `product_id`, `beschrijving` FROM DAS_productbeschrijving WHERE product_id = ?";

				// maak prepare statment
				$stmt = mysqli_stmt_init($mysqli);

				// voorberijden op prepare statment
				if (mysqli_stmt_prepare($stmt, $query)) {
					
					mysqli_stmt_bind_param($stmt, "i", $id);

					$result = mysqli_stmt_execute($stmt);

					// voer uit als de query succes vol is uitgevoerd
					if($result) {

						mysqli_stmt_store_result($stmt);

						// tel de aantal row die je binnen krijgss
						if (mysqli_stmt_num_rows($stmt) == 1) {

							// zet de statments in een variable
							mysqli_stmt_bind_result($stmt, $fid, $fbeschrijving);

							// voeg alles wat je binnen krijg in een array
							mysqli_stmt_fetch ($stmt);

							// form
							?>

							<form action="beschrijving_edit_verwerk.php" method="post" id="beschrijving">
							<input type="number" name="id" value="<?php echo $fid; ?>" hidden>
							<input type="text" name="csrf_token" value="<?php echo $token; ?>" hidden>

							<table>
							<tr>
							<td><textarea name="beschrijving" form="beschrijving"><?php echo html_entity_decode($fbeschrijving);?></textarea></td>
							<td><input type="submit" name="submit" value="Verander beschrijving"></td>
							</tr>
							</table>

							</form>

							<?php
						} else {

							echo "<p class='error'>Er is geen beschrijving! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";

						}
					} else {

						echo "<p class='error'>Er is iets fouts gegaan! We konden geen informatie opvragen.</p>";

					}
				} else {

					echo "<p class='error'>Er is iets mis gegaan! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";

				}
			} else {

				echo "<p class='error'>Er is iets mis gegaan! Id is geen nummer.</p>";

			}
		} else {

			echo "<p class='error'>Er is iets mis gegaan! We hebben geen product id gekregen.</p>";

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
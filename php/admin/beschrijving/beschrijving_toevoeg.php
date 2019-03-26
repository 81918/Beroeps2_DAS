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
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="product/product_toevoeg.php">Product toevoegen</a></li>
				<li><a href="uitlees_admin.php">Uitlees</a></li>
			</ul>
		</nav>
	</header>
	<main>
	<?php
		if ($_SESSION['level'] == 2) {

			$id = $_GET['id'];
			if (is_numeric($id)) {
				require('../../../config_beroeps2.inc.php');

				// check of id is ingevuld
				if (!empty($id) && isset($id)) {
					// query zoek de product
					$query1 = "SELECT product_id FROM DAS_products WHERE `id` = " . $id;

					// voer de query uit
					$result1 = mysqli_query($mysqli, $query1);

					// check of er precies 1 product is
					if (mysqli_num_rows($result1) == 1) {

						// query zoek de beschrijving
						$query2 = "SELECT * FROM DAS_productbeschrijving WHERE `product_id` = " . $id;

						// check of de query succesvol is uitgevoerd
						$result2 = mysqli_query($mysqli, $query2);

						// check of result goed is uitgevoe
						if ($result2) {

							// check of er geen beschrijvingen zijn
							if (mysqli_num_rows($result2) == 0) {

								$row = mysqli_fetch_array($result2);

								// form
								?>
								<form action="beschrijving_toevoeg_verwerk.php" method="post" id="beschrijving">
									<input type="number" name="id" value="<?php echo $row['product_id']; ?>" hidden>
									<input type="text" name="csrf_token" value="<?php echo $token; ?>" hidden>
									<table>
										<tr>
										<td><textarea name="beschrijving" form="beschrijving"></textarea></td>
										</tr>
										<tr>
											<td><input type="submit" name="submit" value="Voeg beschrijving toe"></td>
										</tr>
									</table>
								</form>
								<?php
							} else {

								echo "<p class='error'>Dit product heeft al een beschrijving!</p>";

							}
						} else {
							echo "<p class='error'>Er is een probleem! Query kan word niet goed uitgevoerd.</p>";
						}
					} else {
						echo "<p class='error'>Er is een probleem! We hebben geen ID gekregen.</p>";
					}
				} else {

					echo "<p class='error'>Product bestaat niet!</p>";

				}
			} else {
				echo "<p class='error'>Er is een probleem! De id die is opgegeven is geen nummer</p>";
			}
		} else {
		echo "<h1>OOPS!</h1>";
		echo "<p class='error'>U hoord hier niet te zijn! <a href='../index.php'>ga naar home</a></p>";
		}
	?>
	</main>
</body>
</html>
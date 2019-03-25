<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	require('config_beroeps2.inc.php');

	// variablen
	$id = $_GET['id'];

	// query zoek de product
	$query1 = "SELECT * FROM DAS_products WHERE id = $id";

	// voer de query uit
	$result1 = mysqli_query($mysqli, $query1);

	// check of er precies 1 product is
	if (mysqli_num_rows($result1) == 1) {

		// query zoek de beschrijving
		$query2 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = $id";

		// check of de query succesvol is uitgevoerd
		$result2 = mysqli_query($mysqli, $query2);

		// check of er geen beschrijvingen zijn
		if (mysqli_num_rows($result2) == 0) {

			// form
			echo "<form action='beschrijving_toevoeg_verwerk.php' method='post' id='beschrijving'>";
			echo "<input type='number' name='id' value='$id' hidden>";
			echo "<table>";
			echo "<tr><td><textarea name='beschrijving' form='beschrijving'></textarea></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='Voeg beschrijving toe'></td></tr>";
			echo "</form>";
			echo "</table>";

		} else {

			echo "<p class='error'>Dit product heeft al een beschrijving!</p>";

		}
	} else {

		echo "<p class='error'>Product bestaat niet!</p>";

	}
	?>
</body>
</html>
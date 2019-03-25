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
				<li><a href="../../index.php">Home</a></li>
				<li><a href="../product/product_toevoeg.php">Product toevoegen</a></li>
				<li><a href="../specificatie/spec_toevoeg.php">Specificatie toevoegen</a></li>
				<li><a href="../uitlees_admin.php">Uitlees</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
	<?php
	// de id die je krijg via link
	$id = $_GET['id'];

	require('config_beroeps2.inc.php');

	//de query
	$query = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $id;

	// voer de query uit
	$result = mysqli_query($mysqli, $query);

	// voer uit als de query succes vol is uitgevoerd
	if($result) {
		// tel de aantal row die je binnen krijg
		if (mysqli_num_rows($result) == 1) {

			// voeg alles wat je binnen krijg in een array
			$beschrijving = mysqli_fetch_array($result);

			// form
			echo "<form action='beschrijving_edit_verwerk.php' method='post' id='beschrijving'>";
			echo "<input type='number' name='id' value='$id' hidden>";

			echo "<table>";
			echo "<tr>";
			echo "<td><textarea name='beschrijving' form='beschrijving'>" . $beschrijving['beschrijving'] . "</textarea></td>";
			echo "<td><input type='submit' name='submit' value='Verander beschrijving'></td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
		} else {

			echo "<p class='error'>Er is geen beschrijving! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
		}
	} else {

		echo "<p class='error'>Er is iets mis gegaan! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";

	}
	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
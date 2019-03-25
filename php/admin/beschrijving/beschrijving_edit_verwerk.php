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
				<li><a href="../index.php">Home</a></li>
				<li><a href="product_toevoeg.php">Product toevoegen</a></li>
				<li><a href="spec_toevoeg.php">Specificatie toevoegen</a></li>
				<li><a href="uitlees_admin.php">Uitlees</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
	<?php

	require('config_beroeps2.inc.php');

	if (isset($_POST['submit'])) {
		
		// variablen
		$beschrijving = $_POST['beschrijving'];
		$id = $_POST['id'];
		
		// check of de id wel een nummer is
		if (is_numeric($id)) {

			if (strlen($beschrijving) > 0) {

				// query
				$query1 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $id;
				
				// voer de query uit
				$result1 = mysqli_query($mysqli, $query1);

				// check of de query succesvol is uit gevoerd
				if ($result1) {

					// check of er precies 1 resultaat is 
					if (mysqli_num_rows($result1) == 1) {

						// query
						$query2 = sprintf("UPDATE DAS_productbeschrijving SET beschrijving = '%s' WHERE product_id = '%s'",  mysqli_real_escape_string($beschrijving), mysqli_real_escape_string($id));

						// voer de query uit
						$result2 = mysqli_query($mysqli, $query2);

						// check of het goed is uitgevoerd
						if ($result2) {
							echo "<p class='no_error'>Beschrijving is veranderd.</p>";
						} else {
							echo "<p class='error'>Er ging iets fout, beschrijving kon niet veranderd worden!</p>";
						}
					} else {
						echo "<p class='error'>Er klopt iets niet 0 of meer dan 1 product gevonden!</p>";
					}
				} else {
					echo "<p class='error'>Dit product bestaat niet!</p>";
				}
			} else {
				echo "<p class='error'>We missen een beschrijving.</p>";
			}
		} else {
			echo "<p class='error'>Het product bestaat niet.</p>";
		}
	} else {
		echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";
	}
	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
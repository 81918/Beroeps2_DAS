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
	$id = $_GET['id'];
	require('config_beroeps2.inc.php');
	$query = "SELECT * FROM De_aquarium_specialist_productbeschrijving WHERE product_id = " . $id;
	$result = mysqli_query($mysqli, $query);
	if($result)
	{
		if (mysqli_num_rows($result) == 1)
		{
			$beschrijving = mysqli_fetch_array($result);
			echo "<form action='beschrijving_edit_verwerk.php' method='post' id='beschrijving'>";
			echo "<input type='number' name='id' value='$id' hidden>";
			echo "<p><textarea name='beschrijving' form='beschrijving'>" . $beschrijving['beschrijving'] . "</textarea></p>";
			echo "<p><input type='submit' name='submit' value='Verander beschrijving'></p>";
			echo "</form>";
		}
		else
		{
			echo "<p class='error'>Er is geen beschrijving! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
		}
	}
	else
	{
		echo "<p class='error'>Er is iets mis gegaan! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";

	}
	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
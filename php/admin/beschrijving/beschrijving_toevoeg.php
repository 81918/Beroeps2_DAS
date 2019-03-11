<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	require('config_beroeps2.inc.php');
	$id = $_GET['id'];
	$query1 = "SELECT * FROM De_aquarium_specialist_shop_products WHERE id = $id";
	$result1 = mysqli_query($mysqli, $query1);
	if (mysqli_num_rows($result1) == 1)
	{
		$query2 = "SELECT * FROM De_aquarium_specialist_productbeschrijving WHERE product_id = $id";
		$result2 = mysqli_query($mysqli, $query2);
		if (mysqli_num_rows($result2) == 0)
		{
			echo "<form action='beschrijving_toevoeg_verwerk.php' method='post' id='beschrijving'>";
			echo "<input type='number' name='id' value='$id' hidden>";
			echo "<table>";
			echo "<tr><td><textarea name='beschrijving' form='beschrijving'></textarea></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='Voeg beschrijving toe'></td></tr>";
			echo "</form>";
			echo "</table>";
		}
		else
		{
			echo "<p class='error'>Dit product heeft al een beschrijving!</p>";
		}
	}
	else
	{
		echo "<p class='error'>Product bestaat niet!</p>";
	}
	?>
</body>
</html>
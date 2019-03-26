<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if(isset($_POST['submit']))
	{
		require_once('config_beroeps2.inc.php'); 
		$id = $_POST['id'];
		$product_naam = $_POST['product_naam'];
		$product_nummer = $_POST['product_nummer'];
		$prijs = $_POST['prijs'];

		$query = "UPDATE DAS_products SET product_naam = '$product_naam', prijs = $prijs, product_nummer = $product_nummer WHERE id = $id";

		$result = mysqli_query($mysqli, $query);
		if($result)
		{
			echo "<p class='no_error'>het product is veranderd!</p>";
		}
		else
		{
			echo "<p class='error'>Er was een probleem met het verandere van het product.</p>";
			var_dump($_POST);
			echo $query;
		}
	}
	else
	{
		echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";
	}
	?>
</body>
</html>
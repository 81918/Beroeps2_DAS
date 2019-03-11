<!DOCTYPE html>
<html>
<head>
	<title>product edit</title>
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
	if (isset($_POST['submit']))
	{
		$id 			= $_POST['id'];
		$spec_categorie	= $_POST['spec_categorie'];
		$spec_naam		= $_POST['spec_naam'];
		$spec 			= $_POST['spec'];
		if (is_numeric($id))
		{
			$query1 = "SELECT * FROM De_aquarium_specialist_shop_product_specificaties WHERE product_id = " . $id;
			$result1 = mysqli_query($mysqli, $query1);
			if (mysqli_num_rows($result1) >= 1)
			{
				foreach ($spec_categorie AS $key => $value)
				{
					$query = "UPDATE De_aquarium_specialist_shop_product_specificaties
							SET spec_categorie = '"
							. $mysqli->real_escape_string($value) .
							"', spec_naam = '"
							. $mysqli->real_escape_string($spec_naam[$key]) .
							"', spec = '"
							. $mysqli->real_escape_string($spec[$key]) .
							"' WHERE id = " . $mysqli->real_escape_string($id[$key]);

					if(mysqli_query($mysqli, $query))
					{
						echo "<p class='no_error'>" . $spec_naam[$key] . " is toegevoegd.</br></p>";
					}
					else
					{
						echo"<p class='error'>Het is niet gelukt of het ingevulde vlak was het zelfde gehouden.</p>";
					}
				}
			}
			else
			{
				echo "<p class='error'>Dit product bestaat niet!</p>";
			}
		}
		else
		{
			echo "<p class='error'>Het product bestaat niet.</p>";
		}
	}
	else
	{
		echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";
	}
	?>

	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
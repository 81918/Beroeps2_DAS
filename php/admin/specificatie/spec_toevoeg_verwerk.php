<!DOCTYPE html>
<html>
<head>
	<title>Specificatie toevoegen melding</title>
	<link rel="stylesheet" href="">
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
	if (isset($_POST['submit']))
	{
		require_once('config_beroeps2.inc.php');
		//variables 
		$spec_categorie	=	$_POST['spec_categorie'];
		$spec_naam		=	$_POST['spec_naam'];
		$spec			=	$_POST['spec'];
		$product_id		=	$_POST['product_id'];
		
		//check of id wel een nummer is
		if (is_numeric($product_id))
		{	
			//Voor elk veld dat toegevoegt is doe dit
			foreach ($spec_categorie AS $key => $value)
			{
				$query = "INSERT INTO DAS_specificaties(spec_categorie,spec_naam,spec,product_id)
				VALUES ('"
				. $mysqli->real_escape_string($value) .
				"','"
				. $mysqli->real_escape_string($spec_naam[$key]) .
				"','"
				. $mysqli->real_escape_string($spec[$key]) .
				"','" . $product_id . "')";
				
				//check of de query sucessvol is uitgevoerd
				if(mysqli_query($mysqli, $query))
				{
					echo "<p class='no_error'>" . $spec_naam[$key] . " is toegevoegd.</br></p>";
				}
				else
				{
					var_dump($_POST);
					echo "<p class='error'>Er was een fout met het toevoegen van, " . $spec_naam[$key] . "</p>";
				}
			}
		}
		else
		{
			var_dump($product_id);
			echo "<p class='error'>ID was geen nummer.</p>";
		}
	}
	else
	{
		echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";
	}
	?>
		<p>click <a href="uitlees_admin.php">hier</a> om naar uitlees te gaan.</p>
	</main>
	<footer>
		
	</footer>
</body>
</html>
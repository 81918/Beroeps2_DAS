<!DOCTYPE html>
<html>
<head>
	<title>product toevoegen melding</title>
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
		require_once('config_beroeps2.inc.php'); 
			if (isset($_POST['submit']))
			{
				// variablen
				$product_naam			= $_POST['product_naam'];
				$prijs					= $_POST['prijs'];
				$product_nummer			= $_POST['product_nummer'];

				//check of velden zijn ingevult
				if (strlen($product_naam) > 0)
				{
					// komma's weghalen
					$prijs1 = explode(',', $prijs);
					$prijs2 = $prijs1[0] . $prijs1[1] . $prijs1[2];

					//controleer of het een nummer is
					if (is_numeric($prijs2))
					{
						if (is_numeric($product_nummer))
						{
							$query = "INSERT INTO DAS_products (id ,product_naam ,prijs ,product_nummer) VALUES (NULL ,'$product_naam','$prijs2','$product_nummer')";
							//controleer of query is uitgevoerd
							if (mysqli_query($mysqli, $query))
							{
								echo "<p class='no_error'>" . $product_naam . " is toegevoegd.</p>";
							}
							else
							{
								echo "<p class='error'>Er ging iets fout: " . $product_naam . " is niet toegevoegd.</p>";
							}
						}
						else
						{
							echo "<p class='error'>" . $product_nummer . " is geen nummer.</p>";
						}
					}
					else
					{
						echo "<p class='error'>" . $prijs . " is geen nummer.</p>";
					}
				}
				else
				{
					echo "<p class='error'>Er iets was niet ingevuld!</p>";
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
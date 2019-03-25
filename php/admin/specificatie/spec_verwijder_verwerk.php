<?php
	$product_id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Specificatie verwijder</title>
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
		$specs = $_POST['specs'];
		foreach ($specs AS $key => $value)
			{
				if (is_numeric($specs[$key]))
				{
					require_once('config_beroeps2.inc.php');

					$query1 = "SELECT * FROM DAS_specificaties WHERE id = '" . $mysqli->real_escape_string($specs[$key]) . "'";
					if($result = mysqli_query($mysqli, $query1))
					{
						$row = mysqli_fetch_array($result);

						$query2 = "DELETE FROM DAS_specificaties WHERE id = '" . $mysqli->real_escape_string($specs[$key]) . "'";

						if(mysqli_query($mysqli, $query2))
						{
							echo "<p class='no_error'>specificatie categorie: " . $row['spec_categorie'] . " - specificatie naam: " . $row['spec_naam'] . " - specificatie: " . $row['spec'] . " is verwijderd.</p>";
						}
						else
						{
							echo"<p class='error'>specificatie categorie: " . $row['spec_categorie'] . " - specificatie naam: " . $row['spec_naam'] . " - specificatie: " . $row['spec'] . " is verwijderd. kon niet verwijderd worden.</p>";
						}
					}
					else
					{
						echo "<p class='error'>Kon geen specificaties vinden.</p>";
					}
				}
				else
				{
					echo "<p class='error'>" . $specs[$key] . " is geen key.</p>";
				}
			}
	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
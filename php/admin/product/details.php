<?php
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>product details</title>
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
		require_once('../../config_beroeps2.inc.php');
		$query = "SELECT * FROM DAS_products WHERE id = '" . $id . "'";
		if($result = mysqli_query($mysqli, $query))
		{
			if (mysqli_num_rows($result) == 1)
			{
				echo "<table>";
				echo "<tr>";
				echo "<td>Product naam:</td>";
				echo "<td>Prijs:</td>";
				echo "<td>product nummer</td>";
				echo "</tr>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['product_naam'] . "</td>";
					echo "<td>" . $row['prijs'] . "</td>";
					echo "<td>" . $row['product_nummer'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<p class='error'>Kon geen details vinden. <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
			}
		}

		$query2 = "SELECT * FROM DAS_specificaties WHERE product_id = " . $id . " GROUP BY spec_categorie";
		if($result2 = mysqli_query($mysqli, $query2))
		{
			if (mysqli_num_rows($result) >= 1)
			{
				echo "<table>";
				echo "<tr>";
				echo "<td>Category:</td>";
				echo "<td>Specificatie naam:</td>";
				echo "<td>Specificatie:</td>";
				echo "</tr>";
				while ($row2 = mysqli_fetch_array($result2))
				{
					echo "<tr>";
					echo "<td>" . $row2['spec_categorie'] . "</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "</tr>";
					$query3 = "SELECT * FROM DAS_specificaties WHERE spec_categorie = '" . $row2['spec_categorie'] . "'";
					if($result3 = mysqli_query($mysqli, $query3))
					{
						while ($row3 = mysqli_fetch_array($result3))
						{
							echo "<tr>";
							echo "<td>&nbsp;</td>";
							echo "<td>" . $row3['spec_naam'] . "</td>";
							echo "<td>" . $row3['spec'] . "</td>";
							echo "</tr>";
						}
					}
				}
			echo "</table>";
			}
			else
			{
				echo "<p class='error'>Kon geen specificaties vinden. <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
			}
		}
		?>

	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
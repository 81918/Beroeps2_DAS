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
	$id = $_GET['id'];
	require('config_beroeps2.inc.php');

	$query = "SELECT * FROM DAS_specificaties WHERE product_id = " . $id;
	$result = mysqli_query($mysqli, $query);
	if($result)
	{
		if (mysqli_num_rows($result) >= 1)
		{
			$query = "SELECT * FROM DAS_specificaties WHERE product_id = " . $id;
			if($result = mysqli_query($mysqli, $query))
			{
				if (mysqli_num_rows($result) >= 1)
				{
					echo "<form action='spec_edit_verwerk.php' method='post'>";
					echo "<input type='number' name='id' value='$id' hidden>";
					echo "<table>";
					while($row = mysqli_fetch_array($result))
					{

						echo "<tr>";
						echo "<td><input type='text' name='spec_categorie[]' value='" . $row['spec_categorie'] . "' maxlength='42' required></td>";
						echo "<td><input type='text' name='spec_naam[]' value='" . $row['spec_naam'] . "' maxlength='42' required></td>";
						echo "<td><input type='text' name='spec[]' value='" . $row['spec'] . "' maxlength='42' required></td>";
						echo "</tr>";
					}
					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td><input type='submit' name='submit' value='submit'></td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				}
				else
				{
					echo "<p class='error'>Kon geen specificaties vinden. <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
				}
			}
		}
		else
		{
			echo "<p class='error'>Er zijn geen specificaties! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
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
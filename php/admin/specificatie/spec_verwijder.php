<?php
	$id = $_GET['id'];
?>
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
		$query = "SELECT * FROM DAS_specificaties WHERE product_id = " . $id;
		if($result = mysqli_query($mysqli, $query))
		{
			if (mysqli_num_rows($result) >= 1)
			{
			echo "<form action='spec_verwijder_verwerk.php' method='post'>";
			echo "<table>";
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td><input type='text' value='" . $row['spec_categorie'] . "' readonly></td>";
				echo "<td><input type='text' value='" . $row['spec_naam'] . "'readonly></td>";
				echo "<td><input type='text' value='" . $row['spec'] . "' readonly></td>";
				echo "<td><input type='checkbox' name='specs[]' value='" . $row['id'] . "'></td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td>&nbsp;</td>";
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
	?>
		<p>click <a href="uitlees_admin.php">hier</a> om naar uitlees te gaan.</p>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
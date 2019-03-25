<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>product toevoegen melding</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<style type="text/css">
		.icon
		{
			width: 16px;
			height: 16px;
		}
		td 
		{
			padding: 10px 10px 0px;
		}
	</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="product/product_toevoeg.php">Product toevoegen</a></li>
				<li><a href="uitlees_admin.php">Uitlees</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
	
		<?php
		if ($_SESSION['level'] == 2) {

			require_once('../../config_beroeps2.inc.php');
			$query = "SELECT * FROM DAS_products";

			if($result = mysqli_query($mysqli, $query)) {
				echo "<table>";
				echo "<tr>";
				echo "<td>Product naam:</td>";
				echo "<td>Prijs:</td>";
				echo "<td>product nummer</td>";
				echo "<td>Product:</td>";
				echo "<td>Specificaties</td>";
				echo "<td>Beschrijving:</td>";
				echo "</tr>";

				while($row = mysqli_fetch_array($result)) {

					echo "<tr>";
					echo "<td>" . $row['product_naam'] . "</td>";
					echo "<td>" . $row['prijs'] . "</td>";
					echo "<td>" . $row['product_nummer'] . "</td>";

					echo "<td>";
					echo "<a href='product/product_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
					echo "<a href='product/details.php?id=" . $row['id'] . "'><img src='../../icons/icon-details.png' alt='details' class='icon'></a> ";
					echo "<a href='product/picture/picture.php?id=" . $row['id'] . "'><img src='../../icons/icon-pictures.png' alt='pictures' class='icon'></a> ";
					echo "<a href='product/product_verwijder.php?id=" . $row['id'] . "'><img src='../../icons/icon-delete.png' alt='delete' class='icon'></a>";
					echo "</td>";

					echo "<td>";
					echo "<a href='specificatie/spec_toevoeg.php?id=" . $row['id'] . "'><img src='../../icons/icon-add.png' alt='add' class='icon'></a>";
					echo " ";
					echo "<a href='specificatie/spec_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
					echo "<a href='specificatie/spec_verwijder.php?id=" . $row['id'] . "'><img src='../../icons/icon-delete.png' alt='delete' class='icon'></a>";
					echo "</td>";

					echo "<td>";

					$query1 = "SELECT * FROM DAS_products WHERE id =" . $row['id'];
					$result1 = mysqli_query($mysqli, $query1);

					if (mysqli_num_rows($result1) == 1) {

						$query2 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $row['id'];
						$result2 = mysqli_query($mysqli, $query2);

						if (mysqli_num_rows($result2) == 0) {

							echo "<a href='beschrijving/beschrijving_toevoeg.php?id=" . $row['id'] . "'><img src='../../icons/icon-add.png' alt='add' class='icon'></a> ";

						}

						$query3 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $row['id'];
						$result3 = mysqli_query($mysqli, $query3);

						if (mysqli_num_rows($result3) == 1) {

							echo "<a href='beschrijving/beschrijving_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
						}
					}
				
					echo "</td>";
					echo "";
				}
				echo "<table>";
			}
		}
		else
		{
			echo "<h1>OOPS!</h1>";
			echo "<p class='error'>U hoord hier niet te zijn! <a href='../../index.php'>ga naar home</a></p>";
		}
		?>

	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
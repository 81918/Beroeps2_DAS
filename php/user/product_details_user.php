<?php
	session_start();
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="view_cart.php">view cart</a>
	<?php

		require('config_beroeps2.inc.php');

		/*___________________________________
		 |
		 | laat het product zien
		 |
		 *___________________________________*/
		$query = "SELECT * FROM DAS_products WHERE id = '" . $id . "'";
		if($result = mysqli_query($mysqli, $query))
		{
			if (mysqli_num_rows($result) == 1)
			{

				while($row = mysqli_fetch_array($result))
				{
					echo "<div>";
					echo "<p>" . $row['product_naam'] . "</p>";
					echo "<p>" . $row['prijs'] . "</p>";
					echo "<p>" . $row['product_nummer'] . "</p>";
					echo "</div>";
				}
				$query2 = "SELECT * FROM DAS_specificaties WHERE product_id = " . $id . " GROUP BY spec_categorie";


				/*___________________________________
				 |
				 | maak een winkelwagen
				 |
				 *___________________________________*/

				if(!isset($_SESSION['winkelwagen']))
				{
					$_SESSION['winkelwagen'] = array();
				}
				echo "<form action='' method='post'>";
				echo "<input type='hidden' name='product_id' value='" . $id . "'>";
				echo "<input type='number' name='aantal'>";
				echo "<input type='submit' name='toevoeg_winkelwagen' value='voeg aan winkelwagen toe'>";
				echo "<form>";

				/*___________________________________
				 |
				 | toevoegen aan winkelwagen
				 |
				 *___________________________________*/
				if(isset($_POST['toevoeg_winkelwagen']))
				{
					$product_id = $_POST['product_id'];
					if(isset($_SESSION['winkelwagen'][$product_id]))
					{
						echo "<p class='error'>Dit product is al toegevoegd aan uw winkelwagen.</p>";
					}
					else
					{
						$_SESSION['winkelwagen'][$product_id]['product_id'] = $_POST['product_id'];
						$_SESSION['winkelwagen'][$product_id]['aantal'] = $_POST['aantal'];
						echo "<p>Dit product is toegevoegd aan uw winkelwagen!</p>";
					}
				}
				/*___________________________________
				 |
				 | Laat specifiacties zien
				 |
				 *___________________________________*/
				$result2 = mysqli_query($mysqli, $query2);
				if (mysqli_num_rows($result2) >= 1)
				{
					echo "<table>";
					echo "<tr>";
					echo "<td><h1>Specificaties</h1></td>";
					echo "</tr>";
					while ($row2 = mysqli_fetch_array($result2))
					{
						echo "<tr>";
						echo "<td>" . $row2['spec_categorie'] . "</td>";
						echo "<td>&nbsp;</td>";
						echo "<td>&nbsp;</td>";
						echo "</tr>";
						$query3 = "SELECT * DAS_specificaties WHERE spec_categorie = '" . $row2['spec_categorie'] . "'";
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
		}
		else
		{
			echo "<p class='error'>Kon geen details vinden. <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
		}
	?>
</body>
</html>
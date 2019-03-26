<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main><h1 style="text-align: center;">View cart</h1>
	<?php
	if (empty($_SESSION['winkelwagen']))
		{
			echo "<p class='error'>Uw winkelwagen is leeg.</p>";
		}
		else 
		{
			require('config_beroeps2.inc.php');
			echo "<a href='view_cart.php?leeg_winkelwagen=1'>leeg winkelwagen</a>
				<form action='' method='post'>
				<table>
				<thead>
				<tr>
				<th>Product:</th>
				<th>Product prijs:</th>
				<th>Aantal:</th>
				<th>Prijs:</th>
				</tr>
				</thead>";
			$totale_prijs = 0;
			foreach($_SESSION['winkelwagen'] as $id=> $product)
			{
				echo "<tr>";
				$query = "SELECT * FROM DAS_products WHERE id = " . $product['product_id'];
				$result = mysqli_query($mysqli, $query);
				$data = mysqli_fetch_array($result);

				$totale_prijs += $data['prijs'] * $product['aantal'];
				
				echo "<td>" . $data['product_naam'] . "</td>"; 
				echo "<td>" . $data['prijs'] . "</td>"; 
				echo "<td>" . $product['aantal'] . "<input type='hidden' name='product_id[]' value='" . $product['product_id'] . "'></td>";
				echo "<td>" . ($data['prijs'] * $product['aantal']) . "</td>"; 
				echo "</tr>";
			}
			echo "<tr>
				<td><input type='submit' name='update_cart' value='werk  bij'></td>
				</tr>
				</table>
				</form>";
			echo "<p>Totale prijs: " . $totale_prijs . "</p>";
			
		}
	?>
	</main>
</body>
</html>
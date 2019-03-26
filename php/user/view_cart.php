<?php
	session_start();
	error_reporting(1);
	ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
		<h1 style="text-align: center;">View cart</h1>
		<?php
		require('config_beroeps2.inc.php');
		/*___________________________________
		 |
		 | update winkelwagen
		 |
		 *___________________________________*/
		if (isset($_POST['update_cart']))
		{
			$producten = $_POST['product_id'];
			$aantallen = $_POST['aantal'];
			foreach($aantallen as $id=> $aantal)
			{	
				$product = $producten[$id];
				$_SESSION['winkelwagen'][$product]['aantal'] = $aantal;
				echo "<p>ID: $producten[$id] - Aantal: $aantal</p>";
			}
		}
		/*___________________________________
		 |
		 | check of winkel wagen niet leeg is
		 |
		 *___________________________________*/
		if (empty($_SESSION['winkelwagen']))
		{
			echo "<p class='error'>Uw winkelwagen is leeg.</p>";
		}
		else 
		{
			echo "<a href='view_cart.php?leeg_winkelwagen=1'>leeg winkelwagen</a>
				<form action='' method='post'>
				<table>
				<thead>
				<tr>
				<th>Product:</th>
				<th>Aantal:</th>
				</tr>
				</thead>";
			foreach($_SESSION['winkelwagen'] as $id=> $product)
			{
				echo "<tr>";
				$query = "SELECT * FROM De_aquarium_specialist_shop_products WHERE id = " . $product['product_id'];
				$result = mysqli_query($mysqli, $query);
				$data = mysqli_fetch_array($result);
				echo "<td>" . $data['product_naam'] . "</td>"; 
				echo "<td><input type='number' name='aantal[]' value='" . $product['aantal'] . "'>
					<input type='hidden' name='product_id[]' value='" . $product['product_id'] . "'></td>";
				echo "</tr>";
			}
			echo "<tr>
				<td><input type='submit' name='update_cart' value='werk  bij'></td>
				</tr>
				</table>
				</form>";
			
		}

		if(isset($_GET['leeg_winkelwagen']))
		{
			$_SESSION['winkelwagen'] = array();
			header('Location:view_cart.php');
		}
		?>
	</main>
</body>
</html>
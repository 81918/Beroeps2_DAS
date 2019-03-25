<?php
	$id = $_GET['id']
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product verwijder verwerk</title>
</head>
<body>
	<header>
		
	</header><!-- /header -->
	<main>
		<?php
		if (is_numeric($id))
			{
				require_once('../../config_beroeps2.inc.php');
				//lees het lid uit de database
				$query = "SELECT * FROM DAS_products WHERE id = '" . $id . "'";
				if($result = mysqli_query($mysqli, $query))
				{
					$row = mysqli_fetch_array($result);
					//is er een lid gevonden met dit id?
					if (mysqli_num_rows($result) == 1)
					{
		?>
		<form action="product_verwijder_verwerk.php" method="post">
			<input type="text" name="id" value="<?php echo $id;?>" hidden readonly>
			<table>
				<tr>
					<td colspan="2">weet u zeker dat u dit product wilt verwijderen</td>
					<td></td>
				</tr>
				<tr>
					<td>Product naam:</td>
					<td><input type="text" value="<?php echo $row['product_naam'];?>" readonly></td>
				</tr>
				<tr>
					<td>Prijs:</td>
					<td><input type="text" value="<?php echo $row['prijs'];?>" readonly></td>
				</tr>
				<tr>
					<td>product nummer:</td>
					<td><input type="number" value="<?php echo $row['product_nummer'];?>" readonly></td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="submit" value="ja, ik wil dit product verwijderen"> /
				</td>
				<td>
					<button><a href="uitlees_admin.php">Nee, ga terug.</a></button>
				</td>
				</tr>
			</table>
		</form>
		<?php
					}
					else
					{
						echo "<p class='error'>Er is geen product vinden. <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
					}
				}
			}
		else
		{
			echo "<p class='error'>er is geen product gevonden! <a href='uitlees_admin.php'>Ga terug naar uitlees</a></p>";
		}
		?>
	</main>
	<footer></footer>
</body>
</html>
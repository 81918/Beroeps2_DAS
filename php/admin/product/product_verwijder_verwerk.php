<!DOCTYPE html>
<html>
<head>
	<title>Product verwijder</title>
</head>
<body>
	<header>
		
	</header><!-- /header -->
	<main>
		<?php
		$id = $_POST['id'];
			if (is_numeric($id))
			{
				require('config_beroeps2.inc.php'); 

				$query1 = "DELETE FROM DAS_products WHERE id = '" . $id . "'";
				if(mysqli_query($mysqli, $query1))
				{
					echo "<p class='no_error'>Het product is verwijderd.</p>";
				}
				else
				{
					echo"<p class='error'>Het product kon niet verwijderd worden.</p>";
				}

				$query2 = "DELETE FROM DAS_specificaties WHERE product_id = " . $id;
				if(mysqli_query($mysqli, $query2))
				{
					echo "<p class='no_error'>Alle specificaties zijn verwijderd.</p>";
				}
				else
				{
					echo "<p class='error'>Specificaties konden niet verwijderd worden.</p>";
				}

				$query3 = "DELETE FROM DAS_productbeschrijving WHERE product_id = '" . $id . "'";
				if(mysqli_query($mysqli, $query3))
				{
					echo "<p class='no_error'>Het beschrijving is verwijderd.</p>";
				}
				else
				{
					echo"<p class='error'>Het beschrijving kon niet verwijderd worden.</p>";
				}

			}
			else
			{
				echo "<p class='error'>id is geen nummer</p>";
			}
		?>
	</main>
	<footer></footer>
</body>
</html>
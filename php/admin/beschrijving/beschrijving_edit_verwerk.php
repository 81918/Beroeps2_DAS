<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	if (isset($_POST['submit']))
	{
		$beschrijving = $_POST['beschrijving'];
		$id = $_POST['id'];
		
		if (is_numeric($id))
		{
			if (strlen($beschrijving) > 0)
			{
				$query1 = "SELECT * FROM De_aquarium_specialist_productbeschrijving WHERE product_id = " . $id;
				$result1 = mysqli_query($mysqli, $query1);
				if (mysqli_num_rows($result1) == 1)
				{
					$query2 = "UPDATE De_aquarium_specialist_productbeschrijving SET beschrijving = '$beschrijving' WHERE product_id = $id";
					//controleer of query is uitgevoerd
					$result2 = mysqli_query($mysqli, $query2);
					if ($result2)
					{
						echo "<p class='no_error'>Beschrijving is veranderd.</p>";
					}
					else
					{
						echo "<p class='error'>Er ging iets fout, beschrijving kon niet veranderd worden!</p>";
					}
				}
				else
				{
					echo "<p class='error'>Dit product bestaat niet!</p>";
				}
			}
			else
			{
				echo "<p class='error'>We missen een beschrijving.</p>";
			}
		}
		else
		{
			echo "<p class='error'>Het product bestaat niet.</p>";
		}
	}
	else
	{
		echo "<p class='error'>Wij hebben geen gegevens binnen gekregen.</p>";
	}
	?>
	</main>

	<footer>
	</footer>

	<script src="/jq/jquery-3.3.1.js"></script>

</body>
</html>
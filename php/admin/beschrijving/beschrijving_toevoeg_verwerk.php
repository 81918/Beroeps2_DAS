<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	require('config_beroeps2.inc.php');

	if (isset($_POST['submit'])) {

		// 
		$beschrijving = $_POST['beschrijving'];
		$id = $_POST['id'];

		if (is_numeric($id))
		{
			
			if (strlen($beschrijving) > 0)
			{
				$query1 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = '" . $id . "'";
				$result1 = mysqli_query($mysqli, $query1);
				if (mysqli_num_rows($result1) == 0)
				{
					$query2 = "INSERT INTO DAS_productbeschrijving (id, beschrijving, product_id) VALUES (NULL ,'$beschrijving','$id')";
					//controleer of query is uitgevoerd
					$result2 = mysqli_query($mysqli, $query2);
					if ($result2)
					{
						echo "<p class='no_error'>Beschrijving is toegevoegd.</p>";
					}
					else
					{
						echo "<p class='error'>Er ging iets fout, beschrijving is niet toegevoegd.</p>";
					}
				}
				else
				{
					echo "<p class='error'>Er is al een beschrijving toegevoegd!</p>";
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
</body>
</html>
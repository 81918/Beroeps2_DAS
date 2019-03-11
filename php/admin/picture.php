<?php

	require_once('config_beroeps2.inc.php');
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Picture</title>
</head>
<body>
	<main>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<table>
				<tr>
					<td>picture:</td>
					<td><input type="file" name="picture" required></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="1"><input type="submit" name="submit" value="Upload"></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="1"><button><a href="home.php">cancel</a></button></td>
				</tr>
			</table>
		</form>
		<?php
			//is er al een lid voor dit lid?
			if (file_exists(__DIR__ . '/upload/' . $id . "/" . $id . '.jpg'))
			{
				echo "<p><img src='upload/" . $id . "/" . $id .".jpg' alt='picture' style='width:150px;'></p>";
			}
			//lees het bestand
			if(isset($_POST['submit']))
			{
				if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0)
				{
					if ($_FILES['picture']['type'] == "image/jpg" ||
						$_FILES['picture']['type'] == "image/jpeg" ||
						$_FILES['picture']['type'] == "image/png")
					{
						//wat is de fysieke locatie van de upload map?
						$folder = __DIR__ . "/upload/" . $_POST['id'] . "/";

						//maak de bestandsnaam
						$file = $_POST['id'] . '.jpg';

						//verplaats de upload naar de map met d e juiste naam
						move_uploaded_file($_FILES['picture']['tmp_name'], $folder . $file);

						//stuur de gebruiker terug naar de foto-pagina
						header("Location:picture.php?id=" . $_POST['id']);
					}
					else
					{
						echo "<p class='red'>Uploaded wrong file type.</p>";
					}
				}
				else
				{
					echo "<p class='red'>Something went wrong.</p>";
				}
			}
		?>
	</main>
	</footer>
</body>
</html>
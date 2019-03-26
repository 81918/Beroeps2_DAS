<?php
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src='../jq/number_only.js'></script>
<head>
	<title></title>
</head>
<body>
	<?php
	require_once('../../config_beroeps2.inc.php'); 
	$query = "SELECT * FROM DAS_products WHERE id = " . $id;
	$result = mysqli_query($mysqli, $query);
	if($result)
	{
		echo "<form action='product_edit_verwerk.php' method='post'>";
		echo "<table>";
		$data = mysqli_fetch_array($result);
		echo "<tr>
				<td>Product naam:</td>
				<td><input type='text' name='product_naam' maxlength='200' value='" . $data['product_naam'] . "'></td>
			</tr>
			<tr>
				<td>prijs:</td>
				<td><input type='text' name='prijs' onkeypress='return isNumberKey2(event)' maxlength='11' value='" . $data['prijs'] . "'></td>
			</tr>
			<tr>
				<td>product nummer:</td>
				<td><input type='number' name='product_nummer' onkeypress='return isNumberKey(event)' maxlength='11' value='" . $data['product_nummer'] . "'></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' name='submit' value='submit'></td>
			</tr>";
		echo "</table>";
		echo "<input type='hidden' name='id' maxlength='200' value='$id'>";
		echo "</form>";
	}
	else
	{
		echo "<p class='error'>We konden het product niet vinden.</p>";
	}

	?>
</body>
</html>
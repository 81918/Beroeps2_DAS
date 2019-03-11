<!DOCTYPE html>
<html>
<head>
	<title>product toevoegen</title>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script src='../jq/number_only.js'></script>
	<!-- https://www.jqueryscript.net/form/jQuery-Currency-Input-Filed-Mask-Plugin-maskmoney.html -->
	<style type="text/css" media="screen">
		input{
			width: 300px;
			padding-left: 50px;
		}
	</style>
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
		<form action="product_toevoeg_verwerk.php" method="post" id="product_toevoeg">
		<table>
			<tr>
				<td>Product naam:</td>
				<td><input type="text" name="product_naam" maxlength="200"></td>
			</tr>
			<tr>
				<td>prijs:</td>
				<td><input type="text" name="prijs" id="currency" maxlength="11"></td>
			</tr>
			<tr>
				<td>product nummer:</td>
				<td><input type="number" name='product_nummer' onkeypress="return isNumberKey(event)" maxlength="11"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
			</table>
		</form>

	</main>

	<footer>
	</footer>

</body>
</html>
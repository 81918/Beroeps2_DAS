<!DOCTYPE html>
<html>
<head>
	<title>Specificatie toevoegen</title>
	<link rel="stylesheet" href="">
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
		<form action="spec_toevoeg_verwerk.php" method="post" id="spec_toevoeg">
			<input type='number' name='id' value='<?php $id = $_GET['id']; echo $id;?>' hidden>
			<div id="container">
				<div>
					<p>Specificatie categorie: <input type="text" name="spec_categorie[]" id="spec_categorie" required maxlength="42"></p>
					<p>Specificatie naam: <input type="text" name="spec_naam[]" id="spec_naam" required maxlength="42"></p>
					<p>Specificatie: <input type="text" name="spec[]" id="spec" required maxlength="72"></p>
					<p><a href="#"id="add">Voeg&nbsp;meer&nbsp;velden&nbsp;toe</a></p>
				</div>
			</div>
			<div>
				<input type="submit" name="submit" value="submit">
			</div>
		</form>
	</main>

	<footer>
	</footer>

	<script src="../jq/jquery-3.3.1.js"></script>
	<script src="../jq/autofeed.js"></script>
</body>
</html>
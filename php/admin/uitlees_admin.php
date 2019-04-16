<?php
session_start();
?>
<!DOCTYPE html>
<html>
<!--Product Overzicht = pd_ov-->
<!--Product Toevoegen = pd_tv-->
<head>
	<title>product toevoegen melding</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

		<!-- Jquery Plugin -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap Plugin-->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../../js/bootstrap/bootstrap.js"></script>

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../../css/mdb.css">

</head>
<body>
	<header>
		<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand pixel" href="#">AquariumSpecialist</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Home </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="product/product_toevoeg.php">Product toevoegen</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="uitlees_admin.php">Uitlees<span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
			<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link btn btn-secondary margin_reset" href="#">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
	<main>
		<div class="pd_ov">
			
				<?php
				if ($_SESSION['level'] == 2) {

					require_once('../../config_beroeps2.inc.php');
					$query = "SELECT * FROM DAS_products";

					if($result = mysqli_query($mysqli, $query)) {
						echo "<table class='tr'>";
						echo "<tr class='tr'>";
						echo "<td class='td'>Product naam:</td>";
						echo "<td class='td'>Prijs:</td>";
						echo "<td class='td'>product nummer</td>";
						echo "<td class='td'>Product:</td>";
						echo "<td class='td'>Specificaties</td>";
						echo "<td class='td'>Beschrijving:</td>";
						echo "</tr>";

						while($row = mysqli_fetch_array($result)) {
						
							echo "<tr>";
							echo "<td>" . $row['product_naam'] . "</td>";
							echo "<td>" . $row['prijs'] . "</td>";
							echo "<td>" . $row['product_nummer'] . "</td>";

							echo "<td>";
							echo "<a href='product/product_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
							echo "<a href='product/details.php?id=" . $row['id'] . "'><img src='../../icons/icon-details.png' alt='details' class='icon'></a> ";
							echo "<a href='product/picture/picture.php?id=" . $row['id'] . "'><img src='../../icons/icon-pictures.png' alt='pictures' class='icon'></a> ";
							echo "<a href='product/product_verwijder.php?id=" . $row['id'] . "'><img src='../../icons/icon-delete.png' alt='delete' class='icon'></a>";
							echo "</td>";

							echo "<td>";
							echo "<a href='specificatie/spec_toevoeg.php?id=" . $row['id'] . "'><img src='../../icons/icon-add.png' alt='add' class='icon'></a>";
							echo " ";
							echo "<a href='specificatie/spec_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
							echo "<a href='specificatie/spec_verwijder.php?id=" . $row['id'] . "'><img src='../../icons/icon-delete.png' alt='delete' class='icon'></a>";
							echo "</td>";

							echo "<td>";

							$query1 = "SELECT * FROM DAS_products WHERE id =" . $row['id'];
							$result1 = mysqli_query($mysqli, $query1);

							if (mysqli_num_rows($result1) == 1) {

								$query2 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $row['id'];
								$result2 = mysqli_query($mysqli, $query2);

								if (mysqli_num_rows($result2) == 0) {

									echo "<a href='beschrijving/beschrijving_toevoeg.php?id=" . $row['id'] . "'><img src='../../icons/icon-add.png' alt='add' class='icon'></a> ";

								}

								$query3 = "SELECT * FROM DAS_productbeschrijving WHERE product_id = " . $row['id'];
								$result3 = mysqli_query($mysqli, $query3);

								if (mysqli_num_rows($result3) == 1) {

									echo "<a href='beschrijving/beschrijving_edit.php?id=" . $row['id'] . "'><img src='../../icons/icon-edit.png' alt='edit' class='icon'></a> ";
								}
							}
							
							echo "</td>";
							echo "</tr>";
							
						}
						echo "<table>";
					}
				}
				else
				{
					echo "<h1>OOPS!</h1>";
					echo "<p class='error'>U hoord hier niet te zijn! <a href='../../index.php'>ga naar home</a></p>";
				}
				?>
		</div>
	</main>

	<footer>
	</footer>

	<script src="../../jq/jquery-3.3.1.js"></script>

</body>
</html>
<!DOCTYPE html>
<html>
<!--Product Overzicht = pd_ov-->
<!--Product Toevoegen = pd_tv-->
<head>
	<title>product toevoegen</title>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script src='../jq/number_only.js'></script>
	<!-- https://www.jqueryscript.net/form/jQuery-Currency-Input-Filed-Mask-Plugin-maskmoney.html -->


	<!--********Front-End********-->
	<link rel="stylesheet" href="../../../css/mdb.css">
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
	<!-- Bootstrap Plugin-->
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../../../js/bootstrap/bootstrap.js"></script>
	<!-- Jquery Plugin -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
						<a class="nav-link" href="../index.php">Home </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Product toevoegen<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../uitlees_admin.php">Uitlees</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../specificatie/spec_toevoeg.php">Specificatie toevoegen</a>
					</li>
				</ul>
			</div>
			<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link btn btn-secondary" href="#">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
	<main>
		<!--Product overzicht = pd_ov-->
		<div class="pd_ov">
			<form action="product_toevoeg_verwerk.php" method="post" id="product_toevoeg">
			<table>
				<tr>
					<td>Product naam:</td>
					<td><input class="input" type="text" name="product_naam" maxlength="200"></td>
				</tr>
				<tr>
					<td>prijs:</td>
					<td><input class="input" type="text" name="prijs" id="currency" maxlength="11"></td>
				</tr>
				<tr>
					<td>product nummer:</td>
					<td><input class="input" type="number" name='product_nummer' onkeypress="return isNumberKey(event)" maxlength="11"></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-lg btn-success" type="submit" name="submit" value="Toevoegen"></td>
				</tr>
				</table>
			</form>
		</div>
	</main>

	<footer>
	</footer>
	<script src="../../../jq/jquery-3.3.1.js"></script>

</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home admin</title>
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
		</nav>
	</header>
	<div class="pd_ov">
		<h3 class="text_center">Menu</h3>
		<hr>
		<a class="btn btn-lg btn-info btn-block text-uppercase" href="uitlees_admin.php">Overzicht</a>
		<a class="btn btn-lg btn-warning btn-block text-uppercase" href="product/product_toevoeg.php">Toevoegen</a>
		
	</div>
</body>
	<script src="../../jq/jquery-3.3.1.js"></script>
</html>
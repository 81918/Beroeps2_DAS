<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Jquery Plugin -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Bootstrap Plugin-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>

	<!-- Custom Links/Plugin -->
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<title>Home</title>
</head>
<body>
	<!--  Navigatie  -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand pixel" href="#">AquariumSpecialist</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#aboutus">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#contact">Contact</a>
			</li>
				<?php 
					if ($_SESSION['level'] == 2) {
						
						// redirect naar de admin index
						header("Location:php/admin/index.php");

					} elseif ($_SESSION['level'] == 1) {
						// links voor ingelogde bezoekers
						?>

						<li><a class="nav-link" href="php/login/logout.php">Uitloggen</a></li>

						<?php
						
						// controlleer time out 
						if ((time() - 1800) > $_SESSION["timestamp"]) {

							// te lang geleden, logout
							header('Location:logout.php');

						} else {

							// kan hier blijven voor een half uur 
							$_SESSION["timestamp"] = time();
							
						}
					} else {
						// links voor niet ingelogde bezoekers

						?>
						<li><a class="nav-link" href="php/login/login.php">Login</a></li>
						<li><a class="nav-link" href="php/login/aanmeld.php">Register</a></li>

						<?php
					}
				?>
		</ul>
<!--        <form class="form-inline">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Zoeken" aria-label="Search">-->
<!--            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Zoeken</button>-->
<!--        </form>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="nav-item">
				<a class="nav-link" href="#">
					<img src="media/cart.png" alt="shoppingcart" width="30" height="30">
				</a>
			</li>
		</ul>
	</div>
</nav>
<!-- Einde Navigatie-->


	<div id="HeaderMain">
		<div id="Promo_Vid">
			<iframe width="720" height="360" src="https://www.youtube.com/embed/tgbNymZ7vqY">
			</iframe>
		</div>
	</div>
	<div id="">
		<!-- Slideshow container -->
		<div id="carouselExampleControls" class="carousel slide Slid" data-ride="carousel">
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img class="d-block fotoSlid" src="media/foto1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block fotoSlid" src="media/foto2.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block fotoSlid" src="media/foto3.jpg" alt="Third slide">
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
		</div>
	</div>
	<div class="infoDiv" id="aboutus">
		<h2>About us</h2>
		<hr>
		<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
	</div>

</body>
</html>
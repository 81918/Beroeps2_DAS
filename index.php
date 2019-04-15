<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Jquery Plugin -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap Plugin-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.css">

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

<main>
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
	<div class="container">
        <!--Section: Contact v.2-->
        <section class="section">

            <!--Section heading-->
            <h2 class="section-heading h1 pt-4">Neem Contact met ons op!</h2>
            <!--Section description-->
            <p class="section-description">Heeft u Vragen die niet worden beantwoord op de site?<br>Neem dan gerust contact met ons op!</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 col-xl-9">
                    <form id ="contact-form" name="contact-form" action="mail.php" method="POST"  onsubmit="return validateForm()" >

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Naam:</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">Uw Email: </label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Onderwerp:</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" class="md-textarea"></textarea>
                                    <label for="message">Bericht:</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                    </form>
                    <div class="center-on-small-only">
                        <a class="btn btn-primary" onclick="validateForm()">Versturen</a>
                    </div> <div class="status" id="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 col-xl-3" >
                    <ul class="contact-icons" id="dot">
                        <li><i class="fa fa-map-marker fa-2x"></i>
                            <p>Rotterdam, 1122AA, NL</p>
                        </li>

                        <li><i class="fa fa-phone fa-2x"></i>
                            <p>010-23456789</p>
                        </li>

                        <li><i class="fa fa-envelope fa-2x"></i>
                            <p>contact@AQSpecialist.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
        </section>
        <!--Section: Contact v.2-->
    </div>
</main>
<!-- SCRIPTS -->
<!-- JQuery -->

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!--Custom scripts-->
<script src="js/validate.js"></script>

</body>
</html>
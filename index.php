<?php
session_start();
if ($_SESSION['level'] == 2) {
	
	// redirect naar de admin index
	header("Location:php/admin/index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<?php 

					if ($_SESSION['level'] == 1) {

						// links voor ingelogde bezoekers
						echo "<li><a href='index.php'>Home</a></li>";
						echo "<li><a href=''>Shoppen</a></li>";
						echo "<li><a href='php/login/logout.php'>Uitloggen</a></li>";

					} else {

						// links voor niet ingelogde bezoekers
						echo "<li><a href='index.php'>Home</a></li>";
						echo "<li><a href=''>Shoppen</a></li>";
						echo "<li><a href='php/login/login.php'>Login</a></li>";
						echo "<li><a href='php/login/aanmeld.php'>Register</a></li>";

					}
				?>
				
			</ul>
		</nav>
	</header>
	
	<main>
		<div class="Trailer">
		<!-- <video width="1280	 height="400" controls> -->
		<!-- test -->
		<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/2aWHg7lgjZs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
		<!-- </video> -->
		</div>
	</main>

	<footer>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</footer>
	<script src="jq/jquery-3.3.1.js"></script>

</body>
</html>
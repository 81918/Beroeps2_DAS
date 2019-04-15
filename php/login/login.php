<!DOCTYPE html>
<html>
<head>
	<title>Login || De Aquarium Spec.</title>
</head>
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap/bootstrap.css">
<body id="login_back">


		<div class="container">
		    <div class="row">
		      	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			        <div class="card card-signin my-5">
			          	<div class="card-body">
				            <h5 class="card-title text-center">Inloggen bij <b>De Aquarium Specialist</b></h5>
				            <form class="form-signin" action="login_verwerk.php" method="post">
					              <div class="form-label-group">  
					              
					              	
					                <input type="text" name="gebruikersnaam" id="gebruikersnaam" class="form-control" placeholder="Email address" required autofocus>
					              	<label for="gebruikersnaam">Gebruikersnaam</label>
					              </div>

					              <div class="form-label-group">
					            
					              	
					                <input type="password" name="wachtwoord" id="Wachtwoord"  class="form-control" placeholder="Password" required>
					                <label for="wachtwoord">Wachtwoord</label>
					              </div>
				              <button name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Inloggen</button>
				              
				            </form>
				            <hr class="my-4">
				            <h5 class="text-center">Nog geen account?</h5><a class="nav-link" href="aanmeld.php">
				            <button href="aanmeld.php" class="btn btn-lg btn-danger btn-block">Aanmelden</button></a>
			          	</div>
			        </div>
		      	</div>
		    </div>
	  	</div>

</body>
<script src="../../js/jquery-3.3.1.js"></script>
</html>

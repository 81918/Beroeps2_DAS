<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$_SESSION['level'] = 2;
	if($_SESSION['level'] !== 2)
	{
		echo "<h1 class='level_error'>OOEPS</h1>";
		echo "<p class='level_error'>U hoord hier niet te zijn, <a href='index.php'>ga terug!</a></p>";
	}
	else
	{
		//....
	}
	?>


	<?php
	if($_SESSION['level'] == 0 )
	{
		echo "<h1 class='level_error'>OOEPS</h1>";
		echo "<p class='level_error'>u moet hier ingelogt voor zijn, <a href='index.php'>ga terug!</a></p>";
	}
	elseif($_SESSION['level'] == 2 )
	{
		echo "<h1 class='level_error'>OOEPS</h1>";
		echo "<p class='level_error'>U hoord hier niet te zijn, <a href='index.php'>ga terug!</a></p>";
	}
	else
	{
		//....
	}
	?>
</body>
</html>
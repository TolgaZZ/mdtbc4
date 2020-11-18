<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


	<h1>Inloggen</h1>

<form action="login.process.php" method="post">

	<p>
		<label for="naam">Gebruiker:</label>
		<input type="text" name="naam" id="naam" required="required">
	</p>

	<p>
		<label for="password">Wachtwoord :</label>
		<input type="password" name="password" id="password" required="required">
	</p>

	<p>
	<input type="submit" name="submit" id="submit" value="Inloggen">
	</p>



</form>

</body>
</html>
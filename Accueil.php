<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
</head>
<body>

	<h1>Bonjour vous êtes connectés</h1>
	<?php
		echo $_SESSION["pseudo"];
		echo $_SESSION["id"];
	?>



</body>
</html>

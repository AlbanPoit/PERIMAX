<?php include("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de Connexion</title>
	<link rel="stylesheet" type="text/css" href="PageDeConnexion.css">
</head>
<body>
<!--Création du formulaire de connexion-->
	<form action="controleur.php" method="POST" id="formulaire">
		<input type="text" placeholder="Identifiant" name="Identifiant" id="ChampIdentifiant">
		<input type="text" placeholder="Mot de Passe" name="Mdp" id="ChampMdp"> <br>
		<input type="submit" name="action" value="Connexion">
		<div id="PremiereConnexion">
			<!--Lien vers la page d'inscription-->
			Première connexion ? <a href="EnvoieMail.php">Inscrivez-vous</a>
		</div>
	</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lien D'inscription</title>

	<script>
		function Verifmail(){ // a revoir
			var email = document.getElementById("mail");
	  		if(email.validity.typeMismatch) {
	    	email.setCustomValidity("Adresse-mail centralienne attendu");
	 		} else {
	   			email.setCustomValidity("");
  			}
		}
		
	</script>

</head>
<body>
	<h3>Bienvenue sur la page d'inscription </h3>

	<form action="controleur.php" method="POST">
		<p>Pour commencer, veuillez entrer dans le champ suivant votre <strong>adresse mail centralienne</strong></p>
		<input type="email" name="Mail" placeholder="Adresse-mail" id="mail" required pattern="[A-Za-z-.]{1,100}@centrale.centralelille.fr" onkeyup="Verifmail();" >
		<input type="submit" name="action" value="Envoyer">
    </form>
</body>
</html>

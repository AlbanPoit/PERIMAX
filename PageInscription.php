<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "PageInscription.php")
{
	//header("Location:../poittevin/PageDeConnexion.html");
	//die("");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page d'Inscription</title>
	<link rel="stylesheet" type="text/css" href="PageInscription.css">

	<script>
		//Cette fonction permet de vérifier que les deux mots de passent sont conforment
		function verificationmotdepasse(){ 
		var mdp = document.getElementById("Mdp");
		var verifmdp = document.getElementById("VerifMdp");
		console.log(mdp.value);
			if(mdp.value!=verifmdp.value){
				mdp.setCustomValidity("Les deux mots de passes ne correspondent pas !");
			}else{
				mdp.setCustomValidity("");
			}
			
		}
	</script>

</head>
<body>

	<!--Création du formulaire d'inscription avec des questions obligatoires et facultatives-->
	<h3>Formulaire d'inscription</h3>
	<form action="controleur.php" method="POST" name="Inscription">
		<input type="text" name="Nom" placeholder="Nom*" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="text" name="Prenom" placeholder="Prénom*" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="text" name="Pseudo" placeholder="Pseudo*" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="email" name="Email" placeholder="Adresse-Mail*" class="criteres" required> <br>
		<input type="text" name="NumChambre" placeholder="N° de Chambre" pattern="[ABCDEF][0-9]{3}"> <br> <!-- Une majuscule A,B,C,D,E ou F suivit de trois chiffres compris entre 0 et 9 -->
		<input type="text" name="NumTelephone" placeholder="N° de téléphone" pattern="[0-9]{10}"> <br>
		<input type="text" name="Mdp" placeholder="Mot de passe*"  id="Mdp" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="text" name="VerifMdp" placeholder="Confirmer mot de passe*" id="VerifMdp" class="criteres" required pattern="[A-Za-z]{2,255}" onkeyup="verificationmotdepasse();"> <br>
		<input type="submit" name="action" value="Inscription" id="action">

		<div id="legende">Champ obligatoire*</div>
	</form>


</body>
</html>
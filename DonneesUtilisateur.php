<?php
	// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) == "DonneesUtilisateur.php")
	{
		//header("Location:../poittevin/PageDeConnexion.html");
		//die("");
	}
	include("header.php");

	function effacer(){
		$tel=$_SESSION["NumTelephone"];
		$chambre=$_SESSION['chambre'];
		if($tel=='non renseigné'){
			$_SESSION["NumTelephone"]='';
		}
		if($chambre=='non renseigné'){
			$_SESSION["chambre"]='';
		}
	}

	function retablir(){
		$tel=$_SESSION["NumTelephone"];
		$chambre=$_SESSION['chambre'];
		if($tel==''){
			$_SESSION["NumTelephone"]='non renseigné';
		}
		if($chambre==''){
			$_SESSION["chambre"]='non renseigné';
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Données Utilisateur</title>
	<link rel="stylesheet" type="text/css" href="DonneesUtilisateur.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		//Utilisation du JQuery pour pouvoir modifier les paramètres du compte
		$(document).ready(function(){

			//On cache les deux formualaires
			$("#modifDonnees").css("display","none");
			$("#modifPasse").css("display","none");
			$("#quitter").css("display","none");


			// On fait apparaitre le formulaire de mofid de donnees lors du clique
			$("input[name='Modification']").on({
				click: function(){
					console.log("click1");
					$("#ChampDonnees").css("display", "none");
					$("#btnModif").css("display", "none");
					$("#modifDonnees").css("display","block");
					$("#btnPasse").css("display","block");
					$("#quitter").css("display","block");
					$("#btnPasse").css("display", "none");
					}
				});

			// Lorsque l'on clique sur changer on fait apparaitre le champ pour modifier le Mdp et on cache les autres
			$("input[name='Passe']").on({
				click: function(){
					console.log("click2");
					$("#modifPasse").css("display","block");
					$("#ChampDonnees").css("display", "none");
					$("#btnModif").css("display", "none");
					$("#btnPasse").css("display", "none");
					$("#quitter").css("display","block");
				}
			});

			// Lorsque l'on clique sur quitter on revient à la situation initiale
			$("input[name='PageDonneesUtilisateur']").on({
				click: function(){
					console.log('click3')
					// On cache les champs de mofications
					$("#modifDonnees").css("display","none");
					$("#modifPasse").css("display","none");
					$("input[name='PageDonneesUtilisateur']").css("display","none");
					//on fait réapparaitre le champ de données et les boutons
					$("#ChampDonnees").css("display", "block");
					$("#btnModif").css("display", "block");
					$("#btnPasse").css("display", "block");

				}
			});
		});

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
	<h2 id="titre">Vos données personnelles</h2>
	<div id="ChampDonnees">
		<p> <span> Nom </span> : <?php echo $_SESSION['nom']; ?> </p>
		<p> <span> Prénom </span> : <?php echo $_SESSION['prenom']; ?> </p>
		<p> <span> Email </span> : <?php echo $_SESSION['email']; ?> </p>
		<p> <span> Chambre </span>: <?php echo $_SESSION['chambre']; ?> </p>
		<p> <span> NumTelephone </span> : <?php echo $_SESSION["NumTelephone"]; ?> </p>
		<p> <span> Mot de passe </span> : <?php echo $_SESSION['passe']; ?> </p>
	</div>

	<div id="btnModif">
		Souhaitez-vous modifier vos données ? <br>
		<input type="button" name="Modification" value="Modifier "  onclick="<?php effacer() ?>">
	</div>

	<div id="btnPasse">
		Souhaitez-vous modifier votre mot de passe ? <br>
		<input type="button" name="Passe" value="Changer">
	</div>

	<!-- Ce formulaire apparait lorsque l'utilisateur veut modifier des donnees-->

	<form action="controleur.php" method="POST" id="modifDonnees">

		<h3> Saisissez vos nouvelles données </h3>

		<input type="text" name="Pseudo" placeholder="Pseudo*" value="<?php echo $_SESSION['pseudo']; ?>" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="email" name="Email" placeholder="Adresse-Mail*" value="<?php echo $_SESSION['email']; ?>" class="criteres" required> <br>
		<input type="text" name="NumChambre" placeholder="N° de Chambre" value="<?php echo $_SESSION['chambre']; ?>" pattern="[ABCDEF][0-9]{3}"> <br> <!-- Une majuscule A,B,C,D,E ou F suivit de trois chiffres compris entre 0 et 9 -->
		<input type="text" name="NumTelephone" placeholder="N° de téléphone" value="<?php echo $_SESSION["NumTelephone"]; ?>" pattern="[0-9]{10}"> <br>
		<input type="submit" name="action" value="Modifier" id="action">

		<div id="legende">Champ obligatoire</div>

	</form>
 
	<!-- Ce formulaire apparait lorsque l'utilisateur souhaite modifier son Mot de passe -->

	<form action="controleur.php" method="POST" id="modifPasse">

		<h3>Saisissez votre nouveau mot de passe</h3>

		<input type="text" name="Mdp" placeholder="Mot de passe*"  id="Mdp" class="criteres" required pattern="[A-Za-z]{2,255}"> <br>
		<input type="text" name="VerifMdp" placeholder="Confirmer mot de passe*" id="VerifMdp" class="criteres" required pattern="[A-Za-z]{2,255}" onkeyup="verificationmotdepasse();"> <br>
		<input type="submit" name="action" value="Nouveau mot de passe" id="action">
		
	</form>

	<!-- On implémente un bouton pour quitter les modifications -->

	<div id="quitter">
		<h3>Souhaitez-vous quitter la page de modifications ?</h3>
		<input type="button" name="PageDonneesUtilisateur" value="Quitter" onclick="<?php retablir() ?>">
	</div>

	<form action="controleur.php" method="POST" id="formulaire">
		<input type="submit" name="action" value="Deconnexion">
	</form>

	
</body>
</html>

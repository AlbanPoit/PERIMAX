<?php

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/modele.php"; 
?>

<?php

	$qs = ""; //Variable qui va permettre la redirection

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br/>";
	
	switch($action)
		{
			//Cas de la connexion
			case 'Connexion':
				$qs = "/PageDeConnexion.html";
				if ($login = valider("Identifiant","POST"))
				if ($passe = valider("Mdp","POST")){ 
				// On verifie l'utilisateur, et on crée des variables de session si tout est OK
					if (verifUserBdd($login,$passe))
						$qs="/Accueil.php";
						//$qs="Acceuil.html"; // on envoie vers la page d'acceuil 
				}
				break;
 
			case 'Inscription':
				// On a pas besoin de valider la donner car cela a été dans la page d'inscription
				$nom=$_POST["Nom"];
				$prenom=$_POST["Prenom"];
				$pseudo=$_POST["Pseudo"];
				$email=$_POST["Email"];
				$numchambre=$_POST["NumChambre"];
				$numtelephone=$_POST["NumTelephone"];
				if ($numchambre=='') {
					$numchambre="non renseigné";
				}
				if($numtelephone==''){
					$numtelephone="non renseigné";
				}
				$mdp=$_POST["Mdp"];
				AjouterUtilisateur($pseudo, $mdp, $nom, $prenom, $email, $numchambre, $numtelephone);
			break;

			case 'Envoyer':
				$objet="PERIMAX";
				$msg="Bonjour voici le lien pour vous inscrire sur périmax :\n <a href='http://localhost/poittevin/PageInscription.php'></a>";
				if($destinataire=valider("Mail")){
					mail($destinataire,$objet,$msg);
					echo $destinataire;
				}
			break;

			case 'Modifier':
				$id=$_SESSION["id"];
				$pseudo=$_POST["Pseudo"];
				$email=$_POST["Email"];
				$numchambre=$_POST["NumChambre"];
				$numtelephone=$_POST["NumTelephone"];
				if ($numchambre=='') {
					$numchambre="non renseigné";
				}
				if($numtelephone==''){
					$numtelephone="non renseigné";
				}
				//Si des mofications ont été effectué on doit alors mofidier les valeurs de SESSION
				$_SESSION["email"] = $email; $_SESSION["chambre"] = $numchambre; $_SESSION["NumTelephone"] = $numtelephone; 
				$_SESSION["pseudo"] = $pseudo; 
				echo $numchambre;
				ModificationDonnees($id, $pseudo, $email, $numchambre, $numtelephone);
			break;

			case 'Nouveau mot de passe':
				$id=$_SESSION["id"];
				$passe = $_POST['Mdp'];
				$_SESSION["passe"]=$passe;
				ModifMdp($id, $passe);
				break;


			case 'Deconnexion':
				session_destroy();
				$qs="/PageDeConnexion.php";
	}
}

	$urlBase = dirname($_SERVER["PHP_SELF"]); // On extrait le chemin courant du script
	//on redirige vers la page d'accueil

	//header("Location:" . $urlBase . $qs);

	ob_end_flush();
?>

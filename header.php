<?php
session_start();
include_once "libs/maLibUtils.php";

if (basename($_SERVER["PHP_SELF"]) == "header.php"){
  header("Location:../accueil.php");
	die("");
}
 ?>
 <html>

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="header.css">
   </head>

   <body>
     <div class="header">
       <div class="titre"> Perimax </div>
       <div class="liens">
         <?php
         if (valider("connecte","SESSION")){
           echo"<a href=\"accueil.php\">Accueil</a>";
           echo"<div class=user>";
           echo"Bienvenue  ";
           echo"<a href=\"DonneesUtilisateur.php\"> " . $_SESSION['pseudo'] . "</a>";
           echo "</div>";

        }
        else{
          echo"<a href=\"PageDeConnexion.php\">Connexion</a>";

        }
        ?>

       </div>
     </div>
   </body>
 </html>

<?php
/** 
 * Script de contréle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$uneDes=lireDonneePost("des", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{   
    $login=$_POST["log"];
    $password=$_POST["mdp"];
     
   $lafleur=connexion($login,$password, $tabErr);  
   if (count($lafleur)> 0)
    { 
    $etape = 2;
    $categ=$lafleur["cat"];
    connecter($login, $password,$categ);
    }
    else
    {
    $message="Echec de la connexion ";
    ajouterErreur($tabErreurs, $message);
    // Revenir é l'étape 1
    $etape = 1;
    }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vConnexion.php"); ;
}
if ($etape==2)
{
echo " connexion reussi!!  ";   
}
include($repVues."pied.php") ;
?>
  


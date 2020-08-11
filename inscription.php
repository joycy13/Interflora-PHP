<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
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
    $nom=$_POST["log"];
    $password=$_POST["mdp"];
    $password1=$_POST["mdp1"];
    
    $erreur = 0;
    if($password != $password1)
    {
    $erreur = 1;
    $message = "attention, le mdp ne correspond pas ! ";
    ajouterErreur($tabErreurs, $message);
    $etape = 1 ;
    }
    
    
    if($erreur == 0)
    {
   inscription($nom, $password, $tabErreurs);
        
        
        $etape= 2;
        }
     
    else
    {
    $etape = 1;
    }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape == 1)
{
  include($repVues."vInscription.php"); ;
}
if ($etape == 2)
{
  echo " inscription reussi!!"  ; 

}
  
include($repVues."pied.php") ;
?>
  


<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
   //require($repInclude . "_gestionPanier.lib.php");
  
   $ref=obtenirPanier(); 
   
   lister();
   $truc=rechercherFleur($ref[0], $tabErr)    ;
   
   $i=0; 
   while ($i< count($ref))
   {
   $fleur[$i]=rechercherFleur($ref[$i], $tabErr);
  
   $i=$i+1;
   }
     
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vPanier.php");
  include($repVues."pied.php") ;
  ?>
    

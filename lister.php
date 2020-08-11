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
 
  $lafleur = lister();
  if (isset($_GET['reference']))
  {
  $ref=$_GET['reference'] ;
      ajouterPanier($ref);
  }
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vFleurs.php");
  include($repVues."pied.php") ;
  ?>
    

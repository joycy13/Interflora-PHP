<?php

function ajouterPanier($ref)
{
 if (!isset($_SESSION["panier"])) 
  {
    $_SESSION["panier"]=array();
  }
    
 // ajouter produit au panier
 $i= count($_SESSION["panier"]);
 $_SESSION["panier"][$i]=$ref;
}

function obtenirPanier()
{
  return($_SESSION["panier"])     ;
}
?>

<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='8889';
    $PARAM_nom_bd='interflora'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
 
    return $connect;
}

function lister()
{
    $connexion = connecterServeurBD();
   
    $requete="select * from produit";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $fleur[$i]['image']=$ligne['pdt_image'];
        $fleur[$i]['ref']=$ligne['pdt_ref'];
        $fleur[$i]['designation']=$ligne['pdt_designation'];
        $fleur[$i]['prix']=$ligne['pdt_prix'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
}


function ajouter($ref, $des, $prix, $image, $cat,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from produit";
    $requete=$requete." where pdt_ref = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la référence existe déjà !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into produit"
       ."(pdt_ref,pdt_designation,pdt_prix,pdt_image, pdt_categorie) values ('"
       .$ref."','"
       .$des."',"
       .$prix.",'"
       .$image."','"
       .$cat."');";
     
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si échec de la requete
        if ($ok==FALSE) 
        {
          $message = "Attention, l'ajout de la fleur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 
  
    }
}

function rechercher($des)
{
    $connexion = connecterServeurBD();
    
    $fleur = array();
   
    $requete="select * from produit";
      $requete=$requete." where pdt_designation='".$des."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $fleur[$i]['image']=$ligne['pdt_image'];
        $fleur[$i]['ref']=$ligne['pdt_ref'];
        $fleur[$i]['designation']=$ligne['pdt_designation'];
        $fleur[$i]['prix']=$ligne['pdt_prix'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
}

function rechercherRef($uneRef,&$tabErr)
{
  $fleur=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from produit";
  $requete=$requete." where pdt_ref = '".$uneRef."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $fleur['image']=$ligne["pdt_image"];
    $fleur['ref']=$ligne["pdt_ref"];
    $fleur['designation']=$ligne["pdt_designation"];
    $fleur['prix']=$ligne["pdt_prix"];
    $fleur['categorie']=$ligne["pdt_categorie"];
  }

  return $fleur;
}


function connexion($login,$password,&$tabErr)
{
  $fleur=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from utilisateur";
  $requete=$requete." where nom = '".$login."' and mdp = '".$password."';"; 
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $fleur['log']=$ligne["nom"];
    $fleur['mdp']=$ligne["mdp"];
     $fleur['cat']=$ligne["cat"];
  }

  return $fleur;
}

function supprimer($ref,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie existe
    $requete="select * from produit";
    $requete=$requete." where pdt_ref = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
       // Créer la requête de suppression 
       $requete ="delete from produit where pdt_ref='".$ref."';";        
       // Lancer la requête de suppression
       $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si échec de la requete
        if ($ok==FALSE)
        {
          $message = "Attention, la suppression de la fleur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 
  
    } 
    else
    {
      $message="Echec de la suppression : la référence n'existe pas !";
      ajouterErreur($tabErr, $message);
    }  
}

function modifier($ref, $des, $prix, $image, $cat,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($connexion) 
  {

    // Créer la requête de modification 

    $requete ="update produit set pdt_designation ='".$des.
      "',pdt_prix=".$prix.
      ",pdt_image='".$image.
      "',pdt_categorie='".$cat.
      "' where pdt_ref='".$ref."';";

    // Lancer la requête de modification
    $ok=$connexion->query($requete); 
   
    // Si la requête a échoué
    if ($ok==false)
    {
      $message = "Attention, la modification de la fleur a échoué !!!";
      ajouterErreur($tabErr, $message);
    } 

  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

   function inscription($login, $password,&$tabErr)
{
   // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from utilisateur";
    $requete=$requete." where nom = '".$login."';"; 
    $jeuResultat=$connexion->query($requete); 
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ);  
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : l'utilisateur existe déjà !";
      ajouterErreur($tabErr, $message);
     
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into utilisateur"
       ."(id,nom,mdp,cat) values (
       '',
       '".$login."',
       '".$password."',
       'client');";
      
     
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si échec de la requete
        if ($ok==FALSE)
        {
          $message = "Attention, l'ajout de l'utilisateur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 
       
       
    }
     
 }    
     
  function rechercherFleur($Ref,&$tabErr)
{
  $fleur=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from produit";
  $requete=$requete." where pdt_ref = '".$Ref."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();
    
     
  if($ligne)
  {
    $fleur['image']=$ligne["pdt_image"];
    $fleur['ref']=$ligne["pdt_ref"];
    $fleur['designation']=$ligne["pdt_designation"];
    $fleur['prix']=$ligne["pdt_prix"];
    
  }

  return $fleur;
}   
   
            
                         
?>

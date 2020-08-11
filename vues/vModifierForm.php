    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./indexzz.php">Accueil</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li>
                <a href="./index.php">Accueil</a>
              </li>
              <li class="nav">
                <a href="lister.php">Catalogue</a>
              </li>
              <li class="nav">
                <a href="rechercher.php">Rechercher</a>
              </li>
               
              <?php
                $connect= estConnecte() ;
                $admin= estConnecteAdmin();
                $client= estConnecteClient();
              if( ($admin==true) and ($connect==true)  )
                {
                ?>      
               <li class="nav"> 
                <a href="ajouter.php" >Ajouter</a>  
              </li>
              <li class="nav"> 
                <a href="supprimer.php" >Supprimer</a>  
              </li> 
              <li class="active"> 
                <a href="modifier.php" >Modifier</a>  
              </li>   
                <li class="nav"> 
                <a href="deconnexion.php" >Deconnexion</a>  
              </li>  
              <?php
              }
              ?>               
              <?php
                if (($client==true) and ($connect==true)  )
                {
                ?>
              <li class="nav"> 
                <a href="deconnexion.php" >Deconnexion</a>  
              </li>  
                  <li class="nav"> 
                <a href="panier.php" >Panier</a>  
              </li>  
              <?php
              }
              ?>
              <?php
                if ($connect==false)
                {
                ?>
              <li class="nav"> 
                <a href="connexion.php" >Connexion</a>  
              </li>
              <li class="nav"> 
                <a href="inscription.php" >Inscription</a>  
              </li>
               <?php 
               }
                ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<meta charset="UTF-8">
<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

    <fieldset>
      <legend>Entrez les données sur la fleur é modifier </legend>
      <label> Référence :</label>
      <label><?php echo $lafleur["ref"]; ?> </label>
      <input type="hidden" name="refcache" value="<?php echo $lafleur["ref"]; ?>" /><br />
      <label>Désignation :</label>
      <input type="text" name="des" value="<?php echo $lafleur["designation"]; ?>" size="20" /><br />
      <label>Prix :</label>
      <input type="text" name="prx" value="<?php echo $lafleur["prix"]; ?>" size="10" /><br />
      <label>Image :</label>
      <input type="text" name="ima" value="<?php echo $lafleur["image"]; ?>" size="20"/><br />
      <label>Catégorie :</label>
      <input type="text" name="cat" value="<?php echo $lafleur["categorie"]; ?>" size="10"/><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



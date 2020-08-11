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
              <li class="nav"> 
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
              <li class="active"> 
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
<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Inscrivez vous: </legend>
   <label>Login :</label> <input type="text" name="log" size="20" /><br />
    
   <label>Mot de passe :</label> <input type="password" name="mdp" size="20" /><br />
   <label> confirmation du mot de passe :</label> <input type="password" name="mdp1" size="20" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Inscription</button>
</form>
</div>



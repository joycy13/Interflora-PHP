
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
              <li class="active">
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


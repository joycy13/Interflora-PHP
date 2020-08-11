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
<div>
  <div class="container">
    <h1></h1>
    <img src=".\assets\img\interflora.png" />
    <hr>
  </div>
  <div class="container">
    <h1 style="text-align: center">QUI SOMMES-NOUS ?</h1>
    <br>
    <table style="margin: auto">
        <tr>
            <td><img src=".\assets\img\Interflora-Fleurop.png" width="1200px" height="1200px"/></td>
            <td></td>
            <td></td>
            <td></td>
            <td><p>Interflora est une marque commerciale qui désigne un service de transmission florale inventé en 1908 en Allemagne.
                   Son principe est de faire livrer des fleurs fraîches. 
                   L’expéditeur choisit un bouquet dans un magasin de fleurs, par téléphone ou sur Internet. 
                   Sa commande est alors transmise à un fleuriste proche du lieu de livraison, qui réalise le bouquet et le livre au destinataire.
                   Interflora regroupe environ 45 000 fleuristes dans 145 pays, dont 5 200 en France, qui expédient environ 30 millions de bouquets par an.</p></td>
        </tr>
    </table>
  </div>
</div>

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
              <li class="active">
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
<meta charset="UTF-8">
<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Image</th>
          <th>Référence</th>
          <th>Libellé</th>
          <th>Prix</th>
          <?php
           if (estConnecteClient()==true)
           {
           ?>
          <th>panier</th>
          <?php   
           }  
           ?>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>
            <td align="center"><img class="img-polaroid" src=".\assets\img\<?php echo $lafleur[$i]["image"]?>" /></td>
            <td><?php echo $lafleur[$i]["ref"]?></td>
            <td><?php echo $lafleur[$i]["designation"]?></td>
           <td><?php echo $lafleur[$i]["prix"]?></td>
           <?php
           if (estConnecteClient()==true)
           {
           ?>
           <td><a href ="lister.php?reference=<?php echo $lafleur[$i]["ref"]?>" > ajouter au panier </a></td>
           <?php   
           }  
           ?>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 

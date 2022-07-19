<?php
  require_once 'controleurs/produits.php';

  $title = "Mon super site - Fiche d'un produit";
  require 'vues/entete.php';
?>
     
    <h1>Fiche détaillée d'un produit</h1>

    <?php
        $controllerProduits=new ControlleurProduit;
        $controllerProduits->afficherFiche();
    ?>
    
    <a href="produits.php">Retour à la liste des produits</a>

<?php
  require_once 'vues/pied.php';
?>



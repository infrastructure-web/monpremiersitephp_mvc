<?php
  require_once 'controleurs/produits.php';
  $controleurProduits=new ControleurProduit;

  $title = "Mon super site - Édition d'un produit";
  require 'vues/entete.php';

  if (isset($_POST['boutonEditer'])) {      
      $controleurProduits->editer();
  } 
?>

    <h1>Formulaire d'édition d'un produit</h1>

    <?php
         $controleurProduits->afficherFormulaireEdition();
    ?>

    <a href="produits.php">Retour à la liste des produits</a>

<?php
  require 'vues/pied.php';
?>
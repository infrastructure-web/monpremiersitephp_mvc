<?php
    require_once 'controlleurs/produits.php';
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Mon super site - Liste des produits</title>
 </head>
 <body>
    <h1>Liste des produits</h1>

    <a href="ajout_produit.php" class="btn btn-primary float-right" aria-label="Ajouter un produit">
        Ajouter un produit
    </a>

    <?php
        $controllerProduits=new ControlleurProduit;
        $controllerProduits->afficherTableauAvecBoutonsAction();
    ?>

 </body>
</html>



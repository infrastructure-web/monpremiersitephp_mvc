<?php
    require_once 'controlleurs/produits.php';
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Mon super site - Fiche produit</title>
 </head>
 <body>
    <h1>Fiche détaillée d'un produit</h1>

    <?php
        $controllerProduits=new ControlleurProduit;
        $controllerProduits->afficherFiche();
    ?>
 </body>
</html>



<?php
    require_once 'controlleurs/produits.php';
    
    $controllerProduits=new ControlleurProduit;

    if (isset($_POST['boutonEditer'])) {      
        $controllerProduits->editer();
    } 
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mon super site - Édition d'un produit</title>
  </head>
  <body>   

    <h1>Formulaire d'édition d'un produit</h1>

    <?php
         $controllerProduits->afficherFormulaireEdition();
    ?>

    <a href="produits.php">Retour à la liste des produits</a>

  </body>
</html>
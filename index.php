<?php
    require_once 'controlleurs/produits.php';
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Test PHP</title>
 </head>
 <body>
    <h1>Je fais des tests</h1>

    <?php
        $controller=new ControlleurProduit;
        $controller->afficherTableau();
    ?>

 </body>
</html>



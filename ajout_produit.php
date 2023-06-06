<?php
    require_once 'controlleurs/produits.php';
    
    if (isset($_POST['boutonAjouter'])) {        
        $controllerProduits=new ControlleurProduit;
        $controllerProduits->ajouter();
    }
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mon super site - Ajout d'un produit</title>
  </head>
  <body>
    <div class="container">

      <h1>Ajouter un produit</h1>

      <form method="POST">
        <div>
          <div>
            <label for="code">Code *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="code" name="code" required maxlength="25">
          </div>
          <div>
            <label for="nom">Nom du produit *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50">
          </div>
        </div>

        <div>
          <div>
            <label for="prix_unitaire">Prix unitaire (coûtant) *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step=".01" id="prix_unitaire" name="prix_unitaire" required>
          </div>
          <div>
            <label for="prix_vente">Prix de vente *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step=".01" id="prix_vente" name="prix_vente" required>
          </div>
          <div>
            <label for="qte_stock">Quantité en stock</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" id="qte_stock" name="qte_stock" required>
          </div>
        </div>

        <button name="boutonAjouter" type="submit">Ajouter le produit</button><br>
      </form>

      <a href="produits.php">Retour à la liste des produits</a>
    </div>
    
  </body>
</html>
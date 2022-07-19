<?php
    require_once 'controleurs/produits.php';
    $title = "Mon super site - Liste des produits";
require 'vues/entete.php';
?>

    <h1>Liste des produits</h1>

    <a href="ajout_produit.php" class="btn btn-primary float-right" aria-label="Ajouter un produit">
        Ajouter un produit
    </a>

    <?php
        $controleurProduits=new ControleurProduit;
        $controleurProduits->afficherTableauAvecBoutonsAction();
    ?>

<?php
    require 'vues/pied.php';
?>



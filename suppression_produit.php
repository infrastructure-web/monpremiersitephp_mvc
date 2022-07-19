<?php
    require_once 'controleurs/produits.php';
    $controleurProduits=new ControleurProduit;

    $title = "Mon super site - Suppression d'un produit";
    require 'vues/entete.php';

    if (isset($_POST['boutonSupprimer'])) {     
        $controleurProduits->supprimer();
    } 
?>

    <h1>Formulaire de suppression d'un produit</h1>

    <?php
         $controleurProduits->afficherFormulaireSuppression();
    ?>

    <a href="produits.php">Retour à la liste des produits</a>

<?php
    require 'vues/pied.php';
?>



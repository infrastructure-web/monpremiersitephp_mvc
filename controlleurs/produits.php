<?php

require_once './modeles/produits.php';

class ControlleurProduit {

    function afficherListe() {
        $produits = modele_produit::ObtenirTous();
        require_once './vues/produits/listeProduits.php';
    }

    function afficherTableau() {
        $produits = modele_produit::ObtenirTous();
        require_once './vues/produits/tableauProduits.php';
    }

}

?>
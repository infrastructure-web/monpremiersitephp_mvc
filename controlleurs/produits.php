<?php

require_once './modeles/produits.php';

class ControlleurProduit {

    function afficherListe() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits/listeProduits.php';
    }

    function afficherTableau() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits/tableauProduits.php';
    }

}

?>
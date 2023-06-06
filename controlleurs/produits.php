<?php

require_once './modeles/produits.php';

class ControlleurProduit {

    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de liste
     */
    function afficherListe() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits/liste.php';
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau
     */
    function afficherTableau() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits/tableau.php';
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau
     */
    function afficherJSON() {
        $produits = modele_produit::ObtenirTous();
        echo json_encode($produits);
    }

}

?>
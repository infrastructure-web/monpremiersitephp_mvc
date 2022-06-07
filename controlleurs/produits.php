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
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherTableauAvecBoutonsAction() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits/tableau-avec-bouton-actions.php';
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherFiche() {
        //$produits = ??
        require './vues/produits/fiche.php';
    }

}

?>
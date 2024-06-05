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
     * Fonction permettant de récupérer un produit à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche sous forme de carte
     */
    function afficherFiche() {
        if(isset($_GET["id"])) {
            $produit = modele_produit::ObtenirUn($_GET["id"]);
            if($produit) {  // ou if($produit != null)
                require './vues/produits/fiche.php';
            } else {
                $erreur = "Aucun produit trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de récupérer un produit à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour édition
     */
    function afficherFormulaireEdition(){
        if(isset($_GET["id"])) {
            $produit = modele_produit::ObtenirUn($_GET["id"]);
            if($produit) {  // ou if($produit != null)
                require './vues/produits/formulaireEdition.php';
            } else {
                $erreur = "Aucun produit trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de récupérer un produit à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour suppression
     */
    function afficherFormulaireSuppression(){
        if(isset($_GET["id"])) {
            $produit = modele_produit::ObtenirUn($_GET["id"]);
            if($produit) {  // ou if($produit != null)
                require './vues/produits/formulaireSuppression.php';
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant d'ajouter un produit
     */
    function ajouter() {
        if(isset($_POST['nom']) 
            && isset($_POST['prix_coutant']) && isset($_POST['prix_vente']) 
            && isset($_POST['qte_stock'])) {

            $message = modele_produit::ajouter($_POST['nom'], 
                                                $_POST['prix_coutant'], 
                                                $_POST['prix_vente'], 
                                                $_POST['qte_stock']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un produit. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de modifier un produit
     */
    function editer() {
        if(isset($_GET['id']) && isset($_POST['nom']) && isset($_POST['prix_coutant']) && isset($_POST['prix_vente']) && isset($_POST['qte_stock'])) {
            $message = modele_produit::editer($_GET['id'], $_POST['nom'], $_POST['prix_coutant'], $_POST['prix_vente'], $_POST['qte_stock']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le produit. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de supprimer un produit
     */
    function supprimer() {
        if(isset($_GET['id'])) {
            $message = modele_produit::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le produit. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

}

?>
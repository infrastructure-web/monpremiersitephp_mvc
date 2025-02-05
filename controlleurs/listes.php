<?php

require_once __DIR__ . '/../modeles/listes.php';

class ControleurListe {

    /***
     * Fonction permettant de récupérer l'ensemble des listes et de les afficher sous forme de liste
     */
    function afficherToutesListesJSON() {
        $listes = modele_liste::ObtenirTous();
        echo json_encode($listes);
    }

    function afficherListesPubliquesJSON() {
        $listes = modele_liste::ObtenirPubliques();  
        echo json_encode($listes);
    }

    function afficherListesUtilisateurJSON($id_utilisateur) {
        $listes = modele_liste::ObtenirUtilisateur($id_utilisateur);  
        echo json_encode($listes);
    }
        
    /**
     * Fonction permettant de récupérer un liste et l'afficher au format JSON
     */
    function afficherUneListeJSON($id) {
        $resultat = new stdClass();
        $liste = modele_liste::ObtenirUn($id);
        if($liste) {  // ou if($liste != null)
            echo json_encode($liste);
        } else {
            $resultat->$message = "Aucune liste trouvée";
            echo json_encode($resultat);
        }
    } 

    /***
    * Fonction permettant d'ajouter un liste reçu au format JSON
    */
    function ajouterJSON() {
        $resultat = new stdClass();
        $corpsJSON = file_get_contents('php://input'); 
        $data = json_decode($corpsJSON, TRUE);

        if(isset($data['titre']) 
            && isset($data['sousTitre'])
            && isset($data['image']) 
            && isset($data['description'])
            && isset($data['type'])
            && isset($data['verifie'])
            && isset($data['datePublication'])
            && isset($data['visibilite'])) {
        
            $resultat->message = modele_liste::ajouter($data['titre'],
                                                            $data['sousTitre'], 
                                                            $data['image'], 
                                                            $data['description'], 
                                                            $data['type'], 
                                                            $data['verifie'], 
                                                            $data['datePublication'], 
                                                            $data['visibilite'], 
                                                        );
        } else {
            $resultat->message = "Impossible d'ajouter une liste. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }
    

    /***
     * Fonction permettant de modifier un liste
     */
    function editerJSON() {

        $resultat = new stdClass();
        $corpsJSON = file_get_contents('php://input'); 
        $data = json_decode($corpsJSON, TRUE);


        if(isset($_GET['id']) 
            && isset($data['titre']) 
            && isset($data['sousTitre'])
            && isset($data['image']) 
            && isset($data['description'])            
            && isset($data['type'])
            && isset($data['verifie'])
            && isset($data['datePublication'])
            && isset($data['visibilite'])            ) {
        
            $resultat->message = modele_liste::editer($_GET['id'], 
                                                            $data['titre'],
                                                            $data['sousTitre'], 
                                                            $data['image'], 
                                                            $data['description'], 
                                                            $data['type'], 
                                                            $data['datePublication']);
        } else {
            $resultat->message = "Impossible d'éditer une liste. Des informations sont manquantes";
        }

        echo json_encode($resultat);
    }

    /**
     * Fonction permettant de supprier un liste et retourner du JSON
     */
    function supprimerJSON() {
        
        $resultat = new stdClass();

        if(isset($_GET['id'])) {
            $resultat->message = modele_liste::supprimer($_GET['id']);
        } else {
            $resultat->message = "Impossible de supprimer le liste. Des informations sont manquantes";
        }

        echo json_encode($resultat);
    }

}

?>
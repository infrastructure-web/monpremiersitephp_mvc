<?php

require_once __DIR__ . '/../modeles/chansons.php';

class ControleurChanson {

    /***
     * Fonction permettant de récupérer l'ensemble des listes et de les afficher sous forme de liste
     */
    function afficherToutesChansonsJSON() {
        $chansons = modele_chanson::ObtenirTous();
        echo json_encode($chansons);
    }

    function afficherChansonsListeJSON($id_liste) {
        $chansons = modele_chanson::ObtenirListe($id_liste);  
        echo json_encode($chansons);
    }
        
    /**
     * Fonction permettant de récupérer un liste et l'afficher au format JSON
     */
    function afficherUneChansonJSON($id) {
        $resultat = new stdClass();
        $liste = modele_chanson::ObtenirUn($id);
        if($liste) {  // ou if($liste != null)
            echo json_encode($liste);
        } else {
            $resultat->$message = "Aucune liste trouvée";
            echo json_encode($resultat);
        }
    } 
}

?>
<?php

require_once __DIR__ . "/../include/config.php";

class modele_liste {
    public $id; 
    public $titre; 
    public $sousTitre;
    public $image;
    public $description;
    public $type;
    public $verifie;
    public $datePublication;
    public $visibilite;


    /***
     * Fonction permettant de construire un objet de type modele_liste
     */
    public function __construct($id, $titre, $sousTitre, $image, $description, $type, $verifie, $datePublication, $visibilite) {
        $this->id = $id;
        $this->titre  = $titre; 
        $this->sousTitre = $sousTitre;
        $this->image = $image;
        $this->description = $description;
        $this->type = $type;
        $this->verifie = $verifie;
        $this->datePublication = $datePublication;
        $this->visibilite = $visibilite;
    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des listes 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM listes ORDER BY titre");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_liste($enregistrement['id'], $enregistrement['titre'], $enregistrement['soustitre'], 
                                        $enregistrement['image'], $enregistrement['description'], $enregistrement['type'], 
                                        $enregistrement['verifie'], $enregistrement['datePublication'], $enregistrement['visibilite']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des listes 
     */
    public static function ObtenirPubliques() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM listes where visibilite = 'publique' ORDER BY titre");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_liste($enregistrement['id'], $enregistrement['titre'], $enregistrement['soustitre'], 
                                        $enregistrement['image'], $enregistrement['description'], $enregistrement['type'], 
                                        $enregistrement['verifie'], $enregistrement['datePublication'], $enregistrement['visibilite']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des listes 
     */
    public static function ObtenirUtilisateur($id_utilisateur) {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT listes.id as id, titre, soustitre, image, description, type, verifie, datePublication, visibilite as id FROM listes inner join listes_utilisateurs on listes.id = listes_utilisateurs.liste_id WHERE listes_utilisateurs.utilisateur_id = ?;");

        $requete->bind_param("i", $id_utilisateur); // Envoi des paramètres à la requête
        $requete->execute();
        $result = $requete->get_result();

        while($enregistrement = $result->fetch_assoc()) {
            $liste[] = new modele_liste($enregistrement['id'], $enregistrement['titre'], $enregistrement['sousTitre'], 
                                        $enregistrement['image'], $enregistrement['description'], $enregistrement['type'], 
                                        $enregistrement['verifie'], $enregistrement['datePublication'], $enregistrement['visibilite']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un liste en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM listes WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $liste = new modele_liste($enregistrement['id'], $enregistrement['titre'], $enregistrement['soustitre'], 
                                            $enregistrement['image'], $enregistrement['description'], $enregistrement['type'], 
                                            $enregistrement['verifie'], $enregistrement['datePublication'], $enregistrement['visibilite']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return null;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return null;
        }

        return $liste;
    }

    /***
     * Fonction permettant d'ajouter un liste
     */
    public static function ajouter($titre, $sousTitre, $image, $description, $type, $verifie, $datePublication, $visibilite) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO listes(titre, sousTitre, image, description, type, verifie, datePublication, visibilite) VALUES(?, ?, ?, ?, ?, ?, ?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sssssiss", $titre, $sousTitre, $image, $description, $type, $verifie, $datePublication, $visibilite);

        if($requete->execute()) { // Exécution de la requête
            $message = "liste ajoutée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant d'éditer un liste
     */
    public static function editer($id, $titre, $sousTitre, $image, $description, $type, $verifie, $datePublication, $visibilite) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE listes SET titre=?, sousTitre=?, image=?, description=?, type=?, verifie=?, datePublication=?, visibilite=? WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sssssissi", $titre, $sousTitre, $image, $description, $type, $verifie, $datePublication, $visibilite, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "liste modifiée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            $message = "Une erreur a été détectée dans la requête utilisée : ";
            $message .= $mysqli->error;
        }

        return $message;
    }

    /***
     * Fonction permettant de supprimer un liste
     */
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM listes WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "liste supprimée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            $message = "Une erreur a été détectée dans la requête utilisée : ";
            $message .= $mysqli->error;
        }

        return $message;
    }
}

?>
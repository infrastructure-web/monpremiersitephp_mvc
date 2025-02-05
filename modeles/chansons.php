<?php

require_once __DIR__ . "/../include/config.php";

class modele_chanson {
    public $id; 
    public $titre; 
    public $artiste;
    public $paroles;
    public $album;
    public $datePublication;
    public $duree;
    public $nombreLectures;


    /***
     * Fonction permettant de construire un objet de type modele_chanson
     */
    public function __construct($id, $titre, $artiste, $paroles, $album, $datePublication, $duree, $lectures) {
        $this->id = $id;
        $this->titre  = $titre;
        $this->artiste = $artiste;
        $this->paroles = $paroles;
        $this->album = $album;
        $this->datePublication = $datePublication;
        $this->duree = $duree;
        $this->nombreLectures = $lectures;
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
        $chansons = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM chansons ORDER BY titre");

        foreach ($resultatRequete as $enregistrement) {
            $chansons[] = new modele_chanson($enregistrement['id'], $enregistrement['titre'], $enregistrement['artiste'], 
                                        $enregistrement['paroles'], $enregistrement['album'], $enregistrement['datePublication'], 
                                        $enregistrement['duree'], $enregistrement['lectures']);
        }

        return $chansons;
    }


    /***
     * Fonction permettant de récupérer l'ensemble des listes 
     */
    public static function ObtenirListe($id_Liste) {
        $chansons = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT chansons.id as id, titre, artiste, paroles, album, datePublication, duree, lectures inner join listes_chansons on chansons.id = listes_chansons.chanson_id WHERE listes_utilisateurs.utilisateur_id = ?;");

        $requete->bind_param("i", $id_Liste); // Envoi des paramètres à la requête
        $requete->execute();
        $result = $requete->get_result();

        while($enregistrement = $result->fetch_assoc()) {
            $chansons[] = new modele_chanson($enregistrement['id'], $enregistrement['titre'], $enregistrement['artiste'], 
                                        $enregistrement['paroles'], $enregistrement['album'], $enregistrement['datePublication'], 
                                        $enregistrement['duree'], $enregistrement['lectures']);
        }

        return $chansons;
    }

    /***
     * Fonction permettant de récupérer un liste en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM chansons WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $liste = new modele_chanson($enregistrement['id'], $enregistrement['titre'], $enregistrement['artiste'], 
                                        $enregistrement['paroles'], $enregistrement['album'], $enregistrement['datePublication'], 
                                        $enregistrement['duree'], $enregistrement['lectures']);
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
}

?>
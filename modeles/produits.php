<?php


    
class modele_produit {
    public $id; 
    public $code; 
    public $produit;
    public $prix_vente;
    public $qte_stock;

    public function __construct($id, $code, $produit, $prix_vente, $qte_stock) {
        $this->id = $id;
        $this->code = $code;
        $this->produit = $produit;
        $this->prix_vente = $prix_vente;
        $this->qte_stock = $qte_stock;
    }

    static function connecter() {
        include_once "./include/config.php";
        $mysqli = new mysqli($host, $username, $password, $database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        } 

        return $mysqli;
    }

    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, code, produit, prix_vente, qte_stock FROM produits ORDER BY code");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_produit($enregistrement['id'], $enregistrement['code'], $enregistrement['produit'], $enregistrement['prix_vente'], $enregistrement['qte_stock']);
        }

        return $liste;
    }
}

?>
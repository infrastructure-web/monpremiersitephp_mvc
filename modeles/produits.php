<?php

require_once "./include/config.php";

class modele_produit {
    public $id; 
    public $code; 
    public $produit;
    public $prix_vente;
    public $qte_stock;

    /***
     * Fonction permettant de construire un objet de type modele_produit
     */
    public function __construct($id, $code, $produit, $prix_vente, $qte_stock) {
        $this->id = $id;
        $this->code = $code;
        $this->produit = $produit;
        $this->prix_vente = $prix_vente;
        $this->qte_stock = $qte_stock;
    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, code, produit, prix_vente, qte_stock FROM produits ORDER BY code");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_produit($enregistrement['id'], $enregistrement['code'], $enregistrement['produit'], $enregistrement['prix_vente'], $enregistrement['qte_stock']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un produit en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, code, produit, prix_vente, qte_stock FROM produits ORDER BY code WHERE id=?");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_produit($enregistrement['id'], $enregistrement['code'], $enregistrement['produit'], $enregistrement['prix_vente'], $enregistrement['qte_stock']);
        }

        return $liste;
    }
}

?>
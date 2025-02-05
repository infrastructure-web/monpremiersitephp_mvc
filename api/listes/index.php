<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: POST, DELETE, PUT, OPTIONS");
  header('Access-Control-Allow-Headers: Content-Type');

  require_once __DIR__ . "/../../controlleurs/listes.php";
  
  $controleurListe=new ControleurListe;

  switch($_SERVER['REQUEST_METHOD']) { 

    case 'GET': 
      if(isset($_GET["id"])){
        $liste = $controleurListe->afficherUneListeJSON($_GET["id"]);
      } else if(isset($_GET["public"])) { 
        $listes = $controleurListe->afficherListesPubliquesJSON();
      } else if(isset($_GET["utilisateur"]) ) { 
        $listes = $controleurListe->afficherListesPubliquesJSON($_GET["utilisateur"]);
      } else {
        $listes = $controleurListe->afficherToutesListesJSON();
      }
      
      break;


    case 'POST':
      $controleurListe->ajouter();
      break;


    case 'PUT':
      $controleurListe->editer();
      break;

    case 'DELETE':
        $controleurListe->supprimer(); 
        break;
    }
?>

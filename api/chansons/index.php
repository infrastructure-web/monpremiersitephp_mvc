<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: POST, DELETE, PUT, OPTIONS");
  header('Access-Control-Allow-Headers: Content-Type');

  require_once __DIR__ . "/../../controlleurs/chansons.php";
  
  $controleurListe=new ControleurChanson;

  /** 
   * todo : Réviser, tester et corriger
   */
  switch($_SERVER['REQUEST_METHOD']) { 

    case 'GET': 
      if(isset($_GET["id"])){
        $liste = $controleurListe->afficherUneChansonJSON($_GET["id"]);
        echo json_encode(liste);
      } else if(isset($_GET["liste"]) ) { 
        $controleurListe->afficherListesPubliquesJSON($_GET["liste"]);
      } else {
        $listes = $controleurListe->afficherToutesChansonsJSON();
      }
      
      break;
    }
?>

<?php
  header('Content-Type: application/json');

  require_once __DIR__ . "/../controlleurs/produits.php";
  
  $controllerProduits=new ControlleurProduit;

  switch($_SERVER['REQUEST_METHOD']) { 

    case 'GET': 
      if(!isset($_GET["id"])){
        $controllerProduits->afficherJSON();
      } else  {
        $controllerProduits->afficherFicheJSON();
      }
      
      break;


    case 'POST':
      $controllerProduits->ajouterJSON();
      break;


    case 'PUT':
      $controllerProduits->editerJSON();
      break;

    case 'DELETE':
        $controllerProduits->supprimerJSON(); 
        break;
    }
?>

<?php
  header('Content-Type: application/json');

  require_once 'controlleurs/produits.php';
  
  $controllerProduits=new ControlleurProduit;
  $controllerProduits->afficherJSON();
?>

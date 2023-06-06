<?php
    require_once 'controlleurs/produits.php';
    $controllerProduits=new ControlleurProduit;
    $controllerProduits->afficherJSON();
?>
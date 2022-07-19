<?php session_start(); ?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title><?= $title ?></title>
 </head>
 <body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="contact.php">Contact</a></li>

            <?php if(isset($_SESSION["utilisateur"])) { ?>
                <li><a href="membres.php">section membres</a></li>
            <?php } ?>

        </ul>

        <? require 'vues/authentification/formulaireAuthentification.php'; ?>
    </nav>
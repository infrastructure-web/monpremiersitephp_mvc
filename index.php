<?php
    require_once 'controlleurs/listes.php';
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Mon super site - Accueil</title>
 </head>
 <body>
    <div>
      <h1><?php echo 'Bonjour le monde!'; ?></h1>
	    Ma page d'accueil est vraiment géniale, non? :) <br><br>
      <a href="api/listes/">Consulter toutes les listes de lecture</a><br>
      <a href="api/listes/?public=true">Consulter les listes de lecture publiques</a><br>
      <a href="api/listes/?id=1">Consulter la liste de lecture #1</a><br>
      <a href="api/listes/?user=1">Consulter les listes de lecture de l'utilisateur 1</a><br><br>

      <a href="api/chansons/">Consulter les chansons</a><br>
    </div>
 </body>
</html>



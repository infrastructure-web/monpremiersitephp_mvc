<?php
    require_once 'controleurs/authentification.php';

    if (isset($_POST['boutonConnexion'])) {        
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) { 
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->deconnecter();
    }
?>

<?php if(!isset($_SESSION["utilisateur"])) { ?>
    <h2>Formulaire d'authentification</h2>
    <form method="POST">
        <label for="utilisateur_login">Utilisateur</label>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required>

        <label for="mot_de_passe_login">Mot de passe</label>
        <input type="password" id="mot_de_passe_login" name="mot_de_passe_login" required>

        <button name="boutonConnexion" type="submit">Connexion</button>
    </form>

<?php } else { ?>
    Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?> 
        
    <form method="POST">
        <button name="boutonDeconnexion" type="submit">Déconnexion</button>
    </form>
<?php } ?>

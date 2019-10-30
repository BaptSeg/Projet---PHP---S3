<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../view/css/connexion.view.css">
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">
          <a href="../controler/acceuil.ctrl.php">
            <img src="../model/img/L'encoignure_adequate.png" alt="logo" height="55 px" width="55 px">
          </a>
          <div class="titre">
            <h1>L'encoignure adéquate</h1>
            <p>Le site pour trouver la parfaite encoignure sans contentieux</p>
          </div>
        </div>
        <div class="navbar">
          <ul>
            <li>
              <a href="../controler/acceuil.ctrl.php">
              <img src="../model/img/icone_retour.png" alt="icon_user" height="30 px" width="30 px">Retour à l'acceuil</a>
            </li>
            <li>
              <a href="../controler/inscription.ctrl.php">
              <img src="../model/img/icone_inscription.png" alt="icon_inscription" height="30 px" width="30 px"> Créer un compte </a>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <h2>Connexion</h2>

    <?php if (isset($erreur)): ?>
        <p class="error_msg"> <?php echo $erreur ?> </p>
    <?php endif; ?>

    <form class="" action="../controler/connexion.ctrl.php" method="post">
      <fieldset>
        <table>
          <tr>
            <td><img class="login" src="../model/img/icone_utilisateur_connexion.png" alt="Login"></td>
            <td><input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required></td>
          </tr>
          <tr>
            <td><img class="mdp" src="../model/img/icone_utilisateur_mdp.png" alt="Password"></td>
            <td><input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required></td>
          </tr>
        </table>

        <input type="submit" value="Connexion" name="connexion" />
      </fieldset>
    </form>

    <a class="info" href="inscription.ctrl.php">Pas encore de compte ? Créer-en un ici ! </a>

  </body>
</html>

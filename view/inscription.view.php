<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="../view/css/inscription.view.css">
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
              <a href="../controler/connexion.ctrl.php">
                <img src="../model/img/icone_utilisateur_connexion.png" alt="icon_connexion" height="30 px" width="30 px"> Se connecter </a>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <h2>Inscription</h2>

      <?php if (isset($erreur)): ?>
        <p class="error_msg"><?= $erreur ?> </p>
      <?php endif; ?>
      <form method="post" action="../controler/inscription.ctrl.php">
        <fieldset>
          <p>
            <input type="text" name="pseudo" id="pseudo" placeholder="Identifiant" required> <br>
            <input type="password" name="mdp1" id="mdp1" placeholder="Mot de passe" required> <br>
            <input type="password" name="mdp2" id="mdp2" placeholder="Confirmation" required> <br>
            <input type="email" name="email" id="email" placeholder="Email" required/> <br>
            <input type="submit" value="Inscription" name="inscription" />
          </p>
        </fieldset>
      </form>

    </body>
    </html>

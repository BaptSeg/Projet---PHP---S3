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

      <?php if (isset($erreur)): ?> <!-- Nous permets d'afficher les messages d'erreur -->
        <p class="error_msg"><?= $erreur ?> </p>
      <?php endif; ?>

      <!-- Formulaire de d'inscription-->
      <form method="post" action="../controler/inscription.ctrl.php">
        <fieldset>
            <table>
              <tr>
                <td><img class="login" src="../model/img/icone_utilisateur_connexion.png" alt="Login"></td>
                <td><input type="text" name="pseudo" id="pseudo" placeholder="Identifiant" required></td>
              </tr>
              <tr>
                <td><img class="mdp" src="../model/img/icone_utilisateur_mdp.png" alt="Passeword"></td>
                <td><input type="password" name="mdp1" id="mdp1" placeholder="Mot de passe" required></td>
              </tr>
              <tr>
                <td><img class="mdp" src="../model/img/icone_utilisateur_mdp.png" alt="Passeword"></td>
                <td><input type="password" name="mdp2" id="mdp2" placeholder="Confirmation mot de passe" required></td>
              </tr>
              <tr>
                <td><img class="email" src="../model/img/icone_mail.png" alt="Email"></td>
                <td><input type="email" name="email" id="email" placeholder="Email" required></td>
              </tr>
              <tr>
                <td><img class="tel" src="../model/img/icone_telephone.png" alt="Telephone"></td>
                <td><input type="tel" name="tel" pattern="[0-9]{10}" placeholder="Téléphone 0123456789"required></td>
              </tr>
              <tr>
                <td><img class="adresse" src="../model/img/icone_adresse.png" alt="Adresse"></td>
                <td><input type="text" name="adresse" id="adresse" placeholder="Adresse" required></td>
              </tr>
              <tr>
                <td><input type="submit" value="Inscription" name="inscription" /></td>
              </tr>
            </table>
        </fieldset>
      </form>

    </body>
    </html>

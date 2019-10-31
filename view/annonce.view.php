<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>L'enconure adequate</title>
  <link rel="stylesheet" href="../view/css/annonce.view.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
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
          <?php if (isset($_SESSION['pseudo'])): ?>
            <li>
              <a href="../controler/depotAnnonce.ctrl.php">
              <img src="../model/img/icone_deposer_annonce.png" alt="icon_deposer_annonce" height="30 px" width="30 px">
              Deposer une annonce
              </a>
            </li>
            <li>
              <a href="../view/test.html">
              <img src="../model/img/icone_utilisateur.png" alt="icon_user" height="30 px" width="30 px">
              <?= $_SESSION['pseudo'] ?>
              </a>
            </li>
            <li>
              <a href="../controler/deconnexion.ctrl.php">
              <img src="../model/img/icone_deconnexion.png" alt="icon_inscription" height="30 px" width="30 px"> Se déconnecter </a>
            </li>
          <?php else: ?>
            <li>
              <a href="../controler/connexion.ctrl.php">
              <img src="../model/img/icone_utilisateur.png" alt="icon_user" height="30 px" width="30 px">
              Se connecter
              </a>
            </li>
            <li>
              <a href="../controler/inscription.ctrl.php">
              <img src="../model/img/icone_inscription.png" alt="icon_inscription" height="30 px" width="30 px"> Créer un compte </a>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </nav>

  </header>

  <div class="Annonce">

    <div class="retour">
      <ul>
        <li>
          <a href="../controler/acceuil.ctrl.php">
          <img src="../model/img/icone_retour.png" alt="icon_user" height="30 px" width="30 px">Retour à l'acceuil
          </a>
        </li>
      </ul>
    </div>

    <fieldset>
      <div class="intitule">
        <h2><?=$annonce->getIntitule() ?></h2>
      </div>
    </fieldset>


    <div class="Infos">
      <p><?= $annonce->getPrix()?></p>
      <p><?=$utilisateur->getPseudo() ?></p>
      <p><?=$utilisateur->getEmail() ?></p>

    </div>

    <div class="Description">
      <p><?=$annonce->getDescription() ?></p>

    </div>

    <div class="Localisation">

      <p><?=$annonce->getVille() ?></p>

    </div>

    <div class="Suggestions">
      <?php

      ?>
    </div>

  </div>


</body>
</html>

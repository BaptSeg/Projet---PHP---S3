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
              <a href="../controler/profil.ctrl.php">
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

    <div>
      <ul>
        <li class="retour">
          <a href="../controler/rechercheAnnonce.ctrl.php?categorie=<?= $_GET['categorie'] ?>&region=<?= $_GET['region'] ?>&prixMin=<?= $_GET['prixMin'] ?>&prixMax=<?= $_GET['prixMax'] ?>">
          <img src="../model/img/icone_retour.png" alt="icon_user" height="30 px" width="30 px">Retour à l'acceuil
          </a>
        </li>
      </ul>
    </div>

    <fieldset>
      <div class="intitule">
        <h2><?=$annonce->getIntitule() ?></h2>
      </div>

      <div class="photos">
        <?php if (empty($photos)): ?>
          <img class="photo" src="../model/img/icone_image_annonce_result.png" alt="Photos">
        <?php else: ?>
          <?php if ($id_photo > 0): ?>
            <a href="../controler/annonce.ctrl.php?idAnnonce=<?= $idAnnonce ?>&id_photo=<?= $id_photo-1 ?>&categorie=<?= $_GET['categorie'] ?>&region=<?= $_GET['region'] ?>&prixMin=<?= $_GET['prixMin'] ?>&prixMax=<?= $_GET['prixMax']?>">
              <img class="suiv_pred" src="../model/img/icone_precedent.png" alt="Precèdent">
            </a>
          <?php endif; ?>

            <img class="photo" src="<?= $photos[$id_photo]['url'] ?>" alt="Photos">

          <?php if ($id_photo < count($photos)-1): ?>
            <a href="../controler/annonce.ctrl.php?idAnnonce=<?= $idAnnonce ?>&id_photo=<?= $id_photo+1 ?>&categorie=<?= $_GET['categorie'] ?>&region=<?= $_GET['region'] ?>&prixMin=<?= $_GET['prixMin'] ?>&prixMax=<?= $_GET['prixMax']?>">
              <img class="suiv_pred" src="../model/img/icone_suivant.png" alt="Precèdent">
            </a>
          <?php endif; ?>
        <?php endif; ?>

      </div>

      <p class="num_photo"><?= ($id_photo+1)."/".count($photos) ?></p>

      <div class="info_photo">
        <table>
          <tr>
            <th>Deposé par : </th>
            <td><?= $utilisateur->getPseudo() ?></td>
          </tr>
          <tr>
            <th>Téléphone : </th>
            <td><?= $utilisateur->getTelephone() ?></td>
          </tr>
          <tr>
            <th>Categorie : </th>
            <td><?= $annonce->getCategorie() ?></td>
          </tr>
          <tr>
            <th>Ville : </th>
            <td><?= $annonce->getVille() ?></td>
          </tr>
          <tr>
            <th>Description : </th>
            <td><?= $annonce->getDescription() ?></td>
          </tr>
          <tr>
            <th>Prix : </th>
            <td><?= $annonce->getPrix()."€" ?></td>
          </tr>

        </table>
      </div>

    </fieldset>

  </div>


</body>
</html>

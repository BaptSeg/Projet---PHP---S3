<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../view/css/profil.view.css">
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

          </ul>
        </div>
      </nav>
    </header>

    <div class="container">
      <div>
        <h2 class="info">Voici votre profil <?= $pseudo ?></h2>
        <fieldset>
          <h3>Vos informations</h3>
          <table>
            <tr>
              <th>Pseudo : </th>
              <td><?= $pseudo ?></td>
            </tr>
            <tr>
              <th>Adresse mail : </th>
              <td><?= $email ?></td>
            </tr>
            <tr>
              <th>Adresse : </th>
              <td><?= $adresse ?></td>
            </tr>
            <tr>
              <th>Telephone : </th>
              <td><?= $telephone ?></td>
            </tr>
            <tr>
              <th>Date d'inscription : </th>
              <td><?= $date_inscription ?></td>
            </tr>
          </table>
        </fieldset>
      </div>

      <div class="annonce">

            <?php if (empty($annonces)): ?>
              <h2>Vos annonces</h2>
              <p class="erreur">Vous n'avez pas encore déposé d'annonce.</p>

            <?php else: ?>

              <div class="defile_annonce">
                <h2>Vos annonces</h2>
                <div class="defile_annonce_2">
                  <?php if ($id_annonces > 0): ?>
                    <a class="bouton_pred_titre" href="../controler/profil.ctrl.php?id_photo=0&id_annonces=<?= $id_annonces-1 ?>">
                      <img class="suiv_pred" src="../model/img/icone_precedent.png" alt="Precèdent">
                    </a>
                  <?php endif; ?>
                  <p class="num"><?= ($id_annonces+1)."/".count($annonces)  ?></p>
                  <?php if ($id_annonces < count($annonces)-1): ?>
                    <a class="bouton_next_titre" href="../controler/profil.ctrl.php?id_photo=0&id_annonces=<?= $id_annonces+1 ?>">
                      <img class="suiv_pred" src="../model/img/icone_suivant.png" alt="Precèdent">
                    </a>
                  <?php endif; ?>
                </div>
              </div>

              <fieldset class="fieldset_annonce">

                <h3><?= $annonces[$id_annonces]->getIntitule() ?></h3>

                <?php if (empty($les_photos[$id_annonces])): ?>
                  <img class="photo" src="../model/img/icone_image_annonce.png" alt="Photos">
                <?php else: ?>

                  <div class="une_annonce">
                    <?php if ($id_photo > 0): ?>
                      <a href="../controler/profil.ctrl.php?id_photo=<?= $id_photo-1 ?>&id_annonces=<?= $id_annonces ?>">
                        <img class="suiv_pred" src="../model/img/icone_precedent.png" alt="Precèdent">
                      </a>
                    <?php endif; ?>

                    <img class="photo" src="<?= $les_photos[$id_annonces][$id_photo]['url'] ?>" alt="Photos">

                    <?php if ($id_photo < count($les_photos[$id_annonces])-1): ?>
                      <a href="../controler/profil.ctrl.php?id_photo=<?= $id_photo+1 ?>&id_annonces=<?= $id_annonces ?>">
                        <img class="suiv_pred" src="../model/img/icone_suivant.png" alt="Precèdent">
                      </a>
                    <?php endif; ?>
                  </div>

                  <p class="num_photo"><?= ($id_photo+1)."/".count($les_photos[$id_annonces]) ?></p>
                <?php endif; ?>

                <div class="info_photo">
                  <table>
                    <tr>
                      <th>Description : </th>
                      <td><?= $annonces[$id_annonces]->getDescription() ?></td>
                    </tr>
                    <tr>
                      <th>Prix : </th>
                      <td><?= $annonces[$id_annonces]->getPrix()."€" ?></td>
                    </tr>
                    <tr>
                      <th>Date de publication : </th>
                      <td><?= $annonces[$id_annonces]->getDate_Publication() ?></td>
                    </tr>
                    <tr>
                      <th>Date de suppression : </th>
                      <td><?= $annonces[$id_annonces]->getDate_Suppression() ?></td>
                    </tr>
                    <tr>
                      <th>Ville : </th>
                      <td><?= $annonces[$id_annonces]->getVille() ?></td>
                    </tr>
                    <tr>
                      <th>Categorie : </th>
                      <td><?= $annonces[$id_annonces]->getCategorie() ?></td>
                    </tr>
                  </table>
                </div>

                <?php endif; ?>
            </fieldset>


      </div>

    </div>


  </body>
</html>

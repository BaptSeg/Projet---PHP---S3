<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>L'enconure adequate</title>
    <link rel="stylesheet" href="../view/css/rechercheAnnonce.css">
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
                <img src="../model/img/icone_deposer_annonce.png" alt="icon_deposer_annonce" height="30 px" width="30 px">
                Deposer une annonce
                </a>
              </li>
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

    <?php if (isset($erreur)): ?>
      <p class="erreur_msg"> <?php echo $erreur ?> </p>
    <?php endif; ?>

    <form method="post" action="../controler/rechercheAnnonce.ctrl.php">
      <fieldset>

        <h2>Rechercher une annonce</h2>

        <table>
          <div class="categ/reg">
            <tr>
              <td><img class="categorie" src="../model/img/icone_categories.png" alt="Categorie"></td>
              <td>
                <select name="categorie" id="categorie">
                  <option disabled selected>Categorie</option>
                  <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                      echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
                  }?>
                </select>
              </td>
              <td><img class="region" src="../model/img/icone_adresse.png" alt="Region"></td>
              <td>
                <select name="region" id="region">
                  <option disabled selected>Region</option>
                  <?php for ($i=0; $i < sizeof($region)-1; $i++){
                      echo '<option value="'.$region[$i]['region'].'">'.$region[$i]['region'].'</option>';
                    }?>
                </select>
              </td>
            </tr>
            <tr>
              <td><img class="prix" src="../model/img/icone_euro.png" alt="Prix"></td>
              <td><input type="number" step="0.01" name="prixMin" min="0" max="10000000" id="prixMin" placeholder="Prix minimum" required></td>
              <td><img class="prix" src="../model/img/icone_euro.png" alt="Prix"></td>
              <td><input type="number" step="0.01" name="prixMax" min="0" max="10000000" id="prixMax" placeholder="Prix maximum" required></td>
            </tr>
          </div>
        </table>

        <input type="submit" name="rechercher" value="Rechercher">

      </fieldset>
    </form>

    <?php if (!empty($annonce)): ?>

      <div class="resultat">
        <h2>Voici les annonces obtenues</h2>

        <?php foreach ($annonce as $key => $value): ?>
          <fieldset class="fieldset_result">
            <div class="annonce">
              
              <h3><?= $value->getIntitule() ?></h3>

              <a href="../controler/annonce.ctrl.php?idAnnoncce=<?= $value->getId() ?>">
                <?php if (!empty($les_photos[$key])): ?>
                  <img class="photo" src="<?= $les_photos[$key][0]['url'] ?>" alt="photos">
                <?php else: ?>
                  <img class="photo" src="../model/img/icone_image_annonce_result.png" alt="photos">
                <?php endif; ?>
              </a>


              <p><?= $value->getPrix()."€" ?></p>

            </div>
          </fieldset>
        <?php endforeach; ?>

      </div>

    <?php else: ?>
      <div class="resultat">
        <p>Aucune annonce trouvé.</p>
      </div>
    <?php endif; ?>


  </body>
</html>

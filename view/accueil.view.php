<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>L'enconure adequate</title>
  <link rel="stylesheet" href="../view/css/accueil.view.css">
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

  <?php if (isset($confirm)): ?>
    <p class="confirm"> <?php echo $confirm ?></p>
  <?php endif; ?>

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
            <td><input type="number" name="prixMin" min="0" max="10000000" id="prixMin" placeholder="Prix minimum" required></td>
            <td><img class="prix" src="../model/img/icone_euro.png" alt="Prix"></td>
            <td><input type="number" name="prixMax" min="0" max="10000000" id="prixMax" placeholder="Prix maximum" required></td>
          </tr>
        </div>
      </table>

      <input type="submit" name="rechercher" value="Rechercher">

    </fieldset>
  </form>

</body>
</html>

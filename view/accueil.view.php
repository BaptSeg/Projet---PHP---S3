
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>L'enconure adequate</title>
  <link rel="stylesheet" href="../view/accueil.view.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
  <header>

    <nav>
      <div class="logo">
        <img src="../model/img/L'encoignure_adequate" alt="logo" height="60 px" width="60 px">
        <div class="titre">
          <h1>L'encoignure adéquate</h1>
          <p>Le site pour trouver la parfaite encoignure sans contentieux</p>
        </div>
      </div>
      <div class="navbar">
        <ul>
          <li>
            <a href="../view/test.html">
            <img src="../model/img/icone_deposer_annonce.png" alt="icon_deposer_annonce" height="30 px" width="30 px">
            Deposer une annonce
            </a>
          </li>
          <?php if (isset($_SESSION['pseudo'])): ?>
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
  <form method="post" action="../controler/acceuil.ctrl.php">
    <fieldset>
      <p>
        <div class="searchbar">

          <p> Rechercher une encoignure </p>
          <div class="choix">
            <select name="Categorie" id="Categorie">
              <option value="" selected>Categorie</option>
              <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                  echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
                }?>
            </select>
          </div>

          <div class="choix">
            <select name="Region" id="Region">
              <option value="" selected>Region</option>
              <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
              <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
              <option value="Bretagne">Bretagne</option>
              <option value="Centre-Val de Loire">Centre-Val de Loire</option>
              <option value="Corse">Corse</option>
              <option value="Grand Est">Grand Est</option>
              <option value="Guadeloupe">Guadeloupe</option>
              <option value="Guyane">Guyane</option>
              <option value="Hauts-de-France">Hauts-de-France</option>
              <option value="Île-de-France">Île-de-France</option>
              <option value="Martinique">Martinique</option>
              <option value="Mayotte">Mayotte</option>
              <option value="Normandie">Normandie</option>
              <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
              <option value="Occitanie">Occitanie</option>
              <option value="Pays de la Loire">Pays de la Loire</option>
              <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
              <option value="La Réunion">La Réunion</option>
            </select>
          </div>

          <div class="choix">
            <select name="Prix" id="Prix">
              <option value="" selected>Prix</option>
              <option value="1-5">1-5</option>
              <option value="cat">nul</option>
            </select>
          </div>

          <input type="submit" value="Rechercher" name="Rechercher" />
        </div>
      </p>
    </fieldset>
  </form>

</body>
</html>

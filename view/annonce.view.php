<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>L'enconure adequate</title>
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
    <form method="post" action="../controler/acceuil.ctrl.php">
      <fieldset>
        <p>
          <div class="searchbar">

            <div class="txtrech">
              <p> Rechercher une annonce </p>
            </div>

            <div class="soussearchbar">
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
                    <option value="La Réunion">Lae6e6e6 Réunion</option>
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

          </div>
        </p>
      </fieldset>
    </form>

<div class="conteneur">
  <?php


  if (($_POST['Categorie']!= 'categorie')){
    
    foreach ($annonce as $key => $value):
      echo"<div class="annonce">";
      echo"  <img src="" alt=""> ";
      echo"</div>";
    endforeach;

  }


    ?>
</div>
  </body>
</html>
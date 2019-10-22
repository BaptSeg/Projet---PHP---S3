<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>L'enconure adequate</title>
  <link rel="stylesheet" href="accueil.css">
</head>
<body>
  <header>

    <ul class="Entete">
      <li> <img src="./L'enconure adequate.png" alt="logo" height="100 px" width="100 px"> </li>
      <li> <h1>L'enconure adequate</h1> </li>
      <li>
        <a href="../view/test.html">
        <img src="../model/data/icone_deposer_annonce.png" alt="icon_deposer_annonce" height="40 px" width="40 px">
        Deposer une annonce
        </a>
      </li>
      <li>
        <a href="../view/test.html">
        <img src="../model/data/icone_utilisateur.png" alt="icon_user" height="40 px" width="40 px">
        Se connecter
        </a>
      </li>
      <li> <a href="../view/test.html">Creer un compte</a> </li>
    </ul>

  </header>
  <form method="post" action="../controler/acceuil.ctrl.php">
    <fieldset>
      <p>
        <img src="../model/data/icone_categories.png" alt="icon_user" height="40 px" width="40 px">
        <select name="Categorie" id="Categorie">
          <option value="" selected>Categorie</option>

          <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
              echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
          }?>
        </select>

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

        <select name="Prix" id="Prix">
          <option value="" selected>Prix</option>
          <option value="1-5">1-5</option>
          <option value="cat">nul</option>
        </select>
        <input type="submit" value="Rechercher" name="Rechercher" />
      </p>
    </fieldset>
  </form>

</body>
</html>

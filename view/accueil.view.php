<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>L'enconure adequate</title>
  <link rel="stylesheet" href="accueil.css">
</head>
<body>
  <header>
    <div class="enTete">
      <img src="./L'enconure adequate.png" alt="logo" height="40 px" width="40 px">
      <h1>L'enconure adequate</h1>
      <a href="../view/test.html">Deposer une annonce</a>
    </div>

    <div class="connection">
      <a href="../view/test.html">Se connecter</a>
      <a href="../view/test.html">Creer un compte</a>
    </div>
  </header>
  <form method="post" action="../controler/acceuil.ctrl.php">
    <fieldset>
      <p>
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

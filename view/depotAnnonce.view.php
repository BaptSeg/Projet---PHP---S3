<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Depot annonce</title>
    <link rel="stylesheet" href="../view/css/depotAnnonce.view.css">
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
                <a href="../view/test.html">
                <img src="../model/img/icone_utilisateur.png" alt="icon_user" height="30 px" width="30 px">
                <?= $_SESSION['pseudo'] ?>
                </a>
              </li>
              </ul>
            </div>
          </nav>
        </header>
    <h2>Deposer une annonce</h2>
    <?php if (isset($erreur)): ?>
      <p><?= $erreur ?></p>
    <?php endif; ?>
    <form method="post" action="../controler/depotAnnonce.ctrl.php" enctype="multipart/form-data">
       <fieldset>
         <p>
           <input type="text" name="intitule" id="intitule" placeholder="Libellé" required> <br>
           <select name="Categorie" id="Categorie">
             <option value="categorie" selected>Categorie</option>
             <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                 echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
             }?>
           </select><br>
           <input type="number" name="prix" min="0" id="prix" placeholder="Prix" required> <br>
           <textarea id="description" name="description" rows="5" cols="33" maxlength="500" placeholder="Saisir une description" required></textarea><br>
           <input id="image" type="file" name="image" accept=".jpg,.gif,.tif,.png" > <br>
           <label for="localisation">Localisation : </label><br>
           <input type="submit" value="Déposer une annonce" name="depotAnnonce" />
         </p>
       </fieldset>
    </form>
  </body>
</html>

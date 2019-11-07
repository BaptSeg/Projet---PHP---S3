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
                <a href="../controler/profil.ctrl.php">
                <img src="../model/img/icone_utilisateur.png" alt="icon_user" height="30 px" width="30 px">
                <?= $_SESSION['pseudo'] ?>
                </a>
              </li>
              </ul>
            </div>
          </nav>
        </header>
    <h2>Deposer une annonce</h2>

    <?php if (isset($msg)): ?> <!-- Nous permet d'afficher les messages de confirmation -->
      <p class="confirm"> <?= $msg ?></p>
    <?php endif; ?>

    <?php if (isset($erreur)): ?> <!-- Nous permet d'afficher les messages d'erreur -->
      <p class="error_msg"><?= $erreur ?></p>
    <?php endif; ?>

    <!-- Formulaire de dépôt des annonces-->
    <form method="post" action="../controler/depotAnnonce.ctrl.php" enctype="multipart/form-data">
       <fieldset>
         <table>
           <tr>
             <td><img class="libele" src="../model/img/icone_ecrire.png" alt="Libele"></td>
             <td><input type="text" name="intitule" id="intitule" placeholder="Libellé" required> <br></td>
           </tr>
           <tr>
             <td><img class="categorie" src="../model/img/icone_categories.png" alt="Categorie"></td>
             <td>
               <select name="categorie" id="categorie">
                 <option disabled selected>Categorie</option><!-- On rempli l'option avec les données de la base de données -->
                 <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                     echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
                 }?>
               </select>
             </td>
           </tr>
           <tr>
             <td><img class="localisation" src="../model/img/icone_adresse.png" alt="Localisation"></td>
             <td>
               <select name="ville" id="ville">
                 <option disabled selected>Ville</option><!-- On rempli l'option avec les données de la base de données -->
                 <?php for ($i=0; $i < sizeof($ville)-1; $i++){
                     echo '<option value="'.$ville[$i]['ville'].'">'.$ville[$i]['ville'].'</option>';
                   }?>
               </select>
             </td>
           </tr>
           <tr>
             <td><img class="prix" src="../model/img/icone_euro.png" alt="Prix"></td>
             <td><input type="number" step="0.01" name="prix" min="0" max="10000000" id="prix" placeholder="Prix" required> <br></td>
           </tr>
           <tr>
             <td><textarea name="description" rows="5" cols="33" maxlength="500" placeholder="Saisir une description" required></textarea><br></td>
           </tr>
           <tr>
             <td><img class="img" src="../model/img/icone_image.png" alt="Image"></td>
             <td><input id="image" type="file" name="image[]" accept=".jpg,.gif,.tif,.png" multiple placeholder="cc"> <br></td>
           </tr>
         </table>

          <input type="submit" value="Déposer une annonce" name="depotAnnonce" />
       </fieldset>

       <p class="info">Une annonce est limitée a 5 photos, si vous en selectionnez plus, seulement les 5 premières seront conservées. </p>

    </form>
  </body>
</html>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Depot annonce</title>
  </head>
  <body>

    <h1>Deposer une annonce</h1>
    <?php if (isset($erreure)): ?>
      <p><?=$erreure?></p>
    <?php endif; ?>
    <form method="post" action="../controler/depotAnnonce.ctrl.php">
       <fieldset>
         <p>
           <label for="intitule">Saisir un intitulé : </label> <input type="text" name="intitule" id="intitule" required> <br>
           <select name="Categorie" id="Categorie">
             <option value="" selected>Categorie</option>
             <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                 echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
             }?>
           </select><br>
           <label for="prix">Saisir un prix : </label> <input type="text" name="prix" placeholder="--€" id="prix" required> <br>
           <label for="description">Description : </label><br>
           <textarea id="description" name="description" rows="5" cols="33">Saisir ici</textarea><br>
           <label for="localisation">Localisation : </label><br>
           <input type="submit" value="Déposer une annonce" name="depotAnnonce" />
         </p>
       </fieldset>
    </form>
  </body>
</html>

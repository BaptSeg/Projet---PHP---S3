<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Depot annonce</title>
  </head>
  <body>
    <form method="post" action="../controler/inscription.ctrl.php">
       <fieldset>
         <p>
           <label for="intitule">Saisir un intitulé : </label> <input type="text" name="intitule" id="intitule" required> <br>
           <select name="Categorie" id="Categorie">
             <option value="" selected>Categorie</option>

             <?php for ($i=0; $i < sizeof($categorie)-1; $i++){
                 echo '<option value="'.$categorie[$i]['categorie'].'">'.$categorie[$i]['categorie'].'</option>';
             }?>
           </select>
           <label for="prix">Saisir un prix : </label> <input type="text" name="prix" placeholder="--€" id="prix" required> <br>
           <label for="description">Description : </label>
           <textarea id="description" name="description" rows="5" cols="33">Saisir ici</textarea>
           <label for="prix">Saisir un prix : </label> <input type="text" name="prix" placeholder="--€" id="prix" required> <br>
           <label for="localisation">Localisation : </label>


           <label for="mdp2"> Mots de passe : </label> <input type="password" name="mdp2" id="mdp2" required> <br>
           <label for="email"> Email : </label> <input type="email" name="email" id="email" placeholder="exemple@exemple.com" required/> <br>
           <input type="submit" value="Inscription" name="inscription" />
         </p>
       </fieldset>
    </form>
  </body>
</html>

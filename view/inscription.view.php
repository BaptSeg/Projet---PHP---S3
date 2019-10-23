<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../view/inscription.view.css">
  </head>
  <body>
    <h1>Inscription</h1>
    <?php
      if (isset($erreur)) {
        echo "<p> $erreur </p>";
      }
    ?>
    <form method="post" action="../controler/inscription.ctrl.php">
       <fieldset>
         <p>
           <label for="pseudo">Votre pseudo : </label> <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" required> <br>
           <label for="mdp1"> Mots de passe : </label> <input type="password" name="mdp1" id="mdp1" required> <br>
           <label for="mdp2"> Mots de passe : </label> <input type="password" name="mdp2" id="mdp2" required> <br>
           <label for="email"> Email : </label> <input type="email" name="email" id="email" placeholder="exemple@exemple.com" required/> <br>
           <input type="submit" value="Inscription" name="inscription" />
         </p>
       </fieldset>
    </form>

  </body>
</html>

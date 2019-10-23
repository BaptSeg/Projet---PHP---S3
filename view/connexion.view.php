<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>
    <h1>Connexion</h1>
    <?php if (isset($erreur)): ?>
      <p> <?php echo $erreur ?> </p>
    <?php endif; ?>
    <form class="" action="../controler/connexion.ctrl.php" method="post">
      <fieldset>
        <p>
      <label for="pseudo">Votre pseudo : </label> <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" required> <br>
      <label for="mdp"> Mots de passe : </label> <input type="password" name="mdp" id="mdp" required> <br>
      <input type="submit" value="connexion" name="connexion" />
    </p>
    </fieldset>
    </form>
  </body>
</html>

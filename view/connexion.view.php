<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../view/connexion.view.css">
  </head>
  <body>

    <header>
      <h1>Connexion</h1>
    </header>

    <?php if (isset($erreur)): ?>
      <p> <?php echo $erreur ?> </p>
    <?php endif; ?>

    <form class="" action="../controler/connexion.ctrl.php" method="post">
      <fieldset>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required> <br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required> <br>
        <input type="submit" value="connexion" name="connexion" />
      </fieldset>
    </form>

  </body>
</html>
